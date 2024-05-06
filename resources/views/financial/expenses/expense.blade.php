@extends('layouts.main')
@section('app-title','Expenses - Quality Commercial Cleaning')
@section('main-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Expenses</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Financial Settings</li>
                        <li class="breadcrumb-item active">Expenses</li>
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
                       <h5>All Expenses</h5>
                      @can('expenses-create') <a href="{{route('financial.expense.create')}}" class="btn btn-primary">+ Add Expenses</a> @endcan
                    </div>

                </div>
                <div class="card-body">
                <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Amount</th>
                                <th>Financial Account</th>
                                <th>Expense Type</th>
                                <th>Due Date</th>
                                <th>Creation Date</th>
                                <th>Supplier</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                            <tr role="row" class="odd">
                                <td>{{ $loop->iteration }}</td>
                                <td >{{$expense->amount}}</td>
                                <td>{{$expense->account_name}}</td>
                                <td>{{$expense->expense_type_name}}</td>
                                <td>{{date('d/m/Y',strtotime($expense->due_date))}}</td>
                                <td>{{date('d/m/Y',strtotime($expense->created_at))}}</td>
                                <td>{{$expense->name}}</td>
                                <td>
                                    @can('expenses-view')
                                        <a href="{{route('financial.expense.show',['expense'=>$expense->id])}}">
                                            <span class="btn btn-primary waves-effect waves-light table-btn-custom"><i class="uil-eye"></i> </span>
                                        </a>
                                    @endcan
                                    @can('expenses-edit')
                                        <a href="{{route('financial.expense.edit',['expense'=>$expense->id])}}">
                                            <span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i></span>
                                        </a>
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
