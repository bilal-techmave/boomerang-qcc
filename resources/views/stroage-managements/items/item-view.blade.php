@extends('layouts.main')
@section('app-title', 'View Item - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Item View</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Storage Management</li>
                            <li class="breadcrumb-item active">Item View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-0">
                    <div class="card-header card_header_prospect">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <span><i class="uil-info-circle"></i></span>
                                    <span>Basic Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                    <span><i class="bi bi-journals"></i></span>
                                    <span>Item</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#maintenance" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                    <span><i class="uil-bright"></i></i></span>
                                    <span>Maintenance</span>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="card show_portfolio_tab mt-2">

                    <div class="card-body">

                        <div class="tab-content prospect_content  text-muted">
                            <div class="tab-pane show active" id="home">

                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-6 border-right-dashed">
                                            <div class="detail_box pe-4">
                                                <ul>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Name</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->name }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Type</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->type }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Serial</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->serial }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Supplier</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->supplier->name ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Manufacturer</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->manufacturer }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Price Cost</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->price_cost }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Barcode</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->barcode }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Product Code</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->product_code }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Test And Tag Expire Date</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $items->expire_date }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Website</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$items->website ?? '-----'}}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Company </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{$items['company']->business_name ?? '-----'}}</h6>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="detail_box ps-4">

                                                <div class="detail_box">
                                                    <h6>Description</h6>
                                                    <p>{{ $items->description ?? '-----' }}</p>
                                                </div>
                                                <div class="detail_box">
                                                    <h6>Observation</h6>
                                                    <p>{{ $items->observation ?? '-----' }}</p>
                                                </div>
                                                <div class="detail_box">
                                                    <h6>Upload Attachment</h6>
                                                    <div class="attachment_img">
                                                        <img src="{{ url(env('STORE_PATH') . $items->attachment . '') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane " id="profile">
                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Attachment</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($ItemAddon as $allItemAddon)
                                                        <tr>
                                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                                            <td>{{ $allItemAddon->item_type }}</td>
                                                            <td><a target="_blank"
                                                                    href="{{ url(env('STORE_PATH') . $allItemAddon->image . '') }}">View
                                                                    Attachment</a></td>
                                                            <td><a onclick="removeItemData(this,'{{ $allItemAddon->id }}')"><span
                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                            class="uil-trash"></i></span></a></td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="maintenance">
                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Update Date</th>
                                                        <th>Updated By</th>
                                                        <th>Why is this item going to maintenance?</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($maintenances as $maintenance)
                                                        <tr>
                                                            {{-- <td>{{ $loop->iteration }}</td> --}}
                                                            <td>{{$maintenance->created_at ?? '--' }}</td>
                                                            <td>{{$maintenance->user->name ??'--'}}</td>
                                                            <td>{{$maintenance->comment ??'--'}}</td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('storage.items.index')}}" class="theme_btn btn-primary btn"><i class="uil-list-ul"></i> List</a>
        <a href="javascript:void(0)" data-bs-toggle="modal"
        data-bs-target="#maintenancemodal" class="theme_btn btn-warning btn"><i class="uil-bright"></i> Maintenance</a>
        @if($items->status == '1')
        @can('storage-item-activate') <button type="button" onclick="statusChange('0','{{$items->id}}','manage_items')" class="theme_btn btn btn-danger"><i class="uil-trash-alt"></i> Deactivate</button> @endcan
        @else
        @can('storage-item-deactivate') <button type="button" onclick="statusChange('1','{{$items->id}}','manage_items')" class="theme_btn btn btn-success"><i class="uil-shield-check"></i> Activate</button> @endcan
        @endif
    </div>
    <!-- end row -->

    </div>
    <!-- container -->

    <!-- Modal -->
<div class="modal fade" id="maintenancemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set this item to Maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('storage.items.maintenance',['item'=>$items->id])}}" method="POST"> @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="hidden" name="type" value="2">
                            <div class="mb-3 mt-3 mt-sm-0">
                                <label class="form-label">Why is this item going to maintenance?</label>
                                <textarea class="form-control" name="reason" required></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                </div>
            </form>
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
    </script>
    <script>
        function removeItemData(that, personId) {
            var label = "Address";
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
                            url: "{{ route('storage.delete.items') }}",
                            data: {
                                "itemId": personId,
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: 'json',
                            success: function(result) {
                                swal({
                                    type: 'success',
                                    title: 'Deleted!',
                                    text: 'Item Deleted',
                                    timer: 1000
                                });

                                if (that) {
                                    //delete specific row
                                    $(that).parent().parent().remove();
                                };
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal("Cancelled", label + " safe :)", "error");
                    }
                });
        }
    </script>
@if(auth()->user()->role=='admin' || auth()->user()->canAny(['storage-item-activate,storage-item-deactivate']))
<script>
    function statusChange(that,id,tdata){
        let status = that;

        $.ajax({
            url: "{{route('common.statusUpdate')}}",
            type: 'POST',
            data: {
                status: status,
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
                    location.reload();
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
@endcan
@endpush