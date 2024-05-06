@extends('layouts.main')
@section('app-title','Department View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Department View</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Administration</li>
                        <li class="breadcrumb-item active">Department View</li>
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
                               <div class="col-lg-6 ">
                                <div class="detail_box pe-4">
                                    <ul>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Name</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$departmentnew->name}}</h6>
                                            </div>
                                        </li>
                                       
                                        <li>
                                            <div class="detail_title">
                                                <h6>Email </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$departmentnew->email}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Internal Code</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$departmentnew->internal_code}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Supervisor</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$departmentnew->supervisor_get->name ?? ''}} {{$departmentnew->supervisor_get->surname ?? ''}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Manager</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$departmentnew->manager_get->name ?? ''}} {{$departmentnew->manager_get->surname ?? ''}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Can be used in Work Order</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$departmentnew->is_work_order ? 'Yes' : 'No'}} </h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Send email to this department</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$departmentnew->is_email_send ? 'Yes' : 'No'}} </h6>
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