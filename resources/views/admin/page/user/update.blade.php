<div class="modal-header text-center">
<h5 class="modal-title" id="exampleModalLabel">Ubah Data Kategori</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
						<form id="form-filter">
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Email</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="emailedit" value="{{ isset($data)&$data!=''?$data->email:''; }}" placeholder="masukan email user untuk login">
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Name</label>
								<div class="col-sm-12">
								<input type="text" class="form-control" id="nameedit" value="{{ isset($data)&$data!=''?$data->name:''; }}" placeholder="masukan nama user">
								</div>
							</div>
							<div class="mb-3 row">
								<label class="col-sm-12 col-form-label">Role</label>
								<div class="col-sm-12">
								<select class="form-select form-select-solid form-control-lg" data-kt-select2="true" id="roleedit" required>
                                    <option value=""> -- Pilih Role User --</option>
                                    @foreach($role as $r)
                                        <option <?=isset($data)&&$data->role == $r->id?"selected":"";?>  value="{{$r->id}}">{{$r->roles_name}}</option> 
                                    @endforeach
                                </select>
								</div>
							</div>
						</form>
					</div>
<div class="modal-footer">
<button id="edituserproses" type="button" class="btn btn-primary btn-filter"><i id="loadingedituser"></i>
    Simpan
</button>
</div>
<script>
    $('#edituserproses').on('click',function(){
        $('#loadingedituser').addClass('fa fa-spinner fa-spin fa-fw');
        axios({
            method: "post",
            url: "{{ route('admin.master.user.update.proses') }}",
            data: {
                id: "{{ $data->id }}",
                email: $('#emailedit').val(),
                name: $('#nameedit').val(),
                role: $('#roleedit').val(),
                _token: "{{ csrf_token() }}"
            },
            headers: { "Content-Type": "multipart/form-data" },
        })
        .then(function (response) {
            $('#loadingedituser').removeClass('fa fa-spinner fa-spin fa-fw');
            Swal.fire({
                icon: 'success',
                title:response.data.message
                }).then(() => {
                    location.reload();
            })		
        })
        .catch(function (response) {
            $('#loadingedituser').removeClass('fa fa-spinner fa-spin fa-fw');
            Swal.fire({
                icon: 'error',
                title:'gagal update data user'
            })	
        });
    });
</script>