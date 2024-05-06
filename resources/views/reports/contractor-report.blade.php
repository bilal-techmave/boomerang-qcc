@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Contractor Report</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item active">Contractor Report</li>
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
                        <h5>Filters</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Schedule Date Start</label>
                                <input type="text" class="form-control" id="basic-datepicker6"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Schedule Date Finish</label>
                                <input type="text" class="form-control" id="basic-datepicker"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Completion Date Start</label>
                                <input type="text" class="form-control" id="basic-datepicker3"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Completion Date Finish</label>
                                <input type="text" class="form-control" id="basic-datepicker2"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Date Attendance Start</label>
                                <input type="text" class="form-control" id="basic-datepicker4"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Date Attendance Finish</label>
                                <input type="text" class="form-control" id="basic-datepicker5"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">WO#</label>
                                <input type="text" class="form-control" id="basic-datepicker3"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Contractor</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="1" selected="selected">A Hert &amp; M Hert</option>
                                    <option value="2">CORPORATE INTEGRATED SERVICES PTY LTD</option>
                                    <option value="3">Eagle Eye</option>
                                    <option value="5">Etwell Commercial</option>
                                    <option value="6">FBL Holdings</option>
                                    <option value="7">Focus Cleaning</option>
                                    <option value="8">JUSTIN &amp; SHANNON'S HOUSE PROUD</option>
                                    <option value="9">Kyadam Pty Ltd</option>
                                    <option value="10">Priority One Property</option>
                                    <option value="11">Prisma Cleaning</option>
                                    <option value="12">PROGRESS FACILITY</option>
                                    <option value="13">qldqualityclean</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Contractor's Cleaner</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="null">Please select one or start typing</option>
                                    <option value="321">Christopher Jonh Albert  Mottram</option>
                                    <option value="407">Runner Runner 01</option>
                                    <option value="161">Melanie Hert</option>
                                    <option value="1559">Bills Crealy</option>
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
                            <a href="#" class="theme_btn btn excel-btn"><i class="bi-file-earmark-excel"></i> Export
                                Excel File</i></a>
                        </div>
                                    </div>
                                </div>
            </div>
            <div class="card">

                <div class="card-header">
                    <div class="top_section_title">
                        <h5>Invoice Runner</h5>
                        <!-- <a href="site-add#" class="btn btn-primary">+ Add New Site</a> -->
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <div class="table_box">
                                <table id="basic-datatable" class="table table-bordered   w-100">
                                    <thead>
                                        <tr>
                                            <th>WO#</th>
                                            <th>Reference Number</th>
                                            <th>site Reference</th>

                                            <th>Client</th>
                                            <th>Portfolio</th>
                                            <th>Address</th>
                                            <th>Description</th>
                                            <th>Observation</th>
                                            <th>Cleaner Name</th>
                                            <th>Total Hours</th>
                                            <th>Hourly Rate</th>
                                           <th>Budget</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
        
            <tr>
                <td>WO#8402</td>
                <td></td>
                <td>Tradelink Capalaba</td>
                <td>GJK</td>
                <td>Tradelink</td>
                <td>120/Redland Bay Rd/Capalaba/BRISBANE</td>
                <td>Landscaping/Grounds: Landscaping Maintenance - RMs: Garden Maintenance - Mowing and Edging, Seasonal Weed Control, Trimming of hedges, Two services per month (Oct to Mar), one service per month (Apr – Sep) for a total of 18 pa (Monthly Invoicing)</td>
                <td></td>
                <td>Runner Runner 01</td>
                <td>1</td>
               <td></td>
               <td>1.00</td>
                
            
            </tr>
        
          
        
           
        
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