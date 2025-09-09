@extends('app-admin')
@section('head')
    @include('admin.partial.head')
@endsection

@section('content')
<div class="container-fluid" style="max-width: 1400px;">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="fas fa-plus-circle text-primary"></i> Tambah Istilah Baru</h2>
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
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary bg-gradient text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-edit"></i> Form Input Istilah Hukum
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.master.glosarium.store') }}" method="POST" id="createForm">
                        @csrf
                        
                        <!-- Judul Istilah -->
                        <div class="mb-4">
                            <label for="judul" class="form-label fw-bold">
                                <i class="fas fa-tag text-primary"></i> Judul Istilah 
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="judul" id="judul" 
                                   class="form-control form-control-lg @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul') }}" required
                                   placeholder="Masukkan istilah hukum, contoh: Koperasi">
                            @error('judul')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-info-circle"></i> Masukkan istilah hukum yang akan didefinisikan
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-bold">
                                <i class="fas fa-file-alt text-success"></i> Deskripsi/Pengertian 
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="deskripsi" id="deskripsi" rows="8" 
                                      class="form-control @error('deskripsi') is-invalid @enderror" 
                                      required placeholder="Jelaskan pengertian atau definisi dari istilah hukum tersebut...">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    <i class="fas fa-exclamation-triangle"></i> {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">
                                <i class="fas fa-lightbulb"></i> Berikan penjelasan yang komprehensif dan mudah dipahami
                            </div>
                        </div>

                        <!-- Informasi Sumber Hukum -->
                        <div class="card border-info mb-4">
                            <div class="card-header bg-info bg-opacity-10">
                                <h6 class="card-title mb-0 text-info">
                                    <i class="fas fa-gavel"></i> Informasi Sumber Hukum (Opsional)
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="judul_perda" class="form-label fw-bold">
                                                <i class="fas fa-balance-scale text-warning"></i> Judul Peraturan
                                            </label>
                                            <input type="text" name="judul_perda" id="judul_perda" 
                                                   class="form-control @error('judul_perda') is-invalid @enderror" 
                                                   value="{{ old('judul_perda') }}"
                                                   placeholder="Contoh: Perda No. 1 Tahun 2025 Tentang Koperasi">
                                            @error('judul_perda')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="link_perda" class="form-label fw-bold">
                                                <i class="fas fa-link text-info"></i> Link Peraturan
                                            </label>
                                            <input type="url" name="link_perda" id="link_perda" 
                                                   class="form-control @error('link_perda') is-invalid @enderror" 
                                                   value="{{ old('link_perda') }}"
                                                   placeholder="https://jdih.jatengprov.go.id/...">
                                            @error('link_perda')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-light border-0 mb-0">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle"></i> 
                                        Informasi sumber hukum membantu pengguna untuk memverifikasi dan mempelajari lebih lanjut tentang istilah yang didefinisikan.
                                    </small>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-secondary me-md-2" onclick="resetForm()">
                                <i class="fas fa-undo"></i> Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <i class="fas fa-save"></i> Simpan Istilah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Information -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-success bg-gradient text-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-lightbulb"></i> Tips Pengisian
                    </h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0">
                            <h6 class="mb-1"><i class="fas fa-check text-success"></i> Judul Istilah</h6>
                            <small class="text-muted">Gunakan istilah yang tepat dan umum digunakan dalam hukum</small>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <h6 class="mb-1"><i class="fas fa-check text-success"></i> Deskripsi</h6>
                            <small class="text-muted">Jelaskan secara detail, jelas, dan mudah dipahami</small>
                        </div>
                        <div class="list-group-item border-0 px-0">
                            <h6 class="mb-1"><i class="fas fa-check text-success"></i> Sumber Hukum</h6>
                            <small class="text-muted">Cantumkan peraturan yang relevan untuk referensi</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-info bg-gradient text-white">
                    <h6 class="card-title mb-0">
                        <i class="fas fa-chart-bar"></i> Statistik Glosarium
                    </h6>
                </div>
                <div class="card-body text-center">
                    @php
                        $totalGlosarium = \App\Models\Glosarium::count();
                        $withSource = \App\Models\Glosarium::whereNotNull('judul_perda')->count();
                        $recentlyAdded = \App\Models\Glosarium::where('created_at', '>=', now()->subDays(7))->count();
                    @endphp
                    
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="p-2 bg-primary bg-opacity-10 rounded">
                                <i class="fas fa-book text-primary fa-2x"></i>
                                <div class="h4 text-primary mb-0 mt-2">{{ $totalGlosarium }}</div>
                                <small class="text-muted">Total Istilah</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 bg-success bg-opacity-10 rounded">
                                <i class="fas fa-link text-success fa-2x"></i>
                                <div class="h4 text-success mb-0 mt-2">{{ $withSource }}</div>
                                <small class="text-muted">Dengan Sumber</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 bg-warning bg-opacity-10 rounded">
                                <i class="fas fa-plus text-warning fa-2x"></i>
                                <div class="h4 text-warning mb-0 mt-2">{{ $recentlyAdded }}</div>
                                <small class="text-muted">7 Hari Ini</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function resetForm() {
    if (confirm('Apakah Anda yakin ingin mengosongkan semua field?')) {
        document.getElementById('createForm').reset();
        // Focus kembali ke field pertama
        document.getElementById('judul').focus();
    }
}

// Auto-uppercase title as user types
document.getElementById('judul').addEventListener('input', function() {
    this.value = this.value.toUpperCase();
});

// Auto-resize textarea
document.getElementById('deskripsi').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Character counter for deskripsi
const deskripsiField = document.getElementById('deskripsi');
const charCounter = document.createElement('div');
charCounter.className = 'form-text text-end';
charCounter.innerHTML = '<small class="text-muted">0 karakter</small>';
deskripsiField.parentNode.appendChild(charCounter);

deskripsiField.addEventListener('input', function() {
    const length = this.value.length;
    charCounter.innerHTML = `<small class="text-muted">${length} karakter</small>`;
});
</script>

@endsection
