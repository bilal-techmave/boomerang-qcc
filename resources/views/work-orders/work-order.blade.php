@extends('layouts.main')
@section('app-title', 'Work Order - Quality Commercial Cleaning')
@section('main-content')

    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Work Order</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Work Order</li>
                            <li class="breadcrumb-item active">New Work Order</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>Filters</h5>
                        </div>
                    </div>
                    <form action="" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="client_idselect">Client</label>
                                        <select data-plugin="customselect" class="form-select" name="clients" id="client_idselect">
                                            <option value="0">Please select one or start typing</option>
                                            @if ($clients)
                                                @foreach ($clients as $cl)
                                                    <option value="{{ $cl->id }}" {{ request('clients') == $cl->id ? 'selected' : '' }}>{{ $cl->business_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="portfolio_idselect">Portfolio</label>
                                        <select data-plugin="customselect" class="form-select" id="portfolio_idselect"  name="portfolio">
                                            <option value="0">Please select one or start typing</option>
                                            @if ($portfolios)
                                                @foreach ($portfolios as $portfolio)
                                                    <option value="{{ $portfolio->id }}" {{ request('portfolio') == $portfolio->id ? 'selected' : '' }}> {{ $portfolio->full_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="site_idselect">Site</label>
                                        <select data-plugin="customselect" class="form-select" id="site_idselect" name="allsites">
                                            <option value="0">Please select one or start typing</option>
                                            @if ($allsites)
                                                @foreach ($allsites as $site)
                                                    <option value="{{ $site->id }}"
                                                        {{ request('allsites') == $site->id ? 'selected' : '' }}>
                                                        {{ Str::ucfirst($site->site_type) ?? '' }} -
                                                        {{ $site->state->state_name ?? '' }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-0">
                                        <label class="form-label" for="exampleInputEmail1">Department</label>
                                        <select data-plugin="customselect" class="form-select" name="departments">
                                            <option value="">Please select one or start typing</option>
                                            @if ($departments)
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ request('departments') == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-0">
                                        <label class="form-label" for="exampleInputEmail1">Status</label>
                                        {{-- <input type="text" name="status" value="{{ request('status') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""> --}}
                                        <select data-plugin="customselect" class="form-select" multiple="multiple"
                                            name="status[]">
                                            <option value="">Please select one or start typing</option>
                                            <option
                                                value="To Schedule"{{ request('status') && in_array('To Schedule', request('status')) ? 'selected' : '' }}>
                                                To Schedule</option>
                                            <option value="To Quote"
                                                {{ request('status') && in_array('To Quote', request('status')) ? 'selected' : '' }}>
                                                To Quote</option>
                                            <option value="Scheduled"
                                                {{ request('status') && in_array('Scheduled', request('status')) ? 'selected' : '' }}>
                                                Scheduled</option>
                                            <option value="Cancelled"
                                                {{ request('status') && in_array('Cancelled', request('status')) ? 'selected' : '' }}>
                                                Cancelled</option>
                                            <option value="On Hold"
                                                {{ request('status') && in_array('On Hold', request('status')) ? 'selected' : '' }}>
                                                On Hold</option>
                                            <option value="Completed"
                                                {{ request('status') && in_array('Completed', request('status')) ? 'selected' : '' }}>
                                                Completed</option>
                                            <option value="Re-Attendance"
                                                {{ request('status') && in_array('Re-Attendance', request('status')) ? 'selected' : '' }}>
                                                Re-Attendance</option>
                                            <option value="In Progress"
                                                {{ request('status') && in_array('In Progress', request('status')) ? 'selected' : '' }}>
                                                In Progress</option>
                                            <option value="Closed"
                                                {{ request('status') && in_array('Closed', request('status')) ? 'selected' : '' }}>
                                                Closed</option>
                                            <option value="Send Confirmation"
                                                {{ request('status') && in_array('Send Confirmation', request('status')) ? 'selected' : '' }}>
                                                Send Confirmation</option>
                                            <option value="Invoiced"
                                                {{ request('status') && in_array('Invoiced', request('status')) ? 'selected' : '' }}>
                                                Invoiced</option>
                                            <option value="To Invoice"
                                                {{ request('status') && in_array('To Invoice', request('status')) ? 'selected' : '' }}>
                                                To Invoice</option>
                                            <option value="Duplicated"
                                                {{ request('status') && in_array('Duplicated', request('status')) ? 'selected' : '' }}>
                                                Duplicated</option>
                                            <option value="PO Required"
                                                {{ request('status') && in_array('PO Required', request('status')) ? 'selected' : '' }}>
                                                PO Required</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-0">
                                        <label class="form-label" for="exampleInputEmail1">Reference Number</label>
                                        <input type="text" class="form-control"
                                            value="{{ request('reference_number') }}"
                                            name="reference_number"id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-2 ">
                                    <div class="add_address text-end">
                                        <a href="javascript:void(0)" class="theme_btn btn add_btn "
                                            id="advanced_search_btn">Advanced
                                            Filter <i class="bi-filter"></i></a>
                                        <!-- <a href="#" class="theme_btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_contact_modal">+ Create contact</a> -->
                                    </div>
                                </div>

                            </div>
                            <div class="row advanced_filter mt-3">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Schedule Date Start</label>
                                        <input type="text" value="{{ request('sch_date_start') }}"
                                            name="sch_date_start" class="form-control basic-datepicker"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Schedule Date Finish</label>
                                        <input type="text" value="{{ request('sch_date_finish') }}"
                                            name="sch_date_finish" class="form-control basic-datepicker"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Required Completion Date
                                            Start</label>
                                        <input type="text" value="{{ request('req_comp_date_start') }}"
                                            name="req_comp_date_start" class="form-control basic-datepicker"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Required Completion Date
                                            Finish</label>
                                        <input type="text" value="{{ request('req_comp_date_finish') }}"
                                            name="req_comp_date_finish" class="form-control basic-datepicker"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">PO / Work Bill</label>
                                        <input type="text" value="{{ request('work_bill') }}" name="work_bill"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="">
                                    </div>
                                </div>


                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">State </label>
                                        <select data-plugin="customselect" class="form-select" name="state">
                                            <option value="0">Please select one or start typing</option>
                                            @if ($states)
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ request('state') == $state->id ? 'selected' : '' }}>
                                                        {{ $state->state_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">City </label>
                                        <select data-plugin="customselect" class="form-select" name="city">
                                            <option value="0">Please select one or start typing</option>
                                            @if ($cities)
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ request('city') == $city->id ? 'selected' : '' }}>
                                                        {{ $city->city_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">WO#</label>
                                        <input type="text" value="{{ request('woork_order') }}" name="woork_order"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Type</label>
                                        <select data-plugin="customselect" class="form-select" name="type">
                                            <option value="0">Please select one or start typing</option>
                                            @if ($job_types)
                                                @foreach ($job_types as $jtype)
                                                    <option value="{{ $jtype->id }}"
                                                        {{ request('type') == $jtype->id ? 'selected' : '' }}>
                                                        {{ $jtype->name }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Invoice Number</label>
                                        <input type="text" value="{{ request('invoice_no') }}" name="invoice_no"
                                            class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Supervisor</label>
                                        <select data-plugin="customselect" class="form-select" name="supervisor">
                                            <option value="0">Please select one or start typing</option>
                                            @if ($supervisors)
                                                @foreach ($supervisors as $supervisor)
                                                    <option value="{{ $supervisor->id }}"
                                                        {{ request('supervisor') == $supervisor->id ? 'selected' : '' }}>
                                                        {{ $supervisor->name }}
                                                        {{ $supervisor->surname ?? '' }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Portfolio Manager</label>
                                        <select data-plugin="customselect" class="form-select" name="portfolio_manager">
                                            <option value="0">Please select one or start typing</option>
                                            @foreach ($portfolio_manager as $manager)
                                                <option value="{{ $manager->id }}"
                                                    {{ request('portfolio_manager') == $manager->id ? 'selected' : '' }}>
                                                    {{ $manager->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Completion Date Start</label>
                                    <input type="text" value="{{ request('comp_date_start') }}" name="comp_date_start" class="form-control basic-datepicker" id="basic-datepicker5"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Completion Date Finish</label>
                                    <input type="text" value="{{ request('comp_date_finish') }}" name="comp_date_finish" class="form-control basic-datepicker" id="basic-datepicker6"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div> --}}
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Creation Date From</label>
                                        <input type="text" value="{{ request('cre_date_from') }}"
                                            name="cre_date_from" class="form-control basic-datepicker"
                                            id="basic-datepicker7" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Creation Date To</label>
                                        <input type="text" value="{{ request('cre_date_to') }}" name="cre_date_to"
                                            class="form-control basic-datepicker" id="basic-datepicker8"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="theme_btn btn save_btn"><i class="uil-search-alt"
                                            id="work_search"> Search</i></button>
                                    {{-- <a href="#" class="theme_btn btn save_btn"><i class="uil-search-alt"
                                        id="work_search"> Search</i></a> --}}
                                    <a href="{{ route('work-order.work-order.index') }}"
                                        class="theme_btn btn btn-warning"><i class="bi-arrow-repeat"></i> Reset
                                        Filter</i></a>
                                    <!-- <a href="#" class="theme_btn btn ">+ Add New Site</i></a> -->
                                    <!-- <a href="#" class="theme_btn btn excel-btn"><i class="bi-file-earmark-excel"></i> Export
                                            Excel File</i></a> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="card ">
                    <div class="card-body">
                        <div class="box_main_">
                            <!-- Widget 1 Start -->
                            @foreach ($statusCounts as $key=>$count)
                            <div class="box_status">
                                <div class=" rounded-3 pt2 pb5 text-center">
                                    <h6 class="text-white mb0 card_title">{{$key}}</h6>
                                </div>
                                <div class="card shadow-card p5 text-center mtn4">
                                    <h1 class="mb1">{{$count}}</h1>

                                </div>
                            </div>
                            <!-- Widget 1 End -->
                            @endforeach

                            <!-- Widget 9 Start -->
                            <div class="box_status">
                                <div class="rounded-3 pt2 pb5 text-center">
                                    <h6 class="text-white mb0 card_title">All</h6>
                                </div>
                                <div class="card shadow-card p5 text-center mtn4">
                                    <h1 class="mb1">{{count($allworkOrder)}}</h1>

                                </div>
                            </div>
                            <!-- Widget 9 End -->
                        </div>
                    </div>
                </div>
                <div class="card">

                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>All Work Order</h5>
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['work-order-create']))
                            <a href="{{ route('work-order.work-order.create') }}" class="btn btn-primary">+ Add New Work
                                Order</a>
                                @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                {{-- <div class="table_box"> --}}
                                    <div class="table-responsive">
                                    <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Department</th>
                                                <th>Invoice Number</th>
                                                <th>Work Order Number</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Reference Number</th>
                                                <th>Client</th>
                                                <th>Portfolio</th>
                                                <th>Portfolio Manager</th>
                                                <th>Site</th>
                                                <th>Status</th>
                                                <th>Type</th>
                                                <th>Required Completion Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($allworkOrder)
                                                @foreach ($allworkOrder as $workorder)
                                                    <tr role="row" >
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $workorder->department->name ?? '-' }}</td>
                                                        <td>{{ $workorder->invoice_number }}</td>
                                                        <td>WO#000{{ $workorder->id }}</td>
                                                        <td>{{ $workorder->site->state->state_name ?? '-' }}</td>
                                                        <td>{{ $workorder->site->city->city_name ?? '-' }}</td>
                                                        <td>{{ $workorder->reference_number ?? '-' }}</td>
                                                        <td>{{ $workorder->client->business_name ?? '-' }}</td>
                                                        <td>{{ $workorder->portfolio->full_name ?? '-' }}</td>
                                                        <td>{{ $workorder->portfolio->manager->name ?? '-' }}</td>
                                                        <td>{{ $workorder->site->site_type ?? '' }} -
                                                            {{ $workorder->site->reference ?? '' }}</td>
                                                        <td>{{ $workorder->status ?? '-' }}</td>
                                                        <td>{{ $workorder->jobtype->name ?? '-' }}</td>
                                                        <td>{{ date('d F Y', strtotime($workorder->completion_date)) }}
                                                        </td>

                                                        <td>
                                                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['work-order-view']))
                                                            <a
                                                                href="{{ route('work-order.work-order.show', ['work_order' => $workorder->id]) }}">
                                                                <span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                    <i class="uil-eye"></i>
                                                                </span>
                                                            </a>
                                                            @endif
                                                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['work-order-view']))
                                                            <a
                                                                href="{{ route('work-order.work-order.cleaner.view', ['id' => $workorder->id]) }}">
                                                                <span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                    <i class="uil uil-constructor"></i>
                                                                </span>
                                                            </a>
                                                            @endif

                                                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['work-order-edit']))
                                                            <a
                                                                href="{{ route('work-order.work-order.edit', ['work_order' => $workorder->id]) }}">
                                                                <span
                                                                    class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                                    <i class="uil-edit"></i>
                                                                </span>
                                                            </a>
                                                            @endif
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
                </div>
            </div>
        </div>
    </div>
@endsection
@push('push_script')
    <script>
        $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
    </script>
    @if (request('sch_date_start') ||
            request('sch_date_finish') ||
            request('req_comp_date_start') ||
            request('req_comp_date_finish') ||
            request('work_bill') ||
            request('state') ||
            request('city') ||
            request('woork_order') ||
            request('type') ||
            request('invoice_no') ||
            request('supervisor') ||
            request('portfolio_manager') ||
            request('cre_date_from') ||
            request('cre_date_to'))
        <script>
            // alert();
            $('.advanced_filter').css("display","block")
        </script>
    @endif

    <script>
         $("#client_idselect").change(function(){
        let clientid = $(this).val();

        $.ajax({
            url: "{{ route('common.client-portfolio') }}",
            type: 'POST',
            data: {
                client_id:clientid
            },
            dataType: 'json',
            success: function (data) {
                if(data.status){
                    $("#portfolio_idselect").empty();
                    $("#site_idselect").empty();
                    let dataPort = data.data;
                    let sitesData = data.sites;
                    $('#portfolio_idselect').append($('<option>', {
                            value: 0, // replace 'value' with the actual property name in your data
                            text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
                        }));
                    $('#site_idselect').append($('<option>', {
                            value: 0, // replace 'value' with the actual property name in your data
                            text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
                        }));
                    $.each(dataPort, function(index, item) {
                        $('#portfolio_idselect').append($('<option>', {
                            value: item.id, // replace 'value' with the actual property name in your data
                            text: item.full_name // replace 'text' with the actual property name in your data
                        }));
                    });
                    $.each(sitesData, function(index, item) {
                        $('#site_idselect').append($('<option>', {
                            value: item.site.id, // replace 'value' with the actual property name in your data
                            text: item.site.reference // replace 'text' with the actual property name in your data
                        }));
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    });

    $("#portfolio_idselect").change(function(){
        let portfolio_id = $(this).val();

        $.ajax({
            url: "{{ route('common.client-portfolio') }}",
            type: 'POST',
            data: {
                portfolio_id:portfolio_id
            },
            dataType: 'json',
            success: function (data) {
                if(data.status){
                    $("#site_idselect").empty();
                    let dataPort = data.data;
                    $('#site_idselect').append($('<option>', {
                            value: 0, // replace 'value' with the actual property name in your data
                            text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
                        }));
                    $.each(dataPort, function(index, item) {
                        $('#site_idselect').append($('<option>', {
                            value: item.site.id, // replace 'value' with the actual property name in your data
                            text: item.site.reference // replace 'text' with the actual property name in your data
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

@endpush
