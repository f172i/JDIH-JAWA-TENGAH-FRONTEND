@extends('app-admin')
@section('head')
    @include('admin.partial.head')

@endsection
@section('content')
<!--begin::Wrapper-->

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<!--begin::Container-->
							<div id="kt_toolbar_container" class="container-fluid flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Selamat Datang, {{session()->get('name')}} !</h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
                            <div class="card mb-5 mb-xl-10">
                                <!--begin::Card header-->
                                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bolder m-0">Form Tambah Produk Hukum</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Content-->
                                <div id="kt_account_settings_profile_details" class="collapse show">
                                    <div class="card card-custom">
                                        <!--begin::Form-->
                                            <form id="post_file" class="form" action="#" method="post"  enctype="multipart/form-data">
                                                <div class="card-body">
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Tipe Produk Hukum</label>
                                                        <div class="col-8">
                                                            <select class="form-select form-select-solid mb-3 mb-lg-0" id="tipe_dokumen" data-kt-select2="true" required>
                                                                <option>-- Pilih Tipe --</option>
                                                                <option value="1">Peraturan Perundangan-undangan</option>
                                                                <option value="2">Monografi Hukum</option>
                                                                <option value="3">Artikel Hukum</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Kategori Produk Hukum</label>
                                                        <div class="col-8">
                                                            <select class="form-select form-select-solid mb-3 mb-lg-0" id="jenis" data-kt-select2="true" required>
                                                                <option>-- Pilih Kategori --</option>
                                                                @foreach($kategori as $k)
                                                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if(session('role') === 'opd')
                                                                <small class="form-text text-muted mt-2">
                                                                    <i class="fa fa-info-circle"></i> 
                                                                    Sebagai pengguna OPD, Anda hanya dapat memilih kategori yang sesuai dengan kewenangan OPD.
                                                                </small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Bidang Hukum</label>
                                                        <div class="col-8">
                                                            <select class="form-select form-select-solid mb-3 mb-lg-0" id="bidang" data-kt-select2="true" required>
                                                            <option>-- Pilih Bidang Hukum --</option>
                                                                @foreach($bidang as $b)
                                                                    <option value="{{ $b->id }}">{{ $b->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Nomor Peraturan</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Nomor Peraturan" id="no_peraturan" name="no_peraturan" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Pengarang</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Pengarang" id="pengarang" name="pengarang" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Tanggal Di tetapkan</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 pilihtanggal" type="text" placeholder="Tanggal Di tetapkan" id="tgl_ditetapkan" name="tgl_ditetapkan" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Tanggal Di Undang</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 pilihtanggal" type="text" placeholder="Tanggal Di Undang" id="tgl_diundang" name="tgl_diundang"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Tahun</label>
                                                        <div class="col-8">
                                                            <select class="form-select form-select-solid form-control-lg" data-kt-select2="true" id="tahun">
                                                            <option></option>
                                                            @foreach ( range( date('Y'),1800 ) as $i )
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Tentang</label>
                                                        <div class="col-8">
                                                            <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" name="tentang" id="tentang" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Tags</label>
                                                        <div class="col-8">
                                                        <select class="form-control form-select" id="tags" name="tags" multiple="multiple" required>
                                                            <option></option>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label  fw-bold fs-6">Abstrak</label>
                                                        <div class="col-8">
                                                            <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="abstrak" name="abstrak"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Tempat Terbit</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Tempat Terbit" id="tempat_terbit" name="tempat_terbit" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Penerbit</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Penerbit" id="penerbit" name="penerbit" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Sumber</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Sumber" id="sumber" name="sumber"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Pemrakarsa</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Pemrakarsa" id="pemrakarsa" name="pemrakarsa" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Penandatangan</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Penandatangan" id="penandatangan" name="penandatangan" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">T.E.U</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="T.E.U" id="teu" name="teu" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label  fw-bold fs-6">ISBN</label>
                                                        <div class="col-8">
                                                        <input value="" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="ISBN" id="isbn" name="isbn" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label  fw-bold fs-6">No Panggil</label>
                                                        <div class="col-8">
                                                        <input value="" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="No Panggil" id="no_panggil" name="no_panggil" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">No Induk Buku</label>
                                                        <div class="col-8">
                                                        <input value="-" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="No Induk Buku" id="no_induk_buku" name="no_induk_buku" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Lokasi</label>
                                                        <div class="col-8">
                                                        <input value="-" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Lokasi" id="lokasi" name="lokasi" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Deskripsi Fisik</label>
                                                        <div class="col-8">
                                                        <input value="-" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="Deskripsi Fisik" id="deskripsi_fisik" name="deskripsi_fisik" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Hasil Uji Materi</label>
                                                        <div class="col-8">
                                                            <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="hasil_uji_materi"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Keterangan Status</label>
                                                        <div class="col-8">
                                                            <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="ket_status"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Author</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" placeholder="author" id="author" name="author" required/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label  fw-bold fs-6">File</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="file" placeholder="Invertarisasi Hukum" id="file" name="file" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Status</label>
                                                        <div class="col-8">
                                                        <select class="form-select form-select-solid form-control-lg" data-kt-select2="true" id="status">
                                                            <option value="1">Berlaku</option>
                                                            <option value="0">Tidak Berlaku</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Bahasa</label>
                                                        <div class="col-8">
                                                        <select class="form-select form-select-solid form-control-lg" data-kt-select2="true" id="bahasa">
                                                            @foreach($bahasa as $b)
                                                                <option value="{{ $b->id }}">{{$b->bahasa}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-4">
                                                        </div>
                                                        <div class="col-8">
                                                        <button type="sumbit" class="btn btn-success mr-2" id="simpanfile"><i id="loading"></i>Simpan</button>
                                                        <a href="/admin/master-produk-hukum">
                                                            <button type="button" class="btn btn-danger mr-2">Batal</button>
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <!--end::Content-->
                                </div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2022©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">JDIH Provinsi Jawa Tengah</a>
							</div>
							<!--end::Copyright-->
							<!--begin::Menu-->
							<ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
							</ul>
							<!--end::Menu-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
@endsection
@section('footer')
@include('admin.partial.script')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.tiny.cloud/1/h9q0rvctciw5bplv4gbolgbey1emeujtwsebnxwz07r0w97o/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
$(".pilihtanggal").flatpickr({
    dateFormat:"Y-m-d"
});
</script>
<script>
 tinymce.init({
  selector: 'textarea#ket_status',
  height: 200,
  plugins: [
          'lists','link','table'
        ],
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
 </script>
<script>
$(document).ready(function () {
    $('#tags').select2({
                placeholder: "Pilih Tags",
                closeOnSelect: false,
                minimumInputLength: 3,
                tags: true
    });
    $('#simpanfile').on('click', function (e) {
                e.preventDefault();
                if (!document.querySelector('#post_file').checkValidity()) {
                    document.querySelector('#post_file').reportValidity();
                    return;
                }

                if (!document.querySelector('#post_file').checkValidity()) {
                    document.querySelector('#post_file').reportValidity();
                    return;
                }

                $('#loading').addClass('fa fa-spinner fa-spin fa-fw');

                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('tipe_dokumen', $('#tipe_dokumen').val());
                formData.append('jenis', $('#jenis').val());
                formData.append('bidang', $('#bidang').val());
                formData.append('hasil_uji_materi', $('#hasil_uji_materi').val());
                let ket_status = tinymce.get('ket_status').getContent();
                formData.append('ket_status', ket_status);
                formData.append('no_peraturan', $('#no_peraturan').val());
                formData.append('pengarang', $('#pengarang').val());
                formData.append('tgl_ditetapkan', $('#tgl_ditetapkan').val());
                formData.append('tgl_diundang', $('#tgl_diundang').val());
                formData.append('tahun', $('#tahun').val());
                formData.append('tentang', $('#tentang').val());
                formData.append('tempat_terbit', $('#tempat_terbit').val());
                formData.append('penerbit', $('#penerbit').val());
                formData.append('sumber', $('#sumber').val());
                formData.append('pemrakarsa', $('#pemrakarsa').val());
                formData.append('penandatangan', $('#penandatangan').val());
                formData.append('teu', $('#teu').val());
                formData.append('isbn', $('#isbn').val());
                formData.append('no_panggil', $('#no_panggil').val());
                formData.append('no_induk_buku', $('#no_induk_buku').val());
                formData.append('author', $('#author').val());
                formData.append('status', $('#status').val());
                formData.append('bahasa', $('#bahasa').val());
                formData.append('lokasi', $('#lokasi').val());
                formData.append('deskripsi_fisik', $('#deskripsi_fisik').val());
                formData.append('file', $('#file')[0].files[0]);
                formData.append('abstrak', $('#abstrak')[0].files[0]);
                $('#tags').val().forEach(function (topic) {
                    formData.append('tags[]', topic);
                });
				Swal.fire("Silahkan Tungu ....")
				Swal.showLoading()
                axios.post('{{ route('admin.master.file.tambah.store') }}', formData)
                    .then(function (response) {
                        
                        if (response.status === 200) {
                            Swal.fire({
                                text: "Produk Hukum baru berhasil dibuat!",
                                icon: "success",
                            }).then(() => {
                                window.location.href = `{{ route('admin.master.file') }}`;
                            })	
                        } else {
                            Swal.fire({
                                text: "Produk Hukum baru gagal dibuat!",
                                icon: "error",
                            });

                            $('#loading').removeClass('fa fa-spinner fa-spin fa-fw');

                        }
                    })
                    .catch(function () {
                        Swal.fire({
                            text: "Terjadi kesalahan!",
                            icon: "error",
                        });

                        $('#loading').removeClass('fa fa-spinner fa-spin fa-fw');
                    })
            });
});
</script>

@endsection

