@extends('layouts.main')
@section('app-title', 'All Suppliers - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Suppliers</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Suppliers</li>
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
                            <h5>All Suppliers</h5>
                            @can('supplier-create')<a href="{{ route('supplier.suppliers.create') }}" class="btn btn-primary">+ Add New
                                Supplier</a>@endcan
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="basic-datatable" class="table table-bordered table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>ABN</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplier as $suppliers)
                                <tr role="row" class="odd">
                                    <td>{{ $loop->iteration  }}</td>
                                    <td >{{$suppliers->name}}</td>
                                    <td>{{$suppliers->abn}}</td>
                                    <td>{{$suppliers->email}}</td>

                                    <td>
                                        @if(auth()->user()->role=='admin' || auth()->user()->canAny(['supplier-activate,supplier-deactivate']))
                                        <div class="status_dp">
                                            <select class="status_" onchange="statusChange(this,{{$suppliers->id}},'suppliers')">
                                                @can('supplier-activate')<option value="1" {{$suppliers->status == '1' ? 'selected':''}} >Active</option>@endif
                                                @can('supplier-deactivate') <option value="2" {{$suppliers->status == '2' ? 'selected' :''}} >Deactive</option> @endif
                                            </select>
                                        </div>
                                        @else
                                        {{ $suppliers->status == 1 ? 'Active' : 'Deactive' }}
                                        @endif
                                    </td>



                                    <td>
                                        @can('supplier-view')
                                        <a href="{{route('supplier.suppliers.show',['supplier'=>$suppliers->id])}}"><span
                                                class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                    class="uil-eye"></i>
                                            </span></a>
                                        @endcan

                                        @can('supplier-edit')
                                        <a href="{{route('supplier.suppliers.edit',['supplier'=>$suppliers->id])}}"><span
                                                class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                    class="uil-edit"></i>
                                            </span></a>
                                        @endcan

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('push_script')
@if(auth()->user()->role=='admin' || auth()->user()->canAny(['supplier-activate,supplier-deactivate']))
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
    @endif
@endpush
