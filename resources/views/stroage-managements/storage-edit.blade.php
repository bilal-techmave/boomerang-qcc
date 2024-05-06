@extends('layouts.main')
@section('app-title', 'Edit Storage - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Storage</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Storage Management</li>
                            <li class="breadcrumb-item active">Edit Storage</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <form action="{{ route('storage.storage.update', ['storage' => $manageStorage->id]) }}" method="POST">
                        @csrf @method('put')

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1"> Name Storage</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $manageStorage->name }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Supervisor <span class="red">*
                                                <small hidden class="required_error">#Required</small></span></label>
                                        <select required data-plugin="customselect" name="supervisor" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @isset($supervisors)
                                                @foreach ($supervisors as $supervisor)
                                                    <option value="{{ $supervisor->id }}"{{ $manageStorage->supervisor == $supervisor->id ?'selected' : '' }}>{{$supervisor->name ??''}}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Unit</label>
                                        <input type="text" class="form-control" name="unit"
                                            value="{{ $manageStorage->unit }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Address Number</label>
                                        <input type="text" class="form-control" name="address_number"
                                            value="{{ $manageStorage->address_number }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Street Address</label>
                                        <input type="text" class="form-control" name="street_address"
                                            value="{{ $manageStorage->street_address }}" id=""
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Suburb</label>
                                        <input type="text" class="form-control" name="suburb"
                                            value="{{ $manageStorage->suburb }}" id="" aria-describedby="emailHelp"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">City <span class="red">* <small hidden
                                                    class="required_error">#Required</small></span></label>
                                        <select data-plugin="customselect" name="geo_city_id" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @isset($cities)
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}" {{$manageStorage->geo_city_id == $city->id ? 'selected' :''}}>{{ $city->city_name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">State <span class="red">* <small hidden
                                                    class="required_error">#Required</small></span></label>
                                        <select data-plugin="customselect" name="geo_state_id" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @isset($states)
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"{{$manageStorage->geo_state_id == $state->id ? 'selected' :''}}>{{ $state->state_name }}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">ZipCode <span
                                                class="red">*</span></label>
                                        <input type="text" class="form-control" name="zipcode"
                                            value="{{ $manageStorage->zipcode }}" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="">Address Configuration</label>
                                    <div class="row mt-3">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox6a" name="is_fixed_storage"
                                                        value="1" type="checkbox"
                                                        {{ $manageStorage->is_fixed_storage == '1' ? 'checked' : '' }}>
                                                    <label class="form-label" for="checkbox6a">
                                                        Is it a fixed storage?
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="red">*</span></label>
                                        <textarea name="description" class="form-control">{{ $manageStorage->description }}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="action_btns">
                                        <button type="submit" class="theme_btn btn save_btn"><i class="bi bi-save"></i>  Save</button>
                                        <a href="{{route('storage.storage.index')}}" class="theme_btn btn-primary btn"><i class="uil-list-ul"></i>List</a>

                                        @if($manageStorage->status == '1')
                                            <button type="button" onclick="statusChange('0',{{$manageStorage->id}},'manage_storages')" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</button>
                                        @else
                                            <button type="button" onclick="statusChange('1',{{$manageStorage->id}},'manage_storages')" class="theme_btn btn btn-success"><i class="uil-shield-check"></i> Activate</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>




                </div>

            </div>


        </div>
    </div>
@endsection
@push('push_script')
    <script>
        function statusChange(dataid,id,tdata){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $.ajax({
                url: "{{route('common.statusUpdate')}}",
                type: 'POST',
                data: {
                    status: dataid,
                    id: id,
                    tdata: tdata
                },
                success: function(result){
                    $('#modal-alert-data_ajax').modal('show');
                    if(result){
                        $("#modal-alert-dataLabel_ajax").text('Status Changed!');
                        $("#modal-alert-dataLabelMsg_ajax").text('Status Has Been Changed Successfully!');
                        $("#modal-alert-dataLabelMsg_ajax").removeClass('text-danger');
                        $("#modal-alert-dataLabelMsg_ajax").addClass('text-success');
                        setTimeout(() => {
                            location.reload();
                        }, 3000);

                    }else{
                        $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                        $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                        $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                        $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                    }
                }
            });
        }
    </script>
@endpush