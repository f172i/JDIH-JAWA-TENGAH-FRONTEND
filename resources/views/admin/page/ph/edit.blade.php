<div class="modal-header text-center">
<h5 class="modal-title" id="exampleModalLabel">Ubah Data Kategori</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form id="form-filter">
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Nama</label>
        <div class="col-sm-12">
        <input type="text" class="form-control" id="nameedit" value="{{ isset($data)&&$data!=''?$data->name:''; }}" placeholder="masukan nama Pelayanan Hukum Elektronik">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Logo (upload untuk mengubah logo)</label>
        <div class="col-sm-12">
        <input type="file" class="form-control" id="logoedit">
        </div>
    </div>
    <div class="mb-3 row">
        <label class="col-sm-12 col-form-label">Link</label>
        <div class="col-sm-12">
        <input type="text" class="form-control" id="linkedit" value="{{ isset($data)&&$data!=''?$data->link:''; }}" placeholder="masukan link Pelayanan Hukum Elektronik">
        </div>
    </div>
</form>
</div>
<div class="modal-footer">
<button id="editphproses" type="button" class="btn btn-primary btn-filter"><i id="loadingeditph"></i>
    Simpan
</button>
</div>
<script>
$('#editphproses').on('click',function(){
$('#loadingeditph').addClass('fa fa-spinner fa-spin fa-fw');
axios({
method: "post",
url: "{{ route('admin.master.ph.update.proses') }}",
data: {
id: "{{ $data->id }}",
nameedit: $('#nameedit').val(),
linkedit: $('#linkedit').val(),
logo: $('#logoedit')[0].files[0],
_token: "{{ csrf_token() }}"
},
headers: { "Content-Type": "multipart/form-data" },
})
.then(function (response) {
$('#loadingeditph').removeClass('fa fa-spinner fa-spin fa-fw');
Swal.fire({
icon: 'success',
title:response.data.message
}).then(() => {
// location.reload();
})		
})
.catch(function (response) {
$('#loadingeditkat').removeClass('fa fa-spinner fa-spin fa-fw');
Swal.fire({
icon: 'error',
title:'gagal update data pelayanan hukum elektronik'
})	
});
});
</script>