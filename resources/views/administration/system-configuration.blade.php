@extends('layouts.main')
@section('app-title', 'Site Settings - Quality Commercial Cleaning')
@section('main-content')
    <style>
        .ck-editor__editable_inline {
            min-height: 250px;
        }
    </style>

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Site Settings</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active">Site Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <form method="POST" action="{{ route('administration.site-settings-post') }}" id="myForm"> @csrf
                    <div class="card show_portfolio_tab">
                        <div class="card-header">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a id="homeTab" href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <span><i class="uil-info-circle"></i></span>
                                        <span>Ticket Configuration</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="profileTab" href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                        <span><i class="bi bi-journals"></i></span>
                                        <span> Document Configuration</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="messagesTab" href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        <span><i class="uil-envelope-alt"></i></span>
                                        <span> Email Configuration</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a id="commentsTab" href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        <span><i class="uil-clipboard "></i></span>
                                        <span>
                                            Compliance Configuration</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content  text-muted">
                                <div class="tab-pane show active" id="home">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Hours without
                                                            update
                                                            Urgent Ticket</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('hours_without_update_urgent_ticket') ?? $settings_data['hours_without_update_urgent_ticket'] }}"
                                                            name="hours_without_update_urgent_ticket"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Hours without
                                                            update
                                                            High Ticket</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('hours_without_update_high_ticket') ?? $settings_data['hours_without_update_high_ticket'] }}"
                                                            name="hours_without_update_high_ticket"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Hours without
                                                            update
                                                            Medium Ticket</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('hours_without_update_medium_ticket') ?? $settings_data['hours_without_update_medium_ticket'] }}"
                                                            name="hours_without_update_medium_ticket"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Hours without
                                                            update
                                                            Low Ticket</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('hours_without_update_low_ticket') ?? $settings_data['hours_without_update_low_ticket'] }}"
                                                            name="hours_without_update_low_ticket"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- main_bx_dt -->
                                </div>
                                <div class="tab-pane " id="profile">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Unit </label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('unit') ?? $settings_data['unit'] }}"
                                                            name="unit" aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Days before
                                                            Passport expire </label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('days_before_passport_expire') ?? $settings_data['days_before_passport_expire'] }}"
                                                            name="days_before_passport_expire"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Days before
                                                            Police
                                                            Certificate expire</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('days_before_police_certificate_expire') ?? $settings_data['days_before_police_certificate_expire'] }}"
                                                            name="days_before_police_certificate_expire"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Days before
                                                            VISA
                                                            expire</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('days_before_visa_expire') ?? $settings_data['days_before_visa_expire'] }}"
                                                            name="days_before_visa_expire" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Days before
                                                            Driver
                                                            Licence expire</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('days_before_driver_licence_expire') ?? $settings_data['days_before_driver_licence_expire'] }}"
                                                            name="days_before_driver_licence_expire"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Days before
                                                            Induction expire</label>
                                                        <input type="number" min="0" class="form-control"
                                                            id="exampleInputEmail1"
                                                            value="{{ old('days_before_induction_expire') ?? $settings_data['days_before_induction_expire'] }}"
                                                            name="days_before_induction_expire"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- main_bx_dt -->
                                </div>
                                <div class="tab-pane email_template" id="messages">
                                    <div class="sites_main p-0">
                                        <ul class="nav nav-tabs email_tab">
                                            <li class="nav-item">
                                                <a href="#email-ticket" data-bs-toggle="tab" aria-expanded="false"
                                                    class="nav-link active">
                                                    <span><i class="uil-envelope-alt"></i></span>
                                                    <span>Email for Ticket Configuration</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#email-document" data-bs-toggle="tab" aria-expanded="true"
                                                    class="nav-link ">
                                                    <span><i class="uil-envelope-alt"></i></span>
                                                    <span> Email for Document Configuration</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#email-work-order" data-bs-toggle="tab" aria-expanded="false"
                                                    class="nav-link">
                                                    <span><i class="uil-envelope-alt"></i></span>
                                                    <span> Email for Work Order Configuration</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#email-password" data-bs-toggle="tab" aria-expanded="false"
                                                    class="nav-link">
                                                    <span><i class="uil-envelope-alt"></i></span>
                                                    <span> Email for User Password Configuration</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content  text-muted pt-0">
                                            <div class="tab-pane show active" id="email-ticket">
                                                <div class="sites_main">
                                                    <div class="row">
                                                        <div class="col-6 mt-3 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for new Ticket</p>
                                                            <textarea class="textarea_description form-control" name="new_ticket" rows="10">{{ old('new_ticket') ?? $settings_data['new_ticket'] }}</textarea>
                                                        </div>
                                                        <!-- end col-->
                                                        <div class="col-6 mt-3 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a Ticket Answer</p>
                                                            <textarea class="textarea_description form-control" name="ticket_answer" rows="10">{{ old('ticket_answer') ?? $settings_data['ticket_answer'] }}</textarea>
                                                        </div>
                                                        <!-- end col-->
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a Solved Ticket</p>
                                                            <textarea class="textarea_description form-control" name="ticket_solved" rows="10">{{ old('ticket_solved') ?? $settings_data['ticket_solved'] }}</textarea>
                                                        </div>
                                                        <!-- end col-->
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a Closed Ticket</p>
                                                            <textarea class="textarea_description form-control" name="ticket_closed" rows="10">{{ old('ticket_closed') ?? $settings_data['ticket_closed'] }}</textarea>
                                                        </div>
                                                        <!-- end col-->
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a Overdue Ticket</p>
                                                            <textarea class="textarea_description form-control" name="ticket_overdue" rows="10">{{ old('ticket_overdue') ?? $settings_data['ticket_overdue'] }}</textarea>
                                                        </div>
                                                        <!-- end col-->
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a Re-Opened Ticket</p>
                                                            <textarea class="textarea_description form-control" name="ticket_reopen" rows="10">{{ old('ticket_reopen') ?? $settings_data['ticket_reopen'] }}</textarea>
                                                        </div>
                                                        <!-- end col-->
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a In Progress Ticket
                                                            </p>
                                                            <textarea class="textarea_description form-control" name="ticket_progress" rows="10">{{ old('ticket_progress') ?? $settings_data['ticket_progress'] }}</textarea>
                                                        </div>
                                                        <!-- end col-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="email-document">
                                                <div class="sites_main">
                                                    <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a Expired Document</p>
                                                            <textarea class="textarea_description form-control" name="expired_document" rows="10">{{ old('expired_document') ?? $settings_data['expired_document'] }}</textarea>
                                                        </div>
                                                        <!-- end col-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="email-work-order">
                                                <div class="sites_main">
                                                    <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for new Work Order for the
                                                                Cleaner</p>
                                                            <textarea class="textarea_description form-control" name="new_workorder_cleaner" rows="10">{{ old('new_workorder_cleaner') ?? $settings_data['new_workorder_cleaner'] }}</textarea>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for new Work Order for the
                                                                Manager</p>
                                                            <textarea class="textarea_description form-control" name="new_workorder_manager" rows="10">{{ old('new_workorder_manager') ?? $settings_data['new_workorder_manager'] }}</textarea>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for Scheduled Work Order
                                                            </p>
                                                            <textarea class="textarea_description form-control" name="scheduled_workorder" rows="10">{{ old('scheduled_workorder') ?? $settings_data['scheduled_workorder'] }}</textarea>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for Weekly Work Order for
                                                                the Cleaner</p>
                                                            <textarea class="textarea_description form-control" name="weekly_workorder_cleaner" rows="10">{{ old('weekly_workorder_cleaner') ?? $settings_data['weekly_workorder_cleaner'] }}</textarea>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for Completed Work Order
                                                            </p>
                                                            <textarea class="textarea_description form-control" name="completed_workorder_cleaner" rows="10">{{ old('completed_workorder_cleaner') ?? $settings_data['completed_workorder_cleaner'] }}</textarea>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for Send Confirmation Work
                                                                Order</p>
                                                            <textarea class="textarea_description form-control" name="send_confirmation_workorder" rows="10">{{ old('send_confirmation_workorder') ?? $settings_data['send_confirmation_workorder'] }}</textarea>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for Closed Work Order</p>
                                                            <textarea class="textarea_description form-control" name="closed_workorder" rows="10">{{ old('closed_workorder') ?? $settings_data['closed_workorder'] }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="email-password">
                                                <div class="sites_main">
                                                    <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a Lost Password</p>
                                                            <textarea class="textarea_description form-control" name="lost_password" rows="10">{{ old('lost_password') ?? $settings_data['lost_password'] }}</textarea>
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <p class="mt-2 mb-2">Email Template for a New User</p>
                                                            <textarea class="textarea_description form-control" name="new_user" rows="10">{{ old('new_user') ?? $settings_data['new_user'] }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="comments">
                                    <div class="sites_main">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <div class="mb-3 mt-3 mt-sm-0">
                                                            <label class="form-label">Compliance Manager</label>
                                                            <select data-plugin="customselect" name="compliance_manager"
                                                                class="form-select">
                                                                <option value="0">Please select one or start typing
                                                                </option>
                                                                @if ($manager_user)
                                                                    @foreach ($manager_user as $muser)
                                                                        <option
                                                                            {{ $settings_data['compliance_manager'] == $muser->id ? 'selected' : '' }}
                                                                            value="{{ $muser->id }}">
                                                                            {{ $muser->name }} ({{ $muser->email }})
                                                                        </option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <p class="mt-2 mb-2">Email Template for a Incident Report</p>
                                                <textarea class="textarea_description form-control" name="incident_report" rows="10">{{ old('incident_report') ?? $settings_data['incident_report'] }}</textarea>

                                            </div>
                                            <div class="col-6 mb-3">
                                                <p class="mt-2 mb-2">Email Template for a Completed Incident Report</p>
                                                <textarea class="textarea_description form-control" name="completed_incident_report" rows="10">{{ old('completed_incident_report') ?? $settings_data['completed_incident_report'] }}</textarea>

                                            </div>
                                            <div class="col-6 mb-3">
                                                <p class="mt-2 mb-2">Email Template for a Re-Opened Incident Report</p>
                                                <textarea class="textarea_description form-control" name="reopened_incident_report" rows="10">{{ old('reopened_incident_report') ?? $settings_data['reopened_incident_report'] }}</textarea>

                                            </div>
                                            <div class="col-6 mb-3">
                                                <p class="mt-2 mb-2">Email Template for a Final Report of the Incident
                                                    Report</p>
                                                <textarea class="textarea_description form-control" name="final_incident_report" rows="10">{{ old('final_incident_report') ?? $settings_data['final_incident_report'] }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="action_btns">
                                        <button type="button" onclick="validateForm(this,'myForm')" class="theme_btn btn save_btn"><i class="bi bi-save"></i>Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
@endsection

@push('push_script')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
    <script>
        document.querySelectorAll('.textarea_description').forEach((node, index) => {
            ClassicEditor
                .create(node, {})
                .then(newEditor => {
                    
                });
                
                
        });

        


        var isValid = true;

        function validateForm(that, formId) {
            buttonLoading(that);
            $('.select2-selection').removeClass('invalid-select');
            $(".custom_error").remove();
            $('input').removeClass('is-invalid');
            $('textarea').removeClass('is-invalid');
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

            if (isValid) {
                $(`#${formId}`).submit();
            }
            isValid = true;
        }
    </script>
    
@endpush
