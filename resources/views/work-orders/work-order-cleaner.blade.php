@extends('layouts.main')
@section('app-title', 'Work Order View - Quality Commercial Cleaning')
@section('main-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="work_order_title_id page-title">
                        WO#1236
                        <span class="work_order_date_dp">Created 11/01/2019 by Bianca Barros
                            Department: 24/7 Rapid Response</span>
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
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Client</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>Quality Commercial</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Portfolio</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Site</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Site Contacts</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Address</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>Unit 10 - 5-7 - Cairns Street - Loganholme - BRISBANE -
                                                                    QLD - 4129 </h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Description</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>Extra cleaning QCC office</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Observation</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Internal Communication</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Sales Price</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>$151.00</h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Budget</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>$90.00</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Allocated Time</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>4.00</h6>
                                                            </div>
                                                        </li>

                                                        <li class="green_text">
                                                            <div class="detail_title">
                                                                <h6>Margin </h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>40.40%</h6>
                                                            </div>
                                                        </li>
                                                        <li class="green_text">
                                                            <div class="detail_title">
                                                                <h6>Gross Margin</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>$61.00 </h6>
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

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>PO / Work Bill</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Invoice Number</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>-----</h6>
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

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Status</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>Closed</h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Schedule Date</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>12/01/2019</h6>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Completion Date</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>12/01/2019</h6>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail_title">
                                                                <h6>Closed By</h6>
                                                            </div>
                                                            <div class="detail_ans">
                                                                <h6>Lorena Lopes</h6>
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
                                                        <tr>
                                                            <td>Bruno da Silva Moraes Seriqueira</td>
                                                            <td>4</td>
                                                            <td>90.00</td>
                                                            <td>12/01/2019</td>

                                                        </tr>

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
                                                        <tr>
                                                            <td>Bruno da Silva Moraes Seriqueira</td>
                                                            <td>14/01/2019 07:12:48</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="bottom_footer_dt">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="action_btns">
                                                    <a href="#" class="theme_btn btn-primary btn"><i
                                                            class="uil-list-ul"></i> List</a>
                                                    <a href="#" class="theme_btn btn add_btn "><i
                                                            class="uil-edit"></i> Edit</a>
                                                    <a href="#" class="theme_btn btn save_btn"><i
                                                            class="uil-copy-alt "> Duplicate Job</i></a>
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
                                            <div class="col-lg-12">
                                                <div class="title_head">
                                                    <h4>Upload before & After Photos</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload Before</label>
                                                    <input name="file1" type="file" class="dropify"
                                                        data-height="100" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Upload After</label>
                                                    <input name="file1" type="file" class="dropify"
                                                        data-height="100" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="add_address text-end">
                                                    <a href="#" class="theme_btn btn add_btn"><i
                                                            class="uil-scenery"></i> Upload</a>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="title_head">
                                                    <h4>Before Photos</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contain">
                                                    <div id="owl-carousel"
                                                        class="before_after_slider owl-carousel owl-theme">
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">
                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_230731-756x1008.jpg"
                                                                            title="Before">
                                                                            <img src="assets/images/new-images/20190112_230731-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="Before">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="Before">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="Before">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="Before">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="Before">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-3">
                                                <div class="title_head">
                                                    <h4>After Photos</h4>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="contain">
                                                    <div id="owl-carousel"
                                                        class="before_after_slider owl-carousel owl-theme">
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">
                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_230731-756x1008.jpg"
                                                                            title="After">
                                                                            <img src="assets/images/new-images/20190112_230731-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="After">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="After">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="After">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="After">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="item">
                                                            <div class="image_box_main">
                                                                <div class="images_box">

                                                                    <div class="magnific-img">
                                                                        <a class="image-popup-vertical-fit"
                                                                            href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                            title="After">
                                                                            <img src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                                alt="9.jpg" />
                                                                            <i class="fa fa-search-plus"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="action_btns_for">
                                                                    <a href="#" class="download_btn"><i
                                                                            class="uil-down-arrow "></i></a>
                                                                    <a href="#" class="trash_btn"><i
                                                                            class="uil-trash"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- main_bx_dt -->

                            </div>
                            <!-- <div class="tab-pane" id="tickets">
            <div class="sites_main">
            <div class="row">


                        </div>

               </div>

            </div> -->
                            <div class="tab-pane" id="messages">
                                <div class="sites_main">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-2">
                                                <label class="form-label">Upload Other Document</label>
                                                <input name="file1" type="file" class="dropify"
                                                    data-height="100" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="add_address text-end mb-3">
                                                <a href="#" class="theme_btn btn add_btn"><i
                                                        class="uil-scenery"></i> Upload</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Document Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>BWFinal2.png</td>
                                                        <td>

                                                            <a href="#"><span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                        class="uil-down-arrow "></i></span></a>

                                                            <a class="image-popup-vertical-fit"
                                                                href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                title="After">
                                                                <img class="display_hidden"
                                                                    src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                    alt="9.jpg" />
                                                                <span
                                                                    class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                                    <i class="uil-eye" aria-hidden="true"></i> </span>
                                                            </a>


                                                            <a href="#"><span
                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                        class="uil-trash"></i></span></a>
                                                        </td>


                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="comments">

                                <div class="sites_main">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-2">
                                                <label class="form-label">Upload Administrative Documents</label>
                                                <input name="file1" type="file" class="dropify"
                                                    data-height="100" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="add_address text-end mb-3">
                                                <a href="#" class="theme_btn btn add_btn"><i
                                                        class="uil-scenery"></i> Upload</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <table class="table table-bordered  dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>Document Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>BWFinal2.png</td>
                                                        <td>

                                                            <a href="#"><span
                                                                    class="btn btn-info waves-effect waves-light table-btn-custom"><i
                                                                        class="uil-down-arrow "></i></span></a>

                                                            <a class="image-popup-vertical-fit"
                                                                href="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                title="After">
                                                                <img class="display_hidden"
                                                                    src="assets/images/new-images/20190112_215623-756x1008.jpg"
                                                                    alt="9.jpg" />
                                                                <span
                                                                    class="btn btn-warning waves-effect waves-light table-btn-custom">
                                                                    <i class="uil-eye" aria-hidden="true"></i> </span>
                                                            </a>
                                                            <a href="#"><span
                                                                    class="btn btn-danger waves-effect waves-light table-btn-custom delet_btn"><i
                                                                        class="uil-trash"></i></span></a>
                                                        </td>
                                                    </tr>

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
@endpush
