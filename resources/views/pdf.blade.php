<!DOCTYPE html>
<html>
<head>
	<title>Katalog Produk Hukum</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h3>Katalog Produk Hukum JDIH Provinsi Jawa Tengah</h3>
	</center>
 
	<table class='table table-bordered'>
    <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Bentuk Produk Hukum</th>
                                                    <th rowspan="2">No Peraturan</th>
                                                    <th colspan="2">Tanggal</th>
                                                    <th rowspan="2">Judul</th>
                                                    <th rowspan="2">Sumber</th>
                                                    <th rowspan="2">Status</th>
                                                </tr>
                                                <tr>
                                                    <th >Ditetap</th>
                                                    <th>Diundang</th>
                                                </tr>
                                            </thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($data as $p)
				<tr>
					<td>{{ $i++ }}</td>
					<td>{{ $p->bph }}</td>
					<td>{{ $p->no_peraturan}} Tahun {{$p->tahun_diundang }}</td>
					<td>{{ $p->tgl_ditetap }}</td>
					<td>{{ $p->tgl_diundang }}</td>
					<td>{{ Helper::string_rmv_html($p->content) }}</td>
					<td>{{ $p->sumber }}</td>
					<td>{{ $p->status == 1 ? 'Berlaku' : 'Tidak Berlaku' }}</td>
				</tr>
				@endforeach
			</tbody>
 
</body>
</html>