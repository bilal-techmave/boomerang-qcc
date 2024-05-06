@extends('layouts.main')
@section('app-title', 'Add Team Player - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Team Player</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Administration</li>
                            <li class="breadcrumb-item active">Add Team Player</li>
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
                                <a id="homeTab" href="#home" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if (!$errors->has('tab_name')) active @elseif($errors->first('tab_name') == 'basic_info') active @endif">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="addressTab" href="#address" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'address') active @endif">
                                    <span><i class="bi bi-journals"></i></span>
                                    <span>Address</span>
                                </a>
                            </li>
                            @can('contractors-create')
                                <li class="nav-item">
                                    <a id="contractorTab" href="#contractor" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'contractor') active @endif">
                                        <span><i class="uil-user-square"></i></span>
                                        <span>Contractor</span>
                                    </a>
                                </li>
                            @endcan
                            @can('department-add')
                                <li class="nav-item">
                                    <a id="departmentsTab" href="#departments" data-bs-toggle="tab" aria-expanded="false"
                                        class="nav-link @if ($errors->first('tab_name') == 'departments') active @endif">
                                        <span><i class="uil-list-ul"></i></span>
                                        <span>Departments</span>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a id="documentTab" href="#document" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link @if ($errors->first('tab_name') == 'document') active @endif">
                                    <span><i class="uil-file-blank"></i></span>
                                    <span>Documents</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a id="accessTab" href="#access" data-bs-toggle="tab" aria-expanded="false" class="nav-link @if ($errors->first('tab_name') == 'access') active @endif">
                                <span><i class="uil-padlock"></i></span>
                                <span>Access</span>
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <a id="request-documentTab" href="#request-document" data-bs-toggle="tab"
                                    aria-expanded="false" class="nav-link @if ($errors->first('tab_name') == 'request-document') active @endif">
                                    <span><i class="uil-clipboard-notes "></i></span>
                                    <span>Request Document</span>
                                </a>
                            </li>
                        </ul>
                    </div>



                    <div class="card-body">
                        <form action="{{ route('hr.team-player.store') }}" id="myForm" method="POST"
                            enctype="multipart/form-data" class="main_bx_dt__">
                            @csrf
                            <div class="tab-content  text-muted">
                                <div class="tab-pane @if (!$errors->has('tab_name')) show active @elseif($errors->first('tab_name') == 'basic_info') show active @endif"
                                    id="home">
                                    <div class="top_dt_sec">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="teamplayer_name">Name <span
                                                            class="red">*</span></label>
                                                    <input type="text" required name="name" class="form-control"
                                                        id="teamplayer_name" value="{{ old('name') }}"
                                                        aria-describedby="emailHelp" placeholder="">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="teamplayer_surname">Surname <span
                                                            class="red">*</span></label>
                                                    <input type="text" required class="form-control"
                                                        id="teamplayer_surname" name="surname" value="{{ old('surname') }}"
                                                        aria-describedby="emailHelp" placeholder="">
                                                    @error('surname')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="teamplayer_email">Email <span
                                                            class="red">*</span></label>
                                                    <input type="email" oninput="checkUniqueData(this,'email')" required
                                                        class="form-control" id="teamplayer_email" name="email"
                                                        aria-describedby="emailHelp" value="{{ old('email') }}"
                                                        placeholder="">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="basic-datepicker">Date of Birth</label>
                                                    <input type="text"
                                                        class="form-control basic-datepicker flatpickr-input dobdatefield"
                                                        id="basic-datepicker" name="dateofbirth"
                                                        value="{{ old('dateofbirth') }}" aria-describedby="emailHelp"
                                                        placeholder="">
                                                    @error('dateofbirth')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="teamplayer_phonenum">Phone Number <span
                                                            class="red">*</span></label>
                                                    <input type="text" maxlength="15" minlength="8" required
                                                        class="form-control phoneValid" minlength="8" maxlength="15"
                                                        id="teamplayer_phonenum" name="phone_number"
                                                        value="{{ old('phone_number') }}" aria-describedby="emailHelp"
                                                        placeholder="">
                                                    @error('phone_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="teamplayer_secondnum">Second
                                                        Number</label>
                                                    <input type="text" class="form-control phoneValid" minlength="8"
                                                        maxlength="15" id="teamplayer_secondnum" name="second_number"
                                                        value="{{ old('second_number') }}" aria-describedby="emailHelp"
                                                        placeholder="">
                                                    @error('second_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Country</label>
                                                    <select data-plugin="customselect" name="country"
                                                        class="form-select">
                                                        <option value="N_A">Please select one or start typing</option>
                                                        @if ($counties)
                                                            @foreach ($counties as $country)
                                                                <option
                                                                    {{ old('country') == $country->id ? 'selected' : '' }}
                                                                    value="{{ $country->id }}">
                                                                    {{ $country->country_name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="teamplayer_tfn">TFN</label>
                                                    <input type="text" class="form-control" id="teamplayer_tfn"
                                                        name="tfn" value="{{ old('tfn') }}"
                                                        aria-describedby="emailHelp" placeholder="">
                                                    @error('tfn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="teamplayer_abn">ABN</label>
                                                    <input type="text" class="form-control" id="teamplayer_abn"
                                                        name="abn" value="{{ old('abn') }}"
                                                        aria-describedby="emailHelp" placeholder="">
                                                    @error('abn')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Notes</label>
                                                    <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
                                                    @error('notes')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Team Player Type <span
                                                            class="red">*</span></label>
                                                    <select required data-plugin="customselect" id="teamPlayerType"
                                                        name="team_player_role" class="form-select">
                                                        <option value="0">Please select one or start typing</option>
                                                        <option value="staff">Staff</option>
                                                        <option value="person">Person</option>
                                                        <option value="cleaner">Cleaner</option>
                                                    </select>
                                                    @error('team_player_role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3" id="teamPlayerRoleDiv">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Team Player Role <span
                                                            class="red">*</span></label>
                                                    <select required data-plugin="customselect" id="teamPlayerRole"
                                                        name="team_player_mainrole" class="form-select">
                                                        <option value="0">Please select one or start typing</option>
                                                        @if ($allroles)
                                                            @foreach ($allroles as $role)
                                                                <option value="{{ $role->id }}">{{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('team_player_role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="userPassword">Password <span
                                                            class="red">*</span></label>
                                                    <input type="password" required class="form-control" name="password"
                                                        id="userPassword" aria-describedby="emailHelp" placeholder="">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="userPassword_confirmation">Confirm
                                                        Password <span class="red">*</span></label>
                                                    <input type="password" required class="form-control"
                                                        id="userPassword_confirmation" name="password_confirmation"
                                                        aria-describedby="emailHelp" placeholder="">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4" id="divmultipalshift">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="check1">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="is_multipal_shift" name="is_multipal_shift"
                                                                value="1">Is Multiple Shift Create
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="title_head">
                                                    <h4>Login Restriction</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Login Status</label>
                                                    <div class="switch-field">
                                                        <input type="radio" id="radio-one" name="login_status"
                                                            value="1" checked="">
                                                        <label for="radio-one">On</label>
                                                        <input type="radio" id="radio-two" name="login_status"
                                                            value="0">
                                                        <label for="radio-two">Off</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="tab-pane @if ($errors->first('tab_name') == 'address') show active @endif"
                                    id="address">

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
                                                        <label class="form-label" for="addressNumber">Address Number<span
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
                                                <div class="col-lg-3">
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
                                                        <input type="text" maxlength="9" minlength="3"
                                                            class="form-control required_fields" id="addressZipCode"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        <span id="addressZipCodeError" class="text-danger" hidden>This
                                                            field is required.</span>
                                                        @error('zipcode')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="addressPOBox">PO Box</label>
                                                        <input type="text" class="form-control" id="addressPOBox"
                                                            aria-describedby="emailHelp" placeholder="">
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

                                                {{-- <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label" for="importedAddress">Imported Address <span class="red">*</span></label>
                                                    <input type="text" class="form-control" id="importedAddress"  aria-describedby="emailHelp" placeholder="">
                                                    <span id="importedAddressError" class="text-danger" hidden>This field is required.</span>
                                                    @error('importedAddress')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                                <div class="col-lg-12">
                                                    <div class="add_address text-end">
                                                        <button type="button"
                                                            onclick="addNewAddress('addressDivValidation')"
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
                                                                <th>PO Box</th>
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
                                                                            <input name="unit[]" typ="hidden"
                                                                                value="{{ old('unit')[$kk] }}">
                                                                            <input name="address_number[]" typ="hidden"
                                                                                value="{{ old('address_number')[$kk] }}">
                                                                            <input name="street_address[]" typ="hidden"
                                                                                value="{{ $addr }}">
                                                                            <input name="suburb[]" typ="hidden"
                                                                                value="{{ old('suburb')[$kk] }}">
                                                                            <input name="city[]" typ="hidden"
                                                                                value="{{ old('city')[$kk] }}">
                                                                            <input name="state[]" typ="hidden"
                                                                                value="{{ old('state')[$kk] }}">
                                                                            <input name="zipcode[]" typ="hidden"
                                                                                value="{{ old('zipcode')[$kk] }}">
                                                                            <input name="po_box[]" typ="hidden"
                                                                                value="{{ old('po_box')[$kk] }}">
                                                                            <input name="is_main_address[]" typ="hidden"
                                                                                value="{{ old('is_main_address')[$kk] }}">
                                                                            <input name="is_mail_address[]" typ="hidden"
                                                                                value="{{ old('is_mail_address')[$kk] }}">
                                                                            <input name="imported_address[]"
                                                                                typ="hidden"
                                                                                value="{{ old('imported_address')[$kk] }}">
                                                                            {{ old('unit')[$kk] ?? '' }}
                                                                            {{ old('address_number')[$kk] ?? '' }}
                                                                            {{ $addr ?? '' }},
                                                                            {{ old('suburb')[$kk] ?? '' }}
                                                                            {{ $newCities[old('city')[$kk]] ?? '' }}
                                                                            {{ $newStates[old('state')[$kk]] ?? '' }}
                                                                            {{ old('zipcode')[$kk] ?? '' }}
                                                                        </td>
                                                                        <td>{{ $newCities[old('city')[$kk]] ?? '' }}</td>
                                                                        <td>{{ $newCities[old('city')[$kk]] ?? '' }}</td>
                                                                        <td>{{ $newCities[old('city')[$kk]] ?? '' }}</td>
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

                                @can('contractors-create')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'contractor') show active @endif"
                                        id="contractor">
                                        <div class="main_bx_dt__">
                                            <div class="top_dt_sec">
                                                <div class="row" id="contractorDivValidation">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 mt-3 mt-sm-0">
                                                            <label class="form-label">Contractor</label>
                                                            <select data-plugin="customselect" id="selectContractor"
                                                                class="form-select required_fields">
                                                                <option value="0">Please select one or start typing
                                                                </option>
                                                                @if ($contractors)
                                                                    @foreach ($contractors as $contractor)
                                                                        <option value="{{ $contractor->id }}">
                                                                            {{ $contractor->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <span id="selectContractorError" class="text-danger" hidden>This
                                                                field is required.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 align-self-center">
                                                        <button type="button"
                                                            onclick="addContractor('selectContractor','contractorDivValidation')"
                                                            class="theme_btn btn add_btn portfolio_add_btn">+ Add
                                                            Contractor</button>
                                                    </div>
                                                    <div class="col-lg-12  mt-3">
                                                        <table class="table table-bordered  dt-responsive nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Contractors</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="add_contractor_table">
                                                                @if (old('contractor') && !empty(old('contractor')))
                                                                    @php
                                                                        $newContractors = array_column(
                                                                            $contractors->toArray(),
                                                                            'name',
                                                                            'id',
                                                                        );
                                                                    @endphp
                                                                    @foreach (old('contractor') as $kk => $contrac)
                                                                        <tr
                                                                            id="contractor{{ $kk }}{{ time() }}">
                                                                            <td><input type="hidden" name="contractor[]"
                                                                                    value="{{ $contrac }}">{{ $newContractors[$contrac] ?? '' }}
                                                                            </td>
                                                                            <td> <button style="border: none;background: none;"
                                                                                    type="button"
                                                                                    onclick="deleteTabletr('contractor{{ $kk }}{{ time() }}')"><span
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


                                @can('department-add')
                                    <div class="tab-pane @if ($errors->first('tab_name') == 'departments') show active @endif"
                                        id="departments">

                                        <div class="main_bx_dt__">
                                            <div class="top_dt_sec">
                                                <div class="row" id="departmentsDivValidation">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 mt-3 mt-sm-0">
                                                            <label class="form-label"> Department</label>
                                                            <select data-plugin="customselect" id="selectDepartment"
                                                                class="form-select required_fields">
                                                                <option value="0">Please select one or start typing
                                                                </option>
                                                                @if ($departments)
                                                                    @foreach ($departments as $department)
                                                                        <option value="{{ $department->id }}">
                                                                            {{ $department->name }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <span id="selectDepartmentError" class="text-danger" hidden>This
                                                                field is required.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 align-self-center">
                                                        <button type="button"
                                                            onclick="addDepartment('selectDepartment','departmentsDivValidation')"
                                                            class="theme_btn btn add_btn portfolio_add_btn"
                                                            id="add_department_btn">+ Add Department</button>
                                                    </div>
                                                    <div class="col-lg-12 add_department_table mt-3">
                                                        <table class="table table-bordered  dt-responsive nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Department</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="add_department_table">
                                                                @if (old('department') && !empty(old('department')))
                                                                    @php
                                                                        $newDepartment = array_column(
                                                                            $departments->toArray(),
                                                                            'name',
                                                                            'id',
                                                                        );
                                                                    @endphp
                                                                    @foreach (old('department') as $kk => $depart)
                                                                        <tr
                                                                            id="department{{ $kk }}{{ time() }}">
                                                                            <td><input hidden name="department[]"
                                                                                    value="{{ $depart }}">{{ $newDepartment[$depart] }}
                                                                            </td>
                                                                            <td> <button style="border: none;background: none;"
                                                                                    type="button"
                                                                                    onclick="deleteTabletr('department{{ $kk }}{{ time() }}')"><span
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
                                                        <label class="form-label">Type of Document <span
                                                                class="text-danger">*</span></label>
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
                                                        <span id="document_typeError" class="text-danger" hidden>This
                                                            field is required.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="reference_number">Reference Number
                                                            <span class="red">*</span></label>
                                                        <input type="text" class="form-control required_fields"
                                                            id="reference_number" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        <span id="reference_numberError" class="text-danger" hidden>This
                                                            field is required.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="expireDate">Expire Date <span
                                                                class="red">*</span></label>
                                                        <input type="text" type="text"
                                                            class="form-control basic-datepicker required_fields"
                                                            id="expireDate" aria-describedby="emailHelp" placeholder="">
                                                        <span id="expireDateError" class="text-danger" hidden>This field
                                                            is required.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12" id="documentFilesDocs">
                                                    <div class="mb-3" id="documentFilesDocsDiv1">
                                                        <input id="documentFiles1" name="documentImages[]" type="file"
                                                            class="dropify required_fields" data-height="100" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 text-end">
                                                    <button type="button" onclick="addDocument('documents_upload_data1')"
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
                                                                <th>Document Name</th>
                                                                <th>Type of Document</th>
                                                                <th>Reference Number</th>
                                                                <th>Expire Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_document_box">


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                {{-- <div class="tab-pane @if ($errors->first('tab_name') == 'access') show active @endif" id="access">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Team Player Type</label>
                                                    <select data-plugin="customselect" id="teamPlayerType" name="team_player_role" class="form-select">
                                                        <option value="staff">Staff</option>
                                                        <option value="person">Person</option>
                                                        <option value="cleaner">Cleaner</option>
                                                    </select>
                                                    @error('team_player_role')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3" id="teamPlayerRoleDiv">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Team Player Role</label>
                                                    <select data-plugin="customselect" id="teamPlayerRole" name="team_player_mainrole" class="form-select">
                                                        <option value="0">Please select one or start typing</option>
                                                        @if ($allroles)
                                                            @foreach ($allroles as $role)
                                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('team_player_role')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="userPassword">Password</label>
                                                    <input type="password" class="form-control" name="password" id="userPassword" aria-describedby="emailHelp" placeholder="">
                                                    @error('password')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label class="form-label" for="userPassword_confirmation">Confirm Password</label>
                                                    <input type="password" class="form-control" id="userPassword_confirmation" name="password_confirmation" aria-describedby="emailHelp" placeholder="">
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4" id="divmultipalshift">
                                                <div class="mb-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="check1">
                                                            <input type="checkbox" class="form-check-input" id="is_multipal_shift" name="is_multipal_shift" value="1">Is Multiple Shift Create
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- main_bx_dt -->
                            </div> --}}

                                <div class="tab-pane @if ($errors->first('tab_name') == 'request-document') show active @endif"
                                    id="request-document">

                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec pt-0">
                                            <div class="row align-items-center" id="requestDocumentDivValidation">
                                                <div class="col-lg-12">
                                                    <div class="title_head">
                                                        <h4>Request for a Document</h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Document Type</label>
                                                        <select data-plugin="customselect" id="request_document_type"
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
                                                        <span id="request_document_typeError" class="text-danger"
                                                            hidden>This field is required.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="button"
                                                        onclick="addRequestDocument('requestDocumentDivValidation')"
                                                        class="theme_btn btn add_btn portfolio_add_btn">Request
                                                        Document</button>
                                                </div>
                                                <div class="col-lg-12 mt-3" style="">
                                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                                        <thead>
                                                            <tr>
                                                                <th>Type of Document</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="add_requestdocument_box">
                                                            @if (old('request_document_type'))
                                                                @foreach (old('request_document_type') as $kk => $reqfile)
                                                                    <tr
                                                                        id="docusReq{{ $kk }}{{ time() }}">
                                                                        <td>
                                                                            <input type="hidden"
                                                                                name="request_document_type[]"
                                                                                value="{{ $reqfile }}">
                                                                            {{ $reqfile }}
                                                                        </td>
                                                                        <td>
                                                                            <button style="border: none;background: none;"
                                                                                type="button"
                                                                                onclick="deleteTabletr('docusReq{{ $kk }}{{ time() }}')">
                                                                                <span
                                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                                    <i class="uil-trash"></i>
                                                                                </span>
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
                                    <!-- main_bx_dt -->
                                </div>
                            </div>
                            <div class="bottom_footer_dt">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="action_btns">
                                            <button type="button" onclick="validateForm(this,'myForm')" id="myFormBtn"
                                                class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                                            <a href="{{ route('hr.team-player.index') }}"
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
        <!-- end row -->

    </div>
    <!-- container -->

    @push('push_script')
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> --}}
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $(document).ready(function() {
                // $('#add_address_trfields').hide();
                $('.add_document_table').hide();
                // $('#add_contractor_table').hide();
                $("#divmultipalshift").hide();
                // $("#add_department_table").hide();
            });

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
        </script>

        @can('contractors-create')
            <script>
                function addContractor(that, divID) {
                    if (validateFormByDiv(divID)) {
                        let contractor = $(`#${that}`).val();
                        let contractor_text = $(`#${that} option:selected`).text();

                        $(".custom_error").remove();
                        $("#selectContractor").next('.select2-container').find('.select2-selection').removeClass('invalid-select');
                        if (!contractor || contractor.trim() == "" || contractor.trim() == "0") {
                            $("#selectContractor").next('.select2-container').find('.select2-selection').addClass('invalid-select');
                            $("#selectContractor").next('span').after(
                                '<span class="custom_error text-danger">This field is required.</span>');
                        } else {
                            let exists = false;
                            $(".contractorTableClass input[type='hidden']").each(function() {
                                if (this.value === contractor) {
                                    exists = true;
                                }
                            });
                            if (exists) {
                                $("#selectContractor").next('.select2-container').find('.select2-selection').addClass(
                                    'invalid-select');
                                $("#selectContractor").next('span').after(
                                    '<span class="custom_error text-danger">Already added in list.</span>');
                            } else {

                                let microtime = Date.now();
                                let contractortr = `<tr class="contractorTableClass" id="contractor${microtime}">
                        <td><input type="hidden" name="contractor[]" value="${contractor}"> ${contractor_text}</td>
                        <td> <button style="border: none;background: none;" type="button" onclick="deleteTabletr('contractor${microtime}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></button></td>
                    </tr>`;
                                $("#add_contractor_table").append(contractortr);
                                $("#add_contractor_table").show();
                                $("#selectContractor").val(0).trigger('change');
                            }
                        }
                    }
                }
            </script>
        @endcan

        @can('department-add')
            <script>
                function addDepartment(that, divID) {
                    if (validateFormByDiv(divID)) {
                        let department = $(`#${that}`).val();
                        let department_text = $(`#${that} option:selected`).text();
                        $(".custom_error").remove();
                        $("#selectDepartment").next('.select2-container').find('.select2-selection').removeClass('invalid-select');
                        if (!department || department.trim() == "" || department.trim() == "0") {
                            $("#selectDepartment").next('.select2-container').find('.select2-selection').addClass('invalid-select');
                            $("#selectDepartment").next('span').after(
                                '<span class="custom_error text-danger">This field is required.</span>');
                        } else {

                            let exists = false;
                            $(".departmentTblClass input[type='hidden']").each(function() {
                                if (this.value === department) {
                                    exists = true;
                                }
                            });
                            if (exists) {
                                $("#selectDepartment").next('.select2-container').find('.select2-selection').addClass(
                                    'invalid-select');
                                $("#selectDepartment").next('span').after(
                                    '<span class="custom_error text-danger">Already added in list.</span>');
                            } else {

                                let microtime = Date.now();
                                let departmenttr = `<tr class="departmentTblClass" id="department${microtime}">
                        <td><input type='hidden' name="department[]" value="${department}"> ${department_text}</td>
                        <td> <button style="border: none;background: none;" type="button" onclick="deleteTabletr('department${microtime}')"><span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></span></button></td>
                    </tr>`;
                                $("#add_department_table").append(departmenttr);
                                $("#add_department_table").show();
                                $("#selectDepartment").val(0).trigger('change');
                            }
                        }
                    }
                }
            </script>
        @endcan

        <script>
            function addNewAddress(divId) {
                if (validateFormByDiv(divId)) {
                    let addressUnit = $("#addressUnit").val();
                    let addressNumber = $("#addressNumber").val();
                    let streetAddress = $("#streetAddress").val();
                    let addressSuburb = $("#addressSuburb").val();
                    let addressCity = $("#addressCity").val();
                    let addressCityText = addressCity != 0 ? $("#addressCity option:selected").text() :'';
                    let addressState = $("#addressState").val();
                    let addressStateText = addressState != 0  ? $("#addressState option:selected").text() : ''; 
                    let addressZipCode = $("#addressZipCode").val();
                    let addressPOBox = $("#addressPOBox").val();
                    let mainAddress = 0;
                    if ($('#mainAddress').is(":checked")) {
                        mainAddress = 1;
                    }
                    let mailAddress = 0;
                    if ($('#mailAddress').is(":checked")) {
                        mailAddress = 1;
                    }
                    let isValid = 1;
                    $(".custom_error").remove();
                    $("#addressNumber").removeClass('is-invalid');
                    $("#streetAddress").removeClass('is-invalid');
                    $("#addressSuburb").removeClass('is-invalid');
                    $("#addressZipCode").removeClass('is-invalid');
                    // $("#importedAddress").removeClass('is-invalid');
                    if (addressNumber.trim() == '') {
                        $("#addressNumber").addClass('is-invalid');
                        $("#addressNumber").after('<span class="custom_error text-danger">This field is required.</span>');
                        isValid = 0;
                    }
                    if (streetAddress.trim() == '') {
                        $("#streetAddress").addClass('is-invalid');
                        $("#streetAddress").after('<span class="custom_error text-danger">This field is required.</span>');
                        isValid = 0;
                    }
                    if (addressSuburb.trim() == '') {
                        $("#addressSuburb").addClass('is-invalid');
                        $("#addressSuburb").after('<span class="custom_error text-danger">This field is required.</span>');
                        isValid = 0;
                    }
                    if (addressZipCode.trim() == '') {
                        $("#addressZipCode").addClass('is-invalid');
                        $("#addressZipCode").after('<span class="custom_error text-danger">This field is required.</span>');
                        isValid = 0;
                    }

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
                        <input name="po_box[]" hidden value="${addressPOBox}">
                        <input name="is_main_address[]" hidden value="${mainAddress}">
                        <input name="is_mail_address[]" hidden value="${mailAddress}">
                        <input name="imported_address[]" hidden value="">
                        ${addressUnit} ${addressNumber} ${streetAddress}, ${addressSuburb} ${addressCityText} ${addressStateText} ${addressZipCode}</td>
                        <td>${addressPOBox}</td>
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
                $("#addressPOBox").val('');
            }

            var filenumber = 1;

            function addDocument(divId) {
                if (validateFormByDiv(divId)) {
                    let document_type = $("#document_type").val();
                    let document_type_text = $("#document_type option:selected").text();
                    let reference_number = $("#reference_number").val();
                    let expireDate = $("#expireDate").val();
                    var documentFile = $(`#documentFiles${filenumber}`)[0].files[0];
                    let isValid = 1;
                    $(".custom_error").remove();
                    $("#document_type").next('.select2-container').find('.select2-selection').removeClass('invalid-select');
                    $("#reference_number").removeClass('is-invalid');
                    $("#expireDate").removeClass('is-invalid');
                    if (document_type == "0" || document_type == "") {
                        $("#document_type").next('.select2-container').find('.select2-selection').addClass('invalid-select');
                        $("#document_type").next('span').after(
                            '<span class="custom_error text-danger">This field is required.</span>');
                        isValid = 0;
                    }
                    if (reference_number == "") {
                        $("#reference_number").addClass('is-invalid');
                        $("#reference_number").after('<span class="custom_error text-danger">This field is required.</span>');
                        isValid = 0;
                    }

                    if (expireDate == "") {
                        $("#expireDate").addClass('is-invalid');
                        $("#expireDate").after('<span class="custom_error text-danger">This field is required.</span>');
                        isValid = 0;
                    }


                    if (documentFile == "" || documentFile == undefined) {
                        $(`#documentFiles${filenumber}`).closest('.dropify-wrapper').addClass('invalid-select');
                        $(`#documentFiles${filenumber}`).closest('.dropify-wrapper').after(
                            '<span class="custom_error text-danger">This field is required.</span>');
                        isValid = 0;
                    } else {
                        $(`#documentFiles${filenumber}`).closest('.dropify-wrapper').removeClass('invalid-select');
                    }

                    if (isValid) {
                        // $("#document_type").find('option:selected').remove();
                        let exists = false;
                        $(".documnetVTblClass input[name='document_type[]']").each(function() {
                            if ($(this).val() === document_type) {
                                exists = true;
                            }
                        });
                        if (exists) {
                            $("#document_type").next('.select2-container').find('.select2-selection').addClass(
                                'invalid-select');
                            $("#document_type").next('span').after(
                                '<span class="custom_error text-danger">Already added in list.</span>');
                        } else {
                            if (documentFile) {
                                $(`#documentFiles${filenumber}`).removeClass('required_fields');
                                $(`#documentFilesDocsDiv${filenumber}`).hide();
                                filenumber += 1;
                                var $newFileInput = $(
                                    `<div class="mb-3" id="documentFilesDocsDiv${filenumber}"><input id="documentFiles${filenumber}" name="documentImages[]" type="file" class="dropify required_fields" data-height="100" /></div>`
                                );
                                $('#documentFilesDocs').append($newFileInput);
                                $('.dropify').dropify();
                            }
                            // $(`#document_type`).find('option:selected').remove();
                            $("#document_typeError").attr('hidden', true);
                            $("#reference_numberError").attr('hidden', true);
                            $("#expireDateError").attr('hidden', true);
                            if (document_type.trim() == '') {
                                $("#document_typeError").attr('hidden', false);
                            } else if (reference_number.trim() == '') {
                                $("#reference_numberError").attr('hidden', false);
                            } else if (expireDate.trim() == '') {
                                $("#expireDateError").attr('hidden', false);
                            } else {
                                let timestamp = Date.now();
                                let documentHtml = `<tr class="documnetVTblClass" id="docus${timestamp}">
                            <td>
                                <input type="hidden" name="document_type[]" value="${document_type}">
                                <input type="hidden" name="reference_number[]" value="${reference_number}">
                                <input type="hidden" name="expireDate[]" value="${expireDate}">
                                ${documentFile.name}
                            </td>
                            <td id="optionData" data-value="${document_type}">${document_type_text}</td>
                            <td>${reference_number}</td>
                            <td>${expireDate}</td>
                            <td>
                                <button style="border: none;background: none;" type="button" onclick="deleteTabletr('docus${timestamp}',${filenumber-1})">
                                    <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                        <i class="uil-trash"></i>
                                    </span>
                                </button>
                            </td>
                        </tr>`;
                                $("#add_document_box").append(documentHtml);
                                resetDocument(filenumber);
                                // addToTableAndRemoveFromSelect('document_type');
                            }
                        }
                    }
                }
            }

            function addRequestDocument(divId) {
                if (validateFormByDiv(divId)) {
                    let request_document_type = $("#request_document_type").val();


                    let exists = false;
                    $(".custom_error").remove();
                    $("#request_document_type").next('.select2-container').find('.select2-selection').removeClass(
                        'invalid-select');
                    if (!request_document_type || request_document_type.trim() == "" || request_document_type.trim() == "0") {
                        $("#request_document_type").next('.select2-container').find('.select2-selection').addClass(
                            'invalid-select');
                        $("#request_document_type").next('span').after(
                            '<span class="custom_error text-danger">This field is required.</span>');
                    } else {
                        let timestamp = Date.now();


                        $(".docusReqclasss input[type='hidden']").each(function() {
                            if (this.value === request_document_type) {
                                exists = true;
                            }
                        });
                        if (exists) {
                            $("#request_document_type").next('.select2-container').find('.select2-selection').addClass(
                                'invalid-select');
                            $("#request_document_type").next('span').after(
                                '<span class="custom_error text-danger">Already added in list.</span>');
                        } else {
                            let documentHtml = `<tr class="docusReqclasss" id="docusReq${timestamp}">
                        <td>
                            <input type="hidden" name="request_document_type[]" value="${request_document_type}">
                            ${request_document_type}
                        </td>
                        <td>
                            <button style="border: none;background: none;" type="button" onclick="deleteTabletr('docusReq${timestamp}')">
                                <span class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                    <i class="uil-trash"></i>
                                </span>
                            </button>
                        </td>
                    </tr>`;
                            $("#add_requestdocument_box").append(documentHtml);
                            resetRequestDocument();
                        }
                    }
                }
            }

            function resetDocument(filenumberS) {
                $("#document_type").val('0').trigger('change');
                $("#reference_number").val('');
                $("#expireDate").val('');
                $("#documentFile").val('');
                if (filenumberS) $(`#documentFiles${filenumberS}`).parent().find(".dropify-clear").trigger('click');
                else $(`#documentFiles${filenumber}`).parent().find(".dropify-clear").trigger('click');

            }

            function resetRequestDocument() {
                $("#request_document_type").val('0').trigger('change');
            }

            $("#teamPlayerType").change(function(e) {
                let selectedRole = $(this).val();
                $("#is_multipal_shift").attr('checked', false);
                // $("#teamPlayerRoleDiv").show();
                if (selectedRole == 'cleaner') {
                    // $("#teamPlayerRoleDiv").hide();
                    $("#divmultipalshift").show();
                } else {
                    // $("#teamPlayerRoleDiv").show();
                    $("#divmultipalshift").hide();
                }
            });


            $(".dobdatefield").flatpickr({
                "maxDate": "today"
            });

        </script>
        @include('common.footer_validation', ['validate_url_path' => 'hr.user.unique'])
    @endpush
@endsection
