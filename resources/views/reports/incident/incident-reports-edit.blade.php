@extends('layouts.main')
@section('app-title', 'Incident-report-edit - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Incident Reports</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Compliance</li>
                            <li class="breadcrumb-item active"> Edit Incident Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <form action="{{ route('incident.update', ['id' => $incident->id]) }}" method="post"
                enctype="multipart/form-data" id="myForm">
                @csrf
                <input type="hidden" id="status" name="status" value="">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="main_bx_dt__">
                                <div class="top_dt_sec p-0">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creator Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="creater_name" aria-describedby="emailHelp"
                                                    value="{{ old('creater_name', $incident->creater_name) }}"
                                                    placeholder="" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creator Phone</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    name="creater_phone" aria-describedby="emailHelp"
                                                    value="{{ old('creater_phone', $incident->creater_phone) }}"
                                                    placeholder="" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Creation Date</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp"
                                                    value="{{ old('created_at', $incident->created_at) }}" placeholder="" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Status</label>
                                                <select data-plugin="customselect" class="form-select" name="status" disabled>
                                                    {{-- <option >Select the Creator</option> --}}
                                                    {{-- <option value="Created">Created</option>
                                        <option value="Saved and Send">Saved and Send </option>
                                        <option value="Closed">Closed </option>
                                        <option value="Solved">Solved </option>
                                        <option value="Re-Opened">Re-Opened </option>
                                    </select>     --}}
                                                    <option value="Created"
                                                        {{ $incident->status == 'Created' ? 'selected' : '' }}>Created
                                                    </option>
                                                    <option value="Saved and Send"
                                                        {{ $incident->status == 'Saved and Send' ? 'selected' : '' }}>
                                                        Saved and Send</option>
                                                    <option value="Closed"
                                                        {{ $incident->status == 'Closed' ? 'selected' : '' }}>Closed
                                                    </option>
                                                    <option value="Solved"
                                                        {{ $incident->status == 'Solved' ? 'selected' : '' }}>Solved
                                                    </option>
                                                    <option value="Re-Opened"
                                                        {{ $incident->status == 'Re-Opened' ? 'selected' : '' }}>Re-Opened
                                                    </option>
                                                </select>
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
                                                                    {{-- <option value="AT_WORK">At Work</option>
                                                    <option value="DURING_BREAK">During Break</option>
                                                    <option value="TRAVELLING_WORK">Travelling to/from Work</option>
                                                    </select> --}}
                                                                    <option value="AT_WORK"
                                                                        {{ ($incident->place_of_incident ?? old('place_of_incident')) === 'AT_WORK' ? 'selected' : '' }}>
                                                                        At Work</option>
                                                                    <option value="DURING_BREAK"
                                                                        {{ ($incident->place_of_incident ?? old('place_of_incident')) === 'DURING_BREAK' ? 'selected' : '' }}>
                                                                        During Break</option>
                                                                    <option value="TRAVELLING_WORK"
                                                                        {{ ($incident->place_of_incident ?? old('place_of_incident')) === 'TRAVELLING_WORK' ? 'selected' : '' }}>
                                                                        Travelling to/from Work</option>
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
                                                                <input type="text" class="form-control basic-datepicker"
                                                                    id=""
                                                                    value="{{ old('incident_date', $incident->incident_date) }}"
                                                                    name="incident_date" required aria-describedby="emailHelp"
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
                                                                <input type="text"
                                                                    class="form-control basic-timepicker" id=""
                                                                    value="{{ old('incident_time', $incident->incident_time) }}"
                                                                    name="incident_time" aria-describedby="emailHelp"
                                                                    placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label for="">Witness Check</label>
                                                            <div class="row mt-2">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <div class="checkbox checkbox-success">
                                                                            <input id="checkbox6a" type="checkbox"
                                                                                value="1" name="is_witness_check"
                                                                                {{ $incident->is_witness_check ? 'checked' : '' }}>
                                                                            {{-- <input id="checkbox6a" type="checkbox" name="is_witness_check" > --}}
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
                                                                    value="{{ old('witness_name', $incident->witness_name) }}"
                                                                    aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exampleInputEmail1">Witness
                                                                    Phone</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputEmail1" name="witness_phone"
                                                                    value="{{ old('witness_phone', $incident->witness_phone) }}"
                                                                    aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <label class="form-label" for="exampleInputEmail1">Witness
                                                                    Document Number</label>
                                                                <input type="text" class="form-control"
                                                                    id="exampleInputEmail1" name="witness_doc_number"
                                                                    value="{{ old('witness_doc_number', $incident->witness_doc_number) }}"
                                                                    aria-describedby="emailHelp" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3 mt-3 mt-sm-0">
                                                                <label class="form-label">Client - Portfolio - Site
                                                                </label>
                                                                <select data-plugin="customselect" class="form-select"
                                                                    readonly name="client_id">
                                                                    <option value="0">Please select one or start
                                                                        typing</option>
                                                                    @if ($allprotfolio)
                                                                        @foreach ($allprotfolio as $aprotf)
                                                                            <option
                                                                                {{ $aprotf->id == $incident->client_id ? 'selected' : '' }}
                                                                                value="{{ $aprotf->id }}">
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
                                                                    value="{{ old('incident_address', $incident->incident_address) }}"
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
                                                                value="{{ $driver_vehicle_data['driver_name'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Driver's
                                                                Licence</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="driver_licence"
                                                                value="{{ $driver_vehicle_data['driver_licence'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">First
                                                                Vehicle Rego</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="first_vehicle_rego"
                                                                value="{{ $driver_vehicle_data['first_vehicle_rego'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Second
                                                                Driver's Name</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="second_driver_name"
                                                                value="{{ $driver_vehicle_data['second_driver_name'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Second
                                                                Driver's Licence</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="second_driver_licence"
                                                                value="{{ $driver_vehicle_data['second_driver_licence'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Second
                                                                Vehicle Rego</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="second_vehicle_rego"
                                                                value="{{ $driver_vehicle_data['second_vehicle_rego'] ?? '' }}"
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
                                                                    <input id="checkbox6a" value="1" type="checkbox"
                                                                        {{ isset($injury_person_data['is_injury_person_check']) && $injury_person_data['is_injury_person_check'] == '1' ? 'checked' : '' }}
                                                                        name="is_injury_person_check">
                                                                    {{-- <input id="checkbox6a" type="checkbox" name="is_injury_person_check" {{ $injury_person_data->is_injury_person_check ? 'checked' : '' }}> --}}

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
                                                                value="{{ $injury_person_data['injured_person_name'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Injured
                                                                Person Phone</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="injured_person_phone"
                                                                value="{{ $injury_person_data['injured_person_phone'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Injured
                                                                Person Document Number</label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" name="injured_person_document"
                                                                value="{{ $injury_person_data['injured_person_document'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 mt-3 mt-sm-0">
                                                            <label class="form-label">Medical Treatment Provided</label>
                                                            <select data-plugin="customselect" class="form-select" name="medical_treatment">
                                                                <option disabled @if($injury_person_data['medical_treatment'] == 'N_A' || $injury_person_data['medical_treatment'] == '') selected @endif>Please select one or start typing</option>
                                                                <option {{ $injury_person_data['medical_treatment'] == 'NO_TREATMENT' ? 'selected' : '' }} value="NO_TREATMENT">No Treatment</option>
                                                                <option {{ $injury_person_data['medical_treatment'] == 'FIRST_AID' ? 'selected' : '' }} value="FIRST_AID">First Aid</option>
                                                                <option {{ $injury_person_data['medical_treatment'] == 'MEDICAL_TREATMENT' ? 'selected' : '' }} value="MEDICAL_TREATMENT">Medical Treatment</option>
                                                                <option {{ $injury_person_data['medical_treatment'] == 'HOSPITALISED' ? 'selected' : '' }} value="HOSPITALISED">Hospitalised</option>
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
                                                                            class="form-check-input" value="1"
                                                                            {{ isset($injury_person_data['person_stop_work']) && $injury_person_data['person_stop_work'] == '1' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="customRadio1">Yes</label>
                                                                    </div>
                                                                    <div class="form-check  mb-1">
                                                                        <input type="radio" id="customRadio1"
                                                                            name="person_stop_work"
                                                                            class="form-check-input" value="0"
                                                                            {{ isset($injury_person_data['person_stop_work']) && $injury_person_data['person_stop_work'] == '0' ? 'checked' : '' }}>
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
                                                                        <input type="radio" value="1"
                                                                            id="customRadio2" name="person_returned_work"
                                                                            class="form-check-input"
                                                                            {{ isset($injury_person_data['person_returned_work']) && $injury_person_data['person_returned_work'] == '1' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="customRadio2">Yes</label>
                                                                    </div>
                                                                    <div class="form-check  mb-1">
                                                                        <input type="radio" value="0"
                                                                            id="customRadio3" name="person_returned_work"
                                                                            class="form-check-input"
                                                                            {{ isset($injury_person_data['person_returned_work']) && $injury_person_data['person_returned_work'] == '0' ? 'checked' : '' }}>
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
                                                                        <input type="radio" value="1"
                                                                            id="customRadio3"
                                                                            name="person_medical_certificated"
                                                                            class="form-check-input"
                                                                            {{ isset($injury_person_data['person_medical_certificated']) && $injury_person_data['person_medical_certificated'] == '1' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="customRadio3">Yes</label>
                                                                    </div>
                                                                    <div class="form-check  mb-1">
                                                                        <input type="radio" value="0"
                                                                            id="customRadio4"
                                                                            name="person_medical_certificated"
                                                                            class="form-check-input"
                                                                            {{ isset($injury_person_data['person_medical_certificated']) && $injury_person_data['person_medical_certificated'] == '0' ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="customRadio4">No</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Date Work
                                                                Ceased</label>
                                                            <input type="text" class="form-control basic-datepicker"
                                                                id="#basic-" name="date_work_ceased"
                                                                value="{{ $injury_person_data['date_work_ceased'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="exampleInputEmail1">Time Work
                                                                Ceased</label>
                                                            <input type="text" class="form-control basic-timepicker"
                                                                id="" name="time_work_ceased"
                                                                value="{{ $injury_person_data['time_work_ceased'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Cause of Injury</label>
                                                            <textarea class="form-control" name="injury_cause"> {{ $injury_person_data['injury_cause'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Location of Injury</label>
                                                            <textarea class="form-control" name="injury_location">{{ $injury_person_data['injury_location'] ?? '' }}</textarea>
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
                                                                @foreach ($incidentdocument as $incident)
                                                                    @foreach ($incident->incidentDocs as $doc)
                                                                        @if ($doc->doc_type == 'injury')
                                                                            <tr
                                                                                id="injury{{ $doc->id }}{{ time() }}">
                                                                                <td><a href="{{ url(env('STORE_PATH') . $doc->doc_file) }}"
                                                                                        target="_blank">View File</a></td>
                                                                                <td>
                                                                                    <button type="button"
                                                                                        onclick="deleteRecordTbl('{{ $doc->id }}','IncidentDocu','injury{{ $doc->id }}{{ time() }}')"
                                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                        <i class="uil-trash"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach

                                                                {{-- <tr>
                                            @foreach ($incidentdocument as $incident)
                                                    @foreach ($incident->incidentDocs as $doc)
                                                        @if ($doc->doc_type == 'injury')

                                                        <td><a href="{{ url(env('STORE_PATH') .$doc->doc_file)}}" target="_blank">View File</a></td>
                                                        <td>
                                                            <button type="button" onclick="deleteRecordTbl('{{$doc->id}}','IncidentDocu')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                <i class="uil-trash"></i>
                                                            </button>
                                                        </td>
                                                        @endif
                                                    @endforeach
                                            @endforeach
                                        </tr> --}}

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
                                                                value="{{ $environmental_data['category_environmental_incident'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="#">Has the cause been isolated or
                                                            eliminated?</label>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-2 mb-1">
                                                                <input type="radio" value="1" id="customRadio3"
                                                                    name="cause_been_isolated_eliminated"
                                                                    class="form-check-input"
                                                                    {{ isset($environmental_data['cause_been_isolated_eliminated']) && $environmental_data['cause_been_isolated_eliminated'] == '1' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="customRadio3">Yes</label>
                                                            </div>
                                                            <div class="form-check  mb-1">
                                                                <input type="radio" value="1" id="customRadio4"
                                                                    name="cause_been_isolated_eliminated"
                                                                    class="form-check-input"
                                                                    {{ isset($environmental_data['cause_been_isolated_eliminated']) && $environmental_data['cause_been_isolated_eliminated'] == '0' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="customRadio4">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12 mt-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">What action has taken to eliminate
                                                                the impact? </label>
                                                            <textarea class="form-control" name="action_eliminate_impact">{{ $environmental_data['action_eliminate_impact'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <label for="#">Is further action required?</label>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-2 mb-1">
                                                                <input type="radio" value="1" id="customRadio8"
                                                                    name="further_action_required"
                                                                    class="form-check-input"
                                                                    {{ isset($environmental_data['further_action_required']) && $environmental_data['further_action_required'] == '1' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="customRadio8">Yes</label>
                                                            </div>
                                                            <div class="form-check  mb-1">
                                                                <input type="radio" value="0" id="customRadio9"
                                                                    name="further_action_required"
                                                                    class="form-check-input"
                                                                    {{ isset($environmental_data['further_action_required']) && $environmental_data['further_action_required'] == '0' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="customRadio9">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">If yes, what further action is
                                                                required? </label>
                                                            <textarea class="form-control" name="action_is_required">{{ $environmental_data['action_is_required'] ?? '' }}</textarea>
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
                                                                @foreach ($incidentdocument as $incident)
                                                                    @foreach ($incident->incidentDocs as $doc)
                                                                        @if ($doc->doc_type == 'environmental')
                                                                            <tr
                                                                                id="environmental{{ $doc->id }}{{ time() }}">
                                                                                <td><a href="{{ url(env('STORE_PATH') . $doc->doc_file) }}"
                                                                                        target="_blank">View File</a></td>
                                                                                <td>
                                                                                    <button type="button"
                                                                                        onclick="deleteRecordTbl('{{ $doc->id }}','IncidentDocu','environmental{{ $doc->id }}{{ time() }}')"
                                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
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
                                                        <input class="form-check-input" type="checkbox" value="" id="agree_terms" {{$incident->ncr_required ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="agree_terms">
                                                            I agree to the terms and conditions
                                                        </label>
                                                    </div>
                                                    </div>
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
                                                                value="{{ $other_details['category_other_incident'] ?? '' }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mt-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">Provide other information if
                                                                needed</label>
                                                            <textarea class="form-control" name="provide_other_info"> {{ $other_details['provide_other_info'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="#">Has the cause been isolated or
                                                            eliminated?</label>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-2 mb-1">
                                                                <input type="radio" value="1" id="customRadio3"
                                                                    name="cause_isolated_elimnated"
                                                                    class="form-check-input"
                                                                    {{ isset($other_details['cause_isolated_elimnated']) && $other_details['cause_isolated_elimnated'] == '1' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="customRadio3">Yes</label>
                                                            </div>
                                                            <div class="form-check  mb-1">
                                                                <input type="radio" value="0" id="customRadio4"
                                                                    name="cause_isolated_elimnated"
                                                                    class="form-check-input"
                                                                    {{ isset($other_details['cause_isolated_elimnated']) && $other_details['cause_isolated_elimnated'] == '0' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="customRadio4">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12 mt-2">
                                                        <div class="mb-3">
                                                            <label class="form-label">What action has taken to eliminate
                                                                the impact?</label>
                                                            <textarea class="form-control" name="action_taken_eliminate_impact"> {{ $other_details['action_taken_eliminate_impact'] ?? '' }} </textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <label for="#">Is further action required?</label>
                                                        <div class="d-flex mt-2">
                                                            <div class="form-check me-2 mb-1">
                                                                <input type="radio" value="1" id="customRadio8"
                                                                    name="is_further_action_required"
                                                                    class="form-check-input"
                                                                    {{ isset($other_details['is_further_action_required']) && $other_details['is_further_action_required'] == '1' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="customRadio8">Yes</label>
                                                            </div>
                                                            <div class="form-check  mb-1">
                                                                <input type="radio" value="0" id="customRadio9"
                                                                    name="is_further_action_required"
                                                                    class="form-check-input"
                                                                    {{ isset($other_details['is_further_action_required']) && $other_details['is_further_action_required'] == '0' ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="customRadio9">No</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">If yes, what further action is
                                                                required? </label>
                                                            <textarea class="form-control" name="further_action_required"> {{ $other_details['further_action_required'] ?? '' }} </textarea>
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
                                                                @foreach ($incidentdocument as $incident)
                                                                    @foreach ($incident->incidentDocs as $doc)
                                                                        @if ($doc->doc_type == 'other_file')
                                                                            <tr
                                                                                id="other_file{{ $doc->id }}{{ time() }}">
                                                                                <td><a href="{{ url(env('STORE_PATH') . $doc->doc_file) }}"
                                                                                        target="_blank">View File</a></td>
                                                                                <td>
                                                                                    <button type="button"
                                                                                        onclick="deleteRecordTbl('{{ $doc->id }}','IncidentDocu','other_file{{ $doc->id }}{{ time() }}')"
                                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
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

                                                    <div class="col-lg-12">
                                                        <div class="form-check">
                                                            <input type="checkbox" value="1"
                                                                class="form-check-input" id="customCheck2"
                                                                {{ isset($other_details['i_confirm_all']) && $other_details['i_confirm_all'] == 0 ? 'checked' : '' }}
                                                                name="i_confirm_all">
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
                                                    <a href="{{route('incident.index')}}" class="btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                                    @if($incident->ncr_required == 'yes')
                                                        <a href="{{route('ncr.add', encrypt(request()->id))}}" class="btn btn-primary pl-2">+ Create New Non-Conformance</a>
                                                    @endif
                                                    @if($incident->ncr_required == 'yes')
                                                        <button type="button" class="theme_btn btn-warning btn"><i class="bi-arrow-up-right"></i> Send Final Report</button>
                                                        <button type="button" class="btn btn-danger">Export PDF</button>
                                                    @else
                                                        @can('incident-report-solve')
                                                            <button type="button" id="solved" onclick="validateForm(this,'myForm')" class="btn btn-primary">Solve</button>
                                                        @endcan
                                                        @can('incident-report-reopen')
                                                            <button type="button" id="created" onclick="validateForm(this,'myForm')" class="theme_btn btn-warning btn"><i class="bi-arrow-up-right"></i> Re-Open Incident</button>
                                                        @endcan
                                                    @endif
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
        function deleteTabletr(tabletr, filenumber = 'none', permission = false) {
            if (permission) {
                swal({
                        title: "Are you sure?",
                        text: "Do you want to Delete!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, Delete it!",
                        cancelButtonText: "No, Cancel It",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $(`#${tabletr}`).remove();
                            if (filenumber != 'none') {
                                $(`#documentFilesDocsDiv${filenumber}`).remove();
                            }
                            swal({
                                type: 'success',
                                title: 'Deleted!',
                                text: 'Deleted',
                                timer: 3000
                            });
                        } else {
                            swal("Cancelled", "Data safe :)", "error");
                        }
                    });
            } else {
                $(`#${tabletr}`).remove();
                if (filenumber != 'none') {
                    $(`#documentFilesDocsDiv${filenumber}`).remove();
                }
                swal({
                    type: 'success',
                    title: 'Deleted!',
                    text: 'Deleted',
                    timer: 3000
                });
            }
        }
        //   $.ajaxSetup({
        //             headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
        //             }
        //         });

        function deleteRecordTbl(docId, table_name, divname) {
            // alert(docId);exit();
            swal({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {

                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('common.delete-record') }}",
                            data: {
                                "data_id": docId,
                                "table_name": table_name,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result.status) {
                                    swal({
                                        type: 'success',
                                        title: 'Deleted!',
                                        text: 'Deleted',
                                        timer: 3000
                                    });
                                    deleteTabletr(divname);
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Something went wrong',
                                        timer: 3000
                                    })
                                }
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal("Cancelled", "Data safe :)", "error");
                    }
                });
        }


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
                if ($(that).attr('id') === 'solved') {
                    statusValue = 'Solved';
                } else if ($(that).attr('id') === 'created') {
                    statusValue = 'Created';
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

    <script>
        // Enable/disable "Re-Open Incident" button based on checkbox state
        $(document).ready(function() {
            if ($('#agree_terms').is(':checked')) 
            {
                $('#solved').prop('disabled',  false);
                $('#created').prop('disabled', false);
            }else{
                $('#solved').prop('disabled',  true);
                $('#created').prop('disabled', true);
            }
            $('#agree_terms').on('change', function() {
                if ($(this).is(':checked')) 
                {
                    $('#solved').prop('disabled', !this.checked);
                    $('#created').prop('disabled', !this.checked);
                }else{
                    $('#solved').prop('disabled',  true);
                    $('#created').prop('disabled', true);
                }
            });
        });
    </script>

@endsection