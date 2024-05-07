<?php include 'header.php' ?>
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
   .accordion-content{
      height:unset !important
   }
   body {
      background: rgba(233, 238, 246, 0.75);
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
               <h1> Template List</h1>
            </div>
         </a>
         <div class="right_publishection">
            <div class="unpublished_sabved_text">Unpublished changes saved</div>
            <div class="sub_nav__LastPublishedDate">Last published: 25 Nov 2023 2:27 PM</div>
            <a href="templates.php"><button type="button" class="publishtemp_bnt"><i
                     class="fa-regular fa-paper-plane"></i> Publish</button></a>

         </div>
      </div>
   </div>
   <div class="createtemp_formarea">
      <div class="container">
         <div class="formedit_createarea">
            <form action="">
               <div class="templatetitle_imgdetails">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="template_titleimage">
                           <div class="form-builder">
                              <div class="templateheader_title">
                                 <div class="image-upload-container">
                                    <div class="profile-pic-wrapper">
                                       <div class="pic-holder">
                                          <!-- uploaded pic shown here -->
                                          <img id="profilePic" class="pic" src="assets/images/new-images/sm-logo.png">

                                          <Input class="uploadProfileInput" type="file" name="profile_pic"
                                             id="newProfilePhoto" accept="image/*" style="opacity: 0;" />
                                          <label for="newProfilePhoto" class="upload-file-block">
                                             <div class="text-center">
                                                <div class="uploadicon_template">
                                                   <iconify-icon icon="bytesize:upload"></iconify-icon>
                                                </div>
                                                <div class="text-uppercase">
                                                   Update <br /> Template Photo
                                                </div>
                                             </div>
                                          </label>
                                       </div>

                                    </div>
                                 </div>
                                 <div class="templateinput_title_description">
                                    <input type="text" id="pageTitle" placeholder="Untitled Template">
                                    <input type="text" id="pageDescription" placeholder="Add a description">
                                 </div>
                              </div>
                              <div class="templateformbox">
                                 <div class="template_title_edgt">
                                    <div class="editable-title">
                                       <span class="title" contenteditable="false">Your Title</span>
                                       <span class="edit-icon">&#9998;</span>
                                    </div>
                                    <div class="title_edtibale_desc_container">
                                       <p>This is where you add your inspection questions and how you want them
                                          answered. E.g. “Is the floor clean?”</p>
                                    </div>
                                 </div>
                                 <div class="questionans_container">
                                    <div class="questionheader_title_head">
                                       <div class="row">
                                          <div class="col-lg-8 nopaddingcol">
                                             <div class="questionhead__ ">
                                                Question
                                             </div>
                                          </div>
                                          <div class="col-lg-4 nopaddingcol border_left_egtr">
                                             <div class="response_type_question">Type of response</div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="template_pagecontainer">
                                       <div class="question_listitem">
                                          <ul class="sortable-list" id="accordion">
                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields purpleiush_bg">T</div> Text
                                                            Answer
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content active">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">
                                                         <div class="link__Link_logic">
                                                            <span>
                                                               <iconify-icon icon="simple-line-icons:graph">
                                                               </iconify-icon> Add logic
                                                            </span>
                                                         </div>
                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Required
                                                               </label>
                                                            </div>
                                                         </div>
                                                         <div>
                                                            <div class="field_format">Format: <span role="button"
                                                                  class="">Short answer</span></div>
                                                         </div>
                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>

                                                   <div class="allInputActions">
                                                      <div class="row">
                                                      <div class="col-lg-12">
                                                         <div class="check_box">
                                                            <label class="form-label" for="textlabel">Text Answer</label>
                                                            <!-- <input type="text" class="form-control" id="textlabel" placeholder=""> -->
                                                            <textarea class="form-control" name="" id="" cols="30" rows="2"></textarea>
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                         <div class="check_box">
                                                            <label class="form-label" for="textlabel">Number</label>
                                                            <input type="number" class="form-control" id="textlabel" placeholder="">
                                                            
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                    <!-- Container for editable checkboxes -->
                                                    <label class="form-label" for="exampleInputEmail1">Add Checkbox</label>
                                                         <div id="checkboxContainer" class="check_box checkbox_mnbx">
                                                            <!-- Initial editable checkbox -->
                                                           
                                                            <div class="editable-label">
                                                               <input type="checkbox">
                                                               <input type="text" value="Editable Label" placeholder="Edit me">
                                                            </div>
                                                         </div>

                                                         <!-- Add More Button -->
                                                         <button class="addMoreBtnCheckbox" id="addMoreButton" type="button"><iconify-icon icon="lets-icons:add-duotone"></iconify-icon> Add More</button>
                                                      </div>
                                                      <div class="col-lg-12">
                                                         <div class="check_box">
                                                            <label class="form-label" for="exampleInputEmail1">Date & Time</label>
                                                            <input type="text" id="datetimePicker" class="commonDate_Time_picker" placeholder="Due: 26 Dec 2023 4:05 PM">

                                                         </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                      <div class="check_box">
                                                            <label class="form-label" for="exampleInputEmail1">Media</label>
                                                            <input name="file1" type="file" class="dropify" data-height="100" />

                                                         </div>
                                                    
                                                      </div>
                                                      <div class="col-lg-12">
                                                         <div class="check_box">
                                                         <label class="form-label" for="exampleInputEmail1">Slider</label>
                                                         <section class="range-slider container">
                                                         <span class="output outputOne"></span>
                                                         <span class="output outputTwo"></span>
                                                         <span class="full-range"></span>
                                                         <span class="incl-range"></span>
                                                         <input name="rangeOne" value="10" min="0" max="100" step="1" type="range">
                                                         <input name="rangeTwo" value="90" min="0" max="100" step="1" type="range">
                                                         </section>
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                      <div class="check_box">
                                                            <label class="form-label" for="exampleInputEmail1">Annotation</label>
                                                            <input name="file1" type="file" class="dropify" data-height="100" />

                                                         </div>
                                                    
                                                      </div>
                                                      <div class="col-lg-12">
                                                         <label class="form-label" for="exampleInputEmail1">Signature</label>
                                                         <div class="signature">
                                                         <div class="sign_name">
                                                             <input type="text" class="form-control" id="textlabel" placeholder="Full Name">
                                                            </div>
                                                              <!-- Signature Upload Button -->
                                                         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
                                                         Upload Signature
                                                         </button>

                                                         <!-- Signature Draw Button -->
                                                         <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#drawModal">
                                                         Draw Signature
                                                         </button>

                                                         </div>
                                                       
                                                         <!-- Signature Image Preview -->
                                                         <div id="signaturePreview">
                                                         <!-- This will be filled with uploaded/drawn signature -->
                                                         </div>

                                                      </div>
                                                      <div class="col-lg-12">
                                                      <label class="form-label" for="textlabel">Location</label>
                                                         <div class="location check_box">
                                                           <div class="location_field">
                                                             <input type="text" class="form-control" id="textlabel" placeholder="Location">
                                                            </div>
                                                            <div class="location_btn">
                                                             <a href="##" class="locationBtnAdd" data-bs-toggle="modal" data-bs-target="#location_add"><iconify-icon icon="mdi:location"></iconify-icon></a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-12">
                                                      <div class="check_box instruction">
                                                            <label class="form-label" for="exampleInputEmail1">Instruction</label>
                                                            <p>One image or PDF document can be uploaded</p>
                                                            <input name="file1" type="file" class="dropify" data-height="100" />

                                                         </div>
                                                    
                                                      </div>
                                                      </div>
                                                 
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>
                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields greeniush_bg">1,2</div>
                                                            Number
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">
                                                         <div class="link__Link_logic">
                                                            <span>
                                                               <iconify-icon icon="simple-line-icons:graph">
                                                               </iconify-icon> Add logic
                                                            </span>
                                                         </div>
                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Required
                                                               </label>
                                                            </div>
                                                         </div>
                                                         <div>
                                                            <div class="field_format">Format: <span role="button"
                                                                  class=""> Number</span></div>
                                                         </div>
                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>
                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields bleuiush_bg">
                                                               <iconify-icon icon="fluent:checkbox-checked-16-filled">
                                                               </iconify-icon>
                                                            </div> Checkbox
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">
                                                         <div class="link__Link_logic">
                                                            <span>
                                                               <iconify-icon icon="simple-line-icons:graph">
                                                               </iconify-icon> Add logic
                                                            </span>
                                                         </div>
                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Required
                                                               </label>
                                                            </div>
                                                         </div>

                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>

                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields radiush_bg">
                                                               <iconify-icon icon="solar:calendar-broken">
                                                               </iconify-icon>
                                                            </div> Date & Time
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">
                                                         <div class="link__Link_logic">
                                                            <span>
                                                               <iconify-icon icon="simple-line-icons:graph">
                                                               </iconify-icon> Add logic
                                                            </span>
                                                         </div>
                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Date
                                                               </label>
                                                            </div>
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Time
                                                               </label>
                                                            </div>
                                                         </div>

                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>

                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields darkgreen_bg">
                                                               <iconify-icon icon="iconoir:media-image"></iconify-icon>
                                                            </div> Media
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">

                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Required
                                                               </label>
                                                            </div>
                                                         </div>

                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>

                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields sliderius_bg">
                                                               <iconify-icon icon="pixelarticons:sliders-2">
                                                               </iconify-icon>
                                                            </div> Slider
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">

                                                         <div class="link__Link_logic">
                                                            <span>
                                                               <iconify-icon icon="simple-line-icons:graph">
                                                               </iconify-icon> Add logic
                                                            </span>
                                                         </div>

                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Required
                                                               </label>
                                                            </div>
                                                         </div>

                                                         <div>
                                                            <div class="field_format">Range: <span role="button"
                                                                  class="">1 - 10</span></div>
                                                         </div>

                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>

                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields annotationius_bg">
                                                               <iconify-icon icon="entypo:round-brush"></iconify-icon>
                                                            </div> Annotation
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">

                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Required
                                                               </label>
                                                            </div>
                                                         </div>

                                                         <div>
                                                            <div class="field_format"><span role="button"
                                                                  class="">Upload image to annotate</span></div>
                                                         </div>

                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>

                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields signatureius_bg">
                                                               <iconify-icon icon="fa6-solid:signature"></iconify-icon>
                                                            </div> Signature
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">

                                                         <div class="link__Link_logic">
                                                            <span>
                                                               <iconify-icon icon="simple-line-icons:graph">
                                                               </iconify-icon> Add logic
                                                            </span>
                                                         </div>

                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Required
                                                               </label>
                                                            </div>
                                                         </div>

                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>

                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Question">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields locationius_bg">
                                                               <iconify-icon icon="typcn:location"></iconify-icon>
                                                            </div> Location
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">

                                                         <div class="required_firlscheck">
                                                            <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" value=""
                                                                  id="flexCheckDefault">
                                                               <label class="form-check-label" for="flexCheckDefault">
                                                                  Required
                                                               </label>
                                                            </div>
                                                         </div>

                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>

                                             <li class="sortable-item">
                                                <div class="sortebla_item_edit">
                                                   <span class="handle-dots">
                                                      <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                                                   </span>
                                                   <input type="text" class="question-input"
                                                      placeholder="Type Instruction">
                                                   <div class="col-lg-4">
                                                      <div class="answerboxwth_dropdown">
                                                         <div type="button" class="answer-button accordion-button"
                                                            onclick="toggleAccordion(this, 'Modal 1');">
                                                            <div class="iconaccordian_fields instructionius_bg">
                                                               <iconify-icon icon="fa-solid:comment"></iconify-icon>
                                                            </div>Instruction
                                                         </div>

                                                      </div>
                                                   </div>
                                                </div>

                                                <div class="accordion-content">
                                                   <div class="item-settings__Container">
                                                      <div class="leftfield_setting_container">

                                                         <div class="link__Link_logic">
                                                            <span> Upload media attachment</span>
                                                         </div>

                                                         <div class="textseting_black">
                                                            <span>One image or PDF document can be uploaded</span>
                                                         </div>

                                                      </div>
                                                      <div>
                                                         <div class="dropdown answeraction_dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                               id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                               aria-expanded="false">
                                                               <iconify-icon icon="entypo:dots-three-vertical">
                                                               </iconify-icon>
                                                            </a>
                                                            <ul class="dropdown-menu"
                                                               aria-labelledby="dropdownMenuLink">
                                                               <li><a class="dropdown-item" href="#">
                                                                     <iconify-icon icon="lets-icons:notebook-fill">
                                                                     </iconify-icon> Paste Questions
                                                                  </a></li>
                                                            </ul>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <button class="delete-button" onclick="deleteItem(this)">
                                                      <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                                                   </button>

                                                </div>

                                             </li>

                                             <!-- Add more questions as needed -->
                                          </ul>
                                       </div>
                                       <div class="addonsbutton_flex_container">
                                          <button type="button" class="add-question-button" onclick="addQuestion()">
                                             <iconify-icon icon="icon-park-outline:plus"></iconify-icon>
                                             Add Question
                                          </button>

                                          <div class="addsectionbutton">
                                             <button type="button">
                                                <iconify-icon icon="tabler:section"></iconify-icon> Add Section
                                             </button>
                                          </div>

                                          <div class="addnew_page_button">
                                             <button type="button">
                                                <iconify-icon icon="iconoir:page-flip"></iconify-icon> Add Page
                                             </button>
                                          </div>

                                       </div>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade inpfieldsmodalmenu" id="commonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Select Question Type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="accordign_bigdrop_menu">
               <div class="acrd_menuitems">
                  

                  <div class="item_type_menu_leftbox">

                     <div class="search_input_styled_menu">

                        <div class="search-bar">
                           <input id="inputTxt" type="text" placeholder="Search ...">
                           <i class="bi bi-search"></i>
                        </div>

                     </div>

                     <div class="multichoice_responce_menubox">

                        <div class="choices_response_items">
                           <div class="choiceresponce_heading">
                              <div class="choiceres_titleinner">Multiple choice responses</div>
                              <div role="button" class="multiplechoice_response_options">+ Responses</div>
                           </div>
                           <div class="choicesbox_width_editbutton activemenu__wcolor">
                              <div class="listofchoice_menu">
                                 <div color="#13855f" mode="light" class="response_chip_menu yesoption_menu">Good</div>
                                 <div color="#ffb000" mode="light" class="response_chip_menu fairmenu_option">Fair</div>
                                 <div color="#c60022" mode="light" class="response_chip_menu no_optionmenu">Poor</div>
                                 <div color="#707070" mode="light" class="response_chip_menu na_responsice_menu ">N/A
                                 </div>
                              </div>
                              <div class="editchoicebox__rgth">
                                 <button type="button" class="editchoices_button_edit">
                                    <svg width="20" height="20" viewBox="0 0 14 14" focusable="false">
                                       <path
                                          d="M2.313 9.734v1.954h1.953l5.76-5.761-1.953-1.953-5.76 5.76zm9.223-5.318a.519.519 0 0 0 0-.734l-1.218-1.219a.519.519 0 0 0-.735 0l-.953.953 1.953 1.953.953-.953z"
                                          fill-rule="nonzero" fill="#545f70"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                           <div class="choicesbox_width_editbutton">
                              <div class="listofchoice_menu">
                                 <div class="responses-menu-item-styled">
                                    <div color="#13855f" mode="light" class="response_chip_menu yesoption_menu">Safe
                                    </div>
                                    <div color="#c60022" mode="light" class="response_chip_menu no_optionmenu">At Risk
                                    </div>
                                    <div color="#707070" mode="light" class="response_chip_menu na_responsice_menu ">N/A
                                    </div>
                                 </div>
                              </div>
                              <div class="editchoicebox__rgth">
                                 <button type="button" class="editchoices_button_edit">
                                    <svg width="20" height="20" viewBox="0 0 14 14" focusable="false">
                                       <path
                                          d="M2.313 9.734v1.954h1.953l5.76-5.761-1.953-1.953-5.76 5.76zm9.223-5.318a.519.519 0 0 0 0-.734l-1.218-1.219a.519.519 0 0 0-.735 0l-.953.953 1.953 1.953.953-.953z"
                                          fill-rule="nonzero" fill="#545f70"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                           <div class="choicesbox_width_editbutton">
                              <div class="listofchoice_menu ">
                                 <div class="responses-menu-item-styled">
                                    <div color="#13855f" mode="light" class="response_chip_menu yesoption_menu">Pass
                                    </div>
                                    <div color="#c60022" mode="light" class="response_chip_menu no_optionmenu">Fail
                                    </div>
                                    <div color="#707070" mode="light" class="response_chip_menu na_responsice_menu">N/A
                                    </div>
                                 </div>
                              </div>
                              <div class="editchoicebox__rgth">
                                 <button type="button" class="editchoices_button_edit">
                                    <svg width="20" height="20" viewBox="0 0 14 14" focusable="false">
                                       <path
                                          d="M2.313 9.734v1.954h1.953l5.76-5.761-1.953-1.953-5.76 5.76zm9.223-5.318a.519.519 0 0 0 0-.734l-1.218-1.219a.519.519 0 0 0-.735 0l-.953.953 1.953 1.953.953-.953z"
                                          fill-rule="nonzero" fill="#545f70"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                           <div class="choicesbox_width_editbutton">
                              <div class="listofchoice_menu ">
                                 <div class="responses-menu-item-styled">
                                    <div color="#13855f" mode="light" class="response_chip_menu yesoption_menu">Yes
                                    </div>
                                    <div color="#c60022" mode="light" class="response_chip_menu no_optionmenu">No</div>
                                    <div color="#707070" mode="light" class="response_chip_menu na_responsice_menu">N/A
                                    </div>
                                 </div>
                              </div>
                              <div class="editchoicebox__rgth">
                                 <button type="button" class="editchoices_button_edit">
                                    <svg width="20" height="20" viewBox="0 0 14 14" focusable="false">
                                       <path
                                          d="M2.313 9.734v1.954h1.953l5.76-5.761-1.953-1.953-5.76 5.76zm9.223-5.318a.519.519 0 0 0 0-.734l-1.218-1.219a.519.519 0 0 0-.735 0l-.953.953 1.953 1.953.953-.953z"
                                          fill-rule="nonzero" fill="#545f70"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                           <div class="choicesbox_width_editbutton">
                              <div class="listofchoice_menu ">
                                 <div class="responses-menu-item-styled">
                                    <div color="#13855f" mode="light" class="response_chip_menu yesoption_menu">
                                       Compliant</div>
                                    <div color="#c60022" mode="light" class="response_chip_menu no_optionmenu">
                                       Non-Compliant</div>
                                    <div class="response-chip__BaseResponseItem-sc-1flrm9c-0 bFIKBl">+1</div>
                                 </div>
                              </div>
                              <div class="editchoicebox__rgth">
                                 <button type="button" class="editchoices_button_edit">
                                    <svg width="20" height="20" viewBox="0 0 14 14" focusable="false">
                                       <path
                                          d="M2.313 9.734v1.954h1.953l5.76-5.761-1.953-1.953-5.76 5.76zm9.223-5.318a.519.519 0 0 0 0-.734l-1.218-1.219a.519.519 0 0 0-.735 0l-.953.953 1.953 1.953.953-.953z"
                                          fill-rule="nonzero" fill="#545f70"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                        </div>

                        <div class="globalmenuacrd_left">

                           <div class="choiceresponce_heading">
                              <div class="choiceres_titleinner">Global Response Sets</div>
                              <div role="button" class="multiplechoice_response_options">+ Create</div>
                           </div>

                           <div class="choicesbox_width_editbutton globalmenuBox">
                              <div class="listofchoice_menu ">Untitled response set</div>
                              <div class="editchoicebox__rgth">
                                 <button type="button" class="editchoices_button_edit">
                                    <svg width="20" height="20" viewBox="0 0 14 14" focusable="false">
                                       <path
                                          d="M2.313 9.734v1.954h1.953l5.76-5.761-1.953-1.953-5.76 5.76zm9.223-5.318a.519.519 0 0 0 0-.734l-1.218-1.219a.519.519 0 0 0-.735 0l-.953.953 1.953 1.953.953-.953z"
                                          fill-rule="nonzero" fill="#545f70"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                           <div class="choicesbox_width_editbutton globalmenuBox">
                              <div class="listofchoice_menu ">Untitled response set</div>
                              <div class="editchoicebox__rgth">
                                 <button type="button" class="editchoices_button_edit">
                                    <svg width="20" height="20" viewBox="0 0 14 14" focusable="false">
                                       <path
                                          d="M2.313 9.734v1.954h1.953l5.76-5.761-1.953-1.953-5.76 5.76zm9.223-5.318a.519.519 0 0 0 0-.734l-1.218-1.219a.519.519 0 0 0-.735 0l-.953.953 1.953 1.953.953-.953z"
                                          fill-rule="nonzero" fill="#545f70"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                           <div class="choicesbox_width_editbutton globalmenuBox">
                              <div class="listofchoice_menu">Untitled response set</div>
                              <div class="editchoicebox__rgth">
                                 <button type="button" class="editchoices_button_edit">
                                    <svg width="20" height="20" viewBox="0 0 14 14" focusable="false">
                                       <path
                                          d="M2.313 9.734v1.954h1.953l5.76-5.761-1.953-1.953-5.76 5.76zm9.223-5.318a.519.519 0 0 0 0-.734l-1.218-1.219a.519.519 0 0 0-.735 0l-.953.953 1.953 1.953.953-.953z"
                                          fill-rule="nonzero" fill="#545f70"></path>
                                    </svg>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="rightacrd_menubox">
                     <div class="rightacrd_menubox_styled">
                        <div class="item-type-menu-styled__MenuHeader-sc-1jgt554-4 iLmpfC">
                           <div class="acrd_rightbox_title">Other responses</div>
                        </div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box purpleiush_bg">
                              T
                           </div>
                           <span>Text answer</span>
                        </div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box greeniush_bg">
                              1,2
                           </div>
                           <span>Number</span>
                        </div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box bleuiush_bg">
                              <svg viewBox="0 0 24 24" width="15" height="15" focusable="false"
                                 data-anchor="checked-checkbox-svg">
                                 <path fill="none" d="M0 0h24v24H0V0z"></path>
                                 <path fill="#5e9cff"
                                    d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-8.29 13.29a.996.996 0 0 1-1.41 0L5.71 12.7a.996.996 0 1 1 1.41-1.41L10 14.17l6.88-6.88a.996.996 0 1 1 1.41 1.41l-7.58 7.59z">
                                 </path>
                              </svg>
                           </div>
                           <span>Checkbox</span>
                        </div>
                        <div class="item-type-menu-styled__MenuDivider-sc-1jgt554-6 lmQjgD"></div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box radiush_bg">
                              <iconify-icon icon="solar:calendar-broken"></iconify-icon>
                           </div>
                           <span>Date &amp; Time</span>
                        </div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box darkgreen_bg">
                              <svg width="15" height="15" viewBox="0 0 16 16" focusable="false" fill="none">
                                 <path
                                    d="M16 11.2V1.6c0-.88-.72-1.6-1.6-1.6H4.8c-.88 0-1.6.72-1.6 1.6v9.6c0 .88.72 1.6 1.6 1.6h9.6c.88 0 1.6-.72 1.6-1.6zM7.52 8.424l1.304 1.744 2.064-2.576a.4.4 0 0 1 .624 0l2.368 2.96a.399.399 0 0 1-.312.648H5.6a.4.4 0 0 1-.32-.64l1.6-2.136a.406.406 0 0 1 .64 0zM0 4v10.4c0 .88.72 1.6 1.6 1.6H12c.44 0 .8-.36.8-.8 0-.44-.36-.8-.8-.8H2.4c-.44 0-.8-.36-.8-.8V4c0-.44-.36-.8-.8-.8-.44 0-.8.36-.8.8z"
                                    fill="#00b6cb"></path>
                              </svg>
                           </div>
                           <span>Media</span>
                        </div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box sliderius_bg">
                              <svg viewBox="0 0 14 14" width="15" height="15" focusable="false">
                                 <g id="icon_slider_v2" fill="none" fill-rule="evenodd">
                                    <g id="Group" transform="translate(1.5 1)" fill="#1ecf93">
                                       <g id="Group-3">
                                          <g id="Group-2">
                                             <path
                                                d="M1.75 2v2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 2h1.25zm4 0h4.75a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H5.75V2z"
                                                id="Combined-Shape"></path>
                                             <rect id="Rectangle-Copy-2" x="2.25" y="0.5" width="3" height="5" rx="0.5">
                                             </rect>
                                          </g>
                                       </g>
                                       <g id="Group-3-Copy" transform="matrix(-1 0 0 1 11 6)">
                                          <g id="Group-2">
                                             <path
                                                d="M1.75 2v2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 2h1.25zm4 0h4.75a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H5.75V2z"
                                                id="Combined-Shape"></path>
                                             <rect id="Rectangle-Copy-2" x="2.25" y="0.5" width="3" height="5" rx="0.5">
                                             </rect>
                                          </g>
                                       </g>
                                    </g>
                                 </g>
                              </svg>
                           </div>
                           <span>Slider</span>
                        </div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box annotationius_bg">
                              <svg viewBox="0 0 14 14" width="15" height="15" focusable="false">
                                 <g id="icon_annotate_2" fill="none" fill-rule="evenodd">
                                    <path
                                       d="M1.524 11.854c.141.239.753 1.21 1.345 1.143.151-.017.324-.165.546-.424.268-.315 1.098-.73 2.353-.827 1.072-.082 1.973-.866 2.537-2.206.156-.37.285-.768.383-1.183l.066-.263 4.13-3.605a.316.316 0 0 0 .028-.465l-2.854-2.933a.298.298 0 0 0-.452.029L6.122 5.376c-.55-.05-1.119.027-1.69.23a5.627 5.627 0 0 0-2.195 1.45c-.662.713-1.077 1.552-1.203 2.426-.114.8.06 1.642.49 2.372zm3.368-5.2c-.002-.518.744-.656 1.172-.611.024.002.276.025.33.046L7.873 7.67c-.01.055-.06.245-.067.276a6.957 6.957 0 0 1-.333 1.073c-.3.74-.854 1.598-1.773 1.712-1.561.192-.8-1.501-.808-4.077z"
                                       id="Shape" fill="#ffb000" fill-rule="nonzero"></path>
                                 </g>
                              </svg>
                           </div>
                           <span>Annotation</span>
                        </div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box signatureius_bg">
                              <svg width="15" height="15" viewBox="0 0 14 14" focusable="false">
                                 <path
                                    d="M9.513 5.581l1.958.695-1.628 4.284c-.153.403-.98 1.663-1.555 1.92l-.14.368a.24.24 0 0 1-.306.138.229.229 0 0 1-.142-.297l.132-.348c-.292-.548-.074-2.14.054-2.476L9.513 5.58zm2.834-4.532c-.538-.19-1.169.203-1.35.679L9.819 4.832l1.958.694 1.178-3.104c.149-.389-.067-1.182-.607-1.373zM8.804 5.421a.478.478 0 0 0 .614-.272l1.245-3.243a.457.457 0 0 0-.282-.593.483.483 0 0 0-.615.272L8.522 4.828a.457.457 0 0 0 .282.593zM7.13 11.286c-.125-.117-.296-.5-.42-.35-.124.15-.035.094-.182.09h-.051c-.093-.251-.28-.41-.562-.471-.372-.078-.67.096-.875.23.018-.103.048-.225.07-.314.072-.284.145-.579.09-.855a.494.494 0 0 0-.452-.395c-.576-.032-1.047.276-1.461.554-.436.292-.715.466-.993.368-.34-.12-.374-1.031-.21-1.843.145-.731.417-2.093 1.113-2.71.234-.209.573-.434.852-.325.328.128.599.664.66 1.302.025.27.261.467.538.443a.491.491 0 0 0 .446-.535c-.098-1.04-.59-1.854-1.282-2.124-.415-.16-1.075-.203-1.875.507-.87.773-1.19 2.084-1.424 3.251-.116.583-.4 2.517.85 2.959.76.269 1.38-.147 1.876-.48.091-.06.181-.12.268-.174-.083.356-.134.737.083 1.058.322.482.779.534 1.356.157l.072-.047c.053.11.148.233.32.316.207.101.415.106.566.11.065.002.153.004.18.015.093.041-.228-.1-.121.001.08.075.165.153.272.234a.496.496 0 0 0 .692-.099.488.488 0 0 0-.1-.687c-.308-.19-.241-.134-.296-.186z"
                                    fill="#00b6cb" fill-rule="nonzero"></path>
                              </svg>
                           </div>
                           <span>Signature</span>
                        </div>
                        <div class="menu_items__acrd">
                           <div class="type_icon__box locationius_bg">
                              <svg width="15" height="15" viewBox="0 0 14 14">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <path
                                       d="M7,2 C5.065,2 3.5,3.60760144 3.5,5.59527478 C3.5,7.73703133 5.71,10.6902928 6.62,11.8151002 C6.82,12.0616333 7.185,12.0616333 7.385,11.8151002 C8.29,10.6902928 10.5,7.73703133 10.5,5.59527478 C10.5,3.60760144 8.935,2 7,2 Z M7,6.87930149 C6.31,6.87930149 5.75,6.30405752 5.75,5.59527478 C5.75,4.88649204 6.31,4.31124807 7,4.31124807 C7.69,4.31124807 8.25,4.88649204 8.25,5.59527478 C8.25,6.30405752 7.69,6.87930149 7,6.87930149 Z"
                                       fill="#fe8500" fill-rule="nonzero"></path>
                                 </g>
                              </svg>
                           </div>
                           <span>Location</span>
                        </div>

                        <div class="breakline_custom_menu"></div>

                        <div class="menu_items__acrd">
                           <div class="type_icon__box instructionius_bg">
                              <svg width="15" height="15" viewBox="0 0 14 14" focusable="false">
                                 <path
                                    d="M12.763 12.316c-.148-.086-1.049-.644-1.53-1.653a5.528 5.528 0 0 0 1.765-4.015c0-3.101-2.704-5.648-6-5.648C3.705 1 1 3.547 1 6.648c0 3.102 2.704 5.648 5.999 5.648.442 0 .917-.041 1.573-.179 1.723.916 3.269.89 3.857.88.262-.003.452.045.55-.226a.357.357 0 0 0-.216-.455zM7.702 9.484a.703.703 0 1 1-1.406 0V6.648a.703.703 0 1 1 1.406 0v2.836zm-.703-4.617a.703.703 0 1 1 0-1.406.703.703 0 0 1 0 1.406z"
                                    fill="#648fff" fill-rule="nonzero"></path>
                              </svg>
                           </div>
                           <span>Instruction</span>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>

<!-- answermodal start -->

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
        <input type="file" id="signatureFile" class="dropify" data-show-remove="false" data-allowed-file-extensions="jpg jpeg png gif" required>
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
        <canvas id="signatureCanvas" width="470" height="200"></canvas>
       
      </div>
      <div class="modal-footer">
      <button id="clearCanvas" class="btn btn-danger ">Clear</button>
        <button id="saveSignature" class="btn btn-primary ">Save Signature</button>
      </div>
    </div>
  </div>
</div>

<!-- Draw Modal -->
<div class="modal fade" id="location_add" tabindex="-1" aria-labelledby="drawModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="drawModalLabel">Select Location</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
         <div class="col-lg-9">
         <div class="check_box">
            <label class="form-label" for="textlabel">Type Location</label>
            <input type="search" class="form-control" id="textlabel" placeholder="">
         </div>
         </div>
         <div class="col-lg-3">
         <div class="location_search_BTNbx">
            <button class="btn btn-primary w-100">Search</button>
         </div>
         </div>
         <div class="col-lg-12">
         <div class="loacte_me">
            <a href="##"><iconify-icon icon="mdi:my-location"></iconify-icon> Locate me</a>
         </div>
         </div>
         <div class="col-lg-12">
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14008.203852601826!2d77.38985960000001!3d28.62823465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1713522560063!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>
        </div>
       
      </div>
      <div class="modal-footer">
      <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
        <button  class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- container -->
<?php include 'footer.php' ?>

<!-- singanute upload and draw js -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Initialize Dropify
    $('.dropify').dropify();

    // Upload Button Click Event
    $('#uploadBtn').click(function(){
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
    }
  });
</script>
<!-- template icon upload js -->
<script>
   document.addEventListener("change", function(event) {
      if (event.target.classList.contains("uploadProfileInput")) {
         var triggerInput = event.target;
         var currentImg = triggerInput.closest(".pic-holder").querySelector(".pic")
            .src;
         var holder = triggerInput.closest(".pic-holder");
         var wrapper = triggerInput.closest(".profile-pic-wrapper");
         var alerts = wrapper.querySelectorAll('[role="alert"]');
         alerts.forEach(function(alert) {
            alert.remove();
         });
         triggerInput.blur();
         var files = triggerInput.files || [];
         if (!files.length || !window.FileReader) {
            return;
         }
         if (/^image/.test(files[0].type)) {
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function() {
               holder.classList.add("uploadInProgress");
               holder.querySelector(".pic").src = this.result;
               var loader = document.createElement("div");
               loader.classList.add("upload-loader");
               loader.innerHTML =
                  '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>';
               holder.appendChild(loader);
               setTimeout(function() {
                  holder.classList.remove("uploadInProgress");
                  loader.remove();
                  var random = Math.random();
                  if (random < 0.9) {
                     wrapper.innerHTML +=
                        '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Template image updated successfully</div>';
                     triggerInput.value = "";
                     setTimeout(function() {
                        wrapper.querySelector('[role="alert"]').remove();
                     }, 3000);
                  } else {
                     holder.querySelector(".pic").src = currentImg;
                     wrapper.innerHTML +=
                        '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>';
                     triggerInput.value = "";
                     setTimeout(function() {
                        wrapper.querySelector('[role="alert"]').remove();
                     }, 3000);
                  }
               }, 1500);
            };
         } else {
            wrapper.innerHTML +=
               '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>';
            setTimeout(function() {
               var invalidAlert = wrapper.querySelector('[role="alert"]');
               if (invalidAlert) {
                  invalidAlert.remove();
               }
            }, 3000);
         }
      }
   });
</script>
<!-- template icon upload js -->

<!-- template tiele editable js start -->
<script>
   $(document).ready(function() {
      var defaultTitle = "Your Title";
      var titleContainer = $('.editable-title');
      var titleElement = $('.title');
      var editIcon = $('.edit-icon');
      // Set the default title
      titleElement.text(defaultTitle);
      editIcon.click(function() {
         // Get the current title text
         var currentTitle = titleElement.text();
         // If the current title is the default title, clear it for editing
         if (currentTitle === defaultTitle) {
            titleElement.text('');
         }
         titleContainer.addClass('editing_title');
         titleElement.addClass('editing_title');
         titleElement.attr('contenteditable', true);
         titleElement.focus();
         editIcon.hide();
      });
      // When the title loses focus, check if it's empty and set it to default if needed
      titleElement.blur(function() {
         var currentTitle = titleElement.text().trim();
         if (currentTitle === '') {
            titleElement.text(defaultTitle);
         }
         titleContainer.removeClass('editing_title');
         titleElement.removeClass('editing_title');
         titleElement.removeAttr('contenteditable');
         editIcon.show();
      });
      // Hide edit icon and remove editing classes when clicking outside the title box
      $(document).on('click', function(event) {
         if (!$(event.target).closest('.editable-title').length) {
            titleContainer.removeClass('editing_title');
            titleElement.removeClass('editing_title');
            titleElement.removeAttr('contenteditable');
            editIcon.show();
         }
      });
   });
</script>
<!-- main template edit title js  end-->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- drag list question answrr fiels start -->
<script>
   $(function() {
      $(".sortable-list").sortable({
         handle: ".handle-dots",
         axis: "y", // Allow only vertical dragging
         containment: "parent", // Constrain to the parent container
         tolerance: "pointer", // Use the pointer for more accurate positioning
      });
      $(".sortable-list").disableSelection(); // Prevent text selection during dragging
      // Initialize Accordion
      $("#accordion").accordion({
         collapsible: true,
         active: 0 // Open the first item by default
      });
   });

   function deleteItem(button) {
      $(button).closest('.sortable-item').remove();
   }

   function addQuestion() {
      var newQuestion = $("<li class='sortable-item'>" +
         "<div class='sortebla_item_edit'>" +
         "<span class='handle-dots ui-sortable-handle'><iconify-icon icon='ph:dots-six-vertical-bold'></iconify-icon></span>" +
         "<input type='text' class='question-input' placeholder='Type question'>" +
         " <div class='col-lg-4'> <div class='answerboxwth_dropdown'> <div type='button' class='answer-button  accordion-button' onclick='toggleAccordion(this)'><div class='responses-menu-item-styled'> <div color='#13855f' mode='light' class='response_chip_menu yesoption_menu'>Yes</div> <div color='#c60022' mode='light' class='response_chip_menu no_optionmenu'>No</div> <div color='#707070' mode='light' class='response_chip_menu na_responsice_menu'>N/A</div> </div></div> </div> </div>" +
         "</div>" +
         "<div class='accordion-content'> <div class='item-settings__Container'> <div class='leftfield_setting_container'> <div class='link__Link_logic'> <span ><iconify-icon icon='simple-line-icons:graph'></iconify-icon> Add logic</span> </div> <div class='required_firlscheck'> <div class='form-check'> <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault'> <label class='form-check-label' for='flexCheckDefault'> Required </label> </div> </div> <div> <div class='field_format'>Format: <span role='button' class=''>Short answer</span></div> </div> </div> <div> <div class='dropdown answeraction_dropdown'> <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'> <iconify-icon icon='entypo:dots-three-vertical'></iconify-icon> </a> <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'> <li><a class='dropdown-item' href='#'><iconify-icon icon='lets-icons:notebook-fill'></iconify-icon> Paste Questions</a></li> </ul> </div> </div> </div> <button class='delete-button' onclick='deleteItem(this)'><iconify-icon icon='fluent:delete-28-regular'></iconify-icon></button> </div>" +
         "</li>");
      $(".sortable-list").append(newQuestion);
      // Refresh Accordion after adding a new item
      $("#accordion").accordion("refresh");
   }

   function toggleAccordion(button, modalTitle) {
      $("#modalTitle").text(modalTitle);
      $('#commonModal').modal('show');
      $('.modal-backdrop').addClass('menumodal_list_backdrop');
      // Toggle the accordion content visibility
      var accordionContent = $(button).closest('.sortable-item').find('.accordion-content');
      // Close all other accordion contents
      $(".accordion-content").not(accordionContent).removeClass("active").slideUp();
      // Toggle the active class and show/hide content
      accordionContent.toggleClass("active").Toggle();
   }
</script>
<!-- end -->


<!-- JavaScript to handle adding more checkboxes -->
<script>
    const checkboxContainer = document.getElementById('checkboxContainer');
    const addMoreButton = document.getElementById('addMoreButton');

    function deleteEditableLabel(editableLabel) {
        editableLabel.remove();
    }

    function createEditableLabel() {
        const newEditableLabel = document.createElement('div');
        newEditableLabel.classList.add('editable-label');
        newEditableLabel.innerHTML = `
            <input type="checkbox">
            <input type="text" value="Editable Label" placeholder="Edit me">
        `;
        checkboxContainer.appendChild(newEditableLabel);

        const deleteButton = document.createElement('button');
        deleteButton.classList.add('delete-buttonCheckbox');
        deleteButton.innerHTML = `<iconify-icon icon="ph:trash"></iconify-icon>`;
        deleteButton.addEventListener('click', function() {
            deleteEditableLabel(newEditableLabel);
        });
        newEditableLabel.appendChild(deleteButton);
    }

    addMoreButton.addEventListener('click', function() {
        createEditableLabel();
    });
</script>

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

<!-- range slider  -->
<script>
   var rangeOne = document.querySelector('input[name="rangeOne"]'),
		rangeTwo = document.querySelector('input[name="rangeTwo"]'),
		outputOne = document.querySelector('.outputOne'),
		outputTwo = document.querySelector('.outputTwo'),
		inclRange = document.querySelector('.incl-range'),
		updateView = function () {
			if (this.getAttribute('name') === 'rangeOne') {
				outputOne.innerHTML = this.value;
				outputOne.style.left = this.value / this.getAttribute('max') * 100 + '%';
			} else {
				outputTwo.style.left = this.value / this.getAttribute('max') * 100 + '%';
				outputTwo.innerHTML = this.value
			}
			if (parseInt(rangeOne.value) > parseInt(rangeTwo.value)) {
				inclRange.style.width = (rangeOne.value - rangeTwo.value) / this.getAttribute('max') * 100 + '%';
				inclRange.style.left = rangeTwo.value / this.getAttribute('max') * 100 + '%';
			} else {
				inclRange.style.width = (rangeTwo.value - rangeOne.value) / this.getAttribute('max') * 100 + '%';
				inclRange.style.left = rangeOne.value / this.getAttribute('max') * 100 + '%';
			}
		};

	document.addEventListener('DOMContentLoaded', function () {
		updateView.call(rangeOne);
		updateView.call(rangeTwo);
		$('input[type="range"]').on('mouseup', function() {
			this.blur();
		}).on('mousedown input', function () {
			updateView.call(this);
		});
	});
</script>
<!-- signature upload and draw -->



