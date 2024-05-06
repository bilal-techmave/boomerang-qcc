@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">NCR Reports</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Compliance</li>
                        <li class="breadcrumb-item active">NCR Reports</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="top_section_title">
                        <h5>All NCR Reports</h5>
                        <!-- <a href="contractors-create#" class="btn btn-primary">+ Add New Contractor</a> -->
                    </div>

                </div>
                <div class="card-body">
                    <div class="table_box">
                    <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Creator Name</th>
                                <th>Client</th>
                                <th>Portfolio</th>
                                <th>Site</th>
                                <th>Creation Date</th>
                                <th>Status</th>
                                <th>Responsible</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                        <tr role="row" class="odd">
                                <td >Ron Hall</td>
                                <td>VIVID</td>
                                <td>Suncorp - VIVID QLD</td>
                                <td>Hervey Bay (139 Boat Harbour Drive)</td>
                                <td>05/12/2019 08:29:34</td>
                                <td>Done</td>
                                <td>Anna Botti</td>
                                <td>

                                    <a href="ncr-reports-view#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                    </span></a>




                                </td>
                            </tr><tr role="row" class="even">
                                <td >Ron Hall</td>
                                <td>Scape Merivale Operator Pty Ltd</td>
                                <td></td>
                                <td>Scape Merivale street</td>
                                <td>05/12/2019 11:04:49</td>
                                <td>Done</td>
                                <td>Debora Belo</td>
                                <td>

                                    <a href="ncr-reports-view#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                    </span></a>




                                </td>
                            </tr><tr role="row" class="odd">
                                <td >Ron Hall</td>
                                <td>Scape Peel Operator Pty Ltd</td>
                                <td></td>
                                <td>Peel street</td>
                                <td>18/12/2019 13:52:09</td>
                                <td>Done</td>
                                <td>Diego Miloso Torres</td>
                                <td>

                                    <a href="ncr-reports-view#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                    </span></a>




                                </td>
                            </tr><tr role="row" class="even">
                                <td >Ron Hall</td>
                                <td>Scape Peel Operator Pty Ltd</td>
                                <td></td>
                                <td>Peel street</td>
                                <td>19/12/2019 12:18:24</td>
                                <td>Done</td>
                                <td>Diego Miloso Torres</td>
                                <td>

                                    <a href="ncr-reports-view#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                    </span></a>




                                </td>
                            </tr><tr role="row" class="odd">
                                <td >Ron Hall</td>
                                <td>VIVID</td>
                                <td>ANZ - QLD</td>
                                <td>ANZ - Gympie</td>
                                <td>26/02/2020 15:10:44</td>
                                <td>Done</td>
                                <td>Anna Botti</td>
                                <td>

                                    <a href="ncr-reports-view#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                    </span></a>




                                </td>
                            </tr><tr role="row" class="even">
                                <td >Ron Hall</td>
                                <td>Arkadia </td>
                                <td>Homemaker - Fortitude Valley</td>
                                <td>Homemaker Centre Fortitude Valley</td>
                                <td>28/02/2020 13:11:32</td>
                                <td>Done</td>
                                <td>Luis Quinteros</td>
                                <td>

                                    <a href="ncr-reports-view#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                    </span></a>




                                </td>
                            </tr>

                        </tbody>
                    </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
