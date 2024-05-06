@extends('layouts.main')
@section('app-title','Incident-report-view - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <h4 class="page-title">NCR Report View</h4>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item">Compliance</li>
                  <li class="breadcrumb-item active">NCR Report View</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- end page title -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card">
            <div class="card-body">
               <div class="main_bx_dt__">
                  <div class="top_dt_sec p-0">
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="detail_box pe-4">
                              <ul>
                                 <li>
                                    <div class="detail_title">
                                       <h6>Creator Name</h6>
                                    </div>
                                    <div class="detail_ans">
                                       <h6>{{ $ncr->creator_name }}</h6>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="detail_title">
                                       <h6>Creator Phone</h6>
                                    </div>
                                    <div class="detail_ans">
                                       <h6>{{ $ncr->creator_phone }}</h6>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="detail_title">
                                       <h6>Creation Date</h6>
                                    </div>
                                    <div class="detail_ans">
                                       <h6>{{ $ncr->created_at->format('d-m-Y') }}</h6>
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
         <div class="card show_portfolio_tab">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-8 pe-0">
                     <div class="tab-content pt-0 text-muted">
                        <div class="tab-pane show active" id="home">
                           <div class="main_bx_dt__">
                              <div class="top_dt_sec">
                                 <div class="row">
                                    <div class="col-lg-12 mb-2">
                                       <div class="title_head">
                                       <h4>- Recommended Action / Corrective Preventive Action Plan</h4>
                                       </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="detail_box pe-4">
                                          <ul>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Recommended Actions</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $action->recommended_actions }}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>By Whom</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $action->by_whom}}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Due Date</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $action->due_date }}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Completed Date</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $action->completed_date }}</h6>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- main_bx_dt -->
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 px-0">
                        <div class="side_tab">
                                <li class="nav-item">
                                    <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        <span><i class="bi-clipboard-plus"></i></span>
                                        <span>- Recommended Action / Corrective Preventive Action Plan</span>
                                    </a>
                                </li>
                            </ul>
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