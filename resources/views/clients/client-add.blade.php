@extends('layouts.main')
@section('app-title', 'Add Client - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Client</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Add Client</li>
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
                                <a href="#basic_info" id="basic_infoTab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if (!$errors->has('tab_name')) active @elseif($errors->first('tab_name') == 'basic_info') active @endif">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" id="profileTab" data-bs-toggle="tab" aria-expanded="true"
                                    class="nav-link @if ($errors->first('tab_name') == 'address') active @endif">
                                    <span><i class="bi bi-journals"></i></span>
                                    <span>Address</span>
                                </a>
                            </li>

                            @can('portfolio-view')
                                <li class="nav-item">
                                    <a href="#messages" id="ticketsTab" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'portfolio') active @endif">
                                        <span><i class="uil-building"></i></span>
                                        <span>Portfolio</span>
                                    </a>
                                </li>
                            @endcan

                            @can('client-comment-add')
                                <li class="nav-item">
                                    <a href="#comments" id="commentsTab" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'comments') active @endif">
                                        <span><i class="uil-comment-alt"></i></span>
                                        <span>Comments</span>
                                    </a>
                                </li>
                            @endcan

                            <li class="nav-item">
                                <a href="#tickets" id="messagesTab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'social_media') active @endif">
                                    <span><i class="bi bi-hash"></i></span>
                                    <span>Social Media</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @php
                        $newalluser = $alluser->keyBy('id');
                    @endphp
                    <div class="card-body">
                        <form id="myForm" action="{{ route('client.client.store') }}" method="post">
                            @csrf
                            <div class="tab-content text-muted">
                                <div class="tab-pane @if (!$errors->has('tab_name')) show active @elseif($errors->first('tab_name') == 'basic_info') show active @endif"
                                    id="basic_info">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Business Name
                                                            <span class="red">* </span></label>
                                                        <input type="text" required class="form-control"
                                                            name="business_name"
                                                            oninput="checkUniqueData(this,'business_name')"
                                                            id="exampleInputEmail1" value="{{ old('business_name') }}"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('business_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Trading Name
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="trading_name" value="{{ old('trading_name') }}"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('trading_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">ABN</label>
                                                        <input type="text" class="form-control" name="abn"
                                                            value="{{ old('abn') }}"
                                                            oninput="checkUniqueData(this,'abn')" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">ACN</label>
                                                        <input type="text" class="form-control" name="acn"
                                                            value="{{ old('acn') }}" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Phone Number
                                                            <span class="red">*</span></label>
                                                        <input type="text" class="form-control phoneValid" required
                                                            value="{{ old('phone_number') }}" name="phone_number"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('phone_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Second
                                                            Number</label>
                                                        <input type="text" class="form-control phoneValid"
                                                            id="exampleInputEmail1" value="{{ old('second_number') }}"
                                                            name="second_number" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Mobile
                                                            Number</label>
                                                        <input type="text" class="form-control phoneValid"
                                                            id="exampleInputEmail1" name="mobile_number"
                                                            value="{{ old('mobile_number') }}"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Fax
                                                            Number</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" name="fax_number"
                                                            value="{{ old('fax_number') }}" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Type of the client <span
                                                                class="red">* <small hidden
                                                                    class="required_error">#Required</small></span></label>
                                                        <select required data-plugin="customselect" name="client_type"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            <option value="commercial"
                                                                {{ old('client_type') == 'commercial' ? 'selected' : '' }}>
                                                                Commercial</option>
                                                            <option value="residential"
                                                                {{ old('client_type') == 'residential' ? 'selected' : '' }}>
                                                                Residential</option>
                                                        </select>
                                                        @error('client_type')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Website</label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" value="{{ old('website') }}"
                                                            name="website" aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Company <span class="red">* <small
                                                                    hidden
                                                                    class="required_error">#Required</small></span></label>
                                                        <select required data-plugin="customselect" name="comapny_id"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @foreach ($companies as $company)
                                                                <option value="{{ $company->id }}"
                                                                    {{ old('comapny_id') == $company->id ? 'selected' : '' }}>
                                                                    {{ $company->business_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @error('comapny_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Select Client
                                                            <span class="red">* </span></label>
                                                        <select required data-plugin="customselect" name="client_id"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($alluser)
                                                                @foreach ($alluser as $user)
                                                                    <option value="{{ $user->id }}">
                                                                        {{ $user->name }} {{ $user->surname }}
                                                                        ({{ $user->email }})</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="row">


                                                        @can('cleaner-create-prospect')
                                                            <div class="col-lg-3">
                                                                <div class="mb-3">
                                                                    <div class="checkbox checkbox-success">
                                                                        <input id="checkbox6a" name="is_prospect_client"
                                                                            {{ old('is_prospect_client') == '1' ? 'checked' : '' }}
                                                                            type="checkbox" value="1">
                                                                        <label class="form-label" for="checkbox6a">
                                                                            Check if it is a Prospect Client
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endcan
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="checkbox6b" name="is_direct_client"
                                                                        {{ old('is_direct_client') == '1' ? 'checked' : '' }}
                                                                        type="checkbox" value="1">
                                                                    <label class="form-label" for="checkbox6b">
                                                                        Check if it is a Direct Client
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Notes</label>
                                                        <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="title_head">
                                                        <h4>Contact Information</h4>
                                                    </div>
                                                    <div class="row" id="contactDivValidation">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3 mt-3 mt-sm-0">
                                                                <label class="form-label">Contact Type</label>
                                                                <select data-plugin="customselect"
                                                                    class="form-select required_fields" id="contact_type">
                                                                    <option value="0">Please select one or start
                                                                        typing </option>
                                                                    <option value="manager">Manager</option>
                                                                    <option value="accounts">Accounts</option>
                                                                    <option value="supervisor">Supervisor</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3 mt-3 mt-sm-0">
                                                                <label class="form-label">Contact</label>
                                                                <select data-plugin="customselect"
                                                                    class="form-select contact required_fields"
                                                                    id="user_value">
                                                                    <option value="0">Please select one or start
                                                                        typing </option>
                                                                    @if ($alluser)
                                                                        @foreach ($alluser as $user)
                                                                            <option value="{{ $user->id }}">
                                                                                {{ $user->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="add_address text-end">
                                                                <a href="javascript:void(0)"
                                                                    class="theme_btn btn add_btn " id="add_contact_btn">+
                                                                    Add Contact</a>
                                                                <a href="javascript:void(0)"
                                                                    class="theme_btn btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#create_contact_modal">+ Create
                                                                    contact</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12  mt-3">
                                                            <table class="table table-bordered  dt-responsive nowrap w-100"
                                                                id="table_data">
                                                                <thead>
                                                                    <tr>
                                                                        {{-- <th style="width:46px">#</th> --}}
                                                                        <th>Name</th>
                                                                        <th>Phone Number</th>
                                                                        <th>Email</th>
                                                                        <th>Contact Type</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="user_data">

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane @if ($errors->first('tab_name') == 'address') show active @endif"
                                    id="profile">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row" id="addressDivValidation">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressUnit">Unit </label>
                                                        <input type="text" class="form-control" id="addressUnit"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressNumber">Address Number <span
                                                                class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="addressNumber" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="addressNumberError" class="text-danger" hidden>This
                                                            field is required.</span>
                                                        @error('address_number')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="streetAddress">Street Address<span
                                                                class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="streetAddress" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="streetAddressError" class="text-danger" hidden>This
                                                            field is required.</span>
                                                        @error('street_address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressSuburb">Suburb <span
                                                                class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="addressSuburb" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="addressSuburbError" class="text-danger" hidden>This
                                                            field is required.</span>
                                                        @error('suburb')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">City </label>
                                                        <select data-plugin="customselect" id="addressCity"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($cities)
                                                                @foreach ($cities as $city)
                                                                    <option value="{{ $city->id }}">
                                                                        {{ $city->city_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">State </label>
                                                        <select data-plugin="customselect" id="addressState"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($states)
                                                                @foreach ($states as $state)
                                                                    <option value="{{ $state->id }}">
                                                                        {{ $state->state_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressZipCode">ZipCode <span
                                                                class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            maxlength="8" minlength="3" id="addressZipCode"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        <span id="addressZipCodeError" class="text-danger" hidden>This
                                                            field is required.</span>
                                                        @error('zipcode')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label for="">Type of the Address:</label>
                                                    <div class="row mt-3">
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="mainAddress" type="checkbox">
                                                                    <label class="form-label" for="mainAddress">
                                                                        Is this your main address?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="mailAddress" type="checkbox">
                                                                    <label class="form-label" for="mailAddress">
                                                                        Is this your mail address?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    {{-- <div class="mb-3">
                                                        <label class="form-label" for="importedAddress">Imported Address <span class="red">*</span></label>
                                                        <input type="text"  class="form-control" id="importedAddress"  aria-describedby="emailHelp" placeholder="">
                                                        <span id="importedAddressError" class="text-danger" hidden>This field is required.</span>
                                                        @error('importedAddress')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div> --}}
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="add_address text-end">
                                                        <button type="button" onclick="addNewAddress()"
                                                            class="theme_btn btn add_btn " id="add_address_btn">+ Add
                                                            Address</button>
                                                        <button type="button" onclick="resetAddress()"
                                                            class="theme_btn btn btn-primary"><i
                                                                class="bi-arrow-repeat"></i> Reset</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 add_address_box">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Address</th>
                                                                <th>Main Address</th>
                                                                <th>Mail Address</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="add_address_box" id="add_address_trfields">
                                                            @if (old('street_address') && !empty('street_address'))
                                                                @php
                                                                    $newCities = array_column(
                                                                        $cities->toArray(),
                                                                        'city_name',
                                                                        'id',
                                                                    );
                                                                    $newStates = array_column(
                                                                        $states->toArray(),
                                                                        'state_name',
                                                                        'id',
                                                                    );
                                                                @endphp
                                                                @foreach (old('street_address') as $kk => $addr)
                                                                    <tr
                                                                        id="address{{ $kk }}{{ time() }}">
                                                                        <td>
                                                                            <input name="unit[]" hidden
                                                                                value="{{ old('unit')[$kk] }}">
                                                                            <input name="address_number[]" hidden
                                                                                value="{{ old('address_number')[$kk] }}">
                                                                            <input name="street_address[]" hidden
                                                                                value="{{ $addr }}">
                                                                            <input name="suburb[]" hidden
                                                                                value="{{ old('suburb')[$kk] }}">
                                                                            <input name="city[]" hidden
                                                                                value="{{ old('city')[$kk] }}">
                                                                            <input name="state[]" hidden
                                                                                value="{{ old('state')[$kk] }}">
                                                                            <input name="zipcode[]" hidden
                                                                                value="{{ old('zipcode')[$kk] }}">
                                                                            <input name="po_box[]" hidden
                                                                                value="{{ old('po_box')[$kk] }}">
                                                                            <input name="is_main_address[]" hidden
                                                                                value="{{ old('is_main_address')[$kk] }}">
                                                                            <input name="is_mail_address[]" hidden
                                                                                value="{{ old('is_mail_address')[$kk] }}">
                                                                            <input name="imported_address[]" hidden
                                                                                value="{{ old('imported_address')[$kk] }}">
                                                                            {{ old('unit')[$kk] ?? '' }}
                                                                            {{ old('address_number')[$kk] ?? '' }}
                                                                            {{ $addr ?? '' }},
                                                                            {{ old('suburb')[$kk] ?? '' }}
                                                                            {{ $newCities[old('city')[$kk]] ?? '' }}
                                                                            {{ $newStates[old('state')[$kk]] ?? '' }}
                                                                            {{ old('zipcode')[$kk] ?? '' }}
                                                                        </td>
                                                                        <td> <button style="border: none;background: none;"
                                                                                type="button"
                                                                                onclick="deleteTabletr('address{{ $kk }}{{ time() }}')"><span
                                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom"><i
                                                                                        class="uil-trash"></i></span></button>
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
                                    <!-- main_bx_dt -->
                                </div>
                                <div class="tab-pane  @if ($errors->first('tab_name') == 'social_media') show active @endif"
                                    id="tickets">
                                    <div class="sites_main">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="facebookInput">Facebook</label>
                                                    <input type="text" class="form-control" name="facebook"
                                                        id="facebookInput" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="twitterInput">Twitter</label>
                                                    <input type="text" class="form-control" name="twitter"
                                                        id="twitterInput" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="instagramInput">Instagram</label>
                                                    <input type="text" class="form-control" id="instagramInput"
                                                        name="instagram" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="linkedinInput">Linkedin</label>
                                                    <input type="text" class="form-control" id="linkedinInput"
                                                        name="linkedin" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @can('portfolio-view')
                                    @php
                                        $newclient_portfolios = $client_portfolios->keyBy('id');
                                    @endphp
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'portfolio') show active @endif"
                                        id="messages">
                                        <div class="sites_main">
                                            <div class="row" id="portfolioDivValidation">
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Add Portfolio</label>
                                                        <select data-plugin="customselect" id="addportfolioSelect"
                                                            class="form-select required_fields">
                                                            <option value="0">Please select one or start typing</option>
                                                            @if ($client_portfolios)
                                                                @foreach ($client_portfolios as $kk => $cportfolios)
                                                                    <option value="{{ $cportfolios->id }}">
                                                                        {{ $cportfolios->full_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 align-self-center">
                                                    <button type="button" class="theme_btn btn add_btn "
                                                        onclick="addportfolio()">+ Add Portfolio</button>
                                                </div>
                                                <div class="col-lg-12  mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Portfolio Full name</th>
                                                                <th>Portfolio Short name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_portfolio_table">
                                                            @if (old('portfolio') && !empty('portfolio'))
                                                                @foreach (old('portfolio') as $kk => $portfolio)
                                                                    <tr id="portfolio{{ $kk }}{{ time() }}">
                                                                        <td><input hidden name="portfolio[]"
                                                                                value="{{ $portfolio }}">{{ $newclient_portfolios[$portfolio]['full_name'] }}
                                                                        </td>
                                                                        <td>{{ $newclient_portfolios[$portfolio]['short_name'] }}
                                                                        </td>
                                                                        <td> <a href="#"
                                                                                onclick="deleteTabletr('portfolio{{ $kk }}{{ time() }}')">
                                                                                <span
                                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                    <i class="uil-trash"></i>
                                                                                </span>
                                                                            </a></td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan

                                @can('client-comment-add')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'comment') show active @endif"
                                        id="comments">
                                        <div class="sites_main">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="#" class="theme_btn btn add_btn" data-bs-toggle="modal"
                                                        data-bs-target="#client_comment_modal">+ Add new comment</a>
                                                </div>
                                                <div class="col-lg-12  mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Date Comment</th>
                                                                <th>Person</th>
                                                                <th>Comment Type</th>
                                                                <th>Comment</th>
                                                                <th>Files</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_client_commenttr">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    class="theme_btn btn save_btn"><i class="bi bi-save"></i>
                                                    Save</button>
                                                <a href="{{ route('client.client.index') }}"
                                                    class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
    <!-- comment add popup -->
    @can('client-comment-add')
        <div class="modal fade" id="client_comment_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="saveComment" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="data_id" value="0" id="comment_data_id">
                        <input type="hidden" name="type" value="client">
                        <div class="modal-body">
                            <div class="row" id="newCommentDivValidation">
                                <div class="col-lg-12">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Comment Type</label>
                                        <select class="form-select js-example-basic-single2 required_fields" id="comment_type"
                                            name="comment_type">
                                            <option value="0">Please select one or start typing </option>
                                            <option value="meeting">Meeting</option>
                                            <option value="site_closed">Site Closed</option>
                                            <option value="price_negotiation">Price Negotiation</option>
                                            <option value="general_communication">General Communication</option>
                                            <option value="contracts">Contracts</option>
                                            <option value="email">Email</option>
                                            <option value="phone_call">Phone Call</option>
                                            <option value="scope_change">Change of Scope</option>
                                            <option value="compliment">Compliment</option>
                                            <option value="clients_courtesy_call">Clients Courtesy Call</option>
                                            <option value="inspection">Inspection</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Comment <span class="red">*</span></label>
                                        <textarea class="form-control required_fields" id="comment_textarea" name="comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Upload File</label>
                                        <input name="file" type="file" class="dropify" id="upload_comment_file"
                                            data-height="100" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="saveComment_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endcan
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="create_contact_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <form id="" method="POST"> </form> --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new Person as Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="createContantDivValidation">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personName">Name <span class="red">*</span></label>
                                <input type="text" class="form-control required_fields" id="personName"
                                    aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personNameError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personSurname">Surname <span
                                        class="red">*</span></label>
                                <input type="text" class="form-control required_fields" id="personSurname"
                                    aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personSurnameError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personEmail">Email <span class="red">*</span></label>
                                <input type="email" class="form-control required_fields" id="personEmail"
                                    aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personEmailError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personPhoneNumber">Phone Number <span
                                        class="red">*</span></label>
                                <input type="text" class="form-control required_fields phoneValid"
                                    id="personPhoneNumber" aria-describedby="emailHelp" placeholder="">
                                <span class="text-danger" hidden id="personPhoneNumberError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label" for="personContactType">Contact Type</label>
                                <select class="form-select js-example-basic-single required_fields"
                                    id="personContactType">
                                    <option value="Manager">Manager</option>
                                    <option value="Accounts">Accounts</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Site Manager">Site Manager</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="create_contant" class="btn btn-primary">Save</button>
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
        var newalluser = @json($newalluser);
    </script>
    @can('client-comment-add')
        <script>
            const file_path = '{{ env('STORE_FILE_URL') }}';

            $("#saveComment_btn").click(function(e) {
                if (validateFormByDiv("newCommentDivValidation")) {
                    $("#saveComment_btn").attr('disabled', true);
                    e.preventDefault();
                    var formData = new FormData($("#saveComment")[0]);
                    $.ajax({
                        url: "{{ route('client.addComment') }}",
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        contentType: false, // Set to false when using FormData
                        processData: false, // Set to false when using FormData
                        success: function(data) {
                            $("#saveComment_btn").attr('disabled', false);
                            let commentData = data.data;
                            if (data) {
                                let tabletrComment = `<tr>
                                                <td>${commentData.created_date}</td>
                                                <td>${data.user}</td>
                                                <td>${commentData.comment_type}</td>
                                                <td>${commentData.comment} </td>
                                                <td>`;
                                if (commentData.file) {
                                    tabletrComment +=
                                        `<a href="${file_path+commentData.file}" target="_blank">View File</a>`;
                                } else {
                                    tabletrComment += `-`;
                                }
                                tabletrComment += `</td>
                                                <td>
                                                    <a href="javascript:void(0)" onclick="deleteRecord(this,${data.id},'{{ route('client.delete-comment') }}','Comment')">
                                                        <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                            <i class="uil-trash"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>`;
                                $("#add_client_commenttr").append(tabletrComment);
                                resetComment();
                            } else {
                                $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                                $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                                $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                                $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                            }
                            $('#client_comment_modal').modal('hide');
                        }
                    });
                }
            });

            function resetComment() {
                $("#comment_type").val('0').trigger('change');
                $("#comment_textarea").val('');
                $("#upload_comment_file").parent().find(".dropify-clear").trigger('click');
            }
        </script>
    @endcan

    <script>
        function resetContact() {
            $('#user_value').val('0').trigger('change');
            $('#contact_type').val('0').trigger('change');
        }
        $('#add_contact_btn').click(function() {
            if (validateFormByDiv('contactDivValidation')) {
                var user_id = $('#user_value').val();
                var user_type = $('#contact_type').val();

                $("#user_valueError").text('');
                $("#contact_typeError").text('');
                let isValid = true;
                if (!user_id || user_id == '0') {
                    $("#user_valueError").text('Contact is required.');
                    isValid = false;
                }
                if (!user_type || user_type == '0') {
                    $("#contact_typeError").text('Contact type is required.');
                    isValid = false;
                }
                if (isValid) {

                    let contact_type = user_type.charAt(0).toUpperCase() + user_type.slice(1).toLowerCase();
                    let microtime = Date.now();
                    var rowHtml = `<tr id="contact${microtime}">
                        <td>${newalluser[user_id]['name']||''}
                            <input type="hidden" name="user_id[]" value="${user_id}" />
                            <input type="hidden" name="contact_type[]" value="${user_type}" />
                        </td>
                        <td>${newalluser[user_id]['phone_number']||''}</td>
                        <td>${newalluser[user_id]['email']||''}</td>
                        <td>${contact_type}</td>
                        <td> <button onclick="deleteTabletr('contact${microtime}','none',1)" type="button" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
                    </tr>`;
                    $("#user_data").append(rowHtml);
                    resetContact();
                }
            }
        });

        function deleteRow(ele) {
            var table = $('#table_data')[0];
            var rowCount = table.rows.length;
            if (rowCount <= 1) {
                alert("There is no row available to delete!");
                return;
            }
            if (ele) {
                $(ele).parent().parent().remove();
            } else {
                table.deleteRow(rowCount - 1);
            }
        }

        function deleteTabletr(tabletr, filenumber = 'none', permission = false) {
            if (permission) {
                swal({
                        title: "Are you sure?",
                        text: "Do you want to Delete!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Yes, Delete it!",
                        cancelButtonText: "No, Cancel It",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $(`#${tabletr}`).remove();
                            if (filenumber != 'none') {
                                $(`#documentFilesDocsDiv${filenumber}`).remove();
                            }
                            swal({
                                type: 'success',
                                title: 'Deleted!',
                                text: 'Deleted',
                                timer: 3000
                            });
                        } else {
                            swal("Cancelled", "Data safe :)", "error");
                        }
                    });
            } else {
                $(`#${tabletr}`).remove();
                if (filenumber != 'none') {
                    $(`#documentFilesDocsDiv${filenumber}`).remove();
                }
                swal({
                    type: 'success',
                    title: 'Deleted!',
                    text: 'Deleted',
                    timer: 3000
                });
            }
        }

        function deleteRecord(that, ele, url, label) {
            swal({
                    title: "Are you sure?",
                    text: "Do you want to Delete!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, Delete it!",
                    cancelButtonText: "No, Cancel It",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            type: "POST",
                            url: url,
                            data: {
                                "id": ele,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result > 0) {
                                    swal({
                                        type: 'success',
                                        title: 'Deleted!',
                                        text: label + ' Deleted',
                                        timer: 3000
                                    });
                                    var table = $('#table_data')[0];
                                    var rowCount = table.rows.length;
                                    if (that) {
                                        //delete specific row
                                        $(that).parent().parent().remove();
                                    }
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Something went wrong',
                                        timer: 3000
                                    })
                                }
                            },
                            error: function(data) {
                                console.log("error");
                                console.log(result);
                            }
                        });
                    } else {
                        swal("Cancelled", label + " safe :)", "error");
                    }
                });
        }

        function addNewAddress() {
            if (validateFormByDiv('addressDivValidation')) {
                let addressUnit = $("#addressUnit").val();
                let addressNumber = $("#addressNumber").val();
                let streetAddress = $("#streetAddress").val();
                let addressSuburb = $("#addressSuburb").val();
                let addressCity = $("#addressCity").val();
                let addressCityText = addressCity != 0 ? $("#addressCity option:selected").text() : '';
                let addressState = $("#addressState").val();
                let addressStateText = addressState != 0 ? $("#addressState option:selected").text() : '';
                let addressZipCode = $("#addressZipCode").val();
                let mainAddress = 0;
                if ($('#mainAddress').is(":checked")) {
                    mainAddress = 1;
                }
                let mailAddress = 0;
                if ($('#mailAddress').is(":checked")) {
                    mailAddress = 1;
                }
                // let importedAddress = $("#importedAddress").val();
                let isValid = 1;
                $("#addressNumberError").attr('hidden', true);
                $("#streetAddressError").attr('hidden', true);
                $("#addressSuburbError").attr('hidden', true);
                $("#addressZipCodeError").attr('hidden', true);
                $("#importedAddressError").attr('hidden', true);
                if (addressNumber.trim() == '') {
                    $("#addressNumberError").attr('hidden', false);
                    isValid = 0;
                }
                if (streetAddress.trim() == '') {
                    $("#streetAddressError").attr('hidden', false);
                    isValid = 0;
                }
                if (addressSuburb.trim() == '') {
                    $("#addressSuburbError").attr('hidden', false);
                    isValid = 0;
                }
                if (addressZipCode.trim() == '') {
                    $("#addressZipCodeError").attr('hidden', false);
                    isValid = 0;
                }
                //  if(importedAddress.trim() == ''){
                //     $("#importedAddressError").attr('hidden',false);
                //     isValid =0;
                // }
                if (isValid) {
                    let microtime = Date.now();
                    let addressHtml = `<tr id="address${microtime}">
                    <td>
                        <input name="unit[]" hidden value="${addressUnit}">
                        <input name="address_number[]" hidden value="${addressNumber}">
                        <input name="street_address[]" hidden value="${streetAddress}">
                        <input name="suburb[]" hidden value="${addressSuburb}">
                        <input name="city[]" hidden value="${addressCity}">
                        <input name="state[]" hidden value="${addressState}">
                        <input name="zipcode[]" hidden value="${addressZipCode}">
                        <input name="is_main_address[]" hidden value="${mainAddress}">
                        <input name="is_mail_address[]" hidden value="${mailAddress}">
                        <input name="imported_address[]" hidden value="">
                        ${addressUnit} ${addressNumber} ${streetAddress}, ${addressSuburb} ${addressCityText} ${addressStateText} ${addressZipCode}</td>
                        <td>${mainAddress ? 'Yes' : 'No'}</td>
                        <td>${mailAddress ? 'Yes' : 'No'}</td>
                    <td> <button style="border: none;background: none;" type="button" onclick="deleteTabletr('address${microtime}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom"><i class="uil-trash"></i></span></button></td>
                </tr>`;
                    $("#add_address_trfields").append(addressHtml);
                    $('#add_address_trfields').show();
                    resetAddress();
                }
            }
        }

        function resetAddress() {
            $("#addressUnit").val('');
            $("#addressNumber").val('');
            $("#streetAddress").val('');
            $("#addressSuburb").val('');
            $("#addressCity").val('0').trigger('change');
            $("#addressState").val('0').trigger('change');
            $("#addressZipCode").val('');
            $('#mainAddress').prop('checked', false);
            $('#mailAddress').prop('checked', false);
        }
    </script>

    @can('portfolio-view')
        <script>
            var all_portfolio = @json($newclient_portfolios);

            function addportfolio() {
                if (validateFormByDiv('portfolioDivValidation')) {
                    let portfolio = $(`#addportfolioSelect`).val();
                    let portfolio_text = $(`#addportfolioSelect option:selected`).text();
                    let microtime = Date.now();


                    let exists = false;
                    $(`.portfolioTdInput input[type='hidden']`).each(function() {
                        if (this.value === portfolio) {
                            exists = true;
                        }
                    });
                    if (exists) {
                        $("#addportfolioSelect").next('.select2-container').find('.select2-selection').addClass(
                            'invalid-select');
                        $("#addportfolioSelect").next('span').after(
                            '<span class="custom_error text-danger">Already added in list.</span>');
                    } else {

                        let portfoliotr = `<tr id="portfolio${microtime}">
                    <td class="portfolioTdInput"><input type="hidden" name="portfolio[]" value="${all_portfolio[portfolio].id}">${portfolio_text}</td>
                    <td>${all_portfolio[portfolio].short_name}</td>
                    <td> <a href="#" onclick="deleteTabletr('portfolio${microtime}')">
                        <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                            <i class="uil-trash"></i>
                        </span>
                    </a></td>
                </tr>`;
                        $("#add_portfolio_table").append(portfoliotr);
                        $("#add_portfolio_table").show();
                        $("#addportfolioSelect").val('0').trigger('change');
                    }
                }
            }
        </script>
    @endcan

    <script>
        $("#create_contant").click(function() {
            if (validateFormByDiv('createContantDivValidation')) {
                let personName = $("#personName").val();
                let personSurname = $("#personSurname").val();
                let personEmail = $("#personEmail").val();
                let personPhoneNumber = $("#personPhoneNumber").val();
                let personContactType = $("#personContactType").val();

                if (personName == "") {
                    $("#personNameError").attr('hidden', false);
                } else if (personSurname == "") {
                    $("#personSurnameError").attr('hidden', false);
                } else if (personEmail == "") {
                    $("#personEmailError").attr('hidden', false);
                } else if (personPhoneNumber == "") {
                    $("#personPhoneNumberError").attr('hidden', false);
                } else if (personContactType == "") {
                    $("#personContactTypeError").attr('hidden', false);
                } else {
                    $.ajax({
                        url: "{{ route('common.add-person') }}",
                        type: 'POST',
                        data: {
                            'personName': personName,
                            'personSurname': personSurname,
                            'personEmail': personEmail,
                            'personPhoneNumber': personPhoneNumber
                        },
                        dataType: 'json',
                        success: function(data) {
                            let commentData = data.data;
                            if (data) {
                                let microtime = Date.now();
                                var rowHtml = `<tr id="contact${microtime}">
                                <td>${personName||''} ${personSurname||''}
                                    <input type="hidden" name="user_id[]" value="${data.data}" />
                                    <input type="hidden" name="contact_type[]" value="${personContactType}" />
                                </td>
                                <td>${personPhoneNumber||''}</td>
                                <td>${personEmail||''}</td>
                                <td>${personContactType||''}</td>
                                <td> <button onclick="deleteTabletr('contact${microtime}')" type="button" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
                            </tr>`;
                                $("#user_data").append(rowHtml);
                                resetContact();
                            } else {
                                $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                                $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                                $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                                $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                            }
                            $('#client_comment_modal').modal('hide');
                        }
                    });
                }
            }
        });



        
    </script>
    @include('common.footer_validation', ['validate_url_path' => 'client.prospect.unique'])
@endpush
