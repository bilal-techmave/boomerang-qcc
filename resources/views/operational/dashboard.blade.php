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
                        <li class="breadcrumb-item">Operational Dashboard</li>
                        <li class="breadcrumb-item active">Work Order Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <!-- <div class="col-xl-6">
           
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Work Order PO Required</h4>

                    <div id="work-order-po" class="apex-charts" dir="ltr"></div>
                </div> 
            </div> 
        </div> -->
        <!-- end col-->
        <!-- <div class="col-xl-6">
         
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Work Order To Schedule</h4>

                    <div id="work-order-schedule" class="apex-charts" dir="ltr"></div>
                </div> 
            </div> 
        </div> -->
        <!-- end col-->
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