@extends('layouts.main')
@section('app-title','Missed Clean - Quality Commercial Cleaning')
@section('main-content')
<style>
    .select2-dropdown{
        z-index: 100 !important;
    }
</style>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Missed Clean</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Operational Dashboard</li>
                        <li class="breadcrumb-item active">Missed Clean</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <form>
                <div class="card">
                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>Filters</h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Client</label>
                                    <select data-plugin="customselect" id="client_idselect" name="client" class="form-select">
                                        <option value="">Please select one or start typing</option>
                                        @if ($clients)
                                        @foreach ($clients as $clnt)
                                        <option value="{{ $clnt->id }}" {{ request('client') == $clnt->id ? 'selected' : '' }}>
                                            {{ $clnt->business_name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Portfolio</label>
                                    <select data-plugin="customselect" id="portfolio_idselect" name="portfolio" class="form-select">
                                        <option value="">Please select one or start typing</option>
                                        @if ($client_portfolios)
                                        @foreach ($client_portfolios as $portfolio)
                                        <option value="{{ $portfolio->id }}" {{ request('portfolio') == $portfolio->id ? 'selected' : '' }}>
                                            {{ $portfolio->full_name }}
                                        </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Site</label>
                                    <select data-plugin="customselect" id="site_idselect" class="form-select" name="site">
                                        <option value="">Please select one or start typing</option>
                                        @forelse ($clientSite as $site)
                                        <option value="{{ $site->id }}" {{ request('site') == $site->id ? 'selected' : '' }}>
                                            {{ $site->reference ??'' }}
                                        </option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-0">
                                    <label class="form-label" for="exampleInputEmail1">Portfolio Manager</label>
                                    <select data-plugin="customselect" class="form-select" id="portfolio_manager" name="manager">
                                        <option value="">Please select one or start typing</option>
                                        @if ($portfolioManagers)
                                        @foreach ($portfolioManagers as $puser)
                                        <option {{ request('manager') == $puser->id ? 'selected' : '' }} value="{{ $puser->id }}">{{ $puser->name }} {{ $puser->surname }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-0">
                                    <label class="form-label" for="exampleInputEmail1">Missed Clean Date From </label>
                                    <input type="text" class="form-control basic-datepicker" name="date_from" value="{{request('date_from')}}" id="basic-datepicker" aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-0">
                                    <label class="form-label" for="exampleInputEmail1">Missed Clean Date To</label>
                                    <input type="text" class="form-control basic-datepicker" name="date_to" value="{{request('date_to')}}" id="basic-datepicker2" aria-describedby="emailHelp" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom_footer_dt">
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="theme_btn btn save_btn"><i class="uil-search-alt"> Search</i></button>
                                <a href="{{route('operational.missed.clean')}}" class="theme_btn btn btn-warning"><i class="bi-arrow-repeat"></i> Reset
                                    Filter</i></a>
                                <a style="float: right;" id="exportdatahref" href="{{route('export.data',['page'=>'missed-clean'])}}" class="btn btn-dark bi-file-earmark-excel"> Export Data</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <div class="card">

                <div class="card-header">
                    <div class="top_section_title">
                        <h5>All Missed Clean</h5>
                        {{-- <a href="hide-list.php" class="btn btn-primary">View Hide List</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 mt-3">
                            <div class="table_box">
                                <table id="basic-datatable" class="table table-bordered table-striped  nowrap w-100">
                                    <thead>
                                        <tr>

                                            <th>Client</th>
                                            <th>Portfolio</th>
                                            <th>Portfolio Manager</th>
                                            <th>Reference / Building (Site)</th>
                                            <th>State</th>
                                            <th>Cleaner</th>
                                            <th>Shift Time</th>
                                            <th>Missed Date</th>
                                            {{-- <th>Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($missedClean)
                                        @foreach ($missedClean as $mclean)
                                        <tr role="row" class="odd">
                                            <td>{{$mclean->business_name ?? ''}} </td>
                                            <td>{{$mclean->full_name ?? ''}}</td>
                                            <td>{{$mclean->name ?? ''}}</td>
                                            <td>{{$mclean->reference ?? ''}}</td>
                                            <td>{{$mclean->state_name ?? ''}}</td>
                                            <td>{{$mclean->cleaner_fname ?? ''}} {{$mclean->cleaner_sname ?? ''}}</td>
                                            <td>{{$mclean->avaliable_start_time ?? ''}}-{{$mclean->avaliable_end_time ?? ''}}</td>
                                            <td>{{$mclean->date_missed}}</td>
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
    $("#client_idselect").change(function() {
        let clientid = $(this).val();

        $.ajax({
            url: "{{ route('common.client-portfolio') }}",
            type: 'POST',
            data: {
                client_id: clientid
            },
            dataType: 'json',
            success: function(data) {
                if (data.status) {
                    $("#portfolio_idselect").empty();
                    $("#site_idselect").empty();
                    let dataPort = data.data;
                    let sitesData = data.sites;
                    $('#portfolio_idselect').append($('<option>', {
                        value: 0, // replace 'value' with the actual property name in your data
                        text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
                    }));
                    $('#site_idselect').append($('<option>', {
                        value: 0, // replace 'value' with the actual property name in your data
                        text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
                    }));
                    $.each(dataPort, function(index, item) {
                        $('#portfolio_idselect').append($('<option>', {
                            value: item.id, // replace 'value' with the actual property name in your data
                            text: item.full_name // replace 'text' with the actual property name in your data
                        }));
                    });
                    $.each(sitesData, function(index, item) {
                        $('#site_idselect').append($('<option>', {
                            value: item.site.id, // replace 'value' with the actual property name in your data
                            text: item.site.reference // replace 'text' with the actual property name in your data
                        }));
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    });

    $("#portfolio_idselect").change(function() {
        let portfolio_id = $(this).val();

        $.ajax({
            url: "{{ route('common.client-portfolio') }}",
            type: 'POST',
            data: {
                portfolio_id: portfolio_id
            },
            dataType: 'json',
            success: function(data) {
                if (data.status) {
                    $("#site_idselect").empty();
                    let dataPort = data.data;
                    $('#site_idselect').append($('<option>', {
                        value: 0, // replace 'value' with the actual property name in your data
                        text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
                    }));
                    $.each(dataPort, function(index, item) {
                        $('#site_idselect').append($('<option>', {
                            value: item.site.id, // replace 'value' with the actual property name in your data
                            text: item.site.reference // replace 'text' with the actual property name in your data
                        }));
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching data:', error);
            }
        });
    });
</script>

<script>
    function filterCustomReports()
    {
        var client=$('#client_idselect').val();
        var portfolio=$('#portfolio_idselect').val();
        var site=$('#site_idselect').val();
        var manager=$('#portfolio_manager').val();
        var date_from=$('#basic-datepicker').val();
        var date_to=$('#basic-datepicker2').val();

        var currentUrl = $("#exportdatahref").attr('href');
        if(currentUrl){
            var url = new URL(currentUrl);

            if(date_from) url.searchParams.set("date_from", date_from);
            if(date_to) url.searchParams.set("date_to", date_to);
            
            if(client) url.searchParams.set("client", client);
            if(portfolio) url.searchParams.set("portfolio", portfolio);
            if(site) url.searchParams.set("site", site);
            if(manager) url.searchParams.set("manager", manager);
        }

        $("#exportdatahref").attr('href',url);
    }

    $(document).ready(function (){
        filterCustomReports();
    });
</script>



@endpush