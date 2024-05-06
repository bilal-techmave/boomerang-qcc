@extends('layouts.main')
@section('app-title', 'View Tickets - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">View Tickets</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">View Tickets</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">


                            <div class="main_bx_dt__">
                                <div class="top_dt_sec p-0">
                                    <div class="row">
                                        <div class="col-lg-6 ">
                                            <div class="detail_box pe-4 border-right-dashed">
                                                <ul>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Type</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->type ?? '----' }}</h6>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Priority</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->priority ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Client </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->getClients->business_name ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Portfolio</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->site?->potfolio?->full_name ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Site</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->site->reference ?? '' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Responsible</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->getUser->name ?? '----' }}</h6>
                                                        </div>
                                                    </li>



                                                </ul>
                                                <div class="detail_box">
                                                    <h6>Message</h6>
                                                    <p>{{ $ticekt->message ?? '----' }}</p>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-6 ">
                                            <div class="detail_box pe-4">
                                                <ul>
                                                    <li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Department</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->getDepartments->name ?? '----' }}</h6>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Due Date</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->due_date_to ?? '----' }}</h6>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Reference Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->reference_number ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Subject</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->subject ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Ticket Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->ticket_id ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Date Issued</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->created_at ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Status</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->status ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Creator</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $ticekt->getUser->name ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>


                                        <div class="col-lg-12  mt-3">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead class="head_bg">
                                                    <tr>
                                                        <th colspan="3">Attachments</th>
                                                    </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Document Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($ticketImage as $allticketImage)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="{{ url(env('STORE_PATH') . $allticketImage->ticket_img) }}"
                                                                    target="black">View Document</td>
                                                            <td><a onclick="removCenters(this,'{{ $allticketImage->id }}')"
                                                                    class="" data-bs-toggle="tooltip"
                                                                    data-bs-original-title="Delete"><span
                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                            class="uil-trash"></i></span></a></td>
                                                        </tr>

                                                    @empty
                                                    @endforelse

                                                </tbody>
                                            </table>


                                        </div>
                                        @can('ticket-reply')
                                            <div class="col-lg-12  mt-3">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead class="head_bg">
                                                        <tr>
                                                            <th colspan="4">Reply</th>
                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th>S.No</th>
                                                            <th>Reply From</th>
                                                            <th>Message</th>
                                                            <th>Reply Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($tecketReply as $ticket_reply)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $ticket_reply->getUser->name ?? '' }}</td>
                                                                <td>{{ $ticket_reply->message }}</td>
                                                                <td>{{ $ticket_reply->created_at }}</td>
                                                            </tr>

                                                        @empty
                                                        @endforelse

                                                    </tbody>
                                                </table>


                                            </div>
                                        @endcan

                                        @can('ticket-assign')

                                            <div class="col-lg-12  mt-3">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead class="head_bg">
                                                        <tr>
                                                            <th colspan="7">Ticket Historic</th>

                                                        </tr>
                                                    </thead>
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Person</th>
                                                            <th>Person From</th>
                                                            <th>Person To</th>
                                                            <th>Department From</th>
                                                            <th>Department To</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($ticket_activity as $key => $assignticket)
                                                            <tr>
                                                                <td>{{ date('d/m/Y H:i:s', strtotime($assignticket->created_at)) }}
                                                                </td>
                                                                <td>{{ $assignticket->getAssignedBy?->name ?? '' }}</td>
                                                                <td>
                                                                    {{ isset($ticket_activity[$key - 1]) && $ticket_activity[$key - 1]->getUser?->name ? $ticket_activity[$key - 1]->getUser?->name : '' }}
                                                                </td>
                                                                <td>{{ $assignticket->getUser?->name ?? '' }}</td>
                                                                <td>
                                                                    {{ isset($ticket_activity[$key - 1]) && $ticket_activity[$key - 1]->department?->name ? $ticket_activity[$key - 1]->department?->name : '' }}
                                                                </td>
                                                                <td>{{ $assignticket->department->name ?? '' }}</td>
                                                                <td>{{ $assignticket->status }}</td>

                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>


                                            </div>
                                        @endcan
                                    </div>
                                </div>

                            </div>
                            <!-- main_bx_dt -->


                        </div>

                    </div>
                    <div class="bottom_footer_dt">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="action_btns">

                                    <a href="{{ route('admin.ticket.index') }}" class="theme_btn btn-primary btn"><i
                                            class="uil-list-ul"></i>
                                        List</a>
                                    @can('ticket-reply')
                                        <a href="javascript:void(0)" class="theme_btn btn-warning btn" data-bs-toggle="modal"
                                            data-bs-target="#reply"><i class="bi-reply"></i> Reply</a>
                                    @endcan
                                    @can('ticket-assign')
                                        <a href="javascript:void(0)" class="theme_btn btn-warning btn" data-bs-toggle="modal"
                                            data-bs-target="#assign"><i class="uil-exchange-alt"></i> Assign</a>
                                    @endcan

                                    @if (auth()->user()->role == 'admin' ||
                                            auth()->user()->canAny(['ticket-slove', 'ticket-close', 'ticket-reopen', 'ticket-attachment']))
                                        <a href="javascript:void(0)" class="theme_btn btn-warning btn"
                                            data-bs-toggle="modal" data-bs-target="#changeStatus"><i
                                                class="uil-exchange-alt"></i> Change Status</a>
                                    @endif

                                    @can('ticket-assign')
                                        <a href="javascript:void(0)" onclick="assignToMe('{{ $ticekt->id }}')"
                                            class="theme_btn btn-warning btn"><i class="uil-user"></i> Assign To
                                            Me</a>
                                    @endcan
                                    <a href="{{ route('work-order.work-order.create') }}" class="theme_btn save_btn btn"><i
                                            class="uil-plus-circle"></i>
                                        New Work Order</a>
                                    <a href="javascript:void(0)" class="theme_btn btn-danger btn"><i
                                            class="bi-file-earmark-pdf"></i>
                                        Export PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>


    @can('ticket-reply')
        <!-- Modal -->
        <div class="modal fade" id="reply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reply This Ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('ticket.reply', ['id' => $ticekt->id]) }}" method="POST" id="ReplyTicket">@csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <textarea required name="message" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="validateForm(this,'ReplyTicket')" class="btn btn-primary">Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan

    @can('ticket-assign')
        <!-- Modal -->
        <div class="modal fade" id="assign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Assign this ticket</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="assignTicket" action="{{ route('ticket.assign', ['id' => $ticekt->id]) }}" method="POST"> @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="hidden" name="type" value="2">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Responsible</label>
                                        <select required class="form-select js-example-basic-single4" name="user_id">
                                            <option value="0">Please select one or start typing</option>
                                            @foreach ($responsible as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="errorMessage" class="text-danger d-none">Responsible is required.</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Department</label>
                                        <select required class="form-select js-example-basic-single5" name="department_id">
                                            <option value="0">Please select one or start typing</option>
                                            @isset($departments)
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name ?? '' }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        <span id="errorMessage" class="text-danger d-none">Department is required.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="validateForm(this,'assignTicket')"
                                class="btn btn-primary">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan

    @if (auth()->user()->role == 'admin' ||
            auth()->user()->canAny(['ticket-slove', 'ticket-close', 'ticket-reopen']))
        <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('ticket.change.status', ['id' => $ticekt->id]) }}" id="changeStatusFrom" method="POST"> @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Status</label>
                                        <select class="form-select js-example-basic-single3" name="status">
                                            <option value="0">Please select one or start typing</option>
                                            <option value="Open" {{ $ticekt->status == 'Open' ? 'selected' : '' }}>Open
                                            </option>
                                            <option value="In Progress"
                                                {{ $ticekt->status == 'In Progress' ? 'selected' : '' }}>In Progress
                                            </option>
                                            @can('ticket-slove')
                                                <option value="Solved" {{ $ticekt->status == 'Solved' ? 'selected' : '' }}>
                                                    Solved</option>
                                            @endcan
                                            @can('ticket-close')
                                                <option value="Closed" {{ $ticekt->status == 'Closed' ? 'selected' : '' }}>
                                                    Closed</option>
                                            @endcan
                                            @can('ticket-reopen')
                                                <option value="Reopen" {{ $ticekt->status == 'Reopen' ? 'selected' : '' }}>
                                                    Reopen</option>
                                            @endcan
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="validateForm(this,'changeStatusFrom')" class="btn btn-primary">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

@endsection
@push('push_script')
    <script>
        function removCenters(that, ticketId) {
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
                            url: "{{ route('ticket.document.delete') }}",
                            data: {
                                "ticket_id": ticketId,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                swal({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Document Deleted',
                                    timer: 1000
                                });

                                if (that) {
                                    $(that).parent().parent().remove();
                                }

                            },

                            error: function(data) {
                                console.log("error");
                                console.log(result);
                            }
                        });
                    } else {
                        swal("Cancelled", label + " safe :)", "error");
                    }
                });
        }
    </script>
    @can('ticket-assign')
        <script>
            function assignToMe(ticketId) {
                swal({
                        title: "Are you sure?",
                        text: "Do you want to Assign to self!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, Assign to me!",
                        cancelButtonText: "No, Cancel It",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                type: "POST",
                                url: `{{ route('ticket.assign', ['id' => $ticekt->id]) }}`,
                                data: {
                                    // "ticket_id": ticketId,
                                    "type": '1',
                                    "_token": "{{ csrf_token() }}"
                                },
                                dataType: 'json',
                                success: function(result) {
                                    swal({
                                        type: 'success',
                                        title: 'Assigned!',
                                        text: 'Ticket Assigned Successfully!',
                                        timer: 1000
                                    });
                                    window.location.reload();
                                },

                                error: function(data) {
                                    console.log("error");
                                    console.log(result);
                                }
                            });
                        } else {
                            swal("Not Assigned :)", "error");
                        }
                    });
            }
        </script>
    @endcan

    <script>
        $(function() {
            $('.js-example-basic-single3').select2({
                dropdownParent: $('#assign1')
            });

        })
        $(function() {
            $('.js-example-basic-single4').select2({
                dropdownParent: $('#assign')
            });

        })
        $(function() {
            $('.js-example-basic-single5').select2({
                dropdownParent: $('#assign')
            });

        })
        $(function() {
            $('.js-example-basic-single3').select2({
                dropdownParent: $('#changeStatus')
            });

        })




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
                $(`#${formId}`).submit();
            }
            isValid = true;
        }
    </script>
@endpush
