@extends('admin.template.master')

@section('title','Dashboard')

@section('css')
<link rel="stylesheet" href="{{asset('template/mentoring/html/admin/assets/plugins/morris/morris.css')}}">
@endsection

@section('content')

<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon text-primary border-primary">
<i class="fe fe-users"></i>
</span>
<div class="dash-count">
<h3>0</h3>
</div>
</div>
<div class="dash-widget-info">
<h6 class="text-muted">Admin</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-primary w-50"></div>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon text-success">
<i class="fe fe-user"></i>
</span>
<div class="dash-count">
<h3>0</h3>
</div>
</div>
<div class="dash-widget-info">

<h6 class="text-muted">Siswa</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-success w-50"></div>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon text-danger border-danger">
<i class="fe fe-star-o"></i>
</span>
<div class="dash-count">
<h3>0</h3>
</div>
</div>
<div class="dash-widget-info">

<h6 class="text-muted">Tentor</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-danger w-50"></div>
</div>
</div>
</div>
</div>
</div>

<div class="col-xl-3 col-sm-6 col-12">
<div class="card">
<div class="card-body">
<div class="dash-widget-header">
<span class="dash-widget-icon text-warning border-warning">
<i class="fe fe-credit-card"></i>
</span>
<div class="dash-count">
<h3>0</h3>
</div>
</div>
<div class="dash-widget-info">
<h6 class="text-muted">Transaksi</h6>
<div class="progress progress-sm">
<div class="progress-bar bg-warning w-50"></div>
</div>
</div>
</div>
</div>
</div>

<div class="col-md-12 col-lg-12 col-xl-12">
	<div class="card card-chart">
		<div class="card-header">
			<h4 class="card-title">Revenue</h4>
		</div>
		<div class="card-body">
			<canvas id="myChart"></canvas>
		</div>
	</div>
</div>


@endsection

@section('js')
		
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
<script>

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: {!! $bulan !!},
        datasets: [{
            label: 'Pendapatan Admin',
            backgroundColor: 'rgb(93, 173, 226, 0.3)',
            borderColor: 'rgb(93, 173, 226)',
            data: [{{$admin}}]
        },
        {
            label: 'Pendapatan Mitra',
            backgroundColor: 'rgb(255, 99, 132, 0.3)',
            borderColor: 'rgb(255, 99, 132)',
            data: {{$mitra}}
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection