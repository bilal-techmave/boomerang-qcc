@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Company View</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Administration</li>
                        <li class="breadcrumb-item active">Company View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-0">
                <div class="card-header card_header_prospect">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <span><i class="uil-info-circle"></i></span>
                                <span>Basic Info</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card show_portfolio_tab mt-2">
                <div class="card-body">
                    <div class="tab-content prospect_content  text-muted">
                        <div class="tab-pane show active" id="home">
                            <div class="top_dt_sec pt-0">
                               <div class="row">
                               <div class="col-lg-6 border-right-dashed">
                                <div class="detail_box pe-4">
                                    <ul>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Business Name</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$company->business_name}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>ABN</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$company->abn}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Unit</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$company->unit}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Address Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$company->address_number}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Street Address</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$company->street_address}}</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="detail_box ps-4">
                                    <ul>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Suburb</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$company->suburb}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>City </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$city->city_name}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>State</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$state->state_name}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Zip Code </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$company->zipcode}}</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
<!-- container -->
@endsection
