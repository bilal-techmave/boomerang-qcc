@extends('layouts.main')
@section('app-title', 'Incident-report-add - Quality Commercial Cleaning')
@section('main-content')
<style>
    .custom-modal-header {
      background-color: #007bff; /* Blue background color */
      color: #ffffff; /* White text color */
    }
    .custom-modal-header .close {
      color: #ffffff; /* White color for the close button */
      outline: none; /* Remove the default focus outline */
      border: none; /* Remove the default border */
      padding: 0; /* Remove padding */
      background: none; /* Remove background */
      font-size: 1.5rem; /* Adjust font size as needed */
      position: absolute; /* Position the close button absolutely */
      top: 0.5rem; /* Adjust top position */
      right: 0.5rem; /* Adjust right position */
      cursor: pointer; /* Set cursor to pointer */
    }
  </style>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">New Non-Conformance Report</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Compliance</li>
                            <li class="breadcrumb-item active"> View Incident Reportsss</li>
                            <li class="breadcrumb-item active"> Add NCR</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- Recommended Modal -->
        <div class="modal fade" id="recommendedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg"> <!-- Add modal-lg class here -->
            <div class="modal-content">
              <div class="modal-header custom-modal-header"> <!-- Add custom class to modal header -->
                <h5 class="modal-title" id="exampleModalLabel">Insert Recommended Actions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="modalForm" action="{{route('ncr.recommendedActions')}}" method="post" enctype="multipart/form-data"> 
              @csrf
              <input type="hidden" name="action_type" value="recommended">
              <input class="form-control" name="incident_id" hidden value="{{ decrypt(request()->incident_id) }}" />
                <div class="modal-body row">
                  <div class="col-lg-12 mt-2">
                    <div class="form-group">
                      <label for="name">Recommended Actions</label>
                      <input type="text" class="form-control" id="recommended_actions" name="recommended_actions">
                    </div>
                  </div>
                  <div class="col-lg-12 mt-2">
                    <div class="form-group mt-2">
                      <label for="email">By Whom</label>
                      <input type="text" class="form-control" id="by_whom" name="by_whom">
                    </div>
                  </div>
                  <div class="col-lg-6 mt-2">
                    <div class="form-group mt-2">
                      <label for="email">Due Date</label>
                      <input type="date" class="form-control" id="due_date" name="due_date">
                    </div>
                  </div>  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal -->
        <!-- Corrective Modal -->
        <div class="modal fade" id="correctiveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg"> <!-- Add modal-lg class here -->
            <div class="modal-content">
              <div class="modal-header custom-modal-header"> <!-- Add custom class to modal header -->
                <h5 class="modal-title" id="exampleModalLabel">Insert Corrective Actions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="modalForm" action="{{route('ncr.recommendedActions')}}" method="post" enctype="multipart/form-data"> 
                @csrf
                <input type="hidden" name="action_type" value="corrective">
                <input class="form-control" hidden name="incident_id" value="{{ decrypt(request()->incident_id) }}" />
                <div class="modal-body row">
                    <div class="col-lg-12">
                        <div class="form-group">
                          <label for="name">Recommended Acions</label>
                          <input type="text" class="form-control" id="recommended_actions" name="recommended_actions">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-2">
                      <div class="form-group">
                        <label for="date">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date">
                      </div>
                    </div>
                  <div class="col-lg-6 mt-2">
                    <div class="form-group">
                      <label for="date">Completed Date</label>
                      <input type="date" class="form-control" id="completed_date" name="completed_date">
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- End Modal -->
        <div class="row"> 
            <form action="{{ route('ncr.store') }}" id="myForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main_bx_dt__">
                                <div class="top_dt_sec p-0">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creator Name</label>
                                                <input type="text"  class="form-control" value="{{ auth()->user()->name }} {{ auth()->user()->surname }}" disabled />
                                                <input type="hidden" name="creater_name"  class="form-control" value="{{ auth()->user()->name }} {{ auth()->user()->surname }}" />

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creator Phone</label>
                                                <input type="text"  class="form-control" value="{{ auth()->user()->phone_number }}" disabled />
                                                <input type="hidden" name="creater_phone" value="{{ auth()->user()->phone_number }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creation Date</label>
                                                <input type="text" class="form-control" value="{{ date('Y-m-d h:i:s') }}" disabled />
                                                <input type="hidden" name="creater_date" class="form-control" value="{{ date('Y-m-d h:i:s') }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Incident ID</label>
                                                <input class="form-control" disabled value="{{ decrypt(request()->incident_id) }}" />
                                                <input class="form-control" name="incident_id" hidden value="{{ decrypt(request()->incident_id) }}" />
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

                                                        <div class="col-lg-6">
                                                            <div class="mb-3 mt-3 mt-sm-0">
                                                                <label class="form-label">Responsible<span class="red">*</span></label>
                                                                <select class="form-select" name="responsible" required>
                                                                    <option selected disabled>Please select one or start typing</option>
                                                                    <option value="Person">Person</option>
                                                                    <option value="Staff">Staff</option>
                                                                </select>
                                                                @error('place_of_incident')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3 mt-3 mt-sm-0">
                                                                <label class="form-label">Client - Portfolio - Site
                                                                </label>
                                                                <select data-plugin="customselect" class="form-select" name="client_portfolio_site">
                                                                    <option selected disabled>Please select one or start typing</option>
                                                                    @if ($allprotfolio)
                                                                        @foreach ($allprotfolio as $aprotf)
                                                                            <option value="{{ $aprotf->id }}">
                                                                                    {{ $aprotf->protfolio->client->business_name }}
                                                                                    - {{ $aprotf->protfolio->full_name }} -
                                                                                    {{ $aprotf->site->reference }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Type of Non-Conformance</label>
                                                                <select name="non_conformance_type[]" class="form-select populate select2-hidden-accessible" multiple="" data-plugin-selecttwo="" id="nonConformanceType" tabindex="-1" aria-hidden="true">
                                                                    <option value="TRAINING">Training was insufficient or inadequate</option>
                                                                    <option value="RESPONSIBILITIES">Responsibilities not defined or not understood</option>
                                                                    <option value="RESOURCES">Resources Competencies were inadequate</option>
                                                                    <option value="COMMUNICATION">Communication issues (e.g., shift hand over between cleaners)</option>
                                                                    <option value="PLANNING">Planning and controls were insufficient</option>
                                                                    <option value="INSTRUCTIONS_INSUFFICIENT">Instructions or requirements were insufficient or inadequate</option>
                                                                    <option value="INSTRUCTIONS_FOLLOWED">Instructions or requirements were not followed</option>
                                                                    <option value="WRONG_DECISION">Wrong decision was made</option>
                                                                    <option value="READING_ERROR">A reading error was made</option>
                                                                    <option value="MATERIAL_ERROR">Material handling error</option>
                                                                    <option value="DEFECT_NOT_REPORTED">Known defect or issue not reported or inadequately reported.</option>
                                                                    <option value="CONTAMINATION">Contamination of product</option>
                                                                    <option value="MATERIAL_COMPLY">Material did not comply with specification</option>
                                                                    <option value="PROCESS_INADEQUATE">Design process was inadequate</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Non-Conformity-Details</label>
                                                                <textarea name="non_conformity_details" class="form-control"></textarea>
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
                                                    <div class="col-lg-5 mb-2">
                                                        <button type="button" class="theme_btn btn btn-warning" data-toggle="modal" data-target="#recommendedModal"><i class="bi-arrow-repeat"></i> Add Recommended Actions</button>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <button type="button" class="theme_btn btn btn-warning" data-toggle="modal" data-target="#correctiveModal"><i class="bi-arrow-repeat"></i> Add Corrective Actions</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bottom_footer_dt">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="action_btns">
                                                    <button type="button" onclick="validateForm(this,'myForm')" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </form>
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
@push('push_script')
    <script>
        function validateForm(that, formId) {
            let isValid = true;
            buttonLoading(that);
            $('.select2-selection').removeClass('invalid-select');
            $(".custom_error").remove();
            // Check each required input field for validation
            $(`#${formId} [required]`).each(function() {
                $(this).removeClass('is-invalid'); // Remove any existing validation classes
                // If the input field is empty or not filled according to the requirement
                if (!$(this).val() || ($(this).is('select') && !$(this).val())) {
                    isValid = false;
                    $(this).addClass('is-invalid'); // Add a validation class to highlight the field
                    // Add error message below the input field
                    $(this).after('<span class="custom_error text-danger">This field is required.</span>');
                }
            });

            if (isValid) {
                $('#myForm').submit();
            }
        }
    </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include Select2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#nonConformanceType').select2();
    });
</script>

@endpush