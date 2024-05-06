@extends('layouts.main')
@section('app-title','Company View - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Role</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">User Permission </li>
                        <li class="breadcrumb-item active">Manage Role</li>
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
                       <h5>All Users Access Detail</h5>
                       <a href="user-access-asign#" class="btn btn-primary">Assign Role</a>
                    </div>
                   
                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <tr role="row" class="odd">
                                <td >Sarah Caiafa</td>
                                <td>Master View</td>
                               
                                <td>
                                <a href="role-edit#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>
                                        <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom"><i class="uil-trash"></i>
                                        </span></a>
                                    
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td >Sonia Almeida Bueno 	</td>
                                <td>Operational Manager</td>
                               
                                <td>
                                <a href="role-edit#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>
                                        <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom"><i class="uil-trash"></i>
                                        </span></a>
                                    
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td >Steve Jackson</td>
                                <td>Operational Manager PRO Access</td>
                               
                                <td>
                                <a href="role-edit#"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                        </span></a>
                                        <a href="#"><span class="btn btn-danger waves-effect waves-light table-btn-custom"><i class="uil-trash"></i>
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