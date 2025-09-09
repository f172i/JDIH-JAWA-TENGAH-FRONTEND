@extends('app')
@section('head')
    @include('partial.head')
@endsection
@section('content')
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!--End::Google Tag Manager (noscript) -->
        <!--begin::Main-->
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('partial.topbar')
                <!--begin::Container-->
                    <div class="content d-flex flex-column flex-column-fluid mx-auto col-md-9 pt-19" id="kt_content">
                        <!--begin::Post-->
                        <div id="kt_content_container" class="container-xxl">
                            <!--begin::Row-->
                            <div class="row gy-5 g-xl-8">
                                <!--begin::Col-->
                                <div class="col-xxl-12">
                                    <!--begin::Chart widget 22-->
                                    <div class="card h-xl-100">
                                        <!--begin::Header-->
                                        <div class="card-header border-0 py-10 d-flex flex-column">
											<!--begin::Items-->
											<div class="mt-5" style="text-align: justify;text-justify: inter-word;">
                                                    <?= $tp->isi ?>
											</div>
											<!--end::Items-->
										</div>
										<!--end::Body-->
									</div>
									<!--end::Mixed Widget 5-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		@include('partial.footer')

@endsection
@section('footer')
    @include('partial.script')
@endsection
