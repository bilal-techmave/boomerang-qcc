@extends('layouts.main')
@section('app-title', 'Incident-report-add - Quality Commercial Cleaning')
@section('main-content')
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
        <div class="row"> 
            <form action="{{ route('ncr.update', $ncr->id) }}" id="myForm" method="post" enctype="multipart/form-data">
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
                                                <input type="text" name="creater_name"  class="form-control" disabled value="{{ $ncr->creator_name }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creator Phone</label>
                                                <input type="hitextdden" class="form-control" disabled name="creater_phone" value="{{ $ncr->creator_phone }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creation Date</label>
                                                <input type="text" name="creater_date" class="form-control" disabled value="{{ $ncr->created_at->format('d-m-Y') }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Incident ID</label>
                                                <input class="form-control" disabled name="incident_id" value="{{ $ncr->incident_id }}" />
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
                                                                    <option disabled>Please select one or start typing</option>
                                                                    <option value="Person" {{ $ncr->responsible == 'Person' ? 'selected' : '' }}>Person</option>
                                                                    <option value="Staff" {{ $ncr->responsible == 'Staff' ? 'selected' : '' }}>Staff</option>
                                                                </select>
                                                                @error('responsible')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3 mt-3 mt-sm-0">
                                                                <label class="form-label">Client - Portfolio - Site
                                                                </label>
                                                                <select data-plugin="customselect" class="form-select" name="client_portfolio_site">
                                                                    <option disabled>Please select one or start typing</option>
                                                                    @if ($allprotfolio)
                                                                        @foreach ($allprotfolio as $aprotf)
                                                                            <option value="{{$aprotf->id}}"{{$ncr->client_portfolio_site == $aprotf->id ? 'selected' : ''  }}>
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
                                                                    <option value="TRAINING" {{ in_array('TRAINING', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Training was insufficient or inadequate</option>
                                                                    <option value="RESPONSIBILITIES" {{ in_array('RESPONSIBILITIES', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Responsibilities not defined or not understood</option>
                                                                    <option value="RESOURCES" {{ in_array('RESOURCES', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Resources Competencies were inadequate</option>
                                                                    <option value="COMMUNICATION" {{ in_array('COMMUNICATION', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Communication issues (e.g., shift hand over between cleaners)</option>
                                                                    <option value="PLANNING" {{ in_array('PLANNING', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Planning and controls were insufficient</option>
                                                                    <option value="INSTRUCTIONS_INSUFFICIENT" {{ in_array('INSTRUCTIONS_INSUFFICIENT', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Instructions or requirements were insufficient or inadequate</option>
                                                                    <option value="INSTRUCTIONS_FOLLOWED" {{ in_array('INSTRUCTIONS_FOLLOWED', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Instructions or requirements were not followed</option>
                                                                    <option value="WRONG_DECISION" {{ in_array('WRONG_DECISION', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Wrong decision was made</option>
                                                                    <option value="READING_ERROR" {{ in_array('READING_ERROR', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>A reading error was made</option>
                                                                    <option value="MATERIAL_ERROR" {{ in_array('MATERIAL_ERROR', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Material handling error</option>
                                                                    <option value="DEFECT_NOT_REPORTED" {{ in_array('DEFECT_NOT_REPORTED', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Known defect or issue not reported or inadequately reported.</option>
                                                                    <option value="CONTAMINATION" {{ in_array('CONTAMINATION', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Contamination of product</option>
                                                                    <option value="MATERIAL_COMPLY" {{ in_array('MATERIAL_COMPLY', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Material did not comply with specification</option>
                                                                    <option value="PROCESS_INADEQUATE" {{ in_array('PROCESS_INADEQUATE', json_decode($ncr->non_conformance_type)) ? 'selected' : '' }}>Design process was inadequate</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Non-Conformity-Details</label>
                                                                <textarea name="non_conformity_details" class="form-control">{{$ncr->non_conformity_details}}</textarea>
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
                                                </div>
                                            </div>
                                            <div class="col-lg-12" style="margin-left: 10px;">
                                                 <div class="table_box table-responsive">
                                                     <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                                         <thead>
                                                             <tr>
                                                                 <th>Recommended Actions</th>
                                                                 <th>By Whom</th>
                                                                 <th>Due Date</th>
                                                                 <th>Completed Date</th>
                                                                 <th>Action</th>
                                                             </tr>
                                                         </thead>
                                                         <tbody>
                                                             @foreach ($action as $data)
                                                                 <tr role="row" class="odd">
                                                                     <td>{{ $data->recommended_actions }}</td>
                                                                     <td>{{ $data->by_whom ?? ''}}</td>
                                                                     <td>{{ $data->due_date ?? ''}}</td>
                                                                     <td>{{ $data->completed_date ?? ''}}</td>
                                                                     <td>
                                                                        <a href="{{ route('ncr.showAction', $data->id) }}">
                                                                             <span
                                                                                 class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                                 <i class="uil-eye"></i>
                                                                             </span>
                                                                         </a>
                                                                         <!-- <a href="{{ route('ncr.edit', $data->id) }}">
                                                                             <span
                                                                                 class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                                 <i class="uil-edit"></i>
                                                                             </span>
                                                                         </a> -->
                                                                     </td>
                                                                 </tr>
                                                             @endforeach
                                                         </tbody>
                                                     </table>
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
                                <span id="report">- Non-Conformance Report Particulars</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="bi-clipboard-plus"></i></span>
                                <span id="action">- Recommended Action / Corrective Preventive Action Plan</span>
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
    
    <script>
        $(document).ready(function() {
            $('#nonConformanceType').select2();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#action').on('click', function(){
                $('.bottom_footer_dt').hide(); // Added $ before ('.bottom_footer_dt')
            });
            $('#report').on('click', function(){
                $('.bottom_footer_dt').show(); // Added $ before ('.bottom_footer_dt')
            });
        });
    </script>

@endpush