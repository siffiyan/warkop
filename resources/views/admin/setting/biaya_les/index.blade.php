@extends('admin.template.master')

@section('title','Biaya Les')

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

<button id="button_tambah_biaya_les" class="btn btn-primary"><i class="fe fe-plus"></i> &nbsp;Tambah Biaya Les</button>
<p></p>

<div class="card">

<div class="card-header">
<h4 class="card-title">Data Biaya Les</h4>
</div>

<div class="card-body">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel1">
<thead>
<tr>
<th>No</th>
<th>Jenjang</th>
<th>Kurikulum</th>
<th>Harga 90 Menit</th>
<th>Harga 120 Menit</th>
<th>Tambahan @ 1 Orang</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($biaya as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->jenjang}}</td>
	<td>{{$r->kurikulum}}</td>
	<td>{{$r->harga_90}}</td>
	<td>{{$r->harga_120}}</td>
	<td>{{$r->harga_tambahan_per_1}}</td>
	<td>
	<button class="btn btn-success" onclick="edit({{$r->id}})"><i class="fe fe-pencil"></i></button>
    <button class="btn btn-danger" onclick="hapus({{$r->id}})"><i class="fe fe-trash"></i></button>
 	</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>
</div>

</div>

<!-- Modal Tambah Biaya Les -->
<form action="/admin/setting/biaya_les" method="post">
{{csrf_field()}}
<div class="modal fade" id="modal_tambah_biaya_les" aria-hidden="true" role="dialog">
<div class="modal-dialog  modal-lg" role="document" >
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah Biaya Les</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">
<div class="col-6 col-sm-4">
<div class="form-group">
<label>Data Jenjang</label>
<select class="form-control" required name="jenjang_id">
@foreach($jenjang as $r)
<option value="{{$r->id}}">{{$r->jenjang}}</option>
@endforeach
</select>
</div>
</div>
<div class="col-6 col-sm-4">
<div class="form-group">
<label>Data Kurikulum</label>
<select class="form-control" name="kurikulum_id">
@foreach($kurikulum as $r)
<option value="{{$r->id}}">{{$r->kurikulum}}</option>
@endforeach
</select>
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group">
<label>Tambahan Harga per 1 Orang</label>
<input type="number" class="form-control" required name="harga_tambahan_per_1">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Harga 1 Orang ( 90 menit )</label>
<input type="number" class="form-control" required name="harga_90">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Harga 1 Orang ( 120 menit )</label>
<input type="number" class="form-control" required name="harga_120">
</div>
</div>

</div>


<button type="submit" style="float: right;" class="btn btn-primary">Submit</button>

</div>
</div>
</div>
</div>
</form>

<!-- Modal Tambah Biaya Les -->

<!-- Modal Tambah Biaya Les -->
<form action="/admin/setting/biaya_les/update" method="post">
{{csrf_field()}}
<input type="hidden" name="_method" value="put">
<div class="modal fade" id="modal_edit_biaya_les" aria-hidden="true" role="dialog">
<div class="modal-dialog  modal-lg" role="document" >
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Edit Biaya Les</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<input type="hidden" id="id" name="id">
<div class="row">
<div class="col-6 col-sm-4">
<div class="form-group">
<label>Data Jenjang</label>
<select class="form-control" id="jenjang_edit" required name="jenjang_id">

</select>
</div>
</div>
<div class="col-6 col-sm-4">
<div class="form-group">
<label>Data Kurikulum</label>
<select class="form-control" id="kurikulum_edit" name="kurikulum_id">

</select>
</div>
</div>

<div class="col-12 col-sm-4">
<div class="form-group">
<label>Tambahan Harga per 1 Orang</label>
<input type="number" class="form-control" required id="harga_tambahan_per_1_edit" name="harga_tambahan_per_1">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Harga 1 Orang ( 90 menit )</label>
<input type="number" class="form-control" required id="harga_90_edit" name="harga_90">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Harga 1 Orang ( 120 menit )</label>
<input type="number" class="form-control" required id="harga_120_edit" name="harga_120">
</div>
</div>

</div>


<button type="submit" style="float: right;" class="btn btn-primary">Submit</button>

</div>
</div>
</div>
</div>
</form>

<!-- Modal Tambah Biaya Les -->

<!-- Delete Model -->
<form action="/admin/setting/biaya_les" method="post">
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
	
	$('#button_tambah_biaya_les').click(function(){
		$('#modal_tambah_biaya_les').modal('show');
	})

	function edit(id){
		$.ajax({
			url:'/admin/setting/biaya_les/'+id+'/edit',
			type:'get',
			dataType:'json',
			success:function(response){

				$('#id').val(id);

				$('#jenjang_edit').empty();
				$.each(response.jenjang,function(i,value){
					if(value.id==response.biaya_les.jenjang_id){
						$('#jenjang_edit').append(`
						<option value=`+value.id+` selected>`+value.jenjang+`</option>
					`)
					}	

					else{
						$('#jenjang_edit').append(`
						<option value=`+value.id+`>`+value.jenjang+`</option>
					`)
					}
					
				});

				$('#kurikulum_edit').empty();
				$.each(response.kurikulum,function(i,value){
					if(value.id== response.biaya_les.kurikulum_id){
						$('#kurikulum_edit').append(`
						<option value=`+value.id+` selected>`+value.kurikulum+`</option>
					`)
					}

					else{
						$('#kurikulum_edit').append(`
						<option value=`+value.id+`>`+value.kurikulum+`</option>
					`)
					}
			
				});

				$('#harga_tambahan_per_1_edit').val(response.biaya_les.harga_tambahan_per_1);
				$('#harga_90_edit').val(response.biaya_les.harga_90);
				$('#harga_120_edit').val(response.biaya_les.harga_120);
				$('#modal_edit_biaya_les').modal('show');
			},
			error:function(){
				alert('error');
			}
		});	
	}

</script>

@endsection