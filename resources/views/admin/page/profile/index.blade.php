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
                                        <h3 class="fw-bolder m-0">Update Profile</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Content-->
                                <div id="kt_account_settings_profile_details" class="collapse show">
                                    <div class="card card-custom">
                                        <!--begin::Form-->
                                                <div class="card-body">
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text"id="no_peraturan" value="{{ isset($user)&&$user!=''?$user->email:''; }}" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Role</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" id="role" value="{{ isset($user)&&$user!=''?$user->roles_name:''; }}" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Name</label>
                                                        <div class="col-8">
                                                        <input class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" type="text" id="name" value="{{ isset($user)&&$user!=''?$user->name:''; }}"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-4">
                                                        <label  class="col-lg-4 col-form-label required fw-bold fs-6">Password</label>
                                                        <div class="col-8">
                                                        <a href="#" class="btn btn-sm btn-danger">Ganti Password</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="row">
                                                        <div class="col-4">
                                                        </div>
                                                        <div class="col-8">
                                                        <button type="button" class="btn btn-success mr-2" id="simpanProfile"><i id="loading"></i>Simpan</button>
                                                        </div>
                                                    </div>
                                                </div>
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
<script>
$('#simpanProfile').on('click',function(){
	$('#loading').addClass('fa fa-spinner fa-spin fa-fw');
	axios({
	method: "post",
	url: "{{ route('admin.profile.update') }}",
	data: {
		name: $('#name').val(),
		_token: "{{ csrf_token() }}"
	},
	headers: { "Content-Type": "multipart/form-data" },
	})
	.then(function (response) {
		$('#loading').removeClass('fa fa-spinner fa-spin fa-fw');
		Swal.fire({
			icon: 'success',
			title:response.data.message
		}).then(() => {
			location.reload();
		})		
	})
	.catch(function (response) {
		$('#loading').removeClass('fa fa-spinner fa-spin fa-fw');
		Swal.fire({
			icon: 'error',
			title:'gagal update profile'
		})	
	});
});
</script>
@endsection

