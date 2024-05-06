@extends('layouts.main')
@section('main-content')
<link rel="stylesheet" href="../assets-tmp/css/custom.css">
<link rel="stylesheet" href="../assets-tmp/css/templates.css">
<style>
    .navbar-custom {
        display: none;
    }

    .left-side-menu {
        display: none;
    }

    .content-page {
        margin-left: 0px;
        overflow: hidden;
        padding: 0px;
        min-height: 80vh;
        margin-top: 0px;
    }

    .footer {
        display: none;
    }

    .content-page {
        margin-left: 0px;
        overflow: visible !important;
        padding: 0px;
        min-height: 100% !important;
        height: 100% !important;
        margin-top: 0px;
    }

    #wrapper {
        height: 100%;
        overflow: visible;
        width: 100%;
    }

    body {
        background: rgba(233, 238, 246, 0.75);
    }
</style>
<!-- Start Content-->
<div class="container-fluid nopadding_custom">
    <div class="create_template_header">
        <div class="htem_text_back">
            <a href="inspections.php">
                <div class="title_page_template">
                    <div class="backarrow_page">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h1>Back to list</h1>
                </div>
            </a>
            <div class="right_publishection">
      <div class="ExportReport_dropdown">
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <iconify-icon icon="lets-icons:export"></iconify-icon> Export Report
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Export PDF</a></li>
    <li><a class="dropdown-item" href="#">Export WORD</a></li>
  </ul>
</div>
      </div>

      <div class="ShareReport_button">
        <button type="button">Share</button>
      </div>


            </div>
        </div>
    </div>

    <section class="startinspection_body">
        <div class="conteiner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="InspectionReport_container" id="InspectionReport_container">

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Overview
                                    </button>
                                    <div class="report_statushead">
                                        <span>Incomplete</span>
                                    </div>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                    <div class="templetes_frm_sections">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="report_sect_container uplodedSec_container">
                                                        <div class="uploded_firstimage">
                                                            <img src="../assets-tmp/images/new-images/bg-profile12.jpg" alt="">
                                                        </div>
                                                        <h2>Homemaker The Valley Daily Security Activity Report</h2>
                                                        <span>29 Dec 2023 / ESA SECURITY</span>
                                                    </div>

                                                    <div class="inspection_Score_report">
                                                         <div class="left_scoreCard scoreinsp_thgt">
                                                             <span>Inspection score</span>
                                                             <h2>5 / 5 (100%)</h2>
                                                         </div>
                                                         <div class="right_scoreCard scoreinsp_thgt">
                                                             <span>Flagged items</span>
                                                             <h2>2</h2>
                                                         </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>


                                        <div class="templetes_frm_sections">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="report_sect_container">
                                                        <span>Site conducted</span>
                                                        <h2>Brisbane, Queensland,</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reportAction_area">
                                                <div class="accoutnfooter_actions">
                                                    <ul>
                                                        <li><button type="button" data-bs-toggle="offcanvas"
                                                                data-bs-target="#createActionoff_canvas"
                                                                aria-controls="offcanvasBottom">
                                                                <iconify-icon icon="uit:create-dashboard">
                                                                </iconify-icon>
                                                                Action
                                                            </button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="templetes_frm_sections">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="report_sect_container">
                                                        <span>Conducted on</span>
                                                        <h2><span class="datetimeReport">
                                                                <iconify-icon icon="lets-icons:date-today">
                                                                </iconify-icon> 29 Dec 2023
                                                            </span><span class="datetimeReport">
                                                                <iconify-icon icon="icon-park-outline:time">
                                                                </iconify-icon> 5:30 PM GMT+10
                                                            </span></h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reportAction_area">
                                                <div class="accoutnfooter_actions">
                                                    <ul>
                                                        <li><button type="button" data-bs-toggle="offcanvas"
                                                                data-bs-target="#createActionoff_canvas"
                                                                aria-controls="offcanvasBottom">
                                                                <iconify-icon icon="uit:create-dashboard">
                                                                </iconify-icon>
                                                                Action
                                                            </button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="templetes_frm_sections">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="report_sect_container">
                                                        <span>Prepared by</span>
                                                        <h2>ESA SECURITY</h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reportAction_area">
                                                <div class="accoutnfooter_actions">
                                                    <ul>
                                                        <li><button type="button" data-bs-toggle="offcanvas"
                                                                data-bs-target="#createActionoff_canvas"
                                                                aria-controls="offcanvasBottom">
                                                                <iconify-icon icon="uit:create-dashboard">
                                                                </iconify-icon>
                                                                Action
                                                            </button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="templetes_frm_sections">

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="report_sect_container">
                                                        <span>Location</span>
                                                        <h2>58 Hynes St, Fortitude Valley QLD 4006, Australia
                                                            (-27.4502876, 153.0394336)</h2>
                                                        <div class="rtgy_locat_map">
                                                            <iframe
                                                                src="https://www.google.com/maps/d/embed?mid=1nxxfsdOOs2x2HPEsNV-YlJDLFzM&hl=en&ehbc=2E312F"
                                                                width="640" height="300"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reportAction_area">
                                                <div class="accoutnfooter_actions">
                                                    <ul>
                                                        <li><button type="button" data-bs-toggle="offcanvas"
                                                                data-bs-target="#createActionoff_canvas"
                                                                aria-controls="offcanvasBottom">
                                                                <iconify-icon icon="uit:create-dashboard">
                                                                </iconify-icon>
                                                                Action
                                                            </button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Patrol Checks: Homemaker
                                    </button>

                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                        <div class="petrol_inner_container">
                                            <div class="inner_acrd_subheading">
                                                <h2>Pre Start</h2>
                                            </div>

                                            <div class="templetes_frm_sections">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="report_sect_container">
                                                            <h2>
                                                                <iconify-icon icon="ic:round-check-box"
                                                                    class="headingcheck_positive"></iconify-icon> Keys
                                                                and phone collected
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="templetes_frm_sections">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="report_sect_container">
                                                            <h2>
                                                                <iconify-icon icon="ic:round-check-box"
                                                                    class="headingcheck_positive"></iconify-icon>Check
                                                                CCTV working properly
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="templetes_frm_sections">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="report_sect_container">
                                                            <h2>
                                                                <iconify-icon icon="ic:round-check-box"
                                                                    class="headingcheck_positive"></iconify-icon>No
                                                                hands in pockets or on personal phones during business
                                                                hours
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="templetes_frm_sections">

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="report_sect_container">
                                                            <h2>
                                                                <iconify-icon icon="ic:round-check-box"
                                                                    class="headingcheck_positive"></iconify-icon>Uniform
                                                                to be worn with security showing
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="petrol_inner_container">
                                            <div class="inner_acrd_subheading">
                                                <h2>Facilities</h2>
                                            </div>

                                            <div class="templetes_frm_sections">

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="report_sect_container">
                                                            <h2> Are all lift and escalators operational?</h2>
                                                            <div class="answer_wuestion_filled">
                                                                <span class="statusreport_yes">Yes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="templetes_frm_sections">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="report_sect_container">
                                                            <h2>Are all lift and escalators operational?</h2>
                                                            <div class="answer_wuestion_filled">
                                                                <span class="statusreport_yes">Yes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="templetes_frm_sections">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="report_sect_container">
                                                            <h2>Public and staff toilets checked and clear of cleaning, maintenance, and security issues?</h2>
                                                            <div class="answer_wuestion_filled">
                                                                <span class="statusreport_yes">Yes</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="templetes_frm_sections">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="report_sect_container">
                                                            <h2>Are all letter boxes checked?</h2>
                                                            <div class="answer_wuestion_filled">
                                                                <span class="nullreport_status">N/A</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="templetes_frm_sections">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="report_sect_container">
                                                            <h2>Are all roller shutters closed?</h2>
                                                            <div class="answer_wuestion_filled">
                                                                <span class="noreport_status">N/A</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="reportAction_area">
                                                    <div class="accoutnfooter_actions">
                                                        <ul>
                                                            <li><button type="button" data-bs-toggle="offcanvas"
                                                                    data-bs-target="#createActionoff_canvas"
                                                                    aria-controls="offcanvasBottom">
                                                                    <iconify-icon icon="uit:create-dashboard">
                                                                    </iconify-icon>
                                                                    Action
                                                                </button></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- container -->

    <!-- inspection all form js here -->
    <script src="../assets-tmp/js/startInspection.js"></script>

    <!-- create action modal -->
    <div class="offcanvas createActionoff_canvas offcanvas-bottom" tabindex="-1" id="createActionoff_canvas"
        aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">Create Action</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body small">
            <div class="createaction_form_container">

                <form action="">
                    <div class="templateinput_title_description">
                        <input type="text" id="pageTitle" placeholder="Title of Action">
                        <input type="text" id="pageDescription" placeholder="Add a description">
                    </div>

                    <div class="actions_FieldsArea">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group__CSTD customselectstyle__">
                                    <label for="">Priority</label>
                                    <select data-plugin="customselect" class="form-select canvas_selectoption">
                                        <option value="">Low Priority</option>
                                        <option value="" selected>Medium Priority</option>
                                        <option value="">High Priority</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group__CSTD customselectstyle__">
                                    <label for="datetimepicker">Due Date</label>
                                    <input type="text" id="datetimePicker" class="commonDate_Time_picker"
                                        placeholder="Due: 26 Dec 2023 4:05 PM">

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group__CSTD customselectstyle__">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group__CSTD customselectstyle__">
                            <label for="">Label</label>
                            <div class="dropdown dropdowncutom_style">
                                <button class="btn   dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Add Label
                                </button>
                                <ul class="dropdown-menu menudrop_custom">
                                    <p>There are no action labels. Organize your actions further with customizable
                                        labels.</p>
                                    <div class="addAction_label_container">
                                        <a href="##">Add Action Labels</a>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>

    </div>
</div>
</div>
<!-- create action modal end-->

<!-- map modal start -->
<div class="modal fade" id="mapModal" tabindex="-1" aria-labelledby="mapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapModalLabel">Select Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mapsearch_Location">
                    <input id="mapSearch" class="form-control " type="text" placeholder="Search for a location">
                    <button type="button">Search</button>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3635788.814623532!2d80.85930415!3d27.138192749999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1702972772404!5m2!1sen!2sin"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="start-inspection.php" class="button_locationApply"><button type="button" class="btn">Save &
                        Apply</button></a>
            </div>
        </div>
    </div>
</div>
<!-- map modal end -->

<script>
    $('.canvas_selectoption').select2({
        dropdownParent: $('#createActionoff_canvas'),
        minimumResultsForSearch: -1
    });
</script>

<script>
    $('.multilevelselect .l1').on('click', function() {
        var tag = $(this).attr('value');
        var tag1 = $(this).text();
        // window.alert("#layer"+tag1);
        var back_link = "#layer" + tag;
        //window.alert(back_link);
        $('.nav-link').attr('href', back_link);
        //$('.nav-link').text(tag1);
        $('.nav-link').attr('value', tag);
        $("#layer" + tag).removeClass('hide-menu');
        $("#layer" + tag).toggleClass('show-menu');
    });
    $('.nav-link').on('click', function() {
        var tag = $(this).attr('href');
        var val = $(this).attr('value');
        // window.alert(val);
        $(tag).removeClass('show-menu');
        var back_link = "#layer" + (val - 1);
        $('.nav-link').attr('href', back_link);
        $('.nav-link').attr('value', val - 1);
        //window.alert(back_link);
    });
</script>



<!-- export section in word or pdf js -->

@endsection
