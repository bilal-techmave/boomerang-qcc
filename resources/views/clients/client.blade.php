@extends('layouts.main')
@section('app-title','Clients - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Clients</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Clients</li>
                        <li class="breadcrumb-item active">Clients</li>
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
                       <h5>All Client</h5>
                       @can('client-create')<a href="{{route('client.client.create')}}" class="btn btn-primary">+ Add New Client</a>@endcan
                    </div>

                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Business Name</th>
                                <th>Trading Name</th>
                                <th>ABN</th>
                                <th>Phone Number</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr role="row" class="odd">
                                <td >{{$loop->iteration}}</td>
                                <td >{{$client->business_name}}</td>
                                <td>{{$client->trading_name}}</td>
                                <td>{{$client->abn}}</td>
                                <td>{{$client->phone_number}}</td>
                                @if ($client->status =='1')
                                <td><i class="uil-check-circle status-entity" style="color:green"></i></td>
                                @else
                                <td><i class="uil-times-circle status-entity" style="color:red"></i></td>
                                @endif
                                <td>
                                    @can('client-view')
                                        <a href="{{route('client.client.show',['client'=>$client->id])}}"><span
                                            class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                            class="uil-eye"></i>
                                        </span></a>
                                    @endcan
                                    @can('client-edit')
                                        <a href="{{route('client.client.edit',['client'=>$client->id])}}"><span
                                            class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                            class="uil-edit"></i>
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
