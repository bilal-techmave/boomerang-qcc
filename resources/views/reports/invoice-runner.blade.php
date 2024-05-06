@extends('layouts.main')
@section('app-title', 'Company View - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Invoice Runner</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Reports</li>
                            <li class="breadcrumb-item active">Invoice Runner</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="GET">
                    <div class="card">
                        <div class="card-header">
                            <div class="top_section_title">
                                <h5>Filters</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">From</label>
                                        <input type="text" class="form-control basic-datepicker" id="basic-datepicker4" name="completion_date" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">To</label>
                                        <input type="text" class="form-control basic-datepicker" id="basic-datepicker3" name="completion_date" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>



                            </div>

                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button href="#" class="theme_btn btn save_btn"><i class="uil-search-alt"> Search</i></button>
                                    <a href="{{route('report.invoice.runner')}}" class="theme_btn btn btn-warning"><i class="bi-arrow-repeat"></i>Reset Filter</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card">

                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>Invoice Runner</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="table-responsive">
                                    <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>TSO#</th>
                                                <th>Reference Number</th>
                                                <th>Accounts Comment</th>
                                                <th>Client</th>
                                                <th>Portfolio</th>
                                                <th>Suburb</th>
                                                <th>Description</th>
                                                <th>Completed On</th>
                                                <th>Working Hours</th>
                                                <th>Invoice Number</th>
                                                <th>Sales Price</th>
                                                <th>Rate</th>
                                                <th>Gross</th>
                                                <th>Paid</th>
                                                <th>Runner Full Name</th>
                                                {{-- <th>Action</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @isset($invoice_runners)
                                                @foreach ($invoice_runners as $invoice)
                                                    <tr>
                                                        <td class="max-lines">WO#{{ $invoice->id ?? '--' }}</td>
                                                        <td class="max-lines">{{ $invoice->reference_number ?? '--' }}</td>
                                                        <td class="max-lines"></td>
                                                        <td class="max-lines">{{ $invoice->client->business_name ?? '--' }}</td>
                                                        <td class="max-lines">{{ $invoice->portfolio->full_name ?? '--' }} </td>
                                                        <td class="max-lines">{{ $invoice->site->suburb ?? 'N/A' }}</td>
                                                        <td class="max-lines">{{ $invoice->description ?? '--' }}</td>
                                                        <td class="max-lines">{{ $invoice->completion_date ?? '--' }}</td>
                                                        <td class="max-lines">{{ $invoice->time_allocated ?? '0' }}</td>
                                                        <td class="max-lines">{{ $invoice->invoice_number ?? '' }}</td>
                                                        <td class="max-lines">{{ $invoice->sales_price ?? '' }}</td>
                                                        <td class="max-lines"></td>
                                                        <td class="max-lines"></td>
                                                        <td class="max-lines"></td>
                                                        <td class="max-lines"></td>
                                                        {{-- <td><a href="invoice-runner-view#"><span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                        class="uil-eye"></i>
                                                                </span></a></td> --}}
                                                    </tr>
                                                @endforeach
                                            @endisset

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
