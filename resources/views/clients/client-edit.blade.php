@extends('layouts.main')
@section('app-title', 'Edit Client - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Client</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Edit Client</li>
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

                            @can('client-comment-view')
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
                        <form action="{{ route('client.client.update', ['client' => $client->id]) }}" id="myForm"
                            method="post">
                            @csrf @method('PUT')
                            <div class="tab-content  text-muted">
                                <div class="tab-pane @if (!$errors->has('tab_name')) show active @elseif($errors->first('tab_name') == 'basic_info') show active @endif"
                                    id="basic_info">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Business Name
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            name="business_name"
                                                            oninput="checkUniqueData(this,'business_name','{{ $client->business_name }}')"
                                                            value="{{ old('business_name') ?? $client->business_name }}"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Trading Name
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="trading_name"
                                                            value="{{ old('trading_name') ?? $client->trading_name }}"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">ABN</label>
                                                        <input type="text" name="abn"
                                                            value="{{ old('abn') ?? $client->abn }}" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            oninput="checkUniqueData(this,'abn','{{ $client->abn }}')"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">ACN</label>
                                                        <input type="text" name="acn"
                                                            value="{{ old('acn') ?? $client->acn }}" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Phone Number
                                                            <span class="red">*</span></label>
                                                        <input type="text" name="phone_number" required
                                                            value="{{ old('phone_number') ?? $client->phone_number }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder=""
                                                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Second
                                                            Number</label>
                                                        <input type="text" name="second_number"
                                                            value="{{ old('second_number') ?? $client->second_number }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder=""
                                                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Mobile
                                                            Number</label>
                                                        <input type="text" name="mobile_number"
                                                            value="{{ old('mobile_number') ?? $client->mobile_number }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder=""
                                                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Fax
                                                            Number</label>
                                                        <input type="text" name="fax_number"
                                                            value="{{ old('fax_number') ?? $client->fax_number }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Type of the client <span
                                                                class="red">*</span></label>
                                                        <select data-plugin="customselect" required name="client_type"
                                                            class="form-select">
                                                            <option value="commercial"
                                                                @if (old('client_type') == 'commercial') selected @elseif($client->client_type == 'commercial') selected @endif>
                                                                Commercial</option>
                                                            <option value="residential"
                                                                @if (old('client_type') == 'residential') selected @elseif($client->client_type == 'residential') selected @endif>
                                                                Residential</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Website</label>
                                                        <input type="text" class="form-control" name="website"
                                                            value="{{ old('website') ?? $client->website }}"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Company <span
                                                                class="red">*</span></label>
                                                        <select data-plugin="customselect" required name="comapny_id"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @foreach ($companies as $company)
                                                                <option
                                                                    value="{{ $company->id }}"@if (old('comapny_id') == $company->id) selected @elseif($client->comapny_id == $company->id) selected @endif>
                                                                    {{ $company->business_name }}</option>
                                                            @endforeach
                                                            @error('comapny_id')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </select>
                                                    </div>
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
                                                                    <option value="{{ $user->id }}"
                                                                        @if (old('client_id') == $user->id) selected @elseif($client->client_id == $user->id) selected @endif>
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
                                                                        <input id="checkbox6a" value="1"
                                                                            name="is_prospect_client"
                                                                            {{ old('is_prospect_client') ?? ($client->is_prospect_client == '1' ? 'checked' : '') }}
                                                                            type="checkbox">
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
                                                                    <input id="checkbox6b" value="1"
                                                                        name="is_direct_client"
                                                                        {{ old('is_direct_client') ?? $client->is_direct_client == '1' ? 'checked' : '' }}
                                                                        type="checkbox">
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
                                                        <label class="form-label">Note</label>
                                                        <textarea name="notes" class="form-control">{{ old('notes') ?? $client->notes }}</textarea>
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
                                                                    @if ($client_contact)
                                                                        @foreach ($client_contact as $contact)
                                                                            <tr
                                                                                id="contact{{ $contact->id }}">
                                                                                <td>{{ $contact->user->name }}
                                                                                    {{ $contact->user->surname }}</td>
                                                                                <td>{{ $contact->user->phone_number }}</td>
                                                                                <td>{{ $contact->user->email }}</td>
                                                                                <td>{{ Str::ucfirst($contact->user_type) }}
                                                                                </td>
                                                                                <td> <button type="button"
                                                                                        onclick="deleteRecordTbl('{{ $contact->id }}','BaseContact','contact{{ $contact->id }}')"
                                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                                            class="uil-trash"></i></button>
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
                                    </div>
                                    <!-- main_bx_dt -->
                                </div>
                                <div class="tab-pane @if ($errors->first('tab_name') == 'address') show active @endif"
                                    id="profile">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row" id="addressDivValidation">
                                                <input type="hidden" name="type" value="client">
                                                <input type="hidden" name="data_id" value="{{ $client->id }}">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressUnit">Unit </label>
                                                        <input type="text" class="form-control" id="addressUnit"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressNumber">Address Number
                                                            <span class="red">*</span></label>
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
                                                        <label class="form-label" for="streetAddress">Street Address
                                                            <span class="red">*</span></label>
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
                                                            @foreach ($cities as $city)
                                                                <option data-value="{{ $city->city_name }}"
                                                                    value="{{ $city->id }}">
                                                                    {{ $city->city_name }}</option>
                                                            @endforeach
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
                                                            @foreach ($states as $state)
                                                                <option data-value="{{ $state->state_name }}"
                                                                    value="{{ $state->id }}">
                                                                    {{ $state->state_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressZipCode">ZipCode <span
                                                                class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="addressZipCode" maxlength="8" minlength="3"
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
                                                                    <input id="mainAddress" name="is_this_main_address"
                                                                        value="1" type="checkbox">
                                                                    <label class="form-label" for="mainAddress">
                                                                        Is this your main address?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="mailAddress" value="1"
                                                                        name="is_this_mail_address" type="checkbox">
                                                                    <label class="form-label" for="mailAddress">
                                                                        Is this your mail address?
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="importedAddress">Imported
                                                            Address
                                                            <span class="red">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="importedAddress" aria-describedby="emailHelp"
                                                            placeholder="">
                                                            <span id="importedAddressError" class="text-danger" hidden>This field is required.</span>
                                                    </div>
                                                </div> --}}
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
                                                <div class="col-lg-12 mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100"
                                                        id="table_data">
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
                                                                        id="address{{ $kk }}">
                                                                        <td>
                                                                            <input type="hidden"
                                                                                name="address_id[{{ $kk }}]"
                                                                                value="{{ old('address_id')[$kk] ?? '' }}">
                                                                            <input name="unit[]" type="hidden"
                                                                                value="{{ old('unit')[$kk] }}">
                                                                            <input name="address_number[]" type="hidden"
                                                                                value="{{ old('address_number')[$kk] ?? '' }}">
                                                                            <input name="street_address[]" type="hidden"
                                                                                value="{{ $addr }}">
                                                                            <input name="suburb[]" type="hidden"
                                                                                value="{{ old('suburb')[$kk] ?? '' }}">
                                                                            <input name="city[]" type="hidden"
                                                                                value="{{ old('city')[$kk] }}">
                                                                            <input name="state[]" type="hidden"
                                                                                value="{{ old('state')[$kk] }}">
                                                                            <input name="zipcode[]" type="hidden"
                                                                                value="{{ old('zipcode')[$kk] }}">
                                                                            <input name="is_main_address[]" type="hidden"
                                                                                value="{{ old('is_main_address')[$kk] }}">
                                                                            <input name="is_mail_address[]" type="hidden"
                                                                                value="{{ old('is_mail_address')[$kk] }}">
                                                                            <input name="imported_address[]"
                                                                                type="hidden"
                                                                                value="{{ old('imported_address')[$kk] }}">
                                                                            {{ old('unit')[$kk] ?? '' }}
                                                                            {{ old('address_number')[$kk] ?? '' }}
                                                                            {{ $addr ?? '' }},
                                                                            {{ old('suburb')[$kk] ?? '' }}
                                                                            {{ $newCities[old('city')[$kk]] ?? '' }}
                                                                            {{ $newStates[old('state')[$kk]] ?? '' }}
                                                                            {{ old('zipcode')[$kk] ?? '' }}
                                                                        </td>
                                                                        <td>{{ $addres->is_this_main_address ? 'Yes' : 'No' }}
                                                                        </td>
                                                                        <td>{{ $addres->is_this_mail_address ? 'Yes' : 'No' }}
                                                                        </td>
                                                                        <td> <button style="border: none;background: none;"
                                                                                type="button"
                                                                                onclick="deleteTabletr('address{{ $kk }}')"><span
                                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom"><i
                                                                                        class="uil-trash"></i></span></button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @elseif($addresses && !empty($addresses))
                                                                @foreach ($addresses as $kk => $addres)
                                                                    <tr id="address{{ $addres->id }}">
                                                                        <td>{{ $addres->unit ?? '' }}
                                                                            {{ $addres->address_number ?? '' }}
                                                                            {{ $addres->street_address ?? '' }}
                                                                            {{ $addres->suburb ?? '' }}
                                                                            {{ $addres->city ? $addres->city->city_name : '' }}
                                                                            {{ $addres->state ? $addres->state->state_name : '' }}
                                                                            {{ $addres->zipcode }}</td>
                                                                            <td>{{ $addres->is_this_main_address ? 'Yes' : 'No' }}
                                                                            </td>
                                                                            <td>{{ $addres->is_this_mail_address ? 'Yes' : 'No' }}
                                                                            </td>
                                                                        <td><button style="border: none;background: none;"
                                                                                type="button"
                                                                                onclick="deleteRecordTbl('{{ $addres->id }}','BaseAddress','address{{ $addres->id }}')"><span
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


                                <div class="tab-pane @if ($errors->first('tab_name') == 'social_media') show active @endif"
                                    id="tickets">
                                    <div class="sites_main">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputEmail1">Facebook</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('facebook') ?? $client->facebook }}"
                                                        name="facebook" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputEmail1">Twitter</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('twitter') ?? $client->twitter }}" name="twitter"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputEmail1">Instagram</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('instagram') ?? $client->instagram }}"
                                                        name="instagram" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputEmail1">Linkedin</label>
                                                    <input type="text" class="form-control"
                                                        value="{{ old('linkedin') ?? $client->linkedin }}"
                                                        name="linkedin" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @can('portfolio-view')
                                    @php
                                        $newclient_portfolios = $client_portfolios_not->keyBy('id');
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
                                                            @if ($client_portfolios_not)
                                                                @foreach ($client_portfolios_not as $kk => $cportfolios)
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
                                                <div class="col-lg-12">
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
                                                                    <tr id="portfolio{{ $kk }}">
                                                                        <td class="portfolioTdInput">
                                                                            {{ $newclient_portfolios[$portfolio]['full_name'] }}
                                                                        </td>
                                                                        <td>{{ $newclient_portfolios[$portfolio]['short_name'] }}
                                                                        </td>
                                                                        <td> <a href="#"
                                                                                onclick="deleteTabletr('portfolio{{ $kk }}')">
                                                                                <span
                                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                    <i class="uil-trash"></i>
                                                                                </span>
                                                                            </a></td>
                                                                    </tr>
                                                                @endforeach
                                                            @elseif($client_portfolios)
                                                                @foreach ($client_portfolios as $portfolio)
                                                                    <tr id="portfolio{{ $kk }}">
                                                                        <td class="portfolioTdInput">
                                                                            {{ $portfolio->full_name }}</td>
                                                                        <td>{{ $portfolio->short_name }}</td>
                                                                        <td>
                                                                            <button type="button"
                                                                                onclick="deleteRecordTbl('{{ $portfolio->id }}','ClientPortfolio','portfolio{{ $portfolio->id }}')"
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                <i class="uil-trash"></i>
                                                                            </button>
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

                                @endcan


                                @can('client-comment-add')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'comment') show active @endif"
                                        id="comments">
                                        <div class="sites_main">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <a href="javascript:void(0)"
                                                        onclick="addComment('{{ $client->id }}','{{ $client->business_name }}')"
                                                        class="theme_btn btn add_btn" data-bs-toggle="modal"
                                                        data-bs-target="#client_comment_modal">Add Comment</a>
                                                </div>
                                                <div class="col-lg-12  mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100"
                                                        id="table_data">
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
                                                            @if ($comments)
                                                                @foreach ($comments as $comment)
                                                                    <tr id="comment{{ $comment->id }}">
                                                                        <td>{{ date('d/m/Y H:i:s', strtotime($comment->created_at)) }}
                                                                        </td>
                                                                        <td>{{ $comment->client->business_name }}</td>
                                                                        <td>{{ ucwords(str_replace('_', ' ', $comment->comment_type)) }}
                                                                        </td>
                                                                        <td>{{ substr($comment->comment, 0, 40) }} </td>
                                                                        <td>
                                                                            @if ($comment->file)
                                                                                <a href="{{ url(env('STORE_PATH') . $comment->file) }}"
                                                                                    target="_blank">View File</a>
                                                                            @else
                                                                                -
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <button type="button"
                                                                                onclick="deleteRecordTbl('{{ $comment->id }}','Comment','comment{{ $comment->id }}')"
                                                                                class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                <i class="uil-trash"></i>
                                                                            </button>
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
                                @endcan

                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save
                                                </button>
                                                <a href="{{ route('client.client.index') }}"
                                                    class="theme_btn btn-primary btn"><i class="uil-list-ul"></i>
                                                    List</a>
                                                @if ($client->status == '1')
                                                    <button type="button"
                                                        onclick="statusChange('0','{{ $client->id }}','clients')"
                                                        class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i>
                                                        Deactivate</button>
                                                @else
                                                    <button type="button"
                                                        onclick="statusChange('1','{{ $client->id }}','clients')"
                                                        class="theme_btn btn btn-success"><i class="uil-shield-check"></i>
                                                        Activate</button>
                                                @endif
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
                        <input type="hidden" name="data_id" value="{{ $client->id }}" id="comment_data_id">
                        <input type="hidden" name="type" value="client">
                        <div class="modal-body">
                            <div class="row" id="newCommentDivValidation">
                                <div class="col-lg-12">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Comment Type</label>
                                        <select class="form-select js-example-basic-single2 required_fields" name="comment_type">
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
                                        <textarea class="form-control required_fields" name="comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Upload File</label>
                                        <input name="file" type="file" class="dropify" data-height="100" />
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
        <!-- Button trigger modal -->
    @endcan


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
                                    id="personPhoneNumber" aria-describedby="emailHelp" placeholder=""
                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
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
        const file_path = '{{ env('STORE_FILE_URL') }}';

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        var newalluser = @json($newalluser);

        function resetContact() {
            $('#user_value').val('0').trigger('change');
            $('#contact_type').val('0').trigger('change');
        }
        $('#add_contact_btn').click(function() {
            if (validateFormByDiv('contactDivValidation')) {
                var user_id = $('#user_value').val();
                var user_type = $('#contact_type').val();
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
                <td> <button onclick="deleteTabletr('contact${microtime}')" type="button" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
            </tr>`;
            if(checkTrDuplicate('user_data',rowHtml)){
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
                //delete specific row
                $(ele).parent().parent().remove();
            } else {
                //delete last row
                table.deleteRow(rowCount - 1);
            }
        }
    </script>

    @can('client-comment-add')
        <script>
            function addComment(id, name) {
                $('#comment_data_id').val(id);
                $('#comment_data_value').val(name);
            }
            $('#saveComment').on('submit', function(e) {
                if (validateFormByDiv('newCommentDivValidation')) {
                    e.preventDefault();
                    var formData = new FormData(this);
                    var person = $('#comment_data_value').val();
                    var time = "{{ date('d/m/Y H:i:s') }}";
                    var asset = "{{ asset('/') }}";
                    console.log(formData);
                    $.ajax({
                        type: "POST",
                        url: "{{ route('client.save-comment') }}",
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#client_comment_modal').modal('hide');
                            var comment_type = data.comment_type;
                            var type = comment_type.charAt(0).toUpperCase() + comment_type.slice(1)
                                .toLowerCase()
                            var comment = data.comment;
                            var rowHtml3 = `<tr>\
                                    <td>${time}</td>\
                                    <td>${person}</td>\
                                    <td>${type.replace(/_/g, ' ')}</td>\
                                    <td class="contact_type__">${comment.substring(0, 40)}</td>\
                                    <td><a href="${file_path+data.file}" target="_blank">View File</a></td>\
                                    <td> <a href="javascript:void(0)" onclick="deleteRecord(this,${data.id},'{{ route('client.delete-comment') }}','Comment')"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></a></td>\
                                </tr>`;
                            $('#comment_data').append(rowHtml3);
                        },
                        error: function(data) {
                            console.log("error");
                            console.log(data);
                        }
                    });
                }
            })

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
                                                    <a href="#">
                                                        <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                            <i class="uil-trash"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>`;
                                $("#add_client_commenttr").append(tabletrComment);
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
        </script>
    @endcan
    <script>
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
            $("#importedAddress").val('');
        }

        var all_portfolio = @json($newclient_portfolios);

        function addportfolio() {
            if (validateFormByDiv('portfolioDivValidation')) {
                let portfolio = $(`#addportfolioSelect`).val();
                let portfolio_text = $(`#addportfolioSelect option:selected`).text();
                let exists = false;
                $(`.portfolioTdInput`).each(function() {
                    if (this.textContent === portfolio_text) {
                        exists = true;
                    }
                });
                if (exists) {
                    $("#addportfolioSelect").next('.select2-container').find('.select2-selection').addClass(
                        'invalid-select');
                    $("#addportfolioSelect").next('span').after(
                        '<span class="custom_error text-danger">Already added in list.</span>');
                } else {
                    let microtime = Date.now();
                    let portfoliotr = `<tr id="portfolio${microtime}">
                    <td class="portfolioTdInput"><input type="hidden" name="portfolio[]" value="${all_portfolio[portfolio].id}">${portfolio_text}</td>
                    <td >${all_portfolio[portfolio].short_name}</td>
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
    <script>
        function statusChange(that, id, tdata) {
            // swal({
            //         title: "Are you sure?",
            //         text: "Do you want to Deactivated!",
            //         type: "warning",
            //         showCancelButton: true,
            //         confirmButtonClass: "btn-danger",
            //         confirmButtonText: "Yes, Deactivated it!",
            //         cancelButtonText: "No, Cancel It",
            //         closeOnConfirm: false,
            //         closeOnCancel: false
            //     },
            //     function(isConfirm) {
            let status = that;


            $.ajax({
                url: "{{ route('common.statusUpdate') }}",
                type: 'POST',
                data: {
                    status: status,
                    id: id,
                    tdata: tdata
                },
                success: function(result) {
                    $('#modal-alert-data_ajax').modal('show');
                    if (result) {
                        $("#modal-alert-dataLabel_ajax").text('Status Changed!');
                        $("#modal-alert-dataLabelMsg_ajax").text('Status Has Been Changed Successfully!');
                        $("#modal-alert-dataLabelMsg_ajax").removeClass('text-danger');
                        $("#modal-alert-dataLabelMsg_ajax").addClass('text-success');
                        location.reload();
                    } else {
                        $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                        $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                        $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                        $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                    }
                }
            });
        }

        function deleteRecordTbl(docId, table_name, divname) {
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
                            url: "{{ route('common.delete-record') }}",
                            data: {
                                "data_id": docId,
                                "table_name": table_name
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result.status) {
                                    swal({
                                        type: 'success',
                                        title: 'Deleted!',
                                        text: 'Deleted',
                                        timer: 3000
                                    });
                                    deleteTabletr(divname);
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Something went wrong',
                                        timer: 3000
                                    })
                                }
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal("Cancelled", "Data safe :)", "error");
                    }
                });
        }


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
                                <td> <button type="button" onclick="deleteTabletr('contact${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button></td>
                            </tr>`;
                                $("#user_data").append(rowHtml);
                                resetContact();
                            } else {
                                $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                                $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                                $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                                $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                            }
                            $('#create_contact_modal').modal('hide');
                        }
                    });
                }
            }
        });


        
    </script>
    @include('common.footer_validation', ['validate_url_path' => 'client.prospect.unique'])
@endpush
