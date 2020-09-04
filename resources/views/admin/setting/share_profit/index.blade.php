@extends('admin.template.master')

@section('title','Setting Share Profit')

@section('content')

<div class="col-sm-6">

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

<div class="card">

<div class="card-body">

<form action="/admin/setting/share_profit/{{$profit->id}}" method="post">
<input type="hidden" name="_method" value="put">
{{csrf_field()}}

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>Owner ( % )</label>
<input type="number" name="owner" required="" value="{{$profit->owner}}" class="form-control">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Mitra ( % )</label>
<input type="number" name="mitra" required="" value="{{$profit->mitra}}" class="form-control">
</div>
</div>

</div>

<button style="float: right;" class="btn btn-success">Submit</button>

</form>

</div>
</div>

</div>


@endsection