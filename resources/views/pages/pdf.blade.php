<!DOCTYPE html>
<html>
<head>
	<title> Laporan PDF Absensi</title>
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
		<h5>Laporan PDF Absensi</h4>
		<h6><a target="_blank" href="https://www.malasngoding.com/membuat-laporan-…n-dompdf-laravel/">www.malasngoding.com</a></h5>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Waktu Absen</th>
				<th>Tipe</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($absen as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->account->personal->fullname}}</td>
				<td>{{$p->absen_of_date}}</td>
				<td>{{$p->type}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>