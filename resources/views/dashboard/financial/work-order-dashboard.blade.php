@extends('layouts.main')
@section('app-title', 'Work Order Dashboard - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Work Order Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Financial Dashboard</li>
                            <li class="breadcrumb-item active">Work Order Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Amount to Charge</h4>

                        <div id="amount-charge" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Charging Flow</h4>

                        <div id="charging-flow" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Non Chargeable Work Order</h4>

                        <div id="non-chargeable" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Profit & Gross Margin</h4>

                        <div id="profit-gross" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
        </div>
        <!-- end row -->

    </div>
    <!-- container -->

@endsection
@push('push_script')
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/pages/apexcharts.init.js') }}"></script>
    <script>
        var chartDataWorkOrderbud = {!! json_encode($workbudget) !!};
        var chartDataWorkOrdersal = {!! json_encode($worksales) !!};
        var options = {
            series: [{
                    name: 'Sales price',
                    group: 'budget',
                    data: chartDataWorkOrdersal['data']
                },
                {
                    name: 'Budget Price',
                    group: 'actual',
                    data: chartDataWorkOrderbud['data']
                },

            ],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            dataLabels: {
                formatter: (val) => {
                    return val / 1000 + 'K'
                }
            },
            plotOptions: {
                bar: {
                    horizontal: false
                }
            },
            xaxis: {
                categories: [
                    'Completed',
                    'To Invoice',

                ]
            },
            fill: {
                opacity: 1
            },
            colors: ['#fcc136', '#029ac8', '#80f1cb', '#00E396'],
            yaxis: {
                labels: {
                    formatter: (val) => {
                        return val / 1000 + 'K'
                    }
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left'
            }
        };

        var chart = new ApexCharts(document.querySelector("#amount-charge"), options);
        chart.render();

        // amount-charge chart end
    </script>
    <script>
        var completeCount = {!! json_encode($completeCount) !!};
        var toinvoiceCount = {!! json_encode($toInvoiceCount) !!};
        var invoicedCount = {!! json_encode($invoicedCount) !!};


        // Extract dates and counts from PHP data
        var dates = Object.keys(completeCount);
        var countscomplete = Object.values(completeCount);

        var countstoinvoice = Object.values(toinvoiceCount);
        var countsinvoiced = Object.values(invoicedCount);




        // Convert dates to the required format for ApexCharts
        var formattedDates = dates.map(function(date) {
            return moment(date).format('YYYY-MM-DDTHH:mm:ss.SSS[Z]');
        });
        var options = {
            series: [{
                    name: 'Completed',
                    data: countscomplete
                }, {
                    name: 'To Invoice',
                    data: countstoinvoice
                },
                {
                    name: 'Invoiced',
                    data: countsinvoiced
                }
            ],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            colors: ['#fcc136', '#029ac8', '#84dcf7', '#00E396'],
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'datetime',
                categories: formattedDates
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yyyy'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#charging-flow"), options);
        chart.render();
    </script>

    <script>
        var salesPrie = {!! json_encode($salePrice) !!};
        var budgetPrice = {!! json_encode($budgetPrice) !!};

        // Extract dates and counts from PHP data
        var dates = Object.keys(budgetPrice);
        var sumbudget = Object.values(budgetPrice);
        // var sumBudget = Object.values(budgetPrice).map(function (value) {
        //     return Number(value).toLocaleString(); // Format the number with commas
        // });

        // var sumSales = Object.values(salesPrice).map(function (value) {
        //     return Number(value).toLocaleString(); // Format the number with commas
        // });

        var sumsales = Object.values(salesPrie);

        var formattedDates = dates.map(function(date) {
            return moment(date).format('YYYY-MM-DDTHH:mm:ss.SSS[Z]');
        });
        var options = {
            series: [{
                    name: "Sales",
                    data: sumsales
                },
                {
                    name: "Budget",
                    data: sumbudget
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                dropShadow: {
                    enabled: true,
                    color: '#000',
                    top: 18,
                    left: 7,
                    blur: 10,
                    opacity: 0.2
                },
                toolbar: {
                    show: false
                }
            },
            colors: ['#26a9d0', '#fcc136'],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: 'smooth'
            },

            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            markers: {
                size: 1
            },
            xaxis: {
                type: 'datetime',
                categories: formattedDates
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yyyy'
                },
            },

            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };

        var chart = new ApexCharts(document.querySelector("#profit-gross"), options);
        chart.render();
    </script>


    <script>
          var nonChargableCount = {!! json_encode($nonChargableCount) !!};

          var maxValue = 0; // Initialize the maximum value to negative infinity

          for (const date in nonChargableCount) {
                if (nonChargableCount[date] > maxValue) {
                    maxValue = value; // Update maxValue if the current value is greater
                }
        };

          const resultArray = [];
          for (const date in nonChargableCount) {
            resultArray.push({
                    x: date,
                    y: nonChargableCount[date],
                    goals: [{
                        value:  parseInt(maxValue-nonChargableCount[date]),
                        strokeHeight: 5,
                        strokeColor: '#019ac8'
                    }]
                });
            }

        var options = {
            series: [{
                name: '',
                data: resultArray
            }],
            chart: {
                height: 350,
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    columnWidth: '60%'
                }
            },
            colors: ['#019ac8'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                showForSingleSeries: false,


            }
        }

        var chart = new ApexCharts(
            document.querySelector("#non-chargeable"),
            options
        );

        chart.render();
    </script>
@endpush
