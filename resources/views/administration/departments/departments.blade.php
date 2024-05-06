@extends('layouts.main')
@section('app-title', 'Departments - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Departments</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Administration</li>
                            <li class="breadcrumb-item active">Departments</li>
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
                            <h5>All Departments</h5>
                            @can('department-add') <a href="{{ route('administration.department.create') }}" class="btn btn-primary">+ Add New
                                Departments</a> @endcan
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                     <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Use in Work Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($departments)
                                    @foreach ($departments as $department)
                                        <tr role="row" class="odd">
                                             <!--<td hidden></td>-->
                                            <td>{{ $loop->iteration }}</td>
                                            <td >{{$department->name}}</td>
                                            <td>{{$department->email}}</td>
                                            <td>
                                                @if(auth()->user()->role=='admin' || auth()->user()->canAny(['department-activate,department-deactivate']))
                                                <div class="status_dp">
                                                    <select onchange="statusChange(this,'{{$department->id}}','departments')" class="status_" >
                                                        @can('department-activate')<option value="1" {{$department->status == 1 ? 'selected' : ''}}>Active</option>@endcan
                                                        @can('department-deactivate')<option value="0" {{$department->status == 0 ? 'selected' : ''}}>Deactive</option>@endcan
                                                    </select>
                                                </div>
                                                @else
                                                    {{ $department->status == 1 ? 'Active' : 'Deactive' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($department->is_work_order)
                                                    <i class="uil-check-circle status-entity" style="color:green"></i>
                                                @else
                                                    <i class="uil-times-circle status-entity" style="color:red"></i>
                                                @endif
                                            </td>

                                            <td>
                                                @can('department-edit')
                                                <a href="{{route('administration.department.edit',['department'=>$department->id])}}">
                                                    <span class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                        <i class="uil-edit"></i>
                                                    </span>
                                                </a>
                                                @endcan

                                                @can('department-view')
                                                <a href="{{route('administration.department.show',['department'=>$department->id])}}">
                                                    <span class="btn btn-info waves-effect waves-light table-btn-custom">
                                                        <i class="uil-eye"></i>
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
@push('push_script')
@if(auth()->user()->role=='admin' || auth()->user()->canAny(['department-activate,department-edit,department-deactivate']))
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
