<?php

namespace App\Http\Controllers;

use App\Models\Download;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class UnduhController extends Controller
{

    public function index()
    {
        $data = Download::select('*')
            ->paginate(10);
        $title = 'Download';
        $kategori = DB::table("kategori")->get();
        return view('page/download/index', compact('data', 'title', 'kategori'));
    }



}
