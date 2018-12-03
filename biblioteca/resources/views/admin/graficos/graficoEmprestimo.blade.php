<html>
<head>

    <style>
        h1{
            text-align: center;
        }
        h2{
            text-align: center;
        }
        body{
            border-width: medium;
            border-style: solid;
            border-color: #000000;
        }
        .relatorio{


            border-width: medium;
            border-style: solid;
            border-color: #00acd6;
        }

    </style>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Element', 'Density', { role: 'style' }],
                ['Copper', 8.94, '#b87333', ],
                ['Silver', 10.49, 'silver'],
                ['Gold', 19.30, 'gold'],
                ['Platinum', 21.45, 'color: #e5e4e2' ]
            ]);

            var options = {
                title: "Density of Precious Metals, in g/cm^3",
                bar: {groupWidth: '95%'},
                legend: 'none',
            };

            var chart_div = document.getElementById('chart_div');
            var chart_input = document.getElementById('chart_input');
            var chart = new google.visualization.ColumnChart(chart_div);

            // Wait for the chart to finish drawing before calling the getImageURI() method.
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img src="' + chart.getImageURI() + '">';
                chart_input.value = chart.getImageURI();
            });

            chart.draw(data, options);

        }
    </script>

</head>


<body >

<table align="center" width="96%" border="2" >
    <tr>
        <td align="center" colspan="2" style="color: Red; font-size: 150%">
            <u><b>Grafico</b></u>
        </td>
    </tr>
    <tr>
    </tr>
</table>



<table>
    <div class="container">
        <div id="perf_div"></div>

            <?php echo $lava->render('ColumnChart', 'livro', 'perf_div') ?>

        {{--{{$lava->render('ColumnChart', 'livro', 'perf_div')}}--}}
        {{--{{dd($lava->render('ColumnChart', 'livro', 'perf_div'))}}--}}
    </div>
</table>
</body>
</html>
