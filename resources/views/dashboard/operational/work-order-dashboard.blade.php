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
                            <li class="breadcrumb-item">Operational Dashboard</li>
                            <li class="breadcrumb-item active">Work Order Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">

            <!-- end col-->
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Work Order PO Required</h4>

                        <div id="work-order-po" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Work Order To Schedule</h4>

                        <div id="work-order-to-scheduled" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>

            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Work Order Scheduled</h4>

                        <div id="work-order-schedule2" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Work Order Completed</h4>

                        <div id="work-order-completed" class="apex-charts" dir="ltr"></div>
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
    <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('libs/quill/quill.min.js') }}"></script>
    <script src="{{ asset('js/pages/form-editor.init.js') }}"></script>
    <script>
        var chartDataWorkOrderPO = {!! json_encode($po_required) !!};
        var options = {
            series: [{
                name: '',
                data: chartDataWorkOrderPO.data.map((count, index) => ({
                    x: chartDataWorkOrderPO.labels[index],
                    y: count,
                    goals: [{
                        value: 0, // You can set a goal value here if needed
                        strokeHeight: 5,
                        strokeColor: '#775DD0'
                    }]
                }))
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
            colors: ['#fdb813'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                showForSingleSeries: false,


            }
        }

        var chart = new ApexCharts(
            document.querySelector("#work-order-po"),
            options
        );

        chart.render();

        // work-order-po chart end

        //work order to schecule chart start

        var chartDataWorkOrderTSche = {!! json_encode($to_schedule) !!};

        var options = {
            series: [{
                name: '',
                data: chartDataWorkOrderTSche.data.map((count, index) => ({
                    x: chartDataWorkOrderTSche.labels[index],
                    y: count,
                    goals: [{
                        value: 0, // You can set a goal value here if needed
                        strokeHeight: 5,
                        strokeColor: '#775DD0'
                    }]
                }))
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
            colors: ['#64c6e0'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                showForSingleSeries: false,


            }
        }

        var chart = new ApexCharts(
            document.querySelector("#work-order-to-scheduled"),
            options
        );

        chart.render();

        //work order to schedule chart end


        // work-order-schedule chart start

        var chartDataWorkOrderSch = {!! json_encode($schedule) !!};
        var options = {
            series: [{
                name: '',
                data: chartDataWorkOrderSch.data.map((count, index) => ({
                    x: chartDataWorkOrderSch.labels[index],
                    y: count,
                    goals: [{
                        value: 0, // You can set a goal value here if needed
                        strokeHeight: 5,
                        strokeColor: '#775DD0'
                    }]
                }))
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
            colors: ['#009ac8'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                showForSingleSeries: false,


            }
        }

        var chart = new ApexCharts(
            document.querySelector("#work-order-schedule2"),
            options
        );

        chart.render();

        // work-order-schedule2 chart end

        //work order completed chart start
        var chartDataWorkOrderComp = {!! json_encode($complete) !!};

        var options = {
            series: [{
                name: '',
                data: chartDataWorkOrderComp.data.map((count, index) => ({
                    x: chartDataWorkOrderComp.labels[index],
                    y: count,
                    goals: [{
                        value: 0, // You can set a goal value here if needed
                        strokeHeight: 5,
                        strokeColor: '#775DD0'
                    }]
                }))
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
            colors: ['#fedf92'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                showForSingleSeries: false,


            }
        }

        var chart = new ApexCharts(
            document.querySelector("#work-order-completed"),
            options
        );

        chart.render();
    </script>
@endpush
