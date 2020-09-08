@extends('tentor.template.master')

@section('content')

<div class="col-md-12">
<div class="card">
<div class="card-body">

<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>No</th>
<th>Judul</th>	
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($permintaan as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->judul}}</td>
	<td>
		<button class="btn btn-primary">Detail</button>
		<button class="btn btn-success">Ambil</button>
	</td>
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