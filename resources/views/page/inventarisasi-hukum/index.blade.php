@extends('app')
@section('head')
    @include('partial.head')
@endsection
@section('content')
    @include('partial.topbar')
    <section class="slider-three">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center">
                        @if (isset($param->nama))
                        <h3 class="title mt-10">{{ App\Helpers\Smt::translate(strtoupper($param->nama),app()->getLocale()) }}</h3>
                        @endif
                        @if (isset($param->deskripsi))
                        <h4 class="text mb-10">{{ App\Helpers\Smt::translate($param->deskripsi,app()->getLocale()) }}</h4>
                        @endif
                    </div>
                </div>
            </div>
            @include('partial.pencarian')
            
            <div class="mx-auto col-md-10">
                <div class="section-title text-center">
                    <h3 class="news-header-title">
                        <span>
                            {{App\Helpers\Smt::translate('Menampilkan hasil pencarian',app()->getLocale())}} {{ $data != '' ? App\Helpers\Smt::translate($data[0]->nama,app()->getLocale()) : ''; }}<br>
                            {{App\Helpers\Smt::translate('Sejumlah',app()->getLocale())}} {{ $total }}
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
                                            @if($var->no_peraturan == 0)
                                                {{ __($var->nama) .' '.__('Tahun').' '.$var->tahun_diundang }}
                                            @else
                                                {{ __($var->nama) .' '. __('Nomor') .' '.$var->no_peraturan.' '.__('Tahun').' '.$var->tahun_diundang }}
                                            @endif

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
                                            <a href="{{ url('inventarisasi-hukum/detail/'.$var->link) }}" class="btn btn-secondary  rounded-full">{{App\Helpers\Smt::translate('Detail',app()->getLocale())}}</a>
                                            <a  data-bs-toggle="modal" data-bs-target="#file{{$var->idph}}" class="btn btn-primary  rounded-full">{{App\Helpers\Smt::translate('Dokumen',app()->getLocale())}}</a>
                                            <div class="modal fade" id="file{{$var->idph}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="width:600px;">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Dokumen Produk Hukum</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center><a class="btn primary-btn-outline text-lowercase rounded-full" id="{{ $var->idph }}" href="{{ route('inventarisasi-hukum.download', [encrypt($var->idph)]) }}">
                                                           UNDUH
                                                        </a></center><br>
                                                            <iframe src="{{ asset($var->file_url) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <a class="btn primary-btn-outline text-lowercase rounded-full" id="{{ $var->idph }}" href="{{ route('inventarisasi-hukum.download', [encrypt($var->idph)]) }}">
                                                           UNDUH
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if (!empty($var->abstrak))
                                            <a  data-bs-toggle="modal" data-bs-target="#abstrak{{$var->id}}" class="btn btn-warning  rounded-full">{{App\Helpers\Smt::translate('Abstrak',app()->getLocale())}}</a>
                                            <div class="modal fade" id="abstrak{{$var->id}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content" style="width:600px;">
                                                        <div class="modal-header text-center">
                                                            <h5 class="modal-title" id="exampleModalLabel">Abstrak</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        @if(isset($var->file_abstrak))
                                                            <iframe src="{{ asset('produk_hukum/abstrak/'.$var->file_abstrak) }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                                                        @else
                                                            <?= $var->abstrak ?>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $( ".kt_advanced_search_button_1" ).click(function() {
                let namadokumen    = $("#nama_dokumen").val();
                let kategori_      = $("#kategori_").val();
                let tahun_         = $("#tahun_").val();
                let nomor_         = $("#nomor_").val();

                let tipe_dokumen   = $("#tipe_dokumen").val();
                let status_dokumen   = $("#status_dokumen").val();
                let url = "{{ route('pencarian.pencarian') }}?status_dokumen="+status_dokumen+"&tipe_dokumen="+tipe_dokumen+"&dokumen="+namadokumen+"&kategori="+kategori_+"&tahun="+tahun_+"&nomor="+nomor_
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
                return $(`<a href="${baseUrl()}/inventarisasi-hukum/unduh2/${id}/puas" ><img src="{{ asset('survey/happy.png')}}" style="margin:5px;"></a>`);
            } else if(text == 'cukup') {
                return $(`<a href="${baseUrl()}/inventarisasi-hukum/unduh2/${id}/cukup"><img src="{{ asset('survey/smile.png')}}" style="margin:5px;"></a>`);
            } else if (text == 'kurang'){
                return $(`<a href="${baseUrl()}/inventarisasi-hukum/unduh2/${id}/kurang"><img src="{{ asset('survey/neutral.png')}}" style="margin:5px;"></a>`);
            }else {
                return $(`<a href="${baseUrl()}/inventarisasi-hukum/unduh2/${id}/tidak"><img src="{{ asset('survey/angry.png')}}" style="margin:5px;"></a>`);
            }
        }
    </script>
@endsection
