@extends('app')
@section('head')
    <title>
        {{ strip_tags($data[0]->content) }}
    </title>
    <meta name="description" content="{{ strip_tags($data[0]->content) }}" />
    @if ($data[0]->no_peraturan != '0')
        <meta name="keywords"
            content="{{ __($data[0]->nama) . ' ' . __('Nomor') . ' ' . $data[0]->no_peraturan . ' ' . __('Tahun') . ' ' . $data[0]->tahun_diundang }} , {{ $data[0]->content }}" />
    @else
        <meta name="keywords"
            content="{{ __($data[0]->nama) . ' ' . __('Tahun') . ' ' . $data[0]->tahun_diundang }} , {{ $data[0]->content }}" />
    @endif
    <meta name="keywords"
        content="{{ __($data[0]->nama) . ' ' . __('Nomor') . ' ' . $data[0]->no_peraturan . ' ' . __('Tahun') . ' ' . $data[0]->tahun_diundang }} , {{ $data[0]->content }}" />
    @include('partial.head')
@endsection
@section('content')
    @include('partial.topbar')
    <section class="latest-news-area section mt-3">
        <div class="container">
            <div class="col-md-7">
                <button onclick="window.history.back()" class="btn btn-bg-secondary rounded-full mr-2"
                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="lni lni-arrow-left fs-2"></i>
                    <span>{{ GoogleTranslate::trans('Kembali', app()->getLocale()) }}</span>
                </button>
                <span class="btn mr-2">
                    {{ GoogleTranslate::trans('Detail Produk Hukum', app()->getLocale()) }}
                </span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 col-12">
                    <div class="mt-20 about-five-content mx-auto col-md-10">
                        <h1 class="news-header-title">
                            @if ($data[0]->no_peraturan != '0')
                                {{ __($data[0]->nama) . ' ' . __('Nomor') . ' ' . $data[0]->no_peraturan . ' ' . __('Tahun') . ' ' . $data[0]->tahun_diundang }}
                            @else
                                {{ __($data[0]->nama) . ' ' . __('Tahun') . ' ' . $data[0]->tahun_diundang }}
                            @endif
                        </h1>
                        <h6 class="text-lg">
                            <?= app()->getLocale() == 'id' ? 'Tentang ' . Helper::string_rmv_html($data[0]->content) : GoogleTranslate::trans('Tentang ' . Helper::string_rmv_html($data[0]->content), app()->getLocale()) ?>
                        </h6>
                        <div class="about-five-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-who-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-who" type="button" role="tab" aria-controls="nav-who"
                                        aria-selected="true">{{ __('Detail Peraturan') }}</button>
                                    <button class="nav-link" id="nav-vision-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-vision" type="button" role="tab"
                                        aria-controls="nav-vision"
                                        aria-selected="false">{{ __('File-File Peraturan') }}</button>
                                    <button class="nav-link" id="nav-abstrak-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-abstrak" type="button" role="tab"
                                        aria-controls="nav-abstrak" aria-selected="false">{{ __('Abstrak') }}</button>
                                    <button class="nav-link survey" id="nav-nilai-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-nilai" type="button" role="tab" aria-controls="nav-nilai"
                                        aria-selected="false">{{ __('Nilai Kami') }}</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-who" role="tabpanel"
                                    aria-labelledby="nav-who-tab">
                                    <table class="table text-m row px-6" width="100%">
                                        <tbody>
                                            <tr>
                                                <td width="25%"><strong>{{ __('Jenis') }}</strong></td>
                                                <td class="text-center" width="3%">:</td>
                                                <td>{{ __($data[0]->nama) }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Entitas') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ __('Pemerintah Provinsi') }}</td>
                                            </tr>
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['monografi'], $kategori['artikel'])))
                                                <tr>
                                                    <td><strong>{{ __('Singkatan Jenis ') }}</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>{{ $data[0]->singkatan_jenis }}</td>
                                                </tr>
                                            @endif
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['monografi'], $kategori['artikel'])))
                                                <tr>
                                                    <td><strong>{{ __('Nomor ') }}</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>{{ $data[0]->no_peraturan }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td><strong>{{ __('Tahun ') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->tahun_diundang }}</td>
                                            </tr>
                                            <tr>
                                                <td valign="top"><strong>{{ __('Judul') }}</strong></td>
                                                <td class="text-center" valign="top">:</td>
                                                <td id="indikator-sub-kegiatan-area">
                                                    <?= app()->getLocale() == 'id' ? Helper::string_rmv_html($data[0]->content) : GoogleTranslate::trans('Tentang ' . Helper::string_rmv_html($data[0]->content), app()->getLocale()) ?>
                                                </td>
                                            </tr>
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['monografi'], $kategori['artikel'])))
                                                <tr>
                                                    <td><strong>{{ __('Ditetapkan Tanggal') }}</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>
                                                        @if ($data[0]->tgl_ditetap == '0000-00-00')
                                                        @else
                                                            {{ helper::tgl_indo($data[0]->tgl_ditetap) }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['monografi'], $kategori['artikel'])))
                                                <tr>
                                                    <td><strong>{{ __('Diundangkan Tanggal') }}</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>
                                                        @if ($data[0]->tgl_diundang == '0000-00-00')
                                                        @else
                                                            {{ helper::tgl_indo($data[0]->tgl_diundang) }}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td><strong>{{ __('Bidang Hukum') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>
                                                    {{ $data[0]->bidhukumnama }}
                                                </td>
                                            </tr>
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['peraturan'], $kategori['artikel'], $kategori['putusan'])))
                                                <tr>
                                                    <td><strong>{{ __('Nomor Induk Buku') }}</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>
                                                        {{ $data[0]->no_induk_buku }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if (!in_array($data[0]->kategori_link, $kategori['monografi']))
                                                <tr>
                                                    <td><strong>{{ __('Sumber') }}</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>
                                                        <?= GoogleTranslate::trans(Helper::string_rmv_html($data[0]->sumber), app()->getLocale()) ?>
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td><strong>{{ __('Subjek') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>
                                                    <span>
                                                        <?php
                                                        $separated = explode(',', $data[0]->file_tags);
                                                        foreach ($separated as $value) {
                                                            echo '<a href="' . url('inventarisasi-hukum/subjek/' . str_replace(' ', '-', trim($value))) . '" class="text-hover-danger text-gray-900">' . $value . '</a>&nbsp;';
                                                        }
                                                        ?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Diakses') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->view . ' ' . __('Kali') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Diunduh') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->unduh . ' ' . __('Kali') }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Pemrakarsa') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->pemrakarsa }}</td>
                                            </tr>
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['monografi'], $kategori['artikel'])))
                                                <tr>
                                                    <td><strong>{{ __('Penandatangan') }}</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>{{ $data[0]->penandatangan }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td><strong>{{ __('Hasil Uji Materi') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->hasil_uji_materi }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>T.E.U</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->tajuk_entri_utama }}</td>
                                            </tr>
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['peraturan'], $kategori['artikel'], $kategori['putusan'])))
                                                <tr>
                                                    <td><strong>ISBN</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>{{ $data[0]->isbn }}</td>
                                                </tr>
                                            @endif
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['peraturan'], $kategori['artikel'], $kategori['putusan'])))
                                                <tr>
                                                    <td><strong>No Panggil</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>{{ $data[0]->no_panggil }}</td>
                                                </tr>
                                            @endif
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['peraturan'], $kategori['artikel'], $kategori['putusan'])))
                                                <tr>
                                                    <td><strong>Cetakan/Edisi</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>{{ $data[0]->edisi }}</td>
                                                </tr>
                                            @endif
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['peraturan'], $kategori['artikel'], $kategori['putusan'])))
                                                <tr>
                                                    <td><strong>Deskripsi Fisik</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>{{ $data[0]->deskripsi_fisik }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td><strong>Lokasi</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->lokasi }}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Pengarang</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->pengarang }}</td>
                                            </tr>
                                            @if (!in_array($data[0]->kategori_link, $kategori['peraturan']))
                                                <tr>
                                                    <td><strong>Penerbit</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>{{ $data[0]->penerbit }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td><strong>Tempat Penerbit</strong></td>
                                                <td class="text-center">:</td>
                                                <td>{{ $data[0]->tmp_terbit }}</td>
                                            </tr>
                                            @if (!in_array($data[0]->kategori_link, array_merge($kategori['monografi'], $kategori['artikel'])))
                                                <tr>
                                                    <td><strong>Status</strong></td>
                                                    <td class="text-center">:</td>
                                                    <td>
                                                        @if ($data[0]->status == 0)
                                                            Tidak Berlaku
                                                        @elseif($data[0]->status == 1)
                                                            Berlaku
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td><strong>{{ __('Keterangan Status') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td style="sans-serif;" class="unlisted">
                                                    {!! $data[0]->file_custom_status !!}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>{{ __('Bahasa') }}</strong></td>
                                                <td class="text-center">:</td>
                                                <td>
                                                    {!! $data[0]->language !!}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-vision" role="tabpanel"
                                    aria-labelledby="nav-vision-tab">
                                    @if (!empty($data[0]->file))
                                        <div class="d-flex align-items-center py-1">
                                            <div class="symbol symbol-35px me-2">
                                                <span class="svg-icon svg-icon-dark svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <path
                                                                d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <path
                                                                d="M14.8875071,11.8306874 L12.9310336,11.8306874 L12.9310336,9.82301606 C12.9310336,9.54687369 12.707176,9.32301606 12.4310336,9.32301606 L11.4077349,9.32301606 C11.1315925,9.32301606 10.9077349,9.54687369 10.9077349,9.82301606 L10.9077349,11.8306874 L8.9512614,11.8306874 C8.67511903,11.8306874 8.4512614,12.054545 8.4512614,12.3306874 C8.4512614,12.448999 8.49321518,12.5634776 8.56966458,12.6537723 L11.5377874,16.1594334 C11.7162223,16.3701835 12.0317191,16.3963802 12.2424692,16.2179453 C12.2635563,16.2000915 12.2831273,16.1805206 12.3009811,16.1594334 L15.2691039,12.6537723 C15.4475388,12.4430222 15.4213421,12.1275254 15.210592,11.9490905 C15.1202973,11.8726411 15.0058187,11.8306874 14.8875071,11.8306874 Z"
                                                                fill="#000000" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="d-flex flex-column align-items-start justify-content-center">
                                                <span class="fs-4 text-gray-900 "> {{ $data[0]->file }}</span>
                                            </div>
                                        </div>
                                        {{-- href="{{ route('inventarisasi-hukum.unduh', [encrypt($data[0]->id), $data[0]->singkatan_jenis]) }}"  --}}
                                        <a href="{{ route('inventarisasi-hukum.download', [encrypt($data[0]->id)]) }}">
                                            <button class="btn btn-success"
                                                data-id="{{ encrypt($data[0]->id) }}">{{ __('Unduh') }}</button>
                                        </a>
                                        
                                        <p class="font-sm font-red-intense text-m">
                                            * Klik tombol UNDUH untuk melakukan download atau lihat dokumen dibawah untuk
                                            pratinjau file.
                                        </p>>
                                            * Klik tombol UNDUH untuk melakukan download atau lihat dokumen dibawah untuk
                                            pratinjau file.
                                        </p>
                                        <iframe src="{{ asset($data[0]->file_url) }}" align="top" height="620"
                                            width="100%" frameborder="0" scrolling="auto"></iframe>
                                    @else
                                        <center>
                                            <img style="width:256px" src="{{ asset('folders.png') }}" alt="">
                                            <h4>Berkas Belum Tersedia</h4>
                                        </center>
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-abstrak" role="tabpanel"
                                    aria-labelledby="nav-abstrak-tab">
                                    @if (!empty($data[0]->file_abstrak))
                                        <iframe src="{{ asset('produk_hukum/abstrak/' . $data[0]->file_abstrak) }}"
                                            align="top" height="620" width="100%" frameborder="0"
                                            scrolling="auto"></iframe>
                                    @else
                                        <center>
                                            <img style="width:256px" src="{{ asset('folders.png') }}" alt="">
                                            <h4>Berkas Belum Tersedia</h4>
                                        </center>
                                        {{-- <iframe src="{{ url('inventarisasi-hukum/abstrak/'.encrypt($data[0]->id).'/html') }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe> --}}
                                    @endif
                                </div>
                                <div class="tab-pane fade" id="nav-nilai" role="tabpanel"
                                    aria-labelledby="nav-nilai-tab">
                                    <center>
                                        <h4>Silahkan nilai kami lebih lanjut melalui tautan berikut :</h4>
                                        <a href="{{ $survey->link }}" class="mt-3">
                                            <button class="btn btn-info">Form Penilaian</button>
                                        </a>
                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                // $(".survey").on("click", function(e) {
                //     var id = $(this).data('id');
                //     var buttons = $('<div>')
                //         .append(createButton(id, 'puas'))
                //         .append(createButton(id, 'cukup'))
                //         .append(createButton(id, 'kurang'))
                //         .append(createButton(id, 'tidak'));

                //     e.preventDefault();
                //     Swal.fire({
                //         title: "Nilai Kami",
                //         html: buttons,
                //         showConfirmButton: false,
                //         timer: 3000,
                //         timerProgressBar: true,
                //         background: 'white',
                //     });
                // });
            });

            function createButton(id, text) {
                const baseUrl = window.location.protocol + '//' + window.location.host;
                if (text == 'puas') {
                    return $(
                        `<a href="${baseUrl}/inventarisasi-hukum/review_score/${id}/${text}"><img src="${baseUrl}/survey/happy.png" style="margin:5px;"></a>`
                    );
                } else if (text == 'cukup') {
                    return $(
                        `<a href="${baseUrl}/inventarisasi-hukum/review_score/${id}/${text}"><img src="${baseUrl}/survey/smile.png" style="margin:5px;"></a>`
                    );
                } else if (text == 'kurang') {
                    return $(
                        `<a href="${baseUrl}/inventarisasi-hukum/review_score/${id}/${text}"><img src="${baseUrl}/survey/neutral.png" style="margin:5px;"></a>`
                    );
                } else {
                    return $(
                        `<a href="${baseUrl}/inventarisasi-hukum/review_score/${id}/${text}"><img src="${baseUrl}/survey/angry.png" style="margin:5px;"></a>`
                    );
                }
            }
        </script>

    </section>
    @include('partial.footer')
@endsection
@section('footer')
    @include('partial.script')
@endsection
