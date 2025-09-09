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
					<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
						<!--begin::Post-->
						<div class="content flex-row-fluid" id="kt_content">
							<!--begin::Row-->
							<div class="row g-5 g-xl-12">
								<!--begin::Col-->
								<div class="col-xl-12">
									<!--begin::Mixed Widget 5-->
									<div class="card card-xl-stretch mb-xl-3" style="">
										<!--begin::Body-->
										<div class="card-body d-flex flex-column" style="padding:4rem 18rem;"> 
											<!--begin::Items-->
											<div class="mt-5" style="text-align: justify;text-justify: inter-word;">
                                            @foreach (language()->allowed() as $code => $name)
                                            <a href="{{ language()->home($code) }}">{{ $name }}</a>
                                            @endforeach
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
