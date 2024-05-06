@extends('layouts.main')
@section('app-title', 'Expense Type - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Expense Type</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Financial Settings</li>
                            <li class="breadcrumb-item active">Expense Type</li>
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
                            <h5>All Expense Type</h5>
                            @can('expenses-create') <a href="{{ route('financial.expensetype.create') }}" class="btn btn-primary">+ Add Expense
                                Type</a> @endcan
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                            <thead>
                                <tr>
                                    <td>S.No</td>
                                    <th>Name</th>
                                    <th style="width:20%">Status</th>
                                    <th style="width:20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expensetype as $expense_type)
                                    <tr role="row" class="odd">
                                        <td>{{ $loop->iteration  }}</td>
                                        <td >{{$expense_type->expense_type_name}}</td>

                                        <td style="width:20%">
                                            @if(auth()->user()->role=='admin' || auth()->user()->canAny(['expense-type-activate,expense-type-deactivate']))
                                            <div class="status_dp">
                                                <select class="status_" onchange="statusChange(this,'{{$expense_type->id}}','expense_types')">
                                                    @can('expense-type-activate') <option value="1" {{ $expense_type->status == 1 ? 'selected' : '' }}>Active</option> @endcan
                                                    @can('expense-type-deactivate') <option value="0" {{ $expense_type->status == 0 ? 'selected' : '' }}>Deactive</option> @endcan
                                                </select>
                                            </div>
                                            @else
                                            {{ $expense_type->status == 1 ? 'Active' : 'Deactive' }}
                                            @endif
                                        </td>

                                        <td style="width:20%">
                                            @can('expenses-edit')
                                                <a href="{{route('financial.expensetype.edit',['expensetype'=>$expense_type->id])}}">
                                                    <span class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                        <i class="uil-edit"></i>
                                                    </span>
                                                </a>
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
@if(auth()->user()->role=='admin' || auth()->user()->canAny(['expense-type-activate,expense-type-deactivate']))
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
