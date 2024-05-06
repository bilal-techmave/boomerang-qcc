@extends('layouts.main')
@section('app-title', 'Add Expense Type - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Expense Type</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Financial Settings</li>
                            <li class="breadcrumb-item active">Add Expense Type</li>
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
                            <form action="{{ route('financial.expensetype.store') }}" id="myForm" method="POST">@csrf
                                <div class="top_dt_sec new_prospect">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="">
                                                <label class="form-label" for="exampleInputEmail1">Name <span class="red">*</span></label>
                                                <input type="text" class="form-control" required minlength="4" oninput="checkUniqueData(this,'expense_type_name')" value="{{old('expense_type_name')}}" name="expense_type_name" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp"  placeholder="Expense Type">
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
                                                <a href="{{route('financial.expensetype.index')}}" class="theme_btn btn-primary btn"><i
                                                        class="uil-list-ul"></i> List</a>
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
    @include('common.footer_validation', ['validate_url_path' => 'financial.expensetype.unique'])
@endpush