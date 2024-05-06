@extends('layouts.main')
@section('app-title', 'Edit Induction - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Induction</h4>
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
                            <form action="{{ route('induction.induction.update', ['induction' => $cleanerInduction->id]) }}"
                                method="POST" enctype="multipart/form-data" id="myForm">
                                @csrf @method('put')
                                <div class="top_dt_sec">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Name</label>
                                                <input type="text" name="title" class="form-control"
                                                    id="exampleInputEmail1"
                                                    value="{{ old('title') ?? $cleanerInduction->title }}"
                                                    aria-describedby="emailHelp" placeholder="" required minlength="3"
                                                    oninput="checkUniqueData(this,'title','{{ $cleanerInduction->title }}')">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Status</label>
                                                <div class="form-group">
                                                    <select class="status_" name="status" data-placeholder="Choose one">
                                                        <option {{ $cleanerInduction->status == '1' ? 'selected' : '' }}
                                                            value="1">Active</option>
                                                        <option {{ $cleanerInduction->status == '0' ? 'selected' : '' }}
                                                            value="0">Inactive</option>
                                                    </select>
                                                </div>
                                                @error('status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="check_box">
                                                <label class="form-label" for="exampleInputEmail1">
                                                    @if ($cleanerInduction->docs_image)
                                                        Upload File &nbsp; | &nbsp;
                                                        <a href="{{ url(env('STORE_PATH') . $cleanerInduction->docs_image) }}"
                                                            class="btn-link" target="_blank">View Document</a>
                                                    @endif
                                                </label>
                                                <div class="form-group">
                                                    <input name="docs_image"
                                                        @if ($cleanerInduction->docs_image) data-default-file="{{ url(env('STORE_PATH') . $cleanerInduction->docs_image) }}" @endif
                                                        type="file" class="dropify"  data-height="100" />
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
                                                <button type="button" onclick="validateForm(this,'myForm')" class="btn btn-primary">Update</button>
                                                <a href="{{ route('induction.induction.index') }}"
                                                    class="theme_btn btn-danger btn"><i class="uil-list-ul"></i> List</a>
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
