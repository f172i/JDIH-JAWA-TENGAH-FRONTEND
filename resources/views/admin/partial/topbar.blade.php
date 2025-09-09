<!--begin::Root-->
<div class="d-flex flex-column flex-root">
	<!--begin::Page-->
	<div class="page d-flex flex-row flex-column-fluid">
		<!--begin::Aside-->
		<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
			<!--begin::Brand-->
			<div class="brand aside-logo flex-column-auto" id="kt_aside_logo">
				<!--begin::Logo-->
				<a href="#" class="brand-logo">
					<img alt="JDIH" src="{{ asset('media/svg/jdih-jatengv5.svg') }}" class="max-h-30px" />
				</a>
				<span class="fw-bolder text-white font-size-h6 pl-2 sm:text-left" id="text-logo">JATENGPROV</span>

				<!--end::Logo-->
				<!--begin::Aside toggler-->
				<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
					<span class="svg-icon svg-icon-lg-2x svg-icon-white">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"></polygon>
								<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"></path>
								<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"></path>
							</g>
						</svg>
					</span>
					<!--end::Svg Icon-->
				</div>

				<!--end::Aside toggler-->
			</div>
			<!--end::Brand-->
			<div class="aside-menu flex-column-fluid">
				<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0" style="height: 346px;">
					<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
						<div class="menu-item menu-accordion">
							<a class="menu-link" href="{{ url('admin/dashboard') }}">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-2">
										<svg class="svg-icon" viewBox="0 0 20 20">
											<path fill="none" d="M7.228,11.464H1.996c-0.723,0-1.308,0.587-1.308,1.309v5.232c0,0.722,0.585,1.308,1.308,1.308h5.232
													c0.723,0,1.308-0.586,1.308-1.308v-5.232C8.536,12.051,7.95,11.464,7.228,11.464z M7.228,17.351c0,0.361-0.293,0.654-0.654,0.654
													H2.649c-0.361,0-0.654-0.293-0.654-0.654v-3.924c0-0.361,0.292-0.654,0.654-0.654h3.924c0.361,0,0.654,0.293,0.654,0.654V17.351z
													M17.692,11.464H12.46c-0.723,0-1.308,0.587-1.308,1.309v5.232c0,0.722,0.585,1.308,1.308,1.308h5.232
													c0.722,0,1.308-0.586,1.308-1.308v-5.232C19,12.051,18.414,11.464,17.692,11.464z M17.692,17.351c0,0.361-0.293,0.654-0.654,0.654
													h-3.924c-0.361,0-0.654-0.293-0.654-0.654v-3.924c0-0.361,0.293-0.654,0.654-0.654h3.924c0.361,0,0.654,0.293,0.654,0.654V17.351z
													M7.228,1H1.996C1.273,1,0.688,1.585,0.688,2.308V7.54c0,0.723,0.585,1.308,1.308,1.308h5.232c0.723,0,1.308-0.585,1.308-1.308
													V2.308C8.536,1.585,7.95,1,7.228,1z M7.228,6.886c0,0.361-0.293,0.654-0.654,0.654H2.649c-0.361,0-0.654-0.292-0.654-0.654V2.962
													c0-0.361,0.292-0.654,0.654-0.654h3.924c0.361,0,0.654,0.292,0.654,0.654V6.886z M17.692,1H12.46c-0.723,0-1.308,0.585-1.308,1.308
													V7.54c0,0.723,0.585,1.308,1.308,1.308h5.232C18.414,8.848,19,8.263,19,7.54V2.308C19,1.585,18.414,1,17.692,1z M17.692,6.886
													c0,0.361-0.293,0.654-0.654,0.654h-3.924c-0.361,0-0.654-0.292-0.654-0.654V2.962c0-0.361,0.293-0.654,0.654-0.654h3.924
													c0.361,0,0.654,0.292,0.654,0.654V6.886z"></path>
										</svg>
									</span>
								</span>
								<span class="menu-title">Dashboards</span>
								<!-- <span class="menu-arrow"></span> -->
							</a>
						</div>
						<div class="menu-item menu-accordion">
							<a class="menu-link" href="{{ route('admin.master.file') }}">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-2">
										<svg class="svg-icon" viewBox="0 0 20 20">
											<path fill="none" d="M19.521,7.267c-0.144-0.204-0.38-0.328-0.631-0.328h-3.582l-0.272-1.826c-0.055-0.379-0.379-0.656-0.76-0.656
												H9.802l-0.39-0.891c-0.123-0.279-0.399-0.46-0.704-0.46H1.11c-0.222,0-0.434,0.096-0.58,0.264C0.385,3.537,0.319,3.76,0.349,3.981
												l1.673,12.243c0,0,0,0,0,0.002v0.004c0.015,0.113,0.06,0.213,0.119,0.303c0.006,0.009,0.006,0.023,0.012,0.033
												c0.012,0.016,0.033,0.024,0.046,0.04c0.054,0.065,0.114,0.118,0.185,0.161c0.027,0.018,0.051,0.035,0.078,0.048
												c0.099,0.045,0.206,0.078,0.32,0.078h0.002l0,0h13.03c0.323,0,0.611-0.201,0.722-0.505l3.076-8.416
												C19.698,7.735,19.663,7.474,19.521,7.267z M8.203,4.644l0.391,0.889c0.123,0.279,0.399,0.461,0.704,0.461h4.315l0.141,0.944H5.859
												c-0.323,0-0.611,0.201-0.723,0.505l-2.011,5.505L1.992,4.644H8.203z M15.276,15.356H3.882l2.515-6.879H17.79L15.276,15.356z"></path>
										</svg>
									</span>
								</span>
								<span class="menu-title">Produk Hukum</span>
							</a>
						</div>
						@if(session('role') == 'superadmin')
						<div class="menu-item menu-accordion">
							<a class="menu-link" href="{{ route('admin.master.berita') }}">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-2">
										<svg class="svg-icon" viewBox="0 0 20 20">
											<path fill="none" d="M12.871,9.337H7.377c-0.304,0-0.549,0.246-0.549,0.549c0,0.303,0.246,0.55,0.549,0.55h5.494
													c0.305,0,0.551-0.247,0.551-0.55C13.422,9.583,13.176,9.337,12.871,9.337z M15.07,6.04H5.179c-0.304,0-0.549,0.246-0.549,0.55
													c0,0.303,0.246,0.549,0.549,0.549h9.891c0.303,0,0.549-0.247,0.549-0.549C15.619,6.286,15.373,6.04,15.07,6.04z M17.268,1.645
													H2.981c-0.911,0-1.648,0.738-1.648,1.648v10.988c0,0.912,0.738,1.648,1.648,1.648h4.938l2.205,2.205l2.206-2.205h4.938
													c0.91,0,1.648-0.736,1.648-1.648V3.293C18.916,2.382,18.178,1.645,17.268,1.645z M17.816,13.732c0,0.607-0.492,1.1-1.098,1.1
													h-4.939l-1.655,1.654l-1.656-1.654H3.531c-0.607,0-1.099-0.492-1.099-1.1v-9.89c0-0.607,0.492-1.099,1.099-1.099h13.188
													c0.605,0,1.098,0.492,1.098,1.099V13.732z"></path>
										</svg>
									</span>
								</span>
								<span class="menu-title">Berita</span>
							</a>
						</div>
						@endif
						@if(session('role') == 'superadmin')
						<div class="menu-item menu-accordion">
							<a class="menu-link" href="{{ route('admin.master.katalog') }}">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-2">
										<svg class="svg-icon" viewBox="0 0 20 20">
											<path fill="none" d="M19.521,7.267c-0.144-0.204-0.38-0.328-0.631-0.328h-3.582l-0.272-1.826c-0.055-0.379-0.379-0.656-0.76-0.656
												H9.802l-0.39-0.891c-0.123-0.279-0.399-0.46-0.704-0.46H1.11c-0.222,0-0.434,0.096-0.58,0.264C0.385,3.537,0.319,3.76,0.349,3.981
												l1.673,12.243c0,0,0,0,0,0.002v0.004c0.015,0.113,0.06,0.213,0.119,0.303c0.006,0.009,0.006,0.023,0.012,0.033
												c0.012,0.016,0.033,0.024,0.046,0.04c0.054,0.065,0.114,0.118,0.185,0.161c0.027,0.018,0.051,0.035,0.078,0.048
												c0.099,0.045,0.206,0.078,0.32,0.078h0.002l0,0h13.03c0.323,0,0.611-0.201,0.722-0.505l3.076-8.416
												C19.698,7.735,19.663,7.474,19.521,7.267z M8.203,4.644l0.391,0.889c0.123,0.279,0.399,0.461,0.704,0.461h4.315l0.141,0.944H5.859
												c-0.323,0-0.611,0.201-0.723,0.505l-2.011,5.505L1.992,4.644H8.203z M15.276,15.356H3.882l2.515-6.879H17.79L15.276,15.356z"></path>
										</svg>
									</span>
								</span>
								<span class="menu-title">Katalog</span>
							</a>
						</div>
						<div class="menu-item menu-accordion">
							<a class="menu-link" href="{{ route('admin.master.katalog.download') }}">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-2">
										<svg class="svg-icon" viewBox="0 0 20 20">
											<path fill="none" d="M19.521,7.267c-0.144-0.204-0.38-0.328-0.631-0.328h-3.582l-0.272-1.826c-0.055-0.379-0.379-0.656-0.76-0.656
												H9.802l-0.39-0.891c-0.123-0.279-0.399-0.46-0.704-0.46H1.11c-0.222,0-0.434,0.096-0.58,0.264C0.385,3.537,0.319,3.76,0.349,3.981
												l1.673,12.243c0,0,0,0,0,0.002v0.004c0.015,0.113,0.06,0.213,0.119,0.303c0.006,0.009,0.006,0.023,0.012,0.033
												c0.012,0.016,0.033,0.024,0.046,0.04c0.054,0.065,0.114,0.118,0.185,0.161c0.027,0.018,0.051,0.035,0.078,0.048
												c0.099,0.045,0.206,0.078,0.32,0.078h0.002l0,0h13.03c0.323,0,0.611-0.201,0.722-0.505l3.076-8.416
												C19.698,7.735,19.663,7.474,19.521,7.267z M8.203,4.644l0.391,0.889c0.123,0.279,0.399,0.461,0.704,0.461h4.315l0.141,0.944H5.859
												c-0.323,0-0.611,0.201-0.723,0.505l-2.011,5.505L1.992,4.644H8.203z M15.276,15.356H3.882l2.515-6.879H17.79L15.276,15.356z"></path>
										</svg>
									</span>
								</span>
								<span class="menu-title">Katalog Download</span>
							</a>
						</div>
						<div class="menu-item menu-accordion">
							<a class="menu-link" href="{{ route('admin.master.glosarium') }}">
								<span class="menu-icon">
									<span class="svg-icon svg-icon-2">
										<svg class="svg-icon" viewBox="0 0 20 20">
											<path fill="none" d="M16.957,3.957H3.043C2.467,3.957,2,4.423,2,5v10c0,0.577,0.467,1.043,1.043,1.043h13.914
												C17.533,16.043,18,15.577,18,15V5C18,4.423,17.533,3.957,16.957,3.957z M5.739,6.783h8.521c0.187,0,0.339,0.152,0.339,0.339
												s-0.152,0.339-0.339,0.339H5.739c-0.187,0-0.339-0.152-0.339-0.339S5.552,6.783,5.739,6.783z M14.261,13.217H5.739
												c-0.187,0-0.339-0.152-0.339-0.339s0.152-0.339,0.339-0.339h8.521c0.187,0,0.339,0.152,0.339,0.339S14.448,13.217,14.261,13.217z
												M14.261,10.339H5.739c-0.187,0-0.339-0.152-0.339-0.339S5.552,9.661,5.739,9.661h8.521c0.187,0,0.339,0.152,0.339,0.339
												S14.448,10.339,14.261,10.339z"></path>
										</svg>
									</span>
								</span>
								<span class="menu-title">Glosarium</span>
							</a>
						</div>
						@endif
						@if(session('role') == 'superadmin')
						<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
							<span class="menu-link pt-8">
								<span class="menu-icon">
									<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
									<span class="svg-icon svg-icon-2">
										<svg class="svg-icon" viewBox="0 0 20 20">
											<path fill="none" d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
														c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
														s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
														c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->
								</span>
								<span class="menu-title">Data Master</span>
								<span class="menu-arrow"></span>
							</span>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.kategori') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Jenis Produk Hukum</span>
									</a>
								</div>
							</div>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.user') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Management User</span>
									</a>
								</div>
							</div>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.ph') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Management PH elektronik</span>
									</a>
								</div>
							</div>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.banner') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Management Banner</span>
									</a>
								</div>
							</div>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.linkSurvey') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Management Link Survey</span>
									</a>
								</div>
							</div>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.anggota') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Management Anggota JDIH</span>
									</a>
								</div>
							</div>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.galeri') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Management Galeri</span>
									</a>
								</div>
							</div>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.download') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Management Download</span>
									</a>
								</div>
							</div>

							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.video') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Management Video Konten</span>
									</a>
								</div>
							</div>

						</div>
						<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
							<span class="menu-link pt-8">
								<span class="menu-icon">
									<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
									<span class="svg-icon svg-icon-2">
										<svg class="svg-icon" viewBox="0 0 20 20">
											<path fill="none" d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
														c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
														s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
														c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z"></path>
										</svg>
									</span>
									<!--end::Svg Icon-->
								</span>
								<span class="menu-title">Data Master Profile JDIH</span>
								<span class="menu-arrow"></span>
							</span>
							<div class="menu-sub menu-sub-accordion">
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.visimisi') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Visi Misi</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.dasarhukum') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Dasar Hukum</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.tupoksi') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Tupoksi Biro Hukum</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.kedudukan') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Kedudukan dan Alamat</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.struktur') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">Struktur Organisasi</span>
									</a>
								</div>
								<div class="menu-item">
									<a class="menu-link" href="{{ route('admin.master.sop') }}">
										<span class="menu-bullet">
											<span class="bullet bullet-dot"></span>
										</span>
										<span class="menu-title">SOP</span>
									</a>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!--end::Aside-->
		<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
			<!--begin::Header-->
			<div id="kt_header" style="" class="header align-items-stretch">
				<!--begin::Container-->
				<div class="container-fluid d-flex align-items-stretch justify-content-between">
					<!--begin::Aside mobile toggle-->
					<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
						<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
							<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
									<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
					</div>
					<!--end::Aside mobile toggle-->
					<!--begin::Mobile logo-->
					<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
						<a href="#" class="d-lg-none">
							<img alt="JDIH" src="{{ asset('media/svg/jdih-jatengv4.svg') }}" class="h-30px" />
						</a>
					</div>
					<!--end::Mobile logo-->
					<!--begin::Wrapper-->
					<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
						<!--begin::Navbar-->
						<div class="d-flex align-items-stretch py-6" id="kt_header_nav">
							<span class="menu-text text-muted">Home</span>
						</div>
						<!--end::Navbar-->
						<!--begin::Toolbar wrapper-->
						<div class="d-flex align-items-stretch flex-shrink-0">
							<!--begin::User menu-->
							<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
								<!--begin::Menu wrapper-->
								<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									<img src="{{ asset('logo.jpg') }}" alt="user" />
								</div>
								<!--begin::User account menu-->
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content d-flex align-items-center px-3">
											<!--end::Avatar-->
											<!--begin::Username-->
											<div class="d-flex flex-column">
												<div class="fw-bolder d-flex align-items-center fs-5">{{ session()->get('name') }}
													<span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ session()->get('role') }}</span>
												</div>
											</div>
											<!--end::Username-->
										</div>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="{{ route('admin.profile') }}" class="menu-link px-5">My Profile</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-5">
										<a href="{{ route('admin.logout') }}" class="menu-link px-5">Sign Out</a>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::User account menu-->
								<!--end::Menu wrapper-->
							</div>
							<!--end::User menu-->
							<!--begin::Header menu toggle-->
							<div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
								<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
									<!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="black" />
											<path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
							</div>
							<!--end::Header menu toggle-->
						</div>
						<!--end::Toolbar wrapper-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Container-->
			</div>
			<!--end::Header-->