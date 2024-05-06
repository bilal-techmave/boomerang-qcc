@extends('layouts.main')
@section('app-title', 'Edit Expense Type - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Expense Type</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Financial Settings</li>
                            <li class="breadcrumb-item active">Edit Expense Type</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body p-0">
                        <div class="main_bx_dt__">
                            <form action="{{route('financial.expensetype.update',['expensetype' => $expensetype->id])}}" method="post" id="myForm">
                                @csrf
                                @method('PUT')
                                <div class="top_dt_sec new_prospect">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="">
                                                <label class="form-label" for="exampleInputEmail1">Name<span
                                                        class="red">*</span></label>
                                                <input type="text" required minlength="4" oninput="checkUniqueData(this,'expense_type_name','{{$expensetype->expense_type_name}}')" class="form-control" value="{{old('expense_type_name')?? $expensetype->expense_type_name}}" name="expense_type_name" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="Expense Type">
                                                    @error('expense_type_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                     @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <button type="button" onclick="validateForm(this,'myForm')" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                                                <a href="{{route('financial.expensetype.index')}}" class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                                @if($expensetype->status == '1')
                                                    @can('expense-type-activate')<button type="button" onclick="statusChange('0','{{$expensetype->id}}','expense_types')" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</button>@endcan
                                                @else
                                                    @can('expense-type-deactivate')<button type="button" onclick="statusChange('1','{{$expensetype->id}}','expense_types')" class="theme_btn btn btn-success"><i class="uil-shield-check"></i> Activate</button>@endcan
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- main_bx_dt -->
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
            let status = that;
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
                        location.reload();
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
@include('common.footer_validation', ['validate_url_path' => 'financial.expensetype.unique'])
@endpush
