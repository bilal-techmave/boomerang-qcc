@extends('layouts.main')
@section('app-title', 'Add Tickets - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Tickets</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Add Tickets</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <form id="ticketSubmitData" action="{{ route('ticket.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Priority</label>
                                        <select data-plugin="customselect" name="priority" class="form-select">
                                            <option value="LOW">Low</option>
                                            <option value="MEDIUM">Medium</option>
                                            <option value="HIGH">High</option>
                                            <option value="URGENT">Urgent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Type</label>
                                        <select data-plugin="customselect" name="type" class="form-select">
                                            <option value="0">Please select one or start typing</option>
                                            <option value="Annual Leave Request">Annual Leave Request</option>
                                            <option value="Change Over Request">Change Over Request</option>
                                            <option value="Client Request">Client Request</option>
                                            <option value="Client Setup">Client Setup</option>
                                            <option value="Complaint">Complaint</option>
                                            <option value="Consumables Order">Consumables Order</option>
                                            <option value="Employee Setup">Employee Setup</option>
                                            <option value="Employee Termination">Employee Termination</option>
                                            <option value="Feedback">Feedback</option>
                                            <option value="General Material Order">General Material Order</option>
                                            <option value="IT Support">IT Support</option>
                                            <option value="Material Request Through Client">Material Request Through Client
                                            </option>
                                            <option value="Reimbursement">Reimbursement</option>
                                            <option value="Service Request">Service Request</option>
                                            <option value="Sick Leave">Sick Leave</option>
                                            <option value="Termination">Termination</option>
                                            <option value="Request of Change">Request of Change</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Priority</label>
                                        <select data-plugin="customselect" class="form-select">

                                        <option value="0">Please select one or start typing</option>
                                        <option value="LOW">Low</option>
                                        <option value="MEDIUM">Medium</option>
                                        <option value="HIGH">High</option>
                                        <option value="URGENT">Urgent</option>

                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Client</label>
                                        <select data-plugin="customselect" id="client_idselect" name="client_id"
                                            class="form-select">
                                            <option value="0">Please select one or start typing</option>
                                            @forelse ($client as $allclients)
                                                <option value="{{ $allclients->id }}">{{ $allclients->business_name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Portfolio</label>
                                        <select data-plugin="customselect" id="portfolio_idselect" name="portfolio_id"
                                            class="form-select">
                                            <option value="0">Please select one or start typing</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Site</label>
                                        <select data-plugin="customselect" id="site_idselect" name="client_site_id"
                                            class="form-select">
                                            <option value="0">Please select one or start typing</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Responsible <span class="text-danger">*</span></label>
                                        <select required data-plugin="customselect" class="form-select" name="user_id">
                                            <option value="0">Please select one or start typing</option>
                                            @forelse ($user as $alluser)
                                                <option value="{{ $alluser->id }}">{{ $alluser->name }} -
                                                    ({{ $alluser->email }})
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Department</label>
                                        <select data-plugin="customselect" name="department_id" class="form-select">
                                            <option value="0">Please select one or start typing</option>
                                            @forelse ($departments as $alldepartments)
                                                <option value="{{ $alldepartments->id }}">{{ $alldepartments->name }}
                                                </option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Reference Number</label>
                                        <input type="text" class="form-control" name="reference_number"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Subject <span
                                                class="red">*</span></label>
                                        <input required type="text" class="form-control" name="subject"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Due Date to</label>
                                        <input type="date" class="form-control basic-datepicker due_date_pickeer"
                                            name="due_date_to" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Message <span class="red">*</span></label>
                                        <textarea required name="message" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Attachment</label>
                                        <input name="ticketFile[]" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Attachment</label>
                                        <input name="ticketFile[]" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Attachment</label>
                                        <input name="ticketFile[]" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label">Upload Attachment</label>
                                        <input name="ticketFile[]" type="file" class="dropify" data-height="100" />
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="action_btns">
                                        <button type="button" onclick="validateForm(this,'ticketSubmitData')"
                                            class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                                        <a href="{{ route('admin.ticket.index') }}" class="theme_btn btn-primary btn"><i
                                                class="uil-list-ul"></i> List</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>


        </div>
    </div>
@endsection
@push('push_script')
    <script>
        $(function() {
            $('.due_date_pickeer').flatpickr({
                minDate: "today",
            })
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

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
    @include('common.footer_validation', ['validate_url_path' => null])
@endpush
