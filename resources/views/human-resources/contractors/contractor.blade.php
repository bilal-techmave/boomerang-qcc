@extends('layouts.main')
@section('app-title','Contractors - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Contractors</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Human Resources</li>
                        <li class="breadcrumb-item active">Contractors</li>
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
                        <h5>All Contractors</h5>
                        @can('contractors-create')<a href="{{route('hr.contractor.create')}}" class="btn btn-primary">+ Add New Contractor</a>@endcan
                    </div>

                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>ABN</th>
                                <th>Responsible</th>
                                <th>Responsible Contact</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($contractors)
                                @foreach ($contractors as $contractor)
                                <tr role="row" class="odd">
                                    <td>{{ $loop->iteration  }}</td>
                                    <td >{{$contractor->name}}</td>
                                    <td>{{$contractor->abn}}</td>
                                    <td>{{$contractor->responsible->name ?? '-'}}</td>
                                    <td>{{$contractor->responsible->phone_number ?? '-'}}</td>
                                    <td>{{$contractor->responsible->email ?? '-'}}</td>
                                    <td>
                                        @if(auth()->user()->role=='admin' || auth()->user()->canAny(['contractors-activate,contractors-deactivate']))
                                        <div class="status_dp">
                                            <select class="status_" onchange="statusChange(this,'{{$contractor->id}}','contractors')">
                                                <option value="1" {{$contractor->status == '1' ? 'selected' : ''}} >Active</option>
                                                <option value="0" {{$contractor->status == '0' ? 'selected' : ''}}>Deactive</option>
                                            </select>
                                        </div>
                                        @else
                                            {{$contractor->status == '1' ? 'Active' : 'Deactive'}}
                                        @endif
                                    </td>
                                    <td>
                                        @can('contractor-view') <a href="{{route('hr.contractor.show',['contractor'=>$contractor->id])}}"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i></span></a> @endcan
                                        @can('contractor-edit') <a href="{{route('hr.contractor.edit',['contractor'=>$contractor->id])}}"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i></span></a>@endcan
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
@if(auth()->user()->role=='admin' || auth()->user()->canAny(['contractors-activate,contractors-deactivate']))
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
