<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\InventarisasiHukum;
use Illuminate\Support\Facades\Storage;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Helpers\Helper;

class KatalogController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        return view('admin.page.katalog.index',compact('kategori'));
    }

    public function katalog()
    {
        $katalog = DB::table('katalog')->get();
        return view('admin.page.katalog.katalog',compact('katalog'));
    }

    public function datatable(Request $request)
    {
        $model = DB::table('inventarisasi_hukum');
        $model->select('inventarisasi_hukum.*','kategori.nama as bph');
        $model->Join('kategori', 'kategori.id', '=', 'inventarisasi_hukum.jenis');

        // Get user session data for filtering
        $userRole = Session::get('role');
        $userName = Session::get('name');

        // Filter data based on user role and name
        if ($userRole !== 'superadmin' && $userRole !== 'admin' && $userRole !== 'opd' && $userName) {
            if (stripos($userName, 'Badan Pengelola') !== false || 
                stripos($userName, 'bpkad') !== false ||
                stripos($userName, 'BPKAD') !== false) {
                $model->where('inventarisasi_hukum.pengarang', $userName);
            }
        }

        if ($request->judul != '') $model->where('content', 'like', '%' . $request->judul . '%');
        if ($request->nomor != '') $model->where('no_peraturan',$request->nomor);
        if ($request->tahun != '') $model->where('tahun_diundang',$request->tahun);
        if ($request->kategori != '') $model->where('inventarisasi_hukum.jenis',$request->kategori);

        return DataTables::query($model)
            ->addColumn('bph', function ($data) {
                return $data->bph;
                })
            ->addColumn('np', function ($data) {
                $np = $data->no_peraturan. " Tahun ".$data->tahun_diundang;
                return $np;
                })
            ->addColumn('judul', function ($data) {
                $judul = Helper::string_rmv_html($data->content);
                return $judul;
                })
            ->addColumn('berlaku', function ($data) {
                if($data->status == 1){
                    $berlaku = 'Berlaku';
                } else{
                    $berlaku = 'Tidak Berlaku';
                };
                return $berlaku;
                })
            ->addIndexColumn()
            ->toJson();
    }

    public function store(Request $req)
    {
        $file = $req->file;
        $file_name = $file->getClientOriginalName();
        $file_size = round($file->getSize() / 1024);
        $file_ex = $file->getClientOriginalExtension();

        $destinationPath = public_path() . "/katalog_download/";
        if (!file_exists($destinationPath)) {
            File::makeDirectory($destinationPath, $mode = 0777, true, true);
        }
        $up = $file->move($destinationPath, $file_name);
        $tambah = DB::table('katalog')->insert([
            'name' => $req->nama,
            'tahun' => $req->tahun,
            'file' => $file_name,
        ]);
        if($tambah){
            return response()->json(['status' => 'success','message' => 'tambah Katalog baru berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'tambah Katalog baru gagal'], 400);
        }
    }

    public function delete(Request $request)
    {
        $hapus = DB::table('katalog')->where('id',$request->id)->delete();
        if($hapus){
            return response()->json(['status' => 'success','message' => 'Hapus Katalog Berhasil'], 200);
        }else{
            return response()->json(['status' => 'error','message' => 'Hapus Katalog Gagal'], 400);
        }
    }

}
