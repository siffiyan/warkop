@extends('tentor.template.master')

@section('content')

<div class="col-xl-6 col-sm-6 col-12">
    <div class="card">
        <div class="card-body">
            <div class="dash-widget-header">
                <div class="dash-count">
                    <h3>Saldo</h3>
                </div>
            </div>
            <div class="dash-widget-info">
                <h5 class="text-muted float-right">{{"Rp " . number_format($saldoFirst,2,',','.')}}</h5>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-6 col-sm-6 col-12">
    <div class="card">
        <div class="card-body">
            <div class="dash-widget-header">
                <div class="dash-count">
                    <h3>Penarikan</h3>
                </div>
            </div>
            <div class="dash-widget-info">
                <h5 class="text-muted float-right">{{"Rp " . number_format($jumlah->jumlah,2,',','.')}}</h5>
            </div>
        </div>
    </div>
</div>


<div class="col-md-12 col-lg-12 col-xl-12">
    <canvas id="myChart"></canvas>
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
            label: 'My Saldo',
            backgroundColor: 'rgb(93, 173, 226, 0.3)',
            borderColor: 'rgb(93, 173, 226)',
            data: {{$total}}
        },
        {
            label: 'Penarikan',
            backgroundColor: 'rgb(255, 99, 132, 0.3)',
            borderColor: 'rgb(255, 99, 132)',
            data: {{$penarikan}}
        },
        ]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection