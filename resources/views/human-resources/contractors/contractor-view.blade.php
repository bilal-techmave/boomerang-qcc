@extends('layouts.main')
@section('app-title','View Contractor - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">View Contractor</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Administration</li>
                        <li class="breadcrumb-item active">View Contractor</li>
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
                        <li class="nav-item">
                            <a href="#address" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="bi bi-journals"></i></span>
                                <span>Address</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#contractor" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-user-plus"></i></span>
                                <span>Supervisor</span>
                            </a>
                        </li>
                        @can('cleaner-view')
                        <li class="nav-item">
                            <a href="#departments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil uil-constructor"></i></span>
                                <span>Cleaners</span>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="#document" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-file-blank"></i></span>
                                <span>Documents</span>
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
                                        <div class="col-lg-6 ">
                                            <div class="detail_box pe-4">
                                                <ul>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Name</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$contractor->name}}</h6>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>ABN</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$contractor->abn ?? '---'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Responsible</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$contractor->responsible->name ?? '---'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Hourly Rate</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$contractor->hourly_rate ?? '---'}}</h6>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                            </div>
                            <!-- main_bx_dt -->
                        </div>

                        <div class="tab-pane" id="address">

                            <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($contractorAddress)
                                                        @foreach ($contractorAddress as $kk=>$addres)
                                                            <tr id="address{{$addres->id}}">
                                                                <td>{{$addres->unit??''}} {{$addres->address_number??''}} {{$addres->street_address??''}} {{$addres->suburb??''}} {{$addres->city ? $addres->city->city_name : ''}} {{$addres->state ? $addres->state->state_name : ''}} {{$addres->zipcode}}</td>
                                                                <td><button style="border: none;background: none;" type="button" onclick="deleteRecord('{{$addres->id}}','BaseAddress','address{{$addres->id}}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom"><i class="uil-trash"></i></span></button></td>
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

                        <div class="tab-pane" id="contractor">

                            <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Supervisor</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($contSupervisor)
                                                        @foreach ($contSupervisor as $kk=>$superv)
                                                            <tr id="superv{{$superv->id}}">
                                                                <td>{{$superv->supervisor->name ?? '-'}}</td>
                                                                <td>{{$superv->supervisor->phone_number ?? '-'}}</td>
                                                                <td>{{$superv->supervisor->email ?? '-'}}</td>
                                                                <td><button style="border: none;background: none;" type="button" onclick="deleteRecord('{{$superv->id}}','ContractorSupervisor','superv{{$superv->id}}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></button></td>
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

                        @can('cleaner-view')
                        <div class="tab-pane" id="departments">

                            <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Cleaner</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($contractorCleaner)
                                                        @foreach ($contractorCleaner as $kk=>$cleaner)
                                                            <tr id="cleaner{{$cleaner->id}}">
                                                                <td>{{$cleaner->cleaners->name??'-'}}</td>
                                                                <td>{{$cleaner->cleaners->phone_number ?? '-'}}</td>
                                                                <td>{{$cleaner->cleaners->email??'-'}}</td>
                                                                <td><button style="border: none;background: none;" type="button" onclick="deleteRecord('{{$cleaner->id}}','ContractorCleaner','cleaner{{$cleaner->id}}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></button></td>
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

                        <div class="tab-pane" id="document">

                            <div class="main_bx_dt__">
                                <div class="top_dt_sec">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Document Name</th>
                                                        <th>Type of Document</th>
                                                        <th>Expire Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($contractorDocuments)
                                                        @foreach ($contractorDocuments as $kk=>$docs)
                                                            <tr id="docus{{$docs->id}}">
                                                                <td><a target="_blank" href="{{url(env('STORE_PATH').$docs->docs_image)}}"> {{$docs->docs_image}}</a></td>
                                                                <td>{{$docs->docs_type}}</td>
                                                                <td>{{$docs->expire_date}}</td>
                                                                <td><button style="border: none;background: none;" type="button" onclick="deleteRecord('{{$docs->id}}','BaseDocument','docus{{$docs->id}}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></button></td>
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
@endpush
