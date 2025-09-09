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
                        <h3 class="title mt-10">{{ __('DOWNLOAD') }}</h3>
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
                                            <th class="text-center" style="width: 610px;">NAMA DOKUMEN</th>
                                            <th class="text-center" style="width: 241px;">KEGIATAN</th>
                                            <th class="text-center" style="width: 108px;">TANGGAL</th>
                                            <th class="text-center" style="width: 81px;">DOWNLOAD</th></tr>
                                        </tr>
                                    </thead>

                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    @foreach($data as $key => $var)
                                        <tr class="odd">
                                            <td class="text-center  sorting_1">{{ $key+1 }}</td>
                                            <td class=" ">{{ $var->name }}</td>
                                            <td class=" ">{{ $var->rakor }}</td>
                                            <td class=" ">{{ $var->tgl }}</td>
                                            <td class="text-center ">
                                            <a target="_blank" href="{{ asset('download/'.$var->file) }}"><i class="fa fa-download">&nbsp;</i>Download</a>
                                            </td>
                                            <!-- <td class="text-center">
                                            </td> -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

    <script>

        $(document).ready(function() {
            $('#table-document').DataTable();
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
