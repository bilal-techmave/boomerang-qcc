@extends('layouts.main')
@section('app-title', 'Tickets - Quality Commercial Cleaning')
@section('main-content')
    <style>
        .red_col__ {
            color: red
        }

        .yellow_col__ {
            color: rgb(255 197 7)
        }

        .blue_col__ {
            color: blue
        }

        .grey_col__ {
            color: grey
        }
    </style>
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Tickets</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Tickets</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ route('admin.ticket.index') }}" method="get">
                        <div class="card-header">
                            <div class="top_section_title">
                                <h5>Filters</h5>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Client</label>
                                        <select data-plugin="customselect" id="client_idselect" name="client_id"
                                            class="form-select">
                                            <option value="">Please select one or start typing </option>
                                            @forelse ($client as $allclients)
                                                <option value="{{ $allclients->id }}"
                                                    @if ($client_id == $allclients->id) {{ 'selected' }} @endif>
                                                    {{ $allclients->business_name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Portfolio</label>
                                        <select data-plugin="customselect" id="portfolio_idselect" name="protfolio_id"
                                            class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @forelse ($portfolio as $allportfolio)
                                                <option value="{{ $allportfolio->id }}"
                                                    @if ($protfolio_id == $allportfolio->id) {{ 'selected' }} @endif>
                                                    {{ $allportfolio->full_name }} - ({{ $allportfolio->short_name }})
                                                </option>
                                            @empty
                                            @endforelse


                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Site</label>
                                        <select data-plugin="customselect" id="site_idselect" name="site_id"
                                            class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @forelse ($clientSite as $site)
                                                <option value="{{ $site->id }}"
                                                    @if ($site_id == $site->id) {{ 'selected' }} @endif>
                                                    {{ $site->reference ?? '' }}
                                                </option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Type</label>
                                        <select data-plugin="customselect" name="type_id" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            <option value="Annual Leave Request"
                                                {{ request('type_id') == 'Annual Leave Request' ? 'selected' : '' }}>Annual
                                                Leave Request</option>
                                            <option value="Change Over Request"
                                                {{ request('type_id') == 'Change Over Request' ? 'selected' : '' }}>Change
                                                Over Request</option>
                                            <option value="Client Request"
                                                {{ request('type_id') == 'Client Request' ? 'selected' : '' }}>Client Request
                                            </option>
                                            <option value="Client Setup"
                                                {{ request('type_id') == 'Client Setup' ? 'selected' : '' }}>Client Setup
                                            </option>
                                            <option value="Complaint"
                                                {{ request('type_id') == 'Complaint' ? 'selected' : '' }}>Complaint</option>
                                            <option value="Consumables Order"
                                                {{ request('type_id') == 'Consumables Order' ? 'selected' : '' }}>Consumables
                                                Order</option>
                                            <option value="Employee Setup"
                                                {{ request('type_id') == 'Employee Setup' ? 'selected' : '' }}>Employee Setup
                                            </option>
                                            <option value="Employee Termination"
                                                {{ request('type_id') == 'Employee Termination' ? 'selected' : '' }}>Employee
                                                Termination</option>
                                            <option value="Feedback" {{ request('type_id') == 'Feedback' ? 'selected' : '' }}>
                                                Feedback</option>
                                            <option value="General Material Order"
                                                {{ request('type_id') == 'General Material Order' ? 'selected' : '' }}>General
                                                Material Order</option>
                                            <option value="IT Support"
                                                {{ request('type_id') == 'IT Support' ? 'selected' : '' }}>IT Support</option>
                                            <option value="Material Request Through Client"
                                                {{ request('type_id') == 'Material Request Through Client' ? 'selected' : '' }}>
                                                Material Request Through Client</option>
                                            <option value="Reimbursement"
                                                {{ request('type_id') == 'Reimbursement' ? 'selected' : '' }}>Reimbursement
                                            </option>
                                            <option value="Service Request"
                                                {{ request('type_id') == 'Service Request' ? 'selected' : '' }}>Service
                                                Request</option>
                                            <option value="Sick Leave"
                                                {{ request('type_id') == 'Sick Leave' ? 'selected' : '' }}>Sick Leave</option>
                                            <option value="Termination"
                                                {{ request('type_id') == 'Termination' ? 'selected' : '' }}>Termination
                                            </option>
                                            <option value="Request of Change"
                                                {{ request('type_id') == 'Request of Change' ? 'selected' : '' }}>Request of
                                                Change</option>
                                            <option value="Others" {{ request('type_id') == 'Others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Priority</label>
                                        <select data-plugin="customselect" name="priority_id" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            <option value="LOW"
                                                @if ($priority_id == 'LOW') {{ 'selected' }} @endif>Low</option>
                                            <option value="MEDIUM"
                                                @if ($priority_id == 'MEDIUM') {{ 'selected' }} @endif>Medium
                                            </option>
                                            <option value="HIGH"
                                                @if ($priority_id == 'HIGH') {{ 'selected' }} @endif>High</option>
                                            <option value="URGENT"
                                                @if ($priority_id == 'URGENT') {{ 'selected' }} @endif>Urgent
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Responsible</label>
                                        <select data-plugin="customselect" name="responsible_id" class="form-select">
                                            <option value="">Select the responsible</option>
                                            @forelse ($responsible as $assigned_user)
                                                <option value="{{ $assigned_user->id }}"
                                                    {{ request('responsible_id') == $assigned_user->id ? 'selected' : '' }}>
                                                    {{ $assigned_user->name }} - ({{ $assigned_user->email }})</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Department</label>
                                        <select data-plugin="customselect" name="department_id" class="form-select">
                                            <option value="">Select the department</option>
                                            @forelse ($departments as $alldepartments)
                                                <option value="{{ $alldepartments->id }}"
                                                    {{ request('department_id') == $alldepartments->id ? 'selected' : '' }}>
                                                    {{ $alldepartments->name }} - ({{ $alldepartments->email }})</option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Creator</label>
                                        <select data-plugin="customselect" name="creator_id" class="form-select">
                                            <option value="">Select the Creator</option>
                                            @foreach ($creator as $creators)
                                                <option value="{{ $creators->id }}"
                                                    {{ request('creator_id') == $creators->id ? 'selected' : '' }}>
                                                    {{ $creators->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Ticket Participant</label>
                                        <select data-plugin="customselect" name="ticket_participant_id"
                                            class="form-select">
                                            <option value="">Select the Participant</option>
                                            @forelse ($user as $alluser)
                                                <option value="{{ $alluser->id }}"
                                                    {{ request('ticket_participant_id') == $alluser->id ? 'selected' : '' }}>
                                                    {{ $alluser->name }} - ({{ $alluser->email }})</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Reference Number</label>
                                        <input type="text" class="form-control" value="{{ $reference_number }}"
                                            name="reference_number" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Ticket Status</label>
                                        <select data-plugin="customselect" class="form-select" multiple="multiple"
                                            name="status[]">
                                            <option value="">Please select one or start typing</option>
                                            <option
                                                value="Open"{{ request('status') && in_array('Open', request('status')) ? 'selected' : '' }}>
                                                Open</option>
                                            <option value="In Progress"
                                                {{ request('status') && in_array('In Progress', request('status')) ? 'selected' : '' }}>
                                                In Progress</option>
                                            <option value="Solved"
                                                {{ request('status') && in_array('Solved', request('status')) ? 'selected' : '' }}>
                                                Solved</option>
                                            <option value="Closed"
                                                {{ request('status') && in_array('Closed', request('status')) ? 'selected' : '' }}>
                                                Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Ticket Number</label>
                                        <input type="text" class="form-control" name="ticket_number"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Creation Date From</label>
                                        <input type="text" class="form-control basic-datepicker"
                                            value="{{ request('creation_date_from') }}" name="creation_date_from"
                                            id="basic-datepicker" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Creation Date To</label>
                                        <input type="text" class="form-control basic-datepicker"
                                            value="{{ request('creation_date_to') }}" name="creation_date_to"
                                            id="basic-datepicker2" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Due Date From</label>
                                        <input type="text" class="form-control basic-datepicker"
                                            value="{{ request('due_date_from') }}" name="due_date_from"
                                            id="basic-datepicker3" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Due Date</label>
                                        <input type="text" class="form-control basic-datepicker" name="due_date_to"
                                            value="{{ request('due_date_to') }}" id="basic-datepicker4"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="theme_btn btn save_btn"><i
                                            class="uil-search-alt">Search</i></button>
                                    <a href="{{ route('admin.ticket.index') }}" class="theme_btn btn btn-warning"><i
                                            class="bi-arrow-repeat"></i> Reset Filter</i></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card">

                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>All Tickets</h5>
                            @can('ticket-create')
                                <a href="{{ route('admin.ticket.create') }}" class="btn btn-primary">+ Add New Ticket</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="table-responsive">
                                    <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Priority</th>
                                                <th>Ticket Number</th>
                                                <th>Reference Number</th>
                                                <th>Type</th>
                                                <th>Subject</th>
                                                <th>Date Issued</th>
                                                <th>Department</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($ticket as $allticket)
                                                <tr class="status-ticket-high odd @if ($allticket->priority == 'Urgent') red_col__ @elseif ($allticket->priority == 'High') yellow_col__ @elseif ($allticket->priority == 'Medium') blue_col__ @elseif ($allticket->priority == 'Low') grey_col__ @endif"
                                                    role="row">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td class="sorting_1 ">{{ $allticket->priority ?? 'N/A' }}</td>
                                                    <td>{{ $allticket->ticket_id ?? 'N/A' }}</td>
                                                    <td>{{ $allticket->reference_number ?? 'N/A' }}</td>
                                                    <td>{{ $allticket->type ?? 'N/A' }}</td>
                                                    <td class="max-lines">{{ $allticket->subject ?? 'N/A' }}</td>
                                                    <td>{{ $allticket->created_at ?? 'N/A' }}</td>
                                                    <td>{{ $allticket->getDepartments->name ?? 'N/A' }}</td>
                                                    <td>{{ $allticket->status ?? 'N/A' }}</td>
                                                    <td>
                                                        @can('ticket-view')
                                                            <a href=" {{ route('ticket.view', ['id' => $allticket->id]) }}">
                                                                <span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                    <i class="uil-eye"></i>
                                                                </span>
                                                            </a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
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

        // $("#client_idselect").change(function() {
        //     let clientid = $(this).val();

        //     $.ajax({
        //         url: "{{ route('common.client-portfolio') }}",
        //         type: 'POST',
        //         data: {
        //             client_id: clientid
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             if (data.status) {
        //                 $("#portfolio_idselect").empty();
        //                 $("#site_idselect").empty();
        //                 let dataPort = data.data;
        //                 let sitesData = data.sites;
        //                 $('#portfolio_idselect').append($('<option>', {
        //                     value: 0, // replace 'value' with the actual property name in your data
        //                     text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
        //                 }));
        //                 $('#site_idselect').append($('<option>', {
        //                     value: 0, // replace 'value' with the actual property name in your data
        //                     text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
        //                 }));
        //                 $.each(dataPort, function(index, item) {
        //                     $('#portfolio_idselect').append($('<option>', {
        //                         value: item
        //                         .id, // replace 'value' with the actual property name in your data
        //                         text: item
        //                             .full_name // replace 'text' with the actual property name in your data
        //                     }));
        //                 });
        //                 $.each(sitesData, function(index, item) {
        //                     $('#site_idselect').append($('<option>', {
        //                         value: item.site
        //                         .id, // replace 'value' with the actual property name in your data
        //                         text: item.site
        //                             .reference // replace 'text' with the actual property name in your data
        //                     }));
        //                 });
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error fetching data:', error);
        //         }
        //     });
        // });

        // $("#portfolio_idselect").change(function(){
        //     let portfolio_id = $(this).val();

        //     $.ajax({
        //         url: "{{ route('common.client-portfolio') }}",
        //         type: 'POST',
        //         data: {
        //             portfolio_id:portfolio_id
        //         },
        //         dataType: 'json',
        //         success: function (data) {
        //             if(data.status){
        //                 $("#site_idselect").empty();
        //                 let dataPort = data.data;
        //                 $('#site_idselect').append($('<option>', {
        //                         value: 0, // replace 'value' with the actual property name in your data
        //                         text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
        //                     }));
        //                 $.each(dataPort, function(index, item) {
        //                     $('#site_idselect').append($('<option>', {
        //                         value: item.site.id, // replace 'value' with the actual property name in your data
        //                         text: item.site.reference // replace 'text' with the actual property name in your data
        //                     }));
        //                 });
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error fetching data:', error);
        //         }
        //     });
        // });
    </script>
@endpush
