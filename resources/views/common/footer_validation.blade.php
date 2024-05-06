<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    var isValid = true;
    var ajaxCheck = true;

    function validateForm(that, formId) {
        let timerVal = 1000;
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


        var inputsWithOnInput = $(`#${formId} input`).filter(function() {
            return typeof $(this).attr('oninput') !== 'undefined';
        });
        timerVal = (parseInt(inputsWithOnInput.length*timerVal)+1000);
        if(inputsWithOnInput.length > 0 && isValid){
            $(`#${formId} input`).each(function() {
                let oninputValue = $(this).attr('oninput');
                if (oninputValue && oninputValue.includes('checkUniqueData') && typeof window['checkUniqueData'] === 'function') {
                    setTimeout(() => {
                        if(ajaxCheck) $(this).trigger('input');
                    }, 2000);
                }
            });
        }else{
            ajaxCheck = true;
        }

        // console.log(ajaxCheck,isValid,timerVal);
        setTimeout(() => {
            // console.log('===',ajaxCheck,isValid,timerVal);
            if (ajaxCheck && isValid){ $(`#${formId}`).submit(); }
            isValid=true;
        }, timerVal);
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
@if ($validate_url_path)
    

<script>
    function checkUniqueData(that, colname, previousVal = '') {
        let inputElement = $(that);
        let colvalue = encodeURIComponent($(that).val());
        if (colvalue !== undefined && colvalue.length > 2) {
            $(inputElement).next("span.custom_error").remove();
            $(inputElement).next('span.custom_error_unique').remove();
            $(inputElement).next('.spinner-border').remove();
            $(inputElement).removeClass('is-invalid');
            $(inputElement).after(
                '<div class="spinner-border spinner-border-sm text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                type: "POST",
                url: "{{ route($validate_url_path) }}",
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
                        ajaxCheck = false;
                        $(inputElement).after(
                            `<span class="custom_error_unique text-danger">${result.message}</span>`);
                    } else {
                        ajaxCheck = true;
                    }
                },
                error: function(data) {
                    isValid = false;
                    ajaxCheck = false;
                }
            });
        }
    }
</script>
@endif