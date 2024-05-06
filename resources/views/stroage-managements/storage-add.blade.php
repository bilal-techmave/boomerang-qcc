@extends('layouts.main')
@section('app-title', 'Create Storage - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Storage</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Storage Management</li>
                            <li class="breadcrumb-item active">Add Storage</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">


                    <form action="{{ route('storage.storage.store') }}" method="post" id="myForm"> @csrf
                        <div class="card-body">
                            <div class="row">


                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1"> Name Storage <span class="red">*</span></label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Supervisor <span class="red">*  <small hidden class="required_error">#Required</small></span></label>
                                        <select required data-plugin="customselect" name="supervisor" class="form-select">
                                            @forelse ($supervisors as $allsupervisors)
                                                <option value="{{ $allsupervisors->id }}">{{ $allsupervisors->name }}
                                                </option>
                                            @empty
                                            @endforelse

                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Unit <span class="red">*</span></label>
                                        <input type="text" class="form-control" name="unit" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Address Number <span class="red">*</span></label>
                                        <input type="text" class="form-control" name="address_number"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Street Address <span class="red">*</span></label>
                                        <input type="text" class="form-control" name="street_address" id=""
                                            aria-describedby="emailHelp" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Suburb <span class="red">*</span></label>
                                        <input type="text" class="form-control" id=""
                                            aria-describedby="emailHelp" name="suburb" placeholder="" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">City <span class="red">* <small hidden class="required_error">#Required</small></span> </label>
                                        <select data-plugin="customselect" name="geo_city_id" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @isset($cities)
                                                @foreach ($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->city_name}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">State <span class="red">*  <small hidden class="required_error">#Required</small></span> </label>
                                        <select data-plugin="customselect" name="geo_state_id" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @isset($states)
                                                @foreach ($states as $state)
                                                <option value="{{$state->id}}">{{$state->state_name}}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">ZipCode <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control" name="zipcode" required id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="">Address Configuration</label>
                                    <div class="row mt-3">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox6a" value="1" name="is_fixed_storage"
                                                        type="checkbox">
                                                    <label class="form-label" for="checkbox6a">
                                                        Is it a fixed storage?
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="red">*</span></label>
                                        <textarea name="description" required class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="action_btns">
                                        <button type="button" onclick="validateForm(this,'myForm')" class="theme_btn btn save_btn"><i class="bi bi-save"></i>
                                            Save</button>
                                        <a href="{{ route('storage.storage.index') }}"
                                            class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>

            </div>


        </div>
    </div>
@endsection
@push('push_script')
@include('common.footer_validation', ['validate_url_path' => 'induction.unique-check'])
    
@endpush