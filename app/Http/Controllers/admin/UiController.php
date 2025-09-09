<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UiController extends Controller
{
    public function index()
    {
        $vm = DB::table('profile_jdih')->where('kategori','visimisi')->first();
        return view('admin.page.public.visimisi',compact('vm'));

    }

    public function dasarhukum()
    {
        $dh = DB::table('profile_jdih')->where('kategori','dasarhukum')->first();
        return view('admin.page.public.dasarhukum',compact('dh'));
    }

    public function tupoksi()
    {
        $dh = DB::table('profile_jdih')->where('kategori','tupoksi')->first();
        return view('admin.page.public.tupoksi',compact('dh'));
    }

    public function kedudukan()
    {
        $dh = DB::table('profile_jdih')->where('kategori','kedudukan')->first();
        return view('admin.page.public.kedudukan',compact('dh'));
    }

    public function struktur_organisasi()
    {
        $so = DB::table('profile_jdih')->where('kategori','struktur_organisasi')->first();
        return view('admin.page.public.struktur',compact('so'));
    }
    public function sop()
    {
        $sop = DB::table('profile_jdih')->where('kategori','sop')->first();
        return view('admin.page.public.sop',compact('sop'));
    }

    public function store(Request $req)
    {
        $update = DB::table('profile_jdih')->where('kategori',$req->kategori)->update([
            'isi' => $req->isi
        ]);
        if($update){
            return response()->json(['status' => 'success','message' => 'Update Sukses'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Update Gagal / Tidak ada yang terupdate'], 400);
        }
    }
    
    public function store2(Request $req)
    {

        $destinationPath = public_path() . "/struktur/";
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }
        $content = $req->isi;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            $pos = strpos($data, ';');
            if($pos == true){
                list($type, $data) = explode(';', $data);
            }
            $find = strpos($data,',');
            if($find == true){
                list(, $data) = explode(',', $data);
            }
            if ( base64_encode(base64_decode($data, true)) === $data){
                $imgeData = base64_decode($data);
                $image_name= "/struktur/" . time().$item.'.png';
                $path = public_path() . $image_name;
                file_put_contents($path, $imgeData);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            } 
        }
        $content = $dom->saveHTML();
        $update = DB::table('profile_jdih')->where('kategori','struktur_organisasi')->update([
            'isi' => $content
        ]);
        if($update){
            return response()->json(['status' => 'success','message' => 'Update Sukses'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Update Gagal / Tidak ada yang terupdate'], 400);
        }
    }
}
