@extends('tentor.template.master')

@section('content')

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
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            label: 'My Saldo',
            data: [0, 10, 5, 2, 20, 30, 45]
        },
        {
            label: 'My Saldo',
            data: [0, 15, 10, 21, 20, 30, 45]
        },
        ]
    },

    // Configuration options go here
    options: {}
});
</script>
@endsection