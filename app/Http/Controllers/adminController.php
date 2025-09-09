<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\InventarisasiHukum;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function grafikPengunjung()
    {
        $data = DB::select("SELECT date as tgl, sum(hits) as jml FROM visitor group by date ");
        foreach ($data as $key => $d) {
            $jml[] = $d->jml;
            $tgl[] = $d->tgl;
        }
        $data_jml = json_encode($jml);
        $data_tgl = json_encode($tgl);
        return view('admin.page.dashboard.grafikPengunjung', compact('data_jml', 'data_tgl'));
    }

    public function getTotal()
    {
        $TPH = InventarisasiHukum::get();
        $kat = Kategori::get();
        $berita = DB::table('berita')->get();
        $data = [
            'thp' => count($TPH),
            'brt' => count($berita),
            'kat' => count($kat),
        ];

        return $data;
    }
}
