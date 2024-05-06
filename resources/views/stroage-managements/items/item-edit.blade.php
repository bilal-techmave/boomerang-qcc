@extends('layouts.main')
@section('app-title', 'Item Edit - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Item</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Storage Management</li>
                            <li class="breadcrumb-item active">Edit Item</li>
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
                                <a href="#home" id="homeTab" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" id="profileTab" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                    <span><i class="bi bi-journals"></i></span>
                                    <span>Item Documents</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">

                        <form action="{{route('storage.items.update',['item'=>$items->id])}}" id="myForm" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="tab-content  text-muted">
                            <div class="tab-pane show active" id="home">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputName">Name<span class="red">*</span></label>
                                                    <input type="text" name="name" class="form-control" id="exampleInputName" aria-describedby="emailHelp" value="{{$items->name}}" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Type </label>
                                                    <select data-plugin="customselect" class="form-select" name="type">
                                                        <option {{ $items->type == "CONSUMABLES" ? 'selected' : '' }} value="CONSUMABLES">Consumables</option>
                                                        <option {{ $items->type == "MACHINE" ? 'selected' : '' }} value="MACHINE">Machine</option>
                                                        <option {{ $items->type == "TOOL" ? 'selected' : '' }} value="TOOL">Tool</option>
                                                        <option {{ $items->type == "PPE" ? 'selected' : '' }} value="PPE">PPE</option>
                                                        <option {{ $items->type == "ACCESSORY" ? 'selected' : '' }} value="ACCESSORY">Accessory</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputSerial">Serial</label>
                                                    <input type="text" value="{{$items->serial}}" class="form-control" name="serial" id="exampleInputSerial" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputSupplier">Supplier</label>
                                                    <select data-plugin="customselect" name="supplier_id" id="exampleInputSupplier" class="form-select">
                                                        <option value="0">Please select one or start typing</option>
                                                        @if ($suppliers)
                                                            @foreach ($suppliers as $supplier)
                                                                <option {{ $supplier->id == $items->supplier_id ? 'selected' : '' }} value="{{$supplier->id}}">{{$supplier->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputManufacturer">Manufacturer <span class="red">*</span></label>
                                                    <input type="text" class="form-control" id="exampleInputManufacturer" name="manufacturer" value="{{ $items->manufacturer }}" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputPriceCost">Price Cost <span class="red">*</span></label>
                                                    <input type="number" step="any" class="form-control" id="exampleInputPriceCost" name="price_cost" value="{{ $items->price_cost }}" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputBarcode">Barcode</label>
                                                    <input type="text" class="form-control" id="exampleInputBarcode" name="barcode" value="{{ $items->barcode }}" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputProdCode">Product Code</label>
                                                    <input type="text" class="form-control" id="exampleInputProdCode" name="product_code" value="{{ $items->product_code }}" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputExpireDate">Test And Tag Expire Date</label>
                                                    <input type="text" class="form-control basic-datepicker" id="exampleInputExpireDate" name="expire_date" value="{{ $items->expire_date }}" aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Company</label>
                                                    <select data-plugin="customselect" name="company_id"
                                                        class="form-select">
                                                        <option selected disabled>Please select one or start typing</option>
                                                        @foreach($companies as $data)
                                                            <option value="{{$data->id}}" @if($items->company != null) {{$data->id == $items['company']->id ? 'selected' : '' }} @endif>{{$data->business_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label class="form-label" for="exampleInputEmail1">Website</label>
                                                    <input type="text" class="form-control"
                                                        name="website" id="exampleInputEmail1" value="{{$items->website}}"
                                                        aria-describedby="emailHelp" placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <div class="checkbox checkbox-success">
                                                        <input id="is_unique" {{ $items->is_unique == "1" ? 'checked' : '' }} value="1" type="checkbox">
                                                        <label class="form-label" for="is_unique">
                                                            Is this item UNIQUE?
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Description <span class="red">*</span></label>
                                                    <textarea name="description" required class="form-control">{{ $items->description }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Observation</label>
                                                    <textarea name="observation"  class="form-control">{{ $items->observation }}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Attachment</label>
                                                    <input name="uploadAttachment" @if($items->attachment) data-default-file="{{url(env('STORE_PATH') .$items->attachment)}}" @endif type="file" class="dropify" data-height="100" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- <div class="bottom_footer_dt">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="action_btns">
                                                    <button type="submit" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                                                    <a href="{{route('storage.items.index')}}" class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
                                                    <a href="#" class="theme_btn btn-success btn" data-bs-toggle="modal" data-bs-target="#maintenance"><i class="uil-briefcase"></i> Maintenance</a>
                                                    <a href="#" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- main_bx_dt -->
                            </div>
                            <div class="tab-pane " id="profile">
                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="mb-3 mt-3 mt-sm-0">
                                                    <label class="form-label">Type of Document</label>
                                                    <select data-plugin="customselect" id="item_imgtype" class="form-select">
                                                        <option selected disabled>Please select one or start typing</option>
                                                        <option value="SDS">SDS</option>
                                                        <option value="Manual">Manual</option>
                                                        <option value="Tset And Tag">Tset And Tag</option>
                                                        <option value="Maintenance Diagnostic">Maintenance Diagnostic</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12" id="documentFilesDocs">
                                                <div class="mb-3" id="documentFilesDocsDiv1">
                                                    <label class="form-label">Upload Attachment</label>
                                                    <input id="documentFiles1" name="documentImages[]" type="file" class="dropify" data-height="100" />
                                                </div>
                                                <span id="documentFilesError" class="text-danger" hidden>This field is required.</span>
                                            </div>

                                            {{-- <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Attachment</label>
                                                    <input name="file1" type="file" class="dropify" data-height="100" />
                                                </div>
                                            </div> --}}

                                            <div class="col-lg-12">
                                                <div class="add_address text-end">
                                                    <button type="button" onclick="addDocument()" class="theme_btn btn add_btn" >Add Item Documents</button>
                                                    <button type="button" onclick="resetDocument()" class="theme_btn btn btn-primary"><i class="bi-arrow-repeat"></i> Reset</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-3">
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Attachment</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="add_document_tr">
                                                        @if ($ItemAddon)
                                                            @foreach ($ItemAddon as $iaddon)
                                                            <tr id="documentsitems{{$iaddon->id}}">
                                                                <td>{{$iaddon->item_type}} </td>
                                                                <td><a target="_blank" href="{{url(env('STORE_PATH').$iaddon->image)}}">View Attachment</a> </td>
                                                                <td>
                                                                    <button type="button" onclick="deleteRecord({{$iaddon->id}},'ManageItemAddon','documentsitems{{$iaddon->id}}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button>
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
                                <!-- main_bx_dt -->
                            </div>
                            <div class="bottom_footer_dt">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="action_btns">
                                            <button type="button" onclick="validateForm()" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                                            <a href="{{route('storage.items.index')}}" class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
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

        </div>
        <!-- end row -->

    </div>
    <!-- container -->


@endsection
@push('push_script')
    <script>
        var filenumber = 1;
        function addDocument(){
            let siteval = $("#item_imgtype").val();

            var documentFile = $(`#documentFiles${filenumber}`)[0].files[0];
            $("#documentFilesError").attr('hidden',true);
            if (documentFile) {
                $(`#documentFilesDocsDiv${filenumber}`).hide();
                filenumber += 1;
                var $newFileInput = $(`<div class="mb-3" id="documentFilesDocsDiv${filenumber}"><input id="documentFiles${filenumber}" name="documentImages[]" type="file" class="dropify" data-height="100" /></div>`);
                $('#documentFilesDocs').append($newFileInput);
                $('.dropify').dropify();
            }
            if(!documentFile || documentFile.name == ""){
                $("#documentFilesError").attr('hidden',false);
            }else{
                let microtime = Date.now();
                $("#add_document_tr").append(`
                <tr id="documentsitems${microtime}">
                    <td>${siteval} <input type="hidden" name="item_type[]" value="${siteval}"> </td>
                    <td>${documentFile.name}</td>
                    <td>
                        <button type="button" onclick="deleteTabletr('documentsitems${microtime}')" class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i class="uil-trash"></i></button>
                    </td>
                </tr>
            `);
            }

        }

        function resetDocument(filenumberS) {
            $("#documentFiles1").val('');
            $("#item_imgtype").text('');
            if (filenumberS) {
                $(`#documentFiles1${filenumberS}`).parent().find(".dropify-clear").trigger('click');
            } else {
                $("#documentFiles1").parent().find(".dropify-clear").trigger('click');
            }
        }

        function validateForm() {
            let isValid = true;
            $('#myForm [required]').each(function() {
                if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() == 0))) {
                    console.log($(this));
                    isValid = false;
                    $(this).addClass('is-invalid');
                    $('#' + $(this).closest('.tab-pane').attr('id') + 'Tab').tab('show');
                    $(this).focus();
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
            if (isValid) {
                $('#myForm').submit();
            }
        }

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
                        }else {
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

        function deleteRecord(docId,table_name,divname) {
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
                            headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                            data: {
                                "data_id": docId,
                                "table_name":table_name
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result.status) {
                                    swal({
                                        type:'success',
                                        title: 'Deleted!',
                                        text: 'Deleted',
                                        timer: 3000
                                    });
                                    deleteTabletr(divname);
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
    </script>
@endpush