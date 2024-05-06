@extends('layouts.main')
@section('app-title','Waiting Approval - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Waiting Approval</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Human Resources</li>
                        <li class="breadcrumb-item Approved">Waiting Approval</li>
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
                        <h5>All Cleaners</h5>
                        <!-- <a href="teamplayer-add#" class="btn btn-primary">+ Add New Team player</a> -->
                    </div>

                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Email</th>
                                {{-- <th>Team Player Type</th> --}}
                                <th>Join Date</th>
                                <th>Approval Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cleaners)
                                @foreach ($cleaners as $cleaner)
                                    <tr role="row" class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{$cleaner->name}} {{$cleaner->surname}}</td>
                                        <td>{{$cleaner->email}}</td>
                                        {{-- <td>Cleaner</td> --}}
                                        <td>{{date('Y-m-d h:i:s',strtotime($cleaner->created_at))}}</td>
                                        <td>
                                            <div class="status_dp">
                                                <select class="status_" onchange="statusChange(this,'{{$cleaner->id}}','users')">
                                                    <option selected value="0">Choose Status</option>
                                                    <option value="1">Approved</option>
                                                    <option value="2">Disapproved</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('hr.approval_view',['id'=>$cleaner->id])}}"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i></span></a>
                                            <a href="{{route('hr.team-player.edit',['team_player'=>$cleaner])}}"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i></span></a>
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
    <script>
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });


        function statusChange(that,id,tdata){
            let status = $(that).val();
            if(status != 0){
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
                            if(status == 1){
                                $("#modal-alert-dataLabel_ajax").text('Cleaner Approved Changed!');
                                $("#modal-alert-dataLabelMsg_ajax").text('Cleaner Approved Successfully!');
                                $("#modal-alert-dataLabelMsg_ajax").removeClass('text-danger');
                                $("#modal-alert-dataLabelMsg_ajax").addClass('text-success');
                            }else{
                                $("#modal-alert-dataLabel_ajax").text('Cleaner Disapproved Changed!');
                                $("#modal-alert-dataLabelMsg_ajax").text('Cleaner Disapproved Successfully!');
                                $("#modal-alert-dataLabelMsg_ajax").removeClass('text-danger');
                                $("#modal-alert-dataLabelMsg_ajax").addClass('text-success');
                            }

                        }else{
                            $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                            $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                            $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                            $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                        }
                    }
                });
            }
        }
    </script>
@endpush
