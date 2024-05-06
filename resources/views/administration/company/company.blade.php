@extends('layouts.main')
@section('app-title','Companies - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Company</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Administration</li>
                        <li class="breadcrumb-item active">Company</li>
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
                        <h5>All Company</h5>
                            @can('company-add')<a href="{{route('administration.company.create')}}" class="btn btn-primary">+ Add New Company</a>@endcan
                        </div>
                    </div>

                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                 <th>Business Name</th>
                                <th>ABN</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($mainCompany as $company)
                                <tr role="row" class="odd">
                                    <td class="max-lines">{{$loop->iteration}}</td>
                                    <td class="max-lines">{{$company->business_name}}</td>
                                    <td>{{$company->abn}}</td>
                                    <td class="max-lines">{{$company->unit}}/{{$company->address_number}}-{{$company->street_address}}-{{$company->suburb}} {{$company->gcity->city_name}} - {{$company->gstate->state_name}} {{$company->zipcode}}</td>
                                    <td>
                                        @if(auth()->user()->role=='admin' || auth()->user()->canAny(['company-activate,company-deactivate']))
                                        <div class="status_dp">
                                            <select onchange="statusChange(this,'{{$company->id}}','main_companies')" class="status_">
                                                @can('company-activate')
                                                    <option {{$company->status == 1 ? 'selected' : ''}} value="1" selected>Active</option>
                                                @endcan
                                                @can('company-deactivate')
                                                    <option {{$company->status == 0 ? 'selected' : ''}} value="0">Deactive</option>
                                                @endcan
                                            </select>
                                        </div>
                                        @else
                                            {{ $company->status == 1 ? 'Active' : 'Deactive' }}
                                        @endif
                                    </td>
                                    <td>
                                        @can('company-view')
                                            <a href="{{route('administration.company.show',['company'=>$company->id])}}"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                            </span></a>
                                       @endcan
                                        @can('company-edit')
                                        <a href="{{route('administration.company.edit',['company'=>$company->id])}}"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
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
@push('push_script')
    @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['company-edit','company-activate','company-deactivate']))
        <script>
            function statusChange(that,id,tdata){
                let status = $(that).val();
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: "{{route('common.statusUpdate')}}",
                    type: 'POST',
                    data: {
                        status: status,
                        id: id,
                        tdata: tdata
                    },
                    success: function(result){
                        $('#modal-alert-data_ajax').modal('show');
                        if(result){
                            $("#modal-alert-dataLabel_ajax").text('Status Changed!');
                            $("#modal-alert-dataLabelMsg_ajax").text('Status Has Been Changed Successfully!');
                            $("#modal-alert-dataLabelMsg_ajax").removeClass('text-danger');
                            $("#modal-alert-dataLabelMsg_ajax").addClass('text-success');
                        }else{
                            $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                            $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                            $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                            $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                        }
                    }
                });
            }
        </script>
    @endif
@endpush
