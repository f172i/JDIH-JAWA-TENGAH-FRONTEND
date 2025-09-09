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
                                        <h3 class="fw-bolder m-0">Form Update Berita</h3>
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
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Judul Berita</label>
                                                        <div class="col-8">
                                                            <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="judul" rows="3" required>{{ $berita->nama }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">HeadLine Berita</label>
                                                        <div class="col-8">
                                                        <img src="{{ asset('berita/'.$berita->images) }}" style="max-width:300px;">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="file" placeholder="Invertarisasi Hukum" id="file" name="file" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Isi Berita</label>
                                                        <div class="col-8">
                                                            <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="isiberita" rows="3" name="isiberita" ></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Penulis</label>
                                                        <div class="col-8">
                                                            <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="penulis" placeholder="penulis berita" value="{{ $berita->penulis }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Publish</label>
                                                        <div class="col-8">
                                                            <select class="form-select form-control-solid" name="publish" id="publish">
                                                                <option value="1">Publish</option>
                                                                <option value="0">Jangan Publish</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Tanggal Publish</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 pilihtanggal" type="text" placeholder="Tanggal publish" id="tgl_publish" name="tgl_publish" value="{{ $berita->tgl_publish != '' ? $berita->tgl_publish : ''; }}"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-4">
                                                        </div>
                                                        <div class="col-8">
                                                        <button type="sumbit" class="btn btn-success mr-2" id="simpanfile"><i id="loading"></i>Simpan</button>
                                                        <a href="/admin/master-berita">
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
  selector: 'textarea#isiberita',
  height: 500,
  plugins: [
                'lists', 'link', 'table', 'image','paste'
            ],
            paste_as_text: true,
  toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist',
  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
  setup: function (editor) {
        editor.on('init', function () {
            this.setContent(`<?= $berita->isi ?>`);
        });
        }
});
 </script>
 <script>
$(document).ready(function () {
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
                let body = tinymce.get('isiberita').getContent();
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('penulis', $('#penulis').val());
                formData.append('publish', $('#publish').val());
                formData.append('tgl_publish', $('#tgl_publish').val());
                formData.append('isiberita', body);
                formData.append('id', `{{ $berita->id }}`);
                formData.append('judul', $('#judul').val());
                formData.append('file', $('#file')[0].files[0]);

                Swal.fire("Silahkan Tungu ....")
				Swal.showLoading()
                axios.post('{{ route('admin.master.berita.update.proses') }}', formData)
                    .then(function (response) {
                        console.log(response)
                        if (response.status === 200) {
                            Swal.fire({
                                text: "Berita berhasil dibuat!",
                                icon: "success",
                            }).then(() => {
                                window.location.href = `{{ route('admin.master.berita') }}`;
                            })	
                        } else {
                            Swal.fire({
                                text: "Berita gagal dibuat!",
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

