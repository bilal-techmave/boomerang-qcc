@extends('layouts.main')
@section('app-title', 'Induction - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
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
                    <div class="card-header card_h">
                        <div class="top_section_title">
                            <h5>Filter</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <form method="get" action="{{ route('induction.item-status') }}">
                                <div class="col-lg-4">
                                    <div class="check_box">
                                        <label class="form-label" for="exampleInputEmail1">Status</label>
                                        <div class="form-group">
                                            <select class="status_" data-placeholder="Choose one" name="status">
                                                <option>ALL</option>
                                                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <div class="search_btn">
                                        <button type="submit" class="btn btn-primary srch_btn">Search</button>
                                        <a href="{{ route('induction.induction.index') }}"
                                            class="btn btn-primary srch_btn">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>All Induction</h5>
                            <a href="{{ route('induction.induction.create') }}" class="btn btn-primary">+ Add New
                                Induction</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-bordered text-nowrap mb-0">
                                <thead class="border-top">
                                    <tr>
                                        <th class="bg-transparent border-bottom-0">Name</th>
                                        <th class="bg-transparent border-bottom-0">File</th>
                                        <th class="bg-transparent border-bottom-0">status</th>
                                        <th class="bg-transparent border-bottom-0" style="width: 5%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($allinduction)
                                        @foreach ($allinduction as $induction)
                                            <tr class="border-bottom">
                                                <td class="td sorting_1">{{ $induction->title }}</td>
                                                <td class="td">
                                                    @if ($induction->docs_image)
                                                        <a target="_blank"
                                                            href="{{ url(env('STORE_PATH') . $induction->docs_image) }}">View
                                                            File</a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    @if (auth()->user()->role == 'admin' ||
                                                            auth()->user()->canAny(['induction-activate,induction-deactivate']))
                                                        <div class="form-group">
                                                            <select class="status_"
                                                                onchange="statusChange(this,'{{ $induction->id }}','cleaner_inductions')"
                                                                data-placeholder="Choose one">
                                                                @can('induction-activate')
                                                                    <option {{ $induction->status == '1' ? 'selected' : '' }}
                                                                        value="1">Active</option>
                                                                @endcan
                                                                @can('induction-deactivate')
                                                                    <option {{ $induction->status == '0' ? 'selected' : '' }}
                                                                        value="0">Inactive</option>
                                                                @endcan
                                                            </select>
                                                        </div>
                                                    @else
                                                        {{ $induction->status == 1 ? 'Active' : 'Inactive' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="g-2">
                                                        @can('induction-edit')
                                                            <a
                                                                href="{{ route('induction.induction.edit', ['induction' => $induction]) }}"><span
                                                                    class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                                        class="uil-edit"></i></span></a>
                                                        @endcan
                                                    </div>
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
    </div>
    <!-- container -->
@endsection
@push('push_script')
    @if (auth()->user()->role == 'admin' ||
            auth()->user()->canAny(['induction-activate,induction-deactivate']))
        <script>
            function statusChange(that, id, tdata) {
                let status = $(that).val();
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
