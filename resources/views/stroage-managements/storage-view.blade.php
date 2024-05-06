@extends('layouts.main')
@section('app-title', 'Storage View - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Storage View</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Storage Management</li>
                            <li class="breadcrumb-item active">Storage View</li>
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
                                    <span><i class="uil-tag-alt"></i></span>
                                    <span>Items</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-exchange"></i></span>
                                    <span>Storage Movement</span>
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
                                                            <h6>Name Storage</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->name ?? 'N/A' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Supervisor</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->getUserDetail->name ?? 'N/A' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Unit</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->unit ?? 'N/A' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Address Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->address_number ?? 'N/A' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Street Address</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->street_address ?? 'N/A' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Suburb</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->suburb ?? 'N/A' }}</h6>
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
                                                            <h6>City</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->city->city_name ?? 'N/A' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>State</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->state->state_name ?? 'N/A' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>ZipCode</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageStorage->zipcode ?? 'N/A' }}</h6>
                                                        </div>
                                                    </li>

                                                </ul>
                                                <div class="detail_box">
                                                    <h6>Description</h6>
                                                    <p>{{ $manageStorage->description ?? 'N/A' }}</p>
                                                </div>
                                            </div>

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
                                                        <th>S.No</th>
                                                        <th>Picture</th>
                                                        <th>Barcode</th>
                                                        <th>Name</th>
                                                        <th>Manufacturer</th>
                                                        <th>Type</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($items as $allitems)
                                                        <tr role="row" class="odd">
                                                            <td hidden></td>
                                                            <td>{{ $loop->iteration }}</td>

                                                            <td style="max-height: 40px; max-width: 40px" >
                                                                <a target="_blank" href="{{ url(env('STORE_PATH') . $allitems->attachment) }}">
                                                                    <figure class="profile-picture">

                                                                        <img src="{{ url(env('STORE_PATH') . $allitems->attachment . '') }}"
                                                                            class="rounded-circle"
                                                                            style="max-height: 40px; max-width: 40px">
                                                                    </figure>
                                                                </a>
                                                            </td>


                                                            <td>{{ $allitems->barcode }}</td>
                                                            <td>{{ $allitems->name }}</td>
                                                            <td>{{ $allitems->manufacturer }}</td>
                                                            <td>{{ $allitems->type }}</td>
                                                            <td>{{ $allitems->qty ?? '0' }}</td>

                                                        </tr>
                                                    @empty
                                                    @endforelse




                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane " id="messages">
                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <table class="table table-bordered  dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>Storage From</th>
                                                        <th>Storage To</th>
                                                        <th>Quantity of Items</th>
                                                        <th>Type of Movement</th>
                                                        <th>Date Movement</th>
                                                        <th>Person Movement Name</th>
                                                        <!-- <th>Action</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($items_history as $allitems)
                                                        <tr role="row" class="odd">
                                                            <td>{{ $allitems->formStore->name ?? ''}}</td>
                                                            <td>{{ $allitems->toStore->name ?? ''}}</td>
                                                            <td>{{ $allitems->qty }}</td>
                                                            <td>{{ $allitems->action }}</td>
                                                            <td>{{ $allitems->created_at->format('m/d/Y') }}</td>
                                                            <td>{{ $allitems->user->name.' '.$allitems->user->surname }}</td>

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

        </div>
        <!-- end row -->

    </div>
    <!-- container -->


@endsection