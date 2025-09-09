@extends('app')
@section('head')
    @include('partial.head')
@endsection
@section('content')
    @include('partial.topbar')
    <div id="blog" class="latest-news-area section mt-15">
        <div class="section-title-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h1 class="fw-bold">{{ __('Pengumuman / Berita') }}</h1>
                            <p>
                                {{ __('Media Informasi dan Berita terkini JDIH Provinsi Jawa Tengah') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--======  End Section Title Five ======-->
        <div class="container">
            <div class="d-flex justify-content-center mb-10">
                {{ $data->appends([
                    'kategori' => $kategori,
                    ])->links('pagination') }}
            </div>
            <div class="row">
                <div class="col-lg-5 col-12">
                    <div class="single-news">
                        <div class="image">
                            <img src="{{ asset('berita/'.$data[0]->images) }}" alt="Blog" />
                            <div class="meta-details">
                                <img class="thumb" src="{{ asset('media/svg/avatars/blank.svg') }}" alt="Author">
                                <span>{{$data[0]->views.' '.__('Kali') }}</span>
                            </div>
                        </div>
                        <div class="content-body">
                            <h4 class="title">
                                <a href="{{ route('artikel.detail', [$data[0]->link]) }}">
                                    {{ GoogleTranslate::trans(Helper::string_rmv_html($data[0]->nama), app()->getLocale()) }}
                                </a>
                            </h4>
                            <p>
                                {!! GoogleTranslate::trans(substr($data[0]->isi,0,360), app()->getLocale()) !!} ...
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-12">
                    @foreach($data as $key => $var)
                        @if($key > 0)
                            <div class="d-flex align-items-sm-center mb-1">
                                <div class="symbol symbol-150px symbol-2by3 me-4 mt-10">
                                    <div class="symbol-label" style="background-image: url('{{ asset('berita/'.$var->images) }}')"></div>
                                </div>
                                <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                    <div class="single-news d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                        <div class="content-body">
                                            <h4 class="mt-6">
                                                <a href="{{ route('artikel.detail', [$var->link]) }}" class="text-gray-900 text-hover-danger">
                                                    {{ GoogleTranslate::trans($var->nama, app()->getLocale()) }}
                                                </a>
                                            </h4>
                                            <div class="blog-content mt-3">
                                                <span><i class="lni lni-calendar"></i> <?= helper::tgl_indo(date('Y-m-d', strtotime($var->tgl_publish))) ?> </span>
                                                <span><i class="lni lni-write"></i> {{ $var->penulis }}</span>
                                                <br/>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
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
