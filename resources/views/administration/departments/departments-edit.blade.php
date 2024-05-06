@extends('layouts.main')
@section('app-title', 'Edit Department - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Departments</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Administration</li>
                            <li class="breadcrumb-item active">Edit Departments</li>
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
                                <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">

                        <div class="tab-content  text-muted">
                            <div class="tab-pane show active" id="home">

                                <div class="main_bx_dt__">
                                    <form method="POST" id="myForm"
                                        action="{{ route('administration.department.update', ['department' => $department->id]) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="top_dt_sec">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Name <span
                                                                class="red">*</span></label>
                                                        <input type="text" required minlength="3" name="name"
                                                            oninput="checkUniqueData(this,'name','{{ $department->name }}')"
                                                            value="{{ old('name') ?? $department->name }}"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Email <span
                                                                class="red">*</span></label>
                                                        <input type="text" required
                                                            value="{{ old('email') ?? $department->email }}" name="email"
                                                            class="form-control" id="exampleInputEmail1"
                                                            aria-describedby="emailHelp" placeholder="">
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="exampleInputEmail1">Internal Code
                                                            <span class="red">*</span></label>
                                                        <input type="text" required minlength="3"
                                                            value="{{ old('internal_code') ?? $department->internal_code }}"
                                                            oninput="checkUniqueData(this,'internal_code','{{ $department->internal_code }}')"
                                                            name="internal_code" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            placeholder="">
                                                        @error('internal_code')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Supervisor </label>
                                                        <select data-plugin="customselect" name="supervisor"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($supervisors)
                                                                @foreach ($supervisors as $supervisor)
                                                                    <option
                                                                        @if (old('supervisor') == $supervisor->id) selected @elseif($department->supervisor == $supervisor->id) selected @endif
                                                                        value="{{ $supervisor->id }}">
                                                                        {{ $supervisor->name }} ({{ $supervisor->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('supervisor')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="mb-3 mt-3 mt-sm-0">
                                                        <label class="form-label">Manager</label>
                                                        <select name="manager" data-plugin="customselect"
                                                            class="form-select">
                                                            <option value="0">Please select one or start typing
                                                            </option>
                                                            @if ($managers)
                                                                @foreach ($managers as $manager)
                                                                    <option
                                                                        @if (old('manager') == $manager->id) selected @elseif($department->manager == $manager->id) selected @endif
                                                                        value="{{ $manager->id }}">{{ $manager->name }}
                                                                        ({{ $manager->email }})
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('manager')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label for="">Work Order Configuration</label>
                                                            <div class="mb-3 mt-2">
                                                                <div class="checkbox checkbox-success">
                                                                    <input
                                                                        @if (old('is_work_order') == '1') checked @elseif($department->is_work_order == '1') checked @endif
                                                                        value="1" id="is_work_order" type="checkbox"
                                                                        name="is_work_order">
                                                                    <label class="form-label" for="is_work_order">Can be
                                                                        used in Work Order?</label>
                                                                    @error('is_work_order')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-3">
                                                            <label for="">Email Configuration</label>
                                                            <div class="mb-3 mt-2">
                                                                <div class="checkbox checkbox-success">
                                                                    <input
                                                                        @if (old('is_email_send') == '1') checked @elseif($department->is_email_send == '1') checked @endif
                                                                        id="is_email_send" value="1" type="checkbox"
                                                                        name="is_email_send">
                                                                    <label class="form-label" for="is_email_send">Send
                                                                        email to this department</label>
                                                                    @error('is_email_send')
                                                                        <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
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
                                                        <button type="button" onclick="validateForm(this,'myForm')"
                                                            class="theme_btn btn save_btn"><i class="bi bi-save"></i>
                                                            Save</button>
                                                        <a href="{{ route('administration.department.index') }}"
                                                            class="theme_btn btn-primary btn"><i class="uil-list-ul"></i>
                                                            List</a>
                                                        @if ($department->status == '1')
                                                            @can('department-activate')
                                                                <button type="button"
                                                                    onclick="statusChange('0','{{ $department->id }}','departments')"
                                                                    class="theme_btn btn btn-danger"><i
                                                                        class="uil-trash-alt"></i> Deactivate</button>
                                                            @endcan
                                                        @else
                                                            @can('department-deactivate')
                                                                <button type="button"
                                                                    onclick="statusChange('1','{{ $department->id }}','departments')"
                                                                    class="theme_btn btn btn-success"><i
                                                                        class="uil-shield-check"></i> Activate</button>
                                                            @endcan
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
                </div>
            </div>
        </div>
    </div>
@endsection
@push('push_script')
    @include('common.footer_validation', ['validate_url_path' => 'administration.department.unique'])
    @if (auth()->user()->role == 'admin' ||
            auth()->user()->canAny(['department-activate,department-deactivate']))
        <script>
            function statusChange(that, id, tdata) {
                let status = that;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: "{{ route('common.statusUpdate') }}",
                    type: 'POST',
                    data: {
                        status: status,
                        id: id,
                        tdata: tdata
                    },
                    success: function(result) {
                        $('#modal-alert-data_ajax').modal('show');
                        if (result) {
                            $("#modal-alert-dataLabel_ajax").text('Status Changed!');
                            $("#modal-alert-dataLabelMsg_ajax").text('Status Has Been Changed Successfully!');
                            $("#modal-alert-dataLabelMsg_ajax").removeClass('text-danger');
                            $("#modal-alert-dataLabelMsg_ajax").addClass('text-success');
                            location.reload();
                        } else {
                            $("#modal-alert-dataLabel_ajax").text('Status Not Changed!');
                            $("#modal-alert-dataLabelMsg_ajax").text('Somthing Went Wrong!');
                            $("#modal-alert-dataLabelMsg_ajax").removeClass('text-success');
                            $("#modal-alert-dataLabelMsg_ajax").addClass('text-danger');
                        }
                    }
                });
            }
        </script>
    @endif
@endpush
