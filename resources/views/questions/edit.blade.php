@extends('layouts.main')
@section('app-title', 'Edit Questions - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Questions</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Questions</li>
                            <li class="breadcrumb-item active">Edit Questions</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <form action="{{ route('question.question.update', ['id' => $shiftQuestion->id]) }}" id="myForm" method="post"> @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1"> Sites</label>
                                        <select  data-plugin="customselect" name="client_site_id" class="form-select">
                                            <option value="0">All Sites</option>
                                            @isset($sites)
                                                @foreach ($sites as $site)
                                                    <option
                                                        value="{{ $site->id }}"{{ old('client_site_id') == $site->id ? 'selected' : ($shiftQuestion->client_site_id == $site->id ? 'selected' : '') }}>
                                                        {{ $site->reference ?? '' }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        @error('question')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1"> Question</label>
                                        <textarea class="form-control" oninput="checkUniqueData(this,'question','{{ $shiftQuestion->question }}')" required name="question">{{ $shiftQuestion->question }}</textarea>
                                        @error('question')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="row" id="inputContainer">
                                        <div class="col-md-12">
                                            <label class="form-label" for="exampleInputEmail1"> If Question Answer Is No
                                                Then Options</label>
                                        </div>
                                        @if (old('inputs'))
                                            @foreach (old('inputs') as $input)
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="input{{ $loop->iteration }}">Option
                                                        {{ $loop->iteration }}:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="inputs[]"
                                                            id="input{{ $loop->iteration }}" value="{{ $input }}">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="removeInput('input{{ $loop->iteration }}')">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @elseif($shiftQuestion->nooptions)
                                            @foreach ($shiftQuestion->nooptions as $input)
                                                <div class="col-md-4 form-group mb-3">
                                                    <label for="input{{ $loop->iteration }}">Option
                                                        {{ $loop->iteration }}:</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="inputs[]"
                                                            id="input{{ $loop->iteration }}"
                                                            value="{{ $input->reson_option }}">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-danger"
                                                                onclick="removeInput('input{{ $loop->iteration }}')">Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif

                                    </div>
                                    <button type="button" style="float: right;" class="btn btn-primary"
                                        onclick="addInput()">Add More Options</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom_footer_dt">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="action_btns">
                                    <button type="button" onclick="validateForm(this,'myForm')"
                                        class="theme_btn btn save_btn"><i class="bi bi-save"></i>Update</button>
                                    <a href="{{ route('question.question.index') }}" class="theme_btn btn-primary btn"><i
                                            class="uil-list-ul"></i> List</a>
                                </div>
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
    <script>
        let inputCount = {{ old('inputs') ? count(old('inputs')) : count($shiftQuestion->nooptions) }};

        function addInput() {
            inputCount++;
            let inputHtml = `
            <div class="col-md-4 form-group mb-3">
                <label for="input${inputCount}">Option ${inputCount}:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="inputs[]" id="input${inputCount}" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-danger" onclick="removeInput('input${inputCount}')">Remove</button>
                    </div>
                </div>
            </div>
        `;
            $('#inputContainer').append(inputHtml);
        }

        function removeInput(index) {
            $(`#inputContainer #${index}`).closest('.form-group').remove();
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

        function checkUniqueData(that, colname, previousVal = '') {
            ajaxCheck = false;
            isValid = false;
            let inputElement = $(that);
            let sitevalue = $("#client_site_id").val();
            let colvalue = encodeURIComponent($(that).val());
            if (colvalue !== undefined && colvalue.length > 4) {
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
                    url: "{{ route('question.unique-check') }}",
                    data: {
                        "colname": colname,
                        "colvalue": colvalue,
                        "previousVal": previousVal,
                        "site_id": sitevalue
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
