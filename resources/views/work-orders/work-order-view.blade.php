@extends('layouts.main')
@section('app-title','Work Order View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Work order View</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Work Order</li>
                        <li class="breadcrumb-item active">Work order View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-0">
                <div class="card-header card_header_prospect">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <span><i class="uil-info-circle"></i></span>
                                <span>Job Info</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                <span><i class="bi bi-journals"></i></span>
                                <span>Client Work Orders</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil uil-constructor"></i></span>
                                <span>Cleaners</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-building"></i></span>
                                <span>Contractors</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-comment-alt"></i></span>
                                <span>Comments</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#email" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="bi-envelope"></i></span>
                                <span> Emails</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card show_portfolio_tab mt-2">
                <div class="card-body">
                    <div class="tab-content  text-muted">
                        <div class="tab-pane show active" id="home">
                            <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                    <div class="row">
                                        <div class="col-lg-6 border-right-dashed">
                                            <div class="detail_box pe-4">
                                                <ul>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Client</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->client->business_name??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Portfolio</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->portfolio->full_name??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Site</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->site->reference ?? ''}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Type</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->jobtype->name??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Sub Type</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->subjobtype->name??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Reference Number </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->reference_number??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Requester</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->requester??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Required Completion Date</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->completion_date??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Required Start Time</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->start_time??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Schedule Date</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->schedule_date??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Priority</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->priority??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Department </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->department->name??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Sales Price </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->sales_price??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Budget</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->budget??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <div class="detail_box ps-4">
                                                <ul>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Time Allocated</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->time_allocated??'-'}} hours</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Invoice Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->invoice_number??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>PO / Work Bill</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$workOrder->po_work_bill??'-'}}</h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="detail_box">
                                                    <h6>Description</h6>
                                                    <p>{{$workOrder->description??'-'}}</p>
                                                </div>
                                                <div class="detail_box">
                                                    <h6>Observation </h6>
                                                    <p>{{$workOrder->history??'-'}}</p>
                                                </div>
                                                <div class="detail_box">
                                                    <h6>Internal Communication</h6>
                                                    <p>{{$workOrder->internal_communication??'-'}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main_bx_dt -->
                        </div>
                        <div class="tab-pane " id="profile">
                            <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                    <div class="row">
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
                                                <tbody>
                                                    <tr>
                                                        @if ($client_work_order)
                                                        @foreach ($client_work_order as $clientworder)
                                                    <tr id="clientwro{{$clientworder->id}}{{time()}}">
                                                        <td>{{$clientworder->task_description}}</td>
                                                        <td>{{$clientworder->reference_number}}</td>
                                                        <td>{{$clientworder->po_work_bill}}</td>
                                                        <td>{{$clientworder->invoice_number}}</td>
                                                        <td>{{$clientworder->sales_price}}</td>
                                                        <td>{{$clientworder->extra_charge}}</td>
                                                        <td>
                                                            <button type="button" onclick="deleteRecordTbl('{{$clientworder->id}}','ClientWorkOrder','clientwro{{$clientworder->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                <i class="uil-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main_bx_dt -->
                        </div>
                        <div class="tab-pane" id="tickets">
                            <div class="sites_main">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered  dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Date Issued</th>
                                                    <th>Person</th>
                                                    <th>Message</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($comment_work_order)
                                                @foreach ($comment_work_order as $commentworder)
                                                    <tr id="comment{{$commentworder->id}}{{time()}}">
                                                        <td>{{date('d F Y',strtotime($commentworder->created_at))}}</td>
                                                        <td>{{$commentworder->user->name??'-'}}</td>
                                                        <td>{{$commentworder->comment}}</td>
                                                        <td>
                                                                <button type="button" onclick="deleteRecordTbl('{{$commentworder->id}}','WorkOrderComment','comment{{$commentworder->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
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
                        <div class="tab-pane" id="messages">
                            <div class="sites_main">
                                <div class="row">
                                    <div class="col-lg-12">
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
                                            <tbody>

                                                    @if ($cleaner_work_order)
                                                            @foreach ($cleaner_work_order as $cleanerworder)
                                                                <tr id="cleaner{{$cleanerworder->id}}{{time()}}">
                                                                    <td>{{$cleanerworder->cleaner->name ??''}}</td>
                                                                    <td>{{$cleanerworder->work_hours ??''}}</td>
                                                                    <td>{{$cleanerworder->work_budget ??''}}</td>
                                                                    <td>{{date('d F Y',strtotime($cleanerworder->date_attendance ??''))}}</td>
                                                                    <td>
                                                                        <button type="button" onclick="deleteRecordTbl('{{$cleanerworder->id}}','WorkOrderCleaner','cleaner{{$cleanerworder->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
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
                        <div class="tab-pane" id="comments">
                            <div class="sites_main">
                                <div class="row">
                                    <div class="col-lg-12">
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
                                            <tbody>
                                                @if ($contractor_work_order)
                                                            @foreach ($contractor_work_order as $contractorworder)
                                                                <tr id="contractor{{$contractorworder->id}}{{time()}}">
                                                                    <td>{{$contractorworder->contractor->name}}</td>
                                                                    <td>{{$contractorworder->work_hours}}</td>
                                                                    <td>{{$contractorworder->work_cost}}</td>
                                                                    <td>{{date('d F Y',strtotime($contractorworder->date_attendance))}}</td>
                                                                    <td>
                                                                        <button type="button" onclick="deleteRecordTbl('{{$contractorworder->id}}','WorkOrderContractor','contractor{{$contractorworder->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
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
                        <div class="tab-pane" id="email">
                            <div class="sites_main">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <table class="table table-bordered  dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($email_work_order)
                                                @foreach ($email_work_order as $emailorworder)
                                                    <tr id="cemail{{$emailorworder->id}}{{time()}}">
                                                        <td>{{$emailorworder->email}}</td>
                                                        <td>
                                                            <button type="button" onclick="deleteRecordTbl('{{$emailorworder->id}}','WorkOrderEmail','cemail{{$emailorworder->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
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
                        }else {
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


        function deleteRecordTbl(docId,table_name,divname) {
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
                                "table_name":table_name
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result.status) {
                                    swal({
                                        type:'success',
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
@endpush
