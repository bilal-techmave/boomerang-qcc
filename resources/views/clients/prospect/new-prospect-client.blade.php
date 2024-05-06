@extends('layouts.main')
@section('app-title', 'Create Prospect Client - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Create Prospect Client</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Create Prospect Client</li>
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
                        <form action="{{ route('client.prospect.store') }}" id="myForm" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="main_bx_dt__">
                                <div class="top_dt_sec new_prospect">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="">
                                                <label class="form-label" for="exampleInputEmail1">Business Name <span
                                                        class="red">*</span></label>
                                                <input required type="text" class="form-control"
                                                    oninput="checkUniqueData(this,'business_name')" name="business_name"
                                                    value="{{ old('business_name') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="">
                                                <label class="form-label" for="exampleInputEmail1">ABN <span
                                                        class="red">*</span></label>
                                                <input required type="text" class="form-control"
                                                    oninput="checkUniqueData(this,'abn')" name="abn"
                                                    value="{{ old('abn') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="">
                                                <label class="form-label" for="exampleInputEmail1">ACN</label>
                                                <input type="text" class="form-control" name="acn"
                                                    value="{{ old('acn') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>


                                        <div class="col-lg-12 mt-2 mb-2">
                                            <hr>
                                        </div>


                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Unit </label>
                                                <input type="text" class="form-control" name="unit"
                                                    value="{{ old('unit') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Address Number <span
                                                        class="red">*</span></label>
                                                <input type="text" required class="form-control" name="address_number"
                                                    value="{{ old('address_number') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Street Address <span
                                                        class="red">*</span></label>
                                                <input type="text" required class="form-control" name="street_address"
                                                    value="{{ old('street_address') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Suburb <span
                                                        class="red">*</span></label>
                                                <input type="text" required class="form-control" name="suburb"
                                                    value="{{ old('suburb') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3 mt-3 mt-sm-0">
                                                <label class="form-label">City </label>
                                                <select data-plugin="customselect" class="form-select" name="city_id">
                                                    <option value="0">Please select one or start typing</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}"
                                                            {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                            {{ $city->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3 mt-3 mt-sm-0">
                                                <label class="form-label">State</label>
                                                <select data-plugin="customselect" class="form-select" name="state_id">
                                                    <option value="0">Please select one or start typing</option>
                                                    @foreach ($states as $state)
                                                        <option value="{{ $state->id }}"
                                                            {{ old('state_id') == $state->id ? 'selected' : '' }}>
                                                            {{ $state->state_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Zip Code <span
                                                        class="red">*</span></label>
                                                <input type="text" required class="form-control" minlength="3"
                                                    name="zipcode" value="{{ old('zipcode') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="" maxlength="8">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <hr>
                                        </div>


                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contact Name <span
                                                        class="red">*</span></label>
                                                <input type="text" required class="form-control" name="contact_name"
                                                    value="{{ old('contact_name') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">

                                                @error('phone_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contact Surname <span
                                                        class="red">*</span></label>
                                                <input type="text" required class="form-control"
                                                    name="contact_surname" value="{{ old('contact_surname') }}"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contact Email <span
                                                        class="red">*</span></label>
                                                <input type="email" required class="form-control" name="contact_email"
                                                    value="{{ old('contact_email') }}" id="exampleInputEmail1"
                                                    aria-describedby="emailHelp" placeholder="">
                                                @error('contact_email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Phone Number <span
                                                        class="red">*</span></label>
                                                <input type="text" minlength="8" maxlength="15" required
                                                    class="form-control phoneValid" name="phone_number"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                @error('phone_number')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contact Type <span
                                                        class="red">*</span></label>
                                                <select required data-plugin="customselect" class="form-select"
                                                    name="contact_type">
                                                    <option value="0">Please select one or start typing</option>
                                                    <option value="manager"
                                                        {{ old('contact_type') == 'manager' ? 'selected' : '' }}>Manager
                                                    </option>
                                                    <option
                                                        value="accounts"{{ old('contact_type') == 'accounts' ? 'selected' : '' }}>
                                                        Accounts</option>
                                                    <option
                                                        value="supervisor"{{ old('contact_type') == 'supervisor' ? 'selected' : '' }}>
                                                        Supervisor</option>
                                                    <option
                                                        value="site_manager"{{ old('contact_type') == 'site_manager' ? 'selected' : '' }}>
                                                        Site Manager</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-2">
                                            <hr>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Contacted By <span
                                                        class="red">*</span></label>
                                                <select required data-plugin="customselect" class="form-select"
                                                    name="contacted_by">
                                                    <option value="0">Please select one or start typing</option>
                                                    <option
                                                        value="meeting"{{ old('contacted_by') == 'meeting' ? 'selected' : '' }}>
                                                        Meeting</option>
                                                    <option
                                                        value="phone_call"{{ old('contacted_by') == 'phone_call' ? 'selected' : '' }}>
                                                        Phone Call</option>
                                                    <option
                                                        value="email"{{ old('contacted_by') == 'email' ? 'selected' : '' }}>
                                                        Email</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Client Entry Point
                                                    <span class="red">*</span></label>
                                                <select required data-plugin="customselect" class="form-select"
                                                    id="client_entry_point" name="client_entry_point">
                                                    <option value="0">Please select one or start typing</option>
                                                    <option value="search_Engine">Search Engine</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Linkedin">Linkedin</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Post_Social_Media">Post Social Media</option>
                                                    <option value="Radio">Radio</option>
                                                    <option value="TV">TV</option>
                                                    <option value="Print">Print</option>
                                                    <option value="Word of Mouth">Word of Mouth</option>
                                                    <option value="other">Other* Please describe in the comments.
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="client_entry_point_other"
                                            class="col-lg-3 {{ old('client_entry_point') == 'other' ? 'd-block' : 'd-none' }}">
                                            <div class="mb-3">
                                                <label class="form-label">Describe here ..
                                                </label>
                                                <input name="client_entry_point_other"
                                                    class="form-control">{{ old('client_entry_point_other') }}</input>
                                            </div>
                                        </div>



                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Notes </label>
                                                <textarea name="notes" class="form-control">{{ old('notes') }}</textarea>
                                            </div>

                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Upload File</label>
                                                <input name="file" type="file" class="dropify"
                                                    data-height="100" />
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                {{-- <a href="javascript:void(0)" class="theme_btn btn save_btn"><i
                                                    class="bi bi-save"></i> Save</a> --}}
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    class="theme_btn btn save_btn"><i class="bi bi-save"></i>
                                                    Save</button>
                                                <a href="{{ route('client.prospect.index') }}"
                                                    class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- main_bx_dt -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('push_script')
    @include('common.footer_validation', ['validate_url_path' => 'client.prospect.unique'])
    <script>
        $("#client_entry_point").change(function() {
            if ($(this).val() == "other") $("#client_entry_point_other").removeClass("d-none");
            else $("#client_entry_point_other").addClass("d-none");
        });
    </script>
@endpush
