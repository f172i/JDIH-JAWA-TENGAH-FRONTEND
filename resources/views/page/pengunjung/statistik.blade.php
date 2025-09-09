<!-- ===== service-area start ===== -->
@extends('app')
@section('head')
    @include('partial.head')
    <style>
        .select2-container .select2-selection--single {
            height: auto !important;
        }
        
    </style>
    <script>
        
        //PRODUK HUKUM PERBULAN TAHUN TERBARU
        var bulantahunterbaru = ['Januari','Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November','Desember'];

        var data_perda = {{ $perda }};
        var data_pergub = {{ $pergub }};
        var data_katalog = {{ $katalog }};
        var data_naskah = {{ $naskah }};
        var data_rekom = {{ $rekom }};
        var data_kepgub = {{ $kepgub }};
        var data_instgub = {{ $instgub }};
        var data_se = {{ $se }};
        var databulantahunterbaru = {
            labels: bulantahunterbaru,
            datasets: [{
                label: '{{ __('Peraturan Daerah') }}',
                backgroundColor: "#2EC7C9",
                data: data_perda
            }, {
                label: '{{ __('Peraturan Gubernur') }}',
                backgroundColor: "#B6A2DE",
                data: data_pergub
            }, {
                label: '{{ __('Katalog') }}',
                backgroundColor: "#5AB1EF",
                data: data_katalog
            }, {
                label: '{{ __('Naskah Akademik') }}',
                backgroundColor: "#FFB980",
                data: data_naskah
            }, {
                label: '{{ __('Rekomendasi Kajian') }}',
                backgroundColor: "#4CAF50",
                data: data_rekom
            }, {
                label: '{{ __('Keputusan Gubernur') }}',
                backgroundColor: "#FF7043",
                data: data_kepgub
            }, {
                label: '{{ __('Instruksi Gubernur') }}',
                backgroundColor: "#E91E63",
                data: data_instgub
            }, {
                label: '{{ __('Surat Edaran') }}',
                backgroundColor: "#555",
                data: data_se
            }
        ]
        };

       

        //KATEGORI
        var nama = ["Surat Edaran","Rekomendasi Kajian","Peraturan Gubernur","Peraturan Daerah","Naskah Akademik","Keputusan Gubernur","Katalog Produk Hukum","Instruksi Gubernur"];
        var grafikkategori = {{ $grafikkategori }};
        var dataKategori = {
            labels: nama,
            datasets: [{
                label: '',
                data: grafikkategori,
                backgroundColor: [
                    '#555',
                    '#4CAF50',
                    '#B6A2DE',
                    '#2EC7C9',
                    '#FFB980',
                    '#FF7043',
                    '#5AB1EF',
                    '#E91E63',
                ],
                borderColor: [
                    '#555',
                    '#4CAF50',
                    '#B6A2DE',
                    '#2EC7C9',
                    '#FFB980',
                    '#FF7043',
                    '#5AB1EF',
                    '#E91E63'
                ],
                borderWidth: 1
            }]
        };

        //PENGUNJUNG
        let jml = "{{ $jml }}"
        let tgl = "{{ $tgl }}"
        const tglfix = JSON.parse(tgl.replace(/&quot;/g, '"'));
        const jmlfix = JSON.parse(jml.replace(/&quot;/g, '"'));
        const data = {
            labels: tglfix,
            datasets: [{
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: jmlfix,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        };


        window.onload = function() {
            var ctx = document.getElementById("canvas-pengunjung").getContext("2d");
            window.myBar = new Chart(
                ctx,
                config
            );

            var ctx = document.getElementById("canvas-kategori").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: dataKategori,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                },
            });

            var ctx = document.getElementById("canvas-peraturan").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: databulantahunterbaru,
                options: {
                    elements: {
                        rectangle: {
                            borderWidth: 2,
                            borderColor: 'rgb(0, 255, 0)',
                            borderSkipped: 'bottom'
                        }
                    },
                    responsive: true,
                    title: {
                        display: true,
                        text: 'Yearly Website Visitor'
                    }
                }
            });

        };
    </script>
@endsection
@section('content')
    @include('partial.topbar')
<section id="services" class="produk-hukum">

    <div class="container">
        <div class="row card-flush mx-auto bg-white col-md-12">
            <div class="col-lg-12 col-md-12 col-xxl-12 mb-5 mb-xl-0">
                <div class="single-services p-5">
                    <div class="service-content">
                        <div class="py-1">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{ __('Grafik Bulanan Peraturan Perundang-undangan Tahun '. date('Y')) }}</span>
                            </h3>
                        </div>
                        <canvas id="canvas-peraturan" class="mb-20 mr-3"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xxl-12 mb-5 mb-xl-0">
                <div class="single-services p-5">
                    <div class="service-content">
                        <div class="py-1">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{ __('Grafik Tahunan Peraturan Perundang-undangan') }}</span>
                            </h3>
                        </div>
                        <canvas id="canvas-tahunan" class="mb-20 mr-3"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xxl-12 mb-5 mb-xl-0">
                <div class="single-services p-5">
                    <div class="service-content">
                        <div class="py-1">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{ __('Grafik Status Produk Hukum') }}</span>
                            </h3>
                        </div>
                        <canvas id="canvas-berlaku" class="mb-20 mr-3"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xxl-12 mb-5 mb-xl-0">
                <div class="single-services align-right p-5">
                    <div class="service-content">
                        <div class="py-1">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{ __('Grafik Statistik Produk Hukum Perkategori') }}</span>
                            </h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="canvas-kategori"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xxl-12 mb-5 mb-xl-0">
                <div class="single-services align-right p-5">
                    <div class="service-content">
                        <div class="py-1">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{ __('Grafik Statistik Produk Hukum Perbidang') }}</span>
                            </h3>
                        </div>
                        <div class="chart-container">
                            <canvas id="canvas-grafik-perbidang"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xxl-12 mb-5 mb-xl-0">
                <div class="single-services align-right p-5">
                    <div class="service-content">
                        <div class="py-1">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-dark">{{ __('Tahunan Peraturan Perundang-undangan') }}</span>
                            </h3>
                        </div>
                        <style>
                            .div_table_scroll {
                                width: 100%;
                                position: relative;
                                overflow: auto;
                            }
                            /* .headcoll{
                                position: absolute;
                                width: 10%;
                            } */
                            .sticky-col {
                                position: -webkit-sticky;
                                position: sticky;
                                background-color: rgb(0, 152, 121);
                            }

                            .sticky-col_td_1 {
                                position: -webkit-sticky;
                                position: sticky;
                                background-color: white;
                            }

                            .sticky-col_td_2 {
                                position: -webkit-sticky;
                                position: sticky;
                                background-color: rgb(243 243 243)
                            }
                            .first-col {
                            width: 40px;
                            min-width: 40px;
                            max-width: 40px;
                            left: 0px;
                            }

                            .second-col {
                            width: 150px;
                            min-width: 150px;
                            max-width: 150px;
                            left: 40px;
                            }
                            /* .kolom_parent{
                                background-color: #ffffff00;
                            } */
                        </style>
                        <div class="chart-container div_table_scroll">
                            <table class="styled-table tahunan_table">
                                <thead>
                                    <tr class="odd">
                                        <th class="sticky-col first-col text-left" rowspan="2" >NO</th>
                                        <th class="sticky-col second-col text-left" rowspan="2" >PRODUK HUKUM</th>
                                        <th class="text-left" colspan="{{count($tahunber )}}">TAHUN</th>
                                    </tr>
                                    <tr>
                                        @foreach($tahunber as $item)
                                            <th class="text-center">{{ $item->tahun_diundang }}</th>
                                        @endforeach
                                        
                                    </tr>
                                </thead>
                                <tbody class="tbody_tahunan">
                                    <tr>
                                        <td class="sticky-col_td_1 first-col ">1</td>
                                        <td class="sticky-col_td_1 second-col ">Peraturan Daerah</td>
                                        @foreach($tahunan_perundangan as $item)
                                            <td class="text-center">{{ $item->perda }}</td>
                                        @endforeach
                                    </tr>
                                    <tr class="active-row">
                                        <td class="sticky-col_td_2 first-col">2</td>
                                        <td class="sticky-col_td_2 second-col">Peraturan Gubernur</td>
                                        @foreach($tahunan_perundangan as $item)
                                            <td class="text-center">{{ $item->pergub }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="sticky-col_td_1 first-col">3</td>
                                        <td class="sticky-col_td_1 second-col">Katalog</td>
                                        @foreach($tahunan_perundangan as $item)
                                            <td class="text-center">{{ $item->katalog }}</td>
                                        @endforeach
                                    </tr>
                                    <tr class="active-row">
                                        <td class="sticky-col_td_2 first-col">4</td>
                                        <td class="sticky-col_td_2 second-col">Naskah Akademik</td>
                                        @foreach($tahunan_perundangan as $item)
                                            <td class="text-center">{{ $item->naskah }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="sticky-col_td_1 first-col">5</td>
                                        <td class="sticky-col_td_1 second-col">Rekomendasi Kajian</td>
                                        @foreach($tahunan_perundangan as $item)
                                            <td class="text-center">{{ $item->rekom }}</td>
                                        @endforeach
                                    </tr>
                                    <tr class="active-row">
                                        <td class="sticky-col_td_2 first-col">6</td>
                                        <td class="sticky-col_td_2 second-col">Keputusan Gubernur</td>
                                        @foreach($tahunan_perundangan as $item)
                                            <td class="text-center">{{ $item->kepgub }}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        <td class="sticky-col_td_1 first-col">7</td>
                                        <td class="sticky-col_td_1 second-col">Instruksi Gubernur</td>
                                        @foreach($tahunan_perundangan as $item)
                                            <td class="text-center">{{ $item->instruksi }}</td>
                                        @endforeach
                                    </tr>
                                    <tr class="active-row">
                                        <td class="sticky-col_td_2 first-col">8</td>
                                        <td class="sticky-col_td_2 second-col">Surat Edaran</td>
                                        @foreach($tahunan_perundangan as $item)
                                            <td class="text-center">{{ $item->surat }}</td>
                                        @endforeach
                                    </tr>
                                    
                                    <!-- and so on... -->
                                </tbody>

                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="col-lg-12 col-md-12 col-xxl-6 mb-5 mb-xl-0" style="min-width:100%;">
                <div class="overflow-hidden h-md-100 p-5" >
                    <div class="py-1">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder text-dark">Grafik Pengunjung JDIH</span>
                        </h3>
                    </div>
                    <div class="card-body d-flex justify-content-between flex-column pb-1 px-0">
                        <canvas id="canvas-pengunjung" width="300" height="125"></canvas>
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
    <script>

        $(document).ready(function(){
        $.ajax({
                url: "{{ url('statistik/grafik-perbidang') }}",
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    var nama = [];
                    var jml = [];

                

                    $.each(data, function(index, element) {
                        nama.push(element.nama);
                        jml.push(element.jml);
                        // console.log(element.nama)
                    });

                    var chartdata = {
                        labels: nama,
                        datasets : [
                        {
                            label: 'Statistik Perbidang',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: jml
                        }
                        ]
                    };

                    var ctx = $("#canvas-grafik-perbidang");

                    var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata
                    });
                },
                error: function(data) {
                console.log(data);
                }
            });
            //BERLAKU & TIDAK BERLAKU
            var tahunberlaku = {{ $tahunberlakutakberlaku }};
            $.ajax({
            url: "{{ url('statistik/grafik-berlaku-tak-berlaku') }}",
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    var tahun_diundang = [];
                    var berlaku = [];
                    var tak_berlaku = [];

                

                    $.each(data, function(index, element) {
                        tahun_diundang.push(element.tahun_diundang);
                        berlaku.push(element.berlaku);
                        tak_berlaku.push(element.tak_berlaku);
                        // console.log(element)
                    });

                    var chartdata = {
                        labels: tahun_diundang,
                        datasets: [{
                            label: '{{ __('Berlaku') }}',
                            backgroundColor: "#50cd89",
                            data: berlaku
                        }, {
                            label: '{{ __('Tidak Berlaku') }}',
                            backgroundColor: "#009ef7",
                            data: tak_berlaku
                        }]
                    };

                    var ctx = $("#canvas-berlaku");

                    var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata
                    });
                },
                error: function(data) {
                console.log(data);
                }
            
            })
            //TAHUNAN PERUNDANG-UNDANGAN
            var tahunberlaku = {{ $tahunberlakutakberlaku }};
            $.ajax({
            url: "{{ url('statistik/tahunan-perundangan') }}",
                method: "GET",
                dataType: 'json',
                success: function(data) {
                    var tahun_diundang = [];
                    var perda = [];
                    var pergub = [];
                    var katalog = [];
                    var naskah = [];
                    var rekom = [];
                    var kepgub = [];
                    var instruksi = [];
                    var surat = [];

                    $.each(data, function(index, element) {
                        tahun_diundang.push(element.tahun_diundang);
                        perda.push(element.perda);
                        pergub.push(element.pergub);
                        katalog.push(element.katalog);
                        naskah.push(element.naskah);
                        rekom.push(element.rekom);
                        kepgub.push(element.kepgub);
                        instruksi.push(element.instruksi);
                        surat.push(element.surat);
                        // console.log(element)
                    });

                    var chartdata = {
                        labels: tahun_diundang,
                        datasets: [{
                            label: '{{ __('Peraturan Daerah') }}',
                            backgroundColor: "#2EC7C9",
                            data: perda
                        }, {
                            label: '{{ __('Peraturan Gubernur') }}',
                            backgroundColor: "#B6A2DE",
                            data: pergub
                        }, {
                            label: '{{ __('Katalog') }}',
                            backgroundColor: "#5AB1EF",
                            data: katalog
                        }, {
                            label: '{{ __('Naskah Akademik') }}',
                            backgroundColor: "#FFB980",
                            data: naskah
                        }, {
                            label: '{{ __('Rekomendasi Kajian') }}',
                            backgroundColor: "#4CAF50",
                            data: rekom
                        }, {
                            label: '{{ __('Keputusan Gubernur') }}',
                            backgroundColor: "#FF7043",
                            data: kepgub
                        }, {
                            label: '{{ __('Instruksi Gubernur') }}',
                            backgroundColor: "#E91E63",
                            data: instruksi
                        }, {
                            label: '{{ __('Surat Edaran') }}',
                            backgroundColor: "#555",
                            data: surat
                        }]
                    };

                    var ctx = $("#canvas-tahunan");

                    var barGraph = new Chart(ctx, {
                        type: 'bar',
                        data: chartdata
                    });
                },
                error: function(data) {
                console.log(data);
                }
            
            })
        });
    </script>
@endsection
