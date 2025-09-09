@extends('app-admin')
@section('head')
    @include('admin.partial.head')
@endsection

@section('content')
<div class="container">
    <h2>Resolve Duplicate Terms</h2>
    <p class="text-muted">Ditemukan istilah yang sama dengan pengertian berbeda. Pilih tindakan untuk setiap istilah:</p>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Bulk Action Controls -->
    <div class="card mb-4 bg-light">
        <div class="card-body">
            <h5 class="card-title"><i class="fas fa-tasks"></i> Pilih Semua</h5>
            
            <div class="row">
                <div class="col-md-3">
                    <button type="button" class="btn btn-outline-primary btn-sm w-100 mb-2" 
                            id="btn-keep-existing" data-action="keep_existing" 
                            onclick="pilihSemua('keep_existing')">
                        <i class="fas fa-shield-alt"></i> Gunakan Yang Sudah Ada
                    </button>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-outline-warning btn-sm w-100 mb-2" 
                            id="btn-replace-existing" data-action="replace_existing"
                            onclick="pilihSemua('replace_existing')">
                        <i class="fas fa-sync-alt"></i> Ganti Baru
                    </button>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-outline-success btn-sm w-100 mb-2" 
                            id="btn-use-both" data-action="use_both"
                            onclick="pilihSemua('use_both')">
                        <i class="fas fa-copy"></i> Gunakan Semua (Romawi)
                    </button>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-outline-info btn-sm w-100 mb-2" 
                            id="btn-reset" onclick="resetSemua()">
                        <i class="fas fa-eraser"></i> Reset Pilihan
                    </button>
                </div>
            </div>
            <div id="feedback" class="alert alert-success mt-2" style="display: none;"></div>
        </div>
    </div>

    <form action="{{ route('admin.master.glosarium.process.duplicates') }}" method="POST">
        @csrf
        
        @foreach($duplicateTerms as $index => $term)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Istilah: <strong>{{ ucfirst($term['judul']) }}</strong></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-primary">Definisi yang Ada (Database)</h6>
                        <div class="border p-3 bg-light rounded">
                            {{ $term['existing_desc'] }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-success">Definisi Baru (dari PDF)</h6>
                        <div class="border p-3 bg-light rounded">
                            {{ $term['new_desc'] }}
                        </div>
                    </div>
                </div>
                
                <hr>
                
                <div class="mt-3">
                    <label class="form-label"><strong>Pilih Tindakan:</strong></label>
                    <div class="form-check">
                        <input class="form-check-input decision-radio" type="radio" name="decisions[{{ $index }}]" 
                               id="keep_existing_{{ $index }}" value="keep_existing" checked>
                        <label class="form-check-label" for="keep_existing_{{ $index }}">
                            <i class="fas fa-shield-alt text-primary"></i> <strong>Gunakan yang sudah ada</strong> - Pertahankan definisi yang ada di database
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input decision-radio" type="radio" name="decisions[{{ $index }}]" 
                               id="replace_existing_{{ $index }}" value="replace_existing">
                        <label class="form-check-label" for="replace_existing_{{ $index }}">
                            <i class="fas fa-sync-alt text-warning"></i> <strong>Ganti baru</strong> - Ganti dengan definisi dari PDF
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input decision-radio" type="radio" name="decisions[{{ $index }}]" 
                               id="use_both_{{ $index }}" value="use_both">
                        <label class="form-check-label" for="use_both_{{ $index }}">
                            <i class="fas fa-copy text-success"></i> <strong>Gunakan semua</strong> - Simpan keduanya, yang baru diberi angka romawi ({{ ucfirst($term['judul']) }} II)
                        </label>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="fas fa-check"></i> Proses Semua Keputusan
            </button>
            <a href="{{ route('admin.master.glosarium') }}" class="btn btn-secondary btn-lg ms-2">
                <i class="fas fa-times"></i> Batalkan
            </a>
        </div>
    </form>
</div>

@push('styles')
<style>
.form-check-label {
    margin-left: 0.5rem;
    cursor: pointer;
}
.card-header h5 {
    color: #495057;
}
.bg-light {
    border-left: 4px solid #007bff;
}
</style>
@endpush

@section('script')
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded - Script loaded successfully');
    
    // Event listeners untuk semua tombol bulk action
    const btnKeepExisting = document.getElementById('btn-keep-existing');
    const btnReplaceExisting = document.getElementById('btn-replace-existing');
    const btnUseBoth = document.getElementById('btn-use-both');
    const btnReset = document.getElementById('btn-reset');
    
    console.log('Button elements:', {
        btnKeepExisting: btnKeepExisting,
        btnReplaceExisting: btnReplaceExisting,
        btnUseBoth: btnUseBoth,
        btnReset: btnReset
    });
    
    if (btnKeepExisting) {
        btnKeepExisting.addEventListener('click', function() {
            console.log('Tombol Keep Existing diklik');
            pilihSemua('keep_existing');
        });
    }
    
    if (btnReplaceExisting) {
        btnReplaceExisting.addEventListener('click', function() {
            console.log('Tombol Replace Existing diklik');
            pilihSemua('replace_existing');
        });
    }
    
    if (btnUseBoth) {
        btnUseBoth.addEventListener('click', function() {
            console.log('Tombol Use Both diklik');
            pilihSemua('use_both');
        });
    }
    
    if (btnReset) {
        btnReset.addEventListener('click', function() {
            console.log('Tombol Reset diklik');
            resetSemua();
        });
    }
    
    // Fungsi pilih semua - dengan debugging
    window.pilihSemua = function(action) {
        console.log('pilihSemua dipanggil dengan action:', action);
        
        try {
            var totalChanged = 0;
            var radios = document.querySelectorAll('input[type="radio"].decision-radio');
            console.log('Ditemukan radio buttons:', radios.length);
            
            for (var i = 0; i < radios.length; i++) {
                var radio = radios[i];
                if (radio.value === action) {
                    radio.checked = true;
                    totalChanged++;
                    console.log('Radio changed:', radio.name, 'to', action);
                }
            }
            
            console.log('Total changed:', totalChanged);
            tampilkanFeedback(action, totalChanged);
            
        } catch (error) {
            console.error('Error in pilihSemua:', error);
            alert('Error: ' + error.message);
        }
    };

    window.resetSemua = function() {
        console.log('resetSemua dipanggil');
        
        try {
            var totalChanged = 0;
            var radios = document.querySelectorAll('input[type="radio"].decision-radio');
            console.log('Reset - ditemukan radio buttons:', radios.length);
            
            for (var i = 0; i < radios.length; i++) {
                var radio = radios[i];
                if (radio.value === 'keep_existing') {
                    radio.checked = true;
                    totalChanged++;
                }
            }
            
            tampilkanFeedback('reset', totalChanged);
            
        } catch (error) {
            console.error('Error in resetSemua:', error);
            alert('Error: ' + error.message);
        }
    };

    function tampilkanFeedback(action, jumlah) {
        console.log('tampilkanFeedback dipanggil:', action, jumlah);
        
        var pesan = '';
        if (action === 'keep_existing') pesan = 'Semua dipilih: Gunakan yang sudah ada';
        else if (action === 'replace_existing') pesan = 'Semua dipilih: Ganti baru';
        else if (action === 'use_both') pesan = 'Semua dipilih: Gunakan semua (Romawi)';
        else if (action === 'reset') pesan = 'Semua pilihan direset';
        
        var feedback = document.getElementById('feedback');
        if (feedback) {
            var jumlahIstilah = Math.floor(jumlah/3);
            feedback.innerHTML = '<i class="fas fa-check-circle"></i> ' + pesan + ' (' + jumlahIstilah + ' istilah)';
            feedback.style.display = 'block';
            
            setTimeout(function() {
                feedback.style.display = 'none';
            }, 3000);
        } else {
            console.error('Feedback element tidak ditemukan');
        }
    }
});
</script>
@endsection
@endsection
