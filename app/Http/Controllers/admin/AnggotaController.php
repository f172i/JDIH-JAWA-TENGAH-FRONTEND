<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public function index()
    {
        $wilayah = DB::table('area_kako')->get();
        return view('admin.page.anggota.index',compact('wilayah'));
    }

    public function datatable(Request $request)
    {
        $model = DB::table('anggota_jdih')->select("*","anggota_jdih.id as id_anggota")->LeftJoin('area_kako', 'anggota_jdih.wilayah', '=', 'area_kako.id');
        return DataTables::query($model)
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapusa" style="margin:5px;" id="'.$data->id_anggota.'">Hapus </a>';
                $html .= '<a href="#" class="btn btn-sm btn-info edita" data-bs-toggle="modal"
                data-bs-target="#edit" style="margin:5px;" id="'.$data->id_anggota.'">Edit </a>';
                return $html;
                })
            ->addColumn('file', function ($data) {
                $file = asset('anggota/'.$data->logo);
                return $file;
            })
            ->addIndexColumn()
            ->toJson();
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function store(Request $req)
    {
        $file = $req->logo;
        $file_name = $file->getClientOriginalName();
        $file_size = round($file->getSize() / 1024);
        $file_ex = $file->getClientOriginalExtension();
        $destinationPath = public_path() . "/anggota/";
        $name = $this->generateRandomString(15).".".$file_ex;
        $file->move($destinationPath, $name);
        $id = Auth::id(); 
        $create = DB::table('anggota_jdih')->insert([
            'logo' => $name,
            'name' => $req->name,
            'wilayah' => $req->wilayah,
            'website' => $req->link
        ]);
        if($create){
            return response()->json(['status' => 'success','message' => 'Tambah Anggota JDIH Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Tambah Anggota JDIH Gagal'], 400);
        }
    }

    public function delete(Request $req)
    {
        $anggota = DB::table('anggota_jdih')->where('id',$req->id);
        // $get = $anggota->first();
        // $destinationPath = public_path() . "/anggota/".$get->logo;
        // unlink($destinationPath);
        $delete = $anggota->delete();
        if($delete){
            return response()->json(['status' => 'success','message' => 'Hapus Anggota JDIH Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Hapus Anggota JDIH Gagal'], 400);
        }
    }

    public function update($id=null)
    {
       $data = DB::table('anggota_jdih')->where('id',$id)->first();
       $wilayah = DB::table('area_kako')->get();
       return view('admin.page.anggota.edit',compact('data','wilayah'));
    }

    public function update_proses(request $req)
    {
        if($req->logo != ''){
            $file = $req->logo;
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $destinationPath = public_path() . "/anggota/";
            $name = $this->generateRandomString(15).".".$file_ex;
            $file->move($destinationPath, $name);
        }else{
            $anggota = DB::table('anggota_jdih')->where('id',$req->id)->first();
            $name = $anggota->logo;
        }

        $update = DB::table('anggota_jdih')->where('id',$req->id)->update([
            'logo' => $name,
            'name' => $req->name,
            'wilayah' => $req->wilayah,
            'website' => $req->link,
            'desc_anggota' => $req->desc_anggota
        ]);
        if($update){
            return response()->json(['status' => 'success','message' => 'update Anggota JDIH Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'update Anggota JDIH Gagal'], 400);
        }
    }
}
