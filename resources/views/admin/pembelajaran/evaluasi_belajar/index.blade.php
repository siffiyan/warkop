@extends('admin.template.master')

@section('title','Evaluasi Belajar')

@section('content')

<div class="col-sm-12">

<div class="card">

<div class="card-body">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel1">
<thead>
<tr>
<th>No</th>
<th>Nama Murid</th>
<th>Pemahaman</th>
<th>Konsentrasi</th>
<th>Penilaian</th>
<th>Guru</th>
</tr>
</thead>
<tbody>
@foreach($evaluasi_belajar as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->nama_murid}}</td>
	<td>{{$r->pemahaman}}</td>
	<td>{{$r->konsentrasi}}</td>
	<td>{{$r->penilaian}}</td>
	<td>{{$r->nama_mitra}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>
</div>

</div>

@endsection