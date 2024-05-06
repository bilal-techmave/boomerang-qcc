@extends('layouts.main')
@section('app-title', 'Edit Financial Account - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Financial Account</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Financial Settings</li>
                            <li class="breadcrumb-item active">Edit Financial Account</li>
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
                            <form action="{{ route('financial.accounts.update', ['account' => $account]) }}" id="myForm"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="top_dt_sec new_prospect">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="">
                                                <label class="form-label" for="exampleInputEmail1">Account Name <span
                                                        class="red">*</span></label>
                                                <input type="text" required minlength="4"
                                                    oninput="checkUniqueData(this,'account_name','{{ $account->account_name }}')"
                                                    class="form-control" name="account_name"
                                                    value="{{ old('account_name') ?? $account->account_name }}"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                                @error('account_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom_footer_dt">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="action_btns">
                                                <button type="button" onclick="validateForm(this,'myForm')"
                                                    class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                                                @can('financial-account-view')
                                                    <a href="{{ route('financial.accounts.index') }}"
                                                        class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                                @endcan


                                                @if ($account->status == '1')
                                                    @can('financial-account-activate')
                                                        <button type="button"
                                                            onclick="statusChange('0','{{ $account->id }}','financial_accounts')"
                                                            class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i>
                                                            Deactivate</button>
                                                    @endcan
                                                @else
                                                    @can('financial-account-deactivate')
                                                        <button type="button"
                                                            onclick="statusChange('1','{{ $account->id }}','financial_accounts')"
                                                            class="theme_btn btn btn-success"><i class="uil-shield-check"></i>
                                                            Activate</button>
                                                    @endcan
                                                @endif
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

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
    @include('common.footer_validation', ['validate_url_path' => 'financial.accounts.unique'])
@endpush
