@extends('layouts.main')
@section('app-title', 'Add Expenses - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Expenses</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Financial Settings</li>
                            <li class="breadcrumb-item active">Add Expenses</li>
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
                                <a href="#home" id="homeTab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link active">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            @can('site-view')
                                <li class="nav-item">
                                    <a href="#profile" id="profileTab" data-bs-toggle="tab" aria-expanded="true"
                                        class="nav-link ">
                                        <span><i class="uil-building"></i></span>
                                        <span>Sites</span>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="#messages" id="messagesTab" data-bs-toggle="tab" aria-expanded="false"
                                    class="nav-link">
                                    <span><i class="uil-file-blank"></i></span>
                                    <span>Document</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('financial.expense.store') }}" id="myForm" method="post"
                            enctype="multipart/form-data">
                            <div class="tab-content  text-muted">
                                @csrf
                                <div class="tab-pane show active" id="home">
                                    <div class="main_bx_dt__">
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Financial Account
                                                            <span class="red">*</span></label>
                                                        <select data-plugin="customselect" required class="form-select"
                                                            name="financial_accounts_id">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($accounts)
                                                                @foreach ($accounts as $account)
                                                                    <option value="{{ $account->id }}"
                                                                        {{ old('financial_accounts_id') == $account->id ? 'selected' : '' }}>
                                                                        {{ $account->account_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('financial_accounts_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Expense Type
                                                            <span class="red">*</span></label>
                                                        <select required data-plugin="customselect" class="form-select"
                                                            name="expense_types_id">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($expense_type)
                                                                @foreach ($expense_type as $expensetype)
                                                                    <option value="{{ $expensetype->id }}"
                                                                        {{ old('expense_types_id') == $expensetype->id ? 'selected' : '' }}>
                                                                        {{ $expensetype->expense_type_name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('expense_types_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Company <span
                                                                class="red">*</span></label>
                                                        <select required data-plugin="customselect" class="form-select"
                                                            name="main_companies_id">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($companies)
                                                                @foreach ($companies as $company)
                                                                    <option value="{{ $company->id }}"
                                                                        {{ old('main_companies_id') == $company->id ? 'selected' : '' }}>
                                                                        {{ $company->business_name }}</option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                        @error('main_companies_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Due Date <span
                                                                class="red">*</span></label>
                                                        <input type="text" required class="form-control basic-datepicker"
                                                            name="due_date" id="" aria-describedby="emailHelp"
                                                            placeholder="">
                                                    </div>
                                                    @error('due_date')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Amount <span
                                                                class="red">*</span></label>
                                                        <input type="number" min="0" step="any" required
                                                            class="form-control" name="amount" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                    </div>
                                                    @error('amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Supplier <span
                                                                class="red">*</span></label>
                                                        <select data-plugin="customselect" required class="form-select"
                                                            name="suppliers_id">
                                                            <option value="">Please select one or start typing
                                                            </option>
                                                            @if ($suppliers)
                                                                @foreach ($suppliers as $supplier)
                                                                    <option value="{{ $supplier->id }}"
                                                                        {{ old('suppliers_id') == $supplier->id ? 'selected' : '' }}>
                                                                        {{ $supplier->name }}</option>
                                                                @endforeach
                                                            @endif

                                                        </select>
                                                        @error('suppliers_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Notes</label>
                                                        <textarea class="form-control" minlength="4" name="notes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @can('site-view')
                                    @php
                                        $newallsites = $allsites->keyBy('id');
                                    @endphp
                                    <div class="tab-pane " id="profile">
                                        <div class="main_bx_dt__">
                                            <div class="top_dt_sec">
                                                <div class="row" id="siteDivValidation">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 mt-3 mt-sm-0">
                                                            <label class="form-label">Add Site</label>
                                                            <select id="siteAddData" data-plugin="customselect"
                                                                class="form-select required_fields">
                                                                <option value="0">Please select one or start typing
                                                                </option>
                                                                @if ($allsites)
                                                                    @foreach ($allsites as $site)
                                                                        <option value="{{ $site->id }}">
                                                                            {{ $site->reference }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                            <span id="siteAddDataError" class="text-danger" hidden>This field
                                                                is required.</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2 align-self-center">
                                                        <button onclick="addSite()" type="button"
                                                            class="theme_btn btn add_btn ">+ Add Site</button>
                                                    </div>
                                                    <div class="col-lg-12  mt-2">
                                                        <table class="table  table-bordered  dt-responsive nowrap w-100">
                                                            <thead>
                                                                <tr>
                                                                    <th>Site</th>
                                                                    <th>Client</th>
                                                                    <th>Portfolio</th>
                                                                    <th>Reference / Building</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="add_site_tr">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                <div class="tab-pane" id="messages">
                                    <div class="sites_main">
                                        <div class="row" id="documentDivValidation">

                                            <div class="col-lg-12" id="documentFilesDocs">
                                                @if (old('documentImages') && !empty(old('documentImages')))
                                                    @foreach (old('documentImages', []) as $index => $file)
                                                        <div class="mb-3" id="documentFilesDocsDiv{{ $index }}">
                                                            <input id="documentFiles{{ $index }}"
                                                                name="documentImages[{{ $index }}]"
                                                                value="{{ $file }}" type="file"
                                                                class="dropify required_fields" data-height="100" />
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="mb-3" id="documentFilesDocsDiv1">
                                                        <input id="documentFiles1" name="documentImages[]" type="file"
                                                            class="dropify required_fields" data-height="100" />
                                                    </div>
                                                @endif
                                                <span id="documentFilesError" class="text-danger" hidden>This field is
                                                    required.</span>

                                            </div>
                                            <div class="col-lg-12 text-end">
                                                <button type="button" onclick="addDocument()"
                                                    class="theme_btn btn add_btn">+ Add Document</button>
                                            </div>
                                            <div class="col-lg-12  mt-3">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Document Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="add_document_tr">

                                                    </tbody>
                                                </table>
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
                                                <a href="{{ route('financial.expense.index') }}"
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
    @include('common.footer_validation', ['validate_url_path' => null])
    
    </script>

    <script>
        var newallsites = @json($newallsites);

        function addSite() {
            console.log(newallsites);
            if (validateFormByDiv('siteDivValidation')) {
                let siteval = $("#siteAddData").val();
                $("#siteAddDataError").attr('hidden', true);
                if (!siteval || siteval == 0) {
                    $("#siteAddDataError").attr('hidden', false);
                } else {
                    let microtime = Date.now();

                    let exists = false;
                    $(".siteTableClass input[type='hidden']").each(function() {
                        if (this.value === siteval) {
                            exists = true;
                        }
                    });
                    console.log(newallsites[siteval]);
                    if (exists) {
                        $("#siteAddData").next('.select2-container').find('.select2-selection').addClass(
                            'invalid-select');
                        $("#siteAddData").next('span').after(
                            '<span class="custom_error text-danger">Already added in list.</span>');
                    } else {
                        $("#add_site_tr").append(`
                                <tr id="site${microtime}">
                                    <td>${newallsites[siteval].reference||'-'}</td>
                                    <td class="siteTableClass">
                                        <input name="site_id[]" type="hidden" value="${siteval}">
                                        ${newallsites[siteval].potfolio.full_name||'-'}
                                    </td>
                                    <td><i class="uil-check-circle status-entity" style="color:green"></i></td>
                                    <td><i class="uil-check-circle status-entity" style="color:green"></i></td>
                                    <td>
                                        <button type="button" onclick="deleteTabletr('site${microtime}','none',true)" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button>
                                    </td>
                                </tr>
                            `);
                        $("#siteAddData").val(0).trigger('change');
                    }
                }
            }
        }
    </script>

    <script>
        var filenumber = 1;

        function addDocument() {
            if (validateFormByDiv('documentDivValidation')) {
                let siteval = $("#siteAddData").val();

                var documentFile = $(`#documentFiles${filenumber}`)[0].files[0];
                $("#documentFilesError").attr('hidden', true);
                if (documentFile) {
                    $(`#documentFilesDocsDiv${filenumber}`).hide();
                    filenumber += 1;
                    var $newFileInput = $(
                        `<div class="mb-3" id="documentFilesDocsDiv${filenumber}"><input id="documentFiles${filenumber}"  name="documentImages[]" type="file" class="dropify required_fields" data-height="100" /></div>`
                    );
                    $('#documentFilesDocs').append($newFileInput);
                    $('.dropify').dropify();
                }

                if (!documentFile || documentFile.name == "") {
                    $("#documentFilesError").attr('hidden', false);
                } else {
                    let microtime = Date.now();
                    $("#add_document_tr").append(`
                <tr id="documents${microtime}">
                    <td>${documentFile.name}</td>
                    <td>
                        <button type="button" onclick="deleteTabletr('documents${microtime}','none',true)" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button>
                    </td>
                </tr>
            `);
                }
            }

        }
    </script>
    <script>
        $(function() {
            $('.basic-datepicker').flatpickr({
                minDate: "today",
            })
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
@endpush
