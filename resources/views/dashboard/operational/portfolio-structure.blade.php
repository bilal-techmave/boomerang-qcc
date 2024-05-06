@extends('layouts.main')
@section('app-title','Portfolio Structure - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Portfolio Structure</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Operational Dashboard</li>
                        <li class="breadcrumb-item active">Portfolio Structure</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        @if($portfolio_managers_data)
            @foreach ($portfolio_managers_data as $data)
            @php
                $totalprotfolio = 0;
            @endphp
                <div class="col-xl-3">
                    <!-- Portlet card -->
                    <div class="card portfolio_card">
                        <div class="card-header">
                            <h5>{{$data->name ??''}} {{$data->surname ??''}}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive fixTableHead">
                                <table class="table mb-0  table-striped">
                                    <thead >
                                        <tr>
                                            <th scope="col">Portfolio</th>
                                            <th scope="col">Total Sites</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($data->portfolio_managers)
                                            @foreach ($data->portfolio_managers as $portf)
                                            @php
                                                $totalprotfolio += count($portf->siteprotfolios)??0;
                                            @endphp
                                                <tr>
                                                    <td><a href="{{route('client.portfolio.show',['portfolio'=>$portf])}}">{{$portf->full_name}}</a></td>
                                                    <td><a href="{{route('client.portfolio.show',['portfolio'=>$portf])}}">{{ count($portf->siteprotfolios) ?? 0 }}</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card-body -->
                        <div class="card-footer">
                            <h5>Total: {{$totalprotfolio}}</h5>
                        </div>
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col-->
            @endforeach
        @endif

    </div>
    <!-- end row -->

</div>
<!-- container -->
@endsection
