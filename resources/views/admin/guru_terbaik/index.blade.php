@extends('admin.template.master')

@section('title','Guru Terbaik')

@section('content')

<div class="col-sm-12">

<div class="card">

<div class="card-body">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel1">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Universitas</th>
<th>Rating</th>
<th>Poin</th>
</tr>
</thead>
<tbody>
@foreach($guru as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->nama}}</td>
	<td>{{$r->nama_institusi}}</td>
	<td>-</td>
	<td>-</td>
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