@extends('layouts.main')
@section('app-title','Suppliers View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Suppliers View</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Suppliers View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                <div class="main_bx_dt__">
                  <div class="top_dt_sec p-0">
                    <div class="row">
                    <div class="col-lg-6">
                                <div class="detail_box pe-4">
                                    <ul>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Name </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->name ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>ABN </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->abn ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Phone Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->phone_number ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Second Number </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->alt_phone_number ?? '---'}}</h6>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="detail_title">
                                                <h6>Fax Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->fax_number ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Unit </h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->unit ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Address Number</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->address_number ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Street Address</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->street_address ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>ZipCode</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->zipcode ?? '---'}}</h6>
                                            </div>
                                        </li>

                                    </ul>
                                </div>

                            </div>

                            <div class="col-lg-6">
                                <div class="detail_box pe-4">
                                    <ul>

                                        <li>
                                            <div class="detail_title">
                                                <h6>Suburb</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->suburb ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>City</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->getcity->city_name ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>State</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->getstate->state_name ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Email</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->email ?? '---'}}</h6>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="detail_title">
                                                <h6>Website</h6>
                                            </div>
                                            <div class="detail_ans">
                                                <h6>{{$supplier->website ?? '---'}}</h6>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="detail_box">
                                <h6>Note</h6>
                                <p>{{$supplier->notes ?? '---'}}</p>
                              </div>
                                </div>

                            </div>

                            <div class="col-lg-12 mt-2">
                            <div class="title_head">
                                <h4>Contact Details</h4>
                            </div>
                           </div>
                           <div class="col-lg-12 mt-1">
                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Contact Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($baseContact)
                                        @foreach ($baseContact as $contact)
                                            <tr id="contact{{$contact->id}}{{time()}}">
                                                <td>{{$contact->user->name}} {{$contact->user->surname}}</td>
                                                <td>{{$contact->user->phone_number}}</td>
                                                <td>{{$contact->user->email}}</td>
                                                <td>{{ Str::ucfirst($contact->user_type) }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                      </tbody>
                                </table>
                            </div>

                            <div class="col-lg-12 mt-2">
                                <div class="title_head">
                                    <h4>Financial Information</h4>
                                </div>
                            </div>

                            <div class="col-lg-12 mt-1">
                                            <table  class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Payment Type</th>
                                                            <th>Cheque Name</th>
                                                            <th>Account Name</th>
                                                            <th>Branch/Route</th>
                                                            <th>Account Number</th>
                                                            <th>Biller Code</th>
                                                            <th>Reference (CNR)</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($supplierFin)
                                                        @foreach ($supplierFin as $finance)
                                                            <tr id="finance{{$finance->id}}{{time()}}">
                                                                <td>{{$finance->payment_type}}</td>
                                                                <td>{{$finance->cheque_name}}</td>
                                                                <td>{{$finance->account_name}}</td>
                                                                <td>{{$finance->branch_route}}</td>
                                                                <td>{{$finance->account_number}}</td>
                                                                <td>{{$finance->biller_code}}</td>
                                                                <td>{{$finance->reference}}</td>
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
    <!-- end row -->

</div>
<!-- container -->


@endsection
