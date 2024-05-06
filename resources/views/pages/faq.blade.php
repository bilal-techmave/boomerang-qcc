@extends('layouts.main')
@section('app-title', 'FAQ - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">FAQ</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">FAQ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" id="myForm" action="{{ route('faqs.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Question <span
                                                class="red">*</span></label>
                                        <input required type="text" class="form-control" name="question"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Ans <span class="red">*</span></label>
                                        <textarea required class="form-control" name="answer"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <div class="action_btns">
                                        <button type="button" onclick="validateForm(this,'myForm')"
                                            class="theme_btn btn btn-primary">+ Add FAQ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mb-2">
                                <div class="title_head">
                                    <h4>Frequently Asked Questions</h4>
                                </div>
                            </div>
                        </div>
                        <div class="accordion custom-accordionwitharrow" id="accordionExample">
                            @if ($faqs != null)
                                @foreach ($faqs as $faq)
                                    <div class="card mb-1 shadow-none border" id="faqdiv{{ $faq->id }}">
                                        <a href="javascript:void(0)" class="text-dark" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="m-0 fs-16">
                                                    {{ $faq->question ?? '' }}
                                                    <i class="uil uil-angle-down float-end accordion-arrow"></i>
                                                </h5>
                                            </div>
                                        </a>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-bs-parent="#accordionExample">
                                            <div class="card-body text-muted">
                                                <p class="mb-0">{{ $faq->answer ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="bottom_footer_dt faq_bottom_dt">
                                            <div class="row">
                                                <div class="col-lg-12 text-end">
                                                    <div class="action_btns">
                                                        <a href="javascript:void(0)"
                                                            onclick="faqEdit(`{{ $faq->question }}`,`{{ $faq->answer }}`,`{{ $faq->id }}`)"
                                                            class="theme_btn btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#faq_edit"><i class="uil-edit"></i> Edit</a>
                                                        <a href="javascript:void(0)"
                                                            onclick="deleteRecordTbl(`{{ $faq->id }}`,`faqdiv{{ $faq->id }}`)"
                                                            class="theme_btn btn btn-danger"> <i class="uil-trash"></i>
                                                            Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Your Blade View -->

    <!-- Modal -->
    <div class="modal fade" id="faq_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FAQ Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('faqs.faqUpdate') }}" id="faqEditForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Question <span
                                            class="red">*</span></label>
                                    <input type="text" class="form-control" required name="question" id="question"
                                        aria-describedby="emailHelp" value="">
                                </div>
                            </div>
                            <input type="hidden" name="postId" id="postId" value=""
                                class="form-control shadow-none"><br>

                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Answer <span class="red">*</span></label>
                                    <textarea required="" class="form-control"id="answer" name="answer"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="validateForm(this,'faqEditForm')" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('push_script')
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            function faqEdit(question, answer, postId) {
                $('#question').val(question);
                $('#answer').val(answer);
                $('#postId').val(postId);
                // $("#faq_edit").modal('show');
            }

            function deleteRecordTbl(docId, dividremove) {
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
                                    "table_name": 'faqs'
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
                                        $(`#${dividremove}`).remove();
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


            var isValid = true;
            var ajaxCheck = true;

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
                        url: "{{ route('faqs.unique-check') }}",
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



@endsection
