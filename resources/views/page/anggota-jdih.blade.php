

@extends('app')
@section('head')
    @include('partial.head')
    <style>
    .peta-kako:hover path{
          fill: grey;
      }
    </style>
@endsection
@section('content')
    @include('partial.topbar')
    <div class="slider-three mt-15">
        <div class="container bg-white p-5">
            <div class="section-title-five">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <h1 class="fw-bold">{{ __('Anggota JDIH per Kab/Kota') }}</h1>
                                <p>
                                    {{ __('Daftar anggota JDIH Provinsi Jawa Tengah') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="mx-auto col-md-9">
                <div class="row">
                    <div class="col-xl-12 col-lg-5">
                        <div class="Hero_heroImageWrapper__7Z2hV">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100%" height="200%" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 11105 6409" xmlns:xlink="http://www.w3.org/1999/xlink" class="svg-kako">
                            @foreach($data1 as $key => $var)
                                    <a xlink:title="{{ $var->nama }}" xlink:href="{{ url('anggota-jdih/view/'.$var->id.'/#kako') }}" class="peta-kako">
                                        {!! $var->path_svg !!}
                                    </a>
                                @endforeach

                                <text x="997" y="1964" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Brebes</text>
                                <text x="1988" y="2160" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Tegal</text>
                                <text x="2480" y="2553" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Pemalang</text>
                                <text x="1996" y="1368" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Kota</text>
                                <text x="1996" y="1508" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Tegal</text>
                                <text x="3370" y="2350" fill="black" font-weight="bold" font-size="152.776px" font-family="Arial">Pekalongan</text>
                                <text x="3577" y="3042" fill="black" font-weight="bold" font-size="152.776px" font-family="Arial">Banjarnegara</text>
                                <text x="2542" y="3165" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Purbalingga</text>
                                <text x="1683" y="3753" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Banyumas</text>
                                <text x="929" y="4309" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Cilacap</text>
                                <text x="3994" y="1432" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Kota</text>
                                <text x="3994" y="1572" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Pekalongan</text>
                                <text x="6362" y="2127" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Kota</text>
                                <text x="6199" y="2267" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Semarang</text>
                                <text x="6757" y="3145" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Kota</text>
                                <text x="6656" y="3285" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Salatiga</text>
                                <text x="4349" y="2134" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Batang</text>
                                <text x="5407" y="2187" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Kendal</text>
                                <text x="4440" y="3488" fill="black" font-weight="bold" font-size="152.776px" font-family="Arial">Wonosobo</text>
                                <text x="3375" y="4489" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Kebumen</text>
                                <text x="4601" y="4562" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Purworejo</text>
                                <text x="6297" y="3010" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Semarang</text>
                                <text x="5788" y="3656" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Kota</text>
                                <text x="5639" y="3796" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Magelang</text>
                                <text x="5602" y="4200" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Magelang</text>
                                <text x="5242" y="3204" fill="black" font-weight="bold" font-size="138.886px" font-family="Arial">Temanggung</text>
                                <text x="7846" y="3894" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Kota</text>
                                <text x="7696" y="4034" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Surakarta</text>
                                <text x="6902" y="4066" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Boyolali</text>
                                <text x="7984" y="2585" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Grobogan</text>
                                <text x="7120" y="1820" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Demak</text>
                                <text x="8195" y="5442" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Wonogiri</text>
                                <text x="8244" y="3546" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Sragen</text>
                                <text x="8532" y="4401" fill="black" font-weight="bold" font-size="125px" font-family="Arial">Karanganyar</text>
                                <text x="7883" y="4685" fill="black" font-weight="bold" font-size="111.11px" font-family="Arial">Sukoharjo</text>
                                <text x="7067" y="4596" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Klaten</text>
                                <text x="7644" y="588" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Jepara</text>
                                <text x="7986" y="1476" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Kudus</text>
                                <text x="8863" y="1337" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Pati</text>
                                <text x="9874" y="1406" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Rembang</text>
                                <text x="9812" y="2394" fill="black" font-weight="bold" font-size="166.665px" font-family="Arial">Blora</text>
                    </svg>
                        </div>
                    </div>
                </div>
            </section>
            <div class="card-header border-0 py-10 d-flex flex-column">
                <!--begin::Items-->
                <div class="mt-5" style="text-align: justify;text-justify: inter-word;">
                        <div class="row g-5 g-xl-12 anggota">
                            @foreach($data2 as $key => $var)
                                <div class="col-xs-6 col-sm-2 ">
                                    <center>
                                        <a href="{{ $var->website }}" target="_blank">
                                            <img src="{{ asset('anggota/'.$var->logo)}}" style="min-width: 100px; max-width:100px; min-height: 115px; max-height:115px; margin:10px;">
                                            <br><br><p>{{ $var->name }}</p>
                                        </a>
                                    <center>
                                </div>
                            @endforeach
                        </div>
                </div>
                <!--end::Items-->
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
