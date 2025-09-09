<?php

namespace App\Http\Controllers;

use App\Models\InventarisasiHukum;
use App\Models\Kategori;
use App\Services\InventarisasiHukumService;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;



class InventarisasiHukumController extends Controller
{

    public function __construct(
        InventarisasiHukumService $InventarisasiHukumService
    ) {
        $this->service = $InventarisasiHukumService;
    }

    public function index()
    {
        $data = InventarisasiHukum::select(['kategori.nama', 'inventarisasi_hukum.*'])
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->orderBy('tahun_diundang', 'desc')
            ->orderBy('no_peraturan', 'DESC')
            ->paginate(10);
        $kategori = DB::table("kategori")->get();
        
        return view('page/inventarisasi-hukum/index', compact('data', 'kategori'));
    }

    public function detail($id)
    {
        $link = $id;
        $survey = DB::table('link_survey')
            ->where('name', 'penilaian_layanan')->first();
        $data = InventarisasiHukum::select(['abstrak.file_abstrak', 'kategori.nama', 'kategori.link as kategori_link', 'inventarisasi_hukum.*', 'master_bahasa.bahasa as language', 'bidang_hukum.nama as bidhukumnama'])
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->leftJoin('bidang_hukum', 'bidang_hukum.id', '=', 'inventarisasi_hukum.bid_hukum')
            ->leftJoin('abstrak', 'abstrak.id_ph', '=', 'inventarisasi_hukum.id')
            ->leftJoin('master_bahasa', 'master_bahasa.id', '=', 'inventarisasi_hukum.bahasa')
            ->where('inventarisasi_hukum.link', $link)->get();
        $updatedetail = InventarisasiHukum::where('link', $link);
        $updatedetail->update([
            'view' => $data[0]->view + 1
        ]);
        $kategori = [
            'peraturan' => [
                'peraturan-daerah',
                'peraturan-gubernur',
                'keputusan-gubernur',
                'instruksi-gubernur',
                'keputusan-sekretaris-daerah',
                'peraturan-kepala-opd',
                'keputusan-kepala-opd',
                'nota-kesepakatan',
                'kesepakatan-bersama',
                'perjanjian-kerja-sama',
                'memorandum-of-understanding',
                'letter-of-intent',
                'dokumen-hukum-langka',
                'propemperda',
                'katalog-produk-hukum',
            ],
            'monografi' => [
                'naskah-akademik',
                'raperda',
                'rekomendasi-kajian',
                'hasil-fasilitasi-raperda-provinsi',
                'hasil-fasilitasi-raperda-kabko',
                'surat-edaran',
                'surat-edaran-gubernur',
                'surat-edaran-sekretaris',
                'surat-edaran-kepala-opd',
                'ranham'
            ],
            'artikel' => [
                'artikel-bidang-hukum'
            ],
            'putusan' => [
                'artikel-bidang-hukum'
            ]
        ];
       
        return view('page/inventarisasi-hukum/detail', compact('data', 'survey', 'kategori'));
    }

    public function unduh($id, $jenis)
    {
        $id = decrypt($id);
        $jenis = strtolower($jenis);
        $data = $this->service->detailInventarisasiHukum($id);
        $updatedetail = InventarisasiHukum::where('id', $id);
        $updatedetail->update([
            'unduh' => $data[0]->unduh + 1
        ]);
        $file = public_path($data[0]->file_url);

        return response()->download($file);
    }

    public function unduh2($id, $status)
    {
        $sk = DB::table('survei_kepuasan')->where('id', 1);
        $getsk = $sk->first();
        if ($status == 'puas') {
            $updatesk = $sk->update([
                'sangat_puas' => $getsk->sangat_puas + 1
            ]);
        } elseif ($status == 'cukup') {
            $updatesk = $sk->update([
                'puas' => $getsk->puas + 1
            ]);
        } elseif ($status == 'kurang') {
            $updatesk = $sk->update([
                'kurang_puas' => $getsk->kurang_puas + 1
            ]);
        } else {
            $updatesk = $sk->update([
                'tidak_puas' => $getsk->tidak_puas + 1
            ]);
        }

        $data = $this->service->detailInventarisasiHukum($id);
        $updatedetail = InventarisasiHukum::where('id', $id);
        $updatedetail->update([
            'unduh' => $data[0]->unduh + 1
        ]);
        $file = public_path($data[0]->file_url);

        return response()->download($file);
    }

    public function unduh3($id, $status)
    {
        $sk = DB::table('survei_kepuasan')->where('id', 1);
        $getsk = $sk->first();
        if ($status == 'puas') {
            $updatesk = $sk->update([
                'sangat_puas' => $getsk->sangat_puas + 1
            ]);
        } elseif ($status == 'cukup') {
            $updatesk = $sk->update([
                'puas' => $getsk->puas + 1
            ]);
        } elseif ($status == 'kurang') {
            $updatesk = $sk->update([
                'kurang_puas' => $getsk->kurang_puas + 1
            ]);
        } else {
            $updatesk = $sk->update([
                'tidak_puas' => $getsk->tidak_puas + 1
            ]);
        }

        $id = decrypt($id);
        $data = $this->service->detailInventarisasiHukum($id);
        $updatedetail = InventarisasiHukum::where('id', $id);
        $updatedetail->update([
            'unduh' => $data[0]->unduh + 1
        ]);
        $file = public_path($data[0]->file_url);

        return response()->download($file);
    }

    public function unduh4($id, $status)
    {
        $sk = DB::table('survei_kepuasan')->where('id', 1);
        $getsk = $sk->first();
        if ($status == 'puas') {
            $updatesk = $sk->update([
                'sangat_puas' => $getsk->sangat_puas + 1
            ]);
        } elseif ($status == 'cukup') {
            $updatesk = $sk->update([
                'puas' => $getsk->puas + 1
            ]);
        } elseif ($status == 'kurang') {
            $updatesk = $sk->update([
                'kurang_puas' => $getsk->kurang_puas + 1
            ]);
        } else {
            $updatesk = $sk->update([
                'tidak_puas' => $getsk->tidak_puas + 1
            ]);
        }

        $data = DB::table('katalog')->where('id', $id)->first();
        $file = public_path("katalog_download/" . $data->file);

        return response()->download($file);
    }

    public function download($id)
    {
        $id = decrypt($id);
        $data = $this->service->detailInventarisasiHukum($id);
        $updatedetail = InventarisasiHukum::where('id', $id);
        $updatedetail->update([
            'unduh' => $data[0]->unduh + 1
        ]);
        $file = public_path($data[0]->file_url);

        return response()->download($file);
    }

    public function review_score($status)
    {
        $sk = DB::table('survei_kepuasan')->where('id', 1);
        $getsk = $sk->first();
        if ($status == 'puas') {
            $updatesk = $sk->update([
                'sangat_puas' => $getsk->sangat_puas + 1
            ]);
        } elseif ($status == 'cukup') {
            $updatesk = $sk->update([
                'puas' => $getsk->puas + 1
            ]);
        } elseif ($status == 'kurang') {
            $updatesk = $sk->update([
                'kurang_puas' => $getsk->kurang_puas + 1
            ]);
        } else {
            $updatesk = $sk->update([
                'tidak_puas' => $getsk->tidak_puas + 1
            ]);
        }
        return redirect()->back();
    }

    public function abstrak($id, $format)
    {
        $id = decrypt($id);
        $data = InventarisasiHukum::select(['abstrak.file_abstrak', 'kategori.nama', 'inventarisasi_hukum.*'])
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->leftJoin('abstrak', 'abstrak.id_ph', '=', 'inventarisasi_hukum.id')
            ->where('inventarisasi_hukum.id', $id)->get();
        if ($format != "pdf") {
            return view('page/inventarisasi-hukum/abstrak', [
                'data' => $data
            ]);
            die();
        }
        $view = \View::make('page/inventarisasi-hukum/abstrak', [
            'data' => $data
        ]);
        $html = $view->render();
        $html .= '<style>
            * {font-family: Arial, Helvetica, sans-serif;}
            table {border-collapse: collapse;width: 100%;border-spacing: 0;}
            table.border td, table.border th {border: 1px solid black;}
            table.no-border td {border: none;}
            th {padding: 3px;font-size: 11px;}
            tr {}
            td {padding: 3px;font-size: 11px;}
            .table{width:100%;}
            .no-padding{padding: 0;}
            .font10{font-size:10px;}
            .font11{font-size:11px;}
            .font12{font-size:12px;}
            .title{font-size: 18px;}
            .sub-title{font-size: 14px;}
            .text-coret{text-decoration: line-through}
            .line-spacing{line-height: 1.5;}
            .bold{font-weight: bold;}
            .text-center{text-align: center; vertical-align: top;}
            .text-left{text-align: left; vertical-align: top;}
            .text-right{text-align: right; vertical-align: top;}
            .text-bold{font-weight: bold;}
            .absolute-top-right{position: absolute;top: 10px;right: 0;}
            .top{border-top:1px solid #000;}
            .right{border-right:1px solid #000;}
            .bottom{border-bottom:1px solid #000;}
            .left{border-left:1px solid #000;}
        </style>';
        
        // DomPDF implementation
        $pdf = PDF::loadHTML($html);
        $pdf->setPaper('F4', 'portrait');
        
        return $pdf->stream($data[0]->link . '.pdf');
    }

    public function kategori($param)
    {
        $data = InventarisasiHukum::select(['kategori.nama', 'inventarisasi_hukum.*', 'inventarisasi_hukum.id as idph'])
            ->join('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->groupBy('inventarisasi_hukum.id')
            ->orderBy('tahun_diundang', 'desc')
            ->orderBy('no_peraturan', 'DESC')
            ->where('kategori.link', $param)
            ->where('inventarisasi_hukum.publish', '1');
        $total = count($data->get());
        $data = $data->paginate(10);
        $title = str_replace('-', ' ', $param);

        $kategori = DB::table("kategori")->orderBy('nama', 'asc')->get();
        $param = DB::table("kategori")->where('link', $param)->first();

        return view('page/inventarisasi-hukum/index', compact('data', 'title', 'total', 'kategori', 'param'));
    }

    public function subjek($param)
    {
        $query = ltrim(str_replace('-', ' ', $param));
        $data = InventarisasiHukum::select(['kategori.nama', 'inventarisasi_hukum.*'])
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->orderBy('tahun_diundang', 'desc')
            ->orderBy('no_peraturan', 'DESC')
            ->where('file_tags', 'like', "%{$query}");
        $total = count($data->get());
        $data = $data->paginate(10);
        $title = $query;
        $kategori = DB::table("kategori")->get();

        return view('page/inventarisasi-hukum/subjek', compact('data', 'title', 'total', 'kategori'));
    }
}
