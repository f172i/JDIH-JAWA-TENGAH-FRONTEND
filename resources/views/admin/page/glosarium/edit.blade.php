@extends('app-admin')
@section('head')
    @include('admin.partial.head')
@endsection

@section('content')
<div class="container">
    <h2>Edit Istilah</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master.glosarium.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Istilah <span class="text-danger">*</span></label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" 
                           value="{{ old('judul', $item->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi/Pengertian <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" id="deskripsi" rows="4" 
                              class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $item->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="judul_perda" class="form-label">Judul Perda</label>
                            <input type="text" name="judul_perda" id="judul_perda" 
                                   class="form-control @error('judul_perda') is-invalid @enderror" 
                                   value="{{ old('judul_perda', $item->judul_perda) }}"
                                   placeholder="Contoh: Perda No. 1 Tahun 2025">
                            @error('judul_perda')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="link_perda" class="form-label">Link Perda</label>
                            <input type="url" name="link_perda" id="link_perda" 
                                   class="form-control @error('link_perda') is-invalid @enderror" 
                                   value="{{ old('link_perda', $item->link_perda) }}"
                                   placeholder="https://jdih.kkp.go.id/...">
                            @error('link_perda')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                @if($item->sumber_pdf)
                <div class="mb-3">
                    <label class="form-label">File PDF Sumber</label>
                    <div class="border p-2 rounded bg-light">
                        <a href="{{ asset('storage/' . $item->sumber_pdf) }}" target="_blank" class="text-decoration-none">
                            <i class="fas fa-file-pdf text-danger"></i> {{ basename($item->sumber_pdf) }}
                        </a>
                    </div>
                </div>
                @endif

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('admin.master.glosarium') }}" class="btn btn-secondary ms-2">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Auto-uppercase title as user types
document.getElementById('judul').addEventListener('input', function() {
    this.value = this.value.toUpperCase();
});
</script>

@endsection
