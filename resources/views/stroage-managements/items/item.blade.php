@extends('layouts.main')
@section('app-title','Item - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Item</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Storage Management</li>
                        <li class="breadcrumb-item active">Item</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="top_section_title">
                        <h5>Filters</h5>
                    </div>
                </div>
                <form action="{{ route('storage.itemFilter') }}" method="post"> @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="mb-0">
                                <label class="form-label" for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-0">
                                <label class="form-label" for="exampleInputEmail1">Manufacturer</label>
                                <input type="text" class="form-control" name="manufacturer" value="{{ $manufacturer}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-0">
                                <label class="form-label" for="exampleInputEmail1">Type</label>
                                <input type="text" class="form-control" name="type" value="{{ $type}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-0">
                                <label class="form-label" for="exampleInputEmail1">Product Code</label>
                                <input type="text" class="form-control" name="product_code" value="{{ $product_code}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom_footer_dt">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="theme_btn btn save_btn"><i class="uil-search-alt" id="work_search"> Search</i></button>
                            <a href="{{ route('storage.items.index') }}" class="theme_btn btn btn-warning"><i class="bi-arrow-repeat"></i> Reset Filter</i></a>
                        </div>
                    </div>
                </div>
                </form>




            </div>
            <div class="card">
                <div class="card-header">
                    <div class="top_section_title">
                        <h5>All Item</h5>
                       @can('storage-item-create') <a href="{{route('storage.items.create')}}" class="btn btn-primary">+ Add New Item</a> @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table_box">
                        <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    {{-- <th>Picture</th> --}}
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Manufacturer</th>
                                    <th>Type</th>
                                    <th>Product Code</th>
                                    <th>Barcode</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($allitems)
                                    @foreach ($allitems as $item)
                                        <tr role="row" class="odd">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name}}</td>
                                            <td>{{ $item->manufacturer}}</td>
                                            <td>{{ $item->type}}</td>
                                            <td>{{ $item->product_code}}</td>
                                            <td>{{ $item->barcode}}</td>
                                            <td>
                                                @if(auth()->user()->role=='admin' || auth()->user()->canAny(['storage-item-activate,storage-item-deactivate']))
                                                <div class="status_dp">
                                                    <select class="status_" onchange="statusChange(this,'{{$item->id}}','manage_items')">>
                                                        @can('storage-item-activate') <option value="active" {{$item->status == 'active' ? 'selected' : ''}}>Active</option> @endcan
                                                        @can('storage-item-deactivate') <option value="inactive" {{$item->status == 'inactive' ? 'selected' : ''}}>Inactive</option> @endcan
                                                    </select>
                                                </div>
                                                @else
                                                    {{ $item->status == 1 ? 'Active' : 'Inactive' }}
                                                @endif
                                            </td>
                                            <td>
                                               @can('storage-item-view') <a href="{{route('storage.items.show',['item'=>$item->id])}}"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                                    </span></a> @endcan
                                                @can('storage-item-edit') <a href="{{route('storage.items.edit',['item'=>$item->id])}}"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                                    </span></a> @endcan
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
@endsection


@push('push_script')
    <script>
        function statusChange(that,id,tdata){
            let status = $(that).val();
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

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