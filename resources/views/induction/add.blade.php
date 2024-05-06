@extends('layouts.main')
@section('app-title', 'Add Induction - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Induction</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Induction</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="main_bx_dt__">
                            <form method="POST" id="myForm" action="{{ route('induction.induction.store') }}"
                                enctype="multipart/form-data"> @csrf
                                <div class="top_dt_sec">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Name <span
                                                        class="text-danger">*</span></label>
                                                <input oninput="checkUniqueData(this,'title')" type="text" required
                                                    value="{{ old('title') }}" name="title" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" minlength="3"
                                                    placeholder="">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Status</label>
                                                <div class="form-group">
                                                    <select name="status" class="status_" data-placeholder="Choose one">
                                                        <option {{ old('status') == '1' ? 'selected' : '' }} value="1">
                                                            Active</option>
                                                        <option {{ old('status') == '0' ? 'selected' : '' }} value="0">
                                                            Inactive</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="check_box">
                                                <label class="form-label" for="exampleInputEmail1">Upload File <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-group">
                                                    <input name="docs_image" required type="file" class="dropify"
                                                        data-height="100" />
                                                </div>
                                                @error('docs_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns text-end">
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    class="btn btn-primary"><i class="bi bi-save"></i>
                                                    Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- main_bx_dt -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('push_script')
    @include('common.footer_validation', ['validate_url_path' => 'induction.unique-check'])
@endpush
