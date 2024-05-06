@extends('layouts.main')
@section('app-title', 'Manage Role - Quality Commercial Cleaning')
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
                            <h5>All Roles</h5>
                            @can('role-add')

                            <a href="{{route('user.roles.create')}}" class="btn btn-primary">+ Add New Role</a>
                            @endcan
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th hidden></th>
                                    <th>Role Name</th>
                                    <th>Internal Code</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($roles)
                                    @foreach ($roles as $role)
                                    <tr>
                                        <td hidden>{{$role->id}}</td>
                                        <td >{{$role->name}}</td>
                                        <td>{{ $role->internal_code }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>
                                            @can('role-edit')
                                            <a href="{{route('user.roles.edit',['role'=>$role->id])}}"><span
                                                class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                    class="uil-edit"></i>
                                            </span></a>
                                            @endcan

                                            {{-- <a href="#"><span
                                                    class="btn btn-danger waves-effect waves-light table-btn-custom"><i
                                                        class="uil-trash"></i>
                                                </span></a> --}}

                                        </td>
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
@endsection
