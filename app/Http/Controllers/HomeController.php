<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\InventarisasiHukum;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function index()
    {
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $cekip = DB::table('visitor')->where('ip', $_SERVER['REMOTE_ADDR'])->first();
        if ($cekip == '') {
            DB::table('visitor')->insert([
                'ip' => $_SERVER['REMOTE_ADDR'],
                'hits' => 1,
                'date' => date('Y-m-d'),
                'online' => time(),
                'time' => date('Y-m-d H:i:s')
            ]);
        } else {
            DB::table('visitor')->where('ip', $_SERVER['REMOTE_ADDR'])->update([
                'hits' => $cekip->hits + 1,
                'date' => date('Y-m-d'),
                'online' => time(),
                'time' => date('Y-m-d H:i:s')
            ]);
        }
        $data = Berita::select(['berita.*'])
            ->orderBy('tgl_publish', 'DESC')
            ->paginate(4);
        $slider = Slider::select('*')
            ->orderBy('id', 'asc')->get();
        $terbaru = InventarisasiHukum::select(['kategori.nama', 'inventarisasi_hukum.*'])
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->orderBy('created_at', 'desc')->paginate(5);
        $terpopuler = InventarisasiHukum::select(['kategori.nama', 'inventarisasi_hukum.*'])
            ->leftJoin('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis')
            ->orderBy('view', 'desc')->paginate(5);
        $kategori = DB::table("kategori")->get();
        $berlaku = InventarisasiHukum::select(DB::raw("count(*) as count"))
            ->where("status", '1')
            ->orderBy("tahun_diundang", 'desc')
            ->groupBy(DB::raw("tahun_diundang"))
            ->get()->toArray();
        $berlaku = array_column($berlaku, 'count');
        $tidakberlaku = InventarisasiHukum::select(DB::raw("count(*) as count"))
            ->where("status", '2')
            ->orderBy("tahun_diundang", 'desc')
            ->groupBy(DB::raw("tahun_diundang"))
            ->get()->toArray();
        $tidakberlaku = array_column($tidakberlaku, 'count');
        $tahunberlakutakberlaku = InventarisasiHukum::select(DB::raw("tahun_diundang"))
            ->orderBy("tahun_diundang", 'desc')
            ->groupBy(DB::raw("tahun_diundang"))
            ->limit(6)
            ->get()->toArray();
        $tahunberlakutakberlaku = array_column($tahunberlakutakberlaku, 'tahun_diundang');
        $grafikkategori = InventarisasiHukum::select(DB::raw("count(*) as count, kategori.nama"))
            ->leftJoin('kategori', 'inventarisasi_hukum.jenis', '=', 'kategori.id')
            ->orderBy("kategori.nama", 'desc')
            ->groupBy(DB::raw("kategori.nama"))
            ->get()->toArray();
        $grafikkategori = array_column($grafikkategori, 'count');
        $produk_hukum = InventarisasiHukum::select(DB::raw("count(*) as jumlah, kategori.nama, kategori.link"))
            ->leftJoin('kategori', 'inventarisasi_hukum.jenis', '=', 'kategori.id')
            ->groupBy(DB::raw("kategori.nama, kategori.link"))
            ->get();
        $pelayanan_hukum =  DB::table('pelayanan_hukum')->get();
        $pengunjung = DB::select("SELECT date as tgl, sum(hits) as jml FROM visitor group by date ");
        $tgl = array_column($pengunjung, 'tgl');
        $jml = array_column($pengunjung, 'jml');
        $dataVideo = DB::table('video')->whereNull('deleted_at')->where('publish_video', '1')->orderBy('id_video', 'desc')->limit(6)->get();
        $survey = DB::table('link_survey')->where('name','penilaian_layanan')->first();
        $survey_gambar = DB::table('link_survey')->where('name','gambar_survey')->first();
        $konfigurasi = DB::table('konfigurasi_periode_bankum')->first();
        $tgl_mulai = $konfigurasi->tgl_mulai_periode;
        $tgl_selesai = $konfigurasi->tgl_selesai_periode;
        $tgl_sekarang = date('Y-m-d');
        if (($tgl_sekarang >= $tgl_mulai) && ($tgl_sekarang <= $tgl_selesai)) {
            $periode = TRUE;
        } else {
            $periode = FALSE;
        }
        
        return view('index')
            ->with('data', $data)
            ->with('terbaru', $terbaru)
            ->with('terpopuler', $terpopuler)
            ->with('kategori', $kategori)
            ->with('produk_hukum', $produk_hukum)
            ->with('pelayanan_hukum', $pelayanan_hukum)
            ->with('slider', $slider)
            ->with('tahunberlakutakberlaku', json_encode($tahunberlakutakberlaku, JSON_NUMERIC_CHECK))
            ->with('tidakberlaku', json_encode($tidakberlaku, JSON_NUMERIC_CHECK))
            ->with('berlaku', json_encode($berlaku, JSON_NUMERIC_CHECK))
            ->with('grafikkategori', json_encode($grafikkategori, JSON_NUMERIC_CHECK))
            ->with('tgl', json_encode($tgl, JSON_NUMERIC_CHECK))
            ->with('jml', json_encode($jml, JSON_NUMERIC_CHECK))
            ->with('dataVideo', $dataVideo)
            ->with('periode', $periode)
            ->with('survey', $survey)
            ->with('survey_gambar', $survey_gambar);
            
    }

    public function pencarian($dokumen = null, $kategori = null, $tahun = null, $nomor = null)
    {
        // return view('pencarian');
    }

    public function detail($id)
    {
        $id = decrypt($id);
        $data = Berita::select('*')
            ->where('id', $id)->get();
        $updatedetail = Berita::where('id', $id);
        $updatedetail->update([
            'views' => $data[0]->views + 1
        ]);
        return view('page/berita/detail', compact('data'));
    }
}
