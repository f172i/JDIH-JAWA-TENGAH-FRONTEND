<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PdfController extends Controller
{
    // Halaman upload PDF (form)
    public function showUploadForm()
    {
        return view('admin.upload_pdf');
    }

    // Proses upload file PDF
    // app/Http/Controllers/PdfController.php

    public function uploadPdf(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:10240',
        ]);

        $path = $request->file('pdf')->store('public/pdf');
        $filename = basename($path);

        $pdfPath = storage_path("app/$path"); // contoh: storage/app/public/pdf/xxx.pdf
        $jsonOutput = storage_path('app/kamus/' . pathinfo($filename, PATHINFO_FILENAME) . '.json');

        $scriptPath = base_path('scripts/ekstrak_kamus.py');

        // GUNAKAN escapeshellarg() agar path Windows aman
        $command = "python " . escapeshellarg($scriptPath) . " " . escapeshellarg($pdfPath) . " " . escapeshellarg($jsonOutput);
        
        exec($command, $output, $status);

        if ($status !== 0) {
            dd($command, $output, $status); // debug jika masih gagal
            return back()->with('error', 'Gagal mengekstrak file PDF.');
        }

        return back()->with('success', 'PDF berhasil diunggah dan diekstrak.');
    }


    // Jalankan python untuk ekstrak isi PDF
    public function ekstrak($namaFile)
    {
        $pdfPath = storage_path("app/public/pdf/$namaFile");
        $jsonPath = storage_path("app/public/kamus/" . pathinfo($namaFile, PATHINFO_FILENAME) . ".json");

        $scriptPath = base_path('scripts/ekstrak_kamus.py');

        // Gunakan escapeshellarg untuk menangani spasi/backslash di Windows
        $command = "python " . escapeshellarg($scriptPath) . " " . escapeshellarg($pdfPath) . " " . escapeshellarg($jsonPath);

        exec($command, $output, $status);

        if ($status !== 0) {
            dd($command, $output, $status); // debug hanya sementara
            return back()->with('error', 'Gagal mengekstrak file PDF.');
        }

        return back()->with('success', 'Berhasil mengekstrak dan menyimpan deskripsi.');
    }


}
