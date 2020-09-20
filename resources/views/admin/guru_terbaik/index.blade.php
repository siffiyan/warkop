@extends('admin.template.master')

@section('title','Guru Terbaik')

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('star/src/css/star-rating-svg.css')}}">
@endsection

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
<th class="text-center">Rating</th>
<th class="text-center">Poin</th>
</tr>
</thead>
<tbody>
@foreach($guru as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->nama}}</td>
	<td>{{$r->nama_institusi}}</td>
	<td class="text-center">  <span class="my-rating" data-rating="{{$r->penilaian}}"></span> &nbsp; ({{round($r->penilaian,2)}})</td>
	<td class="text-center">{{$r->poin}} Point</td>
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
	<script src="{{asset('star/src/jquery.star-rating-svg.js')}}"></script>
	<script>
		 $(".my-rating").starRating({
			totalStars: 5,
			starShape: 'rounded',
			readOnly: true,
			starSize: 15,
			emptyColor: 'lightgray',
			hoverColor: 'salmon',
			activeColor: 'crimson',
			useGradient: false
		});
	</script>
@endsection