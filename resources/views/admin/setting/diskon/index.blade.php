@extends('admin.template.master')

@section('title','Atur Diskon')

@section('content')

<div class="col-sm-12">

@if ($message = Session::get('msg'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('err'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

<button id="button_tambah_diskon" class="btn btn-primary"><i class="fe fe-plus"></i> &nbsp;Tambah Diskon</button>
<p></p>

<div class="card">

<div class="card-header">
<h4 class="card-title">Data Diskon</h4>
</div>

<div class="card-body">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel1">
<thead>
<tr>
<th>No</th>
<th>Kode Promo</th>
<th>Presentase Diskon (%)</th>
<th>Tanggal Mulai</th>
<th>Tanggal Akhir</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($diskon as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->kode_promo}}</td>
	<td>{{$r->presentase}}</td>
	<td>{{$r->tanggal_mulai}}</td>
	<td>{{$r->tanggal_akhir}}</td>
	<td><button class="btn btn-success" onclick="edit({{$r->id}})"><i class="fe fe-pencil"></i></button>
     <button class="btn btn-danger" onclick="hapus({{$r->id}})"><i class="fe fe-trash"></i></button></td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>
</div>

</div>

<!-- Modal Tambah Diskon -->
<form action="/admin/setting/atur_diskon" method="post">
{{csrf_field()}}
<div class="modal fade" id="modal_tambah_diskon" aria-hidden="true" role="dialog">
<div class="modal-dialog" role="document" >
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah Diskon</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">

<div class="col-md-12">
<div class="form-group">
<label>Kode Promo</label>
<input type="text" class="form-control" required="" name="kode_promo" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Tanggal Mulai</label>
<input type="date" name="tanggal_mulai" required="" class="form-control">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Tanggal Akhir</label>
<input type="date" name="tanggal_akhir" required=""  class="form-control">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Presentase Diskon (%)</label>
<input type="number" class="form-control" required="" name="presentase" required>
</div>
</div>

</div>


<button type="submit" style="float: right;" class="btn btn-primary">Submit</button>

</div>
</div>
</div>
</div>
</form>
<!-- Modal Tambah Diskon -->

<!-- Modal Edit Diskon -->
<form action="/admin/setting/atur_diskon/update" method="post">
<input type="hidden" name="_method" value="put">
{{csrf_field()}}
<div class="modal fade" id="modal_edit_diskon" aria-hidden="true" role="dialog">
<div class="modal-dialog" role="document" >
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Edit Diskon</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">

<input type="hidden" name="id" id="id">
<div class="col-md-12">
<div class="form-group">
<label>Kode Promo</label>
<input type="text" class="form-control" required="" name="kode_promo" id="kode_promo" required>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Tanggal Mulai</label>
<input type="date" name="tanggal_mulai" required="" id="tanggal_mulai" class="form-control">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Tanggal Akhir</label>
<input type="date" name="tanggal_akhir" required="" id="tanggal_akhir" class="form-control">
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Presentase Diskon (%)</label>
<input type="number" class="form-control" required="" id="presentase" name="presentase" required>
</div>
</div>

</div>


<button type="submit" style="float: right;" class="btn btn-primary">Submit</button>

</div>
</div>
</div>
</div>
</form>
<!-- Modal Tambah User -->

<!-- Delete Model -->
<form action="/admin/setting/atur_diskon/delete" method="post">
<input type="hidden" name="_method" value="delete">
{{csrf_field()}}
<div class="modal fade" id="delete_modal" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">Delete</h4>
					<input type="hidden" name="id" id="id_hapus">
					<p class="mb-4">Are you sure want to delete?</p>
					<button type="submit" class="btn btn-primary">Delete </button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<!-- Delete Model -->

@endsection

@section('js')

<script type="text/javascript">

	function hapus(id){
		$('#id_hapus').val(id);
		$('#delete_modal').modal('show');
	}

	function edit(id){
		$.ajax({
			url:'/admin/setting/atur_diskon/'+id+'/edit',
			type:'get',
			dataType:'json',
			success:function(response){
				$('#id').val(id);
				$('#kode_promo').val(response.kode_promo);
				$('#presentase').val(response.presentase);
				$('#tanggal_mulai').val(response.tanggal_mulai);
				$('#tanggal_akhir').val(response.tanggal_akhir);
				$('#modal_edit_diskon').modal('show');
			},
			error:function(){
				alert('error');
			}
		});
	}
	
	$('#button_tambah_diskon').click(function(){
		$('#modal_tambah_diskon').modal('show');
	})

</script>
@endsection