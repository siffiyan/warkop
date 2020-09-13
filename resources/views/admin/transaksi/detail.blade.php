@extends('admin.template.master')

@section('title','Detail Transaksi')

@section('content')

<div class="col-sm-12">
<div class="card">

<div class="card-body">

<!-- Personal Details -->
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-body">

<div class="row"> 

<div class="col-md-6">

<h5 class="card-title d-flex justify-content-between">
<span>Data Siswa</span> 
</h5>

<div class="row">
<p class="col-sm-2 text-muted mb-0 mb-sm-3">Name</p>
<p class="col-sm-10">{{$user->nama_murid}}</p>
</div>
<div class="row">
<p class="col-sm-2 text-muted mb-0 mb-sm-3">Email</p>
<p class="col-sm-10">{{$user->email_murid}}</p>
</div>
<div class="row">
<p class="col-sm-2 text-muted mb-0 mb-sm-3">No Hp</p>
<p class="col-sm-10">{{$user->no_hp_murid}}</p>
</div>

</div>

<div class="col-md-6">

<h5 class="card-title d-flex justify-content-between">
<span>Data Guru</span> 
</h5>

<div class="row">
<p class="col-sm-2 text-muted mb-0 mb-sm-3">Name</p>
<p class="col-sm-10">{{$user->nama_guru}}</p>
</div>
<div class="row">
<p class="col-sm-2 text-muted mb-0 mb-sm-3">Email</p>
<p class="col-sm-10">{{$user->email_guru}}</p>
</div>
<div class="row">
<p class="col-sm-2 text-muted mb-0 mb-sm-3">No Hp</p>
<p class="col-sm-10">{{$user->no_hp_guru}}</p>
</div>

</div>


</div>

</div>

</div>


</div>


</div>
<!-- /Personal Details -->
	
	   <div class="table-responsive">
                <table class="table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Jumlah Orang</th>
                            <th class="text-center">Durasi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                       @foreach($transaksi as $r)
                       <tr>
                       		<td class="text-center">{{$loop->iteration}}</td>
                       		<td class="text-center">{{$r->tanggal_pertemuan}}</td>
                          <td class="text-center">{{$r->waktu}} {{$r->zona}}</td>
                       		<td class="text-center">{{$r->jumlah_orang}}</td>
                       		<td class="text-center">{{$r->durasi}} menit</td>
                       		<td class="text-center">
                       		@if($r->link_meeting == null)
                       		<button class="btn btn-primary" onclick="link_meeting({{$r->id}})">Input Link Meeting</button>
                       		@else
                       		<button class="btn btn-success" onclick="link_meeting({{$r->id}})">Info Link Meeting</button>
                       		@endif      		
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
	
	function link_meeting(id){

		$.ajax({
			url:'/admin/transaksi/'+id+'/show',
			type:'get',
			dataType:'json',
			success:function(response){
				if(response){
					$('#link_meeting').val(response.link_meeting);
				}
				$('#id_transaksi_detail').val(id);
				$('#modal_link_meeting').modal('show');
			},
			error:function(){
				alert('terjadi eror');
			}
		});

	}

</script>

@endsection

<!-- Modal Input Link Meeting -->
<form action="/admin/transaksi/update_link_meeting" method="post">
{{csrf_field()}}
@method('PUT')
<div class="modal fade" id="modal_link_meeting" aria-hidden="true" role="dialog">
<div class="modal-dialog" role="document" >
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Input Link Meeting</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">

<div class="row">

<input type="hidden" name="id_transaksi_detail" id="id_transaksi_detail">

<div class="col-12 col-sm-12">
<div class="form-group">
<label>Link Meeting</label>
<input type="text" class="form-control" name="link_meeting" id="link_meeting" required>
</div>
</div>

</div>


<button type="submit" style="float: right;" class="btn btn-primary">Submit</button>

</div>
</div>
</div>
</div>
</form>
<!-- Modal Input Link Meeting -->