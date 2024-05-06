@extends('layouts.main')
@section('app-title','Incident-report-view - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <h4 class="page-title">Incident Report View</h4>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item">Compliance</li>
                  <li class="breadcrumb-item active">Incident Report View</li>
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
                                       <h6>{{ $incident->creater_name }}</h6>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="detail_title">
                                       <h6>Creator Phone</h6>
                                    </div>
                                    <div class="detail_ans">
                                       <h6>{{ $incident->creater_phone }}</h6>
                                    </div>
                                 </li>
                                 <li>
                                    <div class="detail_title">
                                       <h6>Creation Date</h6>
                                    </div>
                                    <div class="detail_ans">
                                       <h6>{{ $incident->created_at }}</h6>
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
                                          <h4>Incident Details</h4>
                                       </div>
                                    </div>
                                    <div class="col-lg-12">
                                       <div class="detail_box pe-4">
                                          <ul>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Place of Incident</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $incident->place_of_incident }}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Date of Incident </h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $incident->incident_date }}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Time of Incident</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $incident->incident_time }}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Witness Name</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $incident->witness_name }}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Witness Document Number</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $incident->witness_doc_number }}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Client - Portfolio - Site </h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $selectedprotfolio->protfolio->client->business_name ?? ''}} - {{ $selectedprotfolio->protfolio->full_name ?? ''}} - {{ $selectedprotfolio->site->reference ?? ''}}</h6>
                                                </div>
                                             </li>
                                             <li>
                                                <div class="detail_title">
                                                   <h6>Address Of Incident</h6>
                                                </div>
                                                <div class="detail_ans">
                                                   <h6>{{ $incident->incident_address }}</h6>
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
                                       <h4>Accident Details</h4>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="detail_box pe-4">
                                       <ul>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Driver's Name</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $driver_vehicle_data['driver_name'] }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Driver's Licence </h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $driver_vehicle_data['driver_licence'] }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>First Vehicle Rego</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $driver_vehicle_data['first_vehicle_rego'] }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Second Driver's Name</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $driver_vehicle_data['second_driver_name'] }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Second Driver's Licence</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $driver_vehicle_data['second_driver_licence'] }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Second Vehicle Rego</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $driver_vehicle_data['second_vehicle_rego'] }}</h6>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="messages">
                           <div class="top_dt_sec">
                              <div class="row">
                                 <div class="col-lg-12 mb-2">
                                    <div class="title_head">
                                       <h4>Injury Details</h4>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="detail_box pe-4">
                                       <ul>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Injured Person Name</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $injury_person_data['injured_person_name'] ?? '' }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Injured Person Phone </h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ preg_replace('/[^0-9]/', '', $injury_person_data['injured_person_phone']) ?? '' }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Injured Person Document Number</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $injury_person_data['injured_person_document'] ?? '' }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Medical Treatment Provided</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $injury_person_data['medical_treatment'] ?? '' }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Date Work Ceased</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $injury_person_data['date_work_ceased'] ?? '' }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Time Work Ceased</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $injury_person_data['time_work_ceased'] ?? '' }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Cause of Injury</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $injury_person_data['injury_cause'] }}</h6>
                                             </div>
                                          </li>
                                          <li>
                                             <div class="detail_title">
                                                <h6>Location of Injury</h6>
                                             </div>
                                             <div class="detail_ans">
                                                <h6>{{ $injury_person_data['injury_location'] }}</h6>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-lg-12  mt-3">
                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                       <thead>
                                          <tr>
                                             <th>Document Name</th>
                                             <!-- <th>Action</th> -->
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($incidentdocument as $incident)
                                          @foreach($incident->incidentDocs as $doc)
                                          @if ( $doc->doc_type == 'injury')
                                          <tr id="injury{{$doc->id}}{{time()}}">
                                             <td><a href="{{ url(env('STORE_PATH') .$doc->doc_file)}}" target="_blank">View File</a></td>
                                             <td>
                                                <button type="button" onclick="deleteRecordTbl('{{$doc->id}}','incident_docus','injury{{$doc->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                <i class="uil-trash"></i>
                                                </button>
                                             </td>
                                          </tr>
                                          @endif
                                          @endforeach
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="comments">
                           <div class="top_dt_sec">
                              <div class="row">
                                 <div class="col-lg-12 mb-2 ">
                                    <div class="title_head">
                                       <h4>Environmental Details</h4>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="detail_box pe-4">
                                       <div class="detail_box">
                                          <h6>Category Environmental Incident</h6>
                                          <p>{{ $environmental_data['category_environmental_incident'] }}</p>
                                       </div>
                                       <div class="detail_box">
                                          <h6>What action has taken to eliminate the impact? </h6>
                                          <p>{{ $environmental_data['action_eliminate_impact'] }}</p>
                                       </div>
                                       <div class="detail_box">
                                          <h6>If yes, what further action is required? </h6>
                                          <p>{{ $environmental_data['action_is_required'] }}</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                       <thead>
                                          <tr>
                                             <th>Document Name</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($incidentdocument as $incident)
                                          @foreach($incident->incidentDocs as $doc)
                                          @if ( $doc->doc_type == 'environmental')
                                          <tr id="environmental{{$doc->id}}{{time()}}">
                                             <td><a href="{{ url(env('STORE_PATH') .$doc->doc_file)}}" target="_blank">View File</a></td>
                                             {{-- 
                                             <td>
                                                <button type="button" onclick="deleteRecordTbl('{{$doc->id}}','incident_docus','environmental{{$doc->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                <i class="uil-trash"></i>
                                                </button>
                                             </td>
                                             --}}
                                          </tr>
                                          @endif
                                          @endforeach
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane" id="other-details">
                           <div class="top_dt_sec">
                              <div class="row">
                                 <div class="col-lg-12 mb-2 ">
                                    <div class="title_head">
                                       <h4>Other Details</h4>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="detail_box pe-4">
                                       <div class="detail_box">
                                          <h6>Category Other Incident</h6>
                                          <p>{{ $other_details['category_other_incident'] }}</p>
                                       </div>
                                       <div class="detail_box">
                                          <h6>Provide other information if needed</h6>
                                          <p>{{ $other_details['provide_other_info'] }}</p>
                                       </div>
                                       <div class="detail_box">
                                          <h6>What action has taken to eliminate the impact?</h6>
                                          <p>{{ $other_details['action_taken_eliminate_impact'] }}</p>
                                       </div>
                                       <div class="detail_box">
                                          <h6>If yes, what further action is required? </h6>
                                          <p>{{ $other_details['further_action_required'] }}</p>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                       <thead>
                                          <tr>
                                             <th>Document Name</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($incidentdocument as $incident)
                                          @foreach($incident->incidentDocs as $doc)
                                          @if ( $doc->doc_type == 'injury')
                                          <tr id="cemail{{$doc->id}}{{time()}}">
                                             <td><a href="{{ url(env('STORE_PATH') .$doc->doc_file)}}" target="_blank">View File</a></td>
                                             {{-- 
                                             <td>
                                                <button type="button" onclick="deleteRecordTbl('{{$doc->id}}','incident_docus','cemail{{$doc->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                <i class="uil-trash"></i>
                                                </button>
                                             </td>
                                             --}}
                                          </tr>
                                          @endif
                                          @endforeach
                                          @endforeach
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="tab-pane" id="save-send">
                           <div class="top_dt_sec">
                              <div class="row">
                                 <div class="col-lg-12 mb-2">
                                    <div class="title_head">
                                       <h4>Compliance Action</h4>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="detail_box pe-4">
                                        <ul id="incident_details">
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Is it a notifiable incident?</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <input type="radio" id="notifiable_yes" name="notifiable_incident" value="yes" {{ $incident->notifiable_incident == 'yes' ? 'checked' : ''}}>
                                                    <label for="notifiable_yes">Yes</label>
                                                    <input type="radio" id="notifiable_no" name="notifiable_incident" value="no" {{ $incident->notifiable_incident != 'yes' ? 'checked' : ''}}>
                                                    <label for="notifiable_no">No</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Incident Investigated?</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <input type="radio" id="investigated_yes" name="incident_investigated" value="yes" {{ $incident->incident_investigated == 'yes' ? 'checked' : ''}}>
                                                    <label for="investigated_yes">Yes</label>
                                                    <input type="radio" id="investigated_no" name="incident_investigated" value="no" {{ $incident->incident_investigated != 'yes' ? 'checked' : ''}}>
                                                    <label for="investigated_no">No</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Root Cause Completed?</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <input type="radio" id="cause_completed_yes" name="root_cause_completed" value="yes" {{ $incident->root_cause_completed == 'yes' ? 'checked' : ''}}>
                                                    <label for="cause_completed_yes">Yes</label>
                                                    <input type="radio" id="cause_completed_no" name="root_cause_completed" value="no" {{ $incident->root_cause_completed != 'yes' ? 'checked' : ''}}>
                                                    <label for="cause_completed_no">No</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>NCR Required?</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <input type="radio" id="ncr_required_yes" name="ncr_required" value="yes" {{ $incident->ncr_required == 'yes' ? 'checked' : ''}}>
                                                    <label for="ncr_required_yes">Yes</label>
                                                    <input type="radio" id="ncr_required_no" name="ncr_required" value="no" {{ $incident->ncr_required != 'yes' ? 'checked' : ''}}>
                                                    <label for="ncr_required_no">No</label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="detail_title">
                                                    <h6>Review Completed?</h6>
                                                </div>
                                                <div class="detail_ans">
                                                    <input type="radio" id="review_completed_yes" name="review_completed" value="yes" {{ $incident->review_completed == 'yes' ? 'checked' : ''}}>
                                                    <label for="review_completed_yes">Yes</label>
                                                    <input type="radio" id="review_completed_no" name="review_completed" value="no" {{ $incident->review_completed != 'yes' ? 'checked' : ''}}>
                                                    <label for="review_completed_no">No</label>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="detail_title">
                                            <h6>General Commented</h6>
                                            <textarea name="general_commented" class="form-control">{{$incident->general_commented}}</textarea>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" value="" id="agree_terms" {{$incident->general_commented ? 'checked' : ''}} required>
                                            <label class="form-check-label" for="agree_terms">
                                                I agree to the terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @if($incident->ncr_required == 'yes')
                            <a href="{{route('ncr.add', encrypt(request()->id))}}" style="margin-left: 3%" class="btn btn-primary mb-2 pl-2">+ Create New Non-Conformance</a href="">
                        @endif
                     </div>
                  </div>
                  <div class="col-lg-4 px-0">
                  <div class="side_tab">
                  <ul class="nav nav-tabs">
                  <li class="nav-item">
                  <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                  <span><i class="uil-info-circle"></i></span>
                  <span>Incident Details</span>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                  <span><i class="bi-clipboard-plus"></i></span>
                  <span>Accident Details</span>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                  <span><i class="bi-file-earmark-medical"></i></span>
                  <span>Injury Details</span>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                  <span><i class="bi-shield-plus"></i></span>
                  <span>Environmental Details</span>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#save-send" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                  <span><i class="bi-shield-plus"></i></span>
                  <span>Compliance Action</span>
                  </a>
                  </li>
                  <li class="nav-item">
                  <a href="#other-details" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                  <span><i class="bi-info-circle"></i></span>
                  <span>Other Details</span>
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

<script>
    $(document).ready(function() {
        $('#incident_details input').prop('disabled', true); // Disable all input fields within the ul
        $('textarea[name="p_reason"]').prop('disabled', true); // Disable the textarea
        $('#agree_terms').prop('disabled', true);
    });
</script>
@endsection