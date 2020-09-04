@extends('tentor.template.master')

@section('content')

<div class="col-md-12">

@if ($message = Session::get('msg'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
{{ $error }} <br/>
@endforeach
</div>
@endif

<div class="card">
<div class="card-body">

<!-- Profile Settings Form -->
<form action="/tentor/profil" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row form-row">

<div class="col-12 col-md-6">
<div class="form-group">
<label>Foto Profil</label>
<input type="file" name="foto_profil" class="form-control">
</div>
</div>

<div class="col-12 col-md-2">
</div>

<div class="col-12 col-md-2">
<img src="{{asset('foto_guru/'.$user->foto_profil)}}" width="150">
</div>

<div class="col-12 col-md-2">
</div>


<div class="col-12 col-md-4" style="margin-top: 15px;">
<div class="form-group">
<label>Nama Lengkap</label>
<input type="text" class="form-control" name="nama" value="{{$user->nama}}">
</div>
</div>
<div class="col-12 col-md-4" style="margin-top: 15px;">
<div class="form-group">
<label>Email</label>
<input type="email" class="form-control" name="email"  value="{{$user->email}}">
</div>
</div>
<div class="col-12 col-md-4" style="margin-top: 15px;">
<div class="form-group">
<label>No Handphone</label>
<input type="text" class="form-control" name="no_hp"  value="{{$user->no_hp}}">
</div>
</div>
<div class="col-12 col-md-6">
<div class="form-group">
<label>Tempat Lahir</label>
<input type="text" class="form-control" name="tempat_lahir"  value="{{$user->tempat_lahir}}">
</div>
</div>
<div class="col-12 col-md-6">
<div class="form-group">
<label>Tanggal Lahir</label>
<div class="cal-icon">
<input type="text" class="form-control datetimepicker" name="tanggal_lahir"  value="{{$user->tanggal_lahir}}">
</div>
</div>
</div>
<div class="col-12 col-md-3">
<div class="form-group">
<label>Provinsi</label>
<select class="form-control select">

</select>
</div>
</div>
<div class="col-12 col-md-3">
<div class="form-group">
<label>Kota/Kab</label>
<select class="form-control select">

</select>
</div>
</div>
<div class="col-12 col-md-3">
<div class="form-group">
<label>Kecamatan</label>
<select class="form-control select">

</select>
</div>
</div>
<div class="col-12 col-md-3">
<div class="form-group">
<label>Kelurahan</label>
<select class="form-control select">

</select>
</div>
</div>

<div class="col-12 col-md-4">
<div class="form-group">
<label>Pendidikan Terakhir</label>
<select class="form-control select" name="pendidikan_terakhir">
@foreach($pendidikan as $r)
@if($r == $user->pendidikan_terakhir)
<option value="{{$r}}" selected="">{{$r}}</option>
@else
<option value="{{$r}}">{{$r}}</option>
@endif
@endforeach
</select>
</div>
</div>

<div class="col-12 col-md-4">
<div class="form-group">
<label>Nama Institusi/Kampus</label>
<input type="text" class="form-control" name="nama_institusi"  value="{{$user->nama_institusi}}">
</div>
</div>

<div class="col-12 col-md-4">
<div class="form-group">
<label>Prodi</label>
<input type="text" class="form-control" name="prodi" value="{{$user->prodi}}">
</div>
</div>

</div>
<div class="submit-section" style="float: right;">
<button type="submit" class="btn btn-primary">Save Changes</button>
</div>
</form>
<!-- /Profile Settings Form -->

</div>
</div>
</div>

<div class="col-md-12">
<div class="card">
<div class="card-body">
<a class="edit-link" href="#" id="button_tambah_pengalaman_mengajar"><i class="fa fa-plus-circle"></i> Tambah Pengalaman Mengajar</a>
<p></p>
@if($pengalaman->count()>0)
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>No</th>
<th>Nama Institusi/Sekolah</th>
<th>Tahun Awal Mengajar</th>
<th>Tahun Akhir Mengajar</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($pengalaman as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->nama_sekolah}}</td>
	<td>{{$r->tahun_awal}}</td>
	<td>{{$r->tahun_akhir}}</td>
	<td>
	<button class="btn btn-success" onclick="edit_pengalaman({{$r->id}})"><i class="fe fe-pencil"></i></button>
    <button class="btn btn-danger" onclick="hapus_pengalaman({{$r->id}})"><i class="fe fe-trash"></i></button>
	</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<div style="border:2px dashed black;padding: 25px;text-align: center;">
	Anda belum memiliki pengalaman mengajar
</div>
@endif
</div>
</div>
</div>

<div class="col-md-12">
<div class="card">
<div class="card-body">
<a class="edit-link" href="#" id="button_tambah_prestasi"><i class="fa fa-plus-circle"></i> Tambah Prestasi</a>
<p></p>
@if($prestasi->count()>0)
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>No</th>
<th>Keterangan Prestasi</th>
<th>Tahun</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($prestasi as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->keterangan_prestasi}}</td>
	<td>{{$r->tahun}}</td>
	<td>
	<button class="btn btn-success" onclick="edit_prestasi({{$r->id}})"><i class="fe fe-pencil"></i></button>
    <button class="btn btn-danger" onclick="hapus_prestasi({{$r->id}})"><i class="fe fe-trash"></i></button>
	</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<div style="border:2px dashed black;padding: 25px;text-align: center;">
	Anda belum memiliki prestasi
</div>
@endif
</div>
</div>
</div>

<div class="col-md-12">
<div class="card">
<div class="card-body">
<a class="edit-link" href="#" id="button_tambah_pilihan_mengajar"><i class="fa fa-plus-circle"></i> Tambah Pilihan Mengajar</a>
<p></p>
@if($pilihan_mengajar->count()>0)
<div class="table-responsive">
<table class="datatable table table-stripped">
<thead>
<tr>
<th>No</th>
<th>Jenjang</th>
<th>Kurikulum</th>
<th>Mata Pelajaran</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach($pilihan_mengajar as $r)
<tr>
	<td>{{$loop->iteration}}</td>
	<td>{{$r->jenjang}}</td>
	<td>{{$r->kurikulum}}</td>
	<td>{{$r->mata_pelajaran}}</td>
	<td>
	<button class="btn btn-success" onclick="edit_pilihan_mengajar({{$r->id}})"><i class="fe fe-pencil"></i></button>
    <button class="btn btn-danger" onclick="hapus_pilihan_mengajar({{$r->id}})"><i class="fe fe-trash"></i></button>
	</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@else
<div style="border:2px dashed black;padding: 25px;text-align: center;">
	Anda belum mengisi pilihan mengajar
</div>
@endif
</div>
</div>
</div>

@endsection

@section('js')

<script type="text/javascript">

$('#button_tambah_pengalaman_mengajar').click(function(e){
	e.preventDefault();
	$('#modal_tambah_pengalaman_mengajar').modal('show');
})

$('#button_tambah_prestasi').click(function(e){
	e.preventDefault();
	$('#modal_tambah_prestasi').modal('show');
})

$('#button_tambah_pilihan_mengajar').click(function(e){
	e.preventDefault();
	$('#modal_tambah_pilihan_mengajar').modal('show');
})

function edit_pengalaman(id){
		$.ajax({
			url:'/tentor/pengalaman_mengajar_mitra/'+id+'/edit',
			type:'get',
			dataType:'json',
			success:function(response){

				$('#tahun_awal').empty();
				$.each(response.tahun_awal,function(i,value){
					if(value==response.pengalaman.tahun_awal){
						$('#tahun_awal').append(`
						<option selected value=`+value+`>`+value+`</option>
					`);
					}	

					else{
						$('#tahun_awal').append(`
						<option value=`+value+`>`+value+`</option>
					`);
					}
					
				});

				$('#tahun_akhir').empty();
				$.each(response.tahun_akhir,function(i,value){
					console.log(value == response.pengalaman.tahun_akhir);
					if(value == response.pengalaman.tahun_akhir){
						$('#tahun_akhir').append(`
						<option selected value="Sampai Sekarang">`+value+`</option>
					`);
					}

					else{
						$('#tahun_akhir').append(`
						<option value=`+value+`>`+value+`</option>
					`);
					}
			
				});

				$('#id_pengalaman_edit').val(id);
				$('#nama_sekolah').val(response.pengalaman.nama_sekolah);
				$('#modal_edit_pengalaman_mengajar').modal('show');
			},
			error:function(){
				alert('error');
			}
		});	
}

function hapus_pengalaman(id){

	$('#id_pengalaman_hapus').val(id);
	$('#modal_hapus_pengalaman').modal('show');
}

function edit_prestasi(id){
	$.ajax({
			url:'/tentor/prestasi_mitra/'+id+'/edit',
			type:'get',
			dataType:'json',
			success:function(response){

				$('#tahun_prestasi').empty();
				$.each(response.tahun,function(i,value){
					if(value==response.prestasi.tahun){
						$('#tahun_prestasi').append(`
						<option selected value=`+value+`>`+value+`</option>
					`);
					}	

					else{
						$('#tahun_prestasi').append(`
						<option value=`+value+`>`+value+`</option>
					`);
					}
					
				});

				$('#id_prestasi_edit').val(id);
				$('#keterangan_prestasi').val(response.prestasi.keterangan_prestasi);
				$('#modal_edit_prestasi').modal('show');
			},
			error:function(){
				alert('error');
			}
		});	
}

function hapus_prestasi(id){

	$('#id_prestasi_hapus').val(id);
	$('#modal_hapus_prestasi').modal('show');
}

function edit_pilihan_mengajar(id){

$.ajax({
			url:'/tentor/pilihan_mengajar_mitra/'+id+'/edit',
			type:'get',
			dataType:'json',
			success:function(response){

				$('#jenjang').empty();
				$.each(response.jenjang,function(i,value){
					if(value.id==response.pilihan.jenjang_id){
						$('#jenjang').append(`
						<option selected value=`+value.id+`>`+value.jenjang+`</option>
					`);
					}	

					else{
						$('#jenjang').append(`
						<option value=`+value.id+`>`+value.jenjang+`</option>
					`);
					}
					
				});

				$('#kurikulum').empty();
				$.each(response.kurikulum,function(i,value){
					if(value.id==response.pilihan.kurikulum_id){
						$('#kurikulum').append(`
						<option selected value=`+value.id+`>`+value.kurikulum+`</option>
					`);
					}	

					else{
						$('#kurikulum').append(`
						<option value=`+value.id+`>`+value.kurikulum+`</option>
					`);
					}
					
				});

				$('#mapel').empty();
				$.each(response.mapel,function(i,value){
					if(value.id==response.pilihan.mapel_id){
						$('#mapel').append(`
						<option selected value=`+value.id+`>`+value.mata_pelajaran+`</option>
					`);
					}	

					else{
						$('#mapel').append(`
						<option value=`+value.id+`>`+value.mata_pelajaran+`</option>
					`);
					}
					
				});

				$('#id_pilihan_mengajar_edit').val(id);
				$('#modal_edit_pilihan_mengajar').modal('show');
			},
			error:function(){
				alert('error');
			}
		});	

}

function hapus_pilihan_mengajar(id){

	$('#id_pilihan_mengajar_hapus').val(id);
	$('#modal_hapus_pilihan_mengajar').modal('show');
}
	
</script>

@endsection

<!--  Modal Tambah Pengalaman mengajar -->
<div class="modal fade custom-modal" id="modal_tambah_pengalaman_mengajar">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/pengalaman_mengajar_mitra" method="post">
@csrf

<div class="row">

<div class="col-12 col-md-12">
<div class="form-group">
<label>Nama Institusi/Sekolah</label>
<input type="text" class="form-control" name="nama_sekolah" required>
</div>
</div>

<div class="col-12 col-md-6">
<div class="form-group">
<label>Tahun Awal Mengajar</label>
<select class="form-control select" name="tahun_awal">
@foreach($tahun_awal as $r)
<option value="{{$r}}">{{$r}}</option>
@endforeach
</select>
</div>
</div>


<div class="col-12 col-md-6">
<div class="form-group">
<label>Tahun Akhir Mengajar</label>
<select class="form-control select" name="tahun_akhir">
@foreach($tahun_akhir as $r)
<option value="{{$r}}">{{$r}}</option>
@endforeach
</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!-- Modal Tambah Pengalaman mengajar -->

<!--  Modal Edit Pengalaman mengajar -->
<div class="modal fade custom-modal" id="modal_edit_pengalaman_mengajar">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Edit Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/pengalaman_mengajar_mitra" method="post">
<input type="hidden" name="_method" value="put">
@csrf

<div class="row">

<input type="hidden" name="id_pengalaman" id="id_pengalaman_edit">

<div class="col-12 col-md-12">
<div class="form-group">
<label>Nama Institusi/Sekolah</label>
<input type="text" class="form-control" id="nama_sekolah" name="nama_sekolah">
</div>
</div>

<div class="col-12 col-md-6">
<div class="form-group">
<label>Tahun Awal Mengajar</label>
<select class="form-control select" id="tahun_awal" name="tahun_awal">

</select>
</div>
</div>


<div class="col-12 col-md-6">
<div class="form-group">
<label>Tahun Akhir Mengajar</label>
<select class="form-control select" id="tahun_akhir" name="tahun_akhir">

</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary" type="submit">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!-- Modal Edit Pengalaman mengajar -->

<!-- Modal Hapus Pengalaman -->
<form action="/tentor/pengalaman_mengajar_mitra" method="post">
<input type="hidden" name="_method" value="delete">
{{csrf_field()}}
<div class="modal fade" id="modal_hapus_pengalaman" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">Delete</h4>
					<input type="hidden" name="id_pengalaman" id="id_pengalaman_hapus">
					<p class="mb-4">Are you sure want to delete?</p>
					<button type="submit" class="btn btn-primary">Delete </button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<!-- Modal Hapus Pengalaman -->

<!--  Modal Tambah Prestasi -->
<div class="modal fade custom-modal" id="modal_tambah_prestasi">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/prestasi_mitra" method="post">
@csrf

<div class="row">

<div class="col-12 col-md-12">
<div class="form-group">
<label>Keterangan Prestasi</label>
<input type="text" class="form-control" name="keterangan_prestasi" required>
</div>
</div>

<div class="col-12 col-md-12">
<div class="form-group">
<label>Tahun</label>
<select class="form-control select" name="tahun">
@foreach($tahun_awal as $r)
<option value="{{$r}}">{{$r}}</option>
@endforeach
</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!-- Modal Tambah Prestasi -->

<!-- Modal Edit Prestasi -->
<div class="modal fade custom-modal" id="modal_edit_prestasi">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Edit Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/prestasi_mitra" method="post">
@csrf
@method('put')

<div class="row">

<input type="hidden" name="id_prestasi" id="id_prestasi_edit">

<div class="col-12 col-md-12">
<div class="form-group">
<label>Keterangan Prestasi</label>
<input type="text" class="form-control" id="keterangan_prestasi" name="keterangan_prestasi" required>
</div>
</div>

<div class="col-12 col-md-12">
<div class="form-group">
<label>Tahun</label>
<select class="form-control select" id="tahun_prestasi" name="tahun">

</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!-- Modal Edit Prestasi -->

<!-- Modal Hapus Prestasi -->
<form action="/tentor/prestasi_mitra" method="post">
<input type="hidden" name="_method" value="delete">
{{csrf_field()}}
<div class="modal fade" id="modal_hapus_prestasi" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">Delete</h4>
					<input type="hidden" name="id_prestasi" id="id_prestasi_hapus">
					<p class="mb-4">Are you sure want to delete?</p>
					<button type="submit" class="btn btn-primary">Delete </button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<!-- Modal Hapus Prestasi -->

<!--  Modal Tambah Pilihan Mengajar -->
<div class="modal fade custom-modal" id="modal_tambah_pilihan_mengajar">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Tambah Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/pilihan_mengajar_mitra" method="post">
@csrf

<div class="row">

<div class="col-12 col-md-6">
<div class="form-group">
<label>Jenjang</label>
<select class="form-control select" name="jenjang_id">
@foreach($jenjang as $r)
<option value="{{$r->id}}">{{$r->jenjang}}</option>
@endforeach
</select>
</div>
</div>

<div class="col-12 col-md-6">
<div class="form-group">
<label>Kurikulum</label>
<select class="form-control select" name="kurikulum_id">
@foreach($kurikulum as $r)
<option value="{{$r->id}}">{{$r->kurikulum}}</option>
@endforeach
</select>
</div>
</div>

<div class="col-12 col-md-12">
<div class="form-group">
<label>Mata Pelajaran</label>
<select class="form-control select" name="mapel_id">
@foreach($mapel as $r)
<option value="{{$r->id}}">{{$r->mata_pelajaran}}</option>
@endforeach
</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!--  Modal Tambah Pilihan Mengajar -->

<!--  Modal Edit Pilihan Mengajar -->
<div class="modal fade custom-modal" id="modal_edit_pilihan_mengajar">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Form Edit Pengalaman Mengajar</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<form action="/tentor/pilihan_mengajar_mitra" method="post">
@csrf
@method('put')

<div class="row">

<input type="hidden" name="id_pilihan_mengajar" id="id_pilihan_mengajar_edit">
<div class="col-12 col-md-6">
<div class="form-group">
<label>Jenjang</label>
<select class="form-control select" id="jenjang" name="jenjang_id">

</select>
</div>
</div>

<div class="col-12 col-md-6">
<div class="form-group">
<label>Kurikulum</label>
<select class="form-control select" id="kurikulum" name="kurikulum_id">

</select>
</div>
</div>

<div class="col-12 col-md-12">
<div class="form-group">
<label>Mata Pelajaran</label>
<select class="form-control select" id="mapel" name="mapel_id">

</select>
</div>
</div>

</div>

<div  style="float: right;">
	<button class="btn btn-primary">Submit</button>
</div>

</form>
</div>
</div>
</div>
</div>
<!--  Modal Edit Pilihan Mengajar -->

<!-- Modal Hapus Pilihan Mengajar -->
<form action="/tentor/pilihan_mengajar_mitra" method="post">
<input type="hidden" name="_method" value="delete">
{{csrf_field()}}
<div class="modal fade" id="modal_hapus_pilihan_mengajar" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-content p-2">
					<h4 class="modal-title">Delete</h4>
					<input type="hidden" name="id_pilihan_mengajar" id="id_pilihan_mengajar_hapus">
					<p class="mb-4">Are you sure want to delete?</p>
					<button type="submit" class="btn btn-primary">Delete </button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<!-- Modal Hapus Pilihan Mengajar -->