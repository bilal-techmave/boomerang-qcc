@extends('layouts.main')
@section('app-title', 'Manager Dashboard - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Manager Dashboard</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Financial Dashboard</li>
                            <li class="breadcrumb-item active">Manager Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <form method="GET" id="managerForm">
                    <div class="card">
                        <div class="card-header">
                            <div class="top_section_title">
                                <h5>Filters</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label"  for="fromMdate">From</label>
                                        <input type="text" required class="form-control basic-datepicker validation_past"
                                            value="{{ request('fromdate') }}" name="fromdate" id="fromMdate"
                                            aria-describedby="emailHelp" placeholder="From Date">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label"  for="toMdate">To</label>
                                        <input type="text" required class="form-control basic-datepicker validation_past"
                                            value="{{ request('todate') }}" name="todate" id="toMdate"
                                            aria-describedby="emailHelp" placeholder="To Date">
                                    </div>
                                </div>
                                <div class="col-lg-2 align-self-center">
                                    <div class="">
                                        <div class="checkbox checkbox-success">
                                            <input @if (request('creation_date'))
                                                checked
                                            @endif id="creationDate" name="creation_date" value="1" type="checkbox">
                                            <label class="form-label" for="creationDate">
                                                Creation Date
                                            </label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-2 align-self-center">
                                    <div class="">
                                        <div class="checkbox checkbox-success">
                                            <input @if (request('completion_date'))
                                            checked
                                        @endif id="completionDate" name="completion_date" value="1" type="checkbox">
                                            <label class="form-label" for="completionDate">
                                                Completion Date
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="button" onclick="validateForm()" class="theme_btn btn save_btn">
                                        <i class="uil-search-alt"> Search</i>
                                    </button>
                                    <button type="button" onclick="formReset()" class="theme_btn btn btn-warning">
                                        <i class="bi-arrow-repeat"></i>Reset Filter</i>
                                    </button>
                                    <a href="#" class="theme_btn btn excel-btn">
                                        <i class="bi-file-earmark-excel"></i> Export Excel File</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Work Orders </h4>

                        <div id="work-order-pie" class="apex-charts" dir="ltr"></div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>
            <!-- end col-->
            <div class="col-xl-6">
                <!-- Portlet card -->
                <div class="card ">
                    <!-- <div class="card-header">
                                <h5>Work Order - Gross Margin</h5>
                            </div> -->
                    <div class="card-body">
                        <h4 class="header-title mb-3">Work Order - Gross Margin</h4>

                        <div class="table-responsive work_order_table fixTableHead">
                            <table class="table mb-0  ">
                                <thead>
                                    <tr>
                                        <th scope="col">Manager</th>
                                        <th scope="col">Gross Margin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($groupedByManagerWithSums)
                                        @foreach ($groupedByManagerWithSums as $kk => $manager)
                                            <tr>
                                                <td>{{ $kk }}</td>
                                                <td>${{ $manager['gross_margin'] }}</td>
                                            </tr>
                                        @endforeach

                                    @endif






                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end card-body -->

                </div>
                <!-- end card-->
            </div>
            <!-- end col-->
            <!-- end col-->
            <div class="col-xl-12">
                <!-- Portlet card -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mt-0 mb-3">Work Order - Sales - Purchase - Gross Margin</h4>

                        <div id="work-order-sales-purchase" class="apex-charts" dir="ltr"></div>
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
        function formReset() {
            var form = document.getElementById("managerForm");
            // Get all input elements within the form
            var inputs = form.getElementsByTagName("input");

            // Iterate over each input element and set its value to an empty string
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = "";
            }
        }
    </script>

    <script>

function validateForm() {
        let isValid = true;
        $('#managerForm [required]').each(function () {
            if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() == 0))) {
                console.log($(this));
                isValid = false;
                $(this).addClass('is-invalid');
                $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                $(this).focus();
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        if (isValid) {
            $('#managerForm').submit();
        }
    }

    </script>



    <script>
        var totalData = {!! json_encode($totalData) !!};
        var sumtotalData = Object.values(totalData);



        var options = {
            series: sumtotalData,
            chart: {
                width: 380,
                type: 'polarArea'
            },
            labels: ['Sales', 'Purchase', 'Gross Margin', 'Total'],
            colors: [
                '#F44F5E',
                '#CA6CD8',
                '#8D95EB',
                '#4BC3E6',
            ],
            fill: {
                opacity: 1
            },
            stroke: {
                width: 1,
                colors: undefined
            },
            yaxis: {
                show: false
            },
            legend: {
                position: 'bottom'
            },
            plotOptions: {
                polarArea: {
                    rings: {
                        strokeWidth: 0
                    },
                    spokes: {
                        strokeWidth: 0
                    },
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#work-order-pie"), options);
        chart.render();
    </script>


    <script>

        var managerData = {!! json_encode($groupedByManagerWithSums) !!};
        // Initialize arrays to store values
        const managerArray = [];
        const totalSalesArray = [];
        const totalBudgetArray = [];
        const grossMarginArray = [];
        if (!Array.isArray(managerData)) {
            managerData = [managerData];
        }
        // Iterate through the data and extract values
        managerData.forEach(entry => {
            const { total_sales, total_budget, gross_margin } = Object.values(entry)[0];
            const key = Object.keys(entry)[0];
            managerArray.push(key);
            totalSalesArray.push(total_sales);
            totalBudgetArray.push(total_budget);
            grossMarginArray.push(gross_margin);
        });

        var options = {
            series: [{
                name: 'Sales',
                data: totalSalesArray
            }, {
                name: 'Purchase',
                data: totalBudgetArray
            }, {
                name: 'Gross Margin',
                data: grossMarginArray
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: managerArray,
            },

            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }

            },
            colors: ['#26a9d0', '#fcc136', '#4cbddd']

        };

        var chart = new ApexCharts(document.querySelector("#work-order-sales-purchase"), options);
        chart.render();
    </script>
@endpush
