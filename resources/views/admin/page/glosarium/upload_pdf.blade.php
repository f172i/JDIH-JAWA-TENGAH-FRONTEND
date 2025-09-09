@extends('app-admin')
@section('head')
    @include('admin.partial.head')
@endsection

@section('content')
<div class="container-fluid" style="max-width: 1100px; margin-left:0; margin-right:auto;">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-file-pdf text-danger"></i> Upload & Ekstraksi PDF</h2>
                <a href="{{ route('admin.master.glosarium') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {!! session('error') !!}
            @if(session('search_suggestion'))
                <br><br>
                <a href="{{ route('admin.master.glosarium') }}?query={{ session('search_suggestion') }}" class="btn btn-sm btn-outline-light">
                    🔍 Cari "{{ session('search_suggestion') }}"
                </a>
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> {!! session('warning') !!}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <!-- Form Upload -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-danger bg-gradient text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-upload"></i> Form Upload PDF
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info border-0 mb-4">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-info-circle fa-2x text-info me-3"></i>
                            <div>
                                <h6 class="alert-heading mb-1">Mode Extraction-Only</h6>
                                <p class="mb-0">PDF akan diekstrak langsung ke database tanpa disimpan sebagai file untuk optimasi storage. Sistem akan menganalisis dan mengekstrak istilah hukum secara otomatis.</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('admin.master.glosarium.upload.pdf') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                        @csrf
                        
                        <!-- Informasi Dokumen -->
                        <div class="card border-primary mb-4">
                            <div class="card-header bg-primary bg-opacity-10">
                                <h6 class="card-title mb-0 text-primary">
                                    <i class="fas fa-file-contract"></i> Informasi Dokumen Hukum
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="judul_perda" class="form-label fw-bold">
                                                <i class="fas fa-gavel text-warning"></i> Judul Peraturan 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="judul_perda" id="judul_perda" 
                                                   class="form-control form-control-lg @error('judul_perda') is-invalid @enderror" 
                                                   value="{{ old('judul_perda') }}" required
                                                   placeholder="Contoh: Perda No. 1 Tahun 2025 Tentang Koperasi">
                                            @error('judul_perda')
                                                <div class="invalid-feedback">
                                                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-text">
                                                <i class="fas fa-lightbulb"></i> Masukkan judul lengkap peraturan daerah
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="link_perda" class="form-label fw-bold">
                                                <i class="fas fa-link text-info"></i> Link Peraturan 
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="url" name="link_perda" id="link_perda" 
                                                   class="form-control form-control-lg @error('link_perda') is-invalid @enderror" 
                                                   value="{{ old('link_perda') }}" required
                                                   placeholder="https://jdih.jatengprov.go.id/...">
                                            @error('link_perda')
                                                <div class="invalid-feedback">
                                                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                                </div>
                                            @enderror
                                            <div class="form-text">
                                                <i class="fas fa-globe"></i> URL lengkap ke dokumen resmi
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- File Upload -->
                        <div class="card border-success mb-4">
                            <div class="card-header bg-success bg-opacity-10">
                                <h6 class="card-title mb-0 text-success">
                                    <i class="fas fa-cloud-upload-alt"></i> Upload File PDF
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="pdf" class="form-label fw-bold">
                                        <i class="fas fa-file-pdf text-danger"></i> Pilih File PDF 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" name="pdf" id="pdf" 
                                           class="form-control form-control-lg @error('pdf') is-invalid @enderror" 
                                           accept=".pdf" required>
                                    @error('pdf')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                        </div>
                                    @enderror
                                    <div class="form-text">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-info-circle text-info me-2"></i>
                                            <span>Maksimal 10MB. PDF akan diekstrak langsung ke database tanpa disimpan sebagai file.</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- File Preview Area -->
                                <div id="filePreview" class="d-none">
                                    <div class="alert alert-light border">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-file-pdf text-danger fa-2x me-3"></i>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1" id="fileName"></h6>
                                                <small class="text-muted" id="fileSize"></small>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="clearFile()">
                                                <i class="fas fa-times"></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Buttons -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-secondary me-md-2" onclick="resetUploadForm()">
                                <i class="fas fa-undo"></i> Reset Form
                            </button>
                            <button type="submit" class="btn btn-danger btn-lg px-4" id="submitBtn">
                                <i class="fas fa-upload"></i> Upload & Ekstrak
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Information -->
        <div class="col-lg-4">
            <!-- Statistics Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-info bg-gradient text-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-chart-pie"></i> Statistik Sistem
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="p-3 bg-primary bg-opacity-10 rounded mb-3">
                                <i class="fas fa-book text-primary fa-2x"></i>
                                <div class="h4 text-primary mb-0 mt-2">{{ $kamus->total() ?? 0 }}</div>
                                <small class="text-muted">Total Istilah</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-success bg-opacity-10 rounded mb-3">
                                <i class="fas fa-file-pdf text-success fa-2x"></i>
                                <div class="h4 text-success mb-0 mt-2">{{ \App\Models\Glosarium::whereNotNull('judul_perda')->distinct('judul_perda')->count() }}</div>
                                <small class="text-muted">PDF Diproses</small>
                            </div>
                        </div>
                    </div>
                    
                    @php
                        $manualEntries = \App\Models\Glosarium::whereNull('judul_perda')->count();
                        $recentEntries = \App\Models\Glosarium::where('created_at', '>=', now()->subDays(7))->count();
                    @endphp
                    
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="p-3 bg-warning bg-opacity-10 rounded">
                                <i class="fas fa-edit text-warning fa-2x"></i>
                                <div class="h4 text-warning mb-0 mt-2">{{ $manualEntries }}</div>
                                <small class="text-muted">Input Manual</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-info bg-opacity-10 rounded">
                                <i class="fas fa-clock text-info fa-2x"></i>
                                <div class="h4 text-info mb-0 mt-2">{{ $recentEntries }}</div>
                                <small class="text-muted">7 Hari Ini</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PDF History Card -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-warning bg-gradient text-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-history"></i> Riwayat PDF Terbaru
                    </h6>
                </div>
                <div class="card-body">
                    @php
                        $pdfHistory = \App\Models\Glosarium::whereNotNull('judul_perda')
                            ->select('judul_perda', 'link_perda', 'created_at')
                            ->distinct('judul_perda')
                            ->orderBy('created_at', 'desc')
                            ->limit(5)
                            ->get();
                    @endphp

                    @if($pdfHistory->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($pdfHistory as $pdf)
                                <div class="list-group-item border-0 px-0 py-3">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1 me-2">
                                            <h6 class="mb-1">{{ Str::limit($pdf->judul_perda, 35) }}</h6>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar-alt"></i> 
                                                {{ $pdf->created_at->format('d M Y, H:i') }}
                                            </small>
                                        </div>
                                        @if($pdf->link_perda)
                                            <a href="{{ $pdf->link_perda }}" target="_blank" 
                                               class="btn btn-sm btn-outline-primary" title="Lihat Dokumen">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        @if(\App\Models\Glosarium::whereNotNull('judul_perda')->distinct('judul_perda')->count() > 5)
                            <div class="text-center mt-3">
                                <small class="text-muted">
                                    + {{ \App\Models\Glosarium::whereNotNull('judul_perda')->distinct('judul_perda')->count() - 5 }} PDF lainnya
                                </small>
                            </div>
                        @endif
                    @else
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3 opacity-50"></i>
                            <p class="mb-0">Belum ada PDF yang diproses</p>
                            <small>Upload PDF pertama Anda!</small>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Tips Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-secondary bg-gradient text-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-lightbulb"></i> Tips Upload PDF
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 py-2">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <div>
                                    <small><strong>Format PDF Berkualitas</strong></small>
                                    <br><small class="text-muted">Gunakan PDF yang dapat dicari (searchable PDF)</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-2">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <div>
                                    <small><strong>Ukuran File</strong></small>
                                    <br><small class="text-muted">Maksimal 10MB untuk performa optimal</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item border-0 px-0 py-2">
                            <div class="d-flex align-items-start">
                                <i class="fas fa-check-circle text-success me-2 mt-1"></i>
                                <div>
                                    <small><strong>Ekstraksi Otomatis</strong></small>
                                    <br><small class="text-muted">Sistem akan menganalisis dan mengekstrak istilah secara otomatis</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
.list-group-item {
    border-left: none;
    border-right: none;
}
.list-group-item:first-child {
    border-top: none;
}
.list-group-item:last-child {
    border-bottom: none;
}

/* Loading animation */
.loading-spinner {
    display: none;
}

.btn:disabled .loading-spinner {
    display: inline-block;
}

/* File preview animations */
#filePreview {
    animation: fadeIn 0.3s ease-in;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endpush

@push('scripts')
<script>
function resetUploadForm() {
    if (confirm('Apakah Anda yakin ingin mengosongkan semua field?')) {
        document.getElementById('uploadForm').reset();
        clearFile();
        document.getElementById('judul_perda').focus();
    }
}

function clearFile() {
    document.getElementById('pdf').value = '';
    document.getElementById('filePreview').classList.add('d-none');
}

// File preview functionality
document.getElementById('pdf').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('filePreview');
    
    if (file) {
        const fileName = file.name;
        const fileSize = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
        
        document.getElementById('fileName').textContent = fileName;
        document.getElementById('fileSize').textContent = fileSize;
        preview.classList.remove('d-none');
        
        // Check file size
        if (file.size > 10 * 1024 * 1024) { // 10MB
            alert('Ukuran file terlalu besar! Maksimal 10MB.');
            clearFile();
        }
    } else {
        preview.classList.add('d-none');
    }
});

// Form submission with loading state
document.getElementById('uploadForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span>Mengupload & Mengekstrak...';
    
    // Show loading message
    const loadingAlert = document.createElement('div');
    loadingAlert.className = 'alert alert-info mt-3';
    loadingAlert.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sedang memproses PDF... Mohon tunggu.';
    this.appendChild(loadingAlert);
});

// Auto-focus on page load
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('judul_perda').focus();
});
</script>
@endpush
@endsection
