<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Glosarium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;

class GlosariumController extends Controller
{
    public function index()
    {
        $kamus = Glosarium::orderBy('created_at', 'desc')->paginate(10); // tampilkan 10 per halaman
        return view('admin.page.glosarium.index', compact('kamus'));
    }

    public function cari(Request $request)
    {
        $query = $request->input('query');

        $kamus = Glosarium::where('judul', 'like', "%$query%")
                    ->orWhere('deskripsi', 'like', "%$query%")
                    ->paginate(10)
                    ->appends(['query' => $query]);

        return view('user.index', compact('kamus'));
    }

    public function admin(Request $request)
    {
        $query = $request->input('query');
        
        if ($query) {
            // Search dengan scope untuk relevansi yang lebih baik
            $kamus = Glosarium::search($query)
                        ->orderByRelevance($query)
                        ->paginate(10)
                        ->appends(['query' => $query]);
        } else {
            $kamus = Glosarium::orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.glosarium.index', compact('kamus'));
    }

    public function uploadPdfForm()
    {
        // ✅ Perbaikan di sini: kirim $kamus agar tidak error di layout
        $kamus = Glosarium::paginate(10);
        
        // Karena sekarang extraction-only, tidak perlu menampilkan file yang sudah diupload
        return view('admin.page.glosarium.upload_pdf', [
            'kamus' => $kamus,
            'uploadedPdfs' => collect([]) // Empty collection
        ]);
    }

    public function uploadPdf(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:10240',
            'judul_perda' => 'required|string|max:255',
            'link_perda' => 'required|url|max:500',
        ]);

        // Ambil nama asli file (tanpa spasi) - hanya untuk identifikasi
        $originalNameRaw = preg_replace('/\s+/', '_', $request->file('pdf')->getClientOriginalName());

        // Simpan file sementara untuk ekstraksi
        $tempName = time() . '_temp_' . $originalNameRaw;
        
        try {
            $tempPath = $request->file('pdf')->storeAs('temp', $tempName);
            $pdfPath = Storage::path("temp/$tempName");
            
            // Pastikan file benar-benar tersimpan
            if (!file_exists($pdfPath)) {
                return back()->with('error', 'Gagal menyimpan file PDF sementara.');
            }
            
            Log::info('PDF uploaded successfully', ['path' => $pdfPath, 'size' => filesize($pdfPath)]);
            
        } catch (Exception $e) {
            Log::error('Failed to store PDF', ['error' => $e->getMessage()]);
            return back()->with('error', 'Gagal menyimpan file PDF: ' . $e->getMessage());
        }
        
        // Path untuk JSON
        $jsonName = pathinfo($tempName, PATHINFO_FILENAME) . '.json';
        $jsonPath = storage_path("app/public/kamus/$jsonName");
        $scriptPath = base_path("scripts/ekstrak_kamus.py");

        // Pastikan direktori kamus ada
        $kamusDir = dirname($jsonPath);
        if (!is_dir($kamusDir)) {
            try {
                mkdir($kamusDir, 0755, true);
                Log::info('Created directory', ['path' => $kamusDir]);
            } catch (Exception $e) {
                Log::error('Failed to create directory', ['path' => $kamusDir, 'error' => $e->getMessage()]);
                return back()->with('error', 'Gagal membuat direktori output: ' . $e->getMessage());
            }
        }

        // Pastikan direktori dapat ditulis
        if (!is_writable($kamusDir)) {
            Log::error('Directory not writable', ['path' => $kamusDir]);
            return back()->with('error', 'Direktori output tidak dapat ditulis: ' . $kamusDir);
        }

        // Buat command dengan full path Python jika perlu
        $pythonCmd = 'python';  // atau bisa gunakan 'C:\Python\python.exe' jika ada masalah path
        
        // Normalize paths for Windows
        $normalizedPdfPath = str_replace('/', DIRECTORY_SEPARATOR, $pdfPath);
        $normalizedJsonPath = str_replace('/', DIRECTORY_SEPARATOR, $jsonPath);
        $normalizedScriptPath = str_replace('/', DIRECTORY_SEPARATOR, $scriptPath);
        
        $command = "$pythonCmd " . escapeshellarg($normalizedScriptPath) . " " . escapeshellarg($normalizedPdfPath) . " " . escapeshellarg($normalizedJsonPath);
        
        Log::info('Executing Python script', [
            'command' => $command,
            'pdf_path' => $normalizedPdfPath,
            'pdf_exists' => file_exists($normalizedPdfPath),
            'pdf_size' => file_exists($normalizedPdfPath) ? filesize($normalizedPdfPath) : 'N/A',
            'script_exists' => file_exists($normalizedScriptPath),
            'json_dir' => dirname($normalizedJsonPath),
            'json_dir_exists' => is_dir(dirname($normalizedJsonPath)),
            'json_dir_writable' => is_writable(dirname($normalizedJsonPath))
        ]);

        // Eksekusi dengan output capture yang lebih baik
        $output = [];
        $status = 0;
        
        // Set timeout and working directory
        $descriptorspec = [
            0 => ["pipe", "r"],
            1 => ["pipe", "w"],
            2 => ["pipe", "w"]
        ];
        
        $process = proc_open($command, $descriptorspec, $pipes, getcwd());
        
        if (is_resource($process)) {
            // Close stdin
            fclose($pipes[0]);
            
            // Read stdout and stderr
            $stdout = stream_get_contents($pipes[1]);
            $stderr = stream_get_contents($pipes[2]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            
            // Get exit status
            $status = proc_close($process);
            
            // Combine output
            $output = array_filter(explode("\n", trim($stdout . "\n" . $stderr)));
        } else {
            Log::error('Failed to create process for Python script');
            return back()->with('error', 'Gagal menjalankan script ekstraksi PDF.');
        }

        // Hapus file PDF sementara setelah ekstraksi
        if (Storage::exists("temp/$tempName")) {
            Storage::delete("temp/$tempName");
        }

        // Debug output
        Log::info('Python script execution completed', [
            'status' => $status,
            'output' => $output,
            'json_exists' => file_exists($jsonPath)
        ]);

        if (!file_exists($jsonPath)) {
            $errorMsg = 'Ekstraksi gagal atau file tidak ditemukan.';
            if (!empty($output)) {
                $errorMsg .= '<br><strong>Debug Info:</strong><br>' . implode('<br>', $output);
            }
            if ($status !== 0) {
                $errorMsg .= '<br><strong>Exit Code:</strong> ' . $status;
            }
            
            Log::warning('Ekstraksi gagal. File JSON tidak ditemukan.', compact('command', 'status', 'output'));
            return back()->with('error', $errorMsg);
        }

        $jsonContent = file_get_contents($jsonPath);
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
            Log::warning('JSON decode error', ['error' => json_last_error_msg(), 'path' => $jsonPath]);
            return back()->with('error', 'Gagal membaca isi file JSON: ' . json_last_error_msg());
        }

        if (empty($data)) {
            return back()->with('error', 'File PDF tidak mengandung istilah yang dapat diekstrak. Pastikan PDF berisi definisi dengan format "istilah adalah..."');
        }

        // Simpan data ke database tanpa path PDF
        $duplicateTerms = []; // Array untuk menyimpan istilah yang duplikat
        $successCount = 0;
        
        foreach ($data as $key => $item) {
            // Handle both old format (key => description) and new format (key => {istilah, definisi})
            if (is_array($item) && isset($item['istilah']) && isset($item['definisi'])) {
                // New format
                $judulNormalized = mb_strtolower(trim($item['istilah']));
                $deskripsiTrimmed = trim($item['definisi']);
            } else {
                // Old format (fallback)
                $judulNormalized = mb_strtolower(trim($key));
                $deskripsiTrimmed = is_string($item) ? trim($item) : '';
            }

            // Skip empty items
            if (empty($judulNormalized) || empty($deskripsiTrimmed)) {
                continue;
            }

            $existing = Glosarium::where('judul', $judulNormalized)->first();

            if ($existing) {
                // Jika ada duplikasi, simpan untuk ditampilkan ke admin
                $duplicateTerms[] = [
                    'judul' => $judulNormalized,
                    'existing_desc' => $existing->deskripsi,
                    'new_desc' => $deskripsiTrimmed,
                    'existing_id' => $existing->id
                ];
            } else {
                // Tambahkan baru tanpa sumber_pdf
                Glosarium::create([
                    'judul' => mb_strtoupper($judulNormalized),  // Automatically uppercase
                    'deskripsi' => $deskripsiTrimmed,
                    'sumber_pdf' => null, // Tidak simpan path PDF
                    'judul_perda' => $request->judul_perda,
                    'link_perda' => $request->link_perda,
                ]);
                $successCount++;
            }
        }

        // Hapus file JSON setelah proses (optional)
        if (file_exists($jsonPath)) {
            unlink($jsonPath);
        }

        // Jika ada duplikasi, redirect ke halaman resolusi
        if (!empty($duplicateTerms)) {
            session(['duplicate_terms' => $duplicateTerms]);
            session(['new_perda_data' => [
                'sumber_pdf' => null, // Tidak ada path PDF
                'judul_perda' => $request->judul_perda,
                'link_perda' => $request->link_perda,
            ]]);
            return redirect()->route('admin.master.glosarium.resolve.duplicates')->with('success', 'PDF berhasil diekstrak. Ditemukan ' . count($duplicateTerms) . ' istilah duplikat yang perlu direview.');
        }

        if ($successCount > 0) {
            return redirect()->route('admin.master.glosarium')->with('success', "PDF '{$originalNameRaw}' berhasil diekstrak. Ditemukan {$successCount} istilah baru.");
        } else {
            return back()->with('warning', 'PDF berhasil diproses tetapi tidak ada istilah baru yang ditambahkan (semua mungkin duplikat).');
        }
    }

    public function simpanIstilah(Request $request)
    {
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');

        // Cek apakah istilah dengan judul yang sama sudah ada
        $istilah = Glosarium::where('judul', $judul)->first();

        if ($istilah) {
            // Jika ada, update dengan deskripsi baru
            $istilah->deskripsi = $deskripsi;
            $istilah->save();
        } else {
            // Jika tidak ada, buat baru
            Glosarium::create([
                'judul' => mb_strtoupper($judul),  // Automatically uppercase
                'deskripsi' => $deskripsi
            ]);
        }

        return redirect()->route('admin.master.glosarium')->with('success', 'Istilah berhasil disimpan atau diperbarui.');
    }

    /**
     * Check if PDF with same name already exists
     */
    public function checkPdfExists(Request $request)
    {
        $filename = $request->input('filename');
        
        if (!$filename) {
            return response()->json(['exists' => false]);
        }
        
        $exists = Glosarium::where('sumber_pdf', 'LIKE', '%' . $filename)
            ->orWhere('sumber_pdf', 'LIKE', '%' . pathinfo($filename, PATHINFO_FILENAME) . '%')
            ->exists();
            
        return response()->json(['exists' => $exists]);
    }

    /**
     * Show duplicate resolution page
     */
    public function resolveDuplicates()
    {
        $duplicateTerms = session('duplicate_terms', []);
        $newPerdaData = session('new_perda_data', []);
        
        if (empty($duplicateTerms)) {
            return redirect()->route('admin.master.glosarium')->with('error', 'Tidak ada duplikasi yang perlu diresolve.');
        }
        
        return view('admin.page.glosarium.resolve_duplicates', compact('duplicateTerms', 'newPerdaData'));
    }

    /**
     * Process duplicate resolution
     */
    public function processDuplicates(Request $request)
    {
        $duplicateTerms = session('duplicate_terms', []);
        $newPerdaData = session('new_perda_data', []);
        $decisions = $request->input('decisions', []);
        
        foreach ($duplicateTerms as $index => $term) {
            $decision = $decisions[$index] ?? 'keep_existing';
            
            if ($decision === 'create_new') {
                // Buat entry baru dengan suffix
                Glosarium::create([
                    'judul' => mb_strtoupper($term['judul'] . ' (alternatif)'),  // Automatically uppercase
                    'deskripsi' => $term['new_desc'],
                    'sumber_pdf' => null, // Tidak ada PDF
                    'judul_perda' => $newPerdaData['judul_perda'],
                    'link_perda' => $newPerdaData['link_perda'],
                ]);
            } elseif ($decision === 'replace_existing') {
                // Ganti definisi yang ada dengan yang baru
                $existingRecord = Glosarium::find($term['existing_id']);
                if ($existingRecord) {
                    $existingRecord->update([
                        'deskripsi' => $term['new_desc'],
                        'judul_perda' => $newPerdaData['judul_perda'],
                        'link_perda' => $newPerdaData['link_perda'],
                    ]);
                }
            } elseif ($decision === 'use_both') {
                // Gunakan semua - simpan yang baru dengan angka romawi
                $romanNumeral = $this->getNextRomanNumeral($term['judul']);
                Glosarium::create([
                    'judul' => mb_strtoupper($term['judul'] . ' ' . $romanNumeral),  // Automatically uppercase
                    'deskripsi' => $term['new_desc'],
                    'sumber_pdf' => null, // Tidak ada PDF
                    'judul_perda' => $newPerdaData['judul_perda'],
                    'link_perda' => $newPerdaData['link_perda'],
                ]);
            }
            // Jika 'keep_existing', tidak perlu melakukan apa-apa
        }
        
        // Hapus session data
        session()->forget(['duplicate_terms', 'new_perda_data']);
        
        return redirect()->route('admin.master.glosarium')->with('success', 'Duplikasi berhasil diresolve.');
    }

    /**
     * Get next roman numeral for duplicate terms
     */
    private function getNextRomanNumeral($baseTitle)
    {
        // Roman numerals array
        $romanNumerals = ['II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X'];
        
        // Check existing entries with roman numerals
        foreach ($romanNumerals as $numeral) {
            $existingWithNumeral = Glosarium::where('judul', $baseTitle . ' ' . $numeral)->first();
            if (!$existingWithNumeral) {
                return $numeral;
            }
        }
        
        // If all roman numerals I-X are taken, use XI, XII, etc.
        // For simplicity, we'll just add a timestamp suffix
        return 'XI';
    }

    /**
     * AJAX search untuk live search admin
     */
    public function ajaxSearch(Request $request)
    {
        $query = $request->input('query', '');
        
        if (empty($query)) {
            $kamus = Glosarium::orderBy('created_at', 'desc')->paginate(10);
        } else {
            $kamus = Glosarium::search($query)
                        ->orderByRelevance($query)
                        ->paginate(10);
        }

        // Statistics
        $stats = [
            'total' => $kamus->total(),
            'with_perda' => Glosarium::whereNotNull('link_perda')->count(),
            'from_pdf' => Glosarium::whereNotNull('sumber_pdf')->count(),
            'manual' => Glosarium::whereNull('sumber_pdf')->whereNull('link_perda')->count()
        ];

        return response()->json([
            'data' => $kamus->items(),
            'pagination' => [
                'total' => $kamus->total(),
                'current_page' => $kamus->currentPage(),
                'last_page' => $kamus->lastPage(),
                'per_page' => $kamus->perPage(),
                'from' => $kamus->firstItem(),
                'to' => $kamus->lastItem(),
                'has_pages' => $kamus->hasPages(),
                'links' => $kamus->links()->render()
            ],
            'stats' => $stats,
            'query' => $query
        ]);
    }
    public function deleteJson(Request $request)
    {
        $jsonFile = $request->input('json_file');
        
        if (!$jsonFile) {
            return response()->json(['success' => false, 'message' => 'Nama file JSON tidak valid']);
        }
        
        $jsonPath = storage_path('app/public/kamus/' . $jsonFile);
        
        if (file_exists($jsonPath)) {
            unlink($jsonPath);
            return response()->json([
                'success' => true, 
                'message' => "File JSON {$jsonFile} berhasil dihapus"
            ]);
        } else {
            return response()->json(['success' => false, 'message' => 'File JSON tidak ditemukan']);
        }
    }

    /**
     * Show create form for manual entry
     */
    public function create()
    {
        return view('admin.page.glosarium.create');
    }

    /**
     * Store manually created glossary item
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'judul_perda' => 'nullable|string|max:255',
            'link_perda' => 'nullable|url|max:500',
        ]);

        $judulNormalized = mb_strtolower(trim($request->judul));
        
        // Cek duplikasi
        $existing = Glosarium::where('judul', $judulNormalized)->first();
        if ($existing) {
            return back()->withInput()->with('error', 'Istilah dengan judul yang sama sudah ada.');
        }

        Glosarium::create([
            'judul' => mb_strtoupper($judulNormalized),  // Automatically uppercase
            'deskripsi' => trim($request->deskripsi),
            'judul_perda' => $request->judul_perda,
            'link_perda' => $request->link_perda,
        ]);

        return redirect()->route('admin.master.glosarium')->with('success', 'Istilah berhasil ditambahkan.');
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $item = Glosarium::findOrFail($id);
        return view('admin.page.glosarium.edit', compact('item'));
    }

    /**
     * Update glossary item
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'judul_perda' => 'nullable|string|max:255',
            'link_perda' => 'nullable|url|max:500',
        ]);

        $item = Glosarium::findOrFail($id);
        $judulNormalized = mb_strtolower(trim($request->judul));
        
        // Cek duplikasi kecuali untuk item yang sedang diedit
        $existing = Glosarium::where('judul', $judulNormalized)
            ->where('id', '!=', $id)
            ->first();
            
        if ($existing) {
            return back()->withInput()->with('error', 'Istilah dengan judul yang sama sudah ada.');
        }

        $item->update([
            'judul' => mb_strtoupper($judulNormalized),  // Automatically uppercase
            'deskripsi' => trim($request->deskripsi),
            'judul_perda' => $request->judul_perda,
            'link_perda' => $request->link_perda,
        ]);

        return redirect()->route('admin.master.glosarium')->with('success', 'Istilah berhasil diperbarui.');
    }

    /**
     * Delete glossary item
     */
    public function destroy($id)
    {
        $item = Glosarium::findOrFail($id);
        $item->delete();
        
        return redirect()->route('admin.master.glosarium')->with('success', 'Istilah berhasil dihapus.');
    }

}
