@extends('layouts.main')
@section('app-title', 'States - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">States</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">States</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form id="myForm" action="{{ route('administration.create-state') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="">
                                <h5>Add State</h5>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">State Name <span class="red">*
                                                <small hidden class="required_error">#Required</small></span></label>
                                        <input type="text" oninput="checkUniqueData(this,'state_name')"
                                            class="form-control" value="{{ old('state_name') }}" name="state_name"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
                                        @error('state_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">State Timezone <span
                                                class="red"><small hidden
                                                    class="required_error">#Required</small></span></label>
                                        <select data-plugin="customselect" name="state_timezone" class="form-select">
                                            <option value="0">Please select one or start typing </option>
                                            <option value="Pacific/Norfolk">Norfolk Island Daylight Time Kingston (GMT+12)
                                            </option>
                                            <option value="Australia/Adelaide">Australian Central Daylight Time Adelaide
                                                (GMT+10:30)</option>
                                            <option value="Australia/Perth">Australian Western Standard Time Perth (GMT+8)
                                            </option>
                                            <option value="Indian/Christmas">Christmas Island Time Christmas Island (GMT+7)
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button type="button" onclick="validateForm(this,'myForm')"
                                                class="theme_btn btn save_btn"><i class="bi bi-save"></i> Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>State Name</th>
                                    <th>TimeZone</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($states as $state)
                                    <tr role="row" class="odd">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $state->state_name ?? '' }}</td>
                                        <td>{{ config('app.state_timezone.' . $state->state_timezone) ?? '-' }}</td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                onclick="getStateData({{ $state->id }},`{{ $state->state_timezone }}`,`{{ $state->state_name }}`)"
                                                data-bs-toggle="modal" data-bs-target="#edit_state_modal"><span
                                                    class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                        class="uil-edit"></i>
                                                </span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_state_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit State</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('administration.update-state') }}" id="updateForm" method="POST"> @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 mt-3 mt-sm-0">
                                    <label class="form-label" for="exampleInputEmail1">State Name <span class="red">*
                                            <small hidden class="required_error">#Required</small></span></label>
                                    <input type="text" required class="form-control state_name_edit" value=""
                                        name="state_name" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <input type="hidden" name="id" value="" class="state_id_update">
                                <div class="mb-3 mt-3 mt-sm-0">
                                    <label class="form-label" for="exampleInputEmail1">State Timezone</label>
                                    <select class="form-select js-example-basic-single_state" name="state_timezone">
                                        <option value="0">Please select one or start typing </option>
                                        <option value="Pacific/Norfolk">Norfolk Island Daylight Time Kingston (GMT+12)
                                        </option>
                                        <option value="Australia/Adelaide">Australian Central Daylight Time Adelaide
                                            (GMT+10:30)</option>
                                        <option value="Australia/Perth">Australian Western Standard Time Perth (GMT+8)
                                        </option>
                                        <option value="Indian/Christmas">Christmas Island Time Christmas Island (GMT+7)
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="validateForm(this,'updateForm')"
                            class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('push_script')
    @include('common.footer_validation', ['validate_url_path' => 'administration.state.unique'])
    <script>
        $(function() {
            $('.js-example-basic-single_state').select2({
                dropdownParent: $('#edit_state_modal')
            });

        });
    </script>
    <script>
        function getStateData(id, timezone, state_name) {
            $('.state_name_edit').val(state_name);
            $('.state_id_update').val(id);
            $('.js-example-basic-single_state').val(timezone).trigger('change');
            let state_name_edit = $(".state_name_edit");
            // cityoldname.off('input', checkUniqueData(cityoldname, 'city_name'));
            state_name_edit.on('input', function() {
                let inputValue = $(this).val();
                checkUniqueData($(this), 'state_name', state_name);
            });
        }
    </script>

    <script>
        function stateEditForm(formId) {
            // Serialize form data
            var formData = $('#' + formId).serialize();

            // Make AJAX POST request
            $.ajax({
                url: $('#' + formId).attr('action'), // Form action URL
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    // Handle success response
                    if (response.status) {
                        swal({
                            type: 'success',
                            title: 'Success !',
                            text: response.message,
                            timer: 3000
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 3000);

                    } else {
                        swal({
                            type: 'warning',
                            title: 'Warning!',
                            text: response.message,
                            timer: 3000
                        });
                    }
                },
                error: function(xhr, status, error) {
                    let data = JSON.parse(xhr.responseText);
                    swal({
                        type: 'warning',
                        title: 'Warning!',
                        text: data.message,
                        timer: 3000
                    });
                }
            });
        }
    </script>
@endpush
