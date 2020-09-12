@extends('admin.template.master')

@section('title','Link Guru Meet')

@section('content')

<div class="col-sm-12">

<div class="card">

<div class="card-header">
<h4 class="card-title"><?php echo date('M Y'); ?></h4>
</div>

<div class="card-body">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel1">
<thead>
<tr>
<th>No</th>
<th>Tanggal</th>
<th>Jam Mulai</th>
<th>Durasi</th>
<th>Jenjang</th>
<th>Mata Pelajaran</th>
<th>Murid</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($meet as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->tanggal_pertemuan}}</td>
	<td>-</td>
	<td>{{$r->durasi}}</td>
	<td>{{$r->jenjang}}</td>
	<td>{{$r->mata_pelajaran}}</td>
	<td>{{$r->nama}}</td>
	<td><a href="{{$r->link_meeting}}"><button class="btn btn-white">Mulai Belajar</button></a></td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>
</div>

</div>

@endsection

@section('js')

@endsection