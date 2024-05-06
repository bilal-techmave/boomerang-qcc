@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Add Job Sub Type</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Work Order</li>
                        <li class="breadcrumb-item">Job Type</li>
                        <li class="breadcrumb-item active">Add Job Sub Type</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
          
                <div class="card-body">
                    <div class="row">
                 
                        
                        <div class="col-lg-3">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label">Job Type </label>
                                <select data-plugin="customselect" class="form-select">
                                <option value="null">Please select one or start typing</option>
                                <option value="1">Regular Cleaning</option>
                                <option value="2">Periodical</option>
                                <option value="3">AdHoc</option>
                                <option value="4">Special Revenue</option>
                                <option value="5">Exception</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Job Sub Type </label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="bottom_footer_dt">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="action_btns">
                                <a href="tickets#" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</a>
                                <a href="tickets#" class="theme_btn btn-primary btn"><i
                                        class="uil-list-ul"></i> List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


    </div>
</div>
@endsection