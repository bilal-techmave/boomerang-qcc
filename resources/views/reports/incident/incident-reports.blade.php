@extends('layouts.main')
@section('app-title', 'Incident-report - Quality Commercial Cleaning')
@section('main-content')

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Incident Reports</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Compliance</li>
                            <li class="breadcrumb-item active">Incident Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <form method="GET" action="">
                    <div class="card">
                        <div class="card-header">
                            <div class="top_section_title">
                                <h5>Filters</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label">Client - Portfolio - Site
                                        </label>
                                        <select data-plugin="customselect" class="form-select"
                                            name="client_id">
                                            <option value="0">Please select one or start
                                                typing</option>
                                            @if ($allprotfolio)
                                                @foreach ($allprotfolio as $aprotf)
                                                    <option {{ request('client_id') == $aprotf->id ? 'selected' : '' }} value="{{ $aprotf->id }}">{{ $aprotf->protfolio->client->business_name }} - {{ $aprotf->protfolio->full_name }} - {{ $aprotf->site->reference }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Status</label>
                                        <select data-plugin="customselect" name="incident_status" class="form-select">
                                            <option value="0">Select Status</option>
                                            <option {{ request('incident_status') == "Created" ? 'selected' : '' }} value="Created">Created</option>
                                            <option {{ request('incident_status') == "Saved and Send" ? 'selected' : '' }} value="Saved and Send">Saved and Send </option>
                                            <option {{ request('incident_status') == "Closed" ? 'selected' : '' }} value="Closed">Closed </option>
                                            <option {{ request('incident_status') == "Solved" ? 'selected' : '' }} value="Solved">Solved </option>
                                            <option {{ request('incident_status') == "Re-Opened" ? 'selected' : '' }} value="Re-Opened">Re-Opened </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Date of Incident</label>
                                        <input type="text" name="incident_date" class="form-control basic-datepicker" value="{{request('incident_date')}}" id="r4" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Incident ID</label>
                                        <input type="text" class="form-control" id="basic" name="incident_id" value="{{request('incident_id')}}" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Creator</label>
                                        <select data-plugin="customselect" name="creator" class="form-select">
                                            <option value="0">Select the Creator</option>
                                            @forelse ($alluser as $user)
                                                <option {{ request('creator') == $user->id ? 'selected' : '' }} value="{{ $user->id }}" {{ request('incident_creator') == $user->id ? 'selected' : '' }}> {{ $user->name }} - ({{ $user->email }})</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button type="submit" class="theme_btn btn save_btn"><i class="uil-search-alt">
                                            Search</i></button>
                                    <a href="{{ route('incident.index') }}" class="theme_btn btn btn-warning"><i
                                            class="bi-arrow-repeat"></i> Reset Filter</i></a>
                                    <!-- <a href="#" class="theme_btn btn ">+ Add New Site</i></a> -->
                                    <!-- <a href="#" class="theme_btn btn excel-btn"><i class="bi-file-earmark-excel"></i> Export
                                            Excel File</i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="card">
                    @can('incident-report-create')
                        <div class="card-header">
                            <div class="top_section_title">
                                <h5>All Incident Reports </h5>
                                <a href="{{ route('incident.add') }}" class="btn btn-primary">+ Add Incident Report</a>
                            </div>
                        </div>
                    @endcan
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="table_box table-responsive">
                                    <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Incident ID</th>
                                                <th>Date of Incident</th>
                                                <th>Status</th>
                                                <th>Client</th>
                                                <th>Portfolio</th>
                                                <th>Site</th>
                                                <th>Address Of Incident</th>
                                                <th>Injury Incident</th>
                                                <th>Environmental Incident</th>
                                                <th>Other Incident</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($incidents as $incident)
                                                <tr role="row" class="odd">
                                                    <td>{{ $incident->id }}</td>
                                                    <td>{{ $incident->incident_date }}</td>
                                                    <td>{{ $incident->status }}</td>
                                                    <td>{{ $incident->incident_client->protfolio->client->business_name??'' }} - {{ $incident->incident_client->protfolio->full_name??'' }}  - {{ $incident->incident_client->site->reference??'' }}</td>
                                                    <td>{{ $incident->incident_date }}</td>
                                                    <td>{{ $incident->incident_date }}</td>
                                                    <td>{{ $incident->incident_address }}</td>
                                                    <td>
                                                        <?php if($incident->is_witness_check == 0){ ?>
                                                        <i class="uil-check-circle status-entity"
                                                            style="color:rgb(0, 170, 23)"></i>
                                                        <?php }else{?>
                                                        <i class="uil-times-circle status-entity" style="color:red"></i>
                                                        <?php }?>
                                                    </td>
                                                    <td>
                                                        <?php if($incident->is_environmental_incident == 0){ ?>
                                                        <i class="uil-check-circle status-entity"
                                                            style="color:rgb(0, 170, 23)"></i>
                                                        <?php }else{?>
                                                        <i class="uil-times-circle status-entity" style="color:red"></i>
                                                        <?php }?>
                                                    </td>
                                                    <td>
                                                        <?php if($incident->other_details == 0){ ?>
                                                        <i class="uil-check-circle status-entity"
                                                            style="color:rgb(0, 170, 23)"></i>
                                                        <?php }else{?>
                                                        <i class="uil-times-circle status-entity" style="color:red"></i>
                                                        <?php }?>
                                                    </td>
                                                    <td>
                                                        @can('incident-report-view')
                                                            <a href="{{ route('incident.show', $incident->id) }}">
                                                                <span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                    <i class="uil-eye"></i>
                                                                </span>
                                                            </a>
                                                        @endcan
                                                        <a href="{{ route('incident.edit', $incident->id) }}">
                                                            <span
                                                                class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                <i class="uil-edit"></i>
                                                            </span>
                                                        </a>
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

            </div>



        </div>
        <!-- end row -->

    </div>
    <!-- container -->


@endsection

@push('push_script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

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
                                value: item
                                    .id, // replace 'value' with the actual property name in your data
                                text: item
                                    .full_name // replace 'text' with the actual property name in your data
                            }));
                        });
                        $.each(sitesData, function(index, item) {
                            $('#site_idselect').append($('<option>', {
                                value: item.site
                                    .id, // replace 'value' with the actual property name in your data
                                text: item.site
                                    .reference // replace 'text' with the actual property name in your data
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
                                value: item.site
                                    .id, // replace 'value' with the actual property name in your data
                                text: item.site
                                    .reference // replace 'text' with the actual property name in your data
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
@endpush
