<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Daftar - JDIH Provinsi Jawa Tengah</title>
		<meta charset="utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="canonical" href="" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link rel="stylesheet" href="{{ asset('plugins/global/plugins.bundle.css') }}" type="text/css">
		<link rel="stylesheet" href="{{ asset('css/style.bundle.css') }}" type="text/css">
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->

		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-up -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14.png">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="#" class="mb-12">
						<img alt="Logo" src="{{ asset('media/svg/jdih-jatengv2.svg') }}" class="h-70px" />
					</a>
					<!--end::Logo-->
					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" action="#">
							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Daftar ke JDIH</h1>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-4">Sudah punya akun?
								<a href="{{ route('login') }}" class="link-primary fw-bolder">Masuk di sini</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">Nama</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">Email</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="email" name="email" id="email" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="password" name="password" id="password" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fw-bolder text-dark fs-6 mb-0">Konfirmasi Password</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" />
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group - CAPTCHA temporarily disabled due to missing GD extension-->
							<!--
							<div class="row mb-10">
								<div class="col-md-6" style="padding-top: 5px;">
									<span id="captcha">{!! captcha_img('mini') !!}</span>
									<a href="javascript:;" id="reload-captcha" style="margin-top: -4px;" class="btn btn-default btn-sm" title="reload"><i class="fa fa-refresh"></i></a>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" id="captcha-input" name="captcha" style="width:170px;" placeholder="input kode keamanan" />
								</div>
							</div>
							-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary w-100 mb-5">
									<span class="indicator-label">Daftar</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Sign-up-->
		</div>
		<!--end::Root-->

		<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('js/scripts.bundle.js') }}"></script>
		<script src="https://use.fontawesome.com/f0def41b56.js"></script>
	</body>
	<!--end::Body-->
	<script>
		$(document).ready(function(){
		"use strict";
			var KTSignupGeneral=function(){
			var t,e,i,name,email,password,password_confirmation;
			return{
				init:function(){
					t=document.querySelector("#kt_sign_up_form"),
					e=document.querySelector("#kt_sign_up_submit"),
					i=FormValidation.formValidation(t,{
						fields:{
							name:{validators:{notEmpty:{message:"Harap isi nama lengkap"}}},
							email:{validators:{notEmpty:{message:"Harap isi kolom email"},
							emailAddress:{message:"Harap isi format email dengan benar"}}},
							password:{validators:{notEmpty:{message:"Harap isi kolom password"}}},
							password_confirmation:{validators:{notEmpty:{message:"Harap isi konfirmasi password"}}}
						},
						plugins:{trigger:new FormValidation.plugins.Trigger,bootstrap:new FormValidation.plugins.Bootstrap5({rowSelector:".fv-row"})}
					}),
						e.addEventListener("click",(function(n){
							n.preventDefault(),i.validate().then((function(i){
								"Valid"==i?(e.setAttribute("data-kt-indicator","on"),e.disabled=!0,setTimeout((
								function(){
								e.removeAttribute("data-kt-indicator"),e.disabled=!1,
								name = $('#name').val().trim()
								email = $('#email').val().trim()
								password = $('#password').val()
								password_confirmation = $('#password_confirmation').val()
								
								// Debug logging
								console.log('Form data:', {
									name: name,
									email: email,
									password: password,
									password_confirmation: password_confirmation,
									passwords_match: password === password_confirmation,
									password_length: password.length,
									confirmation_length: password_confirmation.length,
									password_encoded: encodeURIComponent(password),
									confirmation_encoded: encodeURIComponent(password_confirmation)
								});
								
								$.ajax({
									url: "{{ route('register.proses') }}",
									type: 'POST',
									dataType: "JSON",
									timeout: 10000,
									data: {
										_token: "{{ csrf_token() }}",
										name: name,
										email: email,
										password: password,
										password_confirmation: password_confirmation
										// captcha: $('#captcha-input').val() // Temporarily disabled
									},
									success: function (data) {
										if (data.status=='success') {
											Swal.fire({
												title: data.msg,
												timer: 2000,
												timerProgressBar: true,
												didOpen: () => {
													Swal.showLoading()
													const b = Swal.getHtmlContainer().querySelector('b')
													timerInterval = setInterval(() => {
													b.textContent = Swal.getTimerLeft()
													}, 100)
												},
												willClose: () => {
													location.href = "{{ route('login') }}"
												}
												})
										} else {
											// refresh_captcha() // Temporarily disabled
											Swal.fire({
											text:data.msg,
											icon:"error",buttonsStyling:!1,confirmButtonText:"Ok",customClass:{confirmButton:"btn btn-primary"}
										})
										}
									}, error: function () {
										// refresh_captcha() // Temporarily disabled
										Swal.fire({
											text:"Terjadi kesalahan saat mendaftar. Silahkan coba lagi !",
											icon:"error",buttonsStyling:!1,confirmButtonText:"Ok",customClass:{confirmButton:"btn btn-primary"}
										})
									}
								})
								}),2e3)):Swal.fire({
											text:"Harap periksa kembali data yang anda masukan !",
											icon:"error",buttonsStyling:!1,confirmButtonText:"Ok",customClass:{confirmButton:"btn btn-primary"}
										})
							}))
						}))
					}
				}
		}();
	KTUtil.onDOMContentLoaded((function(){KTSignupGeneral.init()}));
        $('#captcha img').css({'margin-top':'-2px'})

        let refresh_captcha = () => {
            let CSRF_TOKEN = "{{ csrf_token() }}"
            $.ajax({
                url: `{{ route('register.refresh_captcha') }}`,
                type: 'POST',
                dataType: "JSON",
                timeout: 10000,
                data: {
                    _token: CSRF_TOKEN,
                },
                beforeSend: function () {

                },
                success: function (data) {
                    $('#captcha').html(data.captcha)
                }, error: function (x, t, m) {
                    $('.btn-submit').attr('disabled', false)
                }
            })
        }
        $('#reload-captcha').on('click', function(e){
            e.preventDefault()
            refresh_captcha()
            $('#captcha img').css({'margin-top':'-2px'})
        })

    })
</script>
</html>
