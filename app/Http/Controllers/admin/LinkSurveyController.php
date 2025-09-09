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


class LinkSurveyController extends Controller
{
    public function index()
    {
        return view('admin.page.ls.index');
    }

    public function datatable(Request $request)
    {
        $model = DB::table('link_survey');
        return DataTables::query($model)
            ->editColumn('link', function ($data) {
                return $data->link ?? '';
            })
            ->addColumn('image_preview', function ($data) {
                if ($data->image == null) {
                    return '';
                }
                $file = asset('gambar_survey/' . $data->image);
                return $file;
            })
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapusls" style="margin:5px;" id="' . $data->id . '">Hapus </a>
                <button type="button"  class="btn btn-sm btn-warning editls" style="margin:5px;" id="' . $data->id . '" data-name="' . $data->name . '" data-link="' . $data->link . '" data-image="' . $data->image . '">Edit </button>
                ';
                return $html;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->toJson();
    }

    public function store(Request $request)
    {
        $file = $request->image;
        $link = $request->link;

        $webp_file_name = null; // Initialize with null

        // Check if $file is not null and a valid file
        if (!is_null($file)) {
            $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $destinationPath = public_path() . "/gambar_survey/";

            // Generate a unique file name for the WebP image
            $webp_file_name = uniqid('webp_') . '.webp';

            // Convert image to WebP format and save with the custom name
            $image = Image::make($file)
                ->encode('webp', 90)
                ->save($destinationPath . $webp_file_name);
        }

        // Check if both $file and $link are not null
        if (!is_null($file) && !is_null($link)) {
            $create = DB::table('link_survey')->insert([
                'name' => $request->name,
                'link' => $link,
                'image' => $webp_file_name, // Save custom WebP image file name
            ]);
        } elseif (!is_null($link)) {
            $create = DB::table('link_survey')->insert([
                'name' => $request->name,
                'link' => $link,
            ]);
        } elseif (!is_null($file)) {
            $create = DB::table('link_survey')->insert([
                'name' => $request->name,
                'image' => $webp_file_name, // Save custom WebP image file name
            ]);
        } else {
            $create = false; // Set $create to false if none of the conditions are met
        }

        if ($create) {
            return response()->json(['status' => 'success', 'message' => 'Tambah Link Survey Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Tambah Link Survey Gagal'], 400);
        }
    }

    public function update(Request $request)
    {
        $file = $request->image;
        $link = $request->link;

        $webp_file_name = null; // Initialize with null
        // Check if $file is not null and a valid file
        if (!is_null($file)) {
            $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $destinationPath = public_path() . "/gambar_survey/";

            // Generate a unique file name for the WebP image
            $webp_file_name = uniqid('webp_') . '.webp';

            // Convert image to WebP format and save with the custom name
            $image = Image::make($file)
                ->encode('webp', 90)
                ->save($destinationPath . $webp_file_name);
        }

        // Check if both $file and $link are not null
        if (!is_null($file) && !is_null($link)) {
            $update = DB::table('link_survey')->where('id', $request->id_ls)->update([
                'name' => $request->name,
                'link' => $request->link,
                'image' => $webp_file_name,
            ]);
        } elseif (!is_null($link)) {
            $update = DB::table('link_survey')->where('id', $request->id_ls)->update([
                'name' => $request->name,
                'link' => $request->link,
            ]);
        } elseif (!is_null($file)) {
            $update = DB::table('link_survey')->where('id', $request->id_ls)->update([
                'name' => $request->name,
                'image' => $webp_file_name,
            ]);
        } else {
            $update = false; // Set $create to false if none of the conditions are met
        }

        if ($update) {
            return response()->json(['status' => 'success', 'message' => 'Update Link Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Update Link Gagal'], 400);
        }
    }

    public function delete(Request $req)
    {
        $ls = DB::table('link_survey')->where('id', $req->id)->first();
        $destinationPath = public_path() . "/gambar_survey/" . $ls->image;
        unlink($destinationPath);
        $delete = DB::table('link_survey')->where('id', $req->id)->delete();
        if ($delete) {
            return response()->json(['status' => 'success', 'message' => 'Hapus Link Survey Berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Hapus Link Survey Gagal'], 400);
        }
    }
}
