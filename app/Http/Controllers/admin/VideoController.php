<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class VideoController extends Controller
{
    public function index()
    {
        return view('admin.page.video.index');
    }

    public function datatable(Request $request)
    {
        $model = DB::table('video')->whereNull('deleted_at');
        return DataTables::query($model)
            ->addColumn('action', function ($data) {
                $html = '
                <a href="#" class="btn btn-sm btn-danger hapusb" style="margin:5px;" id="' . $data->id_video . '">Hapus </a>
                <button type="button"  class="btn btn-sm btn-warning editb" style="margin:5px;" id="' . $data->id_video . '" data-judul="' . $data->judul_video . '" data-link="' . $data->link_youtube_video . '" data-gambar="' . $data->thumbnail_video . '">Edit </button>
                ';
                return $html;
            })
            ->addColumn('publish_video', function ($data) {
                if ($data->publish_video == '1') {
                    $html = '
                        <button type="button"  class="btn btn-sm btn-success statusb" style="margin:5px;" id="' . $data->id_video . '" data-judul="' . $data->judul_video . '" data-link="' . $data->link_youtube_video . '" data-gambar="' . $data->thumbnail_video . '">Aktif </button>
                    ';
                } else {
                    $html = '
                        <button type="button"  class="btn btn-sm btn-danger statusb" style="margin:5px;" id="' . $data->id_video . '" data-judul="' . $data->judul_video . '" data-link="' . $data->link_youtube_video . '" data-gambar="' . $data->thumbnail_video . '">Tidak Aktif </button>
                    ';
                }
                return $html;
            })
            ->addColumn('thumbnail_video', function ($data) {
                $file = asset('video/' . $data->thumbnail_video);
                return $file;
            })
            ->rawColumns(['publish_video', 'action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function store(Request $request)
    {
        $file = $request->thumbnail_video;
        $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $destinationPath = public_path() . "/video/";

        // Generate a unique file name for the WebP image
        $webp_file_name = uniqid('webp_') . '.webp';

        // Convert image to WebP format and save with the custom name
        $image = Image::make($file)
            ->encode('webp', 90)
            ->save($destinationPath . $webp_file_name);

        $id = Auth::id();
        $create = DB::table('video')->insert([
            'id_video' => \Str::uuid(),
            'thumbnail_video' => $webp_file_name, // Save custom WebP image file name
            'judul_video' => $request->judul_video,
            'publish_video' => "0",
            'link_youtube_video' => $request->link_youtube_video,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if ($create) {
            return response()->json(['status' => 'success', 'message' => 'Tambah Video Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Tambah Video Gagal'], 400);
        }
    }

    public function delete(Request $req)
    {
        // dd($req->all());
        $video = DB::table('video')->where('id_video', $req->id);
        $get = $video->first();
        $destinationPath = public_path() . "/video/" . $get->thumbnail_video;
        unlink($destinationPath);
        $delete = DB::table('video')->where('id_video', $req->id)->update([
            "deleted_at" => date('Y-m-d H:i:s')
        ]);
        if ($delete) {
            return response()->json(['status' => 'success', 'message' => 'Hapus Video Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Hapus Video Gagal'], 400);
        }
    }

    public function update(Request $request)
    {
        $update = DB::table('video')->where('id_video', $request->id_video)->update([
            'judul_video' => $request->judul_video,
            'link_youtube_video' => $request->link_youtube_video,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        if (isset($request->thumbnail_video)) {
            $file = $request->thumbnail_video;
            $file_name = $file->getClientOriginalName();
            $destinationPath = public_path() . "/video/";

            // Convert image to WebP format
            $image = Image::make($file)
                ->encode('webp', 90)
                ->save($destinationPath . pathinfo($file_name, PATHINFO_FILENAME) . '.webp');

            $update_gambar = DB::table('video')->where('id_video', $request->id_video)->update([
                'thumbnail_video' => pathinfo($file_name, PATHINFO_FILENAME) . '.webp',
            ]);
        }

        if ($update) {
            return response()->json(['status' => 'success', 'message' => 'Update Video Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Update Video Gagal'], 400);
        }
    }

    public function publish(Request $req)
    {
        // dd($req->all());
        $video = DB::table('video')->where('id_video', $req->id);
        $get = $video->first();
        if ($get->publish_video == '1') {
            $publish = DB::table('video')->where('id_video', $req->id)->update([
                "publish_video" => '0'
            ]);
        } else {
            $publish = DB::table('video')->where('id_video', $req->id)->update([
                "publish_video" => '1'
            ]);
        }
        if ($publish) {
            return response()->json(['status' => 'success', 'message' => 'Rubah Status Video Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Rubah Status Video Gagal'], 400);
        }
    }
}
