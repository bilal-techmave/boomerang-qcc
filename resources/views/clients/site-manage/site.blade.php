@extends('layouts.main')
@section('app-title', 'Sites - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sites</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Sites</li>
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
                    <form action="" method="GET">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Client</label>
                                        <select data-plugin="customselect" id="client_idselect" name="client" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @if ($clients)
                                                @foreach ($clients as $clnt)
                                                    {{-- <option value="{{$clnt->id}}">{{$clnt->business_name}}</option> --}}
                                                    <option value="{{ $clnt->id }}"
                                                        {{ request('client') == $clnt->id ? 'selected' : '' }}>
                                                        {{ $clnt->business_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Portfolio</label>
                                        <select data-plugin="customselect" name="portfolio" id="portfolio_idselect" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @if ($client_portfolios)
                                                @foreach ($client_portfolios as $portfolio)
                                                    {{-- <option value="{{$portfolio->id}}">{{$portfolio->full_name}}</option> --}}
                                                    <option value="{{ $portfolio->id }}"
                                                        {{ request('portfolio') == $portfolio->id ? 'selected' : '' }}>
                                                        {{ $portfolio->full_name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Cleaner</label>
                                        <select data-plugin="customselect" id="cleaner_select" name="cleaner" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @if ($cleaners)
                                                @foreach ($cleaners as $cleaner)
                                                    <option value="{{ $cleaner->id }}"
                                                        {{ request('cleaner') == $cleaner->id ? 'selected' : '' }}>
                                                        {{ $cleaner->name }}</option>

                                                    {{-- <option value="{{$cleaner->id}}">{{$cleaner->name}}</option> --}}
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="reference_select">Reference / Building </label>
                                        <input type="text" class="form-control"
                                            name="building"value="{{ request('building') }}" id="reference_select"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="supervisor_select">Supervisor</label>
                                        <select data-plugin="customselect" name="supervisor" id="supervisor_select" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @if ($supervisors)
                                                @foreach ($supervisors as $supervisor)
                                                    <option value="{{ $supervisor->id }}"
                                                        {{ request('supervisor') == $supervisor->id ? 'selected' : '' }}>
                                                        {{ $supervisor->name }}</option>
                                                    {{-- <option value="{{$supervisor->id}}">{{$supervisor->name}}</option> --}}
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">State </label>
                                        <select data-plugin="customselect" id="state_select"  name="state" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @if ($states)
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ request('state') == $state->id ? 'selected' : '' }}>
                                                        {{ $state->state_name }}</option>

                                                    {{-- <option value="{{$state->id}}">{{$state->state_name}}</option> --}}
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">City </label>
                                        <select data-plugin="customselect" name="city" id="city_select" class="form-select">
                                            <option value="">Please select one or start typing</option>
                                            @if ($cities)
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ request('city') == $city->id ? 'selected' : '' }}>
                                                        {{ $city->city_name }}</option>

                                                    {{-- <option value="{{$city->id}}">{{$city->city_name}}</option> --}}
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Regular Site</label>
                                        <select data-plugin="customselect" name="regular_Site" id="regular_site_select" class="form-select">
                                            <option value="">All</option>
                                            <option value="1" {{ request('regular_Site') === '1' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="0" {{ request('regular_Site') === '0' ? 'selected' : '' }}>
                                                Inactive</option>
                                            {{-- <option value="1">Yes</option>
                                    <option value="0">No</option> --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Active</label>
                                        <select data-plugin="customselect" name="status" class="form-select">
                                            <option value="">All</option>
                                            <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>
                                                Inactive</option>
                                            {{-- <option value="1">Yes</option>
                                    <option value="0">No</option> --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="heme_btn btn save_btn" value="Submit"
                                        class="btn btn-primary" fdprocessedid="rre3os"><i
                                            class="uil-search-alt"></i>Search</button>
                                    <a href="{{ route('client.site.index') }}" class="theme_btn btn btn-warning"><i
                                            class="bi-arrow-repeat"></i> Reset Filter</i></a>
                                            <a style="float: right;" id="exportdatahref" href="{{route('export.data',['page'=>'sites'])}}" class="btn btn-dark bi-file-earmark-excel"> Export Data</a> 
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>All Sites</h5>
                            @can('site-create') <a href="{{ route('client.site.create') }}" class="btn btn-primary">+ Add New Site</a> @endcan
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                <div class="table-responsive">
                                    <div class="table_box">
                                        <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <td hidden></td>
                                                    <th>Site Code</th>
                                                    <th>Address</th>
                                                    <th>Suburb</th>
                                                    <th>Reference / Building</th>
                                                    <th>Portfolio</th>
                                                    <th>Client</th>
                                                    <th>Active</th>
                                                    <th>Regular Site</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($sites_data)
                                                    @foreach ($sites_data as $site)

                                                        <tr role="row" class="odd">
                                                            <td hidden></td>
                                                            <td>{{ $site->internal_code }}</td>
                                                            <td class="max-lines">{{ $site->unit ?? '' }}
                                                                {{ $site->address_number ?? '' }}
                                                                {{ $site->street_address ?? '' }}</td>
                                                            <td>{{ $site->suburb }}</td>
                                                            <td>{{ $site->reference }}</td>
                                                            <td class="max-lines">{{ $site->full_name ?? '' }}
                                                            </td>
                                                            <td class="max-lines">{{ $site->business_name ?? '' }}
                                                            </td>
                                                            <td>
                                                                @if ($site->status == '1')
                                                                    <i class="uil-check-circle status-entity"
                                                                        style="color:rgb(0, 170, 23)"></i>
                                                                @else
                                                                    <i class="uil-times-circle status-entity"
                                                                        style="color:red"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($site->is_regular_site == 1)
                                                                    <i class="uil-check-circle status-entity"
                                                                        style="color:rgb(0, 170, 23)"></i>
                                                                @else
                                                                    <i class="uil-times-circle status-entity"
                                                                        style="color:red"></i>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @can('site-view') <a
                                                                    href="{{ route('client.site.show', ['site' => $site->id]) }}"><span
                                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                            class="uil-eye"></i></span></a> @endcan
                                                                            @can('site-edit') <a
                                                                    href="{{ route('client.site.edit', ['site' => $site->id]) }}"><span
                                                                        class="btn btn-warning waves-effect waves-light table-btn-custom"><i
                                                                            class="uil-edit"></i></span></a> @endcan
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

        $("#client_idselect").change(function(){
        let clientid = $(this).val();

        $.ajax({
            url: "{{ route('common.client-portfolio') }}",
            type: 'POST',
            data: {
                client_id:clientid
            },
            dataType: 'json',
            success: function (data) {
                if(data.status){
                    $("#portfolio_idselect").empty();
                    let dataPort = data.data;
                    $('#portfolio_idselect').append($('<option>', {
                            value: 0, // replace 'value' with the actual property name in your data
                            text: 'Please select one or start typing' // replace 'text' with the actual property name in your data
                        }));
                    $.each(dataPort, function(index, item) {
                        $('#portfolio_idselect').append($('<option>', {
                            value: item.id, // replace 'value' with the actual property name in your data
                            text: item.full_name // replace 'text' with the actual property name in your data
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
        var cleaner=$('#cleaner_select').val();
        var building=$('#reference_select').val();
        var supervisor=$('#supervisor_select').val();
        var state=$('#state_select').val();
        var city=$('#city_select').val();
        var regular_Site=$('#regular_site_select').val();

        var currentUrl = $("#exportdatahref").attr('href');
        if(currentUrl){
            var url = new URL(currentUrl);
            
            if(client) url.searchParams.set("client", client);
            if(portfolio) url.searchParams.set("portfolio", portfolio);
            if(cleaner) url.searchParams.set("cleaner", cleaner);
            if(building) url.searchParams.set("building", building);
            if(supervisor) url.searchParams.set("supervisor", supervisor);
            if(state) url.searchParams.set("state", state);
            if(city) url.searchParams.set("city", city);
            if(regular_Site) url.searchParams.set("regular_Site", regular_Site);
        }

        $("#exportdatahref").attr('href',url);
    }

    $(document).ready(function (){
        filterCustomReports();
    });
</script>
@endpush



