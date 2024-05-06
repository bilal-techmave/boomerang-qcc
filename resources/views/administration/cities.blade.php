@extends('layouts.main')
@section('app-title', 'Cities - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Cities</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a class="btn-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Cities</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form id="myForm" action="{{ route('administration.create-city') }}" id="myForm" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="">
                                <h5>Add City</h5>
                            </div>
                            <div class="row">
                                {{-- <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">State<span class="red"> <small hidden class="required_error">#Required</small></span></label>
                                    <select data-plugin="customselect" name="geo_state_id" class="form-select">
                                        <option value="0">Please select one or start typing </option>
                                        @forelse ($states as $state)
                                            <option value="{{ $state->id }}"{{old('geo_state_id' == $state->id ? 'selected' :'')}}>
                                                {{ $state->state_name ??'' }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div> --}}

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">City Name <span class="red">*
                                                <small hidden class="required_error">#Required</small></span></label>
                                        <input type="text" oninput="checkUniqueData(this,'city_name')"
                                            class="form-control" value="{{ old('city_name') }}" name="city_name"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" required>
                                        @error('city_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                    {{-- <th hidden></th> --}}
                                    <th>S.No.</th>
                                    {{-- <th>State Name</th> --}}
                                    <th>City Name</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                    <tr role="row" class="odd">
                                        {{-- <td hidden></td> --}}
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td >{{$city->state->state_name ??'-'}}</td> --}}
                                        <td>{{ $city->city_name }}</td>
                                        <td>
                                            <a href="javascript:void(0)"
                                                onclick="getCityData({{ $city->id }},`{{ $city->city_name }}`)"
                                                data-bs-toggle="modal" data-bs-target="#edit_city_modal"><span
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

    <div class="modal fade" id="edit_city_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit City</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('administration.update-city') }}" id="updateForm" method="POST"> @csrf
                    <div class="modal-body">
                        <div class="row">
                            {{-- <div class="col-lg-6">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label" for="exampleInputEmail1">State<span class="red">*  <small hidden class="required_error">#Required</small></span></label>
                                <select class="form-select js-example-basic-single_city" name="geo_state_id">
                                    <option value="0">Please select one or start typing </option>
                                    @forelse ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->state_name ??'' }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div> --}}

                            <div class="col-lg-12">
                                <input type="hidden" name="id" value="" class="city_id_update">
                                <div class="mb-3 mt-3 mt-sm-0">
                                    <label class="form-label" for="oldcityname">City Name <span class="red">* <small
                                                hidden class="required_error">#Required</small></span></label>
                                    <input type="text" class="form-control city_name_edit" value=""
                                        name="city_name" id="oldcityname" aria-describedby="emailHelp" placeholder=""
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="validateForm(this,'updateForm')"
                            class="btn updatebtn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('push_script')
    <script>
        function getCityData(id, city_name) {
            $('.city_name_edit').val(city_name);
            $('.city_id_update').val(id);
            $('.city_name_edit').off('input');

            let cityoldname = $("#oldcityname");
            // cityoldname.off('input', checkUniqueData(cityoldname, 'city_name'));
            cityoldname.on('input', function() {
                let inputValue = $(this).val();
                checkUniqueData($(this), 'city_name', city_name);
            });
            // console.log(city_name);
            // $('.js-example-basic-single_city').val(state_id).trigger('change');
        }
    </script>
    @include('common.footer_validation', ['validate_url_path' => 'administration.cities.unique'])
    <script>
        $(function() {
            $('.js-example-basic-single_city').select2({
                dropdownParent: $('#edit_city_modal')
            });

        });
    </script>


    <script>
        function cityEditForm(formId) {
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
