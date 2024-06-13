@extends('layouts.main')
@section('main-content')
<link rel="stylesheet" href="../../assets-tmp/css/templates.css">
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

    .selectedImageContainer {
        max-width: 200px;
        /* Adjust the maximum width as needed */
        max-height: 200px;
        /* Adjust the maximum height as needed */
    }
</style>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
<style>
    .mapsearch_Location {
        display: flex;
        margin-bottom: 10px;
    }

    .mapsearch_Location input {
        flex: 1;
        margin-right: 10px;
    }

    #map {
        width: 100%;
        height: 350px;
    }

    .silder-max {
        margin-left: 91%;
    }
</style>
<!-- Start Content-->
<div class="container-fluid nopadding_custom">
    <div class="create_template_header">
        <div class="htem_text_back">
            <a href="{{route('template.index')}}">
                <div class="title_page_template">
                    <div class="backarrow_page">
                        <i class="fa-solid fa-arrow-left"></i>
                    </div>
                    <h1>Start Inspection</h1>
                </div>
            </a>
            <div class="right_publishection">
                <div class="inspectiontemp_name">
                    <h1>Office of Industrial Relations </h1>
                    <p>Last edited by Luan Ramos at 7 Dec 2023 2:57 PM</p>
                </div>
                <div class="sub_nav__LastPublishedDate"></div>
                <a href="inspections.php">
                    <button type="button" class="publishtemp_bnt"><i class="fa-regular fa-paper-plane"></i> Complete Inspection</button>
                </a>
            </div>
        </div>
    </div>
    <section class="startinspection_body">
        <div class="conteiner">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header">
                        <div class="custom-dropdown" id="stepDropdown">
                            <div class="stepsvalue_text">
                                <span>Page 1 of 3 </span>
                                <div class="arrow"><i class="fa-solid fa-chevron-down"></i></div>
                            </div>
                            <div class="dropdown-content">
                                <a href="#" onclick="changeStep(1)">Step 1</a>
                                <a href="#" onclick="changeStep(2)">Step 2</a>
                                <a href="#" onclick="changeStep(3)">Step 3</a>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-form">
                        <form id="myForm" action="{{route('inspections.store')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="step" id="step1">
                                <h2 class="title_wizard_stepmain">Untitled Page</h2>
                                @foreach ($fields as $key => $value)
                                @switch($value->field_type)
                                @case('date_time')
                                <div class="templetes_frm_sections">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="check_box">
                                                <label class="form-label" for="exampleInputEmail1">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                                <input type="text" id="datetimePicker" class="commonDate_Time_picker" name="question[{{$key}}][{{$value->filed_name}}]" placeholder="Due: 26 Dec 2023 4:05 PM">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_1" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_1"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_1" class="hidden" onclick="deleteMedia(1)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Media Display with Delete Button -->

                                            <!-- Note Form -->
                                            <div id="noteForm_1" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_1" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(1)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(1)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_1" onclick="saveNote(1)" disabled>Save</button>
                                            </div>
                                            <!-- Note Form -->

                                            <div id="noteDisplay_1" class="hidden">
                                                <div id="noteText_1" class="note-text" onclick="editNote(1)">
                                                    Click to edit note
                                                </div>
                                            </div>

                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_1" class="hidden">
                                                <input type="file" id="mediaInput_1" accept="image/*" name="question[{{$key}}][media]" onchange="displaySelectedImage(1)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li>
                                                    <button type="button" onclick="showNoteForm(1)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon>
                                                        Add Note
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="addMedia(1)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon>
                                                        Create Media
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('text_answer')
                                <div class="templetes_frm_sections">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="check_box">
                                                <label class="form-label" for="Preparedby">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                                <textarea class="form-control" name="question[{{$key}}][{{$value->filed_name}}]" id="textlabel" cols="30" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_2" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_2"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_2" class="hidden" onclick="deleteMedia(2)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>

                                            <!-- Note Form -->
                                            <div id="noteForm_2" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_2" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(2)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(2)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_2" onclick="saveNote(2)" disabled>Save</button>
                                            </div>
                                            <!-- Display Note -->
                                            <!-- Display Note -->
                                            <div id="noteDisplay_2" class="hidden">
                                                <div id="noteText_2" class="note-text" onclick="editNote(2)">
                                                    Click to edit note
                                                </div>
                                            </div>
                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_2" class="hidden">
                                                <input type="file" id="mediaInput_2" name="question[{{$key}}][media]" accept="image/*" onchange="displaySelectedImage(2)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li>
                                                    <button type="button" onclick="showNoteForm(2)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon>
                                                        Add Note
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="addMedia(2)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon>
                                                        Create Media
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('checkbox')
                                <div class="templetes_frm_sections">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="fieldforcheck_Box">
                                                <label class="form-label" for="textlabel">@if($value->is_required === '1')<span class="required_Field">*</span>@endif
                                                    <input type="checkbox" id="myCheckbox" name="question[{{$key}}][{{$value->filed_name}}]" value="1">{{$value->filed_name}}</label>
                                                <p id="displayText" class="insp_checkfield_text">You're required to create or link an open action</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_3" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_3"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_3" class="hidden" onclick="deleteMedia(3)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Note Form -->
                                            <div id="noteForm_3" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_3" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(3)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(3)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_3" onclick="saveNote(3)" disabled>Save</button>
                                            </div>
                                            <!-- Display Note -->
                                            <!-- Display Note -->
                                            <div id="noteDisplay_3" class="hidden">
                                                <div id="noteText_3" class="note-text" onclick="editNote(3)">
                                                    Click to edit note
                                                </div>
                                            </div>
                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_3" class="hidden">
                                                <input type="file" id="mediaInput_3" name="question[{{$key}}][media]" accept="image/*" onchange="displaySelectedImage(3)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li>
                                                    <button type="button" onclick="showNoteForm(3)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon>
                                                        Add Note
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="addMedia(3)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon>
                                                        Create Media
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('number')
                                <div class="templetes_frm_sections">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="check_box">
                                                <label class="form-label" for="Preparedby">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                                <input type="number" class="form-control" name="question[{{$key}}][{{$value->filed_name}}]" id="textlabel" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_4" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_4"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_4" class="hidden" onclick="deleteMedia(4)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Note Form -->
                                            <div id="noteForm_4" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_4" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(4)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(4)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_4" onclick="saveNote(4)" disabled>Save</button>
                                            </div>
                                            <!-- Display Note -->
                                            <!-- Display Note -->
                                            <div id="noteDisplay_4" class="hidden">
                                                <div id="noteText_4" class="note-text" onclick="editNote(4)">
                                                    Click to edit note
                                                </div>
                                            </div>
                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_4" class="hidden">
                                                <input type="file" id="mediaInput_4" name="question[{{$key}}][media]" accept="image/*" onchange="displaySelectedImage(4)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li>
                                                    <button type="button" onclick="showNoteForm(4)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon>
                                                        Add Note
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="addMedia(4)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon>
                                                        Create Media
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('location')
                                <div class="templetes_frm_sections">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="check_box">
                                                <label class="form-label" for="Preparedby">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                                <textarea class="form-control" name="question[{{$key}}][{{$value->filed_name}}]" id="addressTextarea" rows="3">A/18, H Block, Sector 63, Noida, Uttar Pradesh 201301, India</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 flex_btncolumn">
                                            <button type="button" class="btn btn-primary mt-3" id="mapButton">
                                                <iconify-icon icon="fluent:location-12-regular"></iconify-icon>
                                                Open Map
                                            </button>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_5" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_5"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_5" class="hidden" onclick="deleteMedia(5)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Note Form -->
                                            <div id="noteForm_5" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_5" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(5)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(5)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_5" onclick="saveNote(5)" disabled>Save</button>
                                            </div>
                                            <!-- Display Note -->
                                            <!-- Display Note -->
                                            <div id="noteDisplay_5" class="hidden">
                                                <div id="noteText_5" class="note-text" onclick="editNote(5)">
                                                    Click to edit note
                                                </div>
                                            </div>
                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_5" class="hidden">
                                                <input type="file" id="mediaInput_5" name="question[{{$key}}][media]" accept="image/*" onchange="displaySelectedImage(5)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li>
                                                    <button type="button" onclick="showNoteForm(5)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon>
                                                        Add Note
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" onclick="addMedia(5)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon>
                                                        Create Media
                                                    </button>
                                                </li>
                                                <li>
                                                    <button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('media')
                                <div class="templetes_frm_sections templetes_ghu">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="check_box">
                                                <label class="form-label" for="exampleInputEmail1">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                                <input type="file" class="dropify" name="question[{{$key}}][{{$value->filed_name}}]" data-height="100" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_6" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_6"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_6" class="hidden" onclick="deleteMedia(6)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Media Display with Delete Button -->

                                            <!-- Note Form -->
                                            <div id="noteForm_6" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_6" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(6)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(6)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_6" onclick="saveNote(6)" disabled>Save</button>
                                            </div>
                                            <!-- Note Form -->

                                            <div id="noteDisplay_6" class="hidden">
                                                <div id="noteText_6" class="note-text" onclick="editNote(6)">
                                                    Click to edit note
                                                </div>
                                            </div>

                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_6" class="hidden">
                                                <input type="file" id="mediaInput_6" accept="image/*" name="question[{{$key}}][media]" onchange="displaySelectedImage(6)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li><button type="button" onclick="showNoteForm(6)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon> Add
                                                        Note
                                                    </button></li>
                                                <li><button type="button" onclick="addMedia(6)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon> Create
                                                        Media
                                                    </button></li>

                                                <li><button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('slider')
                                <div class="templetes_frm_sections">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="check_box">
                                                <label class="form-label" for="exampleInputEmail1">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                                <div class="slider-container">
                                                    <span class="text-left">0</span>
                                                    <span class="silder-max">100</span>
                                                    <input type="range" id="customRange" name="question[{{$key}}][{{$value->filed_name}}]" min="0" max="100" value="50" oninput="updateRangeValue(this)">
                                                    <div id="rangeValueDisplay">50</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_7" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_7"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_7" class="hidden" onclick="deleteMedia(7)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Media Display with Delete Button -->

                                            <!-- Note Form -->
                                            <div id="noteForm_7" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_7" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(7)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(7)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_7" onclick="saveNote(7)" disabled>Save</button>
                                            </div>
                                            <!-- Note Form -->

                                            <div id="noteDisplay_7" class="hidden">
                                                <div id="noteText_7" class="note-text" onclick="editNote(7)">
                                                    Click to edit note
                                                </div>
                                            </div>

                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_7" class="hidden">
                                                <input type="file" id="mediaInput_7" accept="image/*" name="question[{{$key}}][media]" onchange="displaySelectedImage(7)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li><button type="button" onclick="showNoteForm(7)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon> Add
                                                        Note
                                                    </button></li>
                                                <li><button type="button" onclick="addMedia(7)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon> Create
                                                        Media
                                                    </button></li>
                                                <li><button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('annotation')
                                <div class="templetes_frm_sections templetes_ghu">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="check_box">
                                                <label class="form-label" for="exampleInputEmail1">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                                <input type="file" class="dropify" name="question[{{$key}}][{{$value->filed_name}}]" data-height="100" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_8" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_8"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_8" class="hidden" onclick="deleteMedia(8)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Media Display with Delete Button -->

                                            <!-- Note Form -->
                                            <div id="noteForm_8" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_8" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(8)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(8)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_8" onclick="saveNote(8)" disabled>Save</button>
                                            </div>
                                            <!-- Note Form -->

                                            <div id="noteDisplay_8" class="hidden">
                                                <div id="noteText_8" class="note-text" onclick="editNote(8)">
                                                    Click to edit note
                                                </div>
                                            </div>

                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_8" class="hidden">
                                                <input type="file" id="mediaInput_8" accept="image/*" name="question[{{$key}}][media]" onchange="displaySelectedImage(8)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li><button type="button" onclick="showNoteForm(8)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon> Add
                                                        Note
                                                    </button></li>
                                                <li><button type="button" onclick="addMedia(8)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon> Create
                                                        Media
                                                    </button></li>
                                                <li><button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @break
                                @case('signature')
                                <div class="templetes_frm_sections ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="form-label" for="exampleInputEmail1">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                            <div class="signature">
                                                <div class="sign_name">
                                                    <input type="text" class="form-control" name="question[{{$key}}][{{$value->filed_name}}]" id="textlabel" placeholder="Full Name">
                                                </div>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                                    Upload Signature
                                                </button>
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#drawModal">
                                                    Draw Signature
                                                </button>
                                            </div>
                                            <div id="signaturePreview">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_9" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_9"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_9" class="hidden" onclick="deleteMedia(9)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Media Display with Delete Button -->

                                            <!-- Note Form -->
                                            <div id="noteForm_9" class="hidden">
                                                <div class="check_box">
                                                    <textarea id="noteTextarea_9" name="question[{{$key}}][note]" placeholder="Enter your note..." oninput="toggleSaveButton(9)"></textarea>
                                                </div>
                                                <button type="button" id="cancelButton_edit" onclick="cancelNote(9)">Cancel</button>
                                                <button type="button" class="saveButton" id="saveButton_9" onclick="saveNote(9)" disabled>Save</button>
                                            </div>
                                            <!-- Note Form -->

                                            <div id="noteDisplay_9" class="hidden">
                                                <div id="noteText_9" class="note-text" onclick="editNote(9)">
                                                    Click to edit note
                                                </div>
                                            </div>

                                            <!-- Media Input -->
                                            <div id="mediaInputContainer_9" class="hidden">
                                                <input type="file" id="mediaInput_9" accept="image/*" name="question[{{$key}}][media]" onchange="displaySelectedImage(9)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accounts_manage_Footer">
                                        <div class="accoutnfooter_actions">
                                            <ul>
                                                <li><button type="button" onclick="showNoteForm(9)">
                                                        <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon> Add
                                                        Note
                                                    </button></li>
                                                <li><button type="button" onclick="addMedia(9)">
                                                        <iconify-icon icon="iconoir:add-media-image"></iconify-icon> Create
                                                        Media
                                                    </button></li>
                                                <li><button type="button" class="createActionoff_canvas" data-no="{{$key}}" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_{{$key}}" aria-controls="offcanvasBottom">
                                                        <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                        Create Action
                                                    </button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hidden input to store signature data URL -->
                                <input type="hidden" id="signatureDataURL" name="question[{{$key}}][signatureDataURL]">
                                @break
                                @case('instruction')
                                <div class="templetes_frm_sections templetes_ghu">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="check_box">
                                                <label class="form-label" for="exampleInputEmail1">{{$value->filed_name}}@if($value->is_required === '1')<span class="required_Field">*</span>@endif</label>
                                                <p>One image or PDF document can be uploaded</p>
                                                <input type="file" class="dropify" name="question[{{$key}}][{{$value->filed_name}}]" data-height="100" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <!-- Media Display with Delete Button -->
                                            <div id="mediaDisplay_10" class="hidden">
                                                <div class="selectedImageContainer" id="selectedImageContainer_10"></div>
                                                <button type="button" class="deleteMedia" id="deleteMedia_10" class="hidden" onclick="deleteMedia(10)">
                                                    <iconify-icon icon="fluent:delete-12-regular"></iconify-icon>
                                                </button>
                                            </div>
                                            <!-- Media Display with Delete Button -->
                                        </div>
                                    </div>
                                </div>
                                @break
                                @endswitch
                                <div class="offcanvas offcanvas-bottom createActionoff_canvas_md" tabindex="-1" id="createActionoff_canvas_{{$key}}" aria-labelledby="offcanvasBottomLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Create Action</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body small">
                                        <div class="createaction_form_container">
                                            <div class="actions_FieldsArea">
                                                <div class="row">
                                                    <div class="col-lg-12 templateinput_title_description mt-5">
                                                        <input type="text" id="pageTitle" name="question[{{$key}}][action][title]" placeholder="Title of Action">
                                                        <input type="text" id="pageDescription" name="question[{{$key}}][action][description]" placeholder="Add a description">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group__CSTD customselectstyle__">
                                                            <label for="">Priority</label>
                                                            <select class="form-select" data-plugin="customselect" name="question[{{$key}}][action][priority]">
                                                                <option selected disabled>Please select one or start typing</option>
                                                                <option value="Low Priority">Low Priority</option>
                                                                <option value="Medium Priority">Medium Priority</option>
                                                                <option value="High Priority">High Priority</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group__CSTD customselectstyle__">
                                                            <label for="datetimepicker">Due Date</label>
                                                            <input type="text" id="datetimePicker" class="commonDate_Time_picker" name="question[{{$key}}][action][due_date]" placeholder="Due: 26 Dec 2023 4:05 PM">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group__CSTD customselectstyle__">
                                                            <label for="">Label</label>
                                                            <input type="text" name="question[{{$key}}][action][add_label]" placeholder="Add Label">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offcanvas-footer p-4">
                                        <div class="action_BtnsInspection">
                                            <a href="#" class="btn btn-secondary" data-bs-dismiss="offcanvas" aria-label="Close">Cancel</a>
                                            <a href="#" class="btn btn-primary" data-bs-dismiss="offcanvas" aria-label="Close">Save</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <!-- <button type="button" onclick="nextStep(1)" class="button_nextstep">Next Page <i class="fa-solid fa-arrow-right"></i></button> -->
                                <a href="#">
                                    <button type="submit" class="button_nextstep">
                                        Complete Inspection <i class="fa-regular fa-circle-check"></i>
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Signature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Dropify File Input -->
                    <input type="file" id="signatureFile" name="signatureFile" class="dropify" data-show-remove="false" data-allowed-file-extensions="jpg jpeg png gif">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="uploadBtn">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Draw Modal -->
    <div class="modal fade" id="drawModal" tabindex="-1" aria-labelledby="drawModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="drawModalLabel">Draw Signature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Signature Drawing Canvas -->
                    <canvas id="signatureCanvas" name="signatureCanvas" width="470" height="200"></canvas>

                </div>
                <div class="modal-footer">
                    <button id="clearCanvas" class="btn btn-danger ">Clear</button>
                    <button type="button" id="saveSignature" class="btn btn-primary ">Save Signature</button>
                </div>
            </div>
        </div>
    </div>
    <!-- container -->
    <script src="../assets-tmp/js/startInspection.js"></script>
</div>
</div>
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
                    <input id="mapSearch" class="form-control" type="text" placeholder="Search for a location">
                    <button type="button" class="btn btn-primary" onclick="searchLocation()">Search</button>
                </div>
                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" class="button_locationApply">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Save & Apply</button>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- map modal end -->

<script src="/assets-tmp/js/startInspection.js"></script>
<script src="/assets-tmp/js/iconify-icon.min.js"></script>
<script src="/assets-tmp/libs/flatpickr/flatpickr.min.js"></script>
<script>
    $('.canvas_selectoption').select2({
        dropdownParent: $('#createActionoff_canvas'),
        minimumResultsForSearch: -1
    });
</script>
<!-- map modal js start -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}&callback=initMap&libraries=places" async defer></script>
<script>
    let map;
    let marker;
    let infowindow;
    let service;
    let geocoder;

    function initMap() {
        const initialLocation = {
            lat: -34.397,
            lng: 150.644
        };
        map = new google.maps.Map(document.getElementById('map'), {
            center: initialLocation,
            zoom: 8
        });

        geocoder = new google.maps.Geocoder();
        infowindow = new google.maps.InfoWindow();
        marker = new google.maps.Marker({
            map: map,
            position: initialLocation,
            draggable: true,
            animation: google.maps.Animation.DROP,
        });

        service = new google.maps.places.PlacesService(map);

        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
            geocodeLatLng(event.latLng);
        });

        marker.addListener('click', () => {
            infowindow.open(map, marker);
        });
    }

    function placeMarker(location) {
        marker.setPosition(location);
        map.setCenter(location);
    }

    function geocodeLatLng(latlng) {
        geocoder.geocode({
            location: latlng
        }, (results, status) => {
            if (status === "OK") {
                if (results[0]) {
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                    document.getElementById('mapSearch').value = results[0].formatted_address;
                    document.getElementById('addressTextarea').value = results[0].formatted_address;
                } else {
                    window.alert("No results found");
                }
            } else {
                window.alert("Geocoder failed due to: " + status);
            }
        });
    }

    function searchLocation() {
        const input = document.getElementById('mapSearch').value;
        const request = {
            query: input,
            fields: ['name', 'geometry'],
        };

        service.findPlaceFromQuery(request, (results, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK && results) {
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                infowindow.setContent(results[0].name);
                infowindow.open(map, marker);
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const mapButton = document.getElementById('mapButton');
        const mapModal = new bootstrap.Modal(document.getElementById('mapModal'));

        mapButton.addEventListener('click', function() {
            mapModal.show();
            const address = document.getElementById('addressTextarea').value;
            document.getElementById('mapSearch').value = address;
            searchLocation();
        });

        $('#mapModal').on('shown.bs.modal', function() {
            google.maps.event.trigger(map, 'resize');
            map.setCenter(marker.getPosition());
        });
    });
</script>
<!-- map modal js end -->
<!-- common datetime picker -->
<script>
    flatpickr(".commonDate_Time_picker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        onReady: function(selectedDates, dateStr, instance) {
            // Add a "Done" button below the calendar
            const doneButton = document.createElement('button');
            doneButton.innerText = 'Done';
            doneButton.addEventListener('click', function() {
                instance.close();
            });

            // Append the "Done" button to the calendar
            instance.calendarContainer.appendChild(doneButton);
        }
    });
</script>
<!-- common datetime picker end-->
<!-- check content hide chow -->
<script>
    var checkbox = document.getElementById('myCheckbox');
    var textElement = document.getElementById('displayText');
    checkbox.addEventListener('change', function() {
        if (checkbox.checked) {
            textElement.style.display = 'block';
        } else {
            textElement.style.display = 'none';
        }
    });
</script>
<!-- check content hide chow end-->
<!-- queston option select js -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const yesButton = document.getElementById('yesButton');
        const noButton = document.getElementById('noButton');
        const naButton = document.getElementById('naButton');

        yesButton.addEventListener('click', function() {
            setButtonColor(yesButton, 'green');
            clearButtonColor([noButton, naButton]);
        });

        noButton.addEventListener('click', function() {
            setButtonColor(noButton, 'red');
            clearButtonColor([yesButton, naButton]);
        });

        naButton.addEventListener('click', function() {
            setButtonColor(naButton, 'gray');
            clearButtonColor([yesButton, noButton]);
        });

        function setButtonColor(button, color) {
            // Remove all color classes from the button
            button.classList.remove('green', 'red', 'gray');

            // Add the selected color class
            button.classList.add(color);
            if (color == 'green') {
                $('#question_button').val('yes')
            } else if (color == 'red') {
                $('#question_button').val('no')
            } else if (color == 'gray') {
                $('#question_button').val('na')
            }
        }

        function clearButtonColor(buttons) {
            // Remove color classes from all specified buttons
            buttons.forEach(function(button) {
                button.classList.remove('green', 'red', 'gray');
            });
        }
    });
</script>
<!-- end yes no , n/a -->
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

<!-- range slider  -->
<script>
    function updateRangeValue(slider) {
        var displayElement = slider.nextElementSibling;
        displayElement.textContent = slider.value;
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Dropify
        $('.dropify').dropify();

        // Upload Button Click Event
        $('#uploadBtn').click(function() {
            var signatureFile = $('#signatureFile')[0].files[0];
            if (signatureFile) {
                // Preview the uploaded signature
                previewSignature(signatureFile);
                $('#uploadModal').modal('hide'); // Hide the modal after upload
            }
        });

        // Preview Signature Image
        function previewSignature(signatureFile) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var signatureImage = $('<img>').attr('src', e.target.result).addClass('img-thumbnail');
                var deleteButton = $('<button>').addClass('btn delete_btnSign').append('<iconify-icon icon="ph:trash"></iconify-icon>');
                deleteButton.click(function() {
                    $(this).closest('.signature-container').remove();
                });

                var uploadDateTime = $('<p>').text(new Date().toLocaleString());
                var signatureContainer = $('<div>').addClass('signature-container').append(signatureImage, uploadDateTime, deleteButton);

                $('#signaturePreview').html(signatureContainer);

                // Save the data URL in the hidden input field
                $('#signatureDataURL').val(e.target.result);
                $('#addressTextarea').val(e.target.result); // Optionally set the textarea value
            }
            reader.readAsDataURL(signatureFile);
        }

        // Initialize Canvas
        const canvas = document.getElementById('signatureCanvas');
        const ctx = canvas.getContext('2d');
        let isDrawing = false;
        let lastX = 0;
        let lastY = 0;

        // Start Drawing
        canvas.addEventListener('mousedown', (e) => {
            isDrawing = true;
            [lastX, lastY] = [e.offsetX, e.offsetY];
        });

        // Continue Drawing
        canvas.addEventListener('mousemove', (e) => {
            if (isDrawing) {
                ctx.beginPath();
                ctx.moveTo(lastX, lastY);
                ctx.lineTo(e.offsetX, e.offsetY);
                ctx.strokeStyle = '#000';
                ctx.lineWidth = 2;
                ctx.lineCap = 'round';
                ctx.stroke();
                [lastX, lastY] = [e.offsetX, e.offsetY];
            }
        });

        // Stop Drawing
        canvas.addEventListener('mouseup', () => {
            isDrawing = false;
        });

        // Stop Drawing if Mouse Leaves Canvas
        canvas.addEventListener('mouseout', () => {
            isDrawing = false;
        });

        // Clear Canvas Button
        const clearCanvasBtn = document.getElementById('clearCanvas');
        clearCanvasBtn.addEventListener('click', function() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });

        // Save Signature Button
        const saveSignatureBtn = document.getElementById('saveSignature');
        saveSignatureBtn.addEventListener('click', function() {
            const signatureImage = canvas.toDataURL(); // Convert canvas to image
            previewDrawnSignature(signatureImage); // Preview the drawn signature
            $('#drawModal').modal('hide'); // Hide the modal after saving
        });

        // Preview Drawn Signature Image
        function previewDrawnSignature(signatureImage) {
            var drawnSignature = $('<img>').attr('src', signatureImage).addClass('img-thumbnail');
            var deleteButton = $('<button>').addClass('btn delete_btnSign').append('<iconify-icon icon="ph:trash"></iconify-icon>');
            deleteButton.click(function() {
                $(this).closest('.signature-container').remove();
            });

            var uploadDateTime = $('<p>').text(new Date().toLocaleString());
            var signatureContainer = $('<div>').addClass('signature-container').append(drawnSignature, uploadDateTime, deleteButton);

            $('#signaturePreview').html(signatureContainer);

            // Save the data URL in the hidden input field
            $('#signatureDataURL').val(signatureImage);
            $('#addressTextarea').val(signatureImage); // Optionally set the textarea value
        }
    });
</script>

@include('common.footer_validation', ['validate_url_path' => 'storage.itemUniqueCheck'])
@endsection