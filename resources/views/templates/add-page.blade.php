<div class="templateformbox">
<input type="hidden" name="page_no[]" value="{{$class_no}}">
    <div class="template_title_edgt">
    <div class="editable-title">
    <div class="templateinput_title_description">
        <input type="text" id="page_title" class="title edit-icon" name="page_title" value="Your Title">
        </div>
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
            <ul class="sortable-list_{{$class_no}}" id="accordion">
                <li class="sortable-item">
                <div class="sortebla_item_edit">
                    <span class="handle-dots">
                        <iconify-icon icon="ph:dots-six-vertical-bold"></iconify-icon>
                    </span>
                    <input type="text" name="question[{{$class_no - 1}}][0][value]" class="question-input"
                        placeholder="Type Question">
                    <div class="col-lg-4">
                        <div class="answerboxwth_dropdown">
                            
                            <div type="button" id="text_{{$class_no}}" class="answer-button accordion-button"
                            onclick="toggleAccordion(this, 'Modal 1');">
                            <div class="iconaccordian_fields purpleiush_bg">T</div> Text
                            Answer
                            </div>
                        <input type="hidden" name="question[{{$class_no - 1}}][0][question_type]" value="text_answer">

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
                                <input class="form-check-input" name="question[{{$class_no - 1}}][0][is_required]" type="checkbox" value="1"
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
                    <button class="delete-button" onclick="deleteItem(this)">
                        <iconify-icon icon="fluent:delete-24-regular"></iconify-icon>
                    </button>

                </div>

                </li>
                
                <!-- Add more questions as needed -->
            </ul>
        </div>
        <div class="addonsbutton_flex_container">
            <button type="button" class="add-question-button" onclick="addQuestion('{{$class_no}}')">
                <iconify-icon icon="icon-park-outline:plus"></iconify-icon>
                Add Question
            </button>

            <div class="addsectionbutton">
                <button type="button">
                <iconify-icon icon="tabler:section"></iconify-icon> Add Section
                </button>
            </div>

            <div class="addnew_page_button">
                <button type="button" class="add-page">
                <iconify-icon icon="iconoir:page-flip"></iconify-icon> Add Page
                </button>
            </div>
            <div class="addnew_page_button">
                <button type="submit">
                <iconify-icon icon="iconoir:page-flip"></iconify-icon> submit
                </button>
            </div>
        </div>

    </div>
    </div>
</div>