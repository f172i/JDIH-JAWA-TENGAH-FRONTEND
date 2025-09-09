<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function kategori()
    {
        return view('admin.page.kategori');
    }
    public function datatable(Request $request)
    {
        $model = DB::table('kategori');
        $counter = clone $model;
        $counter->count();
        return DataTables::query($model)
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapuskategori" style="margin:5px;" id="'.$data->id.'">Hapus </a>';
                $html .= '<a href="#" class="btn btn-sm btn-success editkategori" style="margin:5px;" id="'.$data->id.'" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app2">Edit </a>';
                return $html;
                })
            ->addIndexColumn()
            ->setTotalRecords($counter)
            ->toJson();
    }
    public function kategori_delete(Request $request)
    {
        $hapus = Kategori::where('id',$request->idkat)->delete();
        if($hapus){
            return response()->json(['status' => 'success','message' => 'Hapus Kategori Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Hapus Kategori Gagal'], 400);
        }
    }

    public function store(Request $request)
    {
        $newkat = strtolower($request->kategori);
        $link = str_replace(' ', '-', $newkat);
        $simpan = Kategori::create([
            'nama' => $request->kategori,
            'singkatan' => $request->singkatan,
            'deskripsi' => $request->deskripsi,
            'link' => $link,
        ]);
        if($simpan){
            return response()->json(['status' => 'success','message' => 'Tambah Kategori Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Tambah Kategori Gagal'], 400);
        }

    }
    public function update($id=null)
    {
        $data = Kategori::where('id',$id)->first();
        return view('admin.page.editKat',compact('data'));
    }

    public function update_proses(Request $request)
    {
        $newkat = strtolower($request->kategori);
        $link = str_replace(' ', '-', $newkat);
        $update = Kategori::where('id',$request->id)
        ->update([
            'nama' => $request->kategori,
            'singkatan' => $request->singkatan,
            'deskripsi' => $request->deskripsi,
            'link' => $link,
        ]);
        if($update){
            return response()->json(['status' => 'success','message' => 'Update data Kategori Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Update data Kategori Gagal'], 400);
        }
    }
}
