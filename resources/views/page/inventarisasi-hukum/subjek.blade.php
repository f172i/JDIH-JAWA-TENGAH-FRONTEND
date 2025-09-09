@extends('app')
@section('head')
    @include('partial.head')
@endsection
@section('content')
    @include('partial.topbar')
    <section class="slider-three">
        <div class="container">
            <div class="col-md-7">
                <button onclick="window.history.back()" class="btn btn-bg-secondary rounded-full mr-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="lni lni-arrow-left fs-2"></i>
                    <span>{{ __('Kembali') }}</span>
                </button>
                <span class="btn mr-2">
                    {{ __('Subjek') }}
                </span>
            </div>
            <div class="mx-auto col-md-10">
                <div class="section-title text-center">
                    <h1 class="news-header-title">
                    <span>
                        {{ __(@$title) }}
                    </span>
                    </h1>
                </div>
            </div>
            @include('partial.pencarian')
            <div class="mx-auto col-md-10">
                <div class="section-title text-center">
                    <h3 class="news-header-title" style="text-transform: lowercase">
                        <span>
                            Menampilkan hasil pencarian {{ $title != '' ? $title : ''; }}<br>
                            Sejumlah {{ $total }}
                        </span>
                    </h3>
                </div>
            </div>
            <div class="mx-auto col-md-8">
                <div class="row">
                    @foreach($data as $key => $var)
                        <div class="">
                            <div class="features-style-three d-flex">
                                <div class="features-icon me-3">
                                    <i class="lni lni-book fs-3"></i>
                                </div>
                                <div class="features-content">
                                    <span class="text-gray-600 fw-semibold fs-6 mt-10">
                                         {{ __('Subjek').' :' }}
                                        <?php
                                        $separated = explode(',', $var->file_tags);
                                        foreach ($separated as $value) {
                                            echo '<a href="'.url('inventarisasi-hukum/subjek/'.str_replace(' ', '-', trim($value))).'" class="text-hover-danger text-uppercase text-gray-900">'.$value.'</a>&nbsp;';
                                        }
                                        ?>
                                    </span>
                                    <h4>
                                        <a href="{{ url('inventarisasi-hukum/detail/'.$var->link) }}" class="text-hover-danger text-gray-900">
                                            {{ __($var->nama) .' '. __('Nomor') .' '.$var->no_peraturan.' '.__('Tahun').' '.$var->tahun_diundang }}
                                        </a>
                                    </h4>

                                    <p class="p-11em mb-10 mt-2">
                                        {{(app()->getLocale() == 'id') ? 'Tentang '.Helper::string_rmv_html($var->content) : GoogleTranslate::trans('Tentang '.Helper::string_rmv_html($var->content), app()->getLocale())  }}

                                    </p>

                                    <div class="features-btn rounded-buttons">
                                        @if (!empty($var->file))
                                            <!-- <a class="btn primary-btn-outline text-lowercase rounded-full" href="{{ route('inventarisasi-hukum.unduh', [encrypt($var->id), $var->singkatan_jenis]) }}">
                                                {{ $var->file }}
                                            </a> -->
                                            <a href="{{ url('inventarisasi-hukum/detail/'.$var->link) }}" class="btn btn-secondary text-lowercase  rounded-full">Detail</a>
                                            <a  data-bs-toggle="modal" data-bs-target="#file{{$var->id}}" class="btn btn-primary text-lowercase rounded-full">Dokumen</a>
                                            <div class="modal fade" id="file{{$var->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="width:600px;">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Dokumen Produk Hukum</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="{{ asset($var->file_url) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <a class="btn primary-btn-outline text-lowercase rounded-full" href="{{ route('inventarisasi-hukum.unduh', [encrypt($var->id), $var->singkatan_jenis]) }}">
                                                            UNDUH
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!empty($var->abstrak))
                                            <a  data-bs-toggle="modal" data-bs-target="#abstrak{{$var->id}}" class="btn btn-warning text-lowercase rounded-full">Abstrak</a>
                                            <div class="modal fade" id="abstrak{{$var->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="width:600px;">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Abstrak</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        @if(!empty($var->file_abstrak))
                                                            <iframe src="{{ asset('produk_hukum/abstrak/'.$var->file_abstrak) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                                                        @else
                                                            <iframe src="{{ url('inventarisasi-hukum/abstrak/'.encrypt($var->id).'/html') }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                                                        @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-10">
                        {{ $data->appends([
                            'kategori' => $kategori,
                            ])->links('pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('partial.footer')
@endsection
@section('footer')
    @include('partial.script')
    <script>
        $(document).ready(function() {
            $( ".kt_advanced_search_button_1" ).click(function() {
                let namadokumen    = $("#nama_dokumen").val();
                let kategori_      = $("#kategori_").val();
                let tahun_         = $("#tahun_").val();
                let nomor_         = $("#nomor_").val();

                let tipe_dokumen   = $("#tipe_dokumen").val();
                let status_dokumen   = $("#status_dokumen").val();
                let url = "{{ route('pencarian.pencarian') }}?status_dokumen="+status_dokumen+"&tipe_dokumen="+tipe_dokumen+"&dokumen="+namadokumen+"&kategori="+kategori_+"&tahun="+tahun_+"&nomor="+nomor_;
                window.location.href = url
            });
        });
    </script>
@endsection
