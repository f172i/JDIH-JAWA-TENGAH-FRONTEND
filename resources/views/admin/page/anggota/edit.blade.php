<div class="modal-header text-center">
						<h5 class="modal-title" id="exampleModalLabel">Tambah Anggota</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form id="form-filter">
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Nama Anggota</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="nameedit" value="{{ $data->name }}" placeholder="masukan nama Anggota">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Logo Anggota</label>
								<div class="col-sm-12">
                                @if(isset($data)&&$data->logo!='')
                                    <img width="200px"  src="{{ asset('anggota/'.$data->logo) }}"  ><br>
                                @else
                                    <label style="color:red;">Belum ada logo</label>
                                @endif
								<input type="file" class="form-control" id="logoedit" value="">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Website Anggota</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="linkedit" value="{{ $data->website }}" placeholder="masukan Website Anggota">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Deskripsi Anggota</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="descedit" value="{{ $data->desc_anggota }}" placeholder="masukan Deskripsi Anggota">
								</div>
							</div>
                            <div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Wilayah Anggota</label>
								<div class="col-sm-12">
                                    <select class="form-select form-select-solid mb-3 mb-lg-0" data-kt-select2="true" id="wilayahedit">
                                        <option>-- Pilih Wilayah --</option>
                                        @foreach ($wilayah as $w)
                                            <option {{ $w->id == $data->wilayah ? 'selected' : ''; }} value="{{ $w->id }}">{{ $w->nama }}</option>
                                        @endforeach
                                    </select>
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
        url: "{{ route('admin.master.anggota.update.proses') }}",
        data: {
            id: '{{ $data->id }}',
            name: $('#nameedit').val(),
            link: $('#linkedit').val(),
            wilayah: $('#wilayahedit').val(),
            desc_anggota: $('#descedit').val(),
            logo: $('#logoedit')[0].files[0],
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