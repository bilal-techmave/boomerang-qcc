</div> <!-- content -->
<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                {{ date('Y') }} &copy; Reserved by <a href="#">TechMave Software</a>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->
</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
</div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->



<!-- Modal -->
<div class="modal fade" id="reply" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reply This Ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <textarea required="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Reply</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="assign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign this ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3 mt-3 mt-sm-0">
                            <label class="form-label">Responsible</label>
                            <select class="form-select js-example-basic-single3">
                                <option value="null">Select the responsible</option>
                                <option value="21">Eduardo Abreu</option>
                                <option value="247">Fraser Muir</option>
                                <option value="191">Italo Sabatini</option>
                                <option value="193">Itamar Braga</option>
                                <option value="34">Juan Mejia</option>
                                <option value="25">Lorena Lopes</option>
                                <option value="14">Luan Ramos</option>
                                <option value="8">Marco Araujo</option>
                                <option value="292">Paula Bier</option>
                                <option value="37">Ricki Palmer</option>
                                <option value="46">Ron Hall</option>
                                <option value="52">Steve Jackson</option>
                                <option value="281">Susan Thornton</option>
                                <option value="285">Thelma Esteve</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3 mt-3 mt-sm-0">
                            <label class="form-label">Department</label>
                            <select class="form-select js-example-basic-single3">
                                <option value="null">Select the department</option>
                                <option value="2">24/7 Rapid Response</option>
                                <option value="9">Compliance</option>
                                <option value="7">ELT</option>
                                <option value="5">Finance</option>
                                <option value="8">HR</option>
                                <option value="3">Help Desk</option>
                                <option value="1">IT</option>
                                <option value="16">Marketing</option>
                                <option value="17">Operations</option>
                                <option value="11">Operations - Gold Coast</option>
                                <option value="15">Operations - NT</option>
                                <option value="4">Operations - QLD</option>
                                <option value="10">Operations - SA</option>
                                <option value="13">Operations - Townsville Region</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Assign</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="maintenance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set this item to Maintenance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Why is this item going to maintenance?
                                <span class="red">*</span></label>
                            <textarea required="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    id="add_contact_btn">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="approve_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approve Hours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Comment </label>
                            <textarea required="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    id="add_contact_btn">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="reject_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Hours</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Comment </label>
                            <textarea required="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    id="add_contact_btn">Save</button>
            </div>
        </div>
    </div>
</div>
{{-- <!-- Modal -->
<div class="modal fade" id="faq_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FAQ Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label" for="exampleInputEmail1">Question <span
                                    class="red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Ans <span class="red">*</span></label>
                            <textarea required="" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                    id="add_contact_btn">Update</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- END wrapper -->
<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <h6 class="fw-medium px-3 m-0 py-2 text-uppercase bg-light">
            <span class="d-block py-1">Theme Settings</span>
        </h6>
        <div class="p-3">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
            </div>
            <h6 class="fw-medium mt-4 mb-2 pb-1">Color Scheme</h6>
            <div class="form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light"
                    id="light-mode-check" />
                <label class="form-check-label" for="light-mode-check">Light Mode</label>
            </div>
            <div class="form-switch mb-1">
                <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark"
                    id="dark-mode-check" />
                <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
            </div>
            <!-- Menu positions -->
            <!-- <h6 class="fw-medium mt-4 mb-2 pb-1">Menus (Leftsidebar and Topbar) Positon</h6>
                    <div class="form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menus-position" value="fixed" id="fixed-check" checked />
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>
                    <div class="form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="menus-position" value="scrollable" id="scrollable-check" />
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div> -->
            <!-- size -->
            <!-- <h6 class="fw-medium mt-4 mb-2 pb-1">Left Sidebar Size</h6>
                    <div class="form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="default" id="default-size-check" checked />
                        <label class="form-check-label" for="default-size-check">Default</label>
                    </div>
                    <div class="form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="leftsidebar-size" value="condensed" id="condensed-check" />
                        <label class="form-check-label" for="condensed-check">Condensed <small>(Extra Small size)</small></label>
                    </div>
                    <button class="btn btn-primary w-100 mt-4" id="resetBtn">Reset to Default</button> -->
        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
<script>
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function eraseCookie(name) {
        document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

    var therecolor = getCookie('theme-color');
    console.log(therecolor);
    if (therecolor) {
        if (therecolor.mode == 'light') {
            document.getElementById("light-mode-check").checked = true;
        } else {
            document.getElementById("dark-mode-check").checked = true;
        }
    }
</script>
<!-- Vendor js -->
<script src="{{ asset('js/vendor.min.js') }}"></script>

<!-- optional plugins -->
<script src="{{ asset('libs/moment/min/moment.min.js') }}"></script>
{{-- <script src="{{ asset('libs/apexcharts/apexcharts.min.js')}}"></script> --}}
<script src="{{ asset('libs/flatpickr/flatpickr.min.js') }}"></script>
<!-- wizard js start-->
<script src="{{ asset('libs/smartwizard/js/jquery.smartWizard.min.js') }}"></script>
<script src="{{ asset('js/pages/form-wizard.init.js') }}"></script>
<!-- wizard js end-->
<!-- Plugins Js -->
<script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('libs/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<!--Color picker-->
<script src="{{ asset('libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
<!-- third party js -->
<script src="{{ asset('libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('libs/sweet-alert/jquery.sweet-alert.js') }}"></script>
<script src="{{ asset('libs/sweet-alert/sweetalert.min.js') }}"></script>
<!-- third party js ends -->
<!-- Datatables init -->
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
<script src="{{ asset('js/pages/datatables.init.js') }}"></script>
<!-- Init js-->
<script src="{{ asset('js/pages/form-advanced.init.js') }}"></script>

<!-- init js -->
<!-- third party:js -->

<!-- third party end -->
<!-- page js -->
<!-- init js -->


<!-- page js -->


{{-- <script src="{{asset('libs/quill/quill.min.js')}}"></script> --}}
<!-- Init js -->
{{-- <script src="{{asset('js/pages/form-editor.init.js')}}"></script> --}}


<!-- Init js -->

<!-- App js -->
<script src="{{ asset('js/app.min.js') }}"></script>
<!-- js fancybox gallery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        // Event delegation for dynamically loaded content
        $('body').on('click', '.lightbox_trigger', function(e) {
            //prevent default action (hyperlink)
            e.preventDefault();
            //Get clicked link href
            var image_href = $(this).attr("href");
            /*
            If the lightbox window HTML already exists in document,
            change the img src to match the href of whatever link was clicked
            If the lightbox window HTML doesn't exist, create it and insert it.
            (This will only happen the first time around)
            */
            if ($('#lightbox').length > 0) { // #lightbox exists
                //place href as img src value
                $('#content').html('<img src="' + image_href + '" />');
                //show lightbox window - you could use .show('fast') for a transition
                $('#lightbox').show();
            } else { //#lightbox does not exist - create and insert (runs 1st time only)
                //create HTML markup for lightbox window
                var lightbox =
                    '<div id="lightbox">' +
                    '<p>Click to close</p>' +
                    '<div id="content">' + //insert clicked link's href into img src
                    '<img src="' + image_href + '" />' +
                    '</div>' +
                    '</div>';
                //insert lightbox HTML into page
                $('body').append(lightbox);
            }
        });

        //Click anywhere on the page to get rid of lightbox window
        $('body').on('click', '#lightbox', function() {
            $('#lightbox').hide();
        });
    });

</script>
<!-- drofify -->
<script src=" https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
<script>
    $(document).ready(function() {
        // alert(dsf);
        $('.main_bx_edit').hide();
        $('#edit_dt__').click(function() {
            $('.main_bx_dt').hide();
            $('.main_bx_edit').show();
        });
        $('#save_dt').click(function() {
            $('.main_bx_dt').show();
            $('.main_bx_edit').hide();
        });

        $('#modal-alert-data').modal('show');
    });
</script>
<script>
    $(document).ready(function() {
        $('.add_contact_box').hide();
        $('#add_contact_btn').click(function() {
            $('.add_contact_box').show();
        });
        $('.delet_btn').click(function() {
            $('.add_contact_box').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.add_comment_table').hide();
        $('#add_comment_btn').click(function() {
            $('.add_comment_table').show();
            $('.not-found').hide();
        });
        $('.delet_btn').click(function() {
            $('.add_comment_table').hide();
            $('.not-found').show();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.add_portfolio_table').hide();
        $('#add_portfolio_btn').click(function() {
            $('.add_portfolio_table').show();
        });
        $('.delet_btn').click(function() {
            $('.add_portfolio_table').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.add_shift_receivable_box').hide();
        $('#add_shift_receivable_btn').click(function() {
            $('.add_shift_receivable_box').show();
        });
        $('.delet_btn').click(function() {
            $('.add_shift_receivable_box').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.add_cleaner_box').hide();
        $('#add_cleaner_btn').click(function() {
            $('.add_cleaner_box').show();
        });
        $('.delet_btn').click(function() {
            $('.add_cleaner_box').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.add_contractor_box').hide();
        $('#add_contractor_btn').click(function() {
            $('.add_contractor_box').show();
        });
        $('.delet_btn').click(function() {
            $('.add_contractor_box').hide();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.advanced_filter').hide();
        $('#advanced_search_btn').click(function() {
            $('.advanced_filter').toggle();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.status_cards').hide();
        $('#work_search').click(function() {
            $('.status_cards').show();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#smartwizard-arrows').smartWizard();
        $('.sw-btn-next').prop('disabled', true);
        $('#storageItem').on('change', function() {
            var selectedStorage = $(this).val();
            if (selectedStorage) {
                $('.sw-btn-next').prop('disabled', false);
            } else {
                $('.sw-btn-next').prop('disabled', true);
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            dropdownParent: $('#create_contact_modal')
        });
        $('.js-example-basic-single2').select2({
            dropdownParent: $('#client_comment_modal')
        });
        $('.js-example-basic-single3').select2({
            dropdownParent: $('#assign')
        });
        $('.js-example-basic-single3').select2({
            dropdownParent: $('#contact-details')
        });
        $('.js-example-basic-single3').select2({
            dropdownParent: $('#financial-info')
        });
        $('.js-example-basic-single3').select2({
            dropdownParent: $('#add-job-sub-type')
        });
        $('.status').select2({
            minimumResultsForSearch: -1
        });
    });
</script>
<script>
    $(function() {
        // add multiple select / deselect functionality
        $("#selectall").click(function() {
            $('.name').attr('checked', this.checked);
        });
        // if all checkbox are selected, then check the select all checkbox
        // and viceversa
        $(".name").click(function() {
            if ($(".name").length == $(".name:checked").length) {
                $("#selectall").attr("checked", "checked");
            } else {
                $("#selectall").removeAttr("checked");
            }
        });
    });
</script>
<!-- payment modal  -->
<script>
    $(document).ready(function() {
        $('.direct-payment').hide();
        $('.bpay').hide();
        $('.cheque-payable').hide();
    });
</script>
<script>
    $(document).ready(function() {
        $('.payment_type').on('change', function() {
            if ($(this).val() == 'ELECTRONIC_PAYMENT') {
                $('.direct-payment').show();
                $('.bpay').hide();
                $('.cheque-payable').hide();
            } else if ($(this).val() == 'CHEQUE') {
                $('.direct-payment').hide();
                $('.bpay').hide();
                $('.cheque-payable').show();
            } else if ($(this).val() == 'BPAY') {
                $('.direct-payment').hide();
                $('.bpay').show();
                $('.cheque-payable').hide();
            } else if ($(this).val() == 'N_A') {
                $('.direct-payment').hide();
                $('.bpay').hide();
                $('.cheque-payable').hide();
            }
        })
    })
</script>
<script>
    $('.monetization_').on('click', function() {
        // $( "#add_class" ).trigger( "click" );
        $('.nav-item a[href="#monetization"]').trigger('click');
    })
</script>


<script>
    function addToTableAndRemoveFromSelect(selectId) {
        var selectedOption = $('#' + selectId).val();
        $('#' + selectId).find('option:selected').remove();
    }

    // Function to remove table row and add option back to select
    function removeFromTableAndAddToSelect(trClassName, selectId) {
        var deletedText = $('.' + trClassName + ' td#optionData').text();
        var deletedValue = $('.' + trClassName + ' td#optionData').data('value');
        $('#' + selectId).append('<option value="' + deletedValue + '">' + deletedText +
        '</option>'); // Add option back to select
    }



    function validateFormByDiv(divId) {
        let noisValid = true;

        $(`.select2-selection`).removeClass('invalid-select');
        $(`.custom_error`).remove();
        $(`input`).removeClass('is-invalid');
        $(`#${divId} .required_fields`).each(function() {

            if ($(this).is(':file') && !$(this)[0].files.length) {
                noisValid = false;
                $(this).closest('.dropify-wrapper').addClass('invalid-select');
                $(this).closest('.dropify-wrapper').after(
                    '<span class="custom_error text-danger">This field is required.</span>');
                $(this).focus();
            } else if (!$(this).val() || ($(this).is('select') && ($(this).val() == "" || $(this).val() ==
                0))) {
                noisValid = false;
                $(this).addClass('is-invalid');
                if ($(this).is('select')) {
                    $(this).next('.select2-container').find('.select2-selection').addClass('invalid-select');
                    $(this).next('.select2-container').find('.select2-selection').after(
                        '<span class="custom_error text-danger">This field is required.</span>');
                } else {
                    $(this).after('<span class="custom_error text-danger">This field is required.</span>');
                }
                $(this).focus();
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        $(`#${divId} input.number`).each(function() {
            let closestTabPaneId = $(this).closest('.tab-pane').attr('id');
            let inputValue = $(this).val().trim();

            if (inputValue !== '' && !$.isNumeric(inputValue)) {
                noisValid = false;
                $(this).addClass('is-invalid');
                $(this).after('<span class="custom_error text-danger">Please enter a valid number.</span>');
                $(`#${closestTabPaneId}Tab`).tab('show');
                $(this).focus();
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        // Validation for float inputs
        $(`#${divId} input.float`).each(function() {
            let closestTabPaneId = $(this).closest('.tab-pane').attr('id');
            let inputValue = $(this).val().trim();

            if (inputValue !== '' && isNaN(parseFloat(inputValue))) {
                noisValid = false;
                $(this).addClass('is-invalid');
                $(this).after(
                    '<span class="custom_error text-danger">Please enter a valid floating point number.</span>'
                    );
                $(`#${closestTabPaneId}Tab`).tab('show');
                $(this).focus();
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        // Additional validation for email
        let emailInput = $(`#${divId} [type="email"]`);
        let emailValue = emailInput.val();
        if (emailValue && !isValidEmail(emailValue)) {
            noisValid = false;
            emailInput.addClass('is-invalid');
            emailInput.after('<span class="custom_error text-danger">Invalid email format.</span>');
            emailInput.focus();
        }

        $(`.phoneValid`).each(function() {
            let phoneInput = $(this);
            let phoneValue = $(this).val().trim();
            if (phoneValue && !isValidPhoneNumber(phoneValue)) {
                isValid = false;
                phoneInput.addClass('is-invalid');
                phoneInput.focus();
                phoneInput.after('<span class="custom_error text-danger">Invalid phone number format.</span>');
            }
        })

        // Additional validation for password and password confirmation matching
        let passwordInput = $(`#${divId} [name="password"]`);
        let confirmPasswordInput = $(`#${divId} [name="password_confirmation"]`);
        let passwordValue = passwordInput.val();
        let confirmPasswordValue = confirmPasswordInput.val();
        if (passwordValue !== confirmPasswordValue) {
            noisValid = false;
            passwordInput.addClass('is-invalid');
            confirmPasswordInput.addClass('is-invalid');
            let closestTabPaneId = passwordInput.closest('.tab-pane').attr('id');
            passwordInput.after('<span class="custom_error text-danger">Passwords do not match.</span>');
            $(`#${closestTabPaneId}Tab`).tab('show');
            passwordInput.focus();
        }

        $(`#${divId} [minlength], #${divId} [maxlength], #${divId} [min], #${divId} [max]`).each(function() {
            let minLength = parseInt($(this).attr('minlength'));
            let maxLength = parseInt($(this).attr('maxlength'));
            let minValue = parseInt($(this).attr('min'));
            let maxValue = parseInt($(this).attr('max'));
            let inputValue = $(this).val().trim(); // Trim whitespace from input value

            if (inputValue !== '') { // Check if input value is not blank
                if (minLength && inputValue.length < minLength) {
                    noisValid = false;
                    $(this).addClass('is-invalid');
                    let closestTabPaneId = $(this).closest('.tab-pane').attr('id');
                    $(this).after(
                        `<span class="custom_error text-danger">Minimum length is ${minLength} characters.</span>`
                        );
                    $(`#${closestTabPaneId}Tab`).tab('show');
                    $(this).focus();
                }

                if (maxLength && inputValue.length > maxLength) {
                    noisValid = false;
                    $(this).addClass('is-invalid');
                    let closestTabPaneId = $(this).closest('.tab-pane').attr('id');
                    $(this).after(
                        `<span class="custom_error text-danger">Maximum length is ${maxLength} characters.</span>`
                        );
                    $(`#${closestTabPaneId}Tab`).tab('show');
                    $(this).focus();
                }

                if (!isNaN(minValue) && parseInt(inputValue) < minValue) {
                    noisValid = false;
                    $(this).addClass('is-invalid');
                    let closestTabPaneId = $(this).closest('.tab-pane').attr('id');
                    $(this).after(
                    `<span class="custom_error text-danger">Minimum value is ${minValue}.</span>`);
                    $(`#${closestTabPaneId}Tab`).tab('show');
                    $(this).focus();
                }

                if (!isNaN(maxValue) && parseInt(inputValue) > maxValue) {
                    noisValid = false;
                    $(this).addClass('is-invalid');
                    let closestTabPaneId = $(this).closest('.tab-pane').attr('id');
                    $(this).after(
                    `<span class="custom_error text-danger">Maximum value is ${maxValue}.</span>`);
                    $(`#${closestTabPaneId}Tab`).tab('show');
                    $(this).focus();
                }
            }
        });

        return noisValid;
    }

    function isValidEmail(email) {
        // Regular expression for validating email format
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailPattern.test(email);
    }

    function isValidPhoneNumber(phone) {
        var regex = /^[0-9()\-\s+]+$/; // Allow digits, parentheses, hyphens, and spaces
        return regex.test(phone);
    }

    function buttonLoading(that){
        $('.main_loader').show();
        $(that).attr('disabled', true);
        var originalButtonText = $(that).html();
        var originalButtonTextLoader = $('.loader_span').html();
        var dots = 0;
        var intervalId = setInterval(function() {
            dots = (dots + 1) % 5;
            $(that).html(originalButtonText + '.'.repeat(dots));
            $('.loader_span').html(originalButtonTextLoader + '.'.repeat(dots));
        }, 300);
        setTimeout(() => {
            $(that).html(originalButtonText);
            $('.loader_span').html(originalButtonTextLoader);
            clearInterval(intervalId);
            $(that).attr('disabled', false);
            $('.main_loader').hide();
        }, 3000);
    }
</script>
<script>
    var data = [];

    function additem(id) {
        var action = $('#action').val();
        var existingIndex = data.findIndex(item => item.id === id);

        var isManualTransfer = action === 'MANUAL_TRANSFER' || action === 'FINISHED';

        isManualTransfer ? $('#qtyMov').show() : '';
    
        if (existingIndex !== -1) {
            data.splice(existingIndex, 1);
            $('#appendItem tr[data-id="' + id + '"]').remove();
            swal({ type: 'success', title: 'Removed!', text: 'Item Removed Successfully', timer: 1000 });
        } else {
            var barcode = $('#barcode_' + id).text();
            var name = $('#name_' + id).text();
            var manufacturer = $('#manufacturer_' + id).text();
            var type = $('#type_' + id).text();
            var storeItemId = $('#store-items-id_' + id).text();
            var qty = isManualTransfer ? $('#newQuantity_' + id).text() : $('#newQuantity_' + id).val();
            var qtyMov = isManualTransfer ? $('#qtyMov_' + id).val() : '';
            var storageId = $('#storageId').val();
        
            data.push({ id: id, barcode: barcode, name: name, manufacturer: manufacturer, type: type, qty: qty, qtyMov: qtyMov, storageId: storageId });
        
            swal({ type: 'success', title: 'Added!', text: 'Item Added Successfully', timer: 1000 });
        
            var rowHtml = `<tr data-id="${id}">
                    <td class="items-id">${id}</td>
                    <td>${barcode}</td>
                    <td>${name}</td>
                    <td>${manufacturer}</td>
                    <td>${type}</td>
                    <td>${qty}</td>
                    ${isManualTransfer ? `<td>${qtyMov}</td>` : ''}
                    <td><button type="button" onclick="removeItems(this,${id})" class="btn btn-danger waves-effect waves-light table-btn-custom" id="remove_pr" fdprocessedid="nvsyxq"><i class="uil-minus"></i></button></td>
                    ${isManualTransfer ? `<td style="display:none;">${storeItemId}</td>` : ''}
                </tr>`;
            $("#appendItem").append(rowHtml);
            $('.items-id').hide();
        }
    }
</script>

<script>
    function removeItems(that,id)
    {
        swal({
                type:'success',
                title: 'Removed!',
                text: 'Remvoe Item Successfully',
                timer: 1000
            });
        $(that).parent().parent().remove();
    }
</script>


{{-- Submit form --}}
<script>
    function submitForm() {
        var tableData = [];

        var action = $('#action').val();

        var formAction = action == 'MANUAL_TRANSFER' ? "{{ route('storage.updateMovement') }}" : action == 'FINISHED' ? "{{ route('storage.updateMovementFinished') }}" : "{{ route('storage.addmovement') }}" ;

        $('#appendItem tr').each(function() {
            var rowData = {};

            $(this).find('td').each(function(index) {
                switch (index) {
                    case 0:
                        rowData.item_id = $(this).text();
                        break;
                    case 1:
                        rowData.barcode = $(this).text();
                        break;
                    case 2:
                        rowData.name = $(this).text();
                        break;
                    case 3:
                        rowData.manufacturer = $(this).text();
                        break;
                    case 4:
                        rowData.type = $(this).text();
                        break;
                    case 5:
                        rowData.qty = $(this).text();
                        break;
                    case 6:
                        if (action == 'MANUAL_TRANSFER' || action == 'FINISHED') {

                            rowData.qtyMov = $(this).text();
                        }
                        break;
                    case 8:
                        if (action == 'MANUAL_TRANSFER' || action == 'FINISHED') {

                            rowData.storage_item_id = $(this).text();
                        }
                        break;
                }
            });

            tableData.push(rowData);
        });

        if (tableData.length > 0) {
            $("#tableDataInput").attr("value", JSON.stringify(tableData));
            $('#myForm').attr('action', formAction).submit();
        } else {
            swal({
                type:'error',
                title: 'Empty!',
                text: 'Items are not selected in this storage.',
                timer: 2000
            
            });
        }
    }
</script>

<script>
    $(function() {
        $('#storageItem').change(function(){
                let storageId=$(this).val();
                        $('#storageId').val(storageId);
                    });
                });
 </script>

<script>
    $(document).ready(function() {
        $('#storageItem').change(function() {
            var storageItem = $(this).val();
            var action = $('#action').val();
                

            if (storageItem && (action == 'MANUAL_TRANSFER' || action == 'FINISHED')) {

                $.ajax({
                    url: "{{ route('storage.getStorageItems') }}",
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                    method: 'GET', 
                    data: { storage_id: storageItem }, 
                    success: function(response) {
                        if (response.data.length > 0) {
                            $('#basic-datatable').empty().append(response.data);
                            $('.item-id').hide();
                            $('.store-items-id').hide();
                        } else {
                            swal({
                                type:'error',
                                title: 'Not Found!',
                                text: 'Items are not available in this storage.',
                                timer: 2000

                            });
                            $('.sw-btn-next').prop('disabled', true);

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        swal({
                            type: 'error',
                            title: 'Error!',
                            text: 'Something went wrong.',
                            timer: 2000
                        });
                    }
                });
            }
        });

        $('#action').change(function() {
            var action = $(this).val();
            var storageItem = $('#storageItem').val();

            if(storageItem && (action == 'MANUAL_TRANSFER' || action == 'FINISHED'))

            {
                $.ajax({
                    url: "{{ route('storage.getStorageItems') }}",
                    headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
                    method: 'GET', 
                    data: { storage_id: storageItem }, 
                    success: function(response) {
                        if (response.data.length > 0) {
                            $('#basic-datatable').empty().append(response.data);
                            $('.item-id').hide();
                            $('.store-items-id').hide();
                        } else {
                            swal({
                                type:'error',
                                title: 'Not Found!',
                                text: 'Items are not available in this storage.',
                                timer: 2000

                            });
                            $('.sw-btn-next').prop('disabled', true);

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        swal({
                            type: 'error',
                            title: 'Error!',
                            text: 'Something went wrong.',
                            timer: 2000
                        });
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#manual-transfer').hide();

        $('#save-button').hide()

        $('#action').change(function() {
            var action = $('#action').val();
            if(action == 'MANUAL_TRANSFER') 
            {
                $('#manual-transfer').show();
                $('#purchase').hide();

            }else if(action == 'PURCHASE'){
                $('#purchase').show();
                $('#manual-transfer').hide();
            }else if(action == 'FINISHED'){
                $('.sw-arrows-step-4').remove();
                $('#save-button').show();

            }
        });
    });


    function checkTrDuplicate(tabletr,rowHtml){
        var isNewRowUnique = true;
        $(`#${tabletr} tr`).each(function() {
            var $this = $(this);
            var existingRowText = $this.find('td').map(function() {
                return $(this).text();
            }).get().join('');
            var newRowText = $(rowHtml).find('td').map(function() {
                return $(this).text();
            }).get().join('');
            if (existingRowText === newRowText) {
                isNewRowUnique = false;
                return false; // Break the loop
            }
        });
        if (!isNewRowUnique) {
            swal("Already Exists !", "This contact already exists in the table.", "error");
            return false;
        }
        return true;
    }
</script>

</body>

</html>