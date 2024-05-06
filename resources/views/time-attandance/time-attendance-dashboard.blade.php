@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Time Attendance Dashboard</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Time Attendance Dashboard</li>
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
                    <h4 class="header-title mt-0 mb-3">Work Order</h4>

                    <div id="work-order-tdt" class="apex-charts" dir="ltr"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
        <!-- end col-->
        <div class="col-xl-6">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Ticket Status</h4>

                    <div id="ticket-status-tdt" class="apex-charts" dir="ltr"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
        <!-- end col-->
        <div class="col-xl-12">
            <!-- Portlet card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Ticket By Person</h4>

                    <div id="ticket_person" class="apex-charts" dir="ltr"></div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
        <!-- end col-->
    
    </div>
    <!-- end row -->

</div>
<!-- container -->


@endsection