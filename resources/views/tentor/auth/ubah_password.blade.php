@extends('tentor.template.master')

@section('content')
	
<div class="col-md-12">
<div class="card">
<div class="card-body">

<form action="/tentor/ubah_password_action" method="post">
@method('PUT')
@csrf

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    {{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

@if (count($errors) > 0)
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
{{ $error }}
@endforeach
</ul>
</div>
@endif

<div class="row">

<div class="col-12 col-md-4">
<div class="form-group">
<label>Password Lama</label>
<input type="password" class="form-control" name="password_lama" required="" minlength="6">
</div>
</div>

<div class="col-12 col-md-4">
<div class="form-group">
<label>Password Baru</label>
<input type="password" class="form-control" required="" name="password_baru" minlength="6">
</div>
</div>

<div class="col-12 col-md-4">
<div class="form-group">
<label>Konfirmasi Password</label>
<input type="password" class="form-control" required=""  name="password_konfirmasi" minlength="6">
</div>
</div>

</div>

<button class="btn btn-success" style="background-color: #E51453 !important;border: 1px solid #E51453">Submit</button>

</form>

</div>
</div>
</div>

@endsection