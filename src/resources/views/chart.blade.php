<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chart</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="practice.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    </head>
    <body>
        <h1>気温グラフ</h1>
        <canvas id="chart"></canvas>
        <form action="get"></form>
        <script>
        var weatherViewData = JSON.parse('<?php echo $weatherViewData; ?>'); // JSONデコード
        var ctx = document.getElementById("chart");

        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: weatherViewData['dayLabels'],
                datasets: [
                    {
                    label: '気温',
                    data: weatherViewData['temp'],
                    borderColor: 'rgba(255,0,0,1)',
                    backgroundColor: 'rgba(0,0,0,0)'
                    },
                    // {
                    // label: '最高気温',
                    // data: weatherViewData['temp'],
                    // borderColor: 'rgba(255,0,0,1)',
                    // backgroundColor: 'rgba(0,0,0,0)'
                    // },
                ],
            },
            options: {
                title: {
                    display: true,
                    text: '気温'
                },
                scales: {
                    yAxes: [{
                    ticks: {
                        suggestedMax: 15,
                        suggestedMin: -5,
                        stepSize: 5,
                        callback: function(value, index, values){
                        return  value +  '度'
                        }
                    }
                    }]
                },
            }
        });

        // function setData() {
        //     var chartData = {};
        //     chartData.label = '最高気温（度）';
        //     chartData.data = weatherViewData['temp'];
        //     chartData.borderColor = 'rgba(255,0,0,1)';
        //     chartData.backgroundColor = 'rgba(0,0,0,0)';
        //     return chartData;
        // }

    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
