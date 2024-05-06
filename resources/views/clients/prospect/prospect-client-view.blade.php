@extends('layouts.main')
@section('app-title','Prospect Client View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Prospect Client View</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Clients</li>
                        <li class="breadcrumb-item active">Prospect Client View</li>
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
                        <li class="nav-item">
                            <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                <span><i class="bi bi-journals"></i></span>
                                <span>Address</span>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-building"></i></span>
                                <span>Portfolio</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#other-details" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-clipboard-notes"></i></span>
                                <span>Other Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-comment-alt"></i></span>
                                <span>Comments</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            <span><i class="bi bi-hash"></i></span>
                                <span>Social Media</span>
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
                                                <h6>Aavara</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Trading Name</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>Aavara</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>ABN</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>ACN</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Phone Number</h6>
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
                            <div class="col-lg-6">
                                <div class="detail_box ps-4">
                                    <ul>
                                    <li>
                                            <div class="detail_title">
                                                <h6>Second Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Mobile Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Fax Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Type of the client </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Website</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Company </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                             
                            </div>
                               <div class="col-lg-12">
                                            <div class="title_head">
                                                <h4>Contact Information</h4>
                                            </div>
                                        </div>
                                 <div class="col-lg-12  mt-3">
                                      <table class="table table-bordered  dt-responsive nowrap w-100">
                                       <thead>
                                           <tr>
                                               <th>Name</th>
                                               <th>Phone Number</th>
                                               <th>Email</th>
                                               <th>Contact Type</th>
                                               <th>Action</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                       <tr>
                                           <td>Owen Wills</td>
                                           <td>0417 074 635</td>
                                           <td>owen.wills@tr.qld.gov.au</td>
                                           <td>Manager</td>
                                           <td> <a href="#"><span class="btn btn-primary waves-effect waves-light table-btn-custom delet_btn"><i class="bi bi-person-plus"></i></span></a></td>
                                       </tr>
                                 
                                   </tbody>
                                   </table>
           
                               
                                 </div>
                                </div>
                            </div>
                        
                       
                        </div>
                        <div class="tab-pane " id="profile">
                        <div class="top_dt_sec pt-0">
                               <div class="row">
                               <div class="col-lg-12 ">
                                            <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                                    <thead>
                                                        <tr>
                                                            <th>Address</th>
                                                            <th>Main Address</th>
                                                            <th>Mail Address</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>8642 Yule Street, Arvada CO 80007</td>
                                                        <td> <i class="uil-check-circle status-entity" style="color:green"></i></td>
                                                        <td> <i class="uil-check-circle status-entity" style="color:green"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>8642 Yule Street, Arvada CO 80007</td>
                                                        <td> <i class="uil-check-circle status-entity" style="color:green"></i></td>
                                                        <td> <i class="uil-check-circle status-entity" style="color:green"></i></td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                          </div>
                                </div>
                            </div>
                       
                        </div>
                        
                        <div class="tab-pane" id="messages">
                        <div class="top_dt_sec pt-0">
                               <div class="row">
                               <div class="col-lg-12">
                                    <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                            <thead>
                                                <tr>
                                                    <th>Portfolio Full name</th>
                                                    <th>Portfolio Short name</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>ANZ - QLD</td>
                                                <td>ANZ - QLD</td>
                                                <!-- <td>
                                                     <a href="#"><span class="btn btn-primary waves-effect waves-light table-btn-custom delet_btn"><i class="uil-eye"></i></span></a>
                                                    <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom delet_btn"><i class="uil-edit"></i></span></a>
                                                </td> -->
                                            </tr>
                                            <tr>
                                                <td>ANZ - QLD</td>
                                                <td>ANZ - QLD</td>
                                                <!-- <td>
                                                     <a href="#"><span class="btn btn-primary waves-effect waves-light table-btn-custom delet_btn"><i class="uil-eye"></i></span></a>
                                                    <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom delet_btn"><i class="uil-edit"></i></span></a>
                                                </td> -->
                                            </tr>
                                            <tr>
                                                <td>ANZ - QLD</td>
                                                <td>ANZ - QLD</td>
                                                <!-- <td>
                                                     <a href="#"><span class="btn btn-primary waves-effect waves-light table-btn-custom delet_btn"><i class="uil-eye"></i></span></a>
                                                    <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom delet_btn"><i class="uil-edit"></i></span></a>
                                                </td> -->
                                            </tr>
                                    
                                        </tbody>
                                        </table>
                                 </div>
                                </div>
                            </div>
                    
                        </div>
                        <div class="tab-pane" id="other-details">
                       
                        <div class="top_dt_sec pt-0">
                               <div class="row">
                               <div class="col-lg-6 border-right-dashed">
                                <div class="detail_box pe-4">
                                    <ul>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Contact Name</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Contact Surname </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Contact Email </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="detail_title">
                                                <h6>Phone Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Contact Type</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>-----</h6>
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
                                                <h6>Contacted By</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>Meeting</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Client Entry Point</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>Facebook</h6>
                                            </div>
                                        </li>
                                     
                                    </ul>
                                </div>
                             
                            </div>
                               
                                
                                </div>
                            </div>

                       
                   </div>
                        <div class="tab-pane" id="comments">
                            <div class="top_dt_sec pt-0">
                                <div class="row">
                                <div class="col-lg-12 ">
                                    <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                            <thead>
                                                <tr>
                                                    <th>Date Comment</th>
                                                    <th>Person</th>
                                                    <th>Comment Type</th>
                                                    <th>Comment</th>
                                                    <th>Files</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>01/08/2023 18:58:31</td>
                                                <td>Avi Singh</td>
                                                <td>Meeting</td>
                                                <td>Lorem ipsum, dolor sit amet consectetur </td>
                                                <td>down-intrestrate.png </td>
                                                <!-- <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td> -->
                                            </tr>
                                            <tr>
                                                <td>01/08/2023 18:58:31</td>
                                                <td>Avi Singh</td>
                                                <td>Meeting</td>
                                                <td>Lorem ipsum, dolor sit amet consectetur </td>
                                                <td>down-intrestrate.png </td>
                                                <!-- <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td> -->
                                            </tr>
                                        </tbody>
                                        </table>
                                 </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tickets">
                        <div class="sites_main">
                            <div class="row">
                            <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Facebook</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Twitter</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Instagram</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Linkedin</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" readonly>
                                            </div>
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