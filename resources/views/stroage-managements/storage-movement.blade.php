@extends('layouts.main')
@section('app-title', 'Storage View - Quality Commercial Cleaning')
@section('main-content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Write Storage Movement</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Storage Management</li>
                        <li class="breadcrumb-item active">Write Storage Movement</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
    <div class="col-lg-12">
        <div class="card border-none">
            <div class="card-body p-0">

                <form action="{{ route('storage.addmovement') }}" method="post" id="myForm" enctype="multipart/form-data">  @csrf
                <div id="smartwizard-arrows">
                    <ul>
                        <li><a href="#sw-arrows-step-1">Step 1</a></li>
                        <input type="hidden" value="" id="storageId"/>
                        <input type="hidden" value="" name="table_data" id="tableDataInput">
                        <li><a href="#sw-arrows-step-2">Step 2</a></li>
                        <li><a href="#sw-arrows-step-3">Step 3</a></li>

                        <li class="sw-arrows-step-4"><a href="#sw-arrows-step-4">Step 4</a></li>


                    </ul>
                    <div class="p-3">
                        <div id="sw-arrows-step-1">
                            <div class="row">


                                <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="exampleInputEmail1">Action</label>
                                                <select data-plugin="customselect" name="action" id="action" class="form-select">
                                                    <option value="PURCHASE">Purchase</option>
                                                    <option value="MANUAL_TRANSFER">Manual Transfer</option>
                                                    <option value="FINISHED">Finished</option>
                                                    <option value="RETIREMENT">Retirement</option>
                                                </select>
                                        </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Storage</label>
                                        <select data-plugin="customselect" name="storage_id" id="storageItem" class="form-select select2-hidden-accessible" data-select2-id="select2-data-storage_id">
                                            <option selected disabled>Select Any One</option>
                                            @forelse ($manageStorage as $allmanageStorage)
                                            <option value="{{ $allmanageStorage->id }}">{{ $allmanageStorage->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                            </div> <!-- end row -->
                        </div>





                        <div id="sw-arrows-step-2">
                            <div class="row">
                                <div class="col-12">
                                 <div class="table_box">
                                 <table id="basic-datatable" class="table table-bordered  dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Picture</th>
                                        <th>ID</th>
                                        <th>Barcode</th>
                                        <th>Name</th>
                                        <th>Manufacturer</th>
                                        <th>Type</th>
                                        <th>Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>



                            @forelse ($manageItem as $allmanageItem)


                            <tr id="appendItems" role="row" class="odd">
                                <td>{{ $loop->iteration }}</td>
                                <td style="max-height: 40px; max-width: 40px" >
                                    <figure class="profile-picture">
                                            <img src="{{url(env('STORE_PATH') . $allmanageItem->attachment . '') }}" style="max-height: 40px; max-width: 40px">
                                    </figure>
                                </td>
                                <td>{{ $allmanageItem->id }}</td>
                                <td id="barcode_{{ $allmanageItem->id }}">{{ $allmanageItem->barcode }}</td>
                                <td id="name_{{ $allmanageItem->id }}">{{ $allmanageItem->name }}</td>
                                <td id="manufacturer_{{ $allmanageItem->id }}">{{ $allmanageItem->manufacturer }}</td>
                                <td id="type_{{ $allmanageItem->id }}">{{ $allmanageItem->type	 }}</td>
                                {{-- <td><input class="form-control" name="qty" type="number" id="newQuantity1" value="1"></td> --}}
                                <td><input class="form-control" name="qty" type="number" id="newQuantity_{{ $allmanageItem->id }}" min="1"value="1"></td>
                                <td>
                                    <button type="button" onclick="additem(`{{ $allmanageItem->id }}`)" class="btn btn-success waves-effect waves-light table-btn-custom pluscls add_pr" id="add_pr"><i class="uil-plus"></i></button>
                                    <button type="button" onclick="additem(`{{ $allmanageItem->id }}`)" class="btn btn-danger waves-effect waves-light table-btn-custom remove_pr" id="remove_pr"><i class="uil-minus"></i></button>
                                </td>

                            </tr>
                            @empty

                            @endforelse

                                </tbody>

                        </table>
                                 </div>
                                </div>
                                <!-- end col -->
                            </div> <!-- end row -->
                        </div>


                        <div id="sw-arrows-step-3">
                            <div class="row">
                                <div class="col-12">
                                <div class="table_box">
                                 <table id="basic-datatable" class="table table-bordered  dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            {{-- <th>ID</th> --}}
                                            <th>Barcode</th>
                                            <th>Name</th>
                                            <th>Manufacturer</th>
                                            <th>Type</th>
                                            <th>Quantity</th>
                                            <th id="qtyMov" style="display:none;">Quantity Movement</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                <tbody id="appendItem">
                                    {{-- <tr role="row" class="odd">
                                        <td>1</td>
                                        <td>13</td>
                                        <td>Carpet macine</td>
                                        <td>Polivac</td>
                                        <td>Machine</td>
                                        <td style="width:150px"><input class="form-control" type="number" id="newQuantity1" value="0"></td>
                                        <td>

                                            <button type="button" class="btn btn-danger waves-effect waves-light table-btn-custom"><i class="uil-minus"></i></button>
                                        </td>
                                    </tr> --}}
                                </tbody>




                        </table>
                                 </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                            <button type="button" onclick="submitForm()" id="save-button" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                        </div>


                        <div class="sw-arrows-step-4" id="sw-arrows-step-4">

                            <div class="row" id="purchase">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Document Reference Number</label>
                                        <input type="text" name="documentReferenceNumber" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Please insert the reason of the purchase</label>
                                        <textarea name="p_reason" class="form-control"></textarea>
                                    </div>
                                </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Upload the reference document</label>
                                      <input name="documentType" type="file" class="dropify" data-height="100" />
                                </div>
                            </div>
                                 <!-- end col -->
                               </div>
                             <!-- end row -->
                             <div class="row" id="manual-transfer">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Storage to insert Item</label>
                                        <select data-plugin="customselect" name="storage_transfer" id="storageItem" class="form-select">
                                            <option selected disabled>Select Any One</option>
                                            @forelse ($manageStorage as $allmanageStorage)
                                            <option value="{{ $allmanageStorage->id }}">{{ $allmanageStorage->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">Please insert the reason for this manual transfer</label>
                                        <textarea name="t_reason" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                             <button type="button" onclick="submitForm()" class="theme_btn btn save_btn"><i class="bi bi-save"></i> Save</button>
                        </div>
                    </div>

                </div>
            </form>
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    </div>
    <!-- end row -->

</div>
<!-- container -->


<script>
    $(function() {
        $('#storageItem').change(function(){
                let storageId=$(this).val();
                        $('#storageId').val(storageId);
                    });
                });
 </script>
 <script>
    $(document).ready(function() {
        $('.remove_pr').hide();
        $('.add_pr').click(function() {
            $(this).siblings('.remove_pr').show();
            $(this).hide();
        });
        $('.remove_pr').click(function() {
            $(this).siblings('.add_pr').show();
            $(this).hide();
        });
    });
</script>

@endsection