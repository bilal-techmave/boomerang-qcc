@extends('layouts.main')
@section('app-title','Storage - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Storage</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Storage Management</li>
                        <li class="breadcrumb-item active">Storage</li>
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
                       <h5>All Storage</h5>
                       <a href="{{route('storage.storage.create')}}" class="btn btn-primary">+ Add New Storage</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Quantity of Items</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allstroage)
                                @foreach ($allstroage as $stroage)
                                    @php    
                                        $item_qty = 0;
                                        foreach($stroage['storageItems'] as $data){
                                             $item_qty += $data->qty; 
                                        }
                                    @endphp
                                    <tr role="row" class="odd">
                                        <td>{{ $loop->iteration  }}</td>
                                        <td >{{ $stroage->name }}</td>
                                        <td>{{ $stroage->street_address }}</td>
                                        <td>{{ $item_qty }}</td>
                                        <td>
                                            <div class="status_dp">
                                                <select class="status_" onchange="statusChange(this,'{{$stroage->id}}','manage_storages')">
                                                    <option value="1" {{$stroage->status == '1' ? 'selected' : ''}} >Active</option>
                                                    <option value="0" {{$stroage->status == '0' ? 'selected' : ''}}>Deactive</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{route('storage.storage.show',['storage'=>$stroage])}}"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i>
                                            </span></a>
                                            <a href="{{route('storage.storage.edit',['storage'=>$stroage])}}"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i>
                                            </span></a>
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
@endsection




@push('push_script')
    <script>
        function statusChange(that,id,tdata){
            let status = $(that).val();
        //    alert(status);
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