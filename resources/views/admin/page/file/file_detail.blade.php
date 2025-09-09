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
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{ $data->singkatan_jenis }} NOMOR {{ $data->no_peraturan }} TAHUN {{ $data->tahun_diundang }}
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
                            <div class="row gy-5 g-xl-8 mb-10">
                            <div class="col-12">
                                <div class="card css-16gycmq-wht h-xl-100">
                                    <div class="card-header position-relative py-0">
                                        <h1 class="d-flex align-items-center my-1">
                                            <span class="font-semibold text-base">
                                                 Detail Peraturan
                                            </span>
                                        </h1>
                                        <div class="d-flex align-items-center py-1">
                                            <a href="{{ asset('produk_hukum/abstrak/'.$data->abstrak) }}" class="btn btn-sm btn-outline btn-outline-red-700 px-4 me-2">Abstrak</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <table class="table table-row-dashed align-middle gs-0 gy-4" width="100%">
                                                    <tbody><tr>
                                                        <td width="25%"><strong>Jenis</strong></td>
                                                        <td class="text-center" width="3%">:</td>
                                                        <td>
                                                            @if ($data->tipe_dokumen == '1')
                                                                Peraturan Perundang-undangan
                                                            @endif
                                                            @if ($data->tipe_dokumen == '2')
                                                                Monografi Hukum
                                                            @endif
                                                            @if ($data->tipe_dokumen == '3')
                                                                Artikel Hukum
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Entitas</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>Pemerintah Provinsi</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Nomor/Tahun</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ $data->no_peraturan.'/'.$data->tahun_diundang }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top"><strong>Judul</strong></td>
                                                        <td class="text-center" valign="top">:</td>
                                                        <td id="indikator-sub-kegiatan-area">
                                                            {{ Helper::string_rmv_html($data->content) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Ditetapkan Tanggal</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ $data->tgl_ditetap!='0000-00-00'?Helper::tgl_indo($data->tgl_ditetap):''; }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Diundangkan Tanggal</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ $data->tgl_diundang!='0000-00-00'?Helper::tgl_indo($data->tgl_diundang):''; }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Sumber</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ Helper::string_rmv_html($data->sumber) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tags</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td><span>
                                                                <a class="font-white " href="#">{{ ($data->file_tags) }}</a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Diakses</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->view) }} kali</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Diunduh</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->unduh) }} kali</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Pemrakarsa</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->pemrakarsa) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>ISBN</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->isbn) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Nomor Panggil</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->no_panggil) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Lokasi</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->lokasi) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Deskripsi Fisik</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->deskripsi_fisik) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Penandatangan</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->penandatangan) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Hasil Uji Materi</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->hasil_uji_materi) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>T.E.U</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>{{ ($data->tajuk_entri_utama) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Status</strong></td>
                                                        <td class="text-center">:</td>
                                                        <td>
                                                            @if($data->status == 0)
                                                                Tidak Berlaku
                                                            @elseif($data->status == 1)
                                                                Berlaku
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="col-12">
                                <div class="card css-16gycmq-wht h-xl-100">
                                    <div class="card-header position-relative py-0">
                                        <h1 class="d-flex align-items-center my-1">
                                                <span class="font-semibold text-base">
                                                     File-File Peraturan
                                                </span>
                                        </h1>
                                    </div>
                                    <div class="card-body">
                                        <div class="row gx-9 h-100">
                                            <div class="col-sm-12">
                                                <div class="d-flex flex-column h-100">
                                                    <div class="mb-0">
                                                        <div class="mt-list-container list-simple bg-white">
                                                            <div class="d-flex flex-stack flex-wrap mb-10">
                                                                <div class="d-flex align-items-center py-1">
                                                                    <div class="symbol symbol-35px me-2">
                                                                        <span class="svg-icon svg-icon-dark svg-icon-2x">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                                    <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                                                                    <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <a href="{{ asset($data->file_url) }}" class="fs-3 fw-bold text-gray-900 text-hover-danger">Pratinjau</a>
                                                                </div>
                                                                <div class="d-flex align-items-center py-1">
                                                                    <div class="symbol symbol-35px me-2">
                                                                        <span class="svg-icon svg-icon-dark svg-icon-2x">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                                    <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000"/>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                    </div>
                                                                    <div class="d-flex flex-column align-items-start justify-content-center">
                                                                        <a href="{{ asset($data->file_url) }}" class="fs-3 fw-bold text-gray-900 text-hover-danger">{{ $data->file }}</a>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <p class="font-sm font-red-intense text-red-600">
                                                                * Klik pada nama file untuk melakukan download atau klik pada tombol pratinjau untuk melihat file.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
