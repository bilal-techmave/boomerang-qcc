@extends('layouts.main') @section('main-content')
<link rel="stylesheet" href="../../assets-tmp/css/templates.css">
<!-- <link rel="stylesheet" href="inspection/templates.css"> -->
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
          max-width: 200px; /* Adjust the maximum width as needed */
          max-height: 200px; /* Adjust the maximum height as needed */
      }
</style>
<!-- Start Content-->
<div class="container-fluid nopadding_custom">
    <div class="create_template_header">
        <div class="htem_text_back">
            <a href="templates.php">
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
                     <form id="noteForm" action="{{route('inspections.store')}}" method="post" enctype="multipart/form-data">@csrf
                        <div class="step" id="step1">
                           <h2 class="title_wizard_stepmain">Untitled Page</h2>
                           <div class="templetes_frm_sections">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="check_box">
                                       <label class="form-label" for="exampleInputEmail1">Conducted on</label>
                                       <input type="text" id="datetimePicker" class="commonDate_Time_picker" name="question[0][conducted_on]" placeholder="Due: 26 Dec 2023 4:05 PM">
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
                                          <textarea id="noteTextarea_1" name="question[0][note]" placeholder="Enter your note..." oninput="toggleSaveButton(1)"></textarea>
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
                                       <input type="file" id="mediaInput_1" accept="image/*" name="question[0][media]" onchange="displaySelectedImage(1)">
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
                                          <button type="button" class="createActionoff_canvas" data-no="0" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_0" aria-controls="offcanvasBottom">
                                             <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                             Create Action
                                          </button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="templetes_frm_sections">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="check_box">
                                       <label class="form-label" for="textlabel"><span class="required_Field">*</span> Demo 1</label>
                                       <input type="text" class="form-control" id="textlabel" name="question[1][demo_1]" placeholder="">
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
                                          <textarea id="noteTextarea_2" name="question[1][note]" placeholder="Enter your note..." oninput="toggleSaveButton(2)"></textarea>
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
                                       <input type="file" id="mediaInput_2" name="question[1][media]" accept="image/*" onchange="displaySelectedImage(2)">
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
                                          <button type="button" class="createActionoff_canvas" data-no="1" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_1" aria-controls="offcanvasBottom">
                                             <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                             Create Action
                                          </button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="templetes_frm_sections">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="fieldforcheck_Box">
                                       <label class="form-label" for="textlabel"><span class="required_Field">*</span>
                                       <input type="checkbox" id="myCheckbox" name="question[2][demo_4]"> Demo 4</label>
                                       <p id="displayText" class="insp_checkfield_text">You're required to create or link an open action
                                       </p>
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
                                          <textarea id="noteTextarea_3" name="question[2][note]" placeholder="Enter your note..." oninput="toggleSaveButton(3)"></textarea>
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
                                       <input type="file" id="mediaInput_3" name="question[2][media]" accept="image/*" onchange="displaySelectedImage(3)">
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
                                          <button type="button" class="createActionoff_canvas" data-no="2" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_2" aria-controls="offcanvasBottom">
                                             <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                             Create Action
                                          </button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="templetes_frm_sections">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="check_box">
                                       <label class="form-label" for="Preparedby">Prepared by</label>
                                       <input type="text" class="form-control" id="Preparedby" name="question[3][prepared_by]" value="Luan Ramos">
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
                                          <textarea id="noteTextarea_4" name="question[3][note]" placeholder="Enter your note..." oninput="toggleSaveButton(4)"></textarea>
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
                                       <input type="file" id="mediaInput_4" name="question[3][media]" accept="image/*" onchange="displaySelectedImage(4)">
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
                                          <button type="button" class="createActionoff_canvas" data-no="3" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_3" aria-controls="offcanvasBottom">
                                             <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                             Create Action
                                          </button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="templetes_frm_sections">
                              <div class="row">
                                 <div class="col-lg-10">
                                    <div class="check_box">
                                       <label class="form-label" for="Preparedby">Location</label>
                                       <!-- <textarea class="textarea__StyledTextarea-sc-f8apvd-0 fjUUWP fs-block" placeholder="Location" style="margin-right: 0.5rem; flex-grow: 1; height: 65.6px;">A/18, H Block, Sector 63, Noida, Uttar Pradesh 201301, India</textarea> -->
                                       <textarea class="form-control" name="question[4][location]" id="addressTextarea" rows="3">A/18, H Block, Sector 63, Noida, Uttar Pradesh 201301, India</textarea>
                                    </div>
                                 </div>
                                 <div class="col-lg-2 flex_btncolumn">
                                    <button class="btn btn-primary mt-3" id="mapButton">
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
                                          <textarea id="noteTextarea_5" name="question[4][note]" placeholder="Enter your note..." oninput="toggleSaveButton(5)"></textarea>
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
                                       <input type="file" id="mediaInput_5" name="question[4][media]" accept="image/*" onchange="displaySelectedImage(5)">
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
                                          <button type="button" class="createActionoff_canvas" data-no="4" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_4" aria-controls="offcanvasBottom">
                                             <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                             Create Action
                                          </button>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <button type="button" onclick="nextStep(1)" class="button_nextstep">Next Page <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                        <div class="step" id="step2">
                           <h2 class="title_wizard_stepmain">Untitled Page 2</h2>
                           <div class="accordion accordian_view" id="accordionExample">
                              <div class="accordion-item">
                                 <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       <div class="progress_gyu">1/1 (100%)</div>
                                    </button>
                                 </h2>
                                 <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                       <div class="templetes_frm_sections">
                                          <div class="row">
                                             <div class="col-lg-12">
                                                <div class="check_box">
                                                   <label class="form-label" for="exampleInputEmail1">I'm sorry, I did not understand your request. Could you please clarify what you mean by "test"?
                                                   </label>
                                                   <div class="button-container questionbuttons_status">
                                                      <button type="button" id="yesButton">Yes</button>
                                                      <button type="button" id="noButton">No</button>
                                                      <button type="button" id="naButton">N/A</button>
                                                   </div>
                                                   <input type="hidden" id="question_button" name="question[5][value]" value="">
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
                                                <!-- Note Form -->
                                                <div id="noteForm_6" class="hidden">
                                                   <div class="check_box">
                                                      <textarea id="noteTextarea_6" name="question[5][note]" placeholder="Enter your note..." oninput="toggleSaveButton(6)"></textarea>
                                                   </div>
                                                   <button type="button" id="cancelButton_edit" onclick="cancelNote(6)">Cancel</button>
                                                   <button type="button" class="saveButton" id="saveButton_6" onclick="saveNote(6)" disabled>Save</button>
                                                </div>
                                                <!-- Display Note -->
                                                <!-- Display Note -->
                                                <div id="noteDisplay_6" class="hidden">
                                                   <div id="noteText_6" class="note-text" onclick="editNote(6)">
                                                      Click to edit note
                                                   </div>
                                                </div>
                                                <!-- Media Input -->
                                                <div id="mediaInputContainer_6" class="hidden">
                                                   <input type="file" id="mediaInput_6" name="question[5][media]" accept="image/*" onchange="displaySelectedImage(6)">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="accounts_manage_Footer">
                                             <div class="accoutnfooter_actions">
                                                <ul>
                                                   <li>
                                                      <button type="button" onclick="showNoteForm(6)">
                                                         <iconify-icon icon="fluent:note-add-48-regular"></iconify-icon>
                                                         Add Note
                                                      </button>
                                                   </li>
                                                   <li>
                                                      <button type="button" onclick="addMedia(6)">
                                                         <iconify-icon icon="iconoir:add-media-image"></iconify-icon>
                                                         Create Media
                                                      </button>
                                                   </li>
                                                   <li>
                                                      <button type="button" class="createActionoff_canvas" data-no="5" data-bs-toggle="offcanvas" data-bs-target="#createActionoff_canvas_5" aria-controls="offcanvasBottom">
                                                         <iconify-icon icon="uit:create-dashboard"></iconify-icon>
                                                         Create Action
                                                      </button>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="button" onclick="prevStep(2)" class="button_previousstep"><i class="fa-solid fa-arrow-left"></i> Previous Page</button>
                           <a href="#">
                           <button type="submit" class="button_nextstep">
                           Complete Inspection <i class="fa-regular fa-circle-check"></i>
                           </button>
                           </a>
                        </div>
                      <!-- <div class="step" id="step3">
                        <h2>test 3</h2>
                        <p>Content of step 3</p>
                        <button onclick="prevStep(3)" class="button_previousstep"><i
                                class="fa-solid fa-arrow-left"></i> Previous Page</button>
                        <button onclick="nextStep(3)" class="button_nextstep">Next Page <i
                                class="fa-solid fa-arrow-right"></i></button>
                        </div> -->

                        <!-- !model  -->
                           
                        <div class="offcanvas offcanvas-bottom createActionoff_canvas_md" tabindex="-1" id="createActionoff_canvas_0" aria-labelledby="offcanvasBottomLabel"></div>
                        <div class="offcanvas offcanvas-bottom createActionoff_canvas_md" tabindex="-1" id="createActionoff_canvas_1" aria-labelledby="offcanvasBottomLabel"></div>
                        <div class="offcanvas offcanvas-bottom createActionoff_canvas_md" tabindex="-1" id="createActionoff_canvas_2" aria-labelledby="offcanvasBottomLabel"></div>
                        <div class="offcanvas offcanvas-bottom createActionoff_canvas_md" tabindex="-1" id="createActionoff_canvas_3" aria-labelledby="offcanvasBottomLabel"></div>
                        <div class="offcanvas offcanvas-bottom createActionoff_canvas_md" tabindex="-1" id="createActionoff_canvas_4" aria-labelledby="offcanvasBottomLabel"></div>
                        <div class="offcanvas offcanvas-bottom createActionoff_canvas_md" tabindex="-1" id="createActionoff_canvas_5" aria-labelledby="offcanvasBottomLabel"></div>

                        <!-- model! -->

                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
    <!-- container -->
    <?php //include 'footer.php' ?>
        @include('inspection.footer')
        <!-- inspection all form js here -->
        <script src="../assets-tmp/js/startInspection.js"></script>
        <!-- create action modal -->
        {{--<div class="offcanvas createActionoff_canvas offcanvas-bottom" tabindex="-1" id="createActionoff_canvas" aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasBottomLabel">Create Action</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body small">
                <div class="createaction_form_container">
                    <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                        <div class="templateinput_title_description">
                            <input type="text" id="pageTitle" name="question[0][action][title]" placeholder="Title of Action">
                            <input type="text" id="pageDescription" name="question[0][action][description]" placeholder="Add a description">
                        </div>
                        <div class="actions_FieldsArea">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group__CSTD customselectstyle__">
                                        <label for="">Priority</label>
                                        <select class="form-select canvas_selectoption" name="question[0][action][priority]">
                                            <option value="Low Priority">Low Priority</option>
                                            <option value="Medium Priority" selected>Medium Priority</option>
                                            <option value="High Priority">High Priority</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group__CSTD customselectstyle__">
                                        <label for="datetimepicker">Due Date</label>
                                        <input type="text" id="datetimePicker" class="commonDate_Time_picker" name="question[0][action][due_date]" placeholder="Due: 26 Dec 2023 4:05 PM">
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
                                <input type="text" name="labe" name="question[0][action][add_lable]" placeholder="Add Label">
                                <!-- <div class="dropdown dropdowncutom_style">
                                    <button class="btn   dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Add Label
                                    </button>
                                    <ul class="dropdown-menu menudrop_custom">
                                        <p>There are no action labels. Organize your actions further with customizable labels.
                                        </p>
                                        <div class="addAction_label_container">
                                            <a href="##">Add Action Labels</a>
                                        </div>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>--}}
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3635788.814623532!2d80.85930415!3d27.138192749999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1702972772404!5m2!1sen!2sin" width="100%" height="350" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="start-inspection.php" class="button_locationApply">
                    <button type="button" class="btn">Save & Apply
                    </button>
                </a>
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
<!-- map modal js start -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
           const mapButton = document.getElementById('mapButton');
           const mapModal = new bootstrap.Modal(document.getElementById('mapModal'));
           mapButton.addEventListener('click', function() {
               mapModal.show();
               initializeMap();
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
    document.addEventListener('DOMContentLoaded', function () {
       const yesButton = document.getElementById('yesButton');
       const noButton = document.getElementById('noButton');
       const naButton = document.getElementById('naButton');
       
       yesButton.addEventListener('click', function () {
           setButtonColor(yesButton, 'green');
           clearButtonColor([noButton, naButton]);
       });
       
       noButton.addEventListener('click', function () {
           setButtonColor(noButton, 'red');
           clearButtonColor([yesButton, naButton]);
       });
       
       naButton.addEventListener('click', function () {
           setButtonColor(naButton, 'gray');
           clearButtonColor([yesButton, noButton]);
       });
       
       function setButtonColor(button, color) {
           // Remove all color classes from the button
           button.classList.remove('green', 'red', 'gray');
       
           // Add the selected color class
           button.classList.add(color);
           if(color == 'green'){
            $('#question_button').val('yes')
           }else if(color == 'red'){
            $('#question_button').val('no')
           }else if(color == 'gray'){
            $('#question_button').val('na')
           }
       }
       
       function clearButtonColor(buttons) {
           // Remove color classes from all specified buttons
           buttons.forEach(function (button) {
               button.classList.remove('green', 'red', 'gray');
           });
       }
       });
</script>
<!-- end yes no , n/a -->
<script>
    $('.multilevelselect .l1').on('click',function(){
        var tag = $(this).attr('value');
        var tag1 = $(this).text();
       // window.alert("#layer"+tag1);
       var back_link="#layer"+tag;
       //window.alert(back_link);
       $('.nav-link').attr('href',back_link);
       //$('.nav-link').text(tag1);
       $('.nav-link').attr('value',tag);
       $("#layer"+tag).removeClass('hide-menu'); 
        $("#layer"+tag).toggleClass('show-menu'); 
       });
       $('.nav-link').on('click',function(){
        var tag = $(this).attr('href');
       var val= $(this).attr('value');
       // window.alert(val);
        $(tag).removeClass('show-menu'); 
        var back_link="#layer"+(val-1);
        $('.nav-link').attr('href',back_link);
       $('.nav-link').attr('value',val-1);
       //window.alert(back_link);
       
       });
</script>

<script>
    $(document).ready(function() {
        $('.createActionoff_canvas').click(function() {
            var no = $(this).data('no');
            var html = $('#createActionoff_canvas_' + no).html();
                var offcanvasHtml = `
                    <!-- Offcanvas HTML -->
                    <input type="hidden" class="ckeck-html" name="ckeck-html" value="${no}">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasBottomLabel">Create Action</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body small">
                        <div class="createaction_form_container">
                            <!-- Your form fields -->
                            <div class="actions_FieldsArea">
                                <div class="row">
                                    <div class="col-lg-12 templateinput_title_description mt-5">
                                        <input type="text" id="pageTitle" name="question[${no}][action][title]" placeholder="Title of Action">
                                        <input type="text" id="pageDescription" name="question[${no}][action][description]" placeholder="Add a description">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group__CSTD customselectstyle__">
                                            <label for="">Priority</label>
                                            <select class="form-select canvas_selectoption" name="question[${no}][action][priority]">
                                                <option value="Low Priority">Low Priority</option>
                                                <option value="Medium Priority" selected>Medium Priority</option>
                                                <option value="High Priority">High Priority</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group__CSTD customselectstyle__">
                                            <label for="datetimepicker">Due Date</label>
                                            <input type="text" id="datetimePicker" class="commonDate_Time_picker" name="question[${no}][action][due_date]" placeholder="Due: 26 Dec 2023 4:05 PM">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group__CSTD customselectstyle__">
                                            <label for="">Label</label>
                                            <input type="text" name="question[${no}][action][add_label]" placeholder="Add Label">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                if(!html){
                   $('#createActionoff_canvas_' + no).append(offcanvasHtml);
                }
            // }
        });
    });
</script>


@endsection