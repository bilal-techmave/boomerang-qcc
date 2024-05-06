@extends('layouts.main')
@section('app-title', 'Prospect Clients - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Prospect Clients</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Prospect Clients</li>
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
                            <h5>All Prospect Client</h5>
                            @can('cleaner-create-prospect')
                                <a href="{{ route('client.prospect.create') }}" class="btn btn-primary">+ Add New Prospect
                                    Client</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Business Name</th>
                                    <th>ABN</th>
                                    <th>Phone Number</th>
                                    <th>Created By</th>
                                    <th>Last Comment Date:</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client_prospect as $prospect)
                                    <tr role="row" class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $prospect->business_name }}</td>
                                        <td>{{ $prospect->abn }}</td>
                                        <td>{{ $prospect->phone_number }}</td>
                                        <td>{{ $prospect->createby->name ?? '-' }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($prospect->updated_at)) }}</td>
                                        <td>
                                            @can('client-view')
                                                <a href="{{ route('client.client.show', ['client' => $prospect->id]) }}"><span
                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                            class="uil uil-eye"></i>
                                                    </span></a>
                                            @endcan
                                            @can('client-edit')
                                                <a href="{{ route('client.client.edit', ['client' => $prospect->id]) }}"><span
                                                        class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                            class="uil uil-edit"></i>
                                                    </span></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

