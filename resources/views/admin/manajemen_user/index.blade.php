@extends('admin.template.master')

@section('title','Manajemen User')

@section('css')

<style type="text/css">
.nav-tabs.nav-tabs-solid > li > a.active, .nav-tabs.nav-tabs-solid > li > a.active:hover, .nav-tabs.nav-tabs-solid > li > a.active:focus {
background-color: #3dd598 !important;
border-color: #3dd598 !important;
color: #fff;
}
}
</style>
@endsection

@section('content')

<div class="col-sm-12">

@if ($message = Session::get('msg'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<button id="button_tambah_user" class="btn btn-primary"><i class="fe fe-plus"></i> &nbsp;Tambah User</button>

<p></p>
	
<div class="card">
<div class="card-header">
<h4 class="card-title">Data User</h4>
</div>
<div class="card-body">
<ul class="nav nav-tabs nav-tabs-solid nav-justified">
<li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab">Murid ( {{$murid->count()}} )</a></li>
<li class="nav-item"><a class="nav-link" href="#solid-justified-tab2" data-toggle="tab">Mitra Guru ( {{$mitra->count()}} )</a></li>
<li class="nav-item"><a class="nav-link" href="#solid-justified-tab3" data-toggle="tab">Admin ( {{$admin->count()}} )</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane show active" id="solid-justified-tab1">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel1">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($murid as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->nama}}</td>
	<td>{{$r->email}}</td>
	<td><button class="btn btn-success">detail</button></td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>
<div class="tab-pane" id="solid-justified-tab2">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel2">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($mitra as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->nama}}</td>
	<td>{{$r->email}}</td>
	<td><button class="btn btn-success">detail</button></td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>
<div class="tab-pane" id="solid-justified-tab3">

<div class="table-responsive">
<table class="datatable table table-stripped" id="tabel3">
<thead>
<tr>
<th>No</th>
<th>Nama</th>
<th>Email</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($admin as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->nama}}</td>
	<td>{{$r->email}}</td>
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
</div>

</div>

<!-- Modal Tambah User -->
<form action="/admin/manajemen_user" method="post">
{{csrf_field()}}
<div class="modal fade" id="modal_tambah_user" aria-hidden="true" role="dialog">
<div class="modal-dialog" role="document" >
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah User</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Nama</label>
<input type="text" class="form-control" name="nama" required>
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email" required> 
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label for="exampleFormControlSelect1">Role</label>
<select class="form-control" id="role" name="role">
<option value="mitra">Mitra</option>
<option value="admin">Admin</option>
</select>
</div>
</div>

<div class="col-md-12" style="display: none" id="place_password">
<div class="form-group">
<label>Password</label>
<input type="Password" class="form-control" id="password" name="password"> 
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

<!-- Edit Details Modal -->
<form action="/admin/manajemen_user/update" method="post">
<input type="hidden" name="_method" value="put">
{{csrf_field()}}
<div class="modal fade" id="edit_modal" aria-hidden="true" role="dialog">
	<div class="modal-dialog" role="document" >
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id_edit">
					<div class="row form-row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" required="">
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" id="email" name="email" required="">
							</div>
						</div>
						
					</div>
					<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
			</div>
		</div>
	</div>
</div>
</form>
<!-- /Edit Details Modal -->

<!-- Delete Model -->
<form action="/admin/manajemen_user/delete" method="post">
<input type="hidden" name="_method" value="delete">
{{csrf_field()}}
<div class="modal fade" id="delete_modal" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">Delete</h4>
					<input type="hidden" name="id" id="id">
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

	$('#role').change(function(){
		var x = $(this).val();
		
		if(x=='admin'){
			$('#password').prop('required',true);
			$('#place_password').show();
		}
		else{
			$('#place_password').hide();
			$('#password').prop('required',false);
		} 
	})

	$('#button_tambah_user').click(function(){
		$('#modal_tambah_user').modal('show');
	})

	function edit(id){
		$.ajax({
			url:'/admin/manajemen_user/'+id+'/edit',
			type:'get',
			dataType:'json',
			success:function(response){
				$('#id_edit').val(id);
				$('#nama').val(response.nama);
				$('#email').val(response.email);
				$('#edit_modal').modal('show');
			},
			error:function(){
				alert('error');
			}
		});
		
	}
	
	function hapus(id){
		$('#id').val(id);
		$('#delete_modal').modal('show');
	}

</script>

@endsection