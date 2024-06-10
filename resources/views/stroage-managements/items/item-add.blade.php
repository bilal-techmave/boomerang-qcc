@extends('layouts.main')
@section('app-title', 'Item Add - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Item</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Storage Management</li>
                            <li class="breadcrumb-item active">Add Item</li>
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
                                    class="nav-link active">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item" disabled>
                                <a id="profileTab" href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                    <span><i class="bi bi-journals"></i></span>
                                    <span>Item</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('storage.items.store') }}" id="myForm" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content  text-muted">
                                <div class="tab-pane show @if (!$errors->has('tab_name')) show active @elseif($errors->first('tab_name') == 'basic_info') show active @endif"
                                    id="home">
                                    <div class="main_bx_dt__">

                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Name<span
                                                                class="red">*</span></label>
                                                        <input type="text" required class="form-control" name="name"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0" >
                                                        <label class="form-label">Type </label>
                                                        <select data-plugin="customselect" name="type"
                                                            class="form-select">
                                                            <option value="Consumables">Consumables</option>
                                                            <option value="Machine">Machine</option>
                                                            <option value="Tool">Tool</option>
                                                            <option value="PPE">PPE</option>
                                                            <option value="Accessory">Accessory</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Serial</label>
                                                        <input type="text" class="form-control" name="serial" value="{{ old('serial') }}" oninput="checkUniqueData(this,'serial')"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Supplier</label>
                                                        <select data-plugin="customselect" name="type"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($suppliers)
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}">
                                                                        {{ $supplier->name }}</option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                        {{-- <input type="text" class="form-control" name="supplier" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=""> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Manufacturer
                                                            <span class="red">*</span></label>
                                                        <input type="text" required class="form-control"
                                                            name="manufacturer" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Price Cost <span
                                                                class="red">*</span></label>
                                                        <input type="number" step="any" required class="form-control"
                                                            name="price_cost" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Barcode</label>
                                                        <input type="text" class="form-control" name="barcode" value="{{ old('barcode') }}" oninput="checkUniqueData(this,'barcode')"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Product
                                                            Code</label>
                                                        <input type="text" class="form-control" name="product_code" value="{{ old('product_code') }}" oninput="checkUniqueData(this,'product_code')"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Test And Tag
                                                            Expire Date</label>
                                                        <input type="text" class="form-control basic-datepicker"
                                                            name="expire_date" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Company</label>
                                                        <select data-plugin="customselect" name="company_id"
                                                            class="form-select">
                                                            <option selected disabled>Please select one or start typing</option>
                                                            @foreach($companies as $data)
                                                                <option value="{{$data->id}}">{{$data->business_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Website</label>
                                                        <input type="text" class="form-control"
                                                            name="website" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <div class="checkbox checkbox-success">
                                                            <input id="checkbox6a" name="is_unique" value="1"
                                                                type="checkbox">
                                                            <label class="form-label" for="checkbox6a">
                                                                Is this item UNIQUE?
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Description <span
                                                                class="red">*</span></label>
                                                        <textarea required name="description" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Observation</label>
                                                        <textarea name="observation" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Upload Attachment</label>
                                                        <input name="uploadAttachment" type="file" class="dropify"
                                                            data-height="100" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- main_bx_dt -->
                                </div>
                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    class="theme_btn btn save_btn"><i class="bi bi-save"></i>
                                                    Save</button>
                                                <a href="{{ route('storage.items.index') }}"
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
        function removeItemData(that, personId) {
            var label = "Address";
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
                            url: "{{ route('storage.delete.items') }}",
                            data: {
                                "itemId": personId,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                swal({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Item Deleted',
                                    timer: 1000
                                });
                                if (that) {
                                    //delete specific row
                                    $(that).parent().parent().remove();
                                };
                            },
                            error: function(data) {}
                        });
                    } else {
                        swal("Cancelled", label + " safe :)", "error");
                    }
                });
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
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


            // setTimeout(() => {
                if (isValid) {
                    $(`#${formId}`).submit();
                }
                isValid = true;
            // }, 3000);
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
    </script>

 @include('common.footer_validation', ['validate_url_path' => 'storage.itemUniqueCheck'])
@endpush