@extends('layouts.main')
@section('app-title', 'View Team Player - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    @if ($user->role == 'cleaner')
                    <h4 class="page-title">View Team Player (Cleaner)</h4>
                    @else
                    <h4 class="page-title">View Team Player</h4>
                    @endif
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Administration</li>
                            <li class="breadcrumb-item active">View Team Player</li>
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
                            @can('contractor-view')
                            <li class="nav-item">
                                <a href="#contractor" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-user-square"></i></span>
                                    <span>Contractor</span>
                                </a>
                            </li>
                            @endcan
                            @can('department-view')
                            <li class="nav-item">
                                <a href="#departments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-list-ul"></i></span>
                                    <span>Departments</span>
                                </a>
                            </li>
                            @endcan
                            @can('requests-view')
                            <li class="nav-item">
                                <a href="#document" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-file-blank"></i></span>
                                    <span>Documents</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#request-document" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-clipboard-notes "></i></span>
                                    <span>Request Document</span>
                                </a>
                            </li>
                            @endcan
                            @if ($user->role == 'cleaner' || auth()->user()->can('induction-view'))
                                 <li class="nav-item">
                                <a href="#cleaner-document" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-clipboard-notes "></i></span>
                                    <span>Induction Document</span>
                                </a>
                            </li>
                            @endif
                            {{-- <li class="nav-item">
                                <a href="#cleaner-document" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-clipboard-notes "></i></span>
                                    <span>Cleaner Document</span>
                                </a>
                            </li> --}}
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
                                            <div class="col-lg-6 border-right-dashed">
                                                <div class="detail_box pe-4">
                                                    <ul>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Name</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->name ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Surname</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->surname ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Email</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->email ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Date of Birth </h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->dateofbirth ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Phone Number</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->phone_number ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Second Number</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->second_number ?? '---' }}</h6>
                                                            </div>
                                                        </li>


                                                    </ul>
                                                </div>
                                                <div class="detail_box">
                                                    <h6>Note</h6>
                                                    <p>{{ $user->notes ?? '---' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="detail_box ps-4">
                                                    <ul>


                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Country</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->country->country_name ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>TFN</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->tfn ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>ABN</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->abn ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Team Player Type</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->role ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Team Player Role</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->rolename['name'] ?? '---' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Is Login</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->login_status ? 'Yes' : 'No' }}</h6>
                                                            </div>
                                                        </li>

                                                        @if ($user->role == "cleaner")


                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Is Multiple Shift Create </h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $user->is_multipal_shift == 1 ? 'Yes' : 'No' }}</h6>
                                                            </div>
                                                        </li>
                                                        @endif

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

                                            <div class="col-lg-12 ">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>

                                                            <th>Address</th>
                                                            <th>PO Box</th>
                                                            <th>Main Address</th>
                                                            <th>Mail Address</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($userAddress)
                                                            @foreach ($userAddress as $kk => $addres)
                                                                <tr id="address{{ $addres->id }}">
                                                                    <td>{{ $addres->unit ?? '' }}
                                                                        {{ $addres->address_number ?? '' }}
                                                                        {{ $addres->street_address ?? '' }}
                                                                        {{ $addres->suburb ?? '' }}
                                                                        {{ $addres->city ? $addres->city->city_name : '' }}
                                                                        {{ $addres->state ? $addres->state->state_name : '' }}
                                                                        {{ $addres->zipcode }}</td>
                                                                        <td>{{$addres->po_box}}</td>
                                                                        <td>{{$addres->is_this_main_address ? 'Yes' : 'No'}}</td>
                                                                        <td>{{$addres->is_this_mail_address ? 'Yes' : 'No'}}</td>
                                                                    <td><button style="border: none;background: none;"
                                                                            type="button"
                                                                            onclick="deleteTabletr('address{{ $addres->id }}')"><span
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom"><i
                                                                                    class="uil-trash"></i></span></button>
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
                            @can('contractor-view')
                            <div class="tab-pane" id="contractor">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Contractors</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($userContractor)
                                                            @foreach ($userContractor as $contarctor)
                                                                <tr id="contractor{{ $contarctor->id }}">
                                                                    <td>{{ $contarctor->contarctor->name }}</td>
                                                                    <td> <button style="border: none;background: none;"
                                                                            type="button"
                                                                            onclick="deleteRecordTbl({{$contarctor->id}},'UserContractor','contractor{{ $contarctor->id }}')"><span
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                                    class="uil-trash"></i></span></button>
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
                            @endcan
                            @can('department-view')
                            <div class="tab-pane" id="departments">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Department</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($userDepartment)
                                                            @foreach ($userDepartment as $department)
                                                                <tr id="department{{ $department->id }}">
                                                                    <td>{{ $department->department->name }}</td>
                                                                    <td> <button style="border: none;background: none;"
                                                                            type="button"
                                                                            onclick="deleteRecordTbl({{$department->id}},'UserDepartment','department{{ $department->id }}')"><span
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                                    class="uil-trash"></i></span></button>
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
                            @endcan
                            @can('requests-view')
                            <div class="tab-pane" id="document">
                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>

                                                            <th>Document</th>
                                                            <th>Type of Document</th>
                                                            <th>Reference Number</th>
                                                            <th>Expire Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($userDocuments)
                                                            @foreach ($userDocuments as $kk => $docs)
                                                                <tr id="docus{{ $docs->id }}">
                                                                    <td>
                                                                        <a target="_blank" href="{{ url(env('STORE_PATH') . $docs->docs_image) }}">View Document</a>
                                                                    </td>
                                                                    <td>{{ $docs->docs_type }}</td>
                                                                    <td>{{ $docs->reference_number }}</td>
                                                                    <td>{{ $docs->expire_date }}</td>
                                                                    <td>
                                                                        <button style="border: none;background: none;" type="button" onclick="deleteRecordTbl({{$docs->id}},'BaseDocument','docus{{ $docs->id }}')">
                                                                            <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                <i class="uil-trash"></i>
                                                                            </span>
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
                            <div class="tab-pane" id="request-document">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec pt-0">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="title_head">
                                                    <h4>Request for a Document</h4>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-3" style="">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Document</th>
                                                            <th>Type of Document</th>
                                                            <th>Expire Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($reqDocuments)
                                                            @foreach ($reqDocuments as $kk=>$reqDoc)
                                                            <tr id="docusReq{{$reqDoc->id}}{{time()}}">
                                                                <td>
                                                                    @php
                                                                        $reqimg = $reqDoc->docs_image ?? ($reqDoc->docs_image ?? '');
                                                                    @endphp
                                                                   <a href="{{url(env('STORE_PATH').$reqimg)}}" target="_blank">View Document</a>
                                                                </td>
                                                                <td>
                                                                    {{$reqDoc->docs_type ??  ''}}
                                                                </td>
                                                                <td>
                                                                    {{$reqDoc->expire_date}}
                                                                </td>
                                                                <td>
                                                                    <button style="border: none;background: none;" type="button" onclick="deleteRecordTbl({{$reqDoc->id}},'BaseDocument','docusReq{{$reqDoc->id}}{{time()}}')">
                                                                        <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                            <i class="uil-trash"></i>
                                                                        </span>
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
                            @endcan
                            @if ($user->role == 'cleaner' || auth()->user()->can('induction-view'))

                            <div class="tab-pane" id="cleaner-document">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec pt-0">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="title_head">
                                                    <h4>Induction Document</h4>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-3" style="">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Induction Title</th>
                                                            <th>Induction Document</th>
                                                            <th>Signature</th>
                                                            <th>Signature Date</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(isset($cleanerInduction) && $cleanerInduction)
                                                            @foreach ($cleanerInduction as $cleanerInductions)
                                                            <tr>
                                                                <td> {{ $cleanerInductions->title }}</td>
                                                                <td> <a href="{{url(env('STORE_PATH').$cleanerInductions->docs_image)}}" target="_blank">View Document</a></td>
                                                                @if ($cleanerInductions->signature->isNotEmpty() && $cleanerInductions->signature[0]->signature)
                                                                <td><a href="{{ url(env('STORE_PATH'). $cleanerInductions->signature[0]->signature) }}" target="_blank">View File</a></td>
                                                                @else
                                                                <td> {{$cleanerInductions->signature[0]->signature??'--'}}  </td>
                                                                @endif
                                                                <td> {{$cleanerInductions->signature[0]->updated_at??'--'}} </td>

                                                                @if ($cleanerInductions->signature->isNotEmpty() && $cleanerInductions->signature[0]->signature)
                                                                <td>
                                                                    <div class="status_dp">
                                                                        {{ Str::ucfirst($cleanerInductions->signature[0]->status) ?? 'Pending'}}
                                                                        {{-- <select class="status_" onchange="statusChangeAjax(this, '{{$cleanerInductions->signature[0]->id}}')">
                                                                            <option value="submitted" {{ $cleanerInductions->signature[0]->status == 'submitted' ? 'selected' : '' }}>Submitted</option>
                                                                            <option value="approved" {{ $cleanerInductions->signature[0]->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                                            <option value="rejected" {{ $cleanerInductions->signature[0]->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                                            <option value="pending" {{ $cleanerInductions->signature[0]->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                                        </select> --}}
                                                                    </div>
                                                                </td>
                                                                @else
                                                                <td> {{ $cleanerInductions->signature[0]->signature ?? 'Pending' }} </td>
                                                                @endif
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
                            @endif
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
@if(auth()->user()->role=='admin' || auth()->user()->canAny(['team-player-activate,team-player-deactivate','team-player-edit']))
<script>

    function statusChangeAjax(selectElement, userId) {
        var newStatus = selectElement.value;

        $.ajax({
            type: 'POST',
            url: '{{ route('cleaner.update.status') }}',
            data: {
                userId: userId,
                newStatus: newStatus,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Status updated successfully.',
                        timer: 5000,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error updating status.',
                    });
                }
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'An error occurred while processing your request.',
                });
                console.error(error);
            }
        });
    }
</script>



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
@endif
@endpush