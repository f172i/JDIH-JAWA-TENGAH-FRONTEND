<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.page.banner.index');
    }

    public function datatable(Request $request)
    {
        $model = DB::table('slider');
        return DataTables::query($model)
            ->addColumn('status_banner', function ($data) {
                if ($data->status == 'aktif') {
                    # code...
                    $html_1 = "<a href='" . route('admin.master.banner.publish', [$data->id]) . "' class='btn btn-sm btn-success' style='margin:5px;' id='Aktif'> Aktif </a>";
                } else {
                    $html_1 = "<a href='" . route('admin.master.banner.publish', [$data->id]) . "' class='btn btn-sm btn-danger' style='margin:5px;' id='Non-aktif '> Nonaktif </a>";
                }
                return $html_1;
            })
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapusb" style="margin:5px;" id="' . $data->id . '">Hapus </a>';
                return $html;
            })
            ->addColumn('file', function ($data) {
                $file = asset('banner/' . $data->gambar);
                return $file;
            })
            ->rawColumns(['status_banner', 'action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function store(Request $request)
    {
        $file = $request->file;
        $file_name = $file->getClientOriginalName();
        $file_size = round($file->getSize() / 1024);
        $file_ex = $file->getClientOriginalExtension();
        $destinationPath = public_path() . "/banner/";

        // Convert image to WebP format and save with a custom name
        $file_name_webp = uniqid('webp_') . '.webp';
        $image = Image::make($file)
            ->encode('webp', 90)
            ->save($destinationPath . $file_name_webp);

        $id = Auth::id();
        $create = DB::table('slider')->insert([
            'gambar' => $file_name_webp, // Save custom WebP image file name
            'name' => $request->name,
            'status' => "aktif",
            'created_by' => $id
        ]);

        if ($create) {
            return response()->json(['status' => 'success', 'message' => 'Tambah Banner Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Tambah Banner Gagal'], 400);
        }
    }

    public function delete(Request $req)
    {
        $banner = DB::table('slider')->where('id', $req->id);
        $get = $banner->first();
        $destinationPath = public_path() . "/banner/" . $get->gambar;
        unlink($destinationPath);
        $delete = $banner->delete();
        if ($delete) {
            return response()->json(['status' => 'success', 'message' => 'Hapus Banner Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Hapus Banner Gagal'], 400);
        }
    }

    public function publish($id)
    {
        $data = Slider::where('id', $id)->first();
        if ($data->status == 'aktif') {
            $data->status = 'nonaktif';
        } else {
            $data->status = 'aktif';
        }
        $data->save();
        return redirect()->back();
    }
}
