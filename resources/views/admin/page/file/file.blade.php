@extends('app-admin')
@section('head')
    @include('admin.partial.head')
@endsection
@section('content')
    <!--begin::Wrapper-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Produk Hukum<h1>
                            <!--begin::Separator-->
                            <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                            <!--end::Separator-->
                            <!--end::Description-->
                        </h1>
                        <!--end::Title-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="row">
                    <div class="card card-flush h-xl-100" style="padding-top:25px;">
                        <div class="form-group row mb-4 mt-4">
                            <div class="col-3">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    id="judul" name="judul" placeholder="Judul" />
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    id="nomor" name="nomor" placeholder="Nomor" />
                            </div>
                            <div class="col-2">
                                <select class="form-select form-select-solid form-control-lg" data-kt-select2="true"
                                    id="tahun">
                                    <option value="">-- Pilih Tahun --</option>
                                    @foreach (range(date('Y'), 1950) as $i)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <select class="form-select form-select-solid form-control-lg" data-kt-select2="true"
                                    id="kategori">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <select class="form-select form-select-solid form-control-lg" data-kt-select2="true"
                                    id="opd">
                                    <option value="">-- Pilih OPD --</option>
                                    @foreach ($opd as $o)
                                        <option value="{{ $o->opd_name }}">{{ $o->opd_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-1">
                                <a href="#" class="btn btn-lg btn-primary" id="cari">Cari</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="card card-flush h-xl-100">
                        <div class="card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder text-gray-800">Data Produk Hukum</span>
                            </h3>
                            <div class="card-title align-items-end flex-column">
                                @if(session('role') == 'superadmin' || session('role') == 'admin' || session('role') == 'opd')
                                <a href="{{ route('admin.master.file.tambah') }}" class="btn btn-danger"><i
                                        class="fa fa-plus"></i>Tambah Baru</a>
                                @endif
                            </div>
                        </div>
                        <div class="card-body pt-2">
                            <table class="table table-bordered table-hover w-100" id="datatables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>No Peraturan</th>
                                        <th>Tahun Di Undang</th>
                                        <th>Judul</th>
                                        <th>Tgl Dibuat</th>
                                        <th>Terakhir Diubah</th>
                                        <th>Publish</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->
    <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
        <!--begin::Container-->
        <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-bold me-1">2022©</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">JDIH Provinsi Jawa
                    Tengah</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
            </ul>
            <!--end::Menu-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Footer-->
    </div>
    <!--end::Wrapper-->
    </div>
    <!--end::Page-->
    </div>
    <!--end::Root-->
@endsection
@section('script')
    @include('admin.partial.script')
    <script>
        var tablefile = $('#datatables').DataTable({
            responsive: false,
            processing: true,
            serverSide: false,
            ajax: {
                url: '{{ route('admin.master.file.datatable') }}',
                type: 'post',
                data: function(d) {
                    d._token = "{{ csrf_token() }}"
                    d.kategori = $('#kategori').val()
                    d.judul = $('#judul').val()
                    d.nomor = $('#nomor').val()
                    d.tahun = $('#tahun').val()
                    d.opd = $('#opd').val()
                },
                beforeSend: function() {
                    if (tablefile && tablefile.hasOwnProperty('settings')) {
                        tablefile.settings()[0].jqXHR.abort();
                    }
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    width: '5%',
                    orderable: true,
                    searchable: false
                },
                {
                    data: 'singkatan_jenis',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'no_peraturan',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'tahun_diundang',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'content',
                    width: '15%',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'created_at',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'updated_at',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'publish',
                    orderable: false
                },
                {
                    data: 'action',
                    orderable: false
                }
            ],
            order: [
                [5, 'desc']
            ]
        });
        $('#cari').click(function() {
            tablefile.ajax.reload();
        });
    </script>
    <script type="text/javascript">
        $('#datatables tbody').on('click', '.hapusfile', function() {
            let id = this.id;
            Swal.fire({
                title: 'Anda Yakin ingin menghapus data ini?',
                text: "Data tidak bisa dikembalikan !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Silahkan Tungu ....")
                    Swal.showLoading()
                    $.ajax({
                        url: '{{ route('admin.master.file.delete') }}',
                        type: 'post',
                        data: {
                            idf: id,
                            _token: "{{ csrf_token() }}"
                        },
                        dataType: 'json',
                        success: function(data) {
                            Swal.fire({
                                text: data.message,
                                icon: data.status,
                                buttonsStyling: !1,
                                confirmButtonText: "Ok!",
                                customClass: {
                                    confirmButton: "btn btn-light"
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                                location.reload();
                            })
                        }
                    });
                }
            })
        })
    </script>
@endsection
