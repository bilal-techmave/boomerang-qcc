@extends('layouts.main')
@section('app-title', 'Time Attendance - Quality Commercial Cleaning')
@section('main-content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Time Attendance</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Reports</li>
                            <li class="breadcrumb-item active">Time Attendance</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <form action="" method="GET">
                    <div class="card">
                        <div class="card-header">
                            <div class="top_section_title">
                                <h5>Filters</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Client</label>
                                        <select data-plugin="customselect" id="client_idselect" class="form-select" name="client_id">
                                            <option value="">Please select one or start typing</option>
                                            @isset($clients)
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}"
                                                        {{ request('client_id') == $client->id ? 'selected' : '' }}>
                                                        {{ $client->business_name ?? '' }}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Portfolio</label>
                                        <select data-plugin="customselect" id="portfolio_idselect" class="form-select" name="portfolio_id">
                                            <option value="">Please select one or start typing</option>
                                            @isset($portfolios)
                                                @foreach ($portfolios as $portfolio)
                                                    <option value="{{ $portfolio->id }}"
                                                        {{ request('portfolio_id') == $portfolio->id ? 'selected' : '' }}>
                                                        {{ $portfolio->full_name ?? '' }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Site</label>
                                        <select data-plugin="customselect" id="site_idselect" class="form-select" name="site_id">
                                            <option value="">Please select one or start typing</option>
                                            @isset($sites)
                                                @foreach ($sites as $site)
                                                    <option value="{{ $site->id }}"
                                                        {{ request('site_id') == $site->id ? 'selected' : '' }}>
                                                        {{ $site->reference }}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Cleaner</label>
                                        <select data-plugin="customselect" id="cleanerselect_id" class="form-select" name="cleaner_id">
                                            <option value="">Please select one or start typing</option>
                                            @isset($cleaners)
                                                @foreach ($cleaners as $cleaner)
                                                    <option value="{{ $cleaner->id }}"
                                                        {{ request('cleaner_id') == $cleaner->id ? 'selected' : '' }}>
                                                        {{ $cleaner->name ?? '' }}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">City </label>
                                        <select data-plugin="customselect" id="cityselect_id" class="form-select" name="city_id">
                                            <option value="">Please select one or start typing</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ request('city_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">State </label>
                                        <select data-plugin="customselect" id="stateselect_id" class="form-select" name="state_id">
                                            <option value="">Please select one or start typing</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ request('state_id') == $state->id ? 'selected' : '' }}>
                                                    {{ $state->state_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3 mt-3 mt-sm-0">
                                        <label class="form-label">Approved By </label>
                                        <select data-plugin="customselect" id="approvedselect_by" class="form-select" name="approved_by">
                                            <option value="">Please select one or start typing</option>
                                            @isset($users)
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ request('approved_by') == $user->id ? 'selected' : '' }}>
                                                        {{ $user->name ?? '' }}</option>
                                                @endforeach
                                            @endisset

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Date Start From</label>
                                        <input type="text" class="form-control basic-datepicker"
                                            value="{{ request('start_form') }}"  name="start_form" id="basic-datepicker4"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Date Finish To</label>
                                        <input type="text" class="form-control basic-datepicker"
                                            value="{{ request('finish_form') }}" name="finish_form" id="basic-datepicker3"
                                            aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Date Approved From</label>
                                        <input type="text" class="form-control basic-datepicker"
                                            value="{{ request('approved_from') }}" name="approved_from"
                                            id="basic-datepicker2" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="exampleInputEmail1">Date Approved To</label>
                                        <input type="text" class="form-control basic-datepicker"
                                            value="{{ request('approved_from') }}" name="approved_to"
                                            id="basic-datepicker" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="bottom_footer_dt">
                            <div class="row">
                                <div class="col-lg-12">
                                    <button class="theme_btn btn save_btn" type="submit"><i class="uil-search-alt"> Search</i></button>
                                    <a href="{{ route('report.time.attendance') }}" class="theme_btn btn btn-warning"><i class="bi-arrow-repeat"></i> Reset Filter</i></a>
                                    <a style="float: right;" id="exportdatahref" href="{{route('export.data',['page'=>'time-attandance'])}}" class="btn btn-dark bi-file-earmark-excel"> Export Data</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card">

                    <div class="card-header">
                        <div class="top_section_title">
                            <h5>Time Attendance</h5>
                            <!-- <a href="site-add#" class="btn btn-primary">+ Add New Site</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 mt-3">
                                {{-- <div class="table_box"> --}}
                                <div class="table-responsive">
                                    <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Client</th>
                                                <th>Portfolio</th>
                                                <th>Site Reference</th>
                                                <th>Cleaner</th>
                                                <th>Picture Start</th>
                                                <th>Date Start</th>
                                                <th>Picture Finish</th>
                                                <th>Date Finish</th>
                                                <th>Total Hours</th>
                                                <th>Allocated Hours</th>
                                                <th>Total Payable</th>
                                                <th>Distance From Site on Start</th>
                                                <th>Distance From Site on Finish</th>
                                                <th>Cleaner In Site or Not</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($timeAttendance)
                                                @foreach ($timeAttendance as $attendance)
                                                    @php
                                                        $start_time24hour = strtotime(date('Y-m-d H:i:s', strtotime(date('Y-m-d', strtotime($attendance->shift_start)) . ' ' . ($attendance->avaliable_start_time ?? '00:00:00'))));
                                                        $end_time24hour = strtotime(date('Y-m-d H:i:s', strtotime(date('Y-m-d', strtotime($attendance->shift_end)) . ' ' . ($attendance->avaliable_end_time ?? '23:59:59'))));

                                                        $from_time = strtotime($attendance->shift_start);
                                                        $to_time = strtotime($attendance->shift_end);
                                                        $min = $attendance->shift_end ? round(abs($to_time - $from_time) / 60, 2) : 0;

                                                        if (isset($attendance->hourly_rate) && $attendance->hourly_rate) {
                                                            $minrate = $attendance->hourly_rate / 60;
                                                        } else {
                                                            $minrate = 1;
                                                        }
                                                        $total_pay = $min * $minrate;

                                                        $cleanerInSite = 'Cleaner In Site';
                                                    @endphp
                                                    @php
                                                        // Assuming you have two datetime values
                                                        $startTime = \Carbon\Carbon::parse($attendance->shift_start);
                                                        $endTime = \Carbon\Carbon::parse($attendance->shift_end);
                                                    
                                                        // Calculate the difference in hours and minutes
                                                        $hours = $endTime->diffInHours($startTime);
                                                        $minutes = $endTime->diffInMinutes($startTime) % 60;
                                                    
                                                        // Convert minutes to decimal
                                                        $totalHours = $hours + ($minutes / 60);
                                                        $totalHour = round($min/60,2);
                                                    @endphp
                                                    <tr role="row" class="odd">

                                                        <td >
                                                            {{ $attendance->business_name ?? '' }} </td>
                                                        <td>{{ $attendance->full_name ?? '' }}</td>
                                                        <td>{{ $attendance->reference ?? '' }}</td>

                                                        <td>{{ $attendance->cname ?? '' }}</td>
                                                        <td style="max-height: 40px; max-width: 40px; text-align: center">

                                                            <a href="{{ url(env('STORE_PATH') . $attendance->selfie_taken) }}"
                                                                class="lightbox_trigger">
                                                                <span
                                                                    class="btn btn-xs table-btn-custom btn-warning waves-effect waves-light"><i
                                                                        class="uil-eye"></i></span></a>

                                                        </td>
                                                        <td>
                                                            <span
                                                                @if (strtotime($attendance->shift_start) < $start_time24hour) style="color:red;" @endif>
                                                                {{ $attendance->shift_start }} </span>

                                                        </td>
                                                        <td style="max-height: 40px; max-width: 40px; text-align: center">

                                                            <a href="{{ url(env('STORE_PATH') . $attendance->finish_salfie_taken) }}"
                                                                class="lightbox_trigger">
                                                                <span
                                                                    class="btn btn-xs table-btn-custom btn-warning waves-effect waves-light"><i
                                                                        class="uil-eye"></i></span></a>
                                                        </td>
                                                        <td>
                                                            <span
                                                                @if (strtotime($attendance->shift_end) < $start_time24hour) style="color:red;" @endif>
                                                                {{ $attendance->shift_end }}</span>
                                                        </td>
                                                        <td>
                                                            {{ round($totalHour,2)}}
                                                        </td>
                                                        <td>{{ isset($attendance->total_hours) && $attendance->total_hours ? round($attendance->total_hours,2) : '0' }}</td>
                                                        <td>{{ round($totalHour*($attendance?->hourly_rate??1), 2) ?? '0' }}</td>
                                                        <td>

                                                            <strong>
                                                                <lable
                                                                    @if ($attendance->distance_gps && $attendance->distance_gps < $attendance->start_distance) style="color: red;" @php
                                                                $cleanerInSite = "Cleaner Not In Site";
                                                            @endphp @endif>
                                                                    {{ $attendance->start_distance ? $attendance->start_distance . 'm' : '' }}
                                                                </lable>
                                                            </strong>
                                                        </td>


                                                        <td>

                                                            <strong>
                                                                <lable
                                                                    @if ($attendance->distance_gps && $attendance->distance_gps < $attendance->end_distance) style="color: red;" @php
                                                            $cleanerInSite = "Cleaner Not In Site";
                                                        @endphp @endif>
                                                                    {{ $attendance->end_distance ? $attendance->end_distance . 'm' : '' }}
                                                                </lable>
                                                            </strong>


                                                        </td>

                                                        <td>{{ $cleanerInSite }}</td>
                                                        <td>{{ ucwords($attendance->status) }}</td>
                                                        <td><a
                                                                href="{{ route('report.time.attendance.view', ['id' => $attendance->id]) }}"><span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                        class="uil-eye"></i>
                                                                </span></a></td>

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
    function filterCustomReports()
    {
        var client_id=$('#client_idselect').val();
        var portfolio_id=$('#portfolio_idselect').val();
        var site_id=$('#site_idselect').val();
        var cleaner_id=$('#cleanerselect_id').val();
        var city_id=$('#cityselect_id').val();
        var state_id=$('#stateselect_id').val();
        var approved_by=$('#approvedselect_by').val();
        var start_form=$('#basic-datepicker4').val();
        var finish_form=$('#basic-datepicker3').val();
        var approved_from=$('#basic-datepicker2').val();
        var approved_to=$('#basic-datepicker').val();

        var currentUrl = $("#exportdatahref").attr('href');
        if(currentUrl){
            var url = new URL(currentUrl);
            
            if(client_id) url.searchParams.set("client_id", client_id);
            if(portfolio_id) url.searchParams.set("portfolio_id", portfolio_id);
            if(site_id) url.searchParams.set("site_id", site_id);
            if(cleaner_id) url.searchParams.set("cleaner_id", cleaner_id);
            if(city_id) url.searchParams.set("city_id", city_id);
            if(state_id) url.searchParams.set("state_id", state_id);
            if(approved_by) url.searchParams.set("approved_by", approved_by);
            if(start_form) url.searchParams.set("start_form", start_form);
            if(finish_form) url.searchParams.set("finish_form", finish_form);
            if(approved_from) url.searchParams.set("approved_from", approved_from);
            if(approved_to) url.searchParams.set("approved_to", approved_to);
        }

        $("#exportdatahref").attr('href',url);
    }

    $(document).ready(function (){
        filterCustomReports();
    });
</script>
@endpush