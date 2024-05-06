@extends('layouts.main')
@section('app-title', 'Incident-report - Quality Commercial Cleaning')
@section('main-content')

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">NCR Reports</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Compliance</li>
                            <li class="breadcrumb-item active">NCR Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>All NCR Reports </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="table_box table-responsive">
                                    <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Date of NCR</th>
                                                <th>Responsible</th>
                                                <th>Portfolio</th>
                                                <th>Site</th>
                                                <th>Non Conformity Details</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ncr as $data)
                                                @php
                                                    $portfolio = null;
                                                    $portfolio_site = null;
                                                
                                                    if ($data['protfolioSite']) {
                                                        $portfolio = DB::table('client_portfolios')->where('id', $data['protfolioSite']->id)->first('full_name');
                                                        $portfolio_site = DB::table('client_sites')->where('id', $data['protfolioSite']->client_site_id)->first('reference');
                                                    }
                                                @endphp
                                                <tr role="row" class="odd">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->created_at->format('d-m-Y') }}</td>
                                                    <td>{{ $data->responsible }}</td>
                                                    <td>{{ $portfolio->full_name ?? ''}}</td>
                                                    <td>{{ $portfolio_site->reference ?? '' }}</td>
                                                    <td>{{ $data->non_conformity_details }}</td>
                                                    <td><a href="{{ route('ncr.show', $data->id) }}">
                                                            <span
                                                                class="btn btn-info waves-effect waves-light table-btn-custom">
                                                                <i class="uil-eye"></i>
                                                            </span>
                                                        </a>
                                                        <a href="{{ route('ncr.edit', $data->id) }}">
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