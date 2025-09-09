<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\InventarisasiHukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::select(['berita.*'])
                ->orderBy('tgl_publish', 'DESC')
                ->paginate(5);
        $kategori = DB::table("kategori")->get();
        return view('page/berita/index',compact('data', 'kategori'));
    }

    public function pencarian($dokumen=null,$kategori=null,$tahun=null,$nomor=null)
    {
        // return view('pencarian');
    }

    public function detail($param)
    {
        $link = $param;
        $kategori = DB::table("kategori")->get();
        $data = Berita::select('*')
                ->where('link', $link)->get();
        $beritalain = Berita::select(['berita.*'])
            ->orderBy('tgl', 'DESC')
            ->paginate(4);
        $terbaru = InventarisasiHukum::select('inventarisasi_hukum.*')
            ->orderBy('created_at', 'desc')->paginate(5);
        $updatedetail = Berita::where('link', $link);
        $updatedetail->update([
            'views' => $data[0]->views + 1
        ]);
        return view('page/berita/detail', compact('data', 'beritalain', 'kategori', 'terbaru'));
    }
}
