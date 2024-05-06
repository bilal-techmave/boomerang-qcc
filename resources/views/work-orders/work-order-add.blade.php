@extends('layouts.main')
@section('app-title', 'Add Work Order - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->


    <div class="container-fluid">
        <!-- start page title -->


        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Work order</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Work Order</li>
                            <li class="breadcrumb-item active">Add Work order</li>
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
                                    class="nav-link show active @if ($errors->first('tab_name') == 'job_Info') active @endif">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Job Info</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#profile" id="profileTab" data-bs-toggle="tab" aria-expanded="true"
                                    class="nav-link @if ($errors->first('tab_name') == 'client_work_orders') active @endif">
                                    <span><i class="bi bi-journals"></i></span>
                                    <span>Client Work Orders</span>
                                </a>
                            </li>
                            @can('cleaner-create')
                                <li class="nav-item">
                                    <a href="#messages" id="messagesTab" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'cleaners') active @endif">
                                        <span><i class="uil uil-constructor"></i></span>
                                        <span>Cleaners</span>
                                    </a>
                                </li>
                            @endcan
                            @can('contractors-create')
                                <li class="nav-item">
                                    <a href="#comments" id="commentsTab" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'contractors') active @endif">
                                        <span><i class="uil-building"></i></span>
                                        <span>Contractors</span>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="#tickets" id="ticketsTab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'comments') active @endif">
                                    <span><i class="uil-comment-alt"></i></span>
                                    <span>Comments</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#email" id="emailTab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'Emails') active @endif">
                                    <span><i class="bi-envelope"></i></span>
                                    <span>Emails</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    @php
                        $newcontractor = $contractor->keyBy('id');
                    @endphp
                    {{-- work-order/work-order/create --}}
                    <form action="{{ route('work-order.work-order.store') }}" id="myForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="tab-content  text-muted">

                                <div class="tab-pane show active @if ($errors->first('tab_name') == 'job_Info') show active @endif "
                                    id="home">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="client_idselect">Client <span
                                                                class="red">*</span></label>
                                                        <select required data-plugin="customselect" name="selectCleint"
                                                            id="client_idselect" class="form-select">
                                                            <option value="0">Please select one or client</option>
                                                            @if ($client)
                                                                @forelse ($client as $allclients)
                                                                    <option
                                                                        {{ old('selectCleint') == $allclients->id ? 'selected' : '' }}
                                                                        value="{{ $allclients->id }}">
                                                                        {{ $allclients->business_name }}</option>
                                                                @empty
                                                                @endforelse
                                                            @endif
                                                        </select>
                                                        <span class="text-danger required_error" hidden>Client is
                                                            required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="portfolio_idselect">Portfolio <span
                                                                class="red">*</span></label>
                                                        <select data-plugin="customselect" required name="portfolio"
                                                            id="portfolio_idselect" class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            {{-- @if ($client_portfolios)
                                                                @forelse ($client_portfolios as $allclient_portfolios)
                                                                    <option {{ old('portfolio') == $allclient_portfolios->id ? 'selected' : '' }} value="{{ $allclient_portfolios->id }}">{{ $allclient_portfolios->full_name }}</option>
                                                                @empty
                                                                @endforelse
                                                            @endif --}}
                                                        </select>
                                                        <span class="text-danger required_error" hidden>Portfolio is
                                                            required</span>
                                                    </div>
                                                </div>



                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="site_idselect">Site <span
                                                                class="red">*</span></label>
                                                        <select data-plugin="customselect" required name="sitename"
                                                            id="site_idselect" class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            {{-- @if ($allsites)
                                                                @foreach ($allsites as $site)
                                                                    <option value="{{$site->id}}">{{Str::ucfirst($site->site_type)??''}} - {{$site->state->state_name??''}}</option>
                                                                @endforeach
                                                            @endif --}}
                                                        </select>
                                                        <span class="text-danger required_error" hidden>Site is
                                                            required</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="workorderType">Type <span
                                                                class="red">*</span></label>
                                                        <select required data-plugin="customselect" name="type"
                                                            id="workorderType" onchange="checkJobType()"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($job_types)
                                                                @forelse ($job_types as $alljob_types)
                                                                    <option value="{{ $alljob_types->id }}">
                                                                        {{ $alljob_types->name }}</option>
                                                                @empty
                                                                @endforelse
                                                            @endif
                                                        </select>
                                                        <span class="text-danger required_error" hidden>Type is
                                                            required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Sub
                                                            Type</label>
                                                        <select data-plugin="customselect0" name="subtype"
                                                            id="workOrderSubType" class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Reference
                                                            Number <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="referenceno" oninput="checkUniqueData(this,'reference_number')" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="exampleInputEmail1">Requester</label>
                                                        <input type="text" class="form-control" name="requester"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1"> Completion
                                                            Date <span class="red">*</span></label>
                                                        <input required type="date"
                                                            class="form-control basic-datepicker validation_past"
                                                            name="completionDate" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('completiondate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1"> Start Time
                                                        </label>
                                                        <input type="text" class="form-control basic-timepicker"
                                                            name="starttime" aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Schedule Date
                                                        </label>
                                                        <input type="text"
                                                            class="form-control basic-datepicker validation_past"
                                                            name="scheduledate" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="exampleInputEmail1">Priority</label>
                                                        <select data-plugin="customselect" name="priority"
                                                            class="form-select">
                                                            <option value="LOW">Low</option>
                                                            <option value="MEDIUM">Medium</option>
                                                            <option value="HIGH">High</option>
                                                            <option value="URGENT">Urgent</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Department <span
                                                            class="red">*</span>
                                                        </label>
                                                        <select required data-plugin="customselect" name="department"
                                                            class="form-select">
                                                            <option value="0">Please select any one department
                                                            </option>
                                                            @if ($departments)
                                                                @forelse ($departments as $alldepartments)
                                                                    <option value="{{ $alldepartments->id }}">
                                                                        {{ $alldepartments->name }}</option>
                                                                @empty
                                                                @endforelse
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="">Billing Settings</label>
                                                    <div class="row mt-3">
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="checkbox6a" value="1"
                                                                        name="is_change_client" type="checkbox">
                                                                    <label class="form-label" for="checkbox6a">
                                                                        Check this if you have to charge the client
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="checkbox6b" value="1"
                                                                        name="is_quite_work_order" type="checkbox">
                                                                    <label class="form-label" for="checkbox6b">
                                                                        Check this if this is a QUOTE WORK ORDER
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="salesPrice">Sales Price</label>
                                                        <input type="number" step="any" min="0"
                                                            name="salesprice" class="form-control" id="salesPrice"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="budget">Budget</label>
                                                        <input type="number" step="any" min="0"
                                                            name="budget" class="form-control" id="budget"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="timeallocated">Time
                                                            Allocated</label>
                                                        <input type="number" min="0" name="timeallocated"
                                                            class="form-control " id="timeallocated"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="invoicenumber">Invoice
                                                            Number</label>
                                                        <input type="text" name="invoicenumber" class="form-control"
                                                            id="invoicenumber" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="poworkbill">PO / Work Bill </label>
                                                        <input type="text" name="workbill"
                                                            class="form-control" id="poworkbill"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('workbill')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Description <span
                                                                class="red">*</span> </label>
                                                        <textarea name="description" required class="form-control"></textarea>
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">History</label>
                                                        <textarea name="history" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Internal Communication</label>
                                                        <textarea name="internalnamcommunity" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Attachment</label>
                                                        <input name="uploadAttachemt" type="file" class="dropify"
                                                            data-height="100" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- main_bx_dt -->
                                </div>

                                <div class="tab-pane @if ($errors->first('tab_name') == 'client_work_orders') show active @endif"
                                    id="profile">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row" id="clientWorkOrderDivValidation">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="woTaskDescription">Task Description
                                                            <span class="red">*</span> </label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="woTaskDescription" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="woTaskDescriptionError" class="text-danger" hidden>Task
                                                            Description Is Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="woReferenceno">Reference Number</label>
                                                        <input type="text" id="woReferenceno"  class="form-control "
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="woWorkingBill">PO / Work
                                                            Bill</label>
                                                        <input type="text" id="woWorkingBill" class="form-control"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="woInvoiceNumber">Invoice
                                                            Number</label>
                                                        <input type="text" class="form-control" id="woInvoiceNumber"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="woSalesPrice">Sales Price <span
                                                                class="red">*</span></label>
                                                        <input type="number" step="any" min="0"
                                                            class="form-control required_fields" id="woSalesPrice"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        <span id="woSalesPriceError" class="text-danger" hidden>Sales
                                                            Price Field Is Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="woExtrachange">Extra Charge</label>
                                                        <input type="number" step="any" min="0"
                                                            id="woExtrachange" class="form-control"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 mb-3">
                                                    <div class="add_address text-end">
                                                        <button type="button" onclick="clientWorkOrder()"
                                                            class="theme_btn btn add_btn">+  Add Client Work Order</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 ">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Task Description</th>
                                                                <th>Reference Number</th>
                                                                <th>PO / Work Bill</th>
                                                                <th>Invoice Number</th>
                                                                <th>Sales Price</th>
                                                                <th>Extra Charge</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="appendAddClient">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane @if ($errors->first('tab_name') == 'cleaners') show active @endif"
                                    id="tickets">
                                    <div class="sites_main">
                                        <div class="row" id="addCommentDivValidation">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Comment <span
                                                            class="red">*</span></label>
                                                    <textarea id="commentInput" class="form-control required_fields"></textarea>
                                                    <span id="commentInputError" class="text-danger" hidden>Comment Field
                                                        Is Required</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button type="button" class="theme_btn btn add_btn"
                                                    onclick="addComment()">+ Add new comment</button>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Date Issued</th>
                                                            <th>Person</th>
                                                            <th>Message</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="comment_tr_box">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @can('cleaner-create')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'contractors') show active @endif"
                                        id="messages">
                                        <div class="sites_main">
                                            <div class="row" id="addCleanerDivValidation">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="cleaner_level">Cleaner <span
                                                                class="red">*</span></label>
                                                        <select data-plugin="customselect" id="cleaner_level" name="cleaner"
                                                            class="form-select required_fields">
                                                            <option value="0">Please select one or start typing</option>
                                                            @if ($cleaners)
                                                                @foreach ($cleaners as $kk => $cleaner)
                                                                    <option value="{{ $cleaner->id }}">{{ $cleaner->name }}
                                                                        ({{ $cleaner->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <span id="cleaner_levelError" class="text-danger" hidden>Cleaner Field
                                                            Is Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="cleaner_hours">Hours</label>
                                                        <input type="number" min="0" id="cleaner_hours"
                                                            class="form-control" aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="cleaner_budget">Budget</label>
                                                        <input type="number" step="any" min="0"
                                                            id="cleaner_budget" class="form-control"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="cleaner_dateattendance">Date Attendance
                                                            <span class="red">*</span></label>
                                                        <input type="date" id="cleaner_dateattendance"
                                                            class="form-control basic-datepicker required_fields validation_past"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        <span id="cleaner_dateattendanceError" class="text-danger" hidden>Date
                                                            Attendance Field Is Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="add_address text-end">
                                                        <button type="button" onclick="addCleaner()"
                                                            class="theme_btn btn add_btn " id="add_cleaner_btn">+ Add
                                                            Cleaner</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Cleaner</th>
                                                                <th>Hours</th>
                                                                <th>Budget</th>
                                                                <th>Date Attendance</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_cleaner_box">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endcan
                                @can('contractors-create')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'comments') show active @endif"
                                        id="comments">
                                        <div class="sites_main">
                                            <div class="row" id="addContractorDivValidation">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="inputcontractor">Contractor <span
                                                                class="red">*</span> </label>
                                                        <select data-plugin="customselect" id="inputcontractor"
                                                            class="form-select required_fields">
                                                            <option value="0">Please select one or start typing</option>
                                                            @if ($contractor)
                                                                @foreach ($contractor as $contra)
                                                                    <option value="{{ $contra->id }}">{{ $contra->name }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <span id="inputcontractorError" class="text-danger" hidden>Contractor
                                                            Field Is Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="contractorHours">Hours</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="contractorHours" aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="contractorCost">Cost</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="contractorCost" aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="dataattendance">Date Attendance <span
                                                                class="red">*</span></label>
                                                        <input type="text"
                                                            class="form-control basic-datepicker validation_past required_fields"
                                                            id="dataattendance" aria-describedby="emailHelp" placeholder="">
                                                        <span id="dataattendanceError" class="text-danger" hidden>Date
                                                            Attendance Field Is Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="add_address text-end">
                                                        <button type="button" onclick="addContractor()"
                                                            class="theme_btn btn add_btn ">+ Add Contractor</button>
                                                        <!-- <a href="#" class="theme_btn btn btn-primary"><i class="bi-arrow-repeat"></i> Reset</a> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-12  mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Contractor</th>
                                                                <th>Hours</th>
                                                                <th>Cost</th>
                                                                <th>Date Attendance</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_contractor_box">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                <div class="tab-pane @if ($errors->first('tab_name') == 'email') show active @endif"
                                    id="email">
                                    <div class="sites_main">
                                        <div class="row" id="addEmailsDivValidation">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="wo_emails">Email <span
                                                            class="red">*</span></label>
                                                    <input type="email" id="wo_emails"
                                                        class="form-control required_fields" aria-describedby="emailHelp"
                                                        placeholder="">
                                                    <span id="wo_emailsError" hidden class="text-danger">Email field is
                                                        required.</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 align-self-center">
                                                <button type="button" class="theme_btn btn add_btn portfolio_add_btn"
                                                    onclick="addEmails()">+ Add Email</button>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Email</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="add_woemail_table">
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
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    id="storeWorkStore" class="theme_btn btn save_btn"><i
                                                        class="bi bi-save"></i> Save</button>
                                                <a href="{{ route('work-order.work-order.index') }}"
                                                    class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
        <!-- end row -->

    </div>
    <!-- container -->

@endsection
@push('push_script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

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

        var newcontractor = @json($newcontractor);

        function clientWorkOrder() {
            if (validateFormByDiv('clientWorkOrderDivValidation')) {
                let taskDescription = $("#woTaskDescription").val();
                let woreferenceno = $("#woReferenceno").val();
                let workingBill = $("#woWorkingBill").val();
                let invoiceNumber = $("#woInvoiceNumber").val();
                let salesPrice = $("#woSalesPrice").val();
                let extrachange = $("#woExtrachange").val();

                let isValid = true;
                $("#woTaskDescriptionError").attr('hidden', true);
                $("#woSalespriceError").attr('hidden', true);

                if (!taskDescription || taskDescription.trim() == "") {
                    $("#woTaskDescriptionError").attr('hidden', false);
                    isValid = false;
                }
                if (!salesPrice || salesPrice == "") {
                    $("#woSalesPriceError").attr('hidden', false);
                    isValid = false;
                }

                if (isValid) {
                    let microtime = Date.now();
                    let appendAddClient =
                        `<tr id="clientworder${microtime}">
                            <td>
                                <input type="hidden" name="wotaskDescription[]" value="${taskDescription}">
                                <input type="hidden" name="woreferenceno[]" value="${woreferenceno}">
                                <input type="hidden" name="workingBill[]" value="${workingBill}">
                                <input type="hidden" name="woinvoiceNumber[]" value="${invoiceNumber}">
                                <input type="hidden" name="wosalesPrice[]" value="${salesPrice}">
                                <input type="hidden" name="woextrachange[]" value="${extrachange}">
                                ${taskDescription||''}
                            </td>
                            <td>${woreferenceno||''}</td>
                            <td>${workingBill||''}</td>
                            <td>${invoiceNumber||''}</td>
                            <td>${salesPrice||0}</td>
                            <td>${extrachange||0}</td>
                            <td>
                                <button type="button" onclick="deleteTabletr('clientworder${microtime}')"  class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                    <i class="uil-trash"></i>
                                </button>
                            </td>
                        </tr>`;
                    $("#appendAddClient").append(appendAddClient);
                    resetClientWorkOrder();
                }
            }
        }

        function resetClientWorkOrder() {
            $("#woTaskDescription").val('');
            $("#woReferenceno").val('');
            $("#woWorkingBill").val('');
            $("#woInvoiceNumber").val('');
            $("#woSalesPrice").val('');
            $("#woExtrachange").val('');
        }


        function addCleaner() {
            if (validateFormByDiv('addCleanerDivValidation')) {
                let cleaner_level = $("#cleaner_level").val();
                let cleaner_levelText = $("#cleaner_level option:selected").text();
                let cleaner_hours = $("#cleaner_hours").val();
                let cleaner_budget = $("#cleaner_budget").val();
                let cleaner_dateattendance = $("#cleaner_dateattendance").val();

                let isValid = true;
                $("#cleaner_levelError").attr('hidden', true);
                $("#cleaner_dateattendanceError").attr('hidden', true);

                if (!cleaner_level || cleaner_level.trim() == "" || cleaner_level == "0") {
                    $("#cleaner_levelError").attr('hidden', false);
                    isValid = false;
                }
                if (!cleaner_dateattendance || cleaner_dateattendance == "") {
                    $("#cleaner_dateattendanceError").attr('hidden', false);
                    isValid = false;
                }
                let microtime = Date.now();
                if (isValid) {

                    let exists = false;
                    $(".cleaner_levelTblClass input[type='hidden']").each(function() {
                        if (this.value === cleaner_level) {
                            exists = true;
                        }
                    });
                    if (exists) {
                        $("#cleaner_level").next('.select2-container').find('.select2-selection').addClass(
                            'invalid-select');
                        $("#cleaner_level").next('span').after(
                            '<span class="custom_error text-danger">Already added in list.</span>');
                    } else {

                        let cleanertr = `
                            <tr id="cleanertr${microtime}">
                                <td class="cleaner_levelTblClass">
                                    <input type="hidden" name="cleaner_level[]" value="${cleaner_level}"/>
                                    <input type="hidden" name="cleaner_hours[]" value="${cleaner_hours}"/>
                                    <input type="hidden" name="cleaner_budget[]" value="${cleaner_budget}"/>
                                    <input type="hidden" name="cleaner_dateattendance[]" value="${cleaner_dateattendance}"/>
                                    ${cleaner_levelText}
                                </td>
                                <td>${cleaner_hours}</td>
                                <td>${cleaner_budget}</td>
                                <td>${cleaner_dateattendance}</td>
                                <td>
                                    <button type="button" onclick="deleteTabletr('cleanertr${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                        <i class="uil-trash"></i>
                                    </button>
                                </td>
                            </tr>`;
                        $("#add_cleaner_box").append(cleanertr);
                        resetCleaner();
                    }
                }
            }

        }

        function resetCleaner() {
            $("#cleaner_level").val(0).trigger('change');
            $("#cleaner_hours").val('');
            $("#cleaner_budget").val('');
            $("#cleaner_dateattendance").val('');
        }

        function addContractor() {
            if (validateFormByDiv('addContractorDivValidation')) {
                let inputcontractor = $("#inputcontractor").val();
                let contractorHours = $("#contractorHours").val();
                let contractorCost = $("#contractorCost").val();
                let dataattendance = $("#dataattendance").val();

                let isValid = true;
                $("#inputcontractorError").attr('hidden', true);
                $("#dataattendanceError").attr('hidden', true);

                if (!inputcontractor || inputcontractor.trim() == "" || inputcontractor == "0") {
                    $("#inputcontractorError").attr('hidden', false);
                    isValid = false;
                }
                if (!dataattendance || dataattendance == "") {
                    $("#dataattendanceError").attr('hidden', false);
                    isValid = false;
                }

                if (isValid) {


                    let exists = false;
                    $(".inputcontractorTblClass input[type='hidden']").each(function() {
                        if (this.value === inputcontractor) {
                            exists = true;
                        }
                    });
                    if (exists) {
                        $("#inputcontractor").next('.select2-container').find('.select2-selection').addClass(
                            'invalid-select');
                        $("#inputcontractor").next('span').after(
                            '<span class="custom_error text-danger">Already added in list.</span>');
                    } else {
                        let microtime = Date.now();
                        let contractortr = `
                            <tr id="contractortr${microtime}">
                                <td class="inputcontractorTblClass">
                                    <input type="hidden" name="inputcontractor[]" value="${inputcontractor}"/>
                                    <input type="hidden" name="contractorHours[]" value="${contractorHours}"/>
                                    <input type="hidden" name="contractorCost[]" value="${contractorCost}"/>
                                    <input type="hidden" name="dataattendance[]" value="${dataattendance}"/>
                                    ${newcontractor[inputcontractor]['name']}
                                </td>
                                <td>${contractorHours}</td>
                                <td>${contractorCost}</td>
                                <td>${dataattendance}</td>
                                <td>
                                    <button type="button" onclick="deleteTabletr('contractortr${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                        <i class="uil-trash"></i>
                                    </button>
                                </td>
                            </tr>`;
                        $("#add_contractor_box").append(contractortr);
                        resetContractor();
                    }
                }
            }
        }

        function resetContractor() {
            $("#inputcontractor").val(0).trigger('change');
            $("#contractorHours").val('');
            $("#contractorCost").val('');
            $("#dataattendance").val('');
        }


        function addComment() {
            if (validateFormByDiv('addCommentDivValidation')) {
                let user_name = "{{ auth()->user()->name }} {{ auth()->user()->surname }}";
                let writtenComment = $("#commentInput").val();

                $("#commentInputError").attr('hidden', true);
                if (!writtenComment || writtenComment == "") {
                    $("#commentInputError").attr('hidden', false);
                } else {
                    let microtime = Date.now();
                    let comment_tr_box = `
                        <tr id="comment${microtime}">
                            <td>
                                <input type="hidden" name="comment[]" value="${writtenComment}">
                                <input type="hidden" name="comment_time[]" value="{{ date('Y-m-d H:i:s') }}">
                                {{ date('d/m/Y H:i:s') }}</td>
                            <td>${user_name}</td>
                            <td>${writtenComment}</td>
                            <td>
                                <button type="button" onclick="deleteTabletr('comment${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                    <i class="uil-trash"></i>
                                </button>
                            </td>
                        </tr>`;

                    $("#comment_tr_box").append(comment_tr_box);
                    $("#commentInput").val('');
                }
            }
        }

        function addEmails() {
            if (validateFormByDiv('addEmailsDivValidation')) {
                let wo_emails = $("#wo_emails").val();
                $("#wo_emailsError").attr('hidden', true);
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                let microtime = Date.now();
                if (!wo_emails || wo_emails == "") {
                    $("#wo_emailsError").attr('hidden', false);
                    $("#wo_emailsError").text('Email field is required.');
                } else if (!emailRegex.test(wo_emails)) {
                    $("#wo_emailsError").attr('hidden', false);
                    $("#wo_emailsError").text('Please enter valid email.');
                } else {
                    let exists = false;
                    $(".wo_emailsTblClass input[type='hidden']").each(function() {
                        if (this.value === wo_emails) {
                            exists = true;
                        }
                    });
                    if (exists) {
                        $("#wo_emails").addClass('is-invalid');
                        $("#wo_emails").next('span').after(
                            '<span class="custom_error text-danger">Already added in list.</span>');
                    } else {
                        let microtime = Date.now();
                        let add_woemail_table = `
                            <tr id="woemail${microtime}">
                                <td class="wo_emailsTblClass"><input type="hidden" name="wo_email[]" value="${wo_emails}">
                                    ${wo_emails}</td>
                                <td>
                                    <button type="button" onclick="deleteTabletr('woemail${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                        <i class="uil-trash"></i>
                                    </button>
                                </td>
                            </tr>`;

                        $("#add_woemail_table").append(add_woemail_table);
                        $("#wo_emails").val('');
                    }
                }
            }
        }


        function checkJobType() {
            let worktype = $("#workorderType").val();
            $.ajax({
                url: "{{ route('common.subJob') }}",
                type: 'POST',
                data: {
                    worktype: worktype
                },
                success: function(result) {
                    if (result.status) {
                        let selectValues = result.data;
                        $("#workOrderSubType").empty();
                        $('#workOrderSubType').append($("<option></option>").attr("value", 0).text(
                            'Please select one or start typing'));
                        $.each(selectValues, function(key, value) {
                            $('#workOrderSubType').append($("<option></option>").attr("value", key)
                                .text(value));
                        });
                        $("#workOrderSubType").select2();
                    }
                }
            });
        };

        $(".dobdatefield").flatpickr({
            "maxDate": "today"
        });
    </script>
    <script>
        $(function() {
            $('.validation_past').flatpickr({
                minDate: "today",
            })
        })
    </script>

    <script>
        $("#client_idselect").change(function() {
            let clientid = $(this).val();

            $("#portfolio_idselect").empty();
            $("#site_idselect").empty();

            $('#portfolio_idselect').append($('<option>', {
                value: 0, // replace 'value' with the actual property name in your data
                text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
            }));
            $('#site_idselect').append($('<option>', {
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
                        let sitesData = data.sites;
                        $.each(dataPort, function(index, item) {
                            $('#portfolio_idselect').append($('<option>', {
                                value: item
                                    .id, // replace 'value' with the actual property name in your data
                                text: item
                                    .full_name // replace 'text' with the actual property name in your data
                            }));
                        });
                        $.each(sitesData, function(index, item) {
                            $('#site_idselect').append($('<option>', {
                                value: item.site
                                    .id, // replace 'value' with the actual property name in your data
                                text: item.site
                                    .reference // replace 'text' with the actual property name in your data
                            }));
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        $("#portfolio_idselect").change(function() {
            let portfolio_id = $(this).val();
            let client_id = $("#client_idselect").val();
            $("#site_idselect").empty();
            $('#site_idselect').append($('<option>', {
                value: 0, // replace 'value' with the actual property name in your data
                text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
            }));
            $.ajax({
                url: "{{ route('common.portfolio-site') }}",
                type: 'POST',
                data: {
                    portfolio_id: portfolio_id,
                    client_id: client_id
                },
                dataType: 'json',
                success: function(data) {
                    if (data.status) {
                        let dataPort = data.data;
                        $.each(dataPort, function(index, item) {
                            $('#site_idselect').append($('<option>', {
                                value: item
                                    .id, // replace 'value' with the actual property name in your data
                                text: item
                                    .reference // replace 'text' with the actual property name in your data
                            }));
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

    </script>
    @include('common.footer_validation', ['validate_url_path' => 'work-order.unique-check'])
@endpush
