@extends('layouts.main')
@section('app-title', 'Add Site - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Site</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Add Site</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card show_portfolio_tab">
                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" id="homeTab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if (!$errors->has('tab_name')) active @elseif($errors->first('tab_name') == 'basic_info') active @endif">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" id="profileTab" data-bs-toggle="tab" aria-expanded="true"
                                    class="nav-link @if ($errors->first('tab_name') == 'shift') active @endif">
                                    <span><i class="uil-clock-eight"></i></span>
                                    <span>Shift</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#messages" id="messagesTab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'shift_receivable') active @endif">
                                    <span><i class="uil-clock-eight"></i></span>
                                    <span>Shift Receivable</span>
                                </a>
                            </li>
                            @can('site-add-comments')
                                <li class="nav-item">
                                    <a href="#comments" id="commentsTab" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'comments') active @endif">
                                        <span><i class="uil-comment-alt"></i></span>
                                        <span>Comments</span>
                                    </a>
                                </li>
                            @endcan

                            @can('budget-view')
                                {{-- <li class="nav-item">
                            <a href="#monetization" id="monetizationTab" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link @if ($errors->first('tab_name') == 'monetization') active @endif">
                                <span><i class="bi-currency-dollar"></i></span>
                                <span>Monetization</span>
                            </a>
                        </li> --}}
                            @endcan
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('client.site.store') }}" id="myForm" method="post">
                            @csrf
                            <div class="tab-content  text-muted">
                                <div class="tab-pane @if (!$errors->has('tab_name')) show active @elseif($errors->first('tab_name') == 'basic_info') show active @endif"
                                    id="home">

                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Client <span class="red">* <small
                                                                    hidden
                                                                    class="required_error">#Required</small></span></label>
                                                        <select required data-plugin="customselect" name="client_id"
                                                            id="client_idselect" class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($clients)
                                                                @foreach ($clients as $clnt)
                                                                    <option value="{{ $clnt->id }}">
                                                                        {{ $clnt->business_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Portfolio <span class="red">* <small
                                                                    hidden
                                                                    class="required_error">#Required</small></span></label>
                                                        <select required name="portfolio_id" data-plugin="customselect"
                                                            id="portfolio_idselect" class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($client_portfolios)
                                                                @foreach ($client_portfolios as $portfolio)
                                                                    <option value="{{ $portfolio->id }}">
                                                                        {{ $portfolio->full_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Type of the site <span class="red">*
                                                                <small hidden
                                                                    class="required_error">#Required</small></span></label>
                                                        <select required name="site_type" data-plugin="customselect"
                                                            class="form-select">
                                                            <option value="ATM">ATM</option>
                                                            <option value="BANK">Bank</option>
                                                            <option value="CAR_PARK">Car Park</option>
                                                            <option value="CLINIC">Clinic</option>
                                                            <option value="GYM">GYM</option>
                                                            <option value="HOSPITAL">Hospital</option>
                                                            <option value="HOUSE">House</option>
                                                            <option value="OFFICE">Office</option>
                                                            <option value="PETROL_STATION">Petrol Station</option>
                                                            <option value="SCHOOL">School</option>
                                                            <option value="SHOPPING">Shopping</option>
                                                            <option value="STUDENT_ACCOMMODATION">Student Accommodation
                                                            </option>
                                                            <option value="UNIVERSITY">University</option>
                                                            <option value="WAREHOUSE">Warehouse</option>
                                                            <option value="GOVERNMENT">Government</option>
                                                            <option value="STORE">Store</option>
                                                            <option value="RESTAURANT">Restaurant</option>
                                                            <option value="TOILET_BLOCK">Toilet Block</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Reference /
                                                            Building
                                                            <span class="red">*</span></label>
                                                        <input required type="text" name="reference_building"
                                                            class="form-control" oninput="checkUniqueData(this,'reference')" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Contractor </label>
                                                        <select data-plugin="customselect" name="contractor_id"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($contractors)
                                                                @foreach ($contractors as $contractor)
                                                                    <option value="{{ $contractor->id }}">
                                                                        {{ $contractor->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Unit</label>
                                                        <input type="text" class="form-control" name="unit"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Address Number
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="address_number" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1"> Street Address
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="street_address" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1"> Suburb <span
                                                                class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="suburb" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">City </label>
                                                        <select data-plugin="customselect" name="city_id"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($cities)
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id }}">
                                                                        {{ $city->city_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">State <span class="red">* <small
                                                                    hidden
                                                                    class="required_error">#Required</small></span></label>
                                                        <select required data-plugin="customselect" name="state_id"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($states)
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->id }}">
                                                                        {{ $state->state_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1"> Zip Code <span
                                                                class="red">*</span></label>
                                                        <input required type="text" class="form-control"
                                                            name="zipcode" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Site Supervisor</label>
                                                        <select name="supervisor_id" data-plugin="customselect"
                                                            class="form-select">
                                                            @if ($supervisors)
                                                                @foreach ($supervisors as $supervisor)
                                                                    <option value="{{ $supervisor->id }}">
                                                                        {{ $supervisor->name }}
                                                                        {{ $supervisor->surname ?? '' }}
                                                                        ({{ $supervisor->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Latitude <span
                                                                class="red">*</span></label>
                                                        <input type="text" required name="latitude"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Longitude <span
                                                                class="red">*</span></label>
                                                        <input type="text" required name="longitude"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Distance
                                                            Allowed On GPS(Meter) <span class="red">*</span></label>
                                                        <input type="number" required class="form-control"
                                                            name="distance_allowed_gps" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Variation
                                                            Allowed Minutes</label>
                                                        <input type="number" class="form-control"
                                                            id="exampleInputEmail1" name="variation_allowed_min"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="checkbox7a" name="is_regular_site"
                                                                        value="1" type="checkbox">
                                                                    <label class="form-label" for="checkbox7a">
                                                                        Check if it is a Regular Site
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="checkbox7b" name="is_overnight_shift"
                                                                        type="checkbox" value="1">
                                                                    <label class="form-label" for="checkbox7b">
                                                                        Check if this site have a OVERNIGHT SHIFT
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="checkbox7c" name="in_missed_clean"
                                                                        type="checkbox" value="1">
                                                                    <label class="form-label" for="checkbox7c">
                                                                        Show in missed clean
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="checkbox7d" name="is_high_risk"
                                                                        type="checkbox" value="1">
                                                                    <label class="form-label" for="checkbox7d">
                                                                        Check if this site have a HIGH RISK
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Notes</label>
                                                        <textarea name="notes" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Scope of Work</label>
                                                        <textarea name="scope_of_work" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Contact Type</label>
                                                        <select data-plugin="customselect" id="contact_type"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            <option value="manager">Manager</option>
                                                            <option value="accounts">Accounts</option>
                                                            <option value="supervisor">Supervisor</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Contact </label>
                                                        <select data-plugin="customselect" id="user_value"
                                                            class="form-select contact">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($alluser)
                                                                @foreach ($alluser as $user)
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->name }} {{ $user->surname ?? '' }}
                                                                        ({{ $user->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="add_address text-end">
                                                        <button type="button" id="add_contact_btn"
                                                            class="theme_btn btn add_btn ">+ Add Contact</button>
                                                        <button type="button" class="theme_btn btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#create_contact_modal">+ Create
                                                            contact</button>
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
                                                        <tbody class="user_data" id="user_data">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- main_bx_dt -->
                                </div>
                                @php
                                    $newcleaners = $cleaners->keyBy('id');
                                    $newalluser = $alluser->keyBy('id');
                                @endphp
                                <div class="tab-pane @if ($errors->first('tab_name') == 'shift') show active @endif"
                                    id="profile">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row" id="cleanerDivValidation">
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Cleaner <span class="red">*
                                                            </span></label>
                                                        <select data-plugin="customselect" id="shiftCleaner"
                                                            class="form-select required_fields">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($cleaners)
                                                                @foreach ($cleaners as $cleaner)
                                                                    <option value="{{ $cleaner->id }}">
                                                                        {{ $cleaner->name }} ({{ $cleaner->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <span hidden id="shiftCleanerError" class="text-danger">This Field
                                                            Is Required.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Type <span class="red">* <small
                                                                    hidden
                                                                    class="required_error">#Required</small></span></label>
                                                        <select data-plugin="customselect" id="shiftType"
                                                            class="form-select required_fields">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            <option value="Primary">Primary</option>
                                                            <option value="Secondary">Secondary</option>
                                                            <option value="Team">Team</option>
                                                            <option value="Backup">Backup</option>
                                                            <option value="Relief">Relief</option>
                                                        </select>
                                                        <span hidden id="shiftTypeError" class="text-danger">This Field Is
                                                            Required.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="shifthourlyRate">Hourly Rate
                                                        </label>
                                                        <input type="number" step="any" min="0"
                                                            class="form-control" id="shifthourlyRate"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="shiftavaliableStartTime">Avaliable Start Time <span class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields basic-timepicker" id="shiftavaliableStartTime" aria-describedby="emailHelp" placeholder="">
                                                        <span hidden id="shiftavaliableStartTimeError" class="text-danger">This Field Is Required.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="shiftavaliableEndTime">Avaliable
                                                            End Time <span class="red">*</span></label>
                                                        <input type="text" class="form-control basic-timepicker required_fields"
                                                            id="shiftavaliableEndTime" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span hidden id="shiftavaliableEndTimeError"
                                                            class="text-danger">This Field Is Required.</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="shifttotalHours">Total Hours <span
                                                                class="red">*</span></label>
                                                        <input type="number" min="0"
                                                            class="form-control required_fields" id="shifttotalHours"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        <span hidden id="shifttotalHoursError" class="text-danger">This
                                                            Field Is Required.</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <label for="">Frequency</label>
                                                    <div class="row mt-2">
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftEveryday" type="checkbox">
                                                                    <label class="form-label" for="shiftEveryday">
                                                                        Everyday
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftWeekdays" type="checkbox">
                                                                    <label class="form-label" for="shiftWeekdays">
                                                                        Weekdays
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftWeekends" type="checkbox">
                                                                    <label class="form-label" for="shiftWeekends">
                                                                        Weekends
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="">Days</label>
                                                    <div class="row mt-2">

                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftMonday" type="checkbox">
                                                                    <label class="form-label" for="shiftMonday">
                                                                        Monday
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftTuesday" type="checkbox">
                                                                    <label class="form-label" for="shiftTuesday">
                                                                        Tuesday
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftWednesday" type="checkbox">
                                                                    <label class="form-label" for="shiftWednesday">
                                                                        Wednesday
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftThursday" type="checkbox">
                                                                    <label class="form-label" for="shiftThursday">
                                                                        Thursday
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftFriday" type="checkbox">
                                                                    <label class="form-label" for="shiftFriday">
                                                                        Friday
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftSaturday" type="checkbox">
                                                                    <label class="form-label" for="shiftSaturday">
                                                                        Saturday
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="shiftSunday" type="checkbox">
                                                                    <label class="form-label" for="shiftSunday">
                                                                        Sunday
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="add_address text-end">
                                                        <button type="button" onclick="addNewShift()"
                                                            class="theme_btn btn add_btn ">+ Add Shift</button>
                                                        <button type="button" onclick="resetShift()"
                                                            class="theme_btn btn btn-primary"><i
                                                                class="bi-arrow-repeat"></i> Reset</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 ">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Avaliable Start Time</th>
                                                                <th>Avaliable End Time</th>
                                                                <th>Total Hours</th>
                                                                <th>Cleaner</th>
                                                                <th>Type</th>
                                                                <th>Hourly Rate</th>
                                                                <th>Frequency</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="shift_add_tr">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane @if ($errors->first('tab_name') == 'shift_receivable') show active @endif"
                                    id="messages">
                                    <div class="sites_main">
                                        <div class="row" id="cleanerReceivableDivValidation">

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="avaliableStartTime">Avaliable Start
                                                        Date <span class="red">* </span></label>
                                                    <input type="text" class="form-control required_fields datetime-dateonly"
                                                        id="avaliableStartTime" aria-describedby="emailHelp"
                                                        placeholder="">
                                                    <span hidden id="avaliableStartTimeError" class="text-danger">This
                                                        Field Is Required.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="avaliableEndTime">Avaliable End Date
                                                        <span class="red">* </span></label>
                                                    <input type="text" class="form-control required_fields datetime-dateonly"
                                                        id="avaliableEndTime" aria-describedby="emailHelp"
                                                        placeholder="">
                                                    <span hidden id="avaliableEndTimeError" class="text-danger">This Field
                                                        Is Required.</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="totalHours">Total Hours <span
                                                            class="red">* </span></label>
                                                    <input type="number" class="form-control required_fields" id="totalHours"
                                                        aria-describedby="emailHelp" min="0" placeholder="">
                                                    <span hidden id="totalHoursError" class="text-danger">This Field Is
                                                        Required.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="hourlyRateReceivable">Hourly Rate
                                                        Receivable</label>
                                                    <input type="number" min="0" class="form-control" id="hourlyRateReceivable"
                                                        aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="">Frequency</label>
                                                <div class="row mt-2">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputEveryday" type="checkbox">
                                                                <label class="form-label" for="inputEveryday">
                                                                    Everyday
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputWeekdays" type="checkbox">
                                                                <label class="form-label" for="inputWeekdays">
                                                                    Weekdays
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputWeekends" type="checkbox">
                                                                <label class="form-label" for="inputWeekends">
                                                                    Weekends
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="">Days</label>
                                                <div class="row mt-2">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputMonday" type="checkbox">
                                                                <label class="form-label" for="inputMonday">
                                                                    Monday
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputTuesday" type="checkbox">
                                                                <label class="form-label" for="inputTuesday">
                                                                    Tuesday
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputWednesday" type="checkbox">
                                                                <label class="form-label" for="inputWednesday">
                                                                    Wednesday
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputThursday" type="checkbox">
                                                                <label class="form-label" for="inputThursday">
                                                                    Thursday
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputFriday" type="checkbox">
                                                                <label class="form-label" for="inputFriday">
                                                                    Friday
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputSaturday" type="checkbox">
                                                                <label class="form-label" for="inputSaturday">
                                                                    Saturday
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="mb-3">
                                                            <div class="checkbox checkbox-success">
                                                                <input id="inputSunday" type="checkbox">
                                                                <label class="form-label" for="inputSunday">
                                                                    Sunday
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="add_address text-end">
                                                    <button type="button" onclick="addShiftReceivce()"
                                                        class="theme_btn btn add_btn " id="add_shift_receivable_btn">+ Add
                                                        Shift Receivable</button>
                                                    <button type="button" onclick="resetShiftReceivce()"
                                                        class="theme_btn btn btn-primary"><i class="bi-arrow-repeat"></i>
                                                        Reset</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12  mt-3">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Avaliable Start Time</th>
                                                                <th>Avaliable End Time</th>
                                                                <th>Total Hours</th>
                                                                <th>Hourly Rate Receivable</th>
                                                                <th>Yearly Sales</th>
                                                                <th>Monthly Sales</th>
                                                                <th>Fortnightly Sales</th>
                                                                <th>Gross Margin Month</th>
                                                                <th>Gross Margin Month %</th>
                                                                <th>Frequency</th>
                                                                <th>Days</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_shift_receivce_tr">


                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @can('site-add-comments')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'comments') show active @endif"
                                        id="comments">

                                        <div class="sites_main">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="#" class="theme_btn btn add_btn" data-bs-toggle="modal"
                                                        data-bs-target="#client_comment_modal">+ Add new comment</a>
                                                </div>
                                                <div class="col-lg-12 mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Date Comment</th>
                                                                <th>Person</th>
                                                                <th>Comment Type</th>
                                                                <th>Comment</th>
                                                                <th>Files</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_client_commenttr">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @endcan
                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    class="theme_btn btn save_btn"><i class="bi bi-save"></i>
                                                    Save</button>
                                                <a href="{{ route('client.site.index') }}"
                                                    class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container -->

    @can('site-add-comments')
        <!-- comment add popup -->
        <div class="modal fade" id="client_comment_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="saveComment" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="data_id" value="0" id="comment_data_id">
                        <input type="hidden" name="type" value="site">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Comment Type</label>
                                        <select required class="form-select js-example-basic-single2 " name="comment_type">
                                            <option value="0">Please select one or start typing</option>
                                            <option value="meeting">Meeting</option>
                                            <option value="site_closed">Site Closed</option>
                                            <option value="price_negotiation">Price Negotiation</option>
                                            <option value="general_communication">General Communication</option>
                                            <option value="contracts">Contracts</option>
                                            <option value="email">Email</option>
                                            <option value="phone_call">Phone Call</option>
                                            <option value="scope_change">Change of Scope</option>
                                            <option value="compliment">Compliment</option>
                                            <option value="clients_courtesy_call">Clients Courtesy Call</option>
                                            <option value="inspection">Inspection</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Comment <span class="red">*</span></label>
                                        <textarea required class="form-control" name="comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Upload File</label>
                                        <input name="file" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="validateForm(this,'saveComment')" class="btn btn-primary" id="saveComment_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="create_contact_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <form id="" method="POST"> </form> --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new Person as Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personName">Name <span class="red">*</span></label>
                                <input type="text" class="form-control" id="personName" aria-describedby="emailHelp"
                                    placeholder="">
                                <span class="text-danger" hidden id="personNameError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personSurname">Surname <span
                                        class="red">*</span></label>
                                <input type="text" class="form-control" id="personSurname"
                                    aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personSurnameError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personEmail">Email <span class="red">*</span></label>
                                <input type="text" class="form-control" id="personEmail" aria-describedby="emailHelp"
                                    placeholder="">
                                <span class="text-danger" hidden id="personEmailError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personPhoneNumber">Phone Number <span
                                        class="red">*</span></label>
                                <input type="text" class="form-control" id="personPhoneNumber"
                                    aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personPhoneNumberError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label" for="personContactType">Contact Type</label>
                                <select class="form-select js-example-basic-single" id="personContactType">
                                    <option value="Manager">Manager</option>
                                    <option value="Accounts">Accounts</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Site Manager">Site Manager</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="create_contant" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('push_script')
    <script>
        function calculateSalesMetrics(daysPerWeek, hoursPerDay, hourlyRate) {
            // Constants
            const weeksPerMonth = 4.34524; // Average weeks in a month
            const weeksPerYear = 52.1775; // Average weeks in a year

            // Calculations
            const monthlySales = daysPerWeek * hoursPerDay * weeksPerMonth * hourlyRate;
            const yearlySales = daysPerWeek * hoursPerDay * weeksPerYear * hourlyRate;
            const fortnightlySales = daysPerWeek * hoursPerDay * 2 * hourlyRate; // 2 weeks
            const grossMarginMonth = monthlySales - (daysPerWeek * hoursPerDay * weeksPerMonth * hourlyRate *
                0.1); // Assuming 10% margin
            const grossMarginMonthPercent = (grossMarginMonth / monthlySales) * 100;

            return {
                monthlySales: monthlySales,
                yearlySales: yearlySales,
                fortnightlySales: fortnightlySales,
                grossMarginMonth: grossMarginMonth,
                grossMarginMonthPercent: grossMarginMonthPercent,
            };
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        var newcleaners = @json($newcleaners);
        var newalluser = @json($newalluser);

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

        function resetContact() {
            $('#user_value').val('0').trigger('change');
            $('#contact_type').val('0').trigger('change');
        }

        $('#add_contact_btn').click(function() {
            var user_id = $('#user_value').val();
            var user_type = $('#contact_type').val();
            // if(!user_id || user_id != '0'){

            // }else if(!user_type || user_type != '0'){

            // }else{

            let contact_type = user_type.charAt(0).toUpperCase() + user_type.slice(1).toLowerCase();
            let microtime = Date.now();
            var rowHtml = `<tr id="contact${microtime}">
                <td>${newalluser[user_id]['name']||''}
                    <input type="hidden" name="user_id[]" value="${user_id}" />
                    <input type="hidden" name="contact_type[]" value="${user_type}" />
                </td>
                <td>${newalluser[user_id]['phone_number']||''}</td>
                <td>${newalluser[user_id]['email']||''}</td>
                <td>${contact_type}</td>
                <td> <button onclick="deleteTabletr('contact${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
            </tr>`;
            $("#user_data").append(rowHtml);
            resetContact();
            // }
        });

        $("#create_contant").click(function() {
            let personName = $("#personName").val();
            let personSurname = $("#personSurname").val();
            let personEmail = $("#personEmail").val();
            let personPhoneNumber = $("#personPhoneNumber").val();
            let personContactType = $("#personContactType").val();

            if (personName == "") {
                $("#personNameError").attr('hidden', false);
            } else if (personSurname == "") {
                $("#personSurnameError").attr('hidden', false);
            } else if (personEmail == "") {
                $("#personEmailError").attr('hidden', false);
            } else if (personPhoneNumber == "") {
                $("#personPhoneNumberError").attr('hidden', false);
            } else if (personContactType == "") {
                $("#personContactTypeError").attr('hidden', false);
            } else {
                $.ajax({
                    url: "{{ route('common.add-person') }}",
                    type: 'POST',
                    data: {
                        'personName': personName,
                        'personSurname': personSurname,
                        'personEmail': personEmail,
                        'personPhoneNumber': personPhoneNumber
                    },
                    dataType: 'json',
                    success: function(data) {
                        let commentData = data.data;
                        let microtime = Date.now();
                        if (data) {
                            var rowHtml = `<tr id="contact${microtime}">
                            <td>${personName||''} ${personSurname||''}
                                <input type="hidden" name="user_id[]" value="${data.data}" />
                                <input type="hidden" name="contact_type[]" value="${personContactType}" />
                            </td>
                            <td>${personPhoneNumber||''}</td>
                            <td>${personEmail||''}</td>
                            <td>${personContactType||''}</td>
                            <td> <button onclick="deleteTabletr('contact${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
                        </tr>`;
                            $("#user_data").append(rowHtml);
                            resetContact();
                        } else {
                            $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                            $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                            $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                            $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                        }
                        $('#client_comment_modal').modal('hide');
                    }
                });
            }
        });


        $("#inputWeekends").change(function() {
            if ($('#inputWeekends').is(":checked")) {
                $('#inputMonday').prop('checked', false);
                $('#inputTuesday').prop('checked', false);
                $('#inputWednesday').prop('checked', false);
                $('#inputThursday').prop('checked', false);
                $('#inputFriday').prop('checked', false);

                $('#inputSaturday').prop('checked', true);
                $('#inputSunday').prop('checked', true);


                $("#inputWeekdays").prop('checked', false);
                $("#inputEveryday").prop('checked', false);
            }
            // $(this).prop('checked',false);
        });

        $("#inputWeekdays").change(function() {
            if ($('#inputWeekdays').is(":checked")) {
                $('#inputSaturday').prop('checked', false);
                $('#inputSunday').prop('checked', false);

                $('#inputMonday').prop('checked', true);
                $('#inputTuesday').prop('checked', true);
                $('#inputWednesday').prop('checked', true);
                $('#inputThursday').prop('checked', true);
                $('#inputFriday').prop('checked', true);


                $("#inputWeekends").prop('checked', false);
                $("#inputEveryday").prop('checked', false);
            }
            // $(this).prop('checked',false);
        });

        $("#inputEveryday").change(function() {
            if ($('#inputEveryday').is(":checked")) {
                $('#inputMonday').prop('checked', true);
                $('#inputTuesday').prop('checked', true);
                $('#inputWednesday').prop('checked', true);
                $('#inputThursday').prop('checked', true);
                $('#inputFriday').prop('checked', true);
                $('#inputSaturday').prop('checked', true);
                $('#inputSunday').prop('checked', true);

                $("#inputWeekends").prop('checked', false);
                $("#inputWeekdays").prop('checked', false);
            }
            // $("#inputEveryday").prop('checked',false);
        });



        $("#shiftWeekends").change(function() {
            if ($('#shiftWeekends').is(":checked")) {
                $('#shiftMonday').prop('checked', false);
                $('#shiftTuesday').prop('checked', false);
                $('#shiftWednesday').prop('checked', false);
                $('#shiftThursday').prop('checked', false);
                $('#shiftFriday').prop('checked', false);

                $('#shiftSaturday').prop('checked', true);
                $('#shiftSunday').prop('checked', true);


                $("#shiftWeekdays").prop('checked', false);
                $("#shiftEveryday").prop('checked', false);
            }
            // $(this).prop('checked',false);
        });

        $("#shiftWeekdays").change(function() {
            if ($('#shiftWeekdays').is(":checked")) {
                $('#shiftSaturday').prop('checked', false);
                $('#shiftSunday').prop('checked', false);

                $('#shiftMonday').prop('checked', true);
                $('#shiftTuesday').prop('checked', true);
                $('#shiftWednesday').prop('checked', true);
                $('#shiftThursday').prop('checked', true);
                $('#shiftFriday').prop('checked', true);


                $("#shiftWeekends").prop('checked', false);
                $("#shiftEveryday").prop('checked', false);
            }
            // $(this).prop('checked',false);
        });

        $("#shiftEveryday").change(function() {
            if ($('#shiftEveryday').is(":checked")) {
                $('#shiftMonday').prop('checked', true);
                $('#shiftTuesday').prop('checked', true);
                $('#shiftWednesday').prop('checked', true);
                $('#shiftThursday').prop('checked', true);
                $('#shiftFriday').prop('checked', true);
                $('#shiftSaturday').prop('checked', true);
                $('#shiftSunday').prop('checked', true);

                $("#shiftWeekends").prop('checked', false);
                $("#shiftWeekdays").prop('checked', false);
            }
            // $("#shiftEveryday").prop('checked',false);
        });


        $("#saveComment").on('submit',function(e) {
            e.preventDefault();
            var formData = new FormData($("#saveComment")[0]);
            $.ajax({
                url: "{{ route('client.addComment') }}",
                type: 'POST',
                data: formData,
                dataType: 'json',
                contentType: false, // Set to false when using FormData
                processData: false, // Set to false when using FormData
                success: function(data) {
                    let commentData = data.data;
                    let microtime = Date.now();
                    if (data) {
                        let tabletrComment = `<tr id="comment${microtime}">
                                            <td>${commentData.created_date}</td>
                                            <td>${data.user}</td>
                                            <td>${commentData.comment_type}</td>
                                            <td>${commentData.comment} </td>
                                            <td>${commentData.file} </td>
                                            <td>
                                                <button onclick="deleteTabletr('comment${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                    <i class="uil-trash"></i>
                                                </button>
                                            </td>
                                        </tr>`;
                        $("#add_client_commenttr").append(tabletrComment);
                    } else {
                        $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                        $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                        $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                        $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                    }
                    $('#client_comment_modal').modal('hide');
                    // $('#saveComment').empty();
                }
            });
        });


        function addShiftReceivce() {
            if (validateFormByDiv('cleanerReceivableDivValidation')) {
                let avaliableStartTime = $("#avaliableStartTime").val();
                let avaliableEndTime = $("#avaliableEndTime").val();
                let totalHours = $("#totalHours").val();
                let hourlyRateReceivable = $("#hourlyRateReceivable").val();

                $("#avaliableStartTimeError").attr('hidden', true);
                $("#avaliableEndTimeError").attr('hidden', true);
                $("#totalHoursError").attr('hidden', true);


                let isError = 0;
                if (!avaliableStartTime || avaliableStartTime == 0) {
                    $("#avaliableStartTimeError").attr('hidden', false);
                    isError = 1;
                }
                if (!avaliableEndTime || avaliableEndTime == 0) {
                    $("#avaliableEndTimeError").attr('hidden', false);
                    isError = 1;
                }
                if (!totalHours || totalHours == 0) {
                    $("#totalHoursError").attr('hidden', false);
                    isError = 1;
                }

                if (isError == 0) {
                    let inputSunday = '';
                    let inputMonday = '';
                    let inputTuesday = '';
                    let inputWednesday = '';
                    let inputThursday = '';
                    let inputFriday = '';
                    let inputSaturday = '';
                    let selectedDays = [];

                    if ($('#inputSunday').is(":checked")) {
                        inputSunday = 'sunday';
                        selectedDays.push('Sunday');
                    }
                    if ($('#inputMonday').is(":checked")) {
                        inputMonday = 'monday';
                        selectedDays.push('Monday');
                    }
                    if ($('#inputTuesday').is(":checked")) {
                        inputTuesday = 'tuesday';
                        selectedDays.push('Tuesday');
                    }
                    if ($('#inputWednesday').is(":checked")) {
                        inputWednesday = 'wednesday';
                        selectedDays.push('Wednesday');
                    }
                    if ($('#inputThursday').is(":checked")) {
                        inputThursday = 'thursday';
                        selectedDays.push('Thursday');
                    }
                    if ($('#inputFriday').is(":checked")) {
                        inputFriday = 'friday';
                        selectedDays.push('Friday');
                    }
                    if ($('#inputSaturday').is(":checked")) {
                        inputSaturday = 'saturday';
                        selectedDays.push('Saturday');
                    }

                    const hoursOfWork = totalHours;
                    const hourlyRate = hourlyRateReceivable;
                    const sales = calculateSalesMetrics(selectedDays.length, hoursOfWork, hourlyRate);
                    let microtime = Date.now();

                    let shift_receivce_html = `<tr id="shift_receivce${microtime}">
                        <input type="hidden" name="avaliableStartTime[]" value="${avaliableStartTime}">
                        <input type="hidden" name="avaliableEndTime[]" value="${avaliableEndTime}">
                        <input type="hidden" name="totalHours[]" value="${totalHours}">
                        <input type="hidden" name="hourlyRateReceivable[]" value="${hourlyRateReceivable}">
                        <input type="hidden" name="inputSunday[]" value="${inputSunday}">
                        <input type="hidden" name="inputMonday[]" value="${inputMonday}">
                        <input type="hidden" name="inputTuesday[]" value="${inputTuesday}">
                        <input type="hidden" name="inputWednesday[]" value="${inputWednesday}">
                        <input type="hidden" name="inputThursday[]" value="${inputThursday}">
                        <input type="hidden" name="inputFriday[]" value="${inputFriday}">
                        <input type="hidden" name="inputSaturday[]" value="${inputSaturday}">
                        <td>${avaliableStartTime}</td>
                        <td>${avaliableEndTime}</td>
                        <td>${totalHours}</td>
                        <td>${hourlyRateReceivable}</td>
                        <td>${sales.yearlySales.toFixed(2)}</td>
                        <td>${sales.monthlySales.toFixed(2)}</td>
                        <td>${sales.fortnightlySales.toFixed(2)}</td>
                        <td>${sales.grossMarginMonth.toFixed(2)}</td>
                        <td>${sales.grossMarginMonthPercent.toFixed(2)}</td>
                        <td>${selectedDays.length}</td>
                        <td class="max-lines">
                            ${inputSunday} ${inputMonday} ${inputTuesday} ${inputWednesday} ${inputThursday} ${inputFriday} ${inputSaturday}
                        </td>
                        <td>
                            <button onclick="deleteTabletr('shift_receivce${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                    <i class="uil-trash"></i>
                            </button>
                        </td>
                    </tr>`;
                    $("#add_shift_receivce_tr").append(shift_receivce_html);
                    resetShiftReceivce();
                }
            }
        }

        function resetShiftReceivce() {
            $("#avaliableStartTime").val('');
            $("#avaliableEndTime").val('');
            $("#totalHours").val('');
            $("#hourlyRateReceivable").val('');
            $('#inputEveryday').prop('checked', false);
            $('#inputWeekdays').prop('checked', false);
            $('#inputWeekends').prop('checked', false);
            $('#inputSunday').prop('checked', false);
            $('#inputMonday').prop('checked', false);
            $('#inputTuesday').prop('checked', false);
            $('#inputWednesday').prop('checked', false);
            $('#inputThursday').prop('checked', false);
            $('#inputFriday').prop('checked', false);
            $('#inputSaturday').prop('checked', false);

        }


        function addNewShift() {
            if (validateFormByDiv('cleanerDivValidation')) {
                let shiftCleaner = $("#shiftCleaner").val();
                let shiftType = $("#shiftType").val();
                let shifthourlyRate = $("#shifthourlyRate").val();
                let shiftavaliableStartTime = $("#shiftavaliableStartTime").val();
                let shiftavaliableEndTime = $("#shiftavaliableEndTime").val();
                let shifttotalHours = $("#shifttotalHours").val();

                $("#shiftCleanerError").attr('hidden', true);
                $("#shiftTypeError").attr('hidden', true);
                $("#shiftavaliableStartTimeError").attr('hidden', true);
                $("#shiftavaliableEndTimeError").attr('hidden', true);
                $("#shifttotalHoursError").attr('hidden', true);

                let isError = 0;
                if (!shiftCleaner || shiftCleaner == 0) {
                    $("#shiftCleanerError").attr('hidden', false);
                    $("#shiftCleaner").focus();
                    isError = 1;
                }
                if (!shiftType || shiftType == 0) {
                    $("#shiftTypeError").attr('hidden', false);
                    $("#shiftType").focus();
                    isError = 1;
                }
                if (!shiftavaliableStartTime || shiftavaliableStartTime == 0) {
                    $("#shiftavaliableStartTimeError").attr('hidden', false);
                    $("#shiftavaliableStartTime").focus();
                    isError = 1;
                }
                if (!shiftavaliableEndTime || shiftavaliableEndTime == 0) {
                    $("#shiftavaliableEndTimeError").attr('hidden', false);
                    $("#shiftavaliableEndTime").focus();
                    isError = 1;
                }
                if (!shifttotalHours || shifttotalHours == 0) {
                    $("#shifttotalHoursError").attr('hidden', false);
                    $("#shifttotalHours").focus();
                    isError = 1;
                }
                if (isError == 0) {
                    let shiftSunday = '';
                    let shiftMonday = '';
                    let shiftTuesday = '';
                    let shiftWednesday = '';
                    let shiftThursday = '';
                    let shiftFriday = '';
                    let shiftSaturday = '';
                    let shiftfrequency = 0;

                    if ($('#shiftSunday').is(":checked")) {
                        shiftSunday = 'sunday';
                        shiftfrequency += 1;
                    }
                    if ($('#shiftMonday').is(":checked")) {
                        shiftMonday = 'monday';
                        shiftfrequency += 1;
                    }
                    if ($('#shiftTuesday').is(":checked")) {
                        shiftTuesday = 'tuesday';
                        shiftfrequency += 1;
                    }
                    if ($('#shiftWednesday').is(":checked")) {
                        shiftWednesday = 'wednesday';
                        shiftfrequency += 1;
                    }
                    if ($('#shiftThursday').is(":checked")) {
                        shiftThursday = 'thursday';
                        shiftfrequency += 1;
                    }
                    if ($('#shiftFriday').is(":checked")) {
                        shiftFriday = 'friday';
                        shiftfrequency += 1;
                    }
                    if ($('#shiftSaturday').is(":checked")) {
                        shiftSaturday = 'saturday';
                        shiftfrequency += 1;
                    }

                    let microtime = Date.now();
                    let shift_new_html = `<tr id="shift_new${microtime}">
                <input type="hidden" name="shiftCleaner[]" value="${shiftCleaner}">
                <input type="hidden" name="shiftType[]" value="${shiftType}">
                <input type="hidden" name="shifthourlyRate[]" value="${shifthourlyRate}">
                <input type="hidden" name="shiftavaliableStartTime[]" value="${shiftavaliableStartTime}">
                <input type="hidden" name="shiftavaliableEndTime[]" value="${shiftavaliableEndTime}">
                <input type="hidden" name="shifttotalHours[]" value="${shifttotalHours}">
                <input type="hidden" name="shiftSunday[]" value="${shiftSunday}">
                <input type="hidden" name="shiftMonday[]" value="${shiftMonday}">
                <input type="hidden" name="shiftTuesday[]" value="${shiftTuesday}">
                <input type="hidden" name="shiftWednesday[]" value="${shiftWednesday}">
                <input type="hidden" name="shiftThursday[]" value="${shiftThursday}">
                <input type="hidden" name="shiftFriday[]" value="${shiftFriday}">
                <input type="hidden" name="shiftSaturday[]" value="${shiftSaturday}">
                <td>${shiftavaliableStartTime}</td>
                <td>${shiftavaliableEndTime}</td>
                <td>${shifttotalHours}</td>
                <td>${newcleaners[shiftCleaner].name}</td>
                <td>${shiftType}</td>
                <td>${shifthourlyRate}</td>
                <td>${shiftfrequency}</td>
                <td class="max-lines">
                    ${shiftSunday || ''} ${shiftMonday || ''} ${shiftTuesday || ''} ${shiftWednesday || ''} ${shiftThursday || ''} ${shiftFriday || ''} ${shiftSaturday || ''}
                </td>
                <td>
                    <button onclick="deleteTabletr('shift_new${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                            <i class="uil-trash"></i>
                    </button>
                </td>
            </tr>`;

                    $("#shift_add_tr").append(shift_new_html);
                    console.log(shift_new_html);
                    resetShift();
                }
            }
        }

        function resetShift() {
            $("#shiftCleaner").val('0');
            $("#shiftType").val('0');
            $("#shiftavaliableStartTime").val('');
            $("#shiftavaliableEndTime").val('');
            $("#shifttotalHours").val('');
            $("#shifthourlyRate").val('');
            $('#shiftEveryday').prop('checked', false);
            $('#shiftWeekdays').prop('checked', false);
            $('#shiftWeekends').prop('checked', false);
            $('#shiftSunday').prop('checked', false);
            $('#shiftMonday').prop('checked', false);
            $('#shiftTuesday').prop('checked', false);
            $('#shiftWednesday').prop('checked', false);
            $('#shiftThursday').prop('checked', false);
            $('#shiftFriday').prop('checked', false);
            $('#shiftSaturday').prop('checked', false);
            $("#shiftCleaner").select2();
            $("#shiftType").select2();

        }


        $("#client_idselect").change(function() {
            let clientid = $(this).val();
            $("#portfolio_idselect").empty();
            $('#portfolio_idselect').append($('<option>', {
                value: 0, // replace 'value' with the actual property name in your data
                text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
            }));
            $.ajax({
                url: "{{ route('common.client-portfolio') }}",
                type: 'POST',
                data: {
                    client_id: clientid
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        let dataPort = data.data;

                        $.each(dataPort, function(index, item) {
                            $('#portfolio_idselect').append($('<option>', {
                                value: item
                                    .id, // replace 'value' with the actual property name in your data
                                text: item
                                    .full_name // replace 'text' with the actual property name in your data
                            }));
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        $("#avaliableStartTime").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",

        });


        

        function timeAvaCheck(sid,eid,thour){
            let startTime = $(`#${sid}`).val()||null;
            let endTime = $(`#${eid}`).val()||null;
            let total_hour = $(`#${thour}`).val()||null;

            if(startTime && endTime){
                let startHours = parseInt(startTime.split(':')[0]);
                let startMinutes = parseInt(startTime.split(':')[1]);
                
                let endHours = parseInt(endTime.split(':')[0]);
                let endMinutes = parseInt(endTime.split(':')[1]);
                
                // Calculating the difference
                let hourDiff = endHours - startHours;
                $(`#${thour}`).prop('min',hourDiff);
                if(total_hour && total_hour >  hourDiff){
                }else if(hourDiff > 0 || total_hour < hourDiff){
                    $(`#${thour}`).val(hourDiff);
                }
            }
        }

        $("#shiftavaliableStartTime,#shiftavaliableEndTime,#shifttotalHours").change(function(){
            timeAvaCheck('shiftavaliableStartTime','shiftavaliableEndTime','shifttotalHours');
        });


        $("#shiftavaliableStartTime,#shiftavaliableEndTime,#shifttotalHours").trigger('change');
    </script>
     @include('common.footer_validation', ['validate_url_path' => 'client.site.unique'])
@endpush
