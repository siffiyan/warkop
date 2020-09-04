@extends('siswa.template.master')

@section('content')

<div class="row">
<div class="col-md-12">
<!-- <h4 class="mb-4">Mentee Lists</h4> -->
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">

<table class="table table-hover table-center mb-0" id="table">
<thead style="background: #e51453;color:white;">
<tr>
<th>#</th>
<th>Judul</th>
<th class="text-center">Status</th>
<th class="text-center">Aksi</th>
</tr>
</thead>
<tbody>
@foreach($transaksi as $r)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$r->judul}}</td>
<td class="text-center">
	<span class="reject">{{$r->status}}</span>
	<span class="pending">Info Pembayaran</span>
</td>
<td class="text-center">
	<button type="button" class="btn btn-outline-primary active">Konfirmasi Pembayaran</button>
</td>
</tr>
@endforeach
</tbody>
</table>		

</div>
</div>
</div>
</div>
</div>

@endsection