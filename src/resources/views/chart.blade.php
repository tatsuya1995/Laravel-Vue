<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JSpractice</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="practice.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    </head>
    <body>

        

        <h1>折れ線グラフ</h1>
        <canvas id="myLineChart"></canvas>
        
        <script>
        var dayLabels = JSON.parse('<?php echo $dayLabels; ?>'); // JSONでこーど
        var ctx = document.getElementById("myLineChart");
        var label, data, borderColor, backgroundColor;

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dayLabels['days'],
                datasets: [setData(0), setData(1)],
            },
            options: {
                title: {
                    display: true,
                    text: '気温（8月1日~8月7日）'
                },
                scales: {
                    yAxes: [{
                    ticks: {
                        suggestedMax: 40,
                        suggestedMin: 0,
                        stepSize: 10,
                        callback: function(value, index, values){
                        return  value +  '度'
                        }
                    }
                    }]
                },
            }
        });

        function setData(i) {
            // for (var i=0; i< dayLabels['alldata'].length; i++) {
                var chartData = {};
                chartData.label = dayLabels['alldata'][i]['name'];
                chartData.data = dayLabels['alldata'][i]['data'];
                chartData.borderColor = dayLabels['alldata'][i]['borderColor'];
                chartData.backgroundColor = dayLabels['alldata'][i]['backgroundColor'];
            // }
            return chartData;
        }

    </script>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
