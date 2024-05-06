@extends('layouts.main')
@section('app-title', 'All Job Type - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Job Type</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Work Order</li>
                            <li class="breadcrumb-item active">Job Type</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>All Job Type</h5>
                            <div class="action_jb">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#add-job-type">+ Add Job Type</a>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#add-job-sub-type">+ Add Job Sub Type</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">

                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Job Type</th>
                                    <th>Job Sub Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($allsubjobs)
                                    @foreach ($allsubjobs as $jobs)
                                        <tr role="row" class="odd">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jobs->jobtype->name ?? '' }}</td>
                                            <td>
                                                {{ $jobs->name }}
                                            </td>
                                            <td>
                                                <a
                                                    onclick="editHJobTypebtn(`{{ $jobs->name }}`,`{{ $jobs->jobtype->name ?? '' }}`,`{{ $jobs->id }}`)">
                                                    <span class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                        <i class="uil-edit"></i>
                                                    </span>
                                                </a>
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

    <!-- Modal -->
    <div class="modal fade" id="add-job-type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="myFormJob" action="{{ route('job-type.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Job Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Job Type</label>
                                    <input type="text" required oninput="checkUniqueData(this,'name')" name="name"
                                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="validateForm(this,'myFormJob')" class="btn btn-primary"
                            id="add_contact_btn">+ Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END wrapper -->
    <!-- Modal -->
    <div class="modal fade" id="add-job-sub-type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="mySubJob" action="{{ route('job-type.addSubtype') }}">@csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Job Sub Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Job Type</label>
                                    <select required name="id" id="jobIdSel"
                                        class="form-select js-example-basic-single3">
                                        <option value="0">Select Job Type</option>
                                        @if ($alljobs)
                                            @foreach ($alljobs as $jobs)
                                                <option value="{{ $jobs->id }}">{{ $jobs->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Job Sub Type</label>
                                    <input type="text" oninput="checkUniqueDataSub(this,'name','jobId')" required
                                        name="sub_type" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="validateForm(this,'mySubJob')" class="btn btn-primary"
                            id="add_contact_btn">+ Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END wrapper -->


    <!-- Modal -->
    <div class="modal fade zoomIn" id="edit-job-type" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" id="myFormUpdate" action="{{ route('job-type.updatedBoth') }}">@csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Job Type</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="mb-3">
                                    <label class="form-label" for="jobtype_data">Job Type</label>
                                    <input type="hidden" name="jobid" id="jobtypeid_data">
                                    <input type="text" class="form-control" id="jobNameVal" name="job_name" required
                                        id="jobtype_data">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="jobsub_type">Job Sub Type</label>
                                    <input type="text" oninput="checkUniqueDataSub(this,'name','sub')" required
                                        class="form-control" req name="subjob_name" id="jobsub_type">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="validateForm(this,'myFormUpdate')" class="btn btn-primary"
                            id="add_contact_btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END wrapper -->
@endsection
@push('push_script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });


        function editHJobTypebtn(subjobname, jobname, id) {
            $("#jobtype_data").val(jobname);
            $("#jobsub_type").val(subjobname);
            $("#jobtypeid_data").val(id);
            $("#edit-job-type").modal('show');
        }
    </script>

    <script>
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
                    url: "{{ route('job-type.unique-check') }}",
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

        function checkUniqueDataSub(that, colname, typeC = 'sub', previousVal = '') {
            ajaxCheck = false;
            isValid = false;
            let inputElement = $(that);
            if (typeC == 'sub') previousVal = $("#jobNameVal").val();
            else previousVal = $("#jobIdSel").val();
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
                    url: "{{ route('job-type.sub-unique-check') }}",
                    data: {
                        "colname": colname,
                        "colvalue": colvalue,
                        "previousVal": previousVal,
                        "typeC": typeC
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
