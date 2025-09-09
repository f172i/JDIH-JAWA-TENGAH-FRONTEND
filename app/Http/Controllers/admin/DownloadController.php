<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{
    public function index()
    {
        $data = DB::table('download')->get();
        return view('admin.page.download.index',compact('data'));
    }

    public function update($id=null)
    {
        $ddn = DB::table('download')->where('id',$id)->first();
        return view('admin.page.download.update',compact('ddn'));
    }
    public function store(Request $request)
    {
        $file = $request->file;
        $file_name = $file->getClientOriginalName();
        $file_size = round($file->getSize() / 1024);
        $file_ex = $file->getClientOriginalExtension();
        $destinationPath = public_path() . "/download/";
        $file->move($destinationPath, $file_name);

        $create = DB::table('download')->insert([
            'name' => $request->name,
            'rakor' => $request->rakor,
            'tgl' => $request->tgl,
            'file' => $file_name,
        ]);
        if($create){
            return response()->json(['status' => 'success','message' => 'Tambah File Download Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Tambah File Download Gagal'], 400);
        }
    }

    public function delete(Request $req)
    {
        $download = DB::table('download')->where('id',$req->id);
        $get = $download->first();
        $destinationPath = public_path() . "/download/".$get->file;
        unlink($destinationPath);
        $delete = $download->delete();
        if($delete){
            return response()->json(['status' => 'success','message' => 'Hapus File Download Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Hapus File Download Gagal'], 400);
        }
    }

    public function update_proses(request $req)
    {
        if($req->file != ''){
            $file = $req->file;
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $destinationPath = public_path() . "/download/";
            $name = $file_name;
            $file->move($destinationPath, $name);
        }else{
            $download = DB::table('download')->where('id',$req->id)->first();
            $name = $download->file;
        }

        $update = DB::table('download')->where('id',$req->id)->update([
            'name' => $req->name,
            'rakor' => $req->rakor,
            'tgl' => $req->tgl,
            'file' => $name,
        ]);
        if($update){
            return response()->json(['status' => 'success','message' => 'update File Download Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'update File Download Gagal'], 400);
        }
    }
}
