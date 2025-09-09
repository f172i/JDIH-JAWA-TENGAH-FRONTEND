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
                                                    <center><h1 style="color:orange;font-size:50px;">DISCLAIMER</h1><br></center>
                                                    <p style="font-size:15px;">Website jdih.jatengprov.go.id adalah situs yang dikelola oleh Biro Hukum Provinsi Jawa Tengah. Pelayanan website ini hanya <b>untuk melayani informasi Produk Hukum</b> Provinsi Jawa Tengah sebagai anggota dari JDIHN BPHN. Penggunaan website ini tunduk pada Syarat dan Ketentuan, yang merupakan kesepakatan yang mengikat secara hukum antara Anda dan Biro Hukum. Dengan mengakses atau menggunakan website ini, anda mengakui bahwa anda telah membaca, memahami, dan setuju untuk terikat oleh Syarat dan Ketentuan.<br><br>
                                                    Biro Hukum Provinsi Jawa Tengah dapat memperbarui Syarat dan Ketentuan ini setiap saat tanpa pemberitahuan kepada Anda. Anda disarankan untuk memeriksa halaman ini secara berkala agar perubahannya dapat Anda ketahui. Database JDIH Biro Hukum Provinsi Jawa Tengah ini disediakan hanya untuk tujuan informasi dan tidak dimaksudkan sebagai pengganti konsultasi hukum. Biro Hukum Provinsi Jawa Tengah tidak bertanggung jawab apabila anda menggunakan informasi yang berasal dari website ini untuk kepentingan pribadi dan/atau orang lain tanpa konsultasi dengan penasehat hukum (advokat).<br><br>
                                                    Anda setuju bahwa <b>Biro Hukum Provinsi Jawa Tengah tidak dapat dituntut</b> atas, cedera kerugian, kewajiban klaim, atau kerusakan apapun yang timbul dari atau cara apapun yang terkait dengan materi yang disediakan oleh website ini.<br><br>
                                                    Materi dari database ini akan diperbarui secara berkala, namun <b>Biro Hukum Provinsi Jawa Tengah tidak dapat dituntut</b> apabila belum melakukan pembaruan terhadap Undang-Undang atau peraturan yang terbaru.</p>
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
