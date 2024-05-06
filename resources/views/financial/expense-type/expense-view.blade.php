@extends('layouts.main')
@section('app-title','Expense View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Expense View</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Financial Settings</li>
                        <li class="breadcrumb-item active">Expense View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
            <div class="card-header card_header_prospect">
                    <ul class="nav nav-tabs">
                    <li class="nav-item">
                            <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <span><i class="uil-info-circle"></i></span>
                                <span>Basic Info</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                <span><i class="uil-building"></i></span>
                                <span>Sites</span>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-file-blank"></i></span>
                                <span>Document</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="card show_portfolio_tab">
               
                <div class="card-body">

                    <div class="tab-content  text-muted">
                        <div class="tab-pane show active" id="home">
                           
                        <div class="main_bx_dt__">
                        <div class="top_dt_sec pt-0">
                               <div class="row">
                               <div class="col-lg-12">
                                <div class="detail_box pe-4">
                                    <ul>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Financial Account</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Expense Type</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Company</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Due Date</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Amount</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Supplier</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                                <div class="detail_box">
                                <h6>Note</h6>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto minima error in, eos perspiciatis aliquid. Ducimus facilis sit doloribus quasi ipsa, sunt sequi, aliquam suscipit, consectetur harum impedit eos? Dolores?</p>
                              </div>
                            </div>
                            
                               
                                 
                                </div>
                            </div>

                             
                            </div>
                            <!-- main_bx_dt -->
                        </div>
                      
                        <div class="tab-pane" id="profile">
                           
                        <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                    <div class="row">
                                       
                                        <div class="col-lg-12 ">
                                        <table id="basic-datatable" class="table  table-bordered  dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                  
                                                    <th>Client</th>
                                                    <th>Portfolio</th>
                                                    <th>Reference / Building</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                        
                                                <td>Department of Justice and Attorney-General </td>
                                                <td>Department of Justice and Attorney - Courthouse</td>
                                                <td>Magistrates Courts Service - Beaudesert</td>
                                              
                                            </tr>
                                    
                                        </tbody>
                                        </table>
                                          </div>
                                    </div>
                                </div>

                            </div>
                            <!-- main_bx_dt -->
                           </div>
                         
                           <div class="tab-pane" id="messages">
                           
                        <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                <div class="row">
                               
                                <div class="col-lg-12">
                                <table  class="table table-bordered  dt-responsive nowrap w-100">
                                               <thead>
                                                   <tr>
                                                       
                                                       <th>Document Name</th>
                                                     
                                                   </tr>
                                               </thead>
                                               <tbody>
                                               <tr>
                                               
                                                   <td>doctor-vector-illustration_488994-153.png</td>
                                                 
                                               </tr>
                                       
                                           </tbody>
                                           </table>
                                 </div>
                            </div>
                                </div>

                            </div>
                            <!-- main_bx_dt -->
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