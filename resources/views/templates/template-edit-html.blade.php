@foreach($data as $index => $item)
<li class='sortable-item'>
    <div class='sortebla_item_edit'>
        <span class='handle-dots ui-sortable-handle'>
            <iconify-icon icon='ph:dots-six-vertical-bold'></iconify-icon>
        </span>
        @if($item->is_required === '1')
        <span class="mt-2">*</span>
        @endif
        <input type='text' class='question-input' name='question[{{ $index }}][value]' value="{{ $item->filed_name }}" placeholder='Type question'>
        <input type='hidden' class='question-input' name='question[{{ $index }}][fielld_id]' value="{{ $item->id }}" placeholder='Type question'>
        <div class='col-lg-4'>
            <div class='answerboxwth_dropdown'>
                <div type='button' id='text_{{ $loop->iteration }}' class='answer-button accordion-button' onclick='toggleAccordion(this)'>
                    <div class='responses-menu-item-styled'>
                        @switch($item->field_type)
                        @case('text_answer')
                        <div class="menu_items__acrd">
                            <div class="type_icon__box purpleiush_bg">
                                T
                            </div>
                            <span>Text answer</span>
                        </div>
                        @break
                        @case('number')
                        <div class="menu_items__acrd">
                            <div class="type_icon__box greeniush_bg">
                                1,2
                            </div>
                            <span>Number</span>
                        </div>
                        @break
                        @case('checkbox')
                        <div class="menu_items__acrd">
                            <div class="type_icon__box bleuiush_bg">
                                <svg viewBox="0 0 24 24" width="15" height="15" focusable="false" data-anchor="checked-checkbox-svg">
                                    <path fill="none" d="M0 0h24v24H0V0z"></path>
                                    <path fill="#5e9cff" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-8.29 13.29a.996.996 0 0 1-1.41 0L5.71 12.7a.996.996 0 1 1 1.41-1.41L10 14.17l6.88-6.88a.996.996 0 1 1 1.41 1.41l-7.58 7.59z"></path>
                                </svg>
                            </div>
                            <span>Checkbox</span>
                        </div>
                        @break
                        @case('date_time')
                        <div class="item-type-menu-styled__MenuDivider-sc-1jgt554-6 lmQjgD"></div>
                        <div class="menu_items__acrd">
                            <div class="type_icon__box radiush_bg">
                                <iconify-icon icon="solar:calendar-broken"></iconify-icon>
                            </div>
                            <span>Date &amp; Time</span>
                        </div>
                        @break
                        @case('media')
                        <div class="menu_items__acrd">
                            <div class="type_icon__box darkgreen_bg">
                                <svg width="15" height="15" viewBox="0 0 16 16" focusable="false" fill="none">
                                    <path d="M16 11.2V1.6c0-.88-.72-1.6-1.6-1.6H4.8c-.88 0-1.6.72-1.6 1.6v9.6c0 .88.72 1.6 1.6 1.6h9.6c.88 0 1.6-.72 1.6-1.6zM7.52 8.424l1.304 1.744 2.064-2.576a.4.4 0 0 1 .624 0l2.368 2.96a.399.399 0 0 1-.312.648H5.6a.4.4 0 0 1-.32-.64l1.6-2.136a.406.406 0 0 1 .64 0zM0 4v10.4c0 .88.72 1.6 1.6 1.6H12c.44 0 .8-.36.8-.8 0-.44-.36-.8-.8-.8H2.4c-.44 0-.8-.36-.8-.8V4c0-.44-.36-.8-.8-.8-.44 0-.8.36-.8.8z" fill="#00b6cb"></path>
                                </svg>
                            </div>
                            <span>Media</span>
                        </div>
                        @break
                        @case('slider')
                        <div class="menu_items__acrd">
                            <div class="type_icon__box sliderius_bg">
                                <svg viewBox="0 0 14 14" width="15" height="15" focusable="false">
                                    <g id="icon_slider_v2" fill="none" fill-rule="evenodd">
                                        <g id="Group" transform="translate(1.5 1)" fill="#1ecf93">
                                            <g id="Group-3">
                                                <g id="Group-2">
                                                    <path d="M1.75 2v2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 2h1.25zm4 0h4.75a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H5.75V2z" id="Combined-Shape"></path>
                                                    <rect id="Rectangle-Copy-2" x="2.25" y="0.5" width="3" height="5" rx="0.5"></rect>
                                                </g>
                                            </g>
                                            <g id="Group-3-Copy" transform="matrix(-1 0 0 1 11 6)">
                                                <g id="Group-2">
                                                    <path d="M1.75 2v2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 2h1.25zm4 0h4.75a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H5.75V2z" id="Combined-Shape"></path>
                                                    <rect id="Rectangle-Copy-2" x="2.25" y="0.5" width="3" height="5" rx="0.5"></rect>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <span>Slider</span>
                        </div>
                        @break
                        @case('annotation')
                        <div class="menu_items__acrd">
                            <div class="type_icon__box annotationius_bg">
                                <svg viewBox="0 0 14 14" width="15" height="15" focusable="false">
                                    <g id="icon_annotate_2" fill="none" fill-rule="evenodd">
                                        <path d="M1.524 11.854c.141.239.753 1.21 1.345 1.143.151-.017.324-.165.546-.424.268-.315 1.098-.73 2.353-.827 1.072-.082 1.973-.866 2.537-2.206.156-.37.285-.768.383-1.183l.066-.263 4.13-3.605a.316.316 0 0 0 .028-.465l-2.854-2.933a.298.298 0 0 0-.452.029L6.122 5.376c-.55-.05-1.119.027-1.69.23a5.627 5.627 0 0 0-2.195 1.45c-.662.713-1.077 1.552-1.203 2.426-.114.8.06 1.642.49 2.372zm3.368-5.2c-.002-.518.744-.656 1.172-.611.024.002.276.025.33.046L7.873 7.67c-.01.055-.06.245-.067.276a6.957 6.957 0 0 1-.333 1.073c-.3.74-.854 1.598-1.773 1.712-1.561.192-.8-1.501-.808-4.077z" id="Shape" fill="#ffb000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </div>
                            <span>Annotation</span>
                        </div>
                        @break

                        @case('signature')
                        <div class="menu_items__acrd">
                            <div class="type_icon__box signatureius_bg">
                                <svg width="15" height="15" viewBox="0 0 14 14" focusable="false">
                                    <path d="M9.513 5.581l1.958.695-1.628 4.284c-.153.403-.98 1.663-1.555 1.92l-.14.368a.24.24 0 0 1-.306.138.229.229 0 0 1-.142-.297l.132-.348c-.292-.548-.074-2.14.054-2.476L9.513 5.58zm2.834-4.532c-.538-.19-1.169.203-1.35.679L9.819 4.832l1.958.694 1.178-3.104c.149-.389-.067-1.182-.607-1.373zM8.804 5.421a.478.478 0 0 0 .614-.272l1.245-3.243a.457.457 0 0 0-.282-.593.483.483 0 0 0-.615.272L8.522 4.828a.457.457 0 0 0 .282.593zM7.13 11.286c-.125-.117-.296-.5-.42-.35-.124.15-.035.094-.182.09h-.051c-.093-.251-.28-.41-.562-.471-.372-.078-.67.096-.875.23.018-.103.048-.225.07-.314.072-.284.145-.579.09-.855a.494.494 0 0 0-.452-.395c-.576-.032-1.047.276-1.461.554-.436.292-.715.466-.993.368-.34-.12-.374-1.031-.21-1.843.145-.731.417-2.093 1.113-2.71.234-.209.573-.434.852-.325.328.128.599.664.66 1.302.025.27.261.467.538.443a.491.491 0 0 0 .446-.535c-.098-1.04-.59-1.854-1.282-2.124-.415-.16-1.075-.203-1.875.507-.87.773-1.19 2.084-1.424 3.251-.116.583-.4 2.517.85 2.959.76.269 1.38-.147 1.876-.48.091-.06.181-.12.268-.174-.083.356-.134.737.083 1.058.322.482.779.534 1.356.157l.072-.047c.053.11.148.233.32.316.207.101.415.106.566.11.065.002.153.004.18.015.093.041-.228-.1-.121.001.08.075.165.153.272.234a.496.496 0 0 0 .692-.099.488.488 0 0 0-.1-.687c-.308-.19-.241-.134-.296-.186z" fill="#00b6cb" fill-rule="nonzero"></path>
                                </svg>
                            </div>
                            <span>Signature</span>
                        </div>
                        @break

                        @case('location')
                        <div class="menu_items__acrd">
                            <div class="type_icon__box locationius_bg">
                                <svg width="15" height="15" viewBox="0 0 14 14">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path d="M7,2 C5.065,2 3.5,3.60760144 3.5,5.59527478 C3.5,7.73703133 5.71,10.6902928 6.62,11.8151002 C6.82,12.0616333 7.185,12.0616333 7.385,11.8151002 C8.29,10.6902928 10.5,7.73703133 10.5,5.59527478 C10.5,3.60760144 8.935,2 7,2 Z M7,6.87930149 C6.31,6.87930149 5.75,6.30405752 5.75,5.59527478 C5.75,4.88649204 6.31,4.31124807 7,4.31124807 C7.69,4.31124807 8.25,4.88649204 8.25,5.59527478 C8.25,6.30405752 7.69,6.87930149 7,6.87930149 Z" fill="#fe8500" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </div>
                            <span>Location</span>
                        </div>
                        @break
                        @default
                        <div class="menu_items__acrd">
                            <div class="type_icon__box instructionius_bg">
                                <svg width="15" height="15" viewBox="0 0 14 14" focusable="false">
                                    <path d="M12.763 12.316c-.148-.086-1.049-.644-1.53-1.653a5.528 5.528 0 0 0 1.765-4.015c0-3.101-2.704-5.648-6-5.648C3.705 1 1 3.547 1 6.648c0 3.102 2.704 5.648 5.999 5.648.442 0 .917-.041 1.573-.179 1.723.916 3.269.89 3.857.88.262-.003.452.045.55-.226a.357.357 0 0 0-.216-.455zM7.702 9.484a.703.703 0 1 1-1.406 0V6.648a.703.703 0 1 1 1.406 0v2.836zm-.703-4.617a.703.703 0 1 1 0-1.406.703.703 0 0 1 0 1.406z" fill="#648fff" fill-rule="nonzero"></path>
                                </svg>
                            </div>
                            <span>Instruction</span>
                        </div>
                        @endswitch
                    </div>
                </div>
                <input type='hidden' name='question[{{$index}}][question_type]' value="{{$item['field_type']}}">
            </div>
        </div>
    </div>
    <div class='accordion-content'>
        <div class='item-settings__Container'>
            <div class='leftfield_setting_container'>
                <div class='link__Link_logic'>
                    <span>
                        <iconify-icon icon='simple-line-icons:graph'></iconify-icon>
                        Add logic
                    </span>
                </div>
                <div class='required_firlscheck'>
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' name="question[{{$index}}][is_required]" id='flexCheckDefault' value="1" {{ $item['is_required'] == 1 ? 'checked' : '' }}>
                        <label class='form-check-label' for='flexCheckDefault'> Required </label>
                    </div>
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
        <button class="delete-button" onclick="deleteItem(this)">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M10 5h4a2 2 0 1 0-4 0M8.5 5a3.5 3.5 0 1 1 7 0h5.75a.75.75 0 0 1 0 1.5h-1.32l-1.17 12.111A3.75 3.75 0 0 1 15.026 22H8.974a3.75 3.75 0 0 1-3.733-3.389L4.07 6.5H2.75a.75.75 0 0 1 0-1.5zm2 4.75a.75.75 0 0 0-1.5 0v7.5a.75.75 0 0 0 1.5 0zM14.25 9a.75.75 0 0 1 .75.75v7.5a.75.75 0 0 1-1.5 0v-7.5a.75.75 0 0 1 .75-.75m-7.516 9.467a2.25 2.25 0 0 0 2.24 2.033h6.052a2.25 2.25 0 0 0 2.24-2.033L18.424 6.5H5.576z"/></svg>
        </button>
    </div>
</li>
@endforeach