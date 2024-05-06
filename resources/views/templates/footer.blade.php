</div> <!-- content -->

<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>document.write(new Date().getFullYear())</script> &copy; Reserved by <a href="#">TechMave Software</a> 
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
<div class="modal fade" id="create_contact_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create new Person as Contact</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Name <span class="red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Surname <span class="red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Email <span class="red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Phone Number <span class="red">*</span></label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3 mt-3 mt-sm-0">
                    <label class="form-label">Contact Type</label>
                    <select  class="form-select js-example-basic-single">
                    <option value="MANAGER">Manager</option>
                    <option value="ACCOUNTS">Accounts</option>
                    <option value="SUPERVISOR">Supervisor</option>
                    <option value="SITE_MANAGER">Site Manager</option>
                    </select>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- comment add popup -->

<div class="modal fade" id="client_comment_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new comment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
           
            <div class="col-lg-12">
                <div class="mb-3 mt-3 mt-sm-0">
                    <label class="form-label">Comment Type</label>
                    <select  class="form-select js-example-basic-single2">
                    <option value="MEETING">Meeting</option>
                    <option value="SITE_CLOSED">Site Closed</option>
                    <option value="PRICE_NEGOTIATION">Price Negotiation</option>
                    <option value="GENERAL_COMMUNICATION">General Communication</option>
                    <option value="CONTRACTS">Contracts</option>
                    <option value="EMAIL">Email</option>
                    <option value="PHONE_CALL">Phone Call</option>
                    <option value="SCOPE_CHANGE">Change of Scope</option>
                    <option value="COMPLIMENT">Compliment</option>
                    <option value="CLIENT_COURTESY_CALL">Clients Courtesy Call</option>
                    <option value="INSPECTION">Inspection</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
              <div class="mb-3">
                    <label class="form-label">Comment <span class="red">*</span></label>
                    <textarea required class="form-control"></textarea>
                </div>
            </div>
            <div class="col-lg-12">
            <div class="mb-3">
            <label class="form-label">Upload File</label>
            <input name="file1" type="file" class="dropify" data-height="100" />
            </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="add_comment_btn">Save</button>
      </div>
    </div>
  </div>
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
                    <select  class="form-select js-example-basic-single3">
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
                    <select  class="form-select js-example-basic-single3">
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
<div class="modal fade" id="contact-details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Existing Person Into Contacts</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
                <div class="mb-3 mt-3 mt-sm-0">
                    <label class="form-label">Contact</label>
                    <select  class="form-select js-example-basic-single3">
                    <option value="N_A">Please select one or start typing</option>
                    <option value="57">Owen Wills</option>
                    <option value="58">Mary Bernice Mary Keogh</option>
                    <option value="59">Michelle Hayes</option>
                    <option value="60">Jocelyn Marianne Vroni Bauske</option>
                    <option value="61">Shelly Halley</option>
                    <option value="62">Jenna Weber</option>
                    <option value="64">Luke Ftizpatrick</option>
                    <option value="65">Jaggi Singh</option>
                    <option value="66">Kylie Fairclough</option>
                    <option value="67">Ben Reti</option>
                    <option value="68">Rob Cotton</option>
                    <option value="69">Andrew Stevens</option>
                    <option value="70">James Hawley</option>
                    <option value="71">Chris Smith</option>
                    <option value="72">Marius bic</option>
                    <option value="73">Anderson Ferreira</option>
                    </select>
                </div>
            </div>
        <div class="col-lg-12">
                <div class="mb-3 mt-3 mt-sm-0">
                    <label class="form-label">Contact Type</label>
                    <select  class="form-select js-example-basic-single3">
                    <option value="MANAGER">Manager</option>
                    <option value="ACCOUNTS">Accounts</option>
                    <option value="SUPERVISOR">Supervisor</option>
                    <option value="SITE_MANAGER">Site Manager</option>
                    </select>
                </div>
            </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="financial-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Financial Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
     
        <div class="col-lg-12">
                <div class="mb-3 mt-3 mt-sm-0">
                    <label class="form-label">Payment Type</label>
                    <select  class="form-select payment_type js-example-basic-single3">
                        <option value="N_A">Please select one</option>
                        <option value="ELECTRONIC_PAYMENT">Direct Payment / Electronic</option>
                        <option value="CHEQUE">Cheque, Payable for</option>
                        <option value="BPAY">BPAY</option>
                    </select>
                </div>
            </div>
                <div class="col-lg-12 direct-payment">
                    <div class="row">
                      <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Account Name <span class="red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Branch/Route <span class="red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Account Number <span class="red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 bpay">
                    <div class="row">
                      <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Biller Code <span class="red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Reference (CNR) <span class="red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 cheque-payable">
                    <div class="row">
                      <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Cheque Name <span class="red">*</span></label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                     
                    </div>
                </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">Save</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="add-job-type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Job Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Job Type</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="">
            </div>
        </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">+ Add</button>
      </div>
    </div>
  </div>
</div>


        <!-- END wrapper -->
   <!-- Modal -->
<div class="modal fade" id="add-job-sub-type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Job Sub Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Job Type</label>
                <select  class="form-select js-example-basic-single3">
                    <option value="MANAGER">Manager</option>
                    <option value="ACCOUNTS">Accounts</option>
                    <option value="SUPERVISOR">Supervisor</option>
                    <option value="SITE_MANAGER">Site Manager</option>
                    </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Job Sub Type</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="">
            </div>
        </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">+ Add</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit-job-type" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Job Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Job Type</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="AdHoc">
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Job Sub Type</label>
                <input type="text" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Builders Clean">
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">Update</button>
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
                <label class="form-label" for="exampleInputEmail1">Why is this item going to maintenance? <span class="red">*</span></label>
                <textarea required="" class="form-control"></textarea>
            </div>
        </div>
   
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">Save</button>
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
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">Save</button>
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
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
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
                                <label class="form-label" for="exampleInputEmail1">Question <span class="red">*</span></label>
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
        <button type="button" class="btn btn-primary"  data-bs-dismiss="modal" id="add_contact_btn">Update</button>
      </div>
    </div>
  </div>
</div>
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
                        <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="light" id="light-mode-check" checked />
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-switch mb-1">
                        <input type="checkbox" class="form-check-input" name="color-scheme-mode" value="dark" id="dark-mode-check" />
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

        <!-- Vendor js -->
        <script src="../assets-tmp/js/vendor.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <!-- optional plugins -->
        <script src="../assets-tmp/libs/moment/min/moment.min.js"></script>
        <script src="../assets-tmp/libs/apexcharts/apexcharts.min.js"></script>
        <script src="../assets-tmp/libs/flatpickr/flatpickr.min.js"></script>
        <!-- wizard js start-->
        <script src="../assets-tmp/libs/smartwizard/js/jquery.smartWizard.min.js"></script>
        <script src="../assets-tmp/js/pages/form-wizard.init.js"></script>
         <!-- wizard js end-->
       <!-- Plugins Js -->
       <!-- <script src="../assets-tmp/libs/select2/js/select2.min.js"></script> -->
        <script src="../assets-tmp/libs/multiselect/js/jquery.multi-select.js"></script>
        <script src="../assets-tmp/libs/flatpickr/flatpickr.min.js"></script>
        <script src="../assets-tmp/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
      <!--Color picker-->
        <script src="../assets-tmp/libs/spectrum-colorpicker2/spectrum.min.js"></script>
            <!-- third party js -->
            <script src="../assets-tmp/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="../assets-tmp/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="../assets-tmp/js/iconify-icon.min.js"></script>

        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="../assets-tmp/js/pages/datatables.init.js"></script>
        <!-- Init js-->
        <script src="../assets-tmp/js/pages/form-advanced.init.js"></script>

        
        <!-- third party:js -->
        <script src="../assets-tmp/libs/apexcharts/apexcharts.min.js"></script>
        <!-- third party end -->

        <!-- init js -->
        <script src="../assets-tmp/js/pages/apexcharts.init.js"></script>
        
        <!-- page js -->
        <script src="../assets-tmp/js/pages/dashboard.init.js"></script>
       
              <script src="../assets-tmp/libs/quill/quill.min.js"></script>
           <!-- Init js -->
           <script src="../assets-tmp/js/pages/form-editor.init.js"></script>
        <!-- App js -->
        <script src="../assets-tmp/js/app.min.js"></script>
    <!-- js fancybox gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
 jQuery(document).ready(function($) {
	
	$('.lightbox_trigger').click(function(e) {
		
		//prevent default action (hyperlink)
		e.preventDefault();
		
		//Get clicked link href
		var image_href = $(this).attr("href");
		
		/* 	
		If the lightbox window HTML already exists in document, 
		change the img src to to match the href of whatever link was clicked
		
		If the lightbox window HTML doesn't exists, create it and insert it.
		(This will only happen the first time around)
		*/
		
		if ($('#lightbox').length > 0) { // #lightbox exists
			
			//place href as img src value
			$('#content').html('<img src="' + image_href + '" />');
		   	
			//show lightbox window - you could use .show('fast') for a transition
			$('#lightbox').show();
		}
		
		else { //#lightbox does not exist - create and insert (runs 1st time only)
			
			//create HTML markup for lightbox window
			var lightbox = 
			'<div id="lightbox">' +
				'<p>Click to close</p>' +
				'<div id="content">' + //insert clicked link's href into img src
					'<img src="' + image_href +'" />' +
				'</div>' +	
			'</div>';
				
			//insert lightbox HTML into page
			$('body').append(lightbox);
		}
		
	});
	
	//Click anywhere on the page to get rid of lightbox window
	$('body').on('click', '#lightbox', function() { //must use on, as the lightbox element is inserted into the DOM
		$('#lightbox').hide();
	});

});
    </script>

    

            <!-- drofify -->
            <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
        <script>
            $('.dropify').dropify();
        </script>
        <script>
            $(document).ready(function(){
                // alert(dsf);
                $('.main_bx_edit').hide();

                $('#edit_dt__').click(function(){
                    $('.main_bx_dt').hide();
                    $('.main_bx_edit').show();
                });

                $('#save_dt').click(function(){
                    $('.main_bx_dt').show();
                    $('.main_bx_edit').hide();
                });

            });
        </script>
        <script>
                $(document).ready(function(){
             
                $('.add_address_box').hide();

                $('#add_address_btn').click(function(){
                   $('.add_address_box').show();
                });
                $('.delet_btn').click(function(){
                    $('.add_address_box').hide();
                });
                
            });
        </script>
        <script>
                  $(document).ready(function(){
             
             $('.add_contact_box').hide();

             $('#add_contact_btn').click(function(){
                $('.add_contact_box').show();
             });
             $('.delet_btn').click(function(){
                 $('.add_contact_box').hide();
             });
             
         });
            
        </script>
        <script>
                   $(document).ready(function(){
             
             $('.add_comment_table').hide();

             $('#add_comment_btn').click(function(){
                $('.add_comment_table').show();
                $('.not-found').hide();
                
             });
             $('.delet_btn').click(function(){
                 $('.add_comment_table').hide();
                 $('.not-found').show();
             });
             
         });
            
        </script>
        <script>
            $(document).ready(function(){
             
             $('.add_portfolio_table').hide();

             $('#add_portfolio_btn').click(function(){
                $('.add_portfolio_table').show();
             });
             $('.delet_btn').click(function(){
                 $('.add_portfolio_table').hide();
             });
             
         });
            
        </script>
         <script>
            $(document).ready(function(){
             
             $('.add_shift_receivable_box').hide();

             $('#add_shift_receivable_btn').click(function(){
                $('.add_shift_receivable_box').show();
             });
             $('.delet_btn').click(function(){
                 $('.add_shift_receivable_box').hide();
             });
             
         });
            
        </script>
           <script>
            $(document).ready(function(){
             
             $('.add_department_table').hide();

             $('#add_department_btn').click(function(){
                $('.add_department_table').show();
             });
             $('.delet_btn').click(function(){
                 $('.add_department_table').hide();
             });
             
         });
            
        </script>
          <script>
            $(document).ready(function(){
             
             $('.add_document_table').hide();

             $('#add_document_btn').click(function(){
                $('.add_document_table').show();
             });
             $('.delet_btn').click(function(){
                 $('.add_document_table').hide();
             });
             
         });
            
        </script>
            <script>
            $(document).ready(function(){
             
             $('.add_cleaner_box').hide();

             $('#add_cleaner_btn').click(function(){
                $('.add_cleaner_box').show();
             });
             $('.delet_btn').click(function(){
                 $('.add_cleaner_box').hide();
             });
             
         });
            
        </script>
           <script>
            $(document).ready(function(){
             
             $('.add_contractor_box').hide();

             $('#add_contractor_btn').click(function(){
                $('.add_contractor_box').show();
             });
             $('.delet_btn').click(function(){
                 $('.add_contractor_box').hide();
             });
             
         });
            
        </script>
       
        <script>
            $(document).ready(function(){
             
             $('.advanced_filter').hide();

             $('#advanced_search_btn').click(function(){
                $('.advanced_filter').toggle();
             });
            
             
         });
            
        </script>
        <script>
            $(document).ready(function(){
             
             $('.status_cards').hide();

             $('#work_search').click(function(){
                $('.status_cards').show();
             });
            
             
         });
            
        </script>
               <script>
            $(document).ready(function(){
             
             $('#remove_pr').hide();

             $('#add_pr').click(function(){
                $('#remove_pr').show();
                $('#add_pr').hide();
             });
             $('#remove_pr').click(function(){
                $('#add_pr').show();
                $('#remove_pr').hide();
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
    
    $('.status').select2({minimumResultsForSearch: -1});
});
        </script>
        <script>
            $(function () {
        // add multiple select / deselect functionality
        $("#selectall").click(function () {
            $('.name').attr('checked', this.checked);
        });
 
        // if all checkbox are selected, then check the select all checkbox
        // and viceversa
        $(".name").click(function () {
 
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
    $(document).ready(function(){

        $('.direct-payment').hide();
        $('.bpay').hide();
        $('.cheque-payable').hide();
                
    });
</script>
<script>
     $(document).ready(function(){
        $('.payment_type').on('change', function(){
            if($(this).val()=='ELECTRONIC_PAYMENT'){
                $('.direct-payment').show();
                $('.bpay').hide();
                $('.cheque-payable').hide();
            }else if($(this).val()=='CHEQUE')
            {
                $('.direct-payment').hide();
                $('.bpay').hide();
                $('.cheque-payable').show();
            }else if($(this).val()=='BPAY')
            {
                $('.direct-payment').hide();
                $('.bpay').show();
                $('.cheque-payable').hide();
            }else if($(this).val()=='N_A')
            {
                $('.direct-payment').hide();
                $('.bpay').hide();
                $('.cheque-payable').hide();
            }
                            
        })
        })
</script>
<script>
  $('.monetization_').on('click',function(){
    // $( "#add_class" ).trigger( "click" );
    $('.nav-item a[href="#monetization"]').trigger('click');
  })
</script>
    </body>
    
</html>