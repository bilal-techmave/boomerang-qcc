@extends('layouts.main')
@section('app-title', 'Dashboard - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row mt-3">
            <div class="col-12">
                <!-- <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>
                        </div> -->
            </div>
            <div class="col-12">
                <div class="card card_bg">
                    <div class="card-body p-0">
                        <div class="row align-items-center">
                            <div class="col-sm-8">
                                <div class="banner_left_side">
                                    <h3 class="text-primary">Welcome Back! </h3>
                                    <!-- <p>Boomreang Dashboard</p> -->
                                    <p>Clock-in/Clock-out: Cleaning staff can log their working hours by clocking in and
                                        out through the app</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="px-3">
                                    <img src="assets/images/new-images/dashboard.png" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </div>
        </div>
        @if(auth()->user()->role == 'admin')
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Work Order</h4>
                        <div id="apex-column-2" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Ticket Status</h4>
                        <div id="ticket-status" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-xl-12">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Ticket By Person</h4>
                        <div id="ticket-person" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
        </div>
        @endif
        <!-- end row -->
    </div>
@endsection

@push('push_script')
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('js/pages/apexcharts.init.js') }}"></script>
    <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('libs/quill/quill.min.js') }}"></script>
    <script src="{{ asset('js/pages/form-editor.init.js') }}"></script>

    <script>
        // Column Chart - 2
        //
        // Assuming you pass the $chartData variable from your controller to your view
        var chartDataWorkOrder = {!! json_encode($workcount) !!};

        var options = {
            series: [{
                name: '',
                data: chartDataWorkOrder.data.map((count, index) => ({
                    x: chartDataWorkOrder.labels[index],
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
                showForSingleSeries: false
            }
        };

        var chart = new ApexCharts(
            document.querySelector("#apex-column-2"),
            options
        );

        chart.render();

        // ticker By status

        var chartDataTicketStatus = {!! json_encode($ticket_count) !!};

        var options = {
            series: [{
                name: '',
                data: chartDataTicketStatus.data.map((count, index) => ({
                    x: chartDataTicketStatus.labels[index],
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
            document.querySelector("#ticket-status"),
            options
        );

        chart.render();

        // ticket-status chart end


        //ticket by person start

        var chartDataTicketPerson = {!! json_encode($ticket_count_user) !!};

        var options = {
            series: [{
                name: '',
                data: chartDataTicketPerson.data.map((count, index) => ({
                    x: chartDataTicketPerson.labels[index],
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
            colors: ['#8edcf1'],
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                showForSingleSeries: false,


            }
        }

        var chart = new ApexCharts(
            document.querySelector("#ticket-person"),
            options
        );

        chart.render();

        // ticket-person chart end
    </script>
@endpush
