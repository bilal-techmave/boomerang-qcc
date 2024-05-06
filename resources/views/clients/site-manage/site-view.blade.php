@extends('layouts.main')
@section('app-title', 'Site View - Quality Commercial Cleaning')
@section('main-content')

    <style>
        .red_col__ {
            color: red
        }

        .yellow_col__ {
            color: rgb(255 197 7)
        }

        .blue_col__ {
            color: blue
        }

        .grey_col__ {
            color: grey
        }
    </style>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Site View</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Clients</li>
                            <li class="breadcrumb-item active">Site View</li>
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
                                    <span><i class="uil-clock-eight"></i></span>
                                    <span>Shift</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-clock-eight"></i></span>
                                    <span>Shift Receivable</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#other-details" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-exclamation-triangle"></i></span>
                                    <span>Complaints</span>
                                </a>
                            </li>

                            @can('time-attendance-view')
                            <li class="nav-item">
                                <a href="#time-attendance" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-stopwatch"></i></span>
                                    <span>Time Attendance</span>
                                </a>
                            </li>
                            @endcan

                            @can('site-view-comments')
                            <li class="nav-item">
                                <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-comment-alt"></i></span>
                                    <span>Comments</span>
                                </a>
                            </li>
                            @endcan

                            @can('ticket-view')
                            <li class="nav-item">
                                <a href="#tickets" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil uil-ticket"></i></span>
                                    <span>Tickets</span>
                                </a>
                            </li>
                            @endcan


                            {{-- <li class="nav-item">
                                <a href="#purchase-order" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-dollar-sign"></i></span>
                                    <span>Purchase Order</span>
                                </a>
                            </li> --}}

                            @can('budget-view')
                            <li class="nav-item">
                                <a href="#monetization" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="bi-currency-dollar"></i></span>
                                    <span>Monetization</span>
                                </a>
                            </li>
                            @endcan


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
                                                            <h6>Internal Code</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->internal_code ??'' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Client</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->client->business_name ?? '' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Portfolio</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->potfolio->full_name ??'' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Type of the site</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->site_type ??'' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Reference / Building</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->reference ??'' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Contractor</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->contractor->name ??'' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Unit</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->unit ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Address Number</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->address_number ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Street Address </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->street_address ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Suburb</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->suburb ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>City</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->city->city_name ?? '---' }}</h6>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>QrCode</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $qrcodedata ?? '---' }}</h6>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="detail_box ps-4">
                                                <ul>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>State</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->state->state_name ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Zip Code </h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->zip_code ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Supervisor</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->supervisor->name ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Latitude</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->latitude ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Longitude</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->longitude ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Distance Allowed On GPS</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->distance_gps.' Meter' ?? '---' }} </h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Variation Allowed Minutes</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $manageSite->variation_allowed_minutes ?? '---' }}</h6>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="detail_box">
                                                    <h6>Note</h6>
                                                    <p>{{ $manageSite->note ?? '---' }}</p>
                                                </div>
                                                <div class="detail_box">
                                                    <h6>Scope of Work</h6>
                                                    <p>{{ $manageSite->scope_of_work ?? '---' }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="title_head">
                                                <h4>Contact Information</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12  mt-3">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone Number</th>
                                                        <th>Email</th>
                                                        <th>Contact Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($site_contact)
                                                        @foreach ($site_contact as $contact)
                                                            <tr id="contact{{ $contact->id }}{{ time() }}">
                                                                <td>{{ $contact->user->name }}
                                                                    {{ $contact->user->surname }}</td>
                                                                <td>{{ $contact->user->phone_number }}</td>
                                                                <td>{{ $contact->user->email }}</td>
                                                                <td>{{ Str::ucfirst($contact->user_type) }}</td>
                                                                <td> <button
                                                                        onclick="deleteRecordTbl('{{ $contact->id }}','BaseContact','contact{{ $contact->id }}{{ time() }}')"
                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                            class="uil-trash"></i></button></td>
                                                            </tr>
                                                        @endforeach
                                                    @endif

                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="tab-pane " id="profile">
                                @php
                                    $newcleaners = $cleaners->keyBy('id');
                                @endphp
                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Avaliable Start Time</th>
                                                        <th>Avaliable End Time</th>
                                                        <th>Total Hours</th>
                                                        <th>Cleaner</th>
                                                        <th>Type</th>
                                                        <th>Hourly Rate</th>
                                                        <th>Frequency</th>
                                                        <th>Days</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($site_shift)
                                                        @foreach ($site_shift as $shift)
                                                            @php
                                                                $allDays = array_column($shift->shift_days->toArray(), 'day_type');
                                                            @endphp
                                                            <tr id="siteShift{{ $loop->index }}{{ time() }}">
                                                                <td>{{ $shift->avaliable_start_time }}</td>
                                                                <td>{{ $shift->avaliable_end_time }}</td>
                                                                <td>{{ $shift->total_hours }}</td>
                                                                <td>{{ isset($newcleaners[$shift->cleaner_id]) ?  $newcleaners[$shift->cleaner_id]->name : '-' }}</td>
                                                                <td>{{ $shift->shift_type }}</td>
                                                                <td>{{ $shift->hourly_rate }}</td>
                                                                <td>{{$shift->frequency}}</td>
                                                                <td style="text-transform: capitalize;">{{ implode(" ",$allDays) }}</td>
                                                                <td>
                                                                    <button type="button"
                                                                        onclick="deleteRecordTbl('{{ $shift->id }}','ClientSiteShift','siteShift{{ $loop->index }}{{ time() }}')"
                                                                        class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                        <i class="uil-trash"></i>
                                                                    </button>
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
                            @php
                                 function calculateSalesMetrics($daysPerWeek, $hoursPerDay, $hourlyRate)
                                                    {
                                                        // Constants
                                                        $weeksPerMonth = 4.34524; // Average weeks in a month
                                                        $weeksPerYear = 52.1775; // Average weeks in a year

                                                        // Check for division by zero
                                                        if ($daysPerWeek != 0 && $hoursPerDay != 0 && $hourlyRate != 0) {
                                                            // Calculations
                                                            $monthlySales = $daysPerWeek * $hoursPerDay * $weeksPerMonth * $hourlyRate;
                                                            $yearlySales = $daysPerWeek * $hoursPerDay * $weeksPerYear * $hourlyRate;
                                                            $fortnightlySales = $daysPerWeek * $hoursPerDay * 2 * $hourlyRate; // 2 weeks
                                                            $grossMarginMonth = $monthlySales - ($daysPerWeek * $hoursPerDay * $weeksPerMonth * $hourlyRate * 0.1); // Assuming 10% margin
                                                            $grossMarginMonthPercent = ($grossMarginMonth / $monthlySales) * 100;

                                                            return [
                                                                'monthlySales' => $monthlySales,
                                                                'yearlySales' => $yearlySales,
                                                                'fortnightlySales' => round($fortnightlySales, 2),
                                                                'grossMarginMonth' => round($grossMarginMonth, 2),
                                                                'grossMarginMonthPercent' => round($grossMarginMonthPercent, 2),
                                                            ];
                                                        } else {
                                                            return [
                                                                'monthlySales' => 0,
                                                                'yearlySales' => 0,
                                                                'fortnightlySales' => 0,
                                                                'grossMarginMonth' => 0,
                                                                'grossMarginMonthPercent' => 0,
                                                            ];
                                                        }
                                                    }
                            @endphp
                            <div class="tab-pane" id="messages">
                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 mt-3">
                                            <div class="table-responsive">
                                                <table id="basic-datatable"
                                                    class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Avaliable Start Time</th>
                                                            <th>Avaliable End Time</th>
                                                            <th>Total Hours</th>
                                                            <th>Hourly Rate Receivable</th>
                                                            <th>Yearly Sales</th>
                                                            <th>Monthly Sales</th>
                                                            <th>Fortnightly Sales</th>
                                                            <th>Gross Margin Month</th>
                                                            <th>Gross Margin Month %</th>
                                                            <th>Frequency</th>
                                                                <th>Days</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($site_shift_reciabale)
                                                            @foreach ($site_shift_reciabale as $shift)
                                                                @php
                                                                    $allDays = array_column($shift->shift_days->toArray(), 'day_type');
                                                                    $sales = calculateSalesMetrics($shift->frequency, $shift->total_hours,$shift->hourly_rate_receivable);
                                                                @endphp
                                                                <tr id="siteShifts{{ $loop->index }}{{ time() }}">
                                                                    <td>{{ $shift->avaliable_start_time }}</td>
                                                                    <td>{{ $shift->avaliable_end_time }}</td>
                                                                    <td>{{ $shift->total_hours }}</td>
                                                                    <td>{{ $shift->hourly_rate_receivable }}</td>
                                                                    <td>{{$sales['yearlySales'] ?? 0}}</td>
                                                                    <td>{{$sales['monthlySales'] ?? 0}}</td>
                                                                    <td>{{$sales['fortnightlySales'] ?? 0}}</td>
                                                                    <td>{{$sales['grossMarginMonth']}}</td>
                                                                    <td>{{$sales['grossMarginMonthPercent']}}</td>
                                                                    <td>{{$shift->frequency}}</td>
                                                                    <td style="text-transform: capitalize;">{{ implode(" ",$allDays) }}</td>
                                                                    <td>
                                                                        <button type="button"
                                                                            onclick="deleteRecordTbl('{{ $shift->id }}','ClientSiteShiftsReceivable','siteShifts{{ $loop->index }}{{ time() }}')"
                                                                            class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                            <i class="uil-trash"></i>
                                                                        </button>
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
                            <div class="tab-pane" id="other-details">

                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-bordered basic-datatable dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th hidden></th>
                                                            <th>Subject</th>
                                                            <th>Date Issued</th>
                                                            <th>Created By (Cleaner)</th>
                                                            {{-- <th>Status</th> --}}
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if ($site_complains)
                                                            @foreach ($site_complains as $complain)
                                                                <tr id="complain{{ $complain->id }}{{ time() }}">
                                                                    <td hidden></td>
                                                                    <td>{{ $complain->request_body }}</td>
                                                                    <td>{{ $complain->create_date_time }}</td>
                                                                    <td>{{ $complain->cleaner->name }} {{ $complain->cleaner->surname ?? '' }} ({{ $complain->cleaner->email ?? '' }})</td>
                                                                    {{-- <td>{{ $complain->status }}</td> --}}
                                                                    <td>
                                                                        <button type="button" onclick="deleteRecordTbl('{{ $complain->id }}','ClientSiteCleanerRequest','complain{{ $complain->id }}{{ time() }}')"
                                                                            class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                            <i class="uil-trash"></i>
                                                                        </button>
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
                            @can('time-attendance-view')
                            <div class="tab-pane" id="time-attendance">

                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <table
                                                class="table table-bordered basic-datatable dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>Cleaner</th>
                                                        <th>Date Start</th>
                                                        <th>Date Finish</th>
                                                        <th>Distance From Site Start</th>
                                                        <th>Distance From Site Finish</th>
                                                        <th>Total Hours</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($timeAttendance)
                                                        @foreach ($timeAttendance as $attendance)
                                                            @php
                                                            $from_time = strtotime($attendance->shift_start);
                                                            $to_time   = strtotime($attendance->shift_end);
                                                            $min =  $attendance->shift_end  ? round(abs($to_time - $from_time) / 60,2) : 0;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $attendance->cleaner->name ??'=' }}</td>
                                                                <td>{{ $attendance->shift_start ??'-' }}</td>
                                                                <td>{{ $attendance->shift_end ??'-' }}</td>
                                                                <td>{{ $attendance->start_distance ??'-' }}</td>
                                                                <td>{{$attendance->end_distance ??'-'}}</td>
                                                                <td>
                                                                    @php
                                                                        $hours = floor($min / 60);
                                                                        $minutes = ($min % 60);
                                                                        $min = $attendance->shift_end ? round(abs($to_time - $from_time) / 60, 2) : 0;
                                                                        $totalHour = round($min/60,2);
                                                                    @endphp
                                                                    {{$totalHour}}
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
                            @endcan

                            @can('site-view-comments')
                            <div class="tab-pane" id="comments">
                                <div class="top_dt_sec pt-0">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <table
                                                class="table table-bordered basic-datatable dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>Date Comment</th>
                                                        <th>Person</th>
                                                        <th>Comment Type</th>
                                                        <th>Comment</th>
                                                        <th>Files</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($site_comment)
                                                        @foreach ($site_comment as $comment)
                                                            <tr id="comments{{ $comment->id }}{{ time() }}">
                                                                <td>{{ $comment->created_at }}</td>
                                                                <td>{{ $comment->user->name }}</td>
                                                                <td>{{ $comment->comment_type }}</td>
                                                                <td>{{ $comment->comment }}</td>
                                                                <td><a
                                                                        href="{{ url(env('STORE_PATH') . $comment->file) }}">{{ $comment->file }}</a>
                                                                </td>
                                                                <td>

                                                                    <a href="javascript:void(0)" onclick="deleteRecordTbl('{{ $comment->id }}','Comment','comments{{ $comment->id }}{{ time() }}')">
                                                                        <span
                                                                            class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn">
                                                                            <i class="uil-trash"></i>
                                                                        </span>
                                                                    </a>
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
                            @endcan

                            @can('ticket-view')
                            <div class="tab-pane" id="tickets">
                                <div class="sites_main">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <table
                                                class="table table-bordered basic-datatable dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>S.No</th>
                                                        <th>Priority</th>
                                                        <th>Ticket Number</th>
                                                        <th>Reference Number</th>
                                                        <th>Type</th>
                                                        <th>Subject</th>
                                                        <th>Date Issued</th>
                                                        <th>Department</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($site_tickets as $allticket)
                                                        <tr class="status-ticket-high odd @if ($allticket->priority == 'Urgent') red_col__ @elseif ($allticket->priority == 'High') yellow_col__ @elseif ($allticket->priority == 'Medium') blue_col__ @elseif ($allticket->priority == 'Low') grey_col__ @endif" role="row">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td
                                                                class="sorting_1 ">
                                                                <b>{{ $allticket->priority ?? 'N/A' }}</b></td>
                                                            <td>{{ $allticket->ticket_id ?? 'N/A' }}</td>
                                                            <td>{{ $allticket->reference_number ?? 'N/A' }}</td>
                                                            <td>{{ $allticket->type ?? 'N/A' }}</td>

                                                            {{-- getDepartments --}}
                                                            <td class="max-lines">{{ $allticket->subject ?? 'N/A' }}</td>
                                                            <td>{{ $allticket->due_date_to ?? 'N/A' }}</td>
                                                            <td>{{ $allticket->getDepartments->name ?? 'N/A' }}</td>
                                                            <td>{{ $allticket->status ?? 'N/A' }}</td>
                                                            <td> <a
                                                                    href=" {{ route('ticket.view', ['id' => $allticket->id]) }}"><span
                                                                        class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                            class="uil-eye"></i>
                                                                    </span></a></td>
                                                        </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            @endcan

                            {{-- <div class="tab-pane" id="purchase-order">
                                <div class="sites_main">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <table
                                                class="table table-bordered basic-datatable dt-responsive nowrap w-100 mb-1">
                                                <thead>
                                                    <tr>
                                                        <th>Priority</th>
                                                        <th>Number</th>
                                                        <th>Reference Number</th>
                                                        <th>Type</th>
                                                        <th>Subject</th>
                                                        <th>Date Issued</th>
                                                        <th>Department</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($purchase_orders)
                                                        @foreach ($purchase_orders as $purchase_order)
                                                        <tr class="status-ticket-high odd @if ($purchase_order->priority == 'Urgent') red_col__ @elseif ($purchase_order->priority == 'High') yellow_col__ @elseif ($purchase_order->priority == 'Medium') blue_col__ @elseif ($purchase_order->priority == 'Low') grey_col__ @endif" role="row">
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td
                                                                class="sorting_1 ">
                                                                <b>{{ $purchase_order->priority ?? 'N/A' }}</b></td>
                                                            <td>{{ $purchase_order->ticket_id ?? 'N/A' }}</td>
                                                            <td>{{ $purchase_order->reference_number ?? 'N/A' }}</td>
                                                            <td>{{ $purchase_order->type ?? 'N/A' }}</td>
                                                            <td class="max-lines">{{ $purchase_order->subject ?? 'N/A' }}</td>
                                                            <td>{{ $purchase_order->due_date_to ?? 'N/A' }}</td>
                                                            <td>{{ $purchase_order->getDepartments->name ?? 'N/A' }}</td>
                                                            <td>{{ $purchase_order->status ?? 'N/A' }}</td>
                                                            <td> <a
                                                                    href=" {{ route('ticket.view', ['id' => $purchase_order->id]) }}"><span
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

                            </div> --}}

                            @can('budget-view')
                            <div class="tab-pane" id="monetization">

                                <div class="sites_main">
                                    <div class="row">

                                        <div class="col-lg-6 pe-4 border-right-dashed">
                                            <div class="title_head">
                                                <h4>Amount Payable By Clients</h4>
                                            </div>
                                            <div class="detail_box ">
                                                <ul>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>$ Yearly</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->client_yearly ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>$ Monthly</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->client_monthly ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>$ Fortnightly</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->client_fortnightly ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Time Allocated / Serv</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->client_time_allocated ?? '----' }}
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Hourly Rate</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->client_hourly_rate ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Service Cost</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->client_service_cost ?? '----' }}
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Frequency</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->client_frequency ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>

                                        </div>



                                        <div class="col-lg-6 ps-4">
                                            <div class="title_head">
                                                <h4>Amount Payable To Cleaner</h4>
                                            </div>
                                            <div class="detail_box ">
                                                <ul>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Frequency</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->cleaner_frequency ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>$ Yearly</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->cleaner_yearly ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>$ Monthly</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->cleaner_monthly ?? '----' }}</h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>$ Fortnightly</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->cleaner_fortnightly ?? '----' }}
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Time Allocated / Serv</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->cleaner_time_allocated ?? '----' }}
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Hourly Rate</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->cleaner_hourly_rate ?? '----' }}
                                                            </h6>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Service Cost</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->cleaner_service_cost ?? '----' }}
                                                            </h6>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="detail_title">
                                                            <h6>Cleaners / Contractor</h6>
                                                        </div>
                                                        <div class="detail_ans">
                                                            <h6>{{ $site_monetization->cleaner_contractor ?? '----' }}
                                                            </h6>
                                                        </div>
                                                    </li>
                                                </ul>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            @endcan
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

        function deleteTabletr(tabletr, filenumber = 'none', permission = false) {
            if (permission) {
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
                            $(`#${tabletr}`).remove();
                            if (filenumber != 'none') {
                                $(`#documentFilesDocsDiv${filenumber}`).remove();
                            }
                            swal({
                                type: 'success',
                                title: 'Deleted!',
                                text: 'Deleted',
                                timer: 3000
                            });
                        }else {
                            swal("Cancelled", "Data safe :)", "error");
                        }
                    });
            } else {
                $(`#${tabletr}`).remove();
                if (filenumber != 'none') {
                    $(`#documentFilesDocsDiv${filenumber}`).remove();
                }
                swal({
                    type: 'success',
                    title: 'Deleted!',
                    text: 'Deleted',
                    timer: 3000
                });
            }
        }

        function deleteRecordTbl(docId, table_name, divname) {
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
                            url: "{{ route('common.delete-record') }}",
                            data: {
                                "data_id": docId,
                                "table_name": table_name
                            },
                            dataType: 'json',
                            success: function(result) {
                                if (result.status) {
                                    swal({
                                        type: 'success',
                                        title: 'Deleted!',
                                        text: 'Deleted',
                                        timer: 3000
                                    });
                                    deleteTabletr(divname);
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Something went wrong',
                                        timer: 3000
                                    })
                                }
                            },
                            error: function(data) {

                            }
                        });
                    } else {
                        swal("Cancelled", "Data safe :)", "error");
                    }
                });
        }
    </script>
@endpush
