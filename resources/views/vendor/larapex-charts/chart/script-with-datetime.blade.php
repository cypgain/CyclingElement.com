<script>
    var options =
        {
            chart: {
                type: '{!! $chart->type() !!}',
                height: {!! $chart->height() !!},
                toolbar: {!! $chart->toolbar() !!},
                zoom: {!! $chart->zoom() !!},
            },
            plotOptions: {
                bar: {!! $chart->horizontal() !!}
            },
            colors: {!! $chart->colors() !!},
            series:
            {!! str_replace('"', '', $chart->dataset()) !!},
            dataLabels: {
                enabled: false
            },
            labels: [{!! $chart->labels() !!}],
            title: {
                text: "{!! $chart->title() !!}"
            },
            subtitle: {
                text: '{!! $chart->subtitle() !!}',
                align: '{!! $chart->subtitlePosition() !!}'
            },
            xaxis: {
                type: 'datetime',
                categories: {!! $chart->xAxis() !!}
            },
            grid: {!! $chart->grid() !!},
        }

    var chart = new ApexCharts(document.querySelector("#{!! $chart->id() !!}"), options);
    chart.render();
</script>
