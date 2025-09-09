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
                    {{ __('Detail') }}
                </span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 col-12">
                    <div class="mt-20 about-five-content mx-auto col-md-10">
                        <h1 class="news-header-title">
                            {{ (@$data[0]->nama) }}
                        </h1>
                        <h6 class="text-lg">
                            {{ '' }}
                        </h6>
                        <div class="about-five-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-who-tab" data-bs-toggle="tab" data-bs-target="#nav-who" type="button" role="tab" aria-controls="nav-who" aria-selected="true">Detail JDIH</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="nav-who" role="tabpanel" aria-labelledby="nav-who-tab">
                                    <table class="table fs-lg-3" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Nama Anggota</th>
                                            <th>Website</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($data as $key => $var)
                                                <tr>
                                                    <td class="text-center" width="3%">{{ $key+1 }}</td>
                                                    <td width="50%"><strong>{{ $var->name }}</strong></td>
                                                    <td><a href="{{ $var->website }}" target="_blank">{{ $var->website }}</a></td>
                                                </tr>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
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
