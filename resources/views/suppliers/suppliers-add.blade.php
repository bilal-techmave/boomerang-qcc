@extends('layouts.main')
@section('app-title', 'Add Supplier - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Supplier</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Supplier</li>
                            <li class="breadcrumb-item active">Add Supplier</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @php
            $newalluser = $alluser->keyBy('id');
        @endphp
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('supplier.suppliers.store') }}" method="POST" id="myForm">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Name <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control" required name="name"
                                            value="{{ old('name') }}" oninput="checkUniqueData(this,'name')" id="exampleInputEmail1" aria-describedby="emailHelp"
                                            placeholder="Name">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">ABN <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control" required name="abn"
                                            id="exampleInputEmail1" oninput="checkUniqueData(this,'abn')" aria-describedby="emailHelp" placeholder="">
                                        @error('abn')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Phone Number <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control phoneValid" name="phone_number" required
                                            value="{{ old('phone_number') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder=""
                                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Second Number </label>
                                        <input type="text" class="form-control phoneValid" name="alt_phone_number"
                                            value="{{ old('alt_phone_number') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder=""
                                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        @error('alt_phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Fax Number </label>
                                        <input type="text" class="form-control" name="fax_number"
                                            value="{{ old('fax_number') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('fax_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Unit</label>
                                        <input type="text" class="form-control" name="unit"
                                            value="{{ old('unit') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('unit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Address Number <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control" name="address_number" required
                                            value="{{ old('address_number') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('address_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Street Address <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control" name="street_address" required
                                            value="{{ old('street_address') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('street_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">ZipCode <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control" name="zipcode" required
                                            value="{{ old('zipcode') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('zipcode')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Suburb <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control" name="suburb" required
                                            value="{{ old('suburb') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('suburb')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">City </label>
                                        <select data-plugin="customselect" name="city" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ old('city') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @error('city')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">State </label>
                                        <select data-plugin="customselect" name="state" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ old('state') == $state->id ? 'selected' : '' }}>
                                                    {{ $state->state_name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @error('state')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Email <span
                                                class="red">*</span></label>
                                        <input type="email" class="form-control" name="email" required
                                            value="{{ old('email') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Website </label>
                                        <input type="text" class="form-control" name="website"
                                            value="{{ old('website') }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                        @error('website')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Notes </label>
                                        <textarea  name="notes" class="form-control">{{ old('notes') }}</textarea>
                                        @error('notes')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="title_head">
                                        <h4>Contact Details</h4>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="add_address">
                                        <a href="#" class="theme_btn btn add_btn " data-bs-toggle="modal"
                                            data-bs-target="#contact-details">+ Add Existing Contact</a>
                                        <a href="#" class="theme_btn btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#create_contact_modal">+ Create contact</a>
                                    </div>
                                </div>
                                <div class="col-lg-12  mt-3">
                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone Number</th>
                                                <th>Email</th>
                                                <th>Contact Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="user_data" id="user_data">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="title_head">
                                        <h4>Financial Information</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="add_address">
                                        <a href="#" class="theme_btn btn add_btn " data-bs-toggle="modal"
                                            data-bs-target="#financial-info">+ New Financial Information</a>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <table class="table table-bordered  dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Payment Type</th>
                                                <th>Cheque Name</th>
                                                <th>Account Name</th>
                                                <th>Branch/Route</th>
                                                <th>Account Number</th>
                                                <th>Biller Code</th>
                                                <th>Reference (CNR)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="financial_infoData">


                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="action_btns">
                                        <button type="button" onclick="validateForm(this,'myForm')"
                                            class="theme_btn btn save_btn">
                                            <i class="bi bi-save"></i> Save
                                        </button>
                                        <a href="{{ route('supplier.suppliers.index') }}"
                                            class="theme_btn btn-primary btn">
                                            <i class="uil-list-ul"></i> List
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="create_contact_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <form id="" method="POST"> </form> --}}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new Person as Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="craeteContactValidateContact">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personName">Name <span class="red">*</span></label>
                                <input type="text" class="form-control required_fields" id="personName" aria-describedby="emailHelp"
                                    placeholder="">
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
                                <input type="email" class="form-control required_fields" id="personEmail" aria-describedby="emailHelp"
                                    placeholder="">
                                <span class="text-danger" hidden id="personEmailError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="personPhoneNumber">Phone Number <span
                                        class="red">*</span></label>
                                <input type="text" class="form-control required_fields" id="personPhoneNumber"
                                    aria-describedby="emailHelp" placeholder=""
                                    onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                <span class="text-danger" hidden id="personPhoneNumberError"># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label" for="personContactType">Contact Type</label>
                                <select class="form-select required_fields js-example-basic-single" id="personContactType">
                                    <option value="0">Please select one or start typing</option>
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



    <!-- Modal -->
    <div class="modal fade" id="contact-details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Existing Person Into Contacts</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="contactValidateContact">
                        <div class="col-lg-12">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label">Contact</label>
                                <select class="form-select required_fields js-example-basic-single5" id="user_value">
                                    <option value="0">Please select one or start typing</option>
                                    @if ($alluser)
                                        @foreach ($alluser as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}
                                                ({{ $user->email }})
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label">Contact Type</label>
                                <select class="form-select required_fields js-example-basic-single5" id="contact_type">
                                    <option value="0">Please select one or start typing</option>
                                    <option value="manager">Manager</option>
                                    <option value="accounts">Accounts</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="site-manager">Site Manager</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_contact_btn">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="financial-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Financial Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="financialtValidateContact">
                        <div class="col-lg-12">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label">Payment Type</label>
                                <select class="form-select payment_type js-example-basic-single4 required_fields" id="payment_type">
                                    <option value="0">Please select one</option>
                                    <option value="Electronic">Direct Payment / Electronic</option>
                                    <option value="Cheque">Cheque, Payable for</option>
                                    <option value="BPAY">BPAY</option>
                                </select>
                                <span id="payment_typeError" class="text-danger" hidden># Required</span>
                            </div>
                        </div>
                        <div class="col-lg-12 direct-payment">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="accountName">Account Name <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control required_fields" id="accountName"
                                            aria-describedby="emailHelp" placeholder="">
                                        <span id="accountNameError" class="text-danger" hidden># Required</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="branchRoute">Branch/Route <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control required_fields" id="branchRoute"
                                            aria-describedby="emailHelp" placeholder="">
                                        <span id="branchRouteError" class="text-danger" hidden># Required</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="accountNumber">Account Number <span
                                                class="red">*</span></label>
                                        <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control required_fields" id="accountNumber"
                                            aria-describedby="emailHelp" placeholder="">
                                        <span id="accountNumberError" class="text-danger" hidden># Required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 bpay">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="billerCode">Biller Code <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control required_fields" id="billerCode"
                                            aria-describedby="emailHelp" placeholder="">
                                        <span id="billerCodeError" class="text-danger" hidden># Required</span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="refernceCNR">Reference (CNR) <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control required_fields" id="refernceCNR"
                                            aria-describedby="emailHelp" placeholder="">
                                        <span id="refernceCNRError" class="text-danger" hidden># Required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 cheque-payable">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="chequeName">Cheque Name <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control required_fields" id="chequeName"
                                            aria-describedby="emailHelp" placeholder="">
                                        <span id="chequeNameError" class="text-danger" hidden># Required</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_contact_btn_financial">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endsection
@push('push_script')


    <script>
        $('.js-example-basic-single4').select2({
            dropdownParent: $('#financial-info')
        });

        $('.js-example-basic-single5').select2({
            dropdownParent: $('#contact-details')
        });


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
            if (validateFormByDiv('contactValidateContact')) {
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
                $("#user_data").append(rowHtml);
                resetContact();
            }
        });


        $('#add_contact_btn_financial').click(function() {
            if (validateFormByDiv('financialtValidateContact')) {
                let payment_type = $("#payment_type").val();
                let accountName = $("#accountName").val();
                let branchRoute = $("#branchRoute").val();
                let accountNumber = $("#accountNumber").val();
                let billerCode = $("#billerCode").val();
                let refernceCNR = $("#refernceCNR").val();
                let chequeName = $("#chequeName").val();

                if (!payment_type || payment_type == "0") {
                    $("#payment_typeError").attr('hidden', false);
                    return false;
                }

                $("#accountNameError").attr('hidden', true);
                $("#branchRouteError").attr('hidden', true);
                $("#accountNumberError").attr('hidden', true);
                $("#chequeNameError").attr('hidden', true);
                $("#billerCodeError").attr('hidden', true);
                $("#refernceCNRError").attr('hidden', true);

                let isValid = 0;

                if (payment_type == "Electronic") {
                    if (!accountName || accountName == "") {
                        $("#accountNameError").attr('hidden', false);
                    }
                    if (!branchRoute || branchRoute == "") {
                        $("#branchRouteError").attr('hidden', false);
                    }
                    if (!accountNumber || accountNumber == "") {
                        $("#accountNumberError").attr('hidden', false);
                    }
                    if (accountName && branchRoute && accountNumber) {
                        isValid = 1;
                    }
                }

                if (payment_type == "Cheque") {
                    if (!chequeName || chequeName == "") {
                        $("#chequeNameError").attr('hidden', false);
                    } else {
                        isValid = 1;
                    }
                }

                if (payment_type == "BPAY") {
                    if (!billerCode || billerCode == "") {
                        $("#billerCodeError").attr('hidden', false);
                    }
                    if (!refernceCNR || refernceCNR == "") {
                        $("#refernceCNRError").attr('hidden', false);
                    }

                    if (billerCode && refernceCNR) {
                        isValid = 1;
                    }
                }
                if (isValid) {
                    let microtime = Date.now();
                    let financialHtml = `<tr id="finacialsup${microtime}">
                                    <td>
                                        <input type="hidden" name="payment_type[]"  value="${payment_type}" />
                                        <input type="hidden" name="chequeName[]"  value="${chequeName}" />
                                        <input type="hidden" name="accountName[]"  value="${accountName}" />
                                        <input type="hidden" name="branchRoute[]"  value="${branchRoute}" />
                                        <input type="hidden" name="accountNumber[]"  value="${accountNumber}" />
                                        <input type="hidden" name="billerCode[]"  value="${billerCode}" />
                                        <input type="hidden" name="refernceCNR[]"  value="${refernceCNR}" />
                                        ${payment_type}</td>
                                    <td>${chequeName}</td>
                                    <td>${accountName}</td>
                                    <td>${branchRoute}</td>
                                    <td>${accountNumber}</td>
                                    <td>${billerCode}</td>
                                    <td>${refernceCNR}</td>
                                    <td>
                                        <button onclick="deleteTabletr('finacialsup${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                        class="uil-trash"></i></button>
                                    </td>
                                </tr>`;

                    $("#financial_infoData").append(financialHtml);
                    $("#financial-info").modal('hide');
                    $("#payment_type").val('0').trigger('change');
                    resetFinancial();
                }
            }


        });

        function resetFinancial() {
            $("#accountName").val('').removeClass('required_fields');
            $("#branchRoute").val('').removeClass('required_fields');
            $("#accountNumber").val('').removeClass('required_fields');
            $("#billerCode").val('').removeClass('required_fields');
            $("#refernceCNR").val('').removeClass('required_fields');
            $("#chequeName").val('').removeClass('required_fields');
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
    </script>

    <script>
        $(document).ready(function() {
            $('.payment_type').on('change', function() {
                resetFinancial();
                if ($(this).val() == 'Electronic') {
                    $('.direct-payment').show();
                    $('.direct-payment input').addClass('required_fields');
                    $('.bpay').hide();
                    $('.cheque-payable').hide();
                } else if ($(this).val() == 'Cheque') {
                    $('.direct-payment').hide();
                    $('.bpay').hide();
                    $('.cheque-payable').show();
                    $('.cheque-payable input').addClass('required_fields');
                } else if ($(this).val() == 'BPAY') {
                    $('.direct-payment').hide();
                    $('.bpay').show();
                    $('.cheque-payable').hide();
                    $('.bpay input').addClass('required_fields');
                } else if ($(this).val() == '0') {
                    $('.direct-payment').hide();
                    $('.bpay').hide();
                    $('.cheque-payable').hide();
                }
            })
        });

        $("#create_contant").click(function() {
            if (validateFormByDiv('craeteContactValidateContact')) {
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
                            $('#create_contact_modal').modal('hide');
                        }
                    });
                }
            }
        });


        var isValid = true;
        var ajaxCheck = true;

        function validateForm(that, formId) {
            buttonLoading(that);
            $('.select2-selection').removeClass('invalid-select');
            $(".custom_error").remove();
            $(`#${formId} [required]`).each(function() {
                $(this).closest('.dropify-wrapper').removeClass('invalid-select');
                if ($(this).is(':file') && !$(this)[0].files.length) {
                    isValid = false;
                    $(this).closest('.dropify-wrapper').addClass('invalid-select');
                    $(this).closest('.dropify-wrapper').after(
                        '<span class="custom_error text-danger">This field is required.</span>');

                    $(this).focus();
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                } else if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() ==
                        0))) {
                    isValid = false;
                    $(this).addClass('is-invalid');
                    if ($(this).is('select')) {
                        $(this).next('.select2-container').find('.select2-selection').addClass('invalid-select');
                        $(this).next('span').after(
                            '<span class="custom_error text-danger">This field is required.</span>');
                    } else {
                        $(this).after('<span class="custom_error text-danger">This field is required.</span>');
                        $(this).next('.select2-container').find('.select2-selection').removeClass('invalid-select');
                    }
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');

                    // $(this).css('invalid-select');
                    $(this).focus();
                } else {
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                    $(this).focus();
                    $(this).removeClass('is-invalid');
                }
            });
            // Additional validation for email
            let emailInput = $(`#${formId} [type="email"]`);
            let emailValue = emailInput.val();
            if (emailValue && !isValidEmail(emailValue)) {
                isValid = false;
                emailInput.addClass('is-invalid');
                emailInput.focus();
                // Add error message span
                emailInput.after('<span class="custom_error text-danger">Invalid email format.</span>');
            }
            $(`#${formId} .phoneValid`).each(function() {
                let phoneInput = $(this);
                let phoneValue = $(this).val().trim();
                if (phoneValue && !isValidPhoneNumber(phoneValue)) {
                    isValid = false;
                    phoneInput.addClass('is-invalid');
                    phoneInput.focus();
                    phoneInput.after('<span class="custom_error text-danger">Invalid phone number format.</span>');
                }
            })

            // Additional validation for password and password confirmation matching
            let passwordInput = $(`#${formId} [name="password"]`);
            let confirmPasswordInput = $(`#${formId} [name="password_confirmation"]`);
            let passwordValue = passwordInput.val();
            let confirmPasswordValue = confirmPasswordInput.val();
            if (passwordValue !== confirmPasswordValue) {
                isValid = false;
                passwordInput.addClass('is-invalid');
                confirmPasswordInput.addClass('is-invalid');
                $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                passwordInput.focus();
                // Add error message span
                passwordInput.after('<span class="custom_error text-danger">Passwords do not match.</span>');
            }

            $(`#${formId} [minlength], #${formId} [maxlength], #${formId} [min], #${formId} [max]`).each(function() {
                let minLength = parseInt($(this).attr('minlength'));
                let maxLength = parseInt($(this).attr('maxlength'));
                let minValue = parseInt($(this).attr('min'));
                let maxValue = parseInt($(this).attr('max'));
                let inputValue = $(this).val().trim(); // Trim whitespace from input value

                if (inputValue !== '') { // Check if input value is not blank
                    if (minLength && inputValue.length < minLength) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Minimum length is ${minLength} characters.</span>`
                        );
                    }

                    if (maxLength && inputValue.length > maxLength) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Maximum length is ${maxLength} characters.</span>`
                        );
                    }

                    if (!isNaN(minValue) && parseInt(inputValue) < minValue) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Minimum value is ${minValue}.</span>`);
                    }

                    if (!isNaN(maxValue) && parseInt(inputValue) > maxValue) {
                        isValid = false;
                        $(this).addClass('is-invalid');
                        $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                        $(this).focus();
                        // Add error message span
                        $(this).after(
                            `<span class="custom_error text-danger">Maximum value is ${maxValue}.</span>`);
                    }
                }
            });

            if (ajaxCheck) {
                $(`#${formId} input`).each(function() {
                    let oninputValue = $(this).attr('oninput');
                    if (oninputValue && oninputValue.includes('checkUniqueData') && typeof window[
                            'checkUniqueData'] === 'function') {
                        if (!ajaxCheck) {
                            $(this).trigger('input');
                        }
                    }
                });
            }


            setTimeout(() => {
                if (isValid) {
                    $(`#${formId}`).submit();
                }
                isValid = true;
            }, 3000);
        }

        function isValidEmail(email) {
            // Regular expression for validating email format
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        function isValidPhoneNumber(phone) {
            var regex = /^[0-9()\-\s+]+$/; // Allow digits, parentheses, hyphens, and spaces
            return regex.test(phone);
        }

        function checkUniqueData(that, colname, previousVal = '') {
            ajaxCheck = false;
            isValid = false;
            let inputElement = $(that);
            let colvalue = encodeURIComponent($(that).val());
            if (colvalue !== undefined && colvalue.length > 2) {
                $(inputElement).next("span.custom_error").remove();
                $(inputElement).next('span.custom_error_unique').remove();
                $(inputElement).next('.spinner-border').remove();
                $(inputElement).next('.custom_error_unique').remove();
                $(inputElement).removeClass('is-invalid');
                $(inputElement).after(
                    '<div class="spinner-border spinner-border-sm text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
                );
                $.ajax({
                    type: "POST",
                    url: "{{ route('supplier.unique') }}",
                    data: {
                        "colname": colname,
                        "colvalue": colvalue,
                        "previousVal": previousVal
                    },
                    dataType: 'json',
                    success: function(result) {
                        $(inputElement).next('.spinner-border').remove();
                        if (!result.status) {
                            $(inputElement).addClass('is-invalid');
                            // Append error message to a container
                            isValid = false;
                            ajaxCheck = true;
                            $(inputElement).after(
                                `<span class="custom_error_unique text-danger">${result.message}</span>`);
                        } else {
                            ajaxCheck = false;
                            isValid = true;
                        }
                    },
                    error: function(data) {

                    }
                });
            }
        }
    </script>
@endpush
