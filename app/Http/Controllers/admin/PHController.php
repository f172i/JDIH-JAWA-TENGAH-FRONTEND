<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class PHController extends Controller
{
   public function index()
   {
        return view('admin.page.ph.index');
   }
   public function datatable(Request $request)
    {
        $model = DB::table('pelayanan_hukum');
        $counter = clone $model;
        return DataTables::query($model)
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapusph" style="margin:5px;" id="'.$data->id.'">Hapus </a>';
                $html .= '<a href="#" class="btn btn-sm btn-success editph" style="margin:5px;" id="'.$data->id.'" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app2">Edit </a>';
                return $html;
                })
            ->addIndexColumn()
            ->toJson();
    }

    public function store(Request $request)
    {
        $file = $request->logo;
        if($file)
        {
            $file_name = $file->getClientOriginalName();
            $destinationPathAbstrak = public_path() . "/pelayananhukum";
            $file->move($destinationPathAbstrak, $file_name);
        }else{
            $file_name = "";
        }
        $simpan = DB::table('pelayanan_hukum')->insert([
            'name' => $request->name,
            'link' =>  $request->link,
            'logo' =>  $file_name,
        ]);
        if($simpan){
            return response()->json(['status' => 'success','message' => 'Tambah Pelayanan Hukum Elektronik Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Tambah Pelayanan Hukum Elektronik Gagal'], 400);
        }

    }

    public function delete(Request $request)
    {
        $hapus = DB::table('pelayanan_hukum')->where('id',$request->id)->delete();
        if($hapus){
            return response()->json(['status' => 'success','message' => 'Hapus Pelayanan Hukum Elektronik Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Hapus Pelayanan Hukum Elektronik Gagal'], 400);
        }
    }

    public function update($id=null)
    {
        $data = DB::table('pelayanan_hukum')->where('id',$id)->first();
        return view('admin.page.ph.edit',compact('data'));
    }
    public function update_proses(Request $request)
    {
        $file = $request->logo;
        if($file)
        {
            $file_name = $file->getClientOriginalName();
            $destinationPathAbstrak = public_path() . "/pelayananhukum";
            $file->move($destinationPathAbstrak, $file_name);
            $updateData = [
                'name' => $request->nameedit,
                'link' =>  $request->linkedit,
                'logo' =>  $file_name,
            ];
        }else{
            $file_name = "";
            $updateData = [
                'name' => $request->nameedit,
                'link' =>  $request->linkedit,
            ];
        }
        $update = DB::table('pelayanan_hukum')->where('id',$request->id)
        ->update($updateData);
        if($update){
            return response()->json(['status' => 'success','message' => 'Update data Pelayanan Hukum Elektronik Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Update data Pelayanan Hukum Elektronik Gagal'], 400);
        }
    }
}
