@extends('layouts.main')
@section('app-title', 'Company View - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">KPI - QCC/QH</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active">KPI - QCC/QH</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12 px-1">
            <div class="advance_filter">
                <a href="#" id="advanced_filter_btn"><i data-feather="sliders"></i> Advanced Filters</a>
            </div>
            <div class="card" id="advanced_filters">
                <div class="card-header">
                    <div class="top_section_title">
                        <h5>Filters</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Site</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="1208">AEC - Boondall</option>
                                    <option value="1341">AEC - Rockhampton</option>
                                    <option value="1368">AEC - Regents Park</option>
                                    <option value="1370">AEC - Woodridge</option>
                                    <option value="1334">AEC - Childers</option>
                                    <option value="1200">AEC - Mackay</option>
                                    <option value="920">AEC - Beverley</option>
                                    <option value="1362">AEC - Kawana</option>
                                    <option value="2">AEC - Bundaberg</option>
                                    <option value="740">AEC - Maryborough</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Portfolio</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="281">The Trustee for The Aequitas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Client</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="1">The Trustee for The Aequitas No2 Trust &amp; The trustee for The
                                        Aequitas No1 Trust</option>
                                    <option value="2">SANTA VENERA PTY. LTD. &amp; THE CALTABIANO FAMILY TRUST</option>
                                    <option value="3">Department of Justice and Attorney-General </option>
                                    <option value="4">Department of Transport and Main Roads</option>
                                    <option value="5">NetRent</option>
                                    <option value="6">The Public Trustee</option>
                                    <option value="7">FERRAGAMO AUSTRALIA PTY LIMITED</option>
                                    <option value="8">The Trustee for Glen Road Tenant Trust</option>
                                    <option value="9">Anytime Cairns Pty Lld</option>
                                    <option value="10">HELP ENTERPRISES LIMITED</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Cleaners / Contractors</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="1">The Trustee for The Aequitas No2 Trust &amp; The trustee for The
                                        Aequitas No1 Trust</option>
                                    <option value="2">SANTA VENERA PTY. LTD. &amp; THE CALTABIANO FAMILY TRUST</option>
                                    <option value="3">Department of Justice and Attorney-General </option>
                                    <option value="4">Department of Transport and Main Roads</option>
                                    <option value="5">NetRent</option>
                                    <option value="6">The Public Trustee</option>
                                    <option value="7">FERRAGAMO AUSTRALIA PTY LIMITED</option>
                                    <option value="8">The Trustee for Glen Road Tenant Trust</option>
                                    <option value="9">Anytime Cairns Pty Lld</option>
                                    <option value="10">HELP ENTERPRISES LIMITED</option>

                                </select>
                            </div>
                        </div>





                        <div class="col-lg-4">
                            <div class="mb-0">
                                <label class="form-label" for="exampleInputEmail1"> Manager</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="8">Marco Araujo</option>
                                    <option value="14">Luan Ramos</option>
                                    <option value="21">Eduardo Abreu</option>
                                    <option value="25">Lorena Lopes</option>
                                    <option value="34">Juan Mejia</option>
                                    <option value="37">Ricki Palmer</option>
                                    <option value="46">Ron Hall</option>
                                    <option value="52">Steve Jackson</option>
                                    <option value="191">Italo Sabatini</option>
                                    <option value="193">Itamar Braga</option>
                                </select>
                            </div>
                        </div>




                    </div>

                </div>
                <div class="bottom_footer_dt">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="#" class="theme_btn btn save_btn"><i class="uil-search-alt"> Search</i></a>
                            <a href="#" class="theme_btn btn btn-warning"><i class="bi-arrow-repeat"></i> Reset
                                Filter</i></a>
                            <!-- <a href="#" class="theme_btn btn ">+ Add New Site</i></a> -->
                            <!-- <a href="#" class="theme_btn btn excel-btn"><i class="bi-file-earmark-excel"></i> Export
                                Excel File</i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-2 px-1">
                    <div class="inner_box_dio top_bx_gho">
                        <div class="top_head_bxcio">
                            <h6>Total of Gross Margin/Month $</h6>
                        </div>
                        <h4>85.56K</h4>
                    </div>
                    <div class="inner_box_dio top_bx_gho top_ghiol">
                        <div class="top_head_bxcio">
                            <h6>Total of Gross Margin/Month %</h6>
                        </div>
                        <h4>20.48 %</h4>
                    </div>

                </div>
                <div class="col-lg-8 px-1">
                    <div class="middle_inner">
                        <div class="box_sido">
                            <div class="inner_box_dio">
                                <div class="top_head_bxcio">
                                        <h6># Portfolio</h6>
                                    </div>
                                    <h4>187</h4>
                            </div>
                            <div class="inner_box_dio">
                                <div class="top_head_bxcio">
                                        <h6># Site</h6>
                                    </div>
                                    <h4>182</h4>
                            </div>
                            <div class="inner_box_dio">
                                <div class="top_head_bxcio">
                                        <h6># Client</h6>
                                    </div>
                                    <h4>23</h4>
                            </div>
                            <div class="inner_box_dio">
                                <div class="top_head_bxcio">
                                        <h6># Cleaners/Contractors</h6>
                                    </div>
                                    <h4>108</h4>
                            </div>
                            <div class="inner_box_dio">
                                <div class="top_head_bxcio">
                                        <h6># Overtime</h6>
                                    </div>
                                    <h4>4.2</h4>
                            </div>
                        </div>
                        <div class="life_time">
                        <div class="inner_box_dio">
                        <div class="top_head_bxcio">
                            <h6>Life Time (Weekly)</h6>
                        </div>
                        <div class="lifetime_data row">
                            <div class="col-lg-3">
                                <h4>176.00 <span>Maximum</span></h4>
                            </div>
                            <div class="col-lg-3">
                                <h4>0.00 <span>Minimum</span></h4>
                            </div>
                            <div class="col-lg-3">
                                <h4>58.16 <span>Average</span></h4>
                            </div>
                            <div class="col-lg-3">
                                <h4>31870.14 <span>Sum (Total)</span></h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-2 px-1">
                    <div class="inner_box_dio profit_dgp">
                        <div class="top_head_bxcio">
                            <h6>Site profit to date (Total)</h6>
                        </div>
                        <h4>$ 5.5 M</h4>
                    </div>


                </div>
            </div>
        </div>

        <div class="col-lg-12 px-1 mt-3">
            <div class="card">
                <div class="card-header hh_title">
                <h4>Revenue <span class="up_"><i data-feather="arrow-up"></i></span> </h4>
                </div>
                <div class="card-body">


                   <div class="row">
                    <div class="col-lg-6 ">
                        <div class="row">
                            <div class="col-lg-3 px-1">
                            <div class="inner_box_dio top_bx_gho box_shadow">
                                <div class="top_head_bxcio">
                                    <h6>Total $ Yearly</h6>
                                </div>
                                <h4>5.01 M</h4>
                            </div>
                            </div>
                            <div class="col-lg-3 px-1">
                            <div class="inner_box_dio top_bx_gho box_shadow">
                            <div class="top_head_bxcio">
                                <h6>Total $ Monthly</h6>
                            </div>
                            <h4>417.56K</h4>
                        </div>
                            </div>
                            <div class="col-lg-3 px-1">
                            <div class="inner_box_dio top_bx_gho box_shadow">
                            <div class="top_head_bxcio">
                                <h6>Total $ Fortnightly</h6>
                            </div>
                            <h4>192.56K</h4>
                        </div>
                            </div>
                            <div class="col-lg-3 px-1">
                            <div class="inner_box_dio top_bx_gho box_shadow">
                            <div class="top_head_bxcio">
                                <h6>Total $ Service Cost </h6>
                            </div>
                            <h4>26.70K</h4>
                        </div>
                            </div>
                            <div class="col-lg-6 px-1">
                                <div class="life_time">
                                    <div class="inner_box_dio  box_shadow">
                                    <div class="top_head_bxcio">
                                        <h6>Time Allocated / Serv</h6>
                                    </div>
                                    <div class="lifetime_data row">
                                    <div class="col-lg-6 ">
                                            <h4>740.21 <span>Sum (Total)</span></h4>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <h4>1.35 <span>Average</span></h4>
                                        </div>

                                    </div>
                                </div>
                                    </div>
                            </div>
                            <div class="col-lg-6 px-1">
                                <div class="life_time">
                                    <div class="inner_box_dio  box_shadow">
                                    <div class="top_head_bxcio">
                                        <h6>Weekly Time Allocate</h6>
                                    </div>
                                    <div class="lifetime_data row">
                                    <div class="col-lg-6 ">
                                            <h4>2815.21 <span>Sum (Total)</span></h4>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <h4>5.14 <span>Average</span></h4>
                                        </div>

                                    </div>
                                </div>
                                    </div>
                            </div>




                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                        <div class="col-lg-12 px-1">
                                <div class="life_time mt-0">
                                    <div class="inner_box_dio  box_shadow">
                                    <div class="top_head_bxcio">
                                        <h6>Hourly Rate</h6>
                                    </div>
                                    <div class="lifetime_data row">
                                    <div class="col-lg-4 ">
                                            <h4>240.00 <span>Maximum</span></h4>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4>0.00 <span>Minimum</span></h4>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4>34.15 <span>Average</span></h4>
                                        </div>

                                    </div>
                                </div>
                                    </div>
                            </div>
                            <div class="col-lg-12 px-1">
                                <div class="life_time ">
                                    <div class="inner_box_dio  box_shadow">
                                    <div class="top_head_bxcio">
                                        <h6>Frequency</h6>
                                    </div>
                                    <div class="lifetime_data row">
                                    <div class="col-lg-4 ">
                                            <h4>7.00 <span>Maximum</span></h4>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4>0.00 <span>Minimum</span></h4>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4>3.84 <span>Average</span></h4>
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
        </div>


        <div class="col-lg-12 px-1">
            <div class="card">
                <div class="card-header hh_title">
                <h4>Expenses <span class="down_"><i data-feather="arrow-down"></i></span> </h4>
                </div>
                <div class="card-body">


                   <div class="row">
                    <div class="col-lg-6 ">
                        <div class="row">
                            <div class="col-lg-3 px-1">
                            <div class="inner_box_dio top_bx_gho box_shadow">
                                <div class="top_head_bxcio">
                                    <h6>Total $ Yearly</h6>
                                </div>
                                <h4>5.01 M</h4>
                            </div>
                            </div>
                            <div class="col-lg-3 px-1">
                            <div class="inner_box_dio top_bx_gho box_shadow">
                            <div class="top_head_bxcio">
                                <h6>Total $ Monthly</h6>
                            </div>
                            <h4>417.56K</h4>
                        </div>
                            </div>
                            <div class="col-lg-3 px-1">
                            <div class="inner_box_dio top_bx_gho box_shadow">
                            <div class="top_head_bxcio">
                                <h6>Total $ Fortnightly</h6>
                            </div>
                            <h4>192.56K</h4>
                        </div>
                            </div>
                            <div class="col-lg-3 px-1">
                            <div class="inner_box_dio top_bx_gho box_shadow">
                            <div class="top_head_bxcio">
                                <h6>Total $ Service Cost </h6>
                            </div>
                            <h4>26.70K</h4>
                        </div>
                            </div>
                            <div class="col-lg-6 px-1">
                                <div class="life_time">
                                    <div class="inner_box_dio  box_shadow">
                                    <div class="top_head_bxcio">
                                        <h6>Time Allocated / Serv</h6>
                                    </div>
                                    <div class="lifetime_data row">
                                    <div class="col-lg-6 ">
                                            <h4>740.21 <span>Sum (Total)</span></h4>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <h4>1.35 <span>Average</span></h4>
                                        </div>

                                    </div>
                                </div>
                                    </div>
                            </div>
                            <!-- <div class="col-lg-6 px-1">
                                <div class="life_time">
                                    <div class="inner_box_dio  box_shadow">
                                    <div class="top_head_bxcio">
                                        <h6>Weekly Time Allocate</h6>
                                    </div>
                                    <div class="lifetime_data row">
                                    <div class="col-lg-6 ">
                                            <h4>2815.21 <span>Sum (Total)</span></h4>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <h4>5.14 <span>Average</span></h4>
                                        </div>

                                    </div>
                                </div>
                                    </div>
                            </div> -->




                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                        <div class="col-lg-12 px-1">
                                <div class="life_time mt-0">
                                    <div class="inner_box_dio  box_shadow">
                                    <div class="top_head_bxcio">
                                        <h6>Hourly Rate</h6>
                                    </div>
                                    <div class="lifetime_data row">
                                    <div class="col-lg-4 ">
                                            <h4>240.00 <span>Maximum</span></h4>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4>0.00 <span>Minimum</span></h4>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4>34.15 <span>Average</span></h4>
                                        </div>

                                    </div>
                                </div>
                                    </div>
                            </div>
                            <div class="col-lg-12 px-1">
                                <div class="life_time ">
                                    <div class="inner_box_dio  box_shadow">
                                    <div class="top_head_bxcio">
                                        <h6>Frequency</h6>
                                    </div>
                                    <div class="lifetime_data row">
                                    <div class="col-lg-4 ">
                                            <h4>7.00 <span>Maximum</span></h4>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4>0.00 <span>Minimum</span></h4>
                                        </div>
                                        <div class="col-lg-4 ">
                                            <h4>3.84 <span>Average</span></h4>
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
        </div>


        <div class="col-lg-12 px-1">
            <div class="card">
                <div class="card-header">
                    <div class="top_section_title">
                        <h5>All Contractors</h5>
                        <!-- <a href="contractors-create.php" class="btn btn-primary">+ Add New Contractor</a> -->
                    </div>

                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>ABN</th>
                                <th>Responsible</th>
                                <th>Responsible Contact</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr role="row" class="odd">
                                <td >24/7</td>
                                <td>33 144 825 052</td>
                                <td>
                                    Luan

                                </td>
                                <td>
                                    0449061404
                                </td>
                                <td>
                                    luan@qcc.cleaning
                                </td>

                                <td>
                                    <div class="status_dp">
                                        <select  class="status_">
                                            <option value="ATM" selected>Active</option>
                                            <option value="BANK">Deactive</option>
                                        </select>
                                    </div>
                                </td>

                                <td>
                                    <a href="contractor-view.php"><span
                                            class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                class="uil-eye"></i>
                                        </span></a>

                                    <a href="contractor-edit.php"><span
                                            class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                class="uil-edit"></i>
                                        </span></a>


                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td >A Hert &amp; M Hert</td>
                                <td>29 642 019 234</td>
                                <td>
                                    Melanie
                                </td>
                                <td>
                                    0416283249
                                </td>
                                <td>
                                    herts.less.cleaning@gmail.com
                                </td>

                                <td>
                                    <div class="status_dp">
                                        <select  class="status_">
                                            <option value="ATM" selected>Active</option>
                                            <option value="BANK">Deactive</option>
                                        </select>
                                    </div>
                                </td>

                                <td>
                                    <a href="contractor-view.php"><span
                                            class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                class="uil-eye"></i>
                                        </span></a>

                                    <a href="contractor-edit.php"><span
                                            class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                class="uil-edit"></i>
                                        </span></a>


                                </td>
                            </tr>

                            <tr role="row" class="even">
                                <td >Abel Services</td>
                                <td>48 836 342 288</td>
                                <td>
                                    Lorena
                                </td>
                                <td>
                                    0468 468 336
                                </td>
                                <td>
                                    lorena@qcc.cleaning
                                </td>

                                <td>
                                    <div class="status_dp">
                                        <select  class="status_">
                                            <option value="ATM" selected>Active</option>
                                            <option value="BANK">Deactive</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <a href="contractor-view.php"><span
                                            class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                class="uil-eye"></i>
                                        </span></a>

                                    <a href="contractor-edit.php"><span
                                            class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                class="uil-edit"></i>
                                        </span></a>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td >Abelia Cleaning</td>
                                <td>71 416 960 145</td>
                                <td>
                                    Matthew
                                </td>
                                <td>
                                    0420516979
                                </td>
                                <td>
                                    matthew@qcc.cleaning
                                </td>
                                <td>
                                    <div class="status_dp">
                                        <select  class="status_">
                                            <option value="ATM" selected>Active</option>
                                            <option value="BANK">Deactive</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <a href="contractor-view.php"><span
                                            class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                class="uil-eye"></i>
                                        </span></a>

                                    <a href="contractor-edit.php"><span
                                            class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                class="uil-edit"></i>
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

@endsection
@push('push_script')
<script>
    $(document).ready(function () {
        $('#advanced_filters').hide();
        $('#advanced_filter_btn').click(function () {
            $('#advanced_filters').toggle();
        })


    })
</script>
@endpush
