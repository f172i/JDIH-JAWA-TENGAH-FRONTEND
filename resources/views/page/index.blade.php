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
                    @foreach($galeri as $key => $var)
                        @if($key > 0)
                            <div class="d-flex align-items-sm-center mb-1">
                                <div class="symbol symbol-150px symbol-2by3 me-4 mt-10">
                                    @if($var->jenis == 1)
                                        <div class="symbol-label" style="background-image: url('{{ asset('berita/'.$var->images) }}');max-width:300px;max-height:300px;"></div>
                                    @else
                                        <iframe style="max-width:300px;max-height:300px;" src="{{ $var->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    @endif
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
@endsection
