@extends('layouts.main')
@section('app-title','Team Players - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Team Player</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Human Resources</li>
                        <li class="breadcrumb-item active">Team Player</li>
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
                        <h5>All Team player</h5>
                        @can('team-player-create')<a href="{{route('hr.team-player.create')}}" class="btn btn-primary">+ Add New Team player</a>@endcan
                    </div>

                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Team Player Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users)
                                @foreach ($users as $user)
                                    <tr >
                                        <td>{{ $loop->index+1 }}</td>
                                        <td >{{$user->name}} {{$user->surname ?? ''}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{Str::ucfirst($user->role) ?? '-'}}</td>
                                        <td>
                                            {{-- {{$user->status}} --}}
                                            @if(auth()->user()->role=='admin' || auth()->user()->canAny(['team-player-activate,team-player-deactivate']))
                                            <div class="status_dp">
                                                <select class="status_" onchange="statusChange(this,'{{$user->id}}','users')" >
                                                   @can('team-player-activate') <option value="1" {{$user->status == '1' ? 'selected' : ''}}>Active</option>@endcan
                                                   @can('team-player-deactivate')<option value="0" {{$user->status == '0' ? 'selected' : ''}}>Deactive</option>@endcan
                                                </select>
                                            </div>
                                            @else
                                                {{$user->status == '1' ? 'Active' : 'Inactive'}}
                                            @endif
                                        </td>
                                        <td>
                                            @can('team-player-view')<a href="{{route('hr.team-player.show',['team_player'=>$user->id])}}"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i></span></a>@endcan
                                            @can('team-player-edit')<a href="{{route('hr.team-player.edit',['team_player'=>$user->id])}}"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i></span></a>@endcan
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
@if(auth()->user()->role=='admin' || auth()->user()->canAny(['team-player-activate,team-player-deactivate']))
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

    {{-- <script>
        $(document).ready(function () {
            var table = $('#basic-datatable_new').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": false,
                "ajax": {
                    "url": "{{ route('datatable.users') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": { _token: "{{csrf_token()}}"}
                },
                "columns": [
                    { "data": "id" },
                    { "data": "Name" },
                    { "data": "Email" },
                    { "data": "Team Player Type" },
                    { "data": "Status" },
                    { "data": "Action" }
                ]
            });


        });
    </script> --}}
    @endif
@endpush
