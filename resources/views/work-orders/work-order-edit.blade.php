@extends('layouts.main')
@section('app-title', 'Edit Work Order - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Work Order</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Work Order</li>
                            <li class="breadcrumb-item active">Edit Work order</li>
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
                    <div class="card-body">
                        @php
                            $newcontractor = $contractor->keyBy('id');
                        @endphp
                        <form method="POST" action="{{ route('work-order.work-order.update', ['work_order' => $workOrder]) }}"
                            enctype="multipart/form-data" id="myForm">
                            @csrf @method('PUT')
                            <div class="tab-content  text-muted">
                                <div class="tab-pane @if (!$errors->has('tab_name')) show active @elseif($errors->first('tab_name') == 'job_info') show active @endif"
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
                                                                        {{ old('selectCleint') == $allclients->id ? 'selected' : ($workOrder->client_id == $allclients->id ? 'selected' : '') }}
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
                                                        <label class="form-label" for="workorderStatus">Status <span
                                                                class="red">*</span></label>
                                                        <select required data-plugin="customselect" name="workorderStatus"
                                                            id="workorderStatus" class="form-select">
                                                            <option value="0">Please select one or client</option>
                                                            <option
                                                                {{ $workOrder->status == 'To Schedule' ? 'selected' : '' }}
                                                                value="To Schedule">To Schedule</option>
                                                            <option {{ $workOrder->status == 'To Quote' ? 'selected' : '' }}
                                                                value="To Quote">To Quote</option>
                                                            <option
                                                                {{ $workOrder->status == 'Scheduled' ? 'selected' : '' }}
                                                                value="Scheduled">Scheduled</option>
                                                            <option
                                                                {{ $workOrder->status == 'Cancelled' ? 'selected' : '' }}
                                                                value="Cancelled">Cancelled</option>
                                                            <option {{ $workOrder->status == 'On Hold' ? 'selected' : '' }}
                                                                value="On Hold">On Hold</option>
                                                            <option
                                                                {{ $workOrder->status == 'Completed' ? 'selected' : '' }}
                                                                value="Completed">Completed</option>
                                                            <option
                                                                {{ $workOrder->status == 'Re-Attendance' ? 'selected' : '' }}
                                                                value="Re-Attendance">Re-Attendance</option>
                                                            <option
                                                                {{ $workOrder->status == 'In Progress' ? 'selected' : '' }}
                                                                value="In Progress">In Progress</option>
                                                            <option {{ $workOrder->status == 'Closed' ? 'selected' : '' }}
                                                                value="Closed">Closed</option>
                                                            <option
                                                                {{ $workOrder->status == 'Send Confirmation' ? 'selected' : '' }}
                                                                value="Send Confirmation">Send Confirmation</option>
                                                            <option
                                                                {{ $workOrder->status == 'Invoiced' ? 'selected' : '' }}
                                                                value="Invoiced">Invoiced</option>
                                                            <option
                                                                {{ $workOrder->status == 'To Invoice' ? 'selected' : '' }}
                                                                value="To Invoice">To Invoice</option>
                                                            <option
                                                                {{ $workOrder->status == 'Duplicated' ? 'selected' : '' }}
                                                                value="Duplicated">Duplicated</option>
                                                            <option
                                                                {{ $workOrder->status == 'PO Required' ? 'selected' : '' }}
                                                                value="PO Required">PO Required</option>
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
                                                            @if ($client_portfolios)
                                                                @forelse ($client_portfolios as $allclient_portfolios)
                                                                    <option
                                                                        {{ old('portfolio') == $allclient_portfolios->id ? 'selected' : ($workOrder->client_portfolio_id == $allclient_portfolios->id ? 'selected' : '') }}
                                                                        value="{{ $allclient_portfolios->id }}">
                                                                        {{ $allclient_portfolios->full_name }}</option>
                                                                @empty
                                                                @endforelse
                                                            @endif
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
                                                            @if ($allsites)
                                                                @foreach ($allsites as $site)
                                                                    <option
                                                                        {{ old('sitename') == $site->id ? 'selected' : ($workOrder->client_site_id == $site->id ? 'selected' : '') }}
                                                                        value="{{ $site->id }}">
                                                                        {{ Str::ucfirst($site->site_type) ?? '' }} -
                                                                        {{ $site->state->state_name ?? '' }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <span class="text-danger required_error" hidden>Site is
                                                            required</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="workorderType">Type <span class="red">*</span></label>
                                                        <select required data-plugin="customselect" name="type"
                                                            id="workorderType" onchange="checkJobType()"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($job_types)
                                                                @forelse ($job_types as $alljob_types)
                                                                    <option
                                                                        {{ $workOrder->job_type_id == $alljob_types->id ? 'selected' : '' }}
                                                                        value="{{ $alljob_types->id }}">
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
                                                        <label class="form-label" for="exampleInputEmail1">Reference Number <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="referenceno"  oninput="checkUniqueData(this,'reference_number','{{$workOrder->reference_number}}')" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp"
                                                            value="{{ old('referenceno') ?? $workOrder->reference_number }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="exampleInputEmail1">Requester</label>
                                                        <input type="text" class="form-control" name="requester"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder=""
                                                            value="{{ old('requester') ?? $workOrder->requester }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1"> Completion
                                                            Date <span class="red">*</span></label>
                                                        <input required type="date"
                                                            class="form-control basic-datepicker" name="completionDate"
                                                            value="{{ old('completionDate') ?? $workOrder->completion_date }}"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('completiondate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1"> Start Time
                                                            <span class="red">*</span></label>
                                                        <input type="text" required
                                                            class="form-control basic-timepicker" name="starttime"
                                                            aria-describedby="emailHelp"
                                                            value="{{ old('starttime') ?? $workOrder->start_time }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Schedule Date
                                                            <span class="red">*</span></label>
                                                        <input type="text" required
                                                            class="form-control basic-datepicker" name="scheduledate"
                                                            aria-describedby="emailHelp"
                                                            value="{{ old('scheduledate') ?? $workOrder->schedule_date }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label"
                                                            for="exampleInputEmail1">Priority</label>
                                                        <select data-plugin="customselect" name="priority"
                                                            class="form-select">
                                                            <option
                                                                {{ old('priority') == 'LOW' ? 'selected' : ($workOrder->priority == 'LOW' ? 'selected' : '') }}
                                                                value="LOW">Low</option>
                                                            <option
                                                                {{ old('priority') == 'MEDIUM' ? 'selected' : ($workOrder->priority == 'MEDIUM' ? 'selected' : '') }}
                                                                value="MEDIUM">Medium</option>
                                                            <option
                                                                {{ old('priority') == 'HIGH' ? 'selected' : ($workOrder->priority == 'HIGH' ? 'selected' : '') }}
                                                                value="HIGH">High</option>
                                                            <option
                                                                {{ old('priority') == 'URGENT' ? 'selected' : ($workOrder->priority == 'URGENT' ? 'selected' : '') }}
                                                                value="URGENT">Urgent</option>
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
                                                                    <option
                                                                        {{ old('department') == $alldepartments->id ? 'selected' : ($workOrder->department_id == $alldepartments->id ? 'selected' : '') }}
                                                                        value="{{ $alldepartments->id }}">
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
                                                                        name="is_change_client" type="checkbox"
                                                                        {{ old('is_change_client') == '1' ? 'checked' : ($workOrder->is_change_client == '1' ? 'checked' : '') }}>
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
                                                                        name="is_quite_work_order" type="checkbox"
                                                                        {{ old('is_quite_work_order') == '1' ? 'checked' : ($workOrder->is_quote_work_order == '1' ? 'checked' : '') }}>
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
                                                            name="salesprice" class="form-control"
                                                            value="{{ old('salesprice') ?? $workOrder->sales_price }}"
                                                            id="salesPrice" aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="budget">Budget</label>
                                                        <input type="number" step="any" min="0"
                                                            name="budget" class="form-control"
                                                            value="{{ old('budget') ?? $workOrder->budget }}"
                                                            id="budget" aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="timeallocated">Time
                                                            Allocated</label>
                                                        <input type="number" name="timeallocated" min="0"
                                                            class="form-control"
                                                            value="{{ old('timeallocated') ?? $workOrder->time_allocated }}"
                                                            id="timeallocated" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                @can('work-order-edit-invoice-number')
                                                    <div class="col-lg-2">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="invoicenumber">Invoice
                                                                Number</label>
                                                            <input type="text" name="invoicenumber" class="form-control"
                                                                id="invoicenumber"
                                                                value="{{ old('invoicenumber') ?? $workOrder->invoice_number }}"
                                                                aria-describedby="emailHelp" placeholder="">
                                                        </div>
                                                    </div>
                                                @endcan
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="poworkbill">PO / Work Bill</label>
                                                        <input type="text" name="workbill"
                                                            class="form-control" id="poworkbill"
                                                            aria-describedby="emailHelp"
                                                            value="{{ old('workbill') ?? $workOrder->po_work_bill }}"
                                                            placeholder="">
                                                        @error('workbill')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Description <span
                                                                class="red">*</span> </label>
                                                        <textarea name="description" required class="form-control">{{ old('description') ?? $workOrder->description }}</textarea>
                                                        @error('description')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">History</label>
                                                        <textarea name="history" class="form-control">{{ old('history') ?? $workOrder->history }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Internal Communication</label>
                                                        <textarea name="internalnamcommunity" class="form-control">{{ old('internalnamcommunity') ?? $workOrder->internal_communication }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Attachment</label>
                                                        <input name="uploadAttachemt" type="file"
                                                            @if ($workOrder->attachment) data-default-file="{{ url(env('STORE_PATH') . $workOrder->attachment) }}" @endif
                                                            class="dropify" data-height="100" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- main_bx_dt -->
                                </div>
                                <div class="tab-pane @if ($errors->first('tab_name') == 'client_work_order') show active @endif"
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
                                                        <label class="form-label" for="woReferenceno">Reference
                                                            Number</label>
                                                        <input type="text" id="woReferenceno" class="form-control"
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


                                                <div class="col-lg-12">
                                                    <div class="add_address text-end">
                                                        <button type="button" onclick="clientWorkOrder()"
                                                            class="theme_btn btn add_btn">+  Add Client Work Order</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mt-2">
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
                                                            @if ($client_work_order)
                                                                @foreach ($client_work_order as $clientworder)
                                                                    <tr
                                                                        id="clientwro{{ $clientworder->id }}{{ time() }}">
                                                                        <td>{{ $clientworder->task_description }}</td>
                                                                        <td>{{ $clientworder->reference_number }}</td>
                                                                        <td>{{ $clientworder->po_work_bill }}</td>
                                                                        <td>{{ $clientworder->invoice_number }}</td>
                                                                        <td>{{ $clientworder->sales_price }}</td>
                                                                        <td>{{ $clientworder->extra_charge }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                onclick="deleteRecordTbl('{{ $clientworder->id }}','ClientWorkOrder','clientwro{{ $clientworder->id }}{{ time() }}')"
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                <i class="uil-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- main_bx_dt -->

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
                                                        @if ($comment_work_order)
                                                            @foreach ($comment_work_order as $commentworder)
                                                                <tr
                                                                    id="comment{{ $commentworder->id }}{{ time() }}">
                                                                    <td>{{ date('d F Y', strtotime($commentworder->created_at)) }}
                                                                    </td>
                                                                    <td>{{ $commentworder->user->name ?? '-' }}</td>
                                                                    <td>{{ $commentworder->comment }}</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            onclick="deleteRecordTbl('{{ $commentworder->id }}','WorkOrderComment','comment{{ $commentworder->id }}{{ time() }}')"
                                                                            class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                            <i class="uil-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
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
                                                                        ({{ $cleaner->email }})</option>
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
                                                        <input type="number" id="cleaner_hours" min="0"
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
                                                            class="form-control basic-datepicker required_fields"
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
                                                        <!-- <a href="#" class="theme_btn btn btn-primary"><i class="bi-arrow-repeat"></i> Reset</a> -->
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
                                                            @if ($cleaner_work_order)
                                                                @foreach ($cleaner_work_order as $cleanerworder)
                                                                    <tr
                                                                        id="cleaner{{ $cleanerworder->id }}{{ time() }}">
                                                                        <td class="cleaner_levelTblClass"><span hidden
                                                                                class="spanHideVal">{{ $cleanerworder->cleaner_id }}</span>
                                                                            {{ $cleanerworder->cleaner->name ?? '-' }}
                                                                            ({{ $cleanerworder->cleaner->email }})</td>
                                                                        <td>{{ $cleanerworder->work_hours }}</td>
                                                                        <td>{{ $cleanerworder->work_budget }}</td>
                                                                        <td>{{ $cleanerworder->date_attendance }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                onclick="deleteRecordTbl('{{ $cleanerworder->id }}','WorkOrderCleaner','cleaner{{ $cleanerworder->id }}{{ time() }}')"
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                <i class="uil-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
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
                                                        <input type="number" min="0" step="any"
                                                            class="form-control" id="contractorCost"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="dataattendance">Date Attendance <span
                                                                class="red">*</span></label>
                                                        <input type="text"
                                                            class="form-control basic-datepicker required_fields"
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
                                                            @if ($contractor_work_order)
                                                                @foreach ($contractor_work_order as $contractorworder)
                                                                    <tr
                                                                        id="contractor{{ $contractorworder->id }}{{ time() }}">
                                                                        <td class="inputcontractorTblClass"><span
                                                                                class="spanhideData">{{ $contractorworder->id }}</span>
                                                                            {{ $contractorworder->contractor->name }}</td>
                                                                        <td>{{ $contractorworder->work_hours }}</td>
                                                                        <td>{{ $contractorworder->work_cost }}</td>
                                                                        <td>{{ date('d F Y', strtotime($contractorworder->date_attendance)) }}
                                                                        </td>
                                                                        <td>
                                                                            <button type="button"
                                                                                onclick="deleteRecordTbl('{{ $contractorworder->id }}','WorkOrderContractor','contractor{{ $contractorworder->id }}{{ time() }}')"
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                <i class="uil-trash"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endcan
                                <div class="tab-pane @if ($errors->first('tab_name') == 'emails') show active @endif"
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
                                                        @if ($email_work_order)
                                                            @foreach ($email_work_order as $emailorworder)
                                                                <tr
                                                                    id="cemail{{ $emailorworder->id }}{{ time() }}">
                                                                    <td class="wo_emailsTblClass"><span
                                                                            class="allemailcheck">{{ $emailorworder->email }}</span>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            onclick="deleteRecordTbl('{{ $emailorworder->id }}','WorkOrderEmail','cemail{{ $emailorworder->id }}{{ time() }}')"
                                                                            class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                            <i class="uil-trash"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
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
                        </form>
                    </div>
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


        $(document).ready(function() {
            // $('#add_address_trfields').hide();
            // $('.add_document_table').hide();
            // $('#add_contractor_table').hide();
            // $("#divmultipalshift").hide();
            // $("#add_department_table").hide();
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
                    $(".cleaner_levelTblClass span.spanHideVal").each(function() {
                        if (this.textContent === cleaner_level) {
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
                                    <span class="spanHideVal" hidden>${cleaner_level}></span>
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
                    let microtime = Date.now();

                    let exists = false;
                    $(".inputcontractorTblClass span.spanhideData").each(function() {
                        if (this.textContent === newcontractor[inputcontractor]['name']) {
                            exists = true;
                        }
                    });
                    if (exists) {
                        $("#inputcontractor").next('.select2-container').find('.select2-selection').addClass(
                            'invalid-select');
                        $("#inputcontractor").next('span').after(
                            '<span class="custom_error text-danger">Already added in list.</span>');
                    } else {
                        let contractortr = `
                            <tr id="contractortr${microtime}">
                                <td class="inputcontractorTblClass">
                                    <span hidden class="spanhideData">${inputcontractor}</span>
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
                let microtime = Date.now();

                $("#commentInputError").attr('hidden', true);
                if (!writtenComment || writtenComment == "") {
                    $("#commentInputError").attr('hidden', false);
                } else {
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
                    $(".wo_emailsTblClass span.allemailcheck").each(function() {
                        if (this.textContent === wo_emails) {
                            exists = true;
                        }
                    });
                    if (exists) {
                        $("#wo_emails").addClass('is-invalid');
                        $("#wo_emails").next('span').after(
                            '<span class="custom_error text-danger">Already added in list.</span>');
                    } else {
                        let add_woemail_table = `
                            <tr id="woemail${microtime}">
                                <td class="wo_emailsTblClass"><input type="hidden" name="wo_email[]" value="${wo_emails}">
                                    <span class="allemailcheck">${wo_emails}</span></td>
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


        function deleteRecordTbl(docId, table_name, divname) {
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
                                "table_name": table_name
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
    </script>



    <script>
        $("#client_idselect").change(function() {
            let clientid = $(this).val();
            let oldSelectSite = "{{ $workOrder->client_site_id ?? 0 }}";
            let oldSelectPortfolio = "{{ $workOrder->client_portfolio_id ?? 0 }}";
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
                    // console.log(oldSelectSite,oldSelectPortfolio);
                    if (data.status) {
                        let dataPort = data.data;
                        let sitesData = data.sites;

                        $.each(dataPort, function(index, item) {
                            $('#portfolio_idselect').append($('<option>', {
                                value: item
                                .id, // replace 'value' with the actual property name in your data
                                text: item
                                .full_name, // replace 'text' with the actual property name in your data
                                selected: (item.id == oldSelectPortfolio)
                            }));
                        });
                        $.each(sitesData, function(index, item) {
                            $('#site_idselect').append($('<option>', {
                                value: item.site
                                .id, // replace 'value' with the actual property name in your data
                                text: item.site
                                .reference, // replace 'text' with the actual property name in your data
                                selected: (item.id == oldSelectSite)
                            }));
                        });
                        $("#portfolio_idselect").trigger('change');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        $("#portfolio_idselect").change(function() {
            let portfolio_id = $(this).val();
            let oldSelectSite = "{{ $workOrder->client_site_id ?? 0 }}";
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
                                .reference, // replace 'text' with the actual property name in your data
                                selected: (item.id == oldSelectSite)
                            }));
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });

        $("#client_idselect").trigger('change');


    </script>
     @include('common.footer_validation', ['validate_url_path' => 'work-order.unique-check'])
@endpush
