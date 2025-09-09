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
									<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Data Master Anggota JDIH Per Wilayah<h1>
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
                                            <span class="card-label fw-bolder text-gray-800">Data Anggota JDIH Per Wilayah</span>
                                        </h3>
                                        <div class="card-title align-items-end flex-column">
                                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                   			data-bs-target="#tambahkategori"><i class="fa fa-plus"></i>Tambah Baru</a>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <table class="table table-bordered table-hover w-100" id="datatables">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Logo</th>
                                                    <th>Wilayah</th>
                                                    <th>Website</th>
                                                    <th>Deskripsi</th>
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
		 <!-- Modal Filter -->
		<div class="modal fade" id="tambahkategori" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="form-filter">
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Nama Anggota</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="name" value="" placeholder="masukan nama Anggota">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Logo Anggota</label>
								<div class="col-sm-12">
								<input type="file" class="form-control" id="logo" value="">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Website Anggota</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="link" value="" placeholder="masukan Website Anggota">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Wilayah Anggota</label>
								<div class="col-sm-12">
                                    <select class="form-select form-select-solid mb-3 mb-lg-0" data-kt-select2="true" id="wilayah">
                                        <option>-- Pilih Wilayah --</option>
                                        @foreach ($wilayah as $w)
                                            <option value="{{ $w->id }}">{{ $w->nama }}</option>
                                        @endforeach
                                    </select>
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
		<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content" id="body-edit">
					
				</div>
			</div>
		</div>
@endsection
@section('script')
    @include('admin.partial.script')
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
       $('#datatables').DataTable({
            responsive: true,
            processing: true,
            serverSide: false,
            ajax: {
                url: '{{ route('admin.master.anggota.datatable') }}',
                type: 'post',
				data: { "_token": "{{ csrf_token() }}" }
            },
            columns: [
                {data: 'DT_RowIndex', width: '5%', orderable: true, searchable: true},
                {data: 'name', orderable: true, searchable: true},
                {data: 'file'},
                {data: 'nama', orderable: true, searchable: true},
                {data: 'website', orderable: true, searchable: true},
                {data: 'desc_anggota', orderable: true, searchable: true},
                {data: 'action', orderable: false, searchable: false }
            ],
            columnDefs: [
                { targets: 2,
                render: function(data) {
                    return '<img src="'+data+'" style="max-width:200px;height:auto;">'
                }
                }   
            ],
            order: [[0,'asc']]
        });
    </script>
    <script type="text/javascript">
    	$('#datatables tbody').on('click', '.hapusa', function () {
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
                  url: '{{ route('admin.master.anggota.delete') }}',
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
<script>
    $('#tambahphproses').on('click',function(){
        console.log( $('#wilayah').val())
        $('#loading').addClass('fa fa-spinner fa-spin fa-fw');
        axios({
        method: "post",
        url: "{{ route('admin.master.anggota.store') }}",
        data: {
            name: $('#name').val(),
            link: $('#link').val(),
            wilayah: $('#wilayah').val(),
            logo: $('#logo')[0].files[0],
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
                title:'gagal tambah banner baru'
            })		
        });
    });
</script>
<script>
    $('document').ready(function(){
        function getEdit(id) {
         $('#body-edit').html('<div class="card"><h2 style="text-align: center;">Loading...</h2></div>');
			var url = `{{ url('/admin/master-anggota-update') }}/${id}`;
            $.get(url, function(data) {
                $('#body-edit').html(data);
            });
        }
		$('#datatables tbody').on('click', '.edita', function () {
            console.log("click")
            var id = this.id;
            getEdit(id)
        })

    });
</script>
@endsection

