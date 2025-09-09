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
							<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard
									@if(session('role') == 'admin')
									<small class="text-muted ms-3">- User {{ session('role') }}</small>
									@elseif(session('role') == 'superadmin')
									<small class="text-muted ms-3">- {{ session('role') }}</small>
									@endif
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<!--end::Description--></h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
								<!--begin::Actions-->
								<div class="d-flex align-items-center gap-2 gap-lg-3">
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row g-5 g-xl-10 mb-xl-10">
									<div class="col-md-3 col-lg-3">
										<div class="card card-flush shadow bg-white rounded">
											<div class="card-header pt-5 pb-5">
												<div class="card-title d-flex flex-column">
													<div class="d-flex align-items-center">
														<span class="fs-2hx fw-bolder text-dark me-2 lh-1 " id="tph">0</span>
													</div>
													<span class="text-gray-400 pt-1 fw-bold fs-6">Total Produk Hukum</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-lg-3">
										<div class="card card-flush shadow bg-white rounded">
											<div class="card-header pt-5 pb-5">
												<div class="card-title d-flex flex-column">
													<div class="d-flex align-items-center">
														<span class="fs-2hx fw-bolder text-dark me-2 lh-1 " id="brt">0</span>
													</div>
													<span class="text-gray-400 pt-1 fw-bold fs-6">Total Berita</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-lg-3">
										<div class="card card-flush shadow bg-white rounded">
											<div class="card-header pt-5 pb-5">
												<div class="card-title d-flex flex-column">
													<div class="d-flex align-items-center">
														<span class="fs-2hx fw-bolder text-dark me-2 lh-1 " id="kat">0</span>
													</div>
													<span class="text-gray-400 pt-1 fw-bold fs-6">Total kategori Produk Hukum</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row g-5 g-xl-10 mb-xl-10">
									<div class="col-lg-6" id="content-grafik-pengunjung">
									</div>
								</div>
								<!--end::Row-->
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
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('js/widgets.bundle.js') }}"></script>
<script src="{{ asset('js/custom/widgets.js') }}"></script>
<script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('js/custom/utilities/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('js/custom/utilities/modals/create-app.js') }}"></script>
<script src="{{ asset('js/custom/utilities/modals/users-search.js') }}"></script>
<script>
	function grafikPengunjung(){
		$('#content-grafik-pengunjung').html("<h4><i class='fa fa-spinner fa-spin fa-fw'></i>Loading...</h4>")
		let url = "{{ route('admin.dahsboard.grafikPengunjung') }}"
		$.get(url, function(data){
			$('#content-grafik-pengunjung').html(data)
		});
	}

	function total(){
		let url = "{{ route('admin.dahsboard.getTotal') }}"
		$.get(url, function(data){
			console.log(data.thp)
			$('#tph').html(data.thp);
			$('#brt').html(data.brt);
			$('#kat').html(data.kat);
		});
	}

	total();
	grafikPengunjung();

</script>