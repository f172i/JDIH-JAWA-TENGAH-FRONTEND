<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;


class GaleriController extends Controller
{
    public function index()
    {
        $data = DB::table('galeri')->get();
        return view('admin.page.galeri.index', compact('data'));
    }

    public function store(Request $request)
    {
        $file = $request->file;
        if ($file != '') {
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $destinationPath = public_path() . "/galeri/";

            // Save original image
            $file->move($destinationPath, $file_name);

            // Convert image to WebP format
            $image = Image::make($destinationPath . $file_name)
                ->encode('webp', 90)
                ->save($destinationPath . pathinfo($file_name, PATHINFO_FILENAME) . '.webp');

            $file_name = pathinfo($file_name, PATHINFO_FILENAME) . '.webp'; // Update the file name to the WebP version
        } else {
            $file_name = "";
        }

        if ($request->link != '') {
            $link = "https://www.youtube.com/embed/" . $request->link;
        } else {
            $link = "";
        }

        $create = DB::table('galeri')->insert([
            'name' => $request->name,
            'jenis' => $request->jenis,
            'link' => $link,
            'file' => $file_name,
        ]);

        if ($create) {
            return response()->json(['status' => 'success', 'message' => 'Tambah Galeri Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Tambah Galeri Gagal'], 400);
        }
    }

    public function delete(Request $req)
    {
        $galeri = DB::table('galeri')->where('id', $req->id);
        $get = $galeri->first();
        $destinationPath = public_path() . "/galeri/" . $get->file;
        unlink($destinationPath);
        $delete = $galeri->delete();
        if ($delete) {
            return response()->json(['status' => 'success', 'message' => 'Hapus Galeri Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Hapus Galeri Gagal'], 400);
        }
    }
}
