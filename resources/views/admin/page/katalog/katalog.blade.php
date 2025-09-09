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
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Katalog Produk Hukum<h1>
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
									<!--end::Separator-->
									<!--end::Description--></h1>
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
                                <div class="card card-flush h-xl-100">
                                    <div class="card-header">
                                        <h3 class="card-title align-items-start flex-column">
                                            <span class="card-label fw-bolder text-gray-800">Katalog Produk Hukum</span>
                                        </h3>
                                        
                                        <div class="card-title align-items-end flex-column">
                                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                   			data-bs-target="#tambah"><i class="fa fa-plus"></i>Tambah Baru</a>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <table class="table table-bordered table-hover w-100" id="datatables">
                                            <thead>
                                                <tr>
                                                    <th >No</th>
                                                    <th >Nama</th>
                                                    <th >Tahun</th>
                                                    <th >Download</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no=1; @endphp
                                                @if(isset($katalog))
                                                    @foreach($katalog as $k)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $k->name }}</td>
                                                            <td>{{ $k->tahun }}</td>
                                                            <td><iframe src="{{ asset('katalog_download/'.$k->file) }}" style="width:300px; height:300px;" frameborder="0"></iframe></td>
                                                            <td>
                                                                <a href="#" class="btn btn-sm btn-danger hapusfile" id="{{$k->id}}">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
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
                    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="width:150%;">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title" id="exampleModalLabel">Katalog</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-filter">
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">Nama</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="nama">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">Tahun</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="tahun">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-12 col-form-label">File</label>
                                            <div class="col-sm-12">
                                                <input type="file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="file">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button id="tambahphproses" type="button" class="btn btn-primary btn-filter"><i id="loading"></i>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>                    
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2022©</span>
								<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">JDIH Provinsi Jawa Tengah</a>
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
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    $('#tambahphproses').on('click',function(){
        let nama = $('#nama').val();
        let tahun = $('#tahun').val();
        let file = $('#file')[0].files[0];

        $('#loading').addClass('fa fa-spinner fa-spin fa-fw');
        axios({
        method: "post",
        url: "{{ route('admin.master.katalog.store') }}",
        data: {
            nama: nama,
            tahun: tahun,
            file: file,
            _token: "{{ csrf_token() }}"
        },
        headers: { "Content-Type": "multipart/form-data" },
        })
        .then(function (response) {
            $('#loading').removeClass('fa fa-spinner fa-spin fa-fw');
            Swal.fire({
                icon: 'success',
                title:response.data.message
            }).then(() => {
                location.reload();
            })		
        })
        .catch(function (response) {
            $('#loading').removeClass('fa fa-spinner fa-spin fa-fw');
            Swal.fire({
                icon: 'error',
                title:'gagal update visi misi'
            })		
        });
    });
</script>
<script type="text/javascript">
    	$('#datatables tbody').on('click', '.hapusfile', function () {
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
                  url: '{{ route('admin.master.katalog.delete') }}',
                  type: 'post',
                  data: {
					id:id,
					_token: "{{ csrf_token() }}"
				},
                  dataType: 'json',
                  success: function(data){
                    Swal.fire({
                        text: data.message,
                        icon: data.status,
                        buttonsStyling: !1,
                        confirmButtonText: "Ok!",
                        customClass:{
                           confirmButton: "btn btn-light"
                        }
                    }).then((result) => {
						if (result.isConfirmed) {
							location.reload();
						}
					})
                  }
                });
              }
            })
        })
	</script>
@endsection

