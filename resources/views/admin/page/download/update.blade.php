<div class="modal-header text-center">
						<h5 class="modal-title" id="exampleModalLabel">Tambah File Download</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="form-filter">
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Name</label>
								<div class="col-sm-12">
								    <input type="text" class="form-control" id="nameedit" value="{{ $ddn->name }}" placeholder="masukan nama Dokumen">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Rakor</label>
								<div class="col-sm-12">
                                    <input type="text" class="form-control" id="rakoredit" value="{{ $ddn->rakor }}" placeholder="masukan Rakor">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Tanggal</label>
								<div class="col-sm-12">
                                    <input type="text" class="form-control pilihtanggal" id="tgledit" value="{{ $ddn->tgl }}" placeholder="masukan Tanggal">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">File</label>
								<div class="col-sm-12">
                                @if(isset($ddn)&&$ddn->file!='')
                                <iframe src="{{ asset('download/'.$ddn->file )}}" style="width:300px; height:300px;" frameborder="0"></iframe>
                                <br>
                                @else
                                    <label style="color:red;">Belum ada File</label>
                                @endif
								<input type="file" class="form-control" id="fileedit" value="">
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button id="editproses" type="button" class="btn btn-primary btn-filter"><i id="loadinge"></i>
							Simpan
						</button>
					</div>
                    <script>
    $('#editproses').on('click',function(){
        $('#loadinge').addClass('fa fa-spinner fa-spin fa-fw');
        axios({
        method: "post",
        url: "{{ route('admin.master.download.update.proses') }}",
        data: {
            id: '{{ $ddn->id }}',
            name: $('#nameedit').val(),
            rakor: $('#rakoredit').val(),
            tgl: $('#tgledit').val(),
            file: $('#fileedit')[0].files[0],
            _token: "{{ csrf_token() }}"
        },
        headers: { "Content-Type": "multipart/form-data" },
        })
        .then(function (response) {
            $('#loadinge').removeClass('fa fa-spinner fa-spin fa-fw');
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
                title:'gagal update anggota'
            })		
        });
    });
</script> 