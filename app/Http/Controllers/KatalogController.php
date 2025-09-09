<?php

namespace App\Http\Controllers;

use App\Models\KatalogDownload;
use App\Models\InventarisasiHukum;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use PDF;

class KatalogController extends Controller
{

    public function index()
    {
        // Ambil data dari katalog manual yang sudah ada
        $katalogManual = KatalogDownload::select(['katalog.*'])
            ->orderBy('id', 'desc')
            ->get();

        // Ambil data dari inventarisasi hukum yang sudah dipublish
        // Kelompokkan berdasarkan jenis peraturan dan tahun
        $inventarisasiData = InventarisasiHukum::select([
                'kategori.nama as jenis_peraturan',
                'inventarisasi_hukum.tahun_diundang as tahun',
                DB::raw('COUNT(*) as jumlah_dokumen'),
                DB::raw('GROUP_CONCAT(inventarisasi_hukum.id) as dokumen_ids')
            ])
            ->join('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->where('inventarisasi_hukum.publish', '1')
            ->whereNotNull('inventarisasi_hukum.file')
            ->where('inventarisasi_hukum.file', '!=', '')
            ->groupBy('kategori.nama', 'inventarisasi_hukum.tahun_diundang')
            ->orderBy('inventarisasi_hukum.tahun_diundang', 'desc')
            ->orderBy('kategori.nama', 'asc')
            ->get();

        // Gabungkan data manual dan otomatis
        $data = collect();
        
        // Tambahkan katalog manual
        foreach ($katalogManual as $manual) {
            $data->push((object)[
                'id' => $manual->id,
                'name' => $manual->name,
                'tahun' => $manual->tahun,
                'file' => $manual->file,
                'type' => 'manual',
                'jumlah_dokumen' => null
            ]);
        }

        // Tambahkan katalog otomatis dari inventarisasi hukum
        foreach ($inventarisasiData as $auto) {
            $data->push((object)[
                'id' => 'auto_' . md5($auto->jenis_peraturan . '_' . $auto->tahun),
                'name' => 'Katalog ' . $auto->jenis_peraturan . ' Tahun ' . $auto->tahun,
                'tahun' => $auto->tahun,
                'file' => null,
                'type' => 'auto',
                'jumlah_dokumen' => $auto->jumlah_dokumen,
                'dokumen_ids' => $auto->dokumen_ids,
                'jenis_peraturan' => $auto->jenis_peraturan
            ]);
        }

        // Urutkan berdasarkan tahun (terbaru dulu)
        $data = $data->sortByDesc('tahun');

        $title = 'Katalog';
        $kategori = DB::table("kategori")->get();
        return view('page/katalog/index', compact('data', 'title', 'kategori'));
    }

    // Method untuk generate PDF katalog berdasarkan jenis dan tahun
    public function generatePDF($jenis, $tahun)
    {
        try {
            // Debug info
            $decodedJenis = urldecode($jenis);
            
            // Coba beberapa variasi query untuk mencocokkan data
            $dokumen = InventarisasiHukum::select([
                    'inventarisasi_hukum.*',
                    'kategori.nama as kategori_nama'
                ])
                ->join('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
                ->where('inventarisasi_hukum.publish', '1')
                ->where(function($query) use ($decodedJenis) {
                    $query->where('kategori.nama', $decodedJenis)
                          ->orWhere('kategori.nama', 'LIKE', '%' . $decodedJenis . '%')
                          ->orWhere('kategori.nama', 'LIKE', '%' . str_replace(' ', '%', $decodedJenis) . '%');
                })
                ->where('inventarisasi_hukum.tahun_diundang', $tahun)
                ->orderBy('inventarisasi_hukum.no_peraturan', 'asc')
                ->get();

            // Jika tidak ada hasil, coba tanpa filter file
            if ($dokumen->isEmpty()) {
                $dokumen = InventarisasiHukum::select([
                        'inventarisasi_hukum.*',
                        'kategori.nama as kategori_nama'
                    ])
                    ->join('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
                    ->where('inventarisasi_hukum.publish', '1')
                    ->where(function($query) use ($decodedJenis) {
                        $query->where('kategori.nama', $decodedJenis)
                              ->orWhere('kategori.nama', 'LIKE', '%' . $decodedJenis . '%');
                    })
                    ->where('inventarisasi_hukum.tahun_diundang', $tahun)
                    ->orderBy('inventarisasi_hukum.no_peraturan', 'asc')
                    ->get();
            }

            if ($dokumen->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Tidak ada dokumen yang tersedia untuk katalog ini.',
                    'debug' => [
                        'jenis_original' => $jenis,
                        'jenis_decoded' => $decodedJenis,
                        'tahun' => $tahun,
                        'total_published' => InventarisasiHukum::where('publish', '1')->count(),
                        'available_categories' => DB::table('kategori')->pluck('nama')->toArray()
                    ]
                ], 404);
            }

            // Prepare data untuk PDF
            $data = [
                'dokumen' => $dokumen,
                'jenis' => $decodedJenis,
                'tahun' => $tahun,
                'total' => $dokumen->count(),
                'tanggal_cetak' => now()->format('d F Y')
            ];

            // Generate PDF
            $pdf = PDF::loadView('page.katalog.pdf-template', $data);
            $pdf->setPaper('A4', 'landscape');
            
            $filename = 'Katalog_' . str_replace(' ', '_', $decodedJenis) . '_' . $tahun . '.pdf';
            
            return $pdf->download($filename);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal generate PDF: ' . $e->getMessage(),
                'debug' => [
                    'jenis' => $jenis,
                    'tahun' => $tahun,
                    'error_line' => $e->getLine(),
                    'error_file' => $e->getFile()
                ]
            ], 500);
        }
    }

    // Method untuk generate PDF katalog manual
    public function generateManualPDF($id)
    {
        $katalog = KatalogDownload::find($id);
        
        if (!$katalog) {
            return redirect()->back()->with('error', 'Katalog tidak ditemukan.');
        }

        // Untuk katalog manual, kita buat PDF sederhana dengan info katalog
        $data = [
            'katalog' => $katalog,
            'tanggal_cetak' => now()->format('d F Y')
        ];

        $pdf = PDF::loadView('page.katalog.manual-pdf-template', $data);
        $pdf->setPaper('A4', 'portrait');
        
        $filename = 'Katalog_Manual_' . str_replace(' ', '_', $katalog->name) . '.pdf';
        
        return $pdf->download($filename);
    }
}
