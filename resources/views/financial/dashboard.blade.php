@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
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
<script>alert("Asdasdasd")</script>
{{-- <script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('js/pages/apexcharts.init.js')}}"></script>
<script src="{{asset('js/pages/dashboard.init.js')}}"></script> --}}
@endpush
