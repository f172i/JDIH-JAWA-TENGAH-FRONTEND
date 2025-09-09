<?php

namespace App\Http\Controllers;

use App\Models\InventarisasiHukum;
use App\Models\Visitor;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use PDF;
class VideoController extends Controller
{
    public function index()
    {
        $data = DB::table('video')->orderBy('created_at', 'DESC')->where('publish_video', 1)->get();
        return view('page/video/index', compact('data'));
    }
}
