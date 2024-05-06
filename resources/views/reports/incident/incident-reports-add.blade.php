@extends('layouts.main')
@section('app-title', 'Incident-report-add - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Incident Reports</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Compliance</li>
                            <li class="breadcrumb-item active"> Add Incident Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row"> 
            <form action="{{ route('incident.store') }}" id="myForm" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="status" name="status" value="">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main_bx_dt__">
                                <div class="top_dt_sec p-0">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creator Name</label>
                                                <input name="creater_name" hidden
                                                    value="{{ auth()->user()->name }} {{ auth()->user()->surname }}" />
                                                <input type="text" class="form-control" id="exampleInputEmail1" disabled
                                                    aria-describedby="emailHelp"
                                                    value="{{ auth()->user()->name }} {{ auth()->user()->surname }}"
                                                    placeholder="{{ auth()->user()->name }} {{ auth()->user()->surname }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creator Phone</label>
                                                <input name="creater_phone" hidden
                                                    value="{{ auth()->user()->phone_number }}" />
                                                <input type="text" class="form-control" id="exampleInputEmail1" disabled
                                                    aria-describedby="emailHelp"
                                                    value="{{ auth()->user()->phone_number ?? '-' }}"
                                                    placeholder="{{ auth()->user()->phone_number ?? '-' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creation Date</label>
                                                <input name="creater_date" hidden value="{{ date('Y-m-d h:i:s') }}" />
                                                <input type="text" class="form-control" id="exampleInputEmail1" disabled
                                                    aria-describedby="emailHelp" value="{{ date('Y-m-d H:i:s') }}"
                                                    placeholder="{{ date('Y-m-d H:i:s') }}">
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

                                                        <div class="col-lg-4">
                                                            <div class="mb-3 mt-3 mt-sm-0">
                                                                <label class="form-label">Place of Incident <span
                                                                        class="red">*</span></label>
                                                                <select data-plugin="customselect" required class="form-select"
                                                                    name="place_of_incident">
                                                                    <option value="0">Please select one or start typing
                                                                    </option>
                                                                    <option value="AT_WORK">At Work</option>
                                                                    <option value="DURING_BREAK">During Break</option>
                                                                    <option value="TRAVELLING_WORK">Travelling to/from Work
                                                                    </option>
                                                                </select>
                                                                @error('place_of_incident')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exampleInputEmail1">Date of
                                                                    Incident <span class="red">*</span> </label>
                                                                <input type="text" required class="form-control basic-datepicker"
                                                                    id="" value="{{ old('incident_date') }}"
                                                                    name="incident_date" aria-describedby="emailHelp"
                                                                    placeholder="">
                                                                @error('incident_date')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exampleInputEmail1">Time of
                                                                    Incident</label>
                                                                <input type="text" class="form-control basic-timepicker"
                                                                    id="" name="incident_time"
                                                                    aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label for="">Witness Check</label>
                                                            <div class="row mt-2">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <div class="checkbox checkbox-success">
                                                                            <input id="checkbox6a" type="checkbox"
                                                                                name="is_witness_check" value="1">
                                                                            <label class="form-label" for="checkbox6a">
                                                                                Is the Witness You? If yes do not fill the
                                                                                Witness Person Details
                                                                            </label>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exampleInputEmail1">Witness
                                                                    Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputEmail1" name="witness_name"
                                                                    aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exampleInputEmail1">Witness
                                                                    Phone</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputEmail1" name="witness_phone"
                                                                    aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exampleInputEmail1">Witness
                                                                    Document Number</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputEmail1" name="witness_doc_number"
                                                                    aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3 mt-3 mt-sm-0">
                                                                <label class="form-label">Client - Portfolio - Site
                                                                </label>
                                                                <select data-plugin="customselect" class="form-select"
                                                                    name="client_id">
                                                                    <option value="0">Please select one or start
                                                                        typing</option>
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
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exampleInputEmail1">Address
                                                                    Of Incident</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputEmail1" name="incident_address"
                                                                    aria-describedby="emailHelp" placeholder="">
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
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Driver's
                                                                Name</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="driver_name"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Driver's
                                                                Licence</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="driver_licence"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">First
                                                                Vehicle Rego</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="first_vehicle_rego"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Second
                                                                Driver's Name</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="second_driver_name"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Second
                                                                Driver's Licence</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="second_driver_licence"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Second
                                                                Vehicle Rego</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="second_vehicle_rego"
                                                                aria-describedby="emailHelp" placeholder="">
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
                                                        <label for="">Injury Person Check</label>
                                                        <div class="row mt-2">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    {{-- <div class="checkbox checkbox-success"> --}}
                                                                    <input id="checkbox6a" type="checkbox"
                                                                        name="is_injury_person_check" value="1">
                                                                    <label class="form-label" for="checkbox6a">
                                                                        Is the Injured Person You? If yes do not fill the
                                                                        Injured Person Details
                                                                    </label>
                                                                    {{-- </div> --}}

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Injured
                                                                Person Name</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="injured_person_name"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Injured
                                                                Person Phone</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="injured_person_phone"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Injured
                                                                Person Document Number</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="injured_person_document"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 mt-3 mt-sm-0">
                                                            <label class="form-label">Medical Treatment Provided</label>
                                                            <select data-plugin="customselect" class="form-select"
                                                                name="medical_treatment">
                                                                <option disabled selected>Please select one or start typing
                                                                </option>
                                                                <option value="NO_TREATMENT">No Treatment</option>
                                                                <option value="FIRST_AID">First Aid</option>
                                                                <option value="MEDICAL_TREATMENT">Medical Treatment
                                                                </option>
                                                                <option value="HOSPITALISED">Hospitalised</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <label for="#">Did the person stop work?</label>
                                                                <div class="d-flex mt-2">
                                                                    <div class="form-check me-2 mb-1">
                                                                        <input type="radio" id="customRadio1"
                                                                            name="person_stop_work"
                                                                            class="form-check-input" value="1">
                                                                        <label class="form-check-label"
                                                                            for="customRadio1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check  mb-1">
                                                                        <input type="radio" id="customRadio1"
                                                                            name="person_stop_work" value="0"
                                                                            class="form-check-input">
                                                                        <label class="form-check-label"
                                                                            for="customRadio1">No</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label for="#">Did the person returned to
                                                                    work?</label>
                                                                <div class="d-flex mt-2">
                                                                    <div class="form-check me-2 mb-1">
                                                                        <input type="radio" id="customRadio2"
                                                                            name="person_returned_work" value="1"
                                                                            class="form-check-input">
                                                                        <label class="form-check-label"
                                                                            for="customRadio2">Yes</label>
                                                                    </div>
                                                                    <div class="form-check  mb-1">
                                                                        <input type="radio" id="customRadio3"
                                                                            name="person_returned_work"value="0"
                                                                            class="form-check-input">
                                                                        <label class="form-check-label"
                                                                            for="customRadio3">No</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-lg-6 mt-3">
                                                                <label for="#">Did the person has a medical
                                                                    certificated?</label>
                                                                <div class="d-flex mt-2">
                                                                    <div class="form-check me-2 mb-1">
                                                                        <input type="radio" id="customRadio3"
                                                                            name="person_medical_certificated"
                                                                            value="1" class="form-check-input">
                                                                        <label class="form-check-label"
                                                                            for="customRadio3">Yes</label>
                                                                    </div>
                                                                    <div class="form-check  mb-1">
                                                                        <input type="radio" id="customRadio4"
                                                                            name="person_medical_certificated"
                                                                            value="0" class="form-check-input">
                                                                        <label class="form-check-label"
                                                                            for="customRadio4">No</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="dateWorkCeased">Date Work Ceased</label>
                                                            <input type="text" class="form-control basic-datepicker" id="dateWorkCeased" value="{{ old('incident_date') }}" name="date_work_ceased" aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Time Work
                                                                Ceased</label>
                                                            <input type="text" class="form-control basic-timepicker"
                                                                id="" name="time_work_ceased"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Cause of Injury</label>
                                                            <textarea class="form-control" name="injury_cause"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Location of Injury</label>
                                                            <textarea class="form-control" name="injury_location"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Upload Attachment</label>
                                                            <input name="injury_file" type="file" class="dropify"
                                                                data-height="100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12  mt-3">
                                                        <table class="table table-bordered  dt-responsive nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Document Name</th>

                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    {{-- <td>green.png</td>
                                            <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td> --}}
                                                                </tr>

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
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Category
                                                                Environmental Incident</label>
                                                            <input type="text" class="form-control" id=""
                                                                name="category_environmental_incident"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="#">Has the cause been isolated or
                                                            eliminated?</label>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-2 mb-1">
                                                                <input type="radio" id="customRadio3" value="1"
                                                                    name="cause_been_isolated_eliminated"
                                                                    class="form-check-input">
                                                                <label class="form-check-label"
                                                                    for="customRadio3">Yes</label>
                                                            </div>
                                                            <div class="form-check  mb-1">
                                                                <input type="radio" id="customRadio4" value="0"
                                                                    name="cause_been_isolated_eliminated"
                                                                    class="form-check-input">
                                                                <label class="form-check-label"
                                                                    for="customRadio4">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12 mt-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">What action has taken to eliminate
                                                                the impact? </label>
                                                            <textarea class="form-control" name="action_eliminate_impact"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <label for="#">Is further action required?</label>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-2 mb-1">
                                                                <input type="radio" id="customRadio8" value="1"
                                                                    name="further_action_required"
                                                                    class="form-check-input">
                                                                <label class="form-check-label"
                                                                    for="customRadio8">Yes</label>
                                                            </div>
                                                            <div class="form-check  mb-1">
                                                                <input type="radio" id="customRadio9" value="0"
                                                                    name="further_action_required"
                                                                    class="form-check-input">
                                                                <label class="form-check-label"
                                                                    for="customRadio9">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">If yes, what further action is
                                                                required? </label>
                                                            <textarea class="form-control" name="action_is_required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Upload Attachment</label>
                                                            <input name="environmental_file" type="file"
                                                                class="dropify" data-height="100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <table class="table table-bordered  dt-responsive nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Document Name</th>

                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    {{-- <td>green.png</td>
                                            <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td> --}}
                                                                </tr>

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
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Category
                                                                Other Incident</label>
                                                            <input type="text" class="form-control" id=""
                                                                name="category_other_incident"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">Provide other information if
                                                                needed</label>
                                                            <textarea class="form-control" name="provide_other_info"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="#">Has the cause been isolated or
                                                            eliminated?</label>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-2 mb-1">
                                                                <input type="radio" id="customRadio3" value="1"
                                                                    name="cause_isolated_elimnated"
                                                                    class="form-check-input">
                                                                <label class="form-check-label"
                                                                    for="customRadio3">Yes</label>
                                                            </div>
                                                            <div class="form-check  mb-1">
                                                                <input type="radio" id="customRadio4" value="0"
                                                                    name="cause_isolated_elimnated"
                                                                    class="form-check-input">
                                                                <label class="form-check-label"
                                                                    for="customRadio4">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12 mt-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">What action has taken to eliminate
                                                                the impact?</label>
                                                            <textarea class="form-control" name="action_taken_eliminate_impact"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <label for="#">Is further action required?</label>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-2 mb-1">
                                                                <input type="radio" id="customRadio8" value="1"
                                                                    name="is_further_action_required"
                                                                    class="form-check-input">
                                                                <label class="form-check-label"
                                                                    for="customRadio8">Yes</label>
                                                            </div>
                                                            <div class="form-check  mb-1">
                                                                <input type="radio" id="customRadio9" value="0"
                                                                    name="is_further_action_required"
                                                                    class="form-check-input">
                                                                <label class="form-check-label"
                                                                    for="customRadio9">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">If yes, what further action is
                                                                required? </label>
                                                            <textarea class="form-control" name="further_action_required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Upload Attachment</label>
                                                            <input name="other_file" type="file" class="dropify"
                                                                data-height="100" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <table class="table table-bordered  dt-responsive nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Document Name</th>

                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    {{-- <td>green.png</td>
                                            <td> <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td> --}}
                                                                </tr>

                                                            </tbody>
                                                        </table>


                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="customCheck2" value="1"
                                                                name="is_environmental_incident">
                                                            <label class="form-check-label" for="customCheck2">I confirm
                                                                all the information above is correct and can be use by the
                                                                Company</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="bottom_footer_dt">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="action_btns">
                                                    <button type="button" id="save" onclick="validateForm(this,'myForm')"
                                                        class="btn btn-primary">Save</button>
                                                    <button type="button" id="save_send" onclick="validateForm(this,'myForm')"
                                                        class="theme_btn btn-primary btn"><i
                                                            class="bi-arrow-up-right"></i> Save and Send</button>
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



@endsection
@push('push_script')
    <script>
        var isValid = true;

        function validateForm(that, formId) {
            buttonLoading(that);
            $('.select2-selection').removeClass('invalid-select');
            $(".custom_error").remove();
            $(`#${formId} [required]`).each(function() {
                $(this).closest('.dropify-wrapper').removeClass('invalid-select');
                if ($(this).is(':file') && !$(this)[0].files.length) {
                    isValid = false;
                    $(this).closest('.dropify-wrapper').addClass('invalid-select');
                    $(this).closest('.dropify-wrapper').after(
                        '<span class="custom_error text-danger">This field is required.</span>');

                    $(this).focus();
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                } else if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() ==
                        0))) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                    if ($(this).is('select')) {
                        $(this).next('.select2-container').find('.select2-selection').addClass('invalid-select');
                        $(this).next('span').after(
                            '<span class="custom_error text-danger">This field is required.</span>');
                    } else {
                        $(this).after('<span class="custom_error text-danger">This field is required.</span>');
                        $(this).next('.select2-container').find('.select2-selection').removeClass('invalid-select');
                    }
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');

                    // $(this).css('invalid-select');
                    $(this).focus();
                } else {
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                    $(this).focus();
                    $(this).removeClass('is-invalid');
                }
            });
            // Additional validation for email
            let emailInput = $(`#${formId} [type="email"]`);
            let emailValue = emailInput.val();
            if (emailValue && !isValidEmail(emailValue)) {
                isValid = false;
                emailInput.addClass('is-invalid');
                emailInput.focus();
                // Add error message span
                emailInput.after('<span class="custom_error text-danger">Invalid email format.</span>');
            }
            $(`#${formId} .phoneValid`).each(function() {
                let phoneInput = $(this);
                let phoneValue = $(this).val().trim();
                if (phoneValue && !isValidPhoneNumber(phoneValue)) {
                    isValid = false;
                    phoneInput.addClass('is-invalid');
                    phoneInput.focus();
                    phoneInput.after('<span class="custom_error text-danger">Invalid phone number format.</span>');
                }
            })

            // Additional validation for password and password confirmation matching
            let passwordInput = $(`#${formId} [name="password"]`);
            let confirmPasswordInput = $(`#${formId} [name="password_confirmation"]`);
            let passwordValue = passwordInput.val();
            let confirmPasswordValue = confirmPasswordInput.val();
            if (passwordValue !== confirmPasswordValue) {
                isValid = false;
                passwordInput.addClass('is-invalid');
                confirmPasswordInput.addClass('is-invalid');
                $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                passwordInput.focus();
                // Add error message span
                passwordInput.after('<span class="custom_error text-danger">Passwords do not match.</span>');
            }

            $(`#${formId} [minlength], #${formId} [maxlength], #${formId} [min], #${formId} [max]`).each(function() {
                let minLength = parseInt($(this).attr('minlength'));
                let maxLength = parseInt($(this).attr('maxlength'));
                let minValue = parseInt($(this).attr('min'));
                let maxValue = parseInt($(this).attr('max'));
                let inputValue = $(this).val().trim(); // Trim whitespace from input value

                if (inputValue !== '') { // Check if input value is not blank
                    if (minLength && inputValue.length < minLength) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Minimum length is ${minLength} characters.</span>`
                        );
                    }

                    if (maxLength && inputValue.length > maxLength) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Maximum length is ${maxLength} characters.</span>`
                        );
                    }

                    if (!isNaN(minValue) && parseInt(inputValue) < minValue) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Minimum value is ${minValue}.</span>`);
                    }

                    if (!isNaN(maxValue) && parseInt(inputValue) > maxValue) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Maximum value is ${maxValue}.</span>`);
                    }
                }
            });




            if (isValid) {
                var statusValue = '';
                if ($(that).attr('id') === 'save') {
                    statusValue = 'Created';
                } else if ($(that).attr('id') === 'save_send') {
                    statusValue = 'Saved and Send';
                }
                $('#status').val(statusValue);
                $(`#${formId}`).submit();
            }
            isValid = true;
        }

        function isValidEmail(email) {
            // Regular expression for validating email format
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        function isValidPhoneNumber(phone) {
            var regex = /^[0-9()\-\s+]+$/; // Allow digits, parentheses, hyphens, and spaces
            return regex.test(phone);
        }
    </script>
@endpush
