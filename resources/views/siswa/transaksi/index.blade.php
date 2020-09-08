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
<th class="text-center">Kode Transaksi</th>
<th>Judul</th>
<th class="text-center">Status</th>
<th class="text-center">Aksi</th>
</tr>
</thead>
<tbody>
@foreach($transaksi as $r)
<tr>
<td>{{$loop->iteration}}</td>
<td class="text-center"> <b>{{$r->kode_transaksi}}</b> </td>
<td>{{$r->judul}}</td>
<td class="text-center">
	<span class="reject">{{$r->status}}</span>
	<a href="{{route('siswa.pembayaran.detail',$r->id)}}"><span class="pending" style="cursor: pointer">Info Pembayaran</span></a>
</td>
<td class="text-center">
	<a href="{{route('siswa.pembayaran',$r->kode_transaksi)}}" class="btn btn-outline-primary active">Konfirmasi Pembayaran</a>
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