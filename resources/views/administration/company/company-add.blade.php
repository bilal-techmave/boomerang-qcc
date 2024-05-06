@extends('layouts.main')
@section('app-title', 'Company Add - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Company</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Administration</li>
                            <li class="breadcrumb-item active">Add Company</li>
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
                                        action="{{ route('administration.company.store') }}">
                                        @csrf
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Business Name
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            oninput="checkUniqueData(this,'business_name')"
                                                            value="{{ old('business_name') }}" minlength="3" name="business_name"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('business_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">ABN <span
                                                                class="red">*</span></label>
                                                        <input type="text" required class="form-control" name="abn"
                                                            oninput="checkUniqueData(this,'abn')" minlength="3" id="exampleInputEmail1"
                                                            value="{{ old('abn') }}" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('abn')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Unit <span
                                                                class="red">*</span></label>
                                                        <input type="text" required class="form-control" name="unit"
                                                            id="exampleInputEmail1" value="{{ old('unit') }}"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('unit')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Address Number
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="address_number" id="exampleInputEmail1"
                                                            value="{{ old('address_number') }}" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('address_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Street Address
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="street_address" id="exampleInputEmail1"
                                                            value="{{ old('street_address') }}" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('street_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Suburb <span
                                                                class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="suburb" id="exampleInputEmail1"
                                                            value="{{ old('suburb') }}" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('suburb')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">City <span
                                                                class="red">*</span></label>
                                                        <select required data-plugin="customselect" name="city"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @foreach ($cities as $city)
                                                                <option value="{{ $city->id }}"
                                                                    {{ old('city') == $city->id ? 'selected' : '' }}>
                                                                    {{ $city->city_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('city')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">State <span
                                                                class="red">*</span></label>
                                                        <select required data-plugin="customselect" name="state"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->id }}"
                                                                    {{ old('state') == $state->id ? 'selected' : '' }}>
                                                                    {{ $state->state_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('state')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1"> Zip Code <span
                                                                class="red">*</span></label>
                                                        <input required type="text" maxlength="9" minlength="3"
                                                            class="form-control" name="zipcode" id="exampleInputEmail1"
                                                            value="{{ old('zipcode') }}" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('zipcode')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
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
                                                        <a href="{{ route('administration.company.index') }}"
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
    @include('common.footer_validation', ['validate_url_path' => 'administration.company.unique'])
@endpush
