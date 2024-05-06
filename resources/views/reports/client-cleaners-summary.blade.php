@extends('layouts.main')
@section('app-title', 'Company View - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Client / Cleaners Summary</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active">Client / Cleaners Summary</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12 mb-3">
        <div class="invisible-checkboxes">
                                                <input type="radio" name="rGroup" value="1" id="r1" checked>
                                                <label class="checkbox-alias" for="r1">Client</label>
                                                <input type="radio" name="rGroup" value="2" id="r2">
                                                <label class="checkbox-alias" for="r2">Cleaner / Contractors</label>

                                            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <div id="client"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <div id="client-fortnightly"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('push_script')
<script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/pages/apexcharts.init.js') }}"></script>
<script>
    var options = {
        chart: {
            height: 380,
            type: 'line',
            stacked: false
        },
        stroke: {
            width: [0, 4, 4],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                columnWidth: '50%'
            }
        },
        colors: ['#16baeb', '#fdb813', '#FF0000'],
        series: [{
            name: '$ Mothly Revenue',
            type: 'column',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: '$ Monthly Expenses',
            type: 'column',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
            name: 'Total Gross of Margin / Month $',
            type: 'line',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
        title: {
            text: '$ Monthly | Profit and Loss By Client',
            align: 'center',
            margin: 10,
            offsetX: 0,
            offsetY: 0,
            floating: false,
            style: {
                fontSize:  '18px',
                fontWeight:  'bold',
                fontFamily:  undefined,
                color:  '#263238'
            },
        },
        xaxis: {
            categories: ['Marco Araujo', 'Lorena Lopes', 'Ricki Palmer', 'Steve Jackson', 'Italo Sabatini', 'Itamar Braga', 'Fraser Muir', 'jacky', 'Vivid'],
        },
        yaxis: [{
            title: {
                text: '$ Monthly | Revenue and Expenses'
            }
        }, {
            opposite: true,
            title: {
                text: 'Total Gross of Margin / Month $'
            }
        }, ],
        legend: {
            position: 'top',
            offsetY: 0,
        },
        grid: {
            row: {
                colors: ['#f3f4f5', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
            borderColor: '#f1f3fa'
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#client"),
        options
    );

    chart.render();
</script>


<script>
    var options = {
        chart: {
            height: 380,
            type: 'line',
            stacked: false
        },
        stroke: {
            width: [0, 4, 4],
            curve: 'smooth'
        },
        plotOptions: {
            bar: {
                columnWidth: '50%'
            }
        },
        colors: ['#16baeb', '#fdb813', '#FF0000'],
        series: [{
            name: '$ Mothly Revenue',
            type: 'column',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: '$ Monthly Expenses',
            type: 'column',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
            name: 'Total Gross of Margin / Month $',
            type: 'line',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
        title: {
            text: '$ Fortnightly | Profit and Loss By Client',
            align: 'center',
            margin: 10,
            offsetX: 0,
            offsetY: 0,
            floating: false,
            style: {
                fontSize:  '18px',
                fontWeight:  'bold',
                fontFamily:  undefined,
                color:  '#263238'
            },
        },
        xaxis: {
            categories: ['Marco Araujo', 'Lorena Lopes', 'Ricki Palmer', 'Steve Jackson', 'Italo Sabatini', 'Itamar Braga', 'Fraser Muir', 'jacky', 'Vivid'],
        },
        yaxis: [{
            title: {
                text: '$ Monthly | Revenue and Expenses'
            }
        }, {
            opposite: true,
            title: {
                text: 'Total Gross of Margin / Month $'
            }
        }, ],
        legend: {
            position: 'top',
            offsetY: 0,
        },
        grid: {
            row: {
                colors: ['#f3f4f5', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
            borderColor: '#f1f3fa'
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#client-fortnightly"),
        options
    );

    chart.render();
</script>
@endpush
