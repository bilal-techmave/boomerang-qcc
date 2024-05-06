@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Show Portfolio</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Operational Dashboard</li>
                        <li class="breadcrumb-item">Portfolio Structure</li>
                        <li class="breadcrumb-item active">Show Portfolio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card show_portfolio_tab">
                <div class="card-header">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                <span><i class="uil-info-circle"></i></span>
                                <span>Basic Info</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                <span><i class="uil-user-square"></i></span>
                                <span>Contacts</span>
                            </a>
                        </li>

                        @can('site-view')
                        <li class="nav-item">
                            <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-building"></i></span>
                                <span>Sites</span>
                            </a>
                        </li>
                        @endcan

                        @can('portfolio-view-comments')
                        <li class="nav-item">
                            <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-comment-alt"></i></span>
                                <span>Comments</span>
                            </a>
                        </li>
                        @endcan

                        <li class="nav-item">
                            <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                <span><i class="uil-ticket"></i></span>
                                <span>Tickets</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">

                    <div class="tab-content  text-muted">
                        <div class="tab-pane show active" id="home">
                            <div class="main_bx_dt">
                                <div class="top_dt_sec">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Client</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="ARA" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Portfolio Full
                                                    name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="Parcel Locker" placeholder=""
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Portfolio Short
                                                    name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="Parcel Locker" placeholder=""
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Portfolio Manager
                                                    <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="Steve Jackson" placeholder=""
                                                    readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 mt-3 mt-sm-0">
                                                <label class="form-label">State</label>
                                                <select data-plugin="customselect" class="form-select">
                                                    <option value="0">New South Wales</option>
                                                    <option value="1">Australian Capital Territory</option>
                                                    <option value="2">South Australia</option>
                                                    <option value="3">Northern Territory</option>
                                                    <option value="4" selected>Queensland</option>
                                                    <option value="5">Victoria</option>
                                                    <option value="6">Western Australia</option>
                                                    <option value="7">Tasmania</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <a href="#" class="theme_btn btn-primary btn"><i
                                                        class="uil-list-ul"></i> List</a>
                                                <a href="#" id="edit_dt__" class="theme_btn btn btn-secondary"><i
                                                        class="uil-edit"></i> Edit</a>
                                                <a href="#" class="theme_btn btn btn-danger"><i
                                                        class="uil-trash-alt"></i> Deactivate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main_bx_dt -->

                            <div class="main_bx_edit">
                                <div class="top_dt_sec">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Client</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="ARA" placeholder="" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Portfolio Full
                                                    name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="Parcel Locker" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Portfolio Short
                                                    name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="Parcel Locker" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Portfolio Manager
                                                    <span class="red">*</span></label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" value="Steve Jackson" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-3 mt-3 mt-sm-0">
                                                <label class="form-label">State</label>
                                                <select data-plugin="customselect" class="form-select">
                                                    <option value="0">New South Wales</option>
                                                    <option value="1">Australian Capital Territory</option>
                                                    <option value="2">South Australia</option>
                                                    <option value="3">Northern Territory</option>
                                                    <option value="4" selected>Queensland</option>
                                                    <option value="5">Victoria</option>
                                                    <option value="6">Western Australia</option>
                                                    <option value="7">Tasmania</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <a href="#" id="save_dt" class="theme_btn btn btn-success"><i
                                                        class="uil-file-upload"></i> Save</a>
                                                <a href="#" class="theme_btn btn-primary btn"><i
                                                        class="uil-list-ul"></i> List</a>
                                                <a href="#" class="theme_btn btn btn-danger"><i
                                                        class="uil-trash-alt"></i> Deactivate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main_bx_edit -->
                        </div>
                        <div class="tab-pane " id="profile">
                            <div class="contact_table">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-bordered table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Contact From</th>
                                                        <th scope="col">Phone Number</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Contact Type</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td>Roy Weerarathne</td>
                                                    <td>Client</td>
                                                    <td>0457 865 449</td>
                                                    <td>RWeerarathne@arapropertyservices.com.au</td>
                                                    <td>Manager</td>
                                                </tr>

                                                <tr>
                                                    <td>Ben Reti</td>
                                                    <td>Client</td>
                                                    <td>0430 001 749</td>
                                                    <td>breti@arapropertyservices.com.au</td>
                                                    <td>Manager</td>
                                                </tr>

                                                <tr>
                                                    <td>Angela Doherty</td>
                                                    <td>Client</td>
                                                    <td>0404 933 753</td>
                                                    <td>adoherty@arapropertyservices.com.au</td>
                                                    <td>Manager</td>
                                                </tr>

                                            </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        @can('site-view')
                        <div class="tab-pane" id="messages">
                           <div class="sites_main">
                            <div class="row">
                                <div class="col-lg-12">
                                <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Reference / Building</th>
                                                    <th>Active</th>
                                                    <th>Regular Site</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>


                            <tr role="row" class="odd">
                                    <td >Parcel Locker - Booval </td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-check-circle status-entity" style="color:green">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="even">
                                    <td >Parcel Locker - Bundall </td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-times-circle status-entity" style="color:red">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td >Parcel Locker - Elanora</td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-check-circle status-entity" style="color:green">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="even">
                                    <td >Parcel Locker - Gladstone</td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-times-circle status-entity" style="color:red">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td >Parcel Locker - Hervey Bay</td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-check-circle status-entity" style="color:green">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="even">
                                    <td >Parcel Locker - Mackay West</td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-check-circle status-entity" style="color:green">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td >Parcel Locker - Redbank Plains</td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-check-circle status-entity" style="color:green">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="even">
                                    <td >Parcel Locker - Southport</td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-check-circle status-entity" style="color:green">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="odd">
                                    <td >Parcel Locker - Surfers Paradise</td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-check-circle status-entity" style="color:green">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr><tr role="row" class="even">
                                    <td >Parcel Locker Cairns</td>

                                        <td><i class="uil-check-circle status-entity" style="color:green"></i></td>


                                        <td><i class="uil-times-circle status-entity" style="color:red">
                                        </i></td>

                                    <td>
                                        <a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                        </span></a>


                                        <a href="#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>

                                    </td>
                                </tr></tbody>
                                        </table>
                                </div>
                            </div>
                           </div>
                        </div>
                        @endcan

                        @can('portfolio-view-comments')
                        <div class="tab-pane" id="comments">
                            <div class="not-found">
                                <img src="assets/images/new-images/search.png" alt="">
                                <h6>Data Not Found !</h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, vero?</p>
                            </div>
                        </div>
                        @endcan

                        <div class="tab-pane" id="tickets">
                        <div class="sites_main">
                            <div class="row">
                                <div class="col-lg-12">
                                <table id="basic-datatable2" class="table table-bordered table-striped dt-responsive nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Data Issued</th>
                                                    <th>Type </th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                        <tr role="row" class="odd">
                                                <td >All Auspost locker have been terminated</td>
                                                <td>17/11/2020 10:10:16</td>
                                                <td>Termination</td>
                                                <td>Closed</td>
                                                <td><a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                                    </span></a></td>
                                            </tr><tr role="row" class="even">
                                                <td >termination of all parcel lockers please see sites below</td>
                                                <td>29/10/2020 10:07:32</td>
                                                <td>Termination</td>
                                                <td>Closed</td>
                                                <td><a href="#"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                                    </span></a></td>
                                            </tr></tbody>
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
