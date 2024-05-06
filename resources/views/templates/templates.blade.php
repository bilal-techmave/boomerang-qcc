@extends('layouts.main')
@section('main-content')
<!-- Links -->
<link rel="stylesheet" href="assets-tmp/css/templates.css">
<!-- /Links -->
<!-- Start Content-->
<div class="container-fluid">
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box">
            <h4 class="page-title">Templates</h4>
            <div class="page-title-right">
               <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item">Dashboard</li>
                  <li class="breadcrumb-item active">templates</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <!-- end page title -->
   <div class="row">
      <div class="col-lg-12">
         <div class="quick-start__OuterContainer-sc-15prms7-2 cuzkSm templatecreate_container_box">
            <div class="quick_start_mainb">
               <div class="quick_start__Header">
                  <div class="quick_start_title">Create your template from one of the options below.</div>
                  <!-- <div class="cross_btnstart"><i class="fa-solid fa-xmark"></i></div> -->
               </div>
               <div class="template_creationcard">
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="card_createtemp">
                           <a href="blank-template.php">
                           <a class="temmain_card" href="{{route('template.create')}}">
                              <i class="fa-solid fa-plus"></i>
                              <div class="title_tem_card">Start from scratch</div>
                              <div class="subtitle_temcard">Get started with a blank template.</div>
                           </a>
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="card_createtemp">
                           <a href="##" data-bs-toggle="modal" data-bs-target="#describeTopic_modal">
                              <button class="temmain_card">
                                 <i class="fa-regular fa-pen-to-square"></i>
                                 <div class="title_tem_card">Describe topic</div>
                                 <div class="subtitle_temcard">Enter a text prompt about your template.</div>
                              </button>
                           </a>
                        </div>
                     </div>
                     <!-- <div class="col-lg-4">
                        <div class="card_createtemp">
                              <a href="##">
                                 <button class="temmain_card">
                                 <i class="fa-solid fa-magnifying-glass"></i>
                                    <div class="title_tem_card">Find pre-made template</div>
                                    <div class="subtitle_temcard">Choose from over 100,000 editable templates.</div>
                                 </button>
                              </a>
                           </div>
                        </div> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-header">
               <div class="top_section_title">
                  <h5>All Templates</h5>
                  <a href="tickets-add.php" class="btn btn-primary customr_btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><i class="fa-solid fa-plus"></i> Create New Template</a>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-12 customtable_area">
                     <div class="table-responsive datatable-container">
                        <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                           <thead>
                              <tr>
                                 <th>S.No.</th>
                                 <th>Templates</th>
                                 <th>Last published</th>
                                 <th>Access</th>
                                 <th>Setting</th>
                                 <th>
                                    <i class="fa-solid fa-gear"></i>
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($templates as $data)
                                 <tr class="status-ticket-high odd" role="row">
                                    <td class="sorting_1">{{ $loop->iteration  }}</td>
                                    <td>
                                       <div class="flex_titlew_avtar">
                                          <div class="avtarprofile_custom">
                                             <img src="{{$data->t_picture}}" alt="">
                                          </div>
                                          <span>Office of Industrial Relations</span>
                                       </div>
                                    </td>
                                    <td>{{$data->timeDisplay}}</td>
                                    <td><i class="fa-regular fa-user"></i> All Users</td>
                                    <td><a href="{{route('inspections.create')}}"><button type="button" class="start_inspectionbtn">Start inspection</button></a></td>
                                    <td >
                                       <div class="dropdown notification-list topbar-dropdown" id="table_dropdownm">
                                          <a class="user_profile nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                          <i class="fa-solid fa-ellipsis-vertical"></i>
                                          </a>
                                          <!-- <p class="user_mail_id">avi@techmavesoftware.com</p> -->
                                          <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                             <a href="{{route('template.edit', $data->id)}}" class="dropdown-item notify-item">
                                             <i class="fa-solid fa-pencil"></i><span>Edit template</span>
                                             </a>
                                             <a href="{{route('schedule.create')}}" class="dropdown-item notify-item">
                                             <i class="fa-regular fa-calendar-minus"></i><span>Schedule</span>
                                             </a>
                                             <a href="##" class="dropdown-item notify-item">
                                             <i class="fa-regular fa-eye"></i><span>Manage access</span>
                                             </a>
                                             <a href="inspections.php" class="dropdown-item notify-item">
                                             <i class="fa-regular fa-clipboard"></i><span>View inspections</span>
                                             </a>
                                          </div>
                                       </div>
                                    </td>
                                 </tr>
                              @endforeach
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
<!-- container -->
<!-- data table searchbar style js -->
<script>
   $(document).ready(function() {
   
   // Iterate through each DataTable
   $('.datatable-container').each(function() {
     const $searchLabel = $(this).find('.dataTables_filter label');
     const $searchInput = $(this).find('.dataTables_filter input');
   
     // Add the search icon (Font Awesome in this example)
     $searchLabel.prepend('<i class="fas fa-search"></i>');
   
      // Update the search filter for each DataTable
   $('.datatable-container').each(function() {
     const $searchInput = $(this).find('.dataTables_filter input');
   
     // Add a placeholder text to the input field
     $searchInput.attr('placeholder', 'Search Templates..');
   
   
   });
     
   });
   });
   
</script>
<!-- data table searchbar style js end -->
<!-- create template off canvas start -->
<div class="offcanvas cuatomoffcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
   <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasBottomLabel" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-arrow-left"></i></h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body small">
      <div class="middle_customformarea">
         <div class="choose_templete">
            <div class="row">
               <div class="col-lg-6">
                  <a href="blank-template.php">
                     <div class="templete_selectcard bluebg">
                        <div class="template_card_icon"><i class="fa-solid fa-plus"></i></div>
                        <div class="templatecard_title">
                           <h1>Blank Template</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-lg-6">
                  <a href="##">
                     <div class="templete_selectcard yellobg">
                        <div class="template_card_icon"><i class="fa-regular fa-pen-to-square"></i></div>
                        <div class="templatecard_title">
                           <h1>Describe Topic</h1>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
            <div class="row">
               <div class="somedescription_creation">
                  <h1>Find and Customize a Template</h1>
               </div>
            </div>
            <div class="tem_canvassearch_area">
               <div class="row">
                  <div class="col-lg-8">
                     <div class="customsearchbar_template">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="search" class="temp_sear_input" placeholder="Search templates...">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="selectcustomcd">
                        <select class="form-select custom_Rselect">
                           <option value="0">Filter by Industry</option>
                           <option value="1">Quality Commercial Cleaning Pty Ltd.</option>
                           <option value="1">Quality Home Cleaning Solutions Pty Ltd.</option>
                           <option value="1">24/7 RR Pty Ltd</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
            <div class="search_list_templates">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="searresult_tempbox">
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
                           </div>
                        </div>
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
                           </div>
                        </div>
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
                           </div>
                        </div>
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
                           </div>
                        </div>
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
                           </div>
                        </div>
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
                           </div>
                        </div>
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
                           </div>
                        </div>
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
                           </div>
                        </div>
                        <div class="searresult_item">
                           <div class="search_title_tem">
                              <h1>Office of Industrial Relations</h1>
                              <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By : Boomerang</span></div>
                           </div>
                           <div class="byanddate">
                              <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300 Downloads</span></div>
                              <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7 Nov , 2023</span></div>
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
<!-- create template off canvas end -->
<!-- canvas search select dropdown working code -->
<script>
   $('.custom_Rselect').select2({
   dropdownParent: $('.cuatomoffcanvas')
   });  
</script>
<!-- canvas search select dropdown end -->
<!-- describe template topic modal -->
<div class="modal fade" id="describeTopic_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-body">
            <div class="topic_describeform">
               <h1>Describe Topic</h1>
               <p>What’s the topic of your template?</p>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="mb-3">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary btncancel_process" data-bs-dismiss="modal">Cancel</button>
            <a href="blank-template.php"><button type="button" class="btn btn-primary btncontinue_process">Continue</button></a>
         </div>
      </div>
   </div>
</div>
<!-- describe template topic modal end -->
@endsection