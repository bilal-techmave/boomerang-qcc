@extends('layouts.main')
@section('app-title', 'Add Department - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Departments</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Administration</li>
                            <li class="breadcrumb-item active">Add Departments</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card show_portfolio_tab">
                    <div class="card-header">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">

                        <div class="tab-content  text-muted">
                            <div class="tab-pane show active" id="home">

                                <div class="main_bx_dt__">
                                    <form method="POST" id="myForm"
                                        action="{{ route('administration.department.store') }}"> @csrf
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Name <span
                                                                class="red">*</span></label>
                                                        <input required type="text" class="form-control"
                                                            oninput="checkUniqueData(this,'name')" name="name"
                                                            value="{{ old('name') }}" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Email <span
                                                                class="red">*</span></label>
                                                        <input type="email" required class="form-control" name="email"
                                                            id="exampleInputEmail1" value="{{ old('email') }}"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Internal Code
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            oninput="checkUniqueData(this,'internal_code')"
                                                            name="internal_code" value="{{ old('internal_code') }}"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('internal_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Supervisor </label>
                                                        <select data-plugin="customselect" name="supervisor"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($supervisors)
                                                                @foreach ($supervisors as $supervisor)
                                                                    <option
                                                                        {{ old('supervisor') == $supervisor->id ? 'selected' : '' }}
                                                                        value="{{ $supervisor->id }}">
                                                                        {{ $supervisor->name }} ({{ $supervisor->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('supervisor')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Manager</label>
                                                        <select data-plugin="customselect" name="manager"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($managers)
                                                                @foreach ($managers as $manager)
                                                                    <option
                                                                        {{ old('manager') == $manager->id ? 'selected' : '' }}
                                                                        value="{{ $manager->id }}">{{ $manager->name }}
                                                                        ({{ $manager->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('manager')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label for="">Work Order Configuration</label>
                                                            <div class="mb-3 mt-2">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="is_work_order"
                                                                        {{ old('is_work_order') == '1' ? 'checked' : '' }}
                                                                        value="1" name="is_work_order" type="checkbox">
                                                                    <label class="form-label" for="is_work_order">
                                                                        Can be used in Work Order?
                                                                    </label>
                                                                    @error('is_work_order')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <label for="">Email Configuration</label>
                                                            <div class="mb-3 mt-2">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="is_email_send"
                                                                        {{ old('is_email_send') == '1' ? 'checked' : '' }}
                                                                        value="1" name="is_email_send"
                                                                        type="checkbox">
                                                                    <label class="form-label" for="is_email_send">
                                                                        Send email to this department
                                                                    </label>
                                                                    @error('is_email_send')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                        </div>

                                        <div class="bottom_footer_dt">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="action_btns">
                                                        <button type="button" onclick="validateForm(this,'myForm')"
                                                            class="theme_btn btn save_btn"><i class="bi bi-save"></i>
                                                            Save</button>
                                                        <a href="{{ route('administration.department.index') }}"
                                                            class="theme_btn btn-primary btn"><i class="uil-list-ul"></i>
                                                            List</a>
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

        </div>
        <!-- end row -->

    </div>
    <!-- container -->


@endsection
@push('push_script')
    @include('common.footer_validation', ['validate_url_path' => 'administration.department.unique'])
@endpush
