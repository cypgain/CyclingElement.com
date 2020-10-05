
var optionslinechart = {
    chart: {
        toolbar: {
            show: false
        },
        height: 170,
        type: 'area'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        show: false,
        type: 'datetime',
        categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
        labels: {
            show: false,
        },
        axisBorder: {
            show: false,
        },
    },
    grid: {
        show: false,
        padding: {
            left: 0,
            right: 0,
            bottom: -40
        }
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.4,
            inverseColors: false,
            opacityFrom: 0.8,
            opacityTo: 0.2,
            stops: [0, 100]
        },

    },
    colors:[CubaAdminConfig.primary],

    series: [
        {
            data: [1.2, 2.3, 1.7, 3.2, 1.8, 3.2, 1]
        }
    ],
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        }
    }
};

var chartlinechart = new ApexCharts(
    document.querySelector("#chart-widget1"),
    optionslinechart
);

chartlinechart.render();

/*Line chart2*/
var optionslinechart2 = {
    chart: {
        toolbar: {
            show: false
        },
        height: 170,
        type: 'area'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        show: false,
        type: 'datetime',
        categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
        labels: {
            show: false,
        },
        axisBorder: {
            show: false,
        },
    },
    grid: {
        show: false,
        padding: {
            left: 0,
            right: 0,
            bottom: -40
        }
    },
    fill: {
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.4,
            inverseColors: false,
            opacityFrom: 0.8,
            opacityTo: 0.2,
            stops: [0, 100]
        }

    },
    colors:[CubaAdminConfig.secondary],


    series: [
        {
            name: 'series1',
            data: [12, 5, 10, 5, 16, 11, 20]
        }
    ],
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        }
    }
};

var chartlinechart2 = new ApexCharts(
    document.querySelector("#chart-widget2"),
    optionslinechart2
);
chartlinechart2.render();


/*Line chart3*/
var optionslinechart3 = {
    chart: {
        toolbar: {
            show: false
        },
        height: 170,
        type: 'area'
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth'
    },
    xaxis: {
        show: false,
        type: 'datetime',
        categories: ["2018-09-19T00:00:00", "2018-09-19T01:30:00", "2018-09-19T02:30:00", "2018-09-19T03:30:00", "2018-09-19T04:30:00", "2018-09-19T05:30:00", "2018-09-19T06:30:00"],
        labels: {
            show: false,
        },
        axisBorder: {
            show: false,
        },
    },
    grid: {
        show: false,
        padding: {
            left: 0,
            right: 0,
            bottom: -40
        }
    },
    fill: {
        colors:['#51bb25'],
        type: 'gradient',
        gradient: {
            shade: 'light',
            type: 'vertical',
            shadeIntensity: 0.4,
            inverseColors: false,
            opacityFrom: 0.8,
            opacityTo: 0.2,
            stops: [0, 100]
        },

    },
    colors:['#51bb25'],

    series: [
        {
            data: [24, 55, 21, 67, 22, 43, 21]
        }
    ],
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        }
    }
};

var chartlinechart3 = new ApexCharts(
    document.querySelector("#chart-widget3"),
    optionslinechart3
);
chartlinechart3.render();

var options3 = {
    series: [{
        name: 'Inflation',
        data: [2.3, 5.1, 3.0, 9.1, 2.0, 4.6, 2.2, 9.3, 5.4, 4.8, 3.5, 5.2]
    }],
    chart: {
        height: 105,
        type: 'bar',
        stacked: true,
        toolbar: {
            show: false
        },
    },
    plotOptions: {
        bar: {
            dataLabels: {
                position: 'top', // top, center, bottom
            },

            columnWidth: '20%',
            startingShape: 'rounded',
            endingShape: 'rounded'
        }
    },
    dataLabels: {
        enabled: false,

        formatter: function (val) {
            return val + "%";
        },
        offsetY: -10,
        style: {
            fontSize: '12px',
            colors: [ CubaAdminConfig.primary ]
        }
    },

    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        position: 'bottom',

        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        crosshairs: {
            fill: {
                type: 'gradient',
                gradient: {
                    colorFrom: '#7366ff',
                    colorTo: '#c481ec',
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                }
            }
        },
        tooltip: {
            enabled: true,
        },
        labels: {
            show: false
        }

    },
    yaxis: {
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false,
        },
        labels: {
            show: false,
            formatter: function (val) {
                return val + "%";
            }
        }

    },
    grid: {
        show: false,
        padding: {
            top: -35,
            right: -45,
            bottom: -20,
            left: -10
        },
    },
    colors: [ CubaAdminConfig.primary ],

};

var chart3 = new ApexCharts(document.querySelector("#column-chart"),
    options3
);

chart3.render();






