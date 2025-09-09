<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{

    public function index()
    {
        $data = Galeri::select('*')
            ->paginate(10);
        $title = 'Galeri';
        $kategori = DB::table("kategori")->get();
        return view('page/galeri/index', compact('data', 'title', 'kategori'));
    }



}
