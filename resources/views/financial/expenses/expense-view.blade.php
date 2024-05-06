@extends('layouts.main')
@section('app-title', 'Expense View - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Expense View</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Financial Settings</li>
                            <li class="breadcrumb-item active">Expense View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header card_header_prospect">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            @can('site-view')
                            <li class="nav-item">
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                    <span><i class="uil-building"></i></span>
                                    <span>Sites</span>
                                </a>
                            </li>
                            @endcan

                            <li class="nav-item">
                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-file-blank"></i></span>
                                    <span>Document</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="card show_portfolio_tab">

                    <div class="card-body">

                        <div class="tab-content  text-muted">
                            <div class="tab-pane show active" id="home">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec pt-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="detail_box pe-4">
                                                    <ul>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Financial Account</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{$expense->account_name}}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Expense Type</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{$expense->expense_type_name}}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Company</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{$expense->business_name}}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Due Date</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{date('d/m/Y',strtotime($expense->due_date))}}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Amount</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{$expense->amount}}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Supplier</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{$expense->name}}</h6>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="detail_box">
                                                    <h6>Note</h6>
                                                    <p>{{$expense->notes}}</p>
                                                </div>
                                            </div>



                                        </div>
                                    </div>


                                </div>
                                <!-- main_bx_dt -->
                            </div>
                            @can('site-view')
                                <div class="tab-pane" id="profile">

                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">

                                                <div class="col-lg-12 ">
                                                    <table id="basic-datatable"
                                                        class="table  table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>

                                                                <th>Site</th>
                                                                <th>Client</th>
                                                                <th>Portfolio</th>
                                                                <th>Reference / Building</th>
                                                                @can('expenses-edit')
                                                                    <th>Action</th>
                                                                @endcan

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($expenseSite)
                                                                @foreach ($expenseSite as $sitee)
                                                                <tr id="site{{$sitee->id}}{{time()}}">
                                                                    <td>{{$sitee->site->reference??'-'}}</td>
                                                                    <td>{{$sitee->site->potfolio->full_name??'-'}}</td>
                                                                    <td><i class="uil-check-circle status-entity" style="color:green"></i></td>
                                                                    <td><i class="uil-check-circle status-entity" style="color:green"></i></td>
                                                                    @can('expenses-edit')
                                                                    <td>
                                                                        <button onclick="deleteRecord('{{$sitee->id}}','ExpenseSite','site{{$sitee->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button>
                                                                    </td>
                                                                    @endcan
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
                            @endcan

                            <div class="tab-pane" id="messages">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>

                                                            <th>Document Name</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($expenseDocument)
                                                        @foreach ($expenseDocument as $edocs)
                                                            <tr id="documents{{$edocs->id}}{{time()}}">
                                                                <td><a target="_blank" href="{{url(env('STORE_PATH').$edocs->document_image)}}">View File </a></td>
                                                                <td>
                                                                    <button onclick="deleteRecord('{{$edocs->id}}','ExpenseDocument','documents{{$edocs->id}}{{time()}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button>
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
@can('expenses-edit')
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

            function deleteRecord(docId,table_name,divname) {
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
@endcan
@endpush
