<?php

namespace App\Http\Controllers;

use App\Models\AreaKako;
use App\Models\AnggotaJdih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaKakoController extends Controller
{
    public function index()
    {
            $data1 = AreaKako::select(['*'])
                ->orderBy('id', 'DESC')->get();
            $data2 = AnggotaJdih::orderBy('wilayah', 'DESC')->get();
        return view('page/anggota-jdih',compact('data1', 'data2'));
    }

    public function view($id)
        {
                $data1 = AreaKako::select(['*'])
                    ->orderBy('id', 'DESC')->get();
                $data2 = AnggotaJdih::where('wilayah', $id)
                    ->orderBy('wilayah', 'DESC')->get();
            return view('page/anggota-jdih-detail',compact('data1', 'data2'));
        }

    public function detail($id)
    {
        $data = AnggotaJdih::select(DB::raw("CASE WHEN area_kako.nama LIKE '%kota%' THEN area_kako.nama
     ELSE concat('KABUPATEN ', area_kako.nama)
     END
AS nama, anggota_jdih.*"))
            ->RightJoin('area_kako', 'area_kako.id', '=', 'anggota_jdih.area_kako_id')
            ->where('area_kako_id', $id)
            ->orderBy('area_kako_id', 'DESC')->get();
        return view('page/kako-detail',compact('data'));
    }
}
