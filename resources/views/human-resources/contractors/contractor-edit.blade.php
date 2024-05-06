@extends('layouts.main')
@section('app-title', 'Contractor Edit - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Contractor</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Administration</li>
                            <li class="breadcrumb-item active">Edit Contractor</li>
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
                                <a href="#home" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if (!$errors->has('tab_name')) active @elseif($errors->first('tab_name') == 'basic_info') active @endif ">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#address" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link  @if ($errors->first('tab_name') == 'address') active @endif">
                                    <span><i class="bi bi-journals"></i></span>
                                    <span>Address</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contractor" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'supervisor') active @endif">
                                    <span><i class="uil-user-plus"></i></span>
                                    <span>Supervisor</span>
                                </a>
                            </li>
                            @can('cleaner-edit')
                                <li class="nav-item">
                                    <a href="#departments" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'cleaners') active @endif">
                                        <span><i class="uil uil-constructor"></i></span>
                                        <span>Cleaners</span>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="#document" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'document') active @endif">
                                    <span><i class="uil-file-blank"></i></span>
                                    <span>Documents</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('hr.contractor.update', ['contractor' => $contractor]) }}" id="myForm"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="tab-content  text-muted">
                                <div class="tab-pane  @if (!$errors->has('tab_name')) show active @elseif($errors->first('tab_name') == 'basic_info') show active @endif"
                                    id="home">

                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Name <span
                                                                class="red">*</span></label>
                                                        <input type="text" name="name" required
                                                            value="{{ $contractor->name ?? old('name') }}"
                                                            class="form-control" minlength="3"
                                                            oninput="checkUniqueData(this,'name','{{ $contractor->name }}')"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">ABN <span
                                                                class="red">*</span></label>
                                                        <input type="text" name="abn" minlength="3"
                                                            oninput="checkUniqueData(this,'abn','{{ $contractor->abn }}')"
                                                            required value="{{ $contractor->abn ?? old('abn') }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('abn')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Responsible</label>
                                                        <select data-plugin="customselect" name="responsible"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($managers)
                                                                @foreach ($managers as $manager)
                                                                    <option
                                                                        {{ $contractor->responsible_id == $manager->id ? 'selected' : (old('responsible') == $manager->id ? 'selected' : '') }}
                                                                        value="{{ $manager->id }}">{{ $manager->name }}
                                                                        ({{ $manager->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('responsible')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Hourly Rate <span
                                                                class="red">*</span></label>
                                                        <input type="number" name="hourly_rate" required
                                                            value="{{ $contractor->hourly_rate ?? old('hourly_rate') }}"
                                                            class="form-control" min="0" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('hourly_rate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- main_bx_dt -->
                                </div>

                                <div class="tab-pane @if ($errors->first('tab_name') == 'address') show active @endif" id="address">

                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row" id="addressDivValidation">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressUnit">Unit </label>
                                                        <input type="text" class="form-control" id="addressUnit"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressNumber">Address Number <span
                                                                class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="addressNumber" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="addressNumberError" class="text-danger"
                                                            hidden>Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="streetAddress">Street Address <span
                                                                class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="streetAddress" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="streetAddressError" class="text-danger"
                                                            hidden>Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressSuburb">Suburb <span
                                                                class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="addressSuburb" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="addressSuburbError" class="text-danger"
                                                            hidden>Required</span>
                                                    </div>
                                                </div>


                                                <div class="col-lg-3">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label" for="addressCity">City </label>
                                                        <select data-plugin="customselect" class="form-select"
                                                            id="addressCity">
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
                                                        <label class="form-label" for="addressState">State </label>
                                                        <select data-plugin="customselect" class="form-select"
                                                            id="addressState">
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
                                                            id="addressZipCode" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="addressZipCodeError" class="text-danger"
                                                            hidden>Required</span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <label for="">Type of the Address:</label>
                                                    <div class="row mt-3">
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="mainAddress" value="1"
                                                                        type="checkbox">
                                                                    <label class="form-label" for="mainAddress">
                                                                        Is this your main address?
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <div class="checkbox checkbox-success">
                                                                    <input id="mailAddress" type="checkbox"
                                                                        value="1">
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
                                                    <label class="form-label" for="importedAddress">Imported Address <span class="red">*</span></label>
                                                    <input type="text" class="form-control" id="importedAddress"  aria-describedby="emailHelp" placeholder="">
                                                    <span id="importedAddressError" class="text-danger" hidden>Required</span>
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
                                                <div class="col-lg-12 mt-2">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Address</th>
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
                                                                            @if (isset(old('address_id')[$kk]))
                                                                                <input type="hidden" name="address_id[]"
                                                                                    value="{{ old('address_id')[$kk] }}">
                                                                            @endif
                                                                            <input name="unit[]" type="hidden"
                                                                                value="{{ old('unit')[$kk] }}">
                                                                            <input name="address_number[]" type="hidden"
                                                                                value="{{ old('address_number')[$kk] }}">
                                                                            <input name="street_address[]" type="hidden"
                                                                                value="{{ $addr }}">
                                                                            <input name="suburb[]" type="hidden"
                                                                                value="{{ old('suburb')[$kk] }}">
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
                                                                        <td> <button style="border: none;background: none;"
                                                                                type="button"
                                                                                onclick="deleteTabletr('address{{ $kk }}{{ time() }}')"><span
                                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom"><i
                                                                                        class="uil-trash"></i></span></button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @elseif($contractorAddress)
                                                                @foreach ($contractorAddress as $kk => $addres)
                                                                    <tr id="address{{ $addres->id }}">
                                                                        <input type="hidden"
                                                                            name="address_id[{{ $kk }}]"
                                                                            value="{{ $addres->id }}">
                                                                        <input name="unit[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->unit ?? '' }}">
                                                                        <input name="address_number[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->address_number ?? '' }}">
                                                                        <input name="street_address[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->street_address ?? '' }}">
                                                                        <input name="suburb[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->suburb ?? '' }}">
                                                                        <input name="city[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->geo_city_id }}">
                                                                        <input name="state[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->geo_state_id }}">
                                                                        <input name="zipcode[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->zipcode }}">
                                                                        <input name="is_main_address[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->is_main_address }}">
                                                                        <input name="is_mail_address[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->is_mail_address }}">
                                                                        <input
                                                                            name="imported_address[{{ $kk }}]"
                                                                            type="hidden"
                                                                            value="{{ $addres->imported_address }}">
                                                                        <td>{{ $addres->unit ?? '' }}
                                                                            {{ $addres->address_number ?? '' }}
                                                                            {{ $addres->street_address ?? '' }}
                                                                            {{ $addres->suburb ?? '' }}
                                                                            {{ $addres->city ? $addres->city->city_name : '' }}
                                                                            {{ $addres->state ? $addres->state->state_name : '' }}
                                                                            {{ $addres->zipcode }}</td>
                                                                        <td><button style="border: none;background: none;"
                                                                                type="button"
                                                                                onclick="deleteTabletr('address{{ $addres->id }}')"><span
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

                                <div class="tab-pane @if ($errors->first('tab_name') == 'supervisor') show active @endif"
                                    id="contractor">

                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row" id="supervisorDivValidation">
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label"> Supervisor</label>
                                                        <select data-plugin="customselect" id="selectSupervisor"
                                                            class="form-select required_fields">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($managers)
                                                                @foreach ($managers as $kk => $manager)
                                                                    <option value="{{ $kk + 1 }}">
                                                                        {{ $manager->name }} {{ $manager->surname ?? '' }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        <span id="selectSupervisorError" class="text-danger" hidden>This
                                                            field is required.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 align-self-center">
                                                    <button type="button" onclick="addSupervisor('selectSupervisor')"
                                                        class="theme_btn btn add_btn portfolio_add_btn">+ Add
                                                        Supervisor</button>
                                                </div>

                                                <div class="col-lg-12 mt-3">
                                                    <table class="table table-bordered dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Phone Number</th>
                                                                <th>Email</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_supervisor_table">
                                                            @if ($contSupervisor)
                                                                @foreach ($contSupervisor as $kk => $superv)
                                                                    <tr id="superv{{ $superv->id }}">
                                                                        <td class="supervisorTblClass">
                                                                            {{ $superv->supervisor->name ?? '' }}</td>
                                                                        <td>{{ $superv->supervisor->phone_number ?? '-' }}
                                                                        </td>
                                                                        <td>{{ $superv->supervisor->email ?? '-' }}</td>
                                                                        <td><button style="border: none;background: none;"
                                                                                type="button"
                                                                                onclick="deleteRecord('{{ $superv->id }}','ContractorSupervisor','superv{{ $superv->id }}')"><span
                                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
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

                                @can('cleaner-edit')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'cleaners') show active @endif"
                                        id="departments">

                                        <div class="main_bx_dt__">
                                            <div class="top_dt_sec">
                                                <div class="row" id="cleanerDivValidation">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 mt-3 mt-sm-0">
                                                            <label class="form-label"> Cleaners</label>
                                                            <select data-plugin="customselect" id="selectCleaner"
                                                                name="cleaner" class="form-select required_fields">
                                                                <option value="0">Please select one or start typing
                                                                </option>
                                                                @if ($cleaners)
                                                                    @foreach ($cleaners as $kk => $cleaner)
                                                                        <option value="{{ $kk + 1 }}">
                                                                            {{ $cleaner->name }} ({{ $cleaner->email }})
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 align-self-center">
                                                        <button type="button" onclick="addCleaner('selectCleaner')"
                                                            class="theme_btn btn add_btn portfolio_add_btn">+ Add
                                                            Cleaner</button>
                                                    </div>
                                                    @php
                                                        $newcleaners = $cleaners->keyBy('id');
                                                    @endphp
                                                    <div class="col-lg-12 mt-3">
                                                        <table class="table table-bordered  dt-responsive nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Cleaner</th>
                                                                    <th>Phone Number</th>
                                                                    <th>Email</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="add_department_table">
                                                                @if ($contractorCleaner)
                                                                    @foreach ($contractorCleaner as $kk => $cleaner)
                                                                        <tr id="cleaner{{ $cleaner->id }}">
                                                                            <td class="cleanerTblClass">
                                                                                {{ $cleaner->cleaners->name ?? '' }}</td>
                                                                            <td>{{ $cleaner->cleaners->phone_number ?? '-' }}
                                                                            </td>
                                                                            <td>{{ $cleaner->cleaners->email ?? '-' }}</td>
                                                                            <td><button style="border: none;background: none;"
                                                                                    type="button"
                                                                                    onclick="deleteRecord('{{ $cleaner->id }}','ContractorCleaner','cleaner{{ $cleaner->id }}')"><span
                                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
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
                                @endcan

                                <div class="tab-pane @if ($errors->first('tab_name') == 'document') show active @endif"
                                    id="document">

                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row" id="documents_upload_data1">
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Type of Document</label>
                                                        <select data-plugin="customselect" id="document_type"
                                                            class="form-select required_fields">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            <option value="Employment Package">Employment Package</option>
                                                            <option value="Letter of Offer of Employment">Letter of Offer
                                                                of Employment</option>
                                                            <option value="Field Operative Interview Questions Character">
                                                                Field Operative Interview Questions Character</option>
                                                            <option value="Field Operative Interview Questions Experience">
                                                                Field Operative Interview Questions Experience</option>
                                                            <option value="English Language Proficiency Test">English
                                                                Language Proficiency Test</option>
                                                            <option value="Letter of Offer of Employment - Executive Role">
                                                                Letter of Offer of Employment - Executive Role</option>
                                                            <option value="QCC Induction Handbook">QCC Induction Handbook
                                                            </option>
                                                            <option value="Company Policies Manual">Company Policies Manual
                                                            </option>
                                                            <option value="Confidentiality Agreement">Confidentiality
                                                                Agreement</option>
                                                            <option value="Recruitment Onboarding">Recruitment Onboarding
                                                            </option>
                                                            <option value="Vevo Check">Vevo Check</option>
                                                            <option value="Passport">Passport</option>
                                                            <option value="VISA">VISA</option>
                                                            <option value="Position Description">Position Description
                                                            </option>
                                                            <option value="Resignation Letter">Resignation Letter</option>
                                                        </select>
                                                        <span id="document_typeError" class="text-danger"
                                                            hidden>Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="reference_number">Reference Number
                                                            <span class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="reference_number" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="reference_numberError" class="text-danger"
                                                            hidden>Required</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="expireDate">Expire Date <span
                                                                class="red">*</span></label>
                                                        <input type="text"
                                                            class="form-control basic-datepicker required_fields"
                                                            id="expireDate" aria-describedby="emailHelp" placeholder="">
                                                        <span id="expireDateError" class="text-danger"
                                                            hidden>Required</span>
                                                    </div>
                                                </div>
                                                @php
                                                    $filecount = 0;
                                                @endphp
                                                <div class="col-lg-12" id="documentFilesDocs">
                                                    <div class="mb-3" id="documentFilesDocsDiv{{ $filecount }}">
                                                        <input id="documentFiles{{ $filecount }}"
                                                            name="documentImages[{{ $filecount }}]" type="file"
                                                            class="dropify required_fields" data-height="100" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <button type="button" onclick="addDocument()"
                                                        class="theme_btn btn add_btn">+ Add Document</button>
                                                    <button type="button" onclick="resetDocument()"
                                                        class="theme_btn btn btn-primary"><i class="bi-arrow-repeat"></i>
                                                        Reset</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12  mt-3">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Document</th>
                                                                <th>Type of Document</th>
                                                                <th>Expire Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_document_box">
                                                            @if ($contractorDocuments)
                                                                @foreach ($contractorDocuments as $kk => $docs)
                                                                    <tr id="docus{{ $docs->id }}">
                                                                        <td><a target="_blank"
                                                                                href="{{ url(env('STORE_PATH') . $docs->docs_image) }}">View Document</a></td>
                                                                        <td class="docsTypeTd">{{ $docs->docs_type }}</td>
                                                                        <td>{{ $docs->expire_date }}</td>
                                                                        <td><button style="border: none;background: none;"
                                                                                type="button"
                                                                                onclick="deleteRecord('{{ $docs->id }}','BaseDocument','docus{{ $docs->id }}')"><span
                                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
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
                                </div>
                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    class="theme_btn btn save_btn"><i class="bi bi-save"></i>
                                                    Save</button>
                                                <a href="{{ route('hr.contractor.index') }}"
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


@endsection
@push('push_script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        //Address
        var all_cleaners = @json($cleaners);
        var all_managers = @json($managers);

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

        function addSupervisor(that) {
            if (validateFormByDiv('supervisorDivValidation')) {
                let supervisor = $(`#${that}`).val() - 1;
                let supervisorText = $(`#${that} option:selected`).text();
                let surname = all_managers[supervisor].surname || '';
                let phone_number = all_managers[supervisor].phone_number || '-';
                let email = all_managers[supervisor].email || '-';
                let microtime = Date.now();

                let exists = false;
                $(".supervisorTblClass").each(function() {
                    if (this.textContent == supervisorText.trim()) {
                        exists = true;
                    }
                });
                if (exists) {
                    $("#selectSupervisor").next('.select2-container').find('.select2-selection').addClass(
                        'invalid-select');
                    $("#selectSupervisor").next('span').after(
                        '<span class="custom_error text-danger">Already added in list.</span>');
                } else {
                    let supervisortr = `<tr id="supervisor${microtime}">
                            <td class="supervisorTblClass"><input type="hidden" name="supervisor[]" value="${all_managers[supervisor].id}">${all_managers[supervisor].name}</td>
                            <td>${phone_number}</td>
                            <td>${email}</td>
                            <td> <button style="border: none;background: none;" type="button" onclick="deleteTabletr('supervisor${microtime}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></button></td>
                        </tr>`;
                    $("#add_supervisor_table").append(supervisortr);
                    $("#add_supervisor_table").show();
                    $("#selectSupervisor").val('0').trigger('change');
                }
            }
        }

        function addCleaner(that) {
            if (validateFormByDiv('cleanerDivValidation')) {
                let cleaner = $(`#${that}`).val() - 1;
                let cleanerText = $(`#${that}`).text();
                let surname = all_cleaners[cleaner].surname || '';
                let phone_number = all_cleaners[cleaner].phone_number || '-';
                let email = all_cleaners[cleaner].email || '-';
                let microtime = Date.now();

                let exists = false;
                $(".cleanerTblClass").each(function() {
                    if (this.textContent == cleanerText.trim()) {
                        exists = true;
                    }
                });
                if (exists) {
                    $(`#${that}`).next('.select2-container').find('.select2-selection').addClass(
                        'invalid-select');
                    $(`#${that}`).next('span').after(
                        '<span class="custom_error text-danger">Already added in list.</span>');
                } else {
                    let cleanertr = `<tr id="cleaner${microtime}">
                                <td class="cleanerTblClass"><input hidden name="cleaner[]" value="${all_cleaners[cleaner].id}"> ${all_cleaners[cleaner].name}</td>
                                <td>${phone_number}</td>
                                <td>${email}</td>
                                <td> <button style="border: none;background: none;" type="button" onclick="deleteTabletr('cleaner${microtime}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></button></td>
                            </tr>`;
                    $("#add_department_table").append(cleanertr);
                    $("#add_department_table").show();
                }
            }
        }


        function addNewAddress() {
            if (validateFormByDiv('addressDivValidation')) {
                let addressUnit = $("#addressUnit").val();
                let addressNumber = $("#addressNumber").val();
                let streetAddress = $("#streetAddress").val();
                let addressSuburb = $("#addressSuburb").val();
                let addressCity = $("#addressCity").val();
                let addressCityText = $("#addressCity option:selected").text();
                let addressState = $("#addressState").val();
                let addressStateText = $("#addressState option:selected").text();
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
                $("#addressNumberError").attr('hidden', true);
                $("#streetAddressError").attr('hidden', true);
                $("#addressSuburbError").attr('hidden', true);
                $("#addressZipCodeError").attr('hidden', true);
                $("#importedAddressError").attr('hidden', true);
                if (addressNumber.trim() == '') {
                    $("#addressNumberError").attr('hidden', false);
                } else if (streetAddress.trim() == '') {
                    $("#streetAddressError").attr('hidden', false);
                } else if (addressSuburb.trim() == '') {
                    $("#addressSuburbError").attr('hidden', false);
                } else if (addressZipCode.trim() == '') {
                    $("#addressZipCodeError").attr('hidden', false);
                }
                // else if (importedAddress.trim() == '') {
                //     $("#importedAddressError").attr('hidden', false);
                // } 
                else {
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
                        ${addressUnit} ${addressNumber} ${streetAddress}, ${addressSuburb} ${addressCityText} ${addressStateText} ${addressZipCode}</td>
                    <td> <button style="border: none;background: none;" type="button" onclick="deleteTabletr('address${microtime}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom"><i class="uil-trash"></i></span></button></td>
                </tr>`;
                    $("#add_address_trfields").append(addressHtml);
                    $('#add_address_trfields').show();
                }
                resetAddress();
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
            // $("#importedAddress").val('');
        }

        var filenumber = 0;

        function addDocument() {
            if (validateFormByDiv('documents_upload_data1')) {
                let document_type = $("#document_type").val();
                let document_type_text = $("#document_type option:selected").text();
                // $("#document_type").find('option:selected').remove();
                let reference_number = $("#reference_number").val();
                let expireDate = $("#expireDate").val();
                var documentFile = $(`#documentFiles${filenumber}`)[0].files[0];

                if (documentFile) {
                    $(`#documentFilesDocsDiv${filenumber}`).hide();
                    filenumber += 1;
                    var $newFileInput = $(
                        `<div class="mb-3" id="documentFilesDocsDiv${filenumber}"><input id="documentFiles${filenumber}" name="documentImages[]" type="file" class="dropify" data-height="100" /></div>`
                    );
                    $('#documentFilesDocs').append($newFileInput);
                    $('.dropify').dropify();
                }
                // $(`#document_type`).find('option:selected').remove();

                if (document_type.trim() == '') {
                    $("#document_typeError").attr('hidden', false);
                } else if (reference_number.trim() == '') {
                    $("#reference_numberError").attr('hidden', false);
                } else if (expireDate.trim() == '') {
                    $("#expireDateError").attr('hidden', false);
                } else {
                    let exists = false;
                    $(".docsTypeTd").each(function() {
                        if ($(this).text() === document_type.trim()) {
                            exists = true;
                        }
                    });
                    if (exists) {
                        $("#document_type").next('.select2-container').find('.select2-selection').addClass(
                            'invalid-select');
                        $("#document_type").next('span').after(
                            '<span class="custom_error text-danger">Already added in list.</span>');
                    } else {
                        let timestamp = Date.now();
                        let documentHtml = `<tr id="docus${timestamp}">
                <td>
                    <input type="hidden" name="document_type[]" value="${document_type}">
                    <input type="hidden" name="reference_number[]" value="${reference_number}">
                    <input type="hidden" name="expireDate[]" value="${expireDate}">
                    ${documentFile.name}
                </td>
                <td class="docsTypeTd">${document_type_text}</td>
                <td>${expireDate}</td>
                <td>
                    <button style="border: none;background: none;" type="button" onclick="deleteTabletr('docus${timestamp}',${filenumber})">
                        <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                            <i class="uil-trash"></i>
                        </span>
                    </button>
                </td>
            </tr>`;
                        $("#add_document_box").append(documentHtml);
                        resetDocument();
                    }
                }
            }
        }

        function resetDocument() {
            $("#document_type").val('0').trigger('change');
            $("#reference_number").val('');
            $("#expireDate").val('');
            $("#documentFile").val('');
        }


        function deleteRecord(docId, table_name, divname) {
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
    </script>
    @include('common.footer_validation', ['validate_url_path' => 'hr.contractor.unique'])
@endpush
