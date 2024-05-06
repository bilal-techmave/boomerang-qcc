<li class='sortable-item'>
   <div class='sortebla_item_edit'>
      <span class='handle-dots ui-sortable-handle'>
         <iconify-icon icon='ph:dots-six-vertical-bold'></iconify-icon>
      </span>
      <input type='text' class='question-input' name='question[${++i}][value]' placeholder='Type question'>
      <div class='col-lg-4'>
         <div class='answerboxwth_dropdown'>
            <div type='button' id='text_${++j}' class='answer-button  accordion-button' onclick='toggleAccordion(this)'>
               <div class='responses-menu-item-styled'>
                  <div color='#13855f' mode='light' class='response_chip_menu yesoption_menu'>Yes</div>
                  <div color='#c60022' mode='light' class='response_chip_menu no_optionmenu'>No</div>
                  <div color='#707070' mode='light' class='response_chip_menu na_responsice_menu'>N/A</div>
               </div>
            </div>
            <input type='hidden' name='question[${i}][question_type]' value="">
         </div>
      </div>
   </div>
   <div class='accordion-content'>
      <div class='item-settings__Container'>
         <div class='leftfield_setting_container'>
            <div class='link__Link_logic'>
               <span >
                  <iconify-icon icon='simple-line-icons:graph'></iconify-icon>
                  Add logic
               </span>
            </div>
            <div class='required_firlscheck'>
               <div class='form-check'> <input class='form-check-input' type='checkbox' name='question[${i}][is_required]' id='flexCheckDefault' value="1"> <label class='form-check-label' for='flexCheckDefault'> Required </label> </div>
            </div>
            <div>
               <div class='field_format'>Format: <span role='button' class=''>Short answer</span></div>
            </div>
         </div>
         <div>
            <div class='dropdown answeraction_dropdown'>
               <a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                  <iconify-icon icon='entypo:dots-three-vertical'></iconify-icon>
               </a>
               <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                  <li>
                     <a class='dropdown-item' href='#'>
                        <iconify-icon icon='lets-icons:notebook-fill'></iconify-icon>
                        Paste Questions
                     </a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <button class='delete-button' onclick='deleteItem(this)'>
         <iconify-icon icon='fluent:delete-28-regular'></iconify-icon>
      </button>
   </div>
</li>