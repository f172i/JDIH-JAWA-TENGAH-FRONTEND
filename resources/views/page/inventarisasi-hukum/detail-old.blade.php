@extends('app')
@section('head')
    @include('partial.head')
@endsection
@section('content')
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            @include('partial.topbar')
                <div class="content d-flex flex-column flex-column-fluid mx-auto col-md-9 pt-19" id="kt_content">
                    <!--begin::Post-->
                    <div id="kt_content_container" class="container-xxl">
                        <div class="row gy-5 g-xl-8 mb-10">
                            <div class="col-xxl-12">
                                <div class="card h-xl-100">
                                    <div class="row card-body py-8">
                                        <div class="col-12">
                                            <div class="card css-16gywht-pbxc">
                                                <div class="blockquote px-2 py-2">
                                                    <div class="card-header position-relative px-6">
                                                        <h1 class="d-flex align-items-center my-1">
                                                            <span class="font-semibold text-base">
                                                                 Detail Peraturan
                                                            </span>
                                                        </h1>
                                                        <div class="d-flex align-items-center py-1">
                                                            <a href="{{ url('inventarisasi-hukum/abstrak/'.encrypt($data[0]->id)) }}" class="css-w9xr1c btn">Abstrak</a>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 pb-10"></p>
                                                    <table class="table text-m row px-6" width="100%">
                                                        <tbody><tr>
                                                            <td width="25%"><strong>Jenis</strong></td>
                                                            <td class="text-center" width="3%">:</td>
                                                            <td>{{ $data[0]->nama }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Entitas</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>Pemerintah Provinsi</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Nomor/Tahun</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ $data[0]->no_peraturan.'/'.$data[0]->tahun_diundang }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top"><strong>Judul</strong></td>
                                                            <td class="text-center" valign="top">:</td>
                                                            <td id="indikator-sub-kegiatan-area">
                                                                {{ Helper::string_rmv_html($data[0]->content) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Ditetapkan Tanggal</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ ($data[0]->tgl_ditetap) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Diundangkan Tanggal</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ ($data[0]->tgl_diundang) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Sumber</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ Helper::string_rmv_html($data[0]->sumber) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Tags</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td><span>
                                                                <a class="font-white " href="#">{{ ($data[0]->file_tags) }}</a>
                                                            </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Diakses</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ ($data[0]->view) }} kali</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Diunduh</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ ($data[0]->unduh) }} kali</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Pemrakarsa</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ ($data[0]->pemrakarsa) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Penandatangan</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ ($data[0]->penandatangan) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Hasil Uji Materi</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ ($data[0]->hasil_uji_materi) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>T.E.U</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>{{ ($data[0]->tajuk_entri_utama) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Status</strong></td>
                                                            <td class="text-center">:</td>
                                                            <td>
                                                                @if($data[0]->status == 0)
                                                                    Tidak Berlaku
                                                                @elseif($data[0]->status == 1)
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
                            </div>
                            <div class="col-xxl-12">
                                <div class="card h-xl-100">
                                    <div class="row card-body py-8">
                                        <div class="col-12">
                                            <div class="card css-16gywht-pbxc">
                                                <div class="blockquote px-2 py-2">
                                                    <div class="card-header position-relative px-6">
                                                        <h1 class="d-flex align-items-center my-1">
                                                            <span class="font-semibold text-base">
                                                                 File-File Peraturan
                                                            </span>
                                                        </h1>
                                                        <div class="d-flex align-items-center py-1">
                                                            <a href="{{ url('inventarisasi-hukum/abstrak/'.encrypt($data[0]->id)) }}" class="css-w9xr1c btn">Abstrak</a>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0 pb-10"></p>
                                                    <div class="row px-6 gx-9 h-100">
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
                                                                                            <path d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z" fill="#000000"/>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>
                                                                                </div>
                                                                                <div class="d-flex flex-column align-items-start justify-content-center">
                                                                                    <a href="{{ route('inventarisasi-hukum.unduh', [encrypt($data[0]->id), $data[0]->singkatan_jenis]) }}" class="fs-3 fw-bold text-gray-900 text-hover-danger">{{ $data[0]->file }}</a>
                                                                                </div>
                                                                            </div>


                                                                        </div>
                                                                        <p class="font-sm font-red-intense text-m">
                                                                            * Klik pada nama file untuk melakukan download atau lihat dokumen dibawah untuk pratinjau file.
                                                                        </p>
                                                                        <iframe src="{{ asset('produk_hukum/'.strtolower($data[0]->singkatan_jenis).'/'.$data[0]->file) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partial.footer')
@endsection
@section('footer')
    @include('partial.script')
@endsection
