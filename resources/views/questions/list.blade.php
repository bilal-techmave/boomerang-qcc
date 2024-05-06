@extends('layouts.main')
@section('app-title','Shift Questions - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Shift Questions</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Shift Questions Management</li>
                        <li class="breadcrumb-item active">Shift Questions</li>
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
                       <h5>All Shift Questions</h5>
                       @can('shift-question-add') <a href="{{route('question.question.create')}}" class="btn btn-primary">+ Add Questions</a>@endcan
                    </div>
                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Sites</th>
                                <th>Question</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($shiftQuestion)
                                @foreach ($shiftQuestion as $ques)
                                    <tr>
                                        <td>{{ $loop->iteration  }}</td>
                                        @if ($ques->client_site_id > 0)
                                            <td>{{ $ques->site->reference}}</td>
                                        @else
                                        <td>All Sites</td>
                                        @endif

                                        <td >{{ $ques->question }}</td>
                                        <td>
                                            @if(auth()->user()->role=='admin' || auth()->user()->canAny(['company-activate,company-deactivate']))
                                            <div class="status_dp">
                                                <select class="status_" onchange="statusChange(this,'{{$ques->id}}','shift_questions')">
                                                    <option value="1" {{$ques->status == '1' ? 'selected' : ''}} >Active</option>
                                                    <option value="2" {{$ques->status == '2' ? 'selected' : ''}}>Deactive</option>
                                                </select>
                                            </div>
                                            @else
                                                {{ $ques->status == 1 ? 'Active' : 'Deactive' }}
                                            @endif
                                        </td>
                                        <td>
                                            @can('shift-question-edit') <a href="{{route('question.question.edit',['id'=>$ques->id])}}"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                            </span></a> @endcan
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
@if(auth()->user()->role=='admin' || auth()->user()->canAny(['company-activate,company-deactivate']))
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
