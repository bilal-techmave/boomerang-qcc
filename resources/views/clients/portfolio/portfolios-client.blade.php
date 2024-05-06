@extends('layouts.main')
@section('app-title', 'Portfolios - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Portfolios</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Portfolios</li>
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
                            <h5>All Portfolios</h5>
                           @can('portfolio-create') <a href="{{ route('client.portfolio.create') }}" class="btn btn-primary">+ Add New Portfolio</a> @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Portfolio Full name</th>
                                    <th>Portfolio Short name</th>
                                    <th>Portfolio Manager</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($clientPortfolio)
                                    @foreach ($clientPortfolio as $portfolio)
                                        <tr role="row" class="odd">
                                            <td >{{$portfolio->full_name}}</td>
                                            <td>{{$portfolio->short_name}}</td>
                                            <td>{{$portfolio->manager->name ?? '-'}} {{$portfolio->manager->surname ?? '-'}}</td>
                                            <td>@if ($portfolio->status == 0) <i class="uil-times-circle status-entity" style="color:red"></i>
                                                @else <i class="uil-check-circle status-entity" style="color:green"></i>
                                            @endif </td>
                                            <td>
                                                @can('portfolio-view')
                                                <a href="{{route('client.portfolio.show',['portfolio'=>$portfolio])}}">
                                                    <span class="btn btn-info waves-effect waves-light table-btn-custom">
                                                        <i class="uil-eye"></i>
                                                    </span>
                                                </a>
                                                @endcan
                                                @can('portfolio-edit')
                                                <a href="{{route('client.portfolio.edit',['portfolio'=>$portfolio])}}">
                                                    <span class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                        <i class="uil-edit"></i>
                                                    </span>
                                                </a>
                                                @endcan
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
