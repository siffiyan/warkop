@extends('tentor.template.master')

@section('content')

<div class="col-md-12">
<div class="card">
<div class="card-body">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel1">
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
		<button class="btn btn-success" onclick="detail_permintaan_les({{$r->id}})">Detail</button>
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

<script type="text/javascript">

	$(document).ready( function () {
    $('#tabel').DataTable();
    $('#tabel1').DataTable();
	});
	
	function detail_permintaan_les(id){

		$.ajax({
			url:'/tentor/permintaan_les/'+id,
			type:'get',
			dataType:'json',
			success:function(response){
				$('#id').val(id);
				$('#detail_permintaan_les').empty();
				$.each(response,function(i,value){
					$('#detail_permintaan_les').append(`
						<tr>
							<td>`+(i+1)+`</td>
							<td>`+value.tanggal_pertemuan+`</td>
							<td>`+value.waktu+` `+value.zona+`</td>
							<td>`+value.jumlah_orang+`</td>
							<td>`+value.durasi+` menit</td>
						</tr>
					`);
				});
				$('#modal_detail_permintaan_les').modal('show');
			},
			error:function(){
				alert('terjadi error');
			}

		});
		
	}

</script>

@endsection

<!--  Modal detail permintaan les -->
<div class="modal fade custom-modal" id="modal_detail_permintaan_les">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Detail Permintaan Les</h5>
</div>
<div class="modal-body">
<form action="/tentor/permintaan_les/ambil" method="post">
@csrf
@method('PUT')

<input type="hidden" name="id" id="id">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel">
<thead>
<tr>
<th>No</th>
<th>Tanggal</th>
<th>Waktu</th>
<th>Jumlah Orang</th>
<th>Durasi</th>
</tr>
</thead>
<tbody id="detail_permintaan_les">

</tbody>
</table>
</div>

<br>

<div  style="float: right;">
	<button class="btn btn-primary" type="submit">Ambil</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!--  Modal detail permintaan les -->