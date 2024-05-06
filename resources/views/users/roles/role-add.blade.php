@extends('layouts.main')
@section('app-title', 'Add Role - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Role</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">User Permission</li>
                            <li class="breadcrumb-item active">Add Role</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <form action="{{ route('user.roles.store') }}" method="POST" id="myForm">
                @csrf
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="check_box">
                                        <label class="form-label" for="exampleInputEmail1">Role Name <span
                                                class="red">*</span></label>
                                        <input required type="text" class="form-control" name="name"
                                            id="exampleInputEmail1" oninput="checkUniqueData(this,'name')" aria-describedby="emailHelp" placeholder=""
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="check_box">
                                        <label class="form-label" for="exampleInputEmail1">Internal Code <span
                                                class="red">*</span></label>
                                        <input required type="text" name="internal_code"
                                            value="{{ old('internal_code') }}" oninput="checkUniqueData(this,'internal_code')" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('internal_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-lg-12 mt-2">
                                    <div class="check_box">
                                        <label class="form-label">Description <span class="red">*</span></label>
                                        <textarea required name="description" class="form-control">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-div-permission">
                    @foreach ($permission_arr as $key => $permission)
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="top_section_title">
                                        <h5>{{ ucfirst($key) }}</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-hover mb-0" id="RoleTbl">
                                        <thead>
                                            <tr>

                                                <th> Menu Title</th>
                                                @foreach ($permission['fields'] as $field)
                                                    <th>{{ ucfirst($field) }}</th>
                                                @endforeach

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $prename = '';
                                            @endphp
                                            @foreach ($permission['mainname'] as $name)
                                                <tr>
                                                    <td class="text-">{{ $name }}</td>
                                                    @foreach ($permission['name'][$name] as $dd)
                                                        <td>
                                                            @if (isset($dd['type']) && in_array($dd['type'], $permission['fields']))
                                                                <div class="check_box">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input id="checkbox6a{{ $dd['id'] }}"
                                                                            @if (old('permission') && in_array($dd['id'], old('permission'))) checked @endif
                                                                            name="permission[]" value="{{ $dd['id'] }}"
                                                                            type="checkbox">
                                                                        <label class="form-label"
                                                                            for="checkbox6a{{ $dd['id'] }}"></label>
                                                                    </div>

                                                                </div>
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-12">
                    <div class="bottom_footer_dt bg-white">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="action_btns text-end">
                                    <button type="button" onclick="validateForm(this,'myForm')"
                                        class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                                    <a href="{{ route('user.roles.index') }}" class="theme_btn btn-primary btn"><i
                                            class="uil-list-ul"></i> List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('push_script')
    @include('common.footer_validation', ['validate_url_path' => 'user.role.unique'])
@endpush
