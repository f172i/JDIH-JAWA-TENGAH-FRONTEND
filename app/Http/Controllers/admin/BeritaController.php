<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Berita;
// use SmtHelp;
use App\Helpers\Smt;
use Intervention\Image\Facades\Image;


class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.page.berita.berita');
    }

    public function datatable(Request $request)
    {
        $model = DB::table('berita')
            ->orderBy('tgl', 'desc')->selectRaw(" * ");
        $counter = clone $model;
        $counter->count();
        return DataTables::query($model)
            ->editColumn('tgl', function ($data) {
                return Smt::fdate($data->tgl, 'HHDDMMYYYY');
            })
            ->editColumn('tgl_publish', function ($data) {
                if ($data->tgl_publish != null) {
                    return Smt::fdate($data->tgl_publish, 'DDMMYYYY');
                } else {
                    return 'Belum Publish';
                }
            })
            ->addColumn('action', function ($data) {
                $html = '<a href="#" class="btn btn-sm btn-danger hapurberita" style="margin:5px;" id="' . $data->id . '">Hapus </a>';
                $html .= "<a href='" . route('admin.master.berita.update', [$data->id]) . "' class='btn btn-sm btn-success editberita' style='margin:5px;' id='editfile'>Edit </a>";
                $html .= "<a href='" . route('admin.master.berita.detail', [$data->id]) . "' class='btn btn-sm btn-primary' style='margin:5px;' id='detailfile'>Detail </a>";
                return $html;
            })
            ->addIndexColumn()
            ->setTotalRecords($counter)
            ->toJson();
    }
    public function update($id = null)
    {
        $berita =  DB::table('berita')->where('id', $id)->first();
        return view('admin.page.berita.update', compact('berita'));
    }
    public function create()
    {

        return view('admin.page.berita.create');
    }

    public function detail($id = null)
    {
        $berita = Berita::where('id', $id)->first();
        return view('admin.page.berita.detail', compact('berita'));
    }

    public function store(Request $request)
    {

        $file = $request->file;
        $file_name = $file->getClientOriginalName();
        $file_size = round($file->getSize() / 1024);
        $file_ex = $file->getClientOriginalExtension();
        $destinationPath = public_path() . "/berita/";

        if (!in_array($file_ex, array('jpg', 'jpeg', 'png', 'webp'))) {
            return response()->json(['status' => 'error', 'message' => 'Format file salah. (jpg, jpeg,png, webp)'], 400);
        }
        if ($file != 'undefined') {
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $destinationPath = public_path() . "/berita/";

            // Convert image to WebP format
            $image = Image::make($file)
                ->encode('webp', 90)
                ->save($destinationPath . pathinfo($file_name, PATHINFO_FILENAME) . '.webp');

            $file_name = pathinfo($file_name, PATHINFO_FILENAME) . '.webp'; // Update the file name to the WebP version
        } else {
            $file_name = '';
        }

        $content = $request->isiberita;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            $pos = strpos($data, ';');
            if ($pos == true) {
                list($type, $data) = explode(';', $data);
            }
            $find = strpos($data, ',');
            if ($find == true) {
                list(, $data) = explode(',', $data);
            }
            if (base64_encode(base64_decode($data, true)) === $data) {
                $imgeData = base64_decode($data);
                $image_name = "/berita/image_" . time() . "_" . $item . '.webp';
                $im = imagecreatefromstring($imgeData);
                $path = public_path() . $image_name;
                imagewebp($im, $path);
                imagedestroy($im);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }
        }

        $content = $dom->saveHTML();
        $lower = strtolower($request->judul);
        $link = preg_replace('/\s+/', '-', $lower);
        $tambah = Berita::create([
            'nama' => $request->judul,
            'title' => $request->judul,
            'penulis' => $request->penulis,
            'isi' => $content,
            'link' => $link,
            'view' => 0,
            //'publish' => $request->publish,
            'tgl_publish' => $request->tgl_publish,
            'tgl' => date('Y-m-d H:i:s'),
            'images' => $file_name
        ]);

        $destinationPath = public_path() . "/berita/";
        $file->move($destinationPath, $file_name);

        if ($tambah) {
            return response()->json(['status' => 'success', 'message' => 'tambah berita baru berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'tambah berita baru gagal'], 400);
        }
    }

    public function updateproses(Request $request)
    {

        $id = $request->id;
        $brt = Berita::where('id', $id)->first();
        $file = $request->file;

        if ($file != 'undefined') {
            $file_name = $file->getClientOriginalName();
            $file_size = round($file->getSize() / 1024);
            $file_ex = $file->getClientOriginalExtension();
            $destinationPath = public_path() . "/berita/";

            // Delete previous image
            $previousImagePath = $destinationPath . $brt->images;
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }

            // Convert image to WebP format
            $image = Image::make($file)
                ->encode('webp', 90)
                ->save($destinationPath . pathinfo($file_name, PATHINFO_FILENAME) . '.webp');

            $file_name = pathinfo($file_name, PATHINFO_FILENAME) . '.webp'; // Update the file name to the WebP version
        } else {
            $file_name = $brt->images;
        }


        $content = $request->isiberita;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            $pos = strpos($data, ';');
            if ($pos == true) {
                list($type, $data) = explode(';', $data);
            }
            $find = strpos($data, ',');
            if ($find == true) {
                list(, $data) = explode(',', $data);
            }
            if (base64_encode(base64_decode($data, true)) === $data) {
                $imgeData = base64_decode($data);
                $image_name = "/berita/image_" . time() . "_" . $item . '.webp';
                $im = imagecreatefromstring($imgeData);
                $path = public_path() . $image_name;
                imagewebp($im, $path);
                imagedestroy($im);
                $image->removeAttribute('src');
                $image->setAttribute('src', $image_name);
            }
        }


        $content = $dom->saveHTML();
        $lower = strtolower($request->judul);
        $link = preg_replace('/\s+/', '-', $lower);
        $tambah = Berita::where('id', $id)->update([
            'nama' => $request->judul,
            'title' => $request->judul,
            'penulis' => $request->penulis,
            'isi' => $content,
            'link' => $link,
            'tgl_publish' => date('Y-m-d', strtotime($request->tgl_publish)),
            //'publish' => $request->publish,
            'images' => $file_name
        ]);

        if ($tambah) {
            return response()->json(['status' => 'success', 'message' => 'update berita berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'update berita gagal'], 400);
        }
    }

    public function delete(Request $req)
    {
        $id = $req->id;
        $hapus = Berita::where('id', $id)->delete();
        if ($hapus) {
            return response()->json(['status' => 'success', 'message' => 'Hapus berita berhasil'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Hapus berita gagal'], 400);
        }
    }
}
