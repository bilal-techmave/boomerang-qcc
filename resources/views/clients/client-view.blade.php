@extends('layouts.main')
@section('app-title', 'Client View - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">@if($client->is_prospect_client) Prospect @endif Client View</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Prospect Client View</li>
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
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                    <span><i class="bi bi-journals"></i></span>
                                    <span>Address</span>
                                </a>
                            </li>

                            @can('portfolio-view')
                            <li class="nav-item">
                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-building"></i></span>
                                    <span>Portfolio</span>
                                </a>
                            </li>
                            @endcan

                            @can('client-comment-view')
                            <li class="nav-item">
                                <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-comment-alt"></i></span>
                                    <span>Comments</span>
                                </a>
                            </li>
                            @endcan

                            <li class="nav-item">
                                <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="bi bi-hash"></i></span>
                                    <span>Social Media</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card show_portfolio_tab mt-2">

                    <div class="card-body">

                        <div class="tab-content prospect_content  text-muted">
                            <div class="tab-pane show active" id="home">

                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-6 border-right-dashed">
                                            <div class="detail_box pe-4">
                                                <ul>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Business Name</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->business_name }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Trading Name</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->trading_name }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>ABN</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->abn }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>ACN</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->acn }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Phone Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->phone_number }}</h6>
                                                        </div>
                                                    </li>


                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="detail_box ps-4">
                                                <ul>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Second Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->second_number }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Mobile Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->mobile_number }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Fax Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->fax_number }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Type of the client </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ ucfirst($client->client_type) }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Website</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $client->website }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Company </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $company }}</h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="detail_box">
                                                <h6>Note</h6>
                                                <p>{{ $client->notes }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="title_head">
                                                <h4>Contact Information</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12  mt-3">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                        <th>Contact Type</th>
                                                        @can('client-edit')
                                                        <th>Action</th>
                                                        @endcan
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($client_contact)
                                                        @foreach ($client_contact as $contact)
                                                            <tr id="contact{{$contact->id}}">
                                                                <td>{{$contact->user->name??''}} {{$contact->user->surname??''}}</td>
                                                                <td>{{$contact->user->phone_number??''}}</td>
                                                                <td>{{$contact->user->email??''}}</td>
                                                                <td>{{ Str::ucfirst($contact->user_type??'') }}</td>
                                                                @can('client-edit')
                                                                <td> <button type="button" onclick="deleteRecordTbl('{{$contact->id}}','BaseContact','contact{{$contact->id}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
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
                            <div class="tab-pane " id="profile">
                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>Address</th>
                                                        <th>Main Address</th>
                                                        <th>Mail Address</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($addresses as $address)
                                                        <tr>
                                                            <td>{{ $address->unit ?? '' }}
                                                                {{ $address->address_number ?? '' }}
                                                                {{ $address->street_address ?? '' }}
                                                                {{ $address->suburb ?? '' }}
                                                                {{ $address->city ? $address->city->city_name : '' }}
                                                                {{ $address->state ? $address->state->state_name : '' }}
                                                                {{ $address->zipcode }}
                                                            </td>
                                                            <td>
                                                                @if ($address->is_this_main_address == 1)
                                                                    <i class="uil-check-circle status-entity"
                                                                        style="color:green"></i>
                                                                @else
                                                                    <i class="uil-times-circle  status-entity"
                                                                        style="color:red"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($address->is_this_mail_address == 1)
                                                                    <i class="uil-check-circle status-entity"
                                                                        style="color:green"></i>
                                                                @else
                                                                    <i class="uil-times-circle status-entity"
                                                                        style="color:red"></i>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @can('portfolio-view')
                                <div class="tab-pane" id="messages">
                                    <div class="top_dt_sec pt-0">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                                    <thead>
                                                        <tr>
                                                            <th>Portfolio Full name</th>
                                                            <th>Portfolio Short name</th>
                                                            @can('client-edit')
                                                            <th>Action</th>
                                                            @endcan
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($client_portfolios)
                                                            @foreach ($client_portfolios as $kk=>$portfolio)
                                                            <tr id="portfolio{{$portfolio->id}}">
                                                                <td>{{$portfolio->full_name}}</td>
                                                                <td>{{$portfolio->short_name}}</td>
                                                                @can('client-edit')
                                                                <td>
                                                                    <button type="button" onclick="deleteRecordTbl('{{$portfolio->id}}','ClientPortfolio','portfolio{{$portfolio->id}}')"  class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn" >
                                                                        <i class="uil-trash"></i>
                                                                    </button>
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
                            @endcan

                            @can('client-comment-view')
                                <div class="tab-pane" id="comments">
                                    <div class="top_dt_sec pt-0">
                                        <div class="row">
                                            <div class="col-lg-12 ">
                                                <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                                    <thead>
                                                        <tr>
                                                            <th>Date Comment</th>
                                                            <th>Person</th>
                                                            <th>Comment Type</th>
                                                            <th>Comment</th>
                                                            <th>Files</th>
                                                            <!-- <th>Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($comments as $comment)
                                                            <tr>
                                                                <td>{{ date('d/m/Y H:i:s', strtotime($comment->created_at)) }}
                                                                </td>
                                                                <td>{{ $comment->client->business_name }}</td>
                                                                <td>{{ ucwords(str_replace('_', ' ', $comment->comment_type)) }}
                                                                </td>
                                                                <td>{{ substr($comment->comment, 0, 40) }} </td>
                                                                <td><a href="{{ url(env('STORE_PATH') . $comment->file) }}" target="_blank">View File</a></td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endcan

                            <div class="tab-pane" id="tickets">
                                <div class="sites_main">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Facebook</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $client->facebook }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Twitter</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $client->twitter }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Instagram</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $client->instagram }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Linkedin</label>
                                                <input type="text" class="form-control"
                                                    value="{{ $client->linkedin }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="" readonly>
                                            </div>
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
@can('client-edit')
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
@endcan
@endpush
