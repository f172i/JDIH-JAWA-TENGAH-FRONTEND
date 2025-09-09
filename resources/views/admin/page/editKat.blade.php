                <div class="modal-header text-center">
						<h5 class="modal-title" id="exampleModalLabel">Ubah Data Kategori</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="form-filter">
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Jenis Produk Hukum Baru</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="namaedit" value="{{ isset($data)&&$data!=''?$data->nama:''; }}" placeholder="masukan Kategori baru anda">
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Singkatan Produk Hukum Baru</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="singkatanedit" value="{{ isset($data)&&$data!=''?$data->singkatan:''; }}" placeholder="masukan Kategori baru anda">
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Deskripsi Produk Hukum Baru</label>
								<div class="col-sm-12">
								<textarea name="deskripsiedit" id="deskripsiedit" cols="30" rows="10" class="form-control">{{ isset($data)&&$data!=''?$data->deskripsi:''; }}</textarea>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button id="editkategoriproses" type="button" class="btn btn-primary btn-filter"><i id="loadingeditkat"></i>
							Simpan
						</button>
					</div>
<script>
$('#editkategoriproses').on('click',function(){
	$('#loadingeditkat').addClass('fa fa-spinner fa-spin fa-fw');
	axios({
	method: "post",
	url: "{{ route('admin.master.kategori.update.proses') }}",
	data: {
        id: "{{ $data->id }}",
		kategori: $('#namaedit').val(),
		singkatan: $('#singkatanedit').val(),
		deskripsi: $('#deskripsiedit').val(),
		_token: "{{ csrf_token() }}"
	},
	headers: { "Content-Type": "multipart/form-data" },
	})
	.then(function (response) {
		$('#loadingeditkat').removeClass('fa fa-spinner fa-spin fa-fw');
		Swal.fire({
			icon: 'success',
			title:response.data.message
		}).then(() => {
			location.reload();
		})		
	})
	.catch(function (response) {
		$('#loadingeditkat').removeClass('fa fa-spinner fa-spin fa-fw');
		Swal.fire({
			icon: 'error',
			title:'gagal update data kategori baru'
		}).then(() => {
			location.reload();
		})		
	});
});
</script>