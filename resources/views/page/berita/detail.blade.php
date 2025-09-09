@extends('app')
@section('head')
    @include('partial.head')
@endsection
@section('content')
    @include('partial.topbar')
    <style>
        .about-image-five img {
            max-width:1000px;
            max-height:1000px;
        }
        .tab-pane img {
            max-width:600px;
            max-height:600px;
        }
    </style>

<section class="slider-three">

    <div class="container">
        <div class="col-md-7">
            <button onclick="window.history.back()" class="btn btn-bg-secondary rounded-full mr-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="lni lni-arrow-left fs-2"></i>
                <span>{{ __('Kembali') }}</span>
            </button>
            <span class="btn mr-2">
                    {{ __('Detail Berita') }}
            </span>
        </div>
        <div class="mx-auto col-md-10">
            <div class="mt-20 section-title text-center">
                <h1 class="mb-10 news-header-title">
                    <span>
                        {{ GoogleTranslate::trans($data[0]->nama, app()->getLocale()) }}
                    </span>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="about-image-five mx-auto col-md-10 mb-5">
                    <img src="{{ asset('berita/'.$data[0]->images) }}" alt="about">
                </div>
                <div class="about-five-content mx-auto col-md-8">
                    <div class="about-five-tab">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-who" role="tabpanel" aria-labelledby="nav-who-tab">
                                <p style="text-align: justify">
                                    {!! GoogleTranslate::trans($data[0]->isi, app()->getLocale()) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    @include('partial.footer')
@endsection
@section('footer')
    @include('partial.script')
@endsection
