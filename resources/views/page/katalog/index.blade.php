@extends('app')
@section('head')
    @include('partial.head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

@endsection
@section('content')
    @include('partial.topbar')
    <section class="slider-three">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        <h3 class="title mt-10">{{ __('KATALOG') }}</h3>
                    </div>
                </div>
            </div>
            
            <div class="mx-auto col-md-12">
                <div class="row">
                        <div class="">
                            <div class="features-style-three d-flex">
                                <table border="1" class="table table-bordered table-striped dataTable" id="table-document" aria-describedby="table-document_info">
                                <thead>
                                        <tr class="odd">
                                            <th class="text-center" style="width: 30px;">NO</th>
                                            <th class="text-center" style="width: 651px;">NAMA KATALOG</th>
                                            <th class="text-center" style="width: 108px;">TAHUN</th>
                                            <th class="text-center" style="width: 150px;">GENERATE PDF</th>
                                        </tr>
                                    </thead>

                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    @foreach($data as $key => $var)
                                        <tr class="odd">
                                            <td class="text-center  sorting_1">{{ $key+1 }}</td>
                                            <td class=" ">
                                                {{ __($var->name) }}
                                                @if($var->type == 'auto' && $var->jumlah_dokumen)
                                                    <small class="text-muted">({{ $var->jumlah_dokumen }} dokumen)</small>
                                                @endif
                                            </td>
                                            <td class=" ">{{ $var->tahun }}</td>
                                            <td class="text-center">
                                                @if($var->type == 'manual')
                                                    {{-- Generate PDF untuk Katalog Manual --}}
                                                    <a href="{{ route('inventarisasi-hukum.katalog.manual.pdf', $var->id) }}" class="btn btn-danger btn-sm" target="_blank">
                                                        <i class="fa fa-file-pdf-o">&nbsp;</i>Generate PDF
                                                    </a>
                                                @else
                                                    {{-- Generate PDF untuk Katalog Otomatis --}}
                                                    <a href="{{ route('inventarisasi-hukum.katalog.pdf', [urlencode($var->jenis_peraturan), $var->tahun]) }}" 
                                                       class="btn btn-danger btn-sm"
                                                       target="_blank"
                                                       title="Generate PDF Katalog">
                                                        <i class="fa fa-file-pdf-o">&nbsp;</i>Generate PDF
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>

        $(document).ready(function() {
            $('#table-document').DataTable();
            $( "#kt_advanced_search_button_1" ).click(function() {
                let namadokumen    = $("#nama_dokumen").val();
                let kategori_      = $("#kategori_").val();
                let tahun_         = $("#tahun_").val();
                let nomor_         = $("#nomor_").val();

                let tipe_dokumen   = $("#tipe_dokumen").val();
                let status_dokumen   = $("#status_dokumen").val();
                let url = "{{ route('pencarian.pencarian') }}?status_dokumen="+status_dokumen+"&tipe_dokumen="+tipe_dokumen+"&dokumen="+namadokumen+"&kategori="+kategori_+"&tahun="+tahun_+"&nomor="+nomor_;
                window.location.href = url
            });

            $(".survey").on("click", function(e) {
                var id = this.id
                console.log("id",id)
                var buttons = $('<div>')
                .append(createButton('puas',id))
                .append(createButton('cukup', id))
                .append(createButton('kurang', id))
                .append(createButton('tidak', id));
                
                e.preventDefault();
                swal.fire({
                title:"Nilai Kami",
                html: buttons,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                });
            });
        });

        function createButton(text, id) {
            const baseUrl = () => {
            return window.location.protocol + '//' + window.location.host;
            }
            if(text == 'puas'){
                return $(`<a href="${baseUrl()}/inventarisasi-hukum/unduh4/${id}/puas" ><img src="{{ asset('survey/happy.png')}}" style="margin:5px;"></a>`);
            } else if(text == 'cukup') {
                return $(`<a href="${baseUrl()}/inventarisasi-hukum/unduh4/${id}/cukup"><img src="{{ asset('survey/smile.png')}}" style="margin:5px;"></a>`);
            } else if (text == 'kurang'){
                return $(`<a href="${baseUrl()}/inventarisasi-hukum/unduh4/${id}/kurang"><img src="{{ asset('survey/neutral.png')}}" style="margin:5px;"></a>`);
            }else {
                return $(`<a href="${baseUrl()}/inventarisasi-hukum/unduh4/${id}/tidak"><img src="{{ asset('survey/angry.png')}}" style="margin:5px;"></a>`);
            }
        }
    </script>
@endsection
