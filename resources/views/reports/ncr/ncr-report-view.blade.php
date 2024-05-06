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
                                       <h4>- Non-Conformance Report Particulars</h4>
                                       </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="detail_box pe-4">
                                          <ul>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Responsible</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $ncr->responsible }}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Client - Portfolio - Site </h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $selectedprotfolio->protfolio->client->business_name ?? ''}} - {{ $selectedprotfolio->protfolio->full_name ?? '' }} - {{ $selectedprotfolio->site->reference ?? ''}}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Type of Non-Conformance</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    @foreach(json_decode($ncr->non_conformance_type) as $data)
                                                   <h6>{{ $data.',' }}</h6>
                                                   @endforeach
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Non-Conformity-Details</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $ncr->non_conformity_details }}</h6>
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
                        <div class="tab-pane" id="tickets">
                            <div class="top_dt_sec">
                                <div class="row">
                                    <div class="col-lg-12 mb-2">
                                       <div class="title_head">
                                          <h4>- Recommended Action / Corrective Preventive Action Plan</h4>
                                       </div>
                                    </div>
                                   <div class="col-lg-12">
                                     <div class="table_box table-responsive">
                                         <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                             <thead>
                                                 <tr>
                                                     <th>Recommended Actions</th>
                                                     <th>By Whom</th>
                                                     <th>Due Date</th>
                                                     <th>Completed Date</th>
                                                     <!-- <th>Action</th> -->
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach ($action as $data)
                                                     <tr role="row" class="odd">
                                                         <td>{{ $data->recommended_actions }}</td>
                                                         <td>{{ $data->by_whom ?? ''}}</td>
                                                         <td>{{ $data->due_date ?? ''}}</td>
                                                         <td>{{ $portfolio->completed_date ?? ''}}</td>
                                                         <!-- <td>
                                                            <a href="{{ route('ncr.show', $data->id) }}">
                                                                 <span
                                                                     class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                     <i class="uil-eye"></i>
                                                                 </span>
                                                             </a>
                                                             <a href="{{ route('ncr.edit', $data->id) }}">
                                                                 <span
                                                                     class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                     <i class="uil-edit"></i>
                                                                 </span>
                                                             </a>
                                                         </td> -->
                                                     </tr>
                                                 @endforeach
                                             </tbody>
                                         </table>
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 px-0">
                        <div class="side_tab">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <span><i class="uil-info-circle"></i></span>
                                        <span>- Non-Conformance Report Particulars</span>
                                    </a>
                                </li>

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