@extends('layouts.main')
@section('app-title', 'Work Order View - Quality Commercial Cleaning')
@section('main-content')
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<style>



.form {
    width: 100%;
    margin: 0% auto 2%;
}
.form__container {
    position: relative;
    width: 100%;

    text-align: center;

    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    color: silver;
    margin-bottom: 5px;
}
.form__container.active {
  background-color: rgba(192, 192, 192, 0.2);
}
.form__file {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  cursor: pointer;
  opacity: 0;
}
.form__files-container {
  display: block;
  width: 100%;
  font-size: 0;
  margin-top: 20px;
}
.form__image-container {
    display: inline-block;
    width: calc(25% - 20px);
    height: 150px;
    margin-right: 20px;
    margin-bottom: 10px;
    position: relative;
}
/* .form__image-container:not(:nth-child(2n)) {
  margin-right: 2%;
} */
.form__image-container:after {
  content: "✕";
  position: absolute;
  line-height: 150px;
  font-size: 30px;
  margin: auto;
  top: 0;
  right: 0;
  left: 0;
  text-align: center;
  font-weight: bold;
  color: #fff;
  background-color: rgba(0, 0, 0, 0.4);
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}
.form__image-container:hover:after {
  opacity: 1;
  cursor: pointer;
}
.form__image {
	-o-object-fit: contain;
	object-fit: cover;
	width: 100%;
	height: 150px;
}
/* .dropify-wrapper .dropify-preview {
	display: none !important;

} */

.contain {
    display: flex;
    width: 100%;
}
.image_box_main {
    position: relative;
    height: 200px;
}

.image_box_main img {
    height: 100%;
}
.images_box {
    height: 100%;
}

.magnific-img {
    display: inline-block;
    width: 100%;
    height: 200px;
}

.contain {
    display: flex;
}

.contain .item {
  margin-right: 0px;
  position: relative;
  margin-right: 15px;
}

.contain .item::before {
	position: absolute;
	content: "";
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
background: #22222247;
	z-index: 10;
}
.image_box_main .magnific-img .fa.fa-search-plus {
	z-index: 20;
}

.action_btns_for {
	z-index: 20;
}
.action_btns_for {
  position: absolute;
  bottom: 10px;
  top: auto !important;
  right: 36px;
  z-index: 99;
}
.image_box_main .magnific-img .fa.fa-search-plus {
  position: absolute;
  bottom: 8px;
  right: 8px;
  color: #fff;
  z-index: 999;
  background: #028fc4;
  padding: 5px;
}
a.image-popup-vertical-fit {
  cursor: pointer;
  z-index: 99;
  position: relative;
  display: block;
  width: 100%;
  height: 100%;
}
.action_btns_for a {
  color: #fff;
  background: #028fc4;
  padding: 5px;
}
.contain .item {
  margin-right: 0px;
}
.magnific-img img{
    height: 200px !important;
}

.magnific-img img {
	height: 200px !important;
	width: 200px;
	object-fit: cover;
}
</style>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="work_order_title_id page-title">
                        WO#000{{ $workOrder->id }}
                        <span class="work_order_date_dp">Created {{ date('d/m/Y', strtotime($workOrder->created_at)) }} by
                            {{ $workOrder->createdby->name ?? '' }}
                            Department: {{ $workOrder->department->name ?? '' }}</span>
                    </h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Work Order</li>
                            <li class="breadcrumb-item active">Work order View</li>
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
                                    <span>Job Info</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                                    <span><i class=" uil-scenery "></i></span>
                                    <span>Upload Before & After Photos</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-file-blank "></i></span>
                                    <span>Upload Other Documents</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#comments" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    <span><i class="uil-file-alt"></i></span>
                                    <span>Upload Administrative Documents</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="card show_portfolio_tab mt-2">

                    <div class="card-body">

                        <div class="tab-content  text-muted">
                            <div class="tab-pane show active" id="home">

                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec">
                                        <div class="row">

                                            <div class="col-lg-6 border-right-dashed">
                                                <div class="detail_box pe-4">
                                                    <ul>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Reference Number:</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $workOrder->reference_number ?? '----' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Client</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $workOrder->client->business_name ?? '----' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Portfolio</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $workOrder->portfolio->full_name ?? '----' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Site</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $workOrder->site->reference ?? '----' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Site Contacts</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $site_contact->user->name ?? '----' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Sales Price</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>${{ $workOrder->sales_price ?? '0.00' }}</h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Budget</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>${{ $workOrder->budget ?? '0.00' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Allocated Time</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $workOrder->time_allocated ?? '00:00:00' }}</h6>
                                                            </div>
                                                        </li>


                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>PO / Work Bill</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $workOrder->po_work_bill ?? '----' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Invoice Number</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{ $workOrder->invoice_number ?? '----' }}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Cleaner Payment Date</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Required Completion Date</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Required Start Time</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Required Finish Time</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>

                                            <div class="col-lg-6 ">
                                                <div class="detail_box ps-4">
                                                    <div class="green_text">
                                                        <h6>Billing Settings: THE CLIENT HAS TO BE CHARGED</h6>
                                                    </div>

                                                    <ul>

                                                        <li class="green_text">
                                                            <div class="detail_title">
                                                                <h6>Margin </h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                @php

                                                                    $part = $workOrder->sales_price - $cleaner_buget ??'0';
                                                                    $percentage = $part > 0 ? ($part / $workOrder->sales_price) * 100 : 0;
                                                                @endphp
                                                                <h6>{{$percentage}}%</h6>
                                                            </div>
                                                        </li>
                                                        <li class="green_text">
                                                            <div class="detail_title">
                                                                <h6>Gross Margin</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>${{$part ??'0'}} </h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Status</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{$workOrder->status ??'----'}}</h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Schedule Date</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{$workOrder->schedule_date ??''}}</h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Completion Date</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>{{$workOrder->completion_date ??''}}</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Closed By</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6></h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Closed Date</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>21/01/2019</h6>
                                                            </div>
                                                        </li>



                                                    </ul>

                                                    <div class="detail_box">
                                                        <h6>Address</h6>
                                                        <p>{{ $workOrder->site->unit ?? '' }} -
                                                            {{ $workOrder->site->address_number ?? '' }} -
                                                            {{ $workOrder->site->street_address }} -
                                                            {{ $workOrder->site->city->city_name ?? '' }} -
                                                            {{ $workOrder->site->state->state_name ?? '' }} -
                                                            {{ $workOrder->site->zip_code ?? '' }} </p>
                                                    </div>

                                                    <div class="detail_box">
                                                        <h6>Description</h6>
                                                        <p>{{ $workOrder->description ?? '-' }}</p>
                                                    </div>

                                                    <div class="detail_box">
                                                        <h6>Observation </h6>
                                                        <p>{{ $workOrder->history ?? '-' }}</p>
                                                    </div>

                                                    <div class="detail_box">
                                                        <h6>Internal Communication</h6>
                                                        <p>{{ $workOrder->internal_communication ?? '-' }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-2">
                                                <h6>Assigned Cleaners <a href="#"><i
                                                            class="uil uil-envelope-alt"></i></a></h6>
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Cleaner</th>
                                                            <th>Hours</th>
                                                            <th>Budget</th>
                                                            <th>Date Attendance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @isset($assign_cleaners)
                                                            @foreach ($assign_cleaners as $cleaner)
                                                                <tr>
                                                                    <td>{{ $cleaner->cleaner->name ?? '' }}</td>
                                                                    <td>{{ $cleaner->work_hours ?? '' }}</td>
                                                                    <td>{{ $cleaner->work_budget ?? '' }}</td>
                                                                    <td>{{ date('d/m/Y', strtotime($cleaner->date_attendance)) }}
                                                                    </td>

                                                                </tr>
                                                            @endforeach
                                                        @endisset
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-lg-12">
                                                <h6>Time Attendance </h6>
                                                <table class="table table-bordered  dt-responsive nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Date / Time Start</th>
                                                            <th>Date / Time Finish</th>
                                                            <th>Total Hours</th>
                                                            <th>Forget to Finish?</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @isset($time_attendance)
                                                            @foreach ($time_attendance as $attendance)
                                                                @php
                                                                    $from_time = strtotime($attendance->shift_start);
                                                                    if ($attendance->shift_end != '') {
                                                                        $to_time = strtotime($attendance->shift_end);
                                                                        $min = round(abs($to_time - $from_time) / 60, 2) ?? '0';
                                                                    } else {
                                                                        $min = '0';
                                                                    }
                                                                    $curre = date('Y-m-d');
                                                                    $current = strtotime($curre);
                                                                    $comp = strtotime($workOrder->completion_date);
                                                                    // print_r($current , $comp);
                                                                    if ($current > $comp) {
                                                                        // $forgot = $current.",".$comp;
                                                                        $forgot = 'Yes';
                                                                    } else {
                                                                        // $forgot = $current.",".$comp;
                                                                        $forgot = 'No';
                                                                    }
                                                                @endphp
                                                                <tr>
                                                                    <td>{{ $attendance->cleaner->name ?? '' }}</td>
                                                                    <td>{{ $attendance->shift_start ?? '' }}</td>
                                                                    <td>{{ $attendance->shift_end ?? '' }}</td>
                                                                    <td>
                                                                        @php
                                                                            $hours = floor($min / 60);
                                                                            $minutes = $min % 60;
                                                                        @endphp
                                                                        {{ $hours . '.' . $minutes }}
                                                                    </td>
                                                                    <td>
                                                                        @if ($forgot == 'Yes')
                                                                            <i class="uil-check-circle status-entity"
                                                                                style="color:rgb(0, 170, 23)"></i>
                                                                        @elseif ($forgot == 'No')
                                                                            <i class="uil-times-circle status-entity"
                                                                                style="color:red"></i>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endisset

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="bottom_footer_dt">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="action_btns">
                                                    <a href="{{ route('work-order.work-order.index') }}"
                                                        class="theme_btn btn-primary btn"><i class="uil-list-ul"></i>
                                                        List</a>
                                                        <a href="javascript:void(0)" class="theme_btn btn-warning btn" data-bs-toggle="modal"
                                                        data-bs-target="#changeStatus"><i class="uil-exchange-alt"></i> Change Status</a>
                                                    <a href="{{ route('work-order.work-order.create') }}"
                                                        class="theme_btn btn save_btn"><i class="uil-copy-alt "> Duplicate
                                                            Job</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- main_bx_dt -->
                            </div>
                            <div class="tab-pane " id="profile">
                                <div class="main_bx_dt__">
                                    <div class="top_dt_sec pt-0">
                                        <div class="row">
                                            <form id="uploadBeforeAfterImage" action="{{route('work-order.work-order.before-after-image.upload',['id'=>$workOrder?->work_order_submit->id ??'0'])}}" method="post" enctype="multipart/form-data">@csrf
                                                <div class="col-lg-12">
                                                    <div class="title_head">
                                                        <h4>Upload before & After Photos</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Upload Before</label>
                                                            <span class="form__container" id="upload-container">
                                                                <input class="form__file dropify" id="upload-files" type="file"  data-height="100"  name="before_image[]" multiple />
                                                            </span>
                                                            <div class="form__files-container" id="files-list-container"></div>

                                                        </div>
                                                        <div id="preview-section"></div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Upload After</label>
                                                            <span class="form__container" id="upload-container">
                                                                <input class="form__file dropify" id="upload-files" type="file"  data-height="100"  name="after_image[]" multiple />
                                                            </span>
                                                            <div class="form__files-container" id="files-list-container"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="add_address text-end">
                                                        <button type="button" onclick="validateForm('uploadBeforeAfterImage')" class="theme_btn btn add_btn"> <i class="uil-scenery"></i>Upload </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-lg-12">
                                                <div class="title_head">
                                                    <h4>Before Photos</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contain">
                                                    @if(isset($beforeImages) && $beforeImages->count() > 5)
                                                    <div id="owl-carousel"
                                                        class="before_after_slider owl-carousel owl-theme">
                                                            @foreach ($beforeImages as $before)
                                                                <div class="item mx-1" id="img_div__{{$before->id}}" >
                                                                    <div class="image_box_main">
                                                                        <div class="images_box">
                                                                            <div class="magnific-img">
                                                                                <a class="image-popup-vertical-fit"
                                                                                    href="{{ url(env('STORE_PATH') . $before->shift_images) }}"
                                                                                    title="Before">
                                                                                    <img src="{{ url(env('STORE_PATH') . $before->shift_images) }}"
                                                                                        alt="9.jpg" />
                                                                                    <i class="fa fa-search-plus"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>
                                                                        <div class="action_btns_for">
                                                                            <a href="javascript:void(0)"
                                                                                class="download_btn"><i
                                                                                    class="uil-down-arrow "></i></a>
                                                                            <a href="javascript:void(0)"
                                                                                onclick="deleteRecordTbl('{{ $before->id }}','ClientSiteShiftCleanerImage','img_div__{{$before->id}}')"
                                                                                class="trash_btn"><i
                                                                                    class="uil-trash"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                    @isset($beforeImages)


                                                    @foreach ($beforeImages as $before)
                                                                <div class="item mx-1" style="width: 20%" id="img_div__{{$before->id}}" >
                                                                    <div class="image_box_main">
                                                                        <div class="images_box">
                                                                            <div class="magnific-img">
                                                                                <a class="image-popup-vertical-fit"
                                                                                    href="{{ url(env('STORE_PATH') . $before->shift_images) }}"
                                                                                    title="Before">
                                                                                    <img src="{{ url(env('STORE_PATH') . $before->shift_images) }}"
                                                                                        alt="9.jpg" />
                                                                                    <i class="fa fa-search-plus"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </div>

                                                                        </div>
                                                                        <div class="action_btns_for">
                                                                            <a href="javascript:void(0)"
                                                                                class="download_btn"><i
                                                                                    class="uil-down-arrow "></i></a>
                                                                            <a href="javascript:void(0)"
                                                                                onclick="deleteRecordTbl('{{ $before->id }}','ClientSiteShiftCleanerImage','img_div__{{$before->id}}')"
                                                                                class="trash_btn"><i
                                                                                    class="uil-trash"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            @endisset
                                                    @endif
                                            </div>

                                            <div class="col-lg-12 mt-3">
                                                <div class="title_head">
                                                    <h4>After Photos</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contain">
                                                    @if (isset($afterImages) && $afterImages->count() > 5)
                                                    <div id="owl-carousel"  class="before_after_slider owl-carousel owl-theme">
                                                        @isset($afterImages)
                                                            @foreach ($afterImages as $after)
                                                                <div class="item mx-1" style="width:auto;" id="img_div__{{$before->id}}">
                                                                    <div class="image_box_main">
                                                                        <div class="images_box">
                                                                            <div class="magnific-img">
                                                                                <a class="image-popup-vertical-fit"
                                                                                    href="{{ url(env('STORE_PATH') . $after->shift_images) }}"
                                                                                    title="After">
                                                                                    <img src="{{ url(env('STORE_PATH') . $after->shift_images) }}"
                                                                                        alt="" />
                                                                                    <i class="fa fa-search-plus"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="action_btns_for">
                                                                            <a href="javascript:void(0)"
                                                                                class="download_btn"><i
                                                                                    class="uil-down-arrow "></i></a>
                                                                            <a href="javascript:void(0)"
                                                                                onclick="deleteRecordTbl('{{ $after->id }}','ClientSiteShiftCleanerImage','img_div__{{$before->id}}')"
                                                                                class="trash_btn"><i
                                                                                    class="uil-trash"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endisset
                                                    </div>
                                                    @else
                                                    @isset($afterImages)
                                                            @foreach ($afterImages as $after)
                                                                <div class="item mx-1" style="width:auto;" id="img_div__{{$before->id}}">
                                                                    <div class="image_box_main">
                                                                        <div class="images_box">
                                                                            <div class="magnific-img">
                                                                                <a class="image-popup-vertical-fit"
                                                                                    href="{{ url(env('STORE_PATH') . $after->shift_images) }}"
                                                                                    title="After">
                                                                                    <img src="{{ url(env('STORE_PATH') . $after->shift_images) }}"
                                                                                        alt="" />
                                                                                    <i class="fa fa-search-plus"
                                                                                        aria-hidden="true"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="action_btns_for">
                                                                            <a href="javascript:void(0)"
                                                                                class="download_btn"><i
                                                                                    class="uil-down-arrow "></i></a>
                                                                            <a href="javascript:void(0)"
                                                                                onclick="deleteRecordTbl('{{ $after->id }}','ClientSiteShiftCleanerImage','img_div__{{$before->id}}')"
                                                                                class="trash_btn"><i
                                                                                    class="uil-trash"></i></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endisset
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- main_bx_dt -->
                            </div>
                        </div>
                            <div class="tab-pane" id="messages">
                                <div class="sites_main">
                                    <div class="row">
                                        <form id="uploadOtherDocs" action="{{route('work-order.work-order.upload-other-doc',['id'=>$workOrder->id ??'0'])}}" method="post" enctype="multipart/form-data">@csrf
                                        <div class="col-lg-12">
                                            <div class="mb-2">
                                                <label class="form-label">Upload Other Document</label>
                                                <input required name="other_doc" type="file" class="dropify"
                                                    data-height="100" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="add_address text-end mb-3">
                                                <button type="button" onclick="validateForm('uploadOtherDocs')" class="theme_btn btn add_btn"><i class="uil-scenery"></i>Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Document Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($other_docs)
                                                        @foreach ($other_docs as $other_doc)
                                                            <tr id="other_doc{{$other_doc->id}}{{time()}}">
                                                                <td>
                                                                    <img class="display_hidden"
                                                                    src="{{ url(env('STORE_PATH') . $other_doc->document) }}"
                                                                    alt="9.jpg" style="width: 70px;" />
                                                                    {{$other_doc->document}}
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0)"><span
                                                                            class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                                class="uil-down-arrow "></i></span></a>

                                                                    <a class="image-popup-vertical-fit"
                                                                        href="{{ url(env('STORE_PATH') . $other_doc->document) }}"
                                                                        title="{{$other_doc->document}}">

                                                                        <span
                                                                            class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                                            <i class="uil-eye" aria-hidden="true"></i> </span>
                                                                    </a>
                                                                    <a href="javascript:void(0)" onclick="deleteRecordTbl('{{$other_doc->id}}','OtherDocument','other_doc{{$other_doc->id}}{{time()}}')"><span
                                                                            class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                                class="uil-trash"></i></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="comments">

                                <div class="sites_main">
                                    <div class="row">
                                        <form id="uploadAdminstrativeDoc" action="{{route('work-order.work-order.upload-adminstrative-doc',['id'=>$workOrder->id])}}" method="post" enctype="multipart/form-data">@csrf
                                            <div class="col-lg-12">
                                                <div class="mb-2">
                                                    <label class="form-label">Upload Administrative Documents</label>
                                                    <input required name="administrative_doc" type="file" class="dropify"
                                                        data-height="100" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="add_address text-end mb-3">
                                                   <button type="button" onclick="validateForm('uploadAdminstrativeDoc')"  class="theme_btn btn add_btn"><i class="uil-scenery"></i>Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Document Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($other_docs)
                                                        @foreach ($administrative_docs as $administrative_doc)
                                                            <tr id="administrative_doc{{$administrative_doc->id}}{{time()}}">
                                                                <td><img class="display_hidden"
                                                                    src="{{ url(env('STORE_PATH') . $administrative_doc->document) }}"
                                                                    alt="9.jpg" style="width: 70px;" />
                                                                    {{$administrative_doc->document}}</td>
                                                                <td>

                                                                    <a href="javascript:void(0)"><span
                                                                            class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                                class="uil-down-arrow "></i></span></a>

                                                                    <a class="image-popup-vertical-fit"
                                                                        href="{{ url(env('STORE_PATH') . $administrative_doc->document) }}"
                                                                        title="{{$administrative_doc->document ??''}}">

                                                                        <span
                                                                            class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                                            <i class="uil-eye" aria-hidden="true"></i> </span>
                                                                    </a>
                                                                    <a href="javascript:void(0)" onclick="deleteRecordTbl('{{$administrative_doc->id}}','OtherDocument','administrative_doc{{$administrative_doc->id}}{{time()}}')"><span
                                                                            class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                                class="uil-trash"></i></span></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
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
        <!-- end row -->
    </div>
    <!-- container -->


    <div class="modal fade" id="changeStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('work-order.work-order.change.status',['id'=>$workOrder->id])}}" method="POST"> @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3 mt-3 mt-sm-0">
                                    <label class="form-label">Status</label>
                                    <select class="form-select js-example-basic-single3" name="status">
                                        <option value="">Select Status</option>
                                        <option value="To Schedule"{{$workOrder->status == 'To Schedule'?'selected':''}}>To Schedule</option>
                                        <option value="To Quote"{{$workOrder->status == 'To Quote'?'selected':''}}>To Quote</option>
                                        <option value="Scheduled"{{$workOrder->status == 'Scheduled'?'selected':''}}> Scheduled</option>
                                        <option value="Cancelled"{{$workOrder->status == 'Cancelled'?'selected':''}}> Cancelled</option>
                                        <option value="On Hold" {{$workOrder->status == 'On Hold'?'selected':''}}> On Hold</option>
                                        <option value="Completed"{{$workOrder->status == 'Completed'?'selected':''}}> Completed</option>
                                        <option value="Re-Attendance"{{$workOrder->status == 'Re-Attendance'?'selected':''}}> Re-Attendance</option>
                                        <option value="In Progress"{{$workOrder->status == 'In Progress'?'selected':''}}> In Progress</option>
                                        <option value="Closed"{{$workOrder->status == 'Closed'?'selected':''}}> Closed</option>
                                        <option value="Send Confirmation"{{$workOrder->status == 'Send Confirmation'?'selected':''}}> Send Confirmation</option>
                                        <option value="Invoiced" {{$workOrder->status == 'Invoiced'?'selected':''}}> Invoiced</option>
                                        <option value="To Invoice"{{$workOrder->status == 'To Invoice'?'selected':''}}>To Invoice</option>
                                        <option value="Duplicated"{{$workOrder->status == 'Duplicated'?'selected':''}}>Duplicated</option>
                                        <option value="PO Required"{{$workOrder->status == 'PO Required'?'selected':''}}>PO Required</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('push_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
    <script>
        $('.before_after_slider').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            items: 5,
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
         $(function(){
            $('.js-example-basic-single3').select2({
		        dropdownParent: $('#changeStatus')
	        });

        })
        $(document).ready(function() {
            $('.image-popup-vertical-fit').magnificPopup({
                type: 'image',
                mainClass: 'mfp-with-zoom',
                gallery: {
                    enabled: true
                },

                zoom: {
                    enabled: true,

                    duration: 300, // duration of the effect, in milliseconds
                    easing: 'ease-in-out', // CSS transition easing function

                    opener: function(openerElement) {

                        return openerElement.is('img') ? openerElement : openerElement.find('img');
                    }
                }

            });

        });
    </script>

<script>

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
  function deleteRecordTbl(docId,table_name,divname) {
   // alert(docId);exit();
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
                           "table_name":table_name,
                           "_token" : "{{ csrf_token() }}"
                       },
                       dataType: 'json',
                       success: function(result) {
                           if (result.status) {
                               swal({
                                   type:'success',
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

<script>
    const INPUT_FILE = document.querySelector('#upload-files');
	  const INPUT_CONTAINER = document.querySelector('#upload-container');
	  const FILES_LIST_CONTAINER = document.querySelector('#files-list-container');
	  const FILE_LIST = [];
	  let UPLOADED_FILES = [];

	  const multipleEvents = (element, eventNames, listener) => {
	    const events = eventNames.split(' ');

	    events.forEach(event => {
	      element.addEventListener(event, listener, false);
	    });
	  };

	  const previewImages = () => {
	    FILES_LIST_CONTAINER.innerHTML = '';
	    if (FILE_LIST.length > 0) {
	      FILE_LIST.forEach((addedFile, index) => {
	        const content = `
        <div class="form__image-container js-remove-image" data-index="${index}">
          <img class="form__image" src="${addedFile.url}" alt="${addedFile.name}">
        </div>
      `;

	        FILES_LIST_CONTAINER.insertAdjacentHTML('beforeEnd', content);
	      });
	    } else {
	      console.log('empty');
	      INPUT_FILE.value = "";
	    }
	  };

	  const fileUpload = () => {
	    if (FILES_LIST_CONTAINER) {
	      multipleEvents(INPUT_FILE, 'click dragstart dragover', () => {
	        INPUT_CONTAINER.classList.add('active');
	      });

	      multipleEvents(INPUT_FILE, 'dragleave dragend drop change blur', () => {
	        INPUT_CONTAINER.classList.remove('active');
	      });

	      INPUT_FILE.addEventListener('change', () => {
	        const files = [...INPUT_FILE.files];
	        console.log("changed");
	        files.forEach(file => {
	          const fileURL = URL.createObjectURL(file);
	          const fileName = file.name;
	          if (!file.type.match("image/")) {
	            // alert(file.name + " is not an image");
	            // console.log(file.type);
	          } else {
	            const uploadedFiles = {
	              name: fileName,
	              url: fileURL
	            };


	            FILE_LIST.push(uploadedFiles);
	          }
	        });

	        console.log(FILE_LIST); //final list of uploaded files
	        previewImages();
	        UPLOADED_FILES = document.querySelectorAll(".js-remove-image");
	        removeFile();
	      });
	    }
	  };

	  const removeFile = () => {
	    UPLOADED_FILES = document.querySelectorAll(".js-remove-image");

	    if (UPLOADED_FILES) {
	      UPLOADED_FILES.forEach(image => {
	        image.addEventListener('click', function() {
	          const fileIndex = this.getAttribute('data-index');

	          FILE_LIST.splice(fileIndex, 1);
	          previewImages();
	          removeFile();
	        });
	      });
	    } else {
	      [...INPUT_FILE.files] = [];
	    }
	  };

	  fileUpload();
	  removeFile();
</script>

<script>
    function saveDivAsImage(format) {
        const myDiv = document.getElementById('print-div');

        html2canvas(myDiv)
            .then(canvas => {
            if (format === 'png') {
                const image = canvas.toDataURL('image/png');
                const link = document.createElement('a');
                link.href = image;
                link.download = 'myDiv.png';
                link.click();
            } else if (format === 'pdf') {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF();
                pdf.addImage(imgData, 'PNG', 0, 0, canvas.width, canvas.height);
                pdf.save('myDiv.pdf');
            }
            });
        }


    function validateForm(formId) {
        let isValid = true;
        let selectValidationCss = {
            borderColor: "#ed5e49",
            paddingRight: "calc(1.5em + .94rem)",
            background: `none`,
            backgroundRepeat: 'no-repeat',
            backgroundPosition: 'right calc(.375em + .94rem) center',
            backgroundSize: 'calc(.75em + .47rem) calc(.75em + .47rem)'
        };

        let selectValidationCssNot = {
            borderColor: "1px solid var(--bs-form-check-input-border)",
            paddingRight: "0",
            backgroundImage: `none`,
        };
        $('.select2-selection').css(selectValidationCssNot);
        $(`#${formId} [required]`).each(function() {
            if ($(this).is(':file') && !$(this)[0].files.length) {
                isValid = false;
                $(this).closest('.dropify-wrapper').addClass('is-invalid');
                $(this).closest('.dropify-wrapper').css(selectValidationCss);
                $(this).focus();
            }else if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() == 0))) {
                isValid = false;
                $(this).addClass('is-invalid');
                if ($(this).is('select')) {
                    $(this).next('.select2-container').find('.select2-selection').css(selectValidationCss);
                }

                $(this).css(selectValidationCss);
                $(this).focus();
            }  else {
                $(this).focus();
                $(this).removeClass('is-invalid');
            }
        });

        if (isValid) {
            $(`#${formId}`).submit();
        }
    }

</script>

@endpush
