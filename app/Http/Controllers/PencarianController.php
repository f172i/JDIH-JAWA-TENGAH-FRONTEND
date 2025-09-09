<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PencarianController extends Controller
{
    public function index()
    {
        if (isset($_GET['dokumen'])) {
            $dokumen        = $_GET['dokumen'];
        } else {
            $dokumen = '';
        }
        if (isset($_GET['kategori'])) {
            $kategori_pencarian = $_GET['kategori'];
        } else {
            $kategori_pencarian = '';
        }

        if (isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
        } else {
            $tahun = '';
        }

        if (isset($_GET['nomor'])) {
            $nomor = $_GET['nomor'];
        } else {
            $nomor = '';
        }

        if (isset($_GET['status_dokumen'])) {
            $status_dokumen = $_GET['status_dokumen'];
        } else {
            $status_dokumen = '';
        }


        $kategori = DB::table("kategori")->get();

        $pdf = DB::table('inventarisasi_hukum');
        $pdf->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis');
        $pdf->leftJoin('abstrak', 'abstrak.id_ph', '=', 'inventarisasi_hukum.id');
        if ($dokumen != '') {
            $pdf->where('content', 'like', '%' . $dokumen . '%');
        }
        if ($kategori_pencarian != '') {
            $pdf->where('kategori.link', 'like', '%' . $kategori_pencarian . '%');
        }
        if ($tahun != '') {
            $pdf->where('tahun_diundang', $tahun);
        }
        if ($nomor != '') {
            $pdf->where('no_peraturan', $nomor);
        }
        if ($status_dokumen != '') {
            $pdf->where('inventarisasi_hukum.status', $status_dokumen);
        }
        $pdf->where('inventarisasi_hukum.publish', '1');
        $nop = "CAST(no_peraturan AS UNSIGNED ) DESC";
        $pdf->select(['kategori.nama', 'inventarisasi_hukum.*', 'abstrak.*', 'inventarisasi_hukum.id as idph'])
            ->orderBy('tahun_diundang', 'desc')
            ->orderByRaw($nop);
        $total = count($pdf->get());
        $data = $pdf->paginate(10);

        return view('page.pencarian.index', compact('status_dokumen', 'data', 'dokumen', 'kategori_pencarian', 'tahun', 'nomor', 'kategori', 'total'));
    }
}
