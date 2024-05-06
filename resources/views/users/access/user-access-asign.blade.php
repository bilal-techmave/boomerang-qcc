@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Edit Role</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">User Permission</li>
                        <li class="breadcrumb-item active">Edit Role</li>
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
                   
                    <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">User</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="ANNUAL_LEAVE_REQUEST">Sarah Caiafa</option>
                                    <option value="CHANGE_OVER_REQUEST">Sonia Almeida Bueno</option>
                                    <option value="CLIENT_REQUEST">Steve Jackson</option>
                                    <option value="CLIENT_SETUP">Support QCC</option>
                                    <option value="COMPLAINT">Susan Thornton</option>
                        
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Role</label>
                                <select data-plugin="customselect" class="form-select">
                                    <option value="ANNUAL_LEAVE_REQUEST">Master View</option>
                                    <option value="CHANGE_OVER_REQUEST">Operational Manager</option>
                                    <option value="CLIENT_REQUEST">Operational Manager PRO Access</option>
                                    <option value="CLIENT_SETUP">Operational Supervisor</option>
                                  
                                </select>
                            </div>
                        </div>
                    
                        

                    </div>
                    
                </div>
                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <a href="user-access#" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</a>
                                                <a href="user-access#" class="theme_btn btn-primary btn"><i
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