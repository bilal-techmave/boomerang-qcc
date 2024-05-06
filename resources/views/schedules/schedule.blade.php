@extends('layouts.main')
@section('main-content')
<link rel="stylesheet" href="../../assets-tmp/css/templates_lst.css">
<section class="schedule_list">
   <div class="container">
      <div class="row">
         <!-- start page title -->
         <div class="col-12">
            <div class="page-title-box">
               <h4 class="page-title">Schedule</h4>
               <div class="page-title-right">
                  <a href="{{route('schedule.create')}}" class="btn btn-primary">+ Schedule Inspection</a>
               </div>
            </div>
         </div>
         <div class="col-xl-12">
            <div class="card show_portfolio_tab">
               <div class="card-header">
                  <ul class="nav nav-tabs schedule_tab">
                     <li class="nav-item">
                        <a href="#home" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                        <span>My Schedules</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#profile" data-bs-toggle="tab" aria-expanded="true" class="nav-link ">
                        <span>Manage schedules</span>
                        </a>
                     </li>
                     <li class="nav-item">
                        <a href="#messages" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <span>Missed/Late Inspections</span>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="card-body">
                  <div class="tab-content  text-muted">
                     <div class="tab-pane show active" id="home">
                        <div class="scheduleContainer">
                           <div class="row">
                              <div class="col-lg-4">
                                 <div class="search_filed">
                                    <input type="text" class="form-control" placeholder="search here">
                                    <button class="btn searchBtnGYU">
                                       <iconify-icon icon="iconamoon:search"></iconify-icon>
                                    </button>
                                 </div>
                              </div>
                              <div class="col-lg-5">
                                 <div class="dropdown muliDropdown" id="mainDropdown">
                                    <div class="selectionValue_container">
                                       <div id="selectedValue" class="selected-value"></div>
                                       <span class="remove-selection" onclick="removeSelection()">✖</span>
                                    </div>
                                    <button class="dropbtn mainbuttondropdown" onclick="toggleDropdown('myDropdown')">
                                       <iconify-icon icon="ic:round-plus"></iconify-icon>
                                       Apply Filter
                                    </button>
                                    <div id="myDropdown" class="dropdown-content">
                                       <div class="nested-dropdown" id="templateNestedDropdown">
                                          <button class="dropbtn"
                                             onclick="toggleNestedDropdown('templateDropdown')">Template</button>
                                       </div>
                                       <!-- <div class="nested-dropdown" id="assetNestedDropdown">
                                          <button class="dropbtn"
                                              onclick="toggleNestedDropdown('assetDropdown')">Asset</button>
                                          </div> -->
                                       <!-- Add more nested dropdown buttons as needed -->
                                    </div>
                                 </div>
                                 <div id="accessDropdown" class="dropdown-content innerdropdown_container">
                                    <input type="text" class="search-bar" oninput="filterDropdown('accessDropdown')"
                                       placeholder="Search..." onclick="handleSearchBarClick(event, 'accessDropdown')">
                                    <div class="dropmenu_listC_Container">
                                       <h2>All filters</h2>
                                       <a href="#" onclick="selectOption('Access: Sub-option 1')">
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                             <label class="form-check-label" for="flexCheckDefault">
                                             Owned by me
                                             </label>
                                          </div>
                                       </a>
                                       <a href="#" onclick="selectOption('Access: Sub-option 2')">
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                             <label class="form-check-label" for="flexCheckDefault">
                                             Shared with me
                                             </label>
                                          </div>
                                       </a>
                                    </div>
                                 </div>
                                 <div id="templateDropdown" class="dropdown-content innerdropdown_container">
                                    <input type="text" class="search-bar" oninput="filterDropdown('templateDropdown')"
                                       placeholder="Search..." onclick="handleSearchBarClick(event, 'templateDropdown')">
                                    <div class="dropmenu_listC_Container">
                                       <div class="dropmenu_listC_Container">
                                          <h2>ALL TEMPLATES</h2>
                                          <a href="#" onclick="selectOption('Template: Untitled template')">
                                             <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="temp1">
                                                <label class="form-check-label" for="temp1">
                                                Untitled template
                                                </label>
                                             </div>
                                          </a>
                                          <a href="#" onclick="selectOption('Template: Demo')">
                                             <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="temp2">
                                                <label class="form-check-label" for="temp2">
                                                Demo
                                                </label>
                                             </div>
                                          </a>
                                          <a href="#" onclick="selectOption('Template: Test')">
                                             <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="temp3">
                                                <label class="form-check-label" for="temp3">
                                                Test
                                                </label>
                                             </div>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="groupDropdown" class="dropdown-content innerdropdown_container">
                                    <input type="text" class="search-bar" oninput="filterDropdown('groupDropdown')"
                                       placeholder="Search..." onclick="handleSearchBarClick(event, 'groupDropdown')">
                                    <div class="dropmenu_listC_Container">
                                       <a href="#" onclick="selectOption('Groups: All Audits')">
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value="" id="gropinp1">
                                             <label class="form-check-label" for="gropinp1">
                                             All Audits
                                             </label>
                                          </div>
                                       </a>
                                       <a href="#"
                                          onclick="selectOption('Groups: All users (Quality Commercial Cleaning Pty Ltd)')">
                                          <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value="" id="gropinp2">
                                             <label class="form-check-label" for="gropinp2">
                                             All users (Quality Commercial Cleaning Pty Ltd)
                                             </label>
                                          </div>
                                       </a>
                                    </div>
                                 </div>
                                 <div id="siteDropdown" class="dropdown-content innerdropdown_container">
                                    <input type="text" class="search-bar" oninput="filterDropdown('siteDropdown')"
                                       placeholder="Search..." onclick="handleSearchBarClick(event, 'siteDropdown')">
                                    <div class="dropmenu_listC_Container">
                                       <div class="site_multilevel_menu">
                                          <ul>
                                             <li>
                                                <div href="#" class="l1 multilavelselect_drop" value="2">
                                                   Queensland
                                                   <span>
                                                      <iconify-icon icon="iconamoon:arrow-right-2-duotone">
                                                      </iconify-icon>
                                                   </span>
                                                </div>
                                                <div class="layer1 side-menu" id="layer2" style="height: 100%;">
                                                   <ul data-value="2">
                                                      <li><a href="#" onclick="selectOption('Site: ARIA')" class="l1"
                                                         value="3">ARIA</a></li>
                                                      <li><a href="#"
                                                         onclick="selectOption('Site: Digital Sponsor Link')"
                                                         class="l1" value="3">Digital Sponsor
                                                         Link</a>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </li>
                                             <li>
                                                <div href="#" class="l1 multilavelselect_drop" value="2">
                                                   Kilcoy
                                                   <span>
                                                      <iconify-icon icon="iconamoon:arrow-right-2-duotone">
                                                      </iconify-icon>
                                                   </span>
                                                </div>
                                                <div class="layer1 side-menu" id="layer2" style="height: 100%;">
                                                   <ul data-value="2">
                                                      <li><a href="#"
                                                         onclick="selectOption('Site: Somerset Regional Council')"
                                                         class="l1" value="3">Somerset Regional Council</a></li>
                                                      <li><a href="#"
                                                         onclick="selectOption('Site: Toowoomba Police Station')"
                                                         class="l1" value="3">Toowoomba Police Station
                                                         Link</a>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="conductedDropdown" class="dropdown-content innerdropdown_container">
                                    <input type="text" class="search-bar" oninput="filterDropdown('conductedDropdown')"
                                       placeholder="Search..." onclick="handleSearchBarClick(event, 'conductedDropdown')">
                                    <div class="dropmenu_listC_Container">
                                       <a href="#" onclick="selectOption('Conducted date: Today')">Today</a>
                                       <a href="#" onclick="selectOption('Conducted date: Yesterday')">Yesterday</a>
                                       <a href="#" onclick="selectOption('Conducted date: Last 7 days')">Last 7 days</a>
                                       <a href="#" onclick="selectOption('Conducted date: Last 30 days')">Last 30 days</a>
                                       <a href="#" onclick="selectOption('Conducted date: This month')">This month</a>
                                       <a href="#" onclick="selectOption('Conducted date: Last month')">Last month</a>
                                       <a href="#" onclick="selectOption('Conducted date: Custom range')">Custom range</a>
                                    </div>
                                 </div>
                                 <div id="completedDropdown" class="dropdown-content innerdropdown_container">
                                    <input type="text" class="search-bar" oninput="filterDropdown('completedDropdown')"
                                       placeholder="Search..." onclick="handleSearchBarClick(event, 'completedDropdown')">
                                    <div class="dropmenu_listC_Container">
                                       <a href="#" onclick="selectOption('Completed date: Today')">Today</a>
                                       <a href="#" onclick="selectOption('Completed date: Yesterday')">Yesterday</a>
                                       <a href="#" onclick="selectOption('Completed date: Last 7 days')">Last 7 days</a>
                                       <a href="#" onclick="selectOption('Completed date: Last 30 days')">Last 30 days</a>
                                       <a href="#" onclick="selectOption('Completed date: This month')">This month</a>
                                       <a href="#" onclick="selectOption('Completed date: Last month')">Last month</a>
                                       <a href="#" onclick="selectOption('Completed date: Custom range')">Custom range</a>
                                    </div>
                                 </div>
                                 <!-- <div id="assetDropdown" class="dropdown-content innerdropdown_container">
                                    <input type="text" class="search-bar" oninput="filterDropdown('assetDropdown')"
                                        placeholder="Search..." onclick="handleSearchBarClick(event, 'assetDropdown')">
                                    <div class="dropmenu_listC_Container">
                                        <a href="#" onclick="selectOption('Template: Sub-option A')">assetDropdown1</a>
                                        <a href="#" onclick="selectOption('Template: Sub-option B')">assetDropdown2</a>
                                    </div>
                                    
                                    </div> -->
                              </div>
                           </div>
                           <div class="schedules_BOX">
                              <h5>2 schedules overdue</h5>
                              <div class="schedule_tup">
                                 <div class="left_tup">
                                    <div class="icon_tup red">
                                       <iconify-icon icon="mdi:clipboard-warning"></iconify-icon>
                                    </div>
                                 </div>
                                 <div class="right">
                                    <h6>Generic Audit - Toowoomba Regional Council - Every month</h6>
                                    <p>Was due 12:30 PM</p>
                                 </div>
                              </div>
                              <div class="schedule_tup">
                                 <div class="left_tup">
                                    <div class="icon_tup red">
                                       <iconify-icon icon="mdi:clipboard-warning"></iconify-icon>
                                    </div>
                                 </div>
                                 <div class="right">
                                    <h6>Generic Audit - Toowoomba Regional Council - Every month</h6>
                                    <p>Was due 12:30 PM</p>
                                 </div>
                              </div>
                           </div>
                           <div class="schedules_BOX">
                              <h5>Today <span>30 Apr 2024</span></h5>
                              <div class="schedule_tup">
                                 <div class="left_tup">
                                    <div class="icon_tup sky_lightTheme">
                                       <iconify-icon icon="pepicons-print:calendar-circle-filled" width="25"></iconify-icon>
                                    </div>
                                 </div>
                                 <div class="right">
                                    <h6>Generic Audit - Toowoomba Regional Council - Every month</h6>
                                    <p>Was due 12:30 PM</p>
                                 </div>
                              </div>
                              <div class="schedule_tup">
                                 <div class="left_tup">
                                    <div class="icon_tup sky_lightTheme">
                                       <iconify-icon icon="pepicons-print:calendar-circle-filled" width="25"></iconify-icon>
                                    </div>
                                 </div>
                                 <div class="right">
                                    <h6>Generic Audit - Toowoomba Regional Council - Every month</h6>
                                    <p>Was due 12:30 PM</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane " id="profile">
                        <div class="col-lg-5">
                           <div class="dropdown muliDropdown" id="mainDropdown">
                              <div class="selectionValue_container">
                                 <div id="selectedValue" class="selected-value"></div>
                                 <span class="remove-selection" onclick="removeSelection()">✖</span>
                              </div>
                              <button class="dropbtn mainbuttondropdown" onclick="toggleDropdown('myDropdown')">
                                 <iconify-icon icon="ic:round-plus"></iconify-icon>
                                 Apply Filter
                              </button>
                              <div id="myDropdown" class="dropdown-content">
                                 <div class="nested-dropdown" id="accessNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('accessDropdown')">Access</button>
                                 </div>
                                 <div class="nested-dropdown" id="templateNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('templateDropdown')">Template</button>
                                 </div>
                                 <div class="nested-dropdown" id="groupNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('groupDropdown')">Group</button>
                                 </div>
                                 <div class="nested-dropdown" id="siteNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('siteDropdown')">Site</button>
                                 </div>
                                 <div class="nested-dropdown" id="conductedNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('conductedDropdown')">Conducted Date</button>
                                 </div>
                                 <div class="nested-dropdown" id="completeNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('completedDropdown')">Completed Date</button>
                                 </div>
                                 <!-- <div class="nested-dropdown" id="assetNestedDropdown">
                                    <button class="dropbtn"
                                        onclick="toggleNestedDropdown('assetDropdown')">Asset</button>
                                    </div> -->
                                 <!-- Add more nested dropdown buttons as needed -->
                              </div>
                           </div>
                           <div id="accessDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('accessDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'accessDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <h2>All filters</h2>
                                 <a href="#" onclick="selectOption('Access: Sub-option 1')">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value=""
                                          id="flexCheckDefault">
                                       <label class="form-check-label" for="flexCheckDefault">
                                       Owned by me
                                       </label>
                                    </div>
                                 </a>
                                 <a href="#" onclick="selectOption('Access: Sub-option 2')">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value=""
                                          id="flexCheckDefault">
                                       <label class="form-check-label" for="flexCheckDefault">
                                       Shared with me
                                       </label>
                                    </div>
                                 </a>
                              </div>
                           </div>
                           <div id="templateDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('templateDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'templateDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <div class="dropmenu_listC_Container">
                                    <h2>ALL TEMPLATES</h2>
                                    <a href="#" onclick="selectOption('Template: Untitled template')">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="temp1">
                                          <label class="form-check-label" for="temp1">
                                          Untitled template
                                          </label>
                                       </div>
                                    </a>
                                    <a href="#" onclick="selectOption('Template: Demo')">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="temp2">
                                          <label class="form-check-label" for="temp2">
                                          Demo
                                          </label>
                                       </div>
                                    </a>
                                    <a href="#" onclick="selectOption('Template: Test')">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="temp3">
                                          <label class="form-check-label" for="temp3">
                                          Test
                                          </label>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <div id="groupDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('groupDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'groupDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <a href="#" onclick="selectOption('Groups: All Audits')">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="" id="gropinp1">
                                       <label class="form-check-label" for="gropinp1">
                                       All Audits
                                       </label>
                                    </div>
                                 </a>
                                 <a href="#"
                                    onclick="selectOption('Groups: All users (Quality Commercial Cleaning Pty Ltd)')">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="" id="gropinp2">
                                       <label class="form-check-label" for="gropinp2">
                                       All users (Quality Commercial Cleaning Pty Ltd)
                                       </label>
                                    </div>
                                 </a>
                              </div>
                           </div>
                           <div id="siteDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('siteDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'siteDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <div class="site_multilevel_menu">
                                    <ul>
                                       <li>
                                          <div href="#" class="l1 multilavelselect_drop" value="2">
                                             Queensland
                                             <span>
                                                <iconify-icon icon="iconamoon:arrow-right-2-duotone">
                                                </iconify-icon>
                                             </span>
                                          </div>
                                          <div class="layer1 side-menu" id="layer2" style="height: 100%;">
                                             <ul data-value="2">
                                                <li><a href="#" onclick="selectOption('Site: ARIA')" class="l1"
                                                   value="3">ARIA</a></li>
                                                <li><a href="#"
                                                   onclick="selectOption('Site: Digital Sponsor Link')"
                                                   class="l1" value="3">Digital Sponsor
                                                   Link</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </li>
                                       <li>
                                          <div href="#" class="l1 multilavelselect_drop" value="2">
                                             Kilcoy
                                             <span>
                                                <iconify-icon icon="iconamoon:arrow-right-2-duotone">
                                                </iconify-icon>
                                             </span>
                                          </div>
                                          <div class="layer1 side-menu" id="layer2" style="height: 100%;">
                                             <ul data-value="2">
                                                <li><a href="#"
                                                   onclick="selectOption('Site: Somerset Regional Council')"
                                                   class="l1" value="3">Somerset Regional Council</a></li>
                                                <li><a href="#"
                                                   onclick="selectOption('Site: Toowoomba Police Station')"
                                                   class="l1" value="3">Toowoomba Police Station
                                                   Link</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div id="conductedDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('conductedDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'conductedDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <a href="#" onclick="selectOption('Conducted date: Today')">Today</a>
                                 <a href="#" onclick="selectOption('Conducted date: Yesterday')">Yesterday</a>
                                 <a href="#" onclick="selectOption('Conducted date: Last 7 days')">Last 7 days</a>
                                 <a href="#" onclick="selectOption('Conducted date: Last 30 days')">Last 30 days</a>
                                 <a href="#" onclick="selectOption('Conducted date: This month')">This month</a>
                                 <a href="#" onclick="selectOption('Conducted date: Last month')">Last month</a>
                                 <a href="#" onclick="selectOption('Conducted date: Custom range')">Custom range</a>
                              </div>
                           </div>
                           <div id="completedDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('completedDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'completedDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <a href="#" onclick="selectOption('Completed date: Today')">Today</a>
                                 <a href="#" onclick="selectOption('Completed date: Yesterday')">Yesterday</a>
                                 <a href="#" onclick="selectOption('Completed date: Last 7 days')">Last 7 days</a>
                                 <a href="#" onclick="selectOption('Completed date: Last 30 days')">Last 30 days</a>
                                 <a href="#" onclick="selectOption('Completed date: This month')">This month</a>
                                 <a href="#" onclick="selectOption('Completed date: Last month')">Last month</a>
                                 <a href="#" onclick="selectOption('Completed date: Custom range')">Custom range</a>
                              </div>
                           </div>
                           <!-- <div id="assetDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('assetDropdown')"
                                  placeholder="Search..." onclick="handleSearchBarClick(event, 'assetDropdown')">
                              <div class="dropmenu_listC_Container">
                                  <a href="#" onclick="selectOption('Template: Sub-option A')">assetDropdown1</a>
                                  <a href="#" onclick="selectOption('Template: Sub-option B')">assetDropdown2</a>
                              </div>
                              
                              </div> -->
                        </div>
                        <div class="col-lg-12 customtable_area">
                           <div class="table-responsive datatable-container">
                              <table id="basic-datatable" class="table table-bordered   nowrap w-100">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox"></th>
                                       <th>Title</th>
                                       <th>Assigned by</th>
                                       <th>Assigned to</th>
                                       <th>Status</th>
                                       <th>Next due</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td class="sorting_1"><input type="checkbox"></td>
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="assigned" data-bs-toggle="tooltip" data-bs-placement="top" title="QCC Cleaning">QC</span></td>
                                       <td><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></td>
                                       <td><span class="active_status">Active</span></td>
                                       <td>29 Apr 2024 4:30 AM - 3 May 2024 12:30 PM</td>
                                    </tr>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td class="sorting_1"><input type="checkbox"></td>
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="assigned" data-bs-toggle="tooltip" data-bs-placement="top" title="QCC Cleaning">QC</span></td>
                                       <td><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></td>
                                       <td><span class="active_status">Active</span></td>
                                       <td>29 Apr 2024 4:30 AM - 3 May 2024 12:30 PM</td>
                                    </tr>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td class="sorting_1"><input type="checkbox"></td>
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="assigned" data-bs-toggle="tooltip" data-bs-placement="top" title="QCC Cleaning">QC</span></td>
                                       <td><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></td>
                                       <td><span class="active_status">Active</span></td>
                                       <td>29 Apr 2024 4:30 AM - 3 May 2024 12:30 PM</td>
                                    </tr>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td class="sorting_1"><input type="checkbox"></td>
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="assigned" data-bs-toggle="tooltip" data-bs-placement="top" title="QCC Cleaning">QC</span></td>
                                       <td><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></td>
                                       <td><span class="active_status paused_status">Paused</span></td>
                                       <td></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="messages">
                        <div class="col-lg-5">
                           <div class="dropdown muliDropdown" id="mainDropdown">
                              <div class="selectionValue_container">
                                 <div id="selectedValue" class="selected-value"></div>
                                 <span class="remove-selection" onclick="removeSelection()">✖</span>
                              </div>
                              <button class="dropbtn mainbuttondropdown" onclick="toggleDropdown('myDropdown')">
                                 <iconify-icon icon="ic:round-plus"></iconify-icon>
                                 Apply Filter
                              </button>
                              <div id="myDropdown" class="dropdown-content">
                                 <div class="nested-dropdown" id="accessNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('accessDropdown')">Access</button>
                                 </div>
                                 <div class="nested-dropdown" id="templateNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('templateDropdown')">Template</button>
                                 </div>
                                 <div class="nested-dropdown" id="groupNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('groupDropdown')">Group</button>
                                 </div>
                                 <div class="nested-dropdown" id="siteNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('siteDropdown')">Site</button>
                                 </div>
                                 <div class="nested-dropdown" id="conductedNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('conductedDropdown')">Conducted Date</button>
                                 </div>
                                 <div class="nested-dropdown" id="completeNestedDropdown">
                                    <button class="dropbtn"
                                       onclick="toggleNestedDropdown('completedDropdown')">Completed Date</button>
                                 </div>
                                 <!-- <div class="nested-dropdown" id="assetNestedDropdown">
                                    <button class="dropbtn"
                                        onclick="toggleNestedDropdown('assetDropdown')">Asset</button>
                                    </div> -->
                                 <!-- Add more nested dropdown buttons as needed -->
                              </div>
                           </div>
                           <div id="accessDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('accessDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'accessDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <h2>All filters</h2>
                                 <a href="#" onclick="selectOption('Access: Sub-option 1')">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value=""
                                          id="flexCheckDefault">
                                       <label class="form-check-label" for="flexCheckDefault">
                                       Owned by me
                                       </label>
                                    </div>
                                 </a>
                                 <a href="#" onclick="selectOption('Access: Sub-option 2')">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value=""
                                          id="flexCheckDefault">
                                       <label class="form-check-label" for="flexCheckDefault">
                                       Shared with me
                                       </label>
                                    </div>
                                 </a>
                              </div>
                           </div>
                           <div id="templateDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('templateDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'templateDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <div class="dropmenu_listC_Container">
                                    <h2>ALL TEMPLATES</h2>
                                    <a href="#" onclick="selectOption('Template: Untitled template')">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="temp1">
                                          <label class="form-check-label" for="temp1">
                                          Untitled template
                                          </label>
                                       </div>
                                    </a>
                                    <a href="#" onclick="selectOption('Template: Demo')">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="temp2">
                                          <label class="form-check-label" for="temp2">
                                          Demo
                                          </label>
                                       </div>
                                    </a>
                                    <a href="#" onclick="selectOption('Template: Test')">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" value="" id="temp3">
                                          <label class="form-check-label" for="temp3">
                                          Test
                                          </label>
                                       </div>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           <div id="groupDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('groupDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'groupDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <a href="#" onclick="selectOption('Groups: All Audits')">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="" id="gropinp1">
                                       <label class="form-check-label" for="gropinp1">
                                       All Audits
                                       </label>
                                    </div>
                                 </a>
                                 <a href="#"
                                    onclick="selectOption('Groups: All users (Quality Commercial Cleaning Pty Ltd)')">
                                    <div class="form-check">
                                       <input class="form-check-input" type="checkbox" value="" id="gropinp2">
                                       <label class="form-check-label" for="gropinp2">
                                       All users (Quality Commercial Cleaning Pty Ltd)
                                       </label>
                                    </div>
                                 </a>
                              </div>
                           </div>
                           <div id="siteDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('siteDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'siteDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <div class="site_multilevel_menu">
                                    <ul>
                                       <li>
                                          <div href="#" class="l1 multilavelselect_drop" value="2">
                                             Queensland
                                             <span>
                                                <iconify-icon icon="iconamoon:arrow-right-2-duotone">
                                                </iconify-icon>
                                             </span>
                                          </div>
                                          <div class="layer1 side-menu" id="layer2" style="height: 100%;">
                                             <ul data-value="2">
                                                <li><a href="#" onclick="selectOption('Site: ARIA')" class="l1"
                                                   value="3">ARIA</a></li>
                                                <li><a href="#"
                                                   onclick="selectOption('Site: Digital Sponsor Link')"
                                                   class="l1" value="3">Digital Sponsor
                                                   Link</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </li>
                                       <li>
                                          <div href="#" class="l1 multilavelselect_drop" value="2">
                                             Kilcoy
                                             <span>
                                                <iconify-icon icon="iconamoon:arrow-right-2-duotone">
                                                </iconify-icon>
                                             </span>
                                          </div>
                                          <div class="layer1 side-menu" id="layer2" style="height: 100%;">
                                             <ul data-value="2">
                                                <li><a href="#"
                                                   onclick="selectOption('Site: Somerset Regional Council')"
                                                   class="l1" value="3">Somerset Regional Council</a></li>
                                                <li><a href="#"
                                                   onclick="selectOption('Site: Toowoomba Police Station')"
                                                   class="l1" value="3">Toowoomba Police Station
                                                   Link</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div id="conductedDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('conductedDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'conductedDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <a href="#" onclick="selectOption('Conducted date: Today')">Today</a>
                                 <a href="#" onclick="selectOption('Conducted date: Yesterday')">Yesterday</a>
                                 <a href="#" onclick="selectOption('Conducted date: Last 7 days')">Last 7 days</a>
                                 <a href="#" onclick="selectOption('Conducted date: Last 30 days')">Last 30 days</a>
                                 <a href="#" onclick="selectOption('Conducted date: This month')">This month</a>
                                 <a href="#" onclick="selectOption('Conducted date: Last month')">Last month</a>
                                 <a href="#" onclick="selectOption('Conducted date: Custom range')">Custom range</a>
                              </div>
                           </div>
                           <div id="completedDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('completedDropdown')"
                                 placeholder="Search..." onclick="handleSearchBarClick(event, 'completedDropdown')">
                              <div class="dropmenu_listC_Container">
                                 <a href="#" onclick="selectOption('Completed date: Today')">Today</a>
                                 <a href="#" onclick="selectOption('Completed date: Yesterday')">Yesterday</a>
                                 <a href="#" onclick="selectOption('Completed date: Last 7 days')">Last 7 days</a>
                                 <a href="#" onclick="selectOption('Completed date: Last 30 days')">Last 30 days</a>
                                 <a href="#" onclick="selectOption('Completed date: This month')">This month</a>
                                 <a href="#" onclick="selectOption('Completed date: Last month')">Last month</a>
                                 <a href="#" onclick="selectOption('Completed date: Custom range')">Custom range</a>
                              </div>
                           </div>
                           <!-- <div id="assetDropdown" class="dropdown-content innerdropdown_container">
                              <input type="text" class="search-bar" oninput="filterDropdown('assetDropdown')"
                                  placeholder="Search..." onclick="handleSearchBarClick(event, 'assetDropdown')">
                              <div class="dropmenu_listC_Container">
                                  <a href="#" onclick="selectOption('Template: Sub-option A')">assetDropdown1</a>
                                  <a href="#" onclick="selectOption('Template: Sub-option B')">assetDropdown2</a>
                              </div>
                              
                              </div> -->
                        </div>
                        <div class="col-lg-12 customtable_area">
                           <div class="table-responsive datatable-container">
                              <table id="basic-datatable1" class="table table-bordered   nowrap w-100">
                                 <thead>
                                    <tr>
                                       <th>Title</th>
                                       <th>Status</th>
                                       <th>Template</th>
                                       <th>Assignees</th>
                                       <th>Due on</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="active_status overdue_status">Overdue</span></td>
                                       <td>Generic Audit </td>
                                       <td><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></td>
                                       <td>30 Apr 2024 12:30 PM</td>
                                    </tr>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="active_status overdue_status">Overdue</span></td>
                                       <td>Generic Audit </td>
                                       <td><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></td>
                                       <td>30 Apr 2024 12:30 PM</td>
                                    </tr>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="active_status overdue_status">Overdue</span></td>
                                       <td>Generic Audit </td>
                                       <td><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></td>
                                       <td>30 Apr 2024 12:30 PM</td>
                                    </tr>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="active_status overdue_status">Overdue</span></td>
                                       <td>Generic Audit </td>
                                       <td><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></td>
                                       <td>30 Apr 2024 12:30 PM</td>
                                    </tr>
                                    <tr class="status-ticket-high odd" role="row">
                                       <td>
                                          Homemaker Centre - Homemaker Centre - Every week
                                       </td>
                                       <td><span class="active_status paused_status">Missed</span></td>
                                       <td>Generic Audit </td>
                                       <td>
                                          <ul class="assignees_list">
                                             <li><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="Luan Ramos">LR</span></li>
                                             <li><span class="assigned assignedby" data-bs-toggle="tooltip" data-bs-placement="top" title="QCC Cleaning">QC</span></li>
                                          </ul>
                                       </td>
                                       <td>30 Apr 2024 12:30 PM</td>
                                    </tr>
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
   </div>
</section>
@include('schedules.footer')
<!-- custom multi lavel dropdown js end -->
<script>
   function toggleDropdown(dropdownId) {
       closeDropdowns();
       var dropdown = document.getElementById(dropdownId);
       var searchBar = dropdown.querySelector('.search-bar');
       if (dropdown.style.display === 'block') {
           dropdown.style.display = 'none';
           searchBar.style.display = 'none';
           hideSelectedValue();
       } else {
           dropdown.style.display = 'block';
           searchBar.style.display = 'block';
       }
   }
   
   function selectOption(optionText) {
       var selectedValue = document.getElementById('selectedValue');
       selectedValue.innerHTML = optionText;
       var dropbtn = document.querySelector('.dropbtn');
       dropbtn.innerHTML = '<iconify-icon icon="ic:round-plus"></iconify-icon> Add Filter';
       showSelectedValue();
       closeNestedDropdowns();
       closeDropdowns();
   }
   
   function toggleNestedDropdown(nestedDropdownId, event) {
       closeDropdowns(); // Close main dropdown
       closeNestedDropdowns();
       var nestedDropdown = document.getElementById(nestedDropdownId);
       var searchBar = nestedDropdown.querySelector('.search-bar');
       nestedDropdown.style.display = 'block';
       searchBar.style.display = 'block';
       event.stopPropagation(); // Prevents the event from reaching the document click listener
   }
   
   function closeNestedDropdowns() {
       var nestedDropdowns = document.querySelectorAll('.nested-dropdown .dropdown-content');
       var searchBars = document.querySelectorAll('.nested-dropdown .search-bar');
       for (var i = 0; i < nestedDropdowns.length; i++) {
           nestedDropdowns[i].style.display = 'none';
           searchBars[i].style.display = 'none';
       }
   }
   
   function filterDropdown(dropdownId) {
       var input, filter, dropdown, a, i;
       input = document.querySelector('#' + dropdownId + ' .search-bar');
       filter = input.value.toUpperCase();
       dropdown = document.getElementById(dropdownId);
       a = dropdown.getElementsByTagName('a');
       for (i = 0; i < a.length; i++) {
           if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
               a[i].style.display = '';
           } else {
               a[i].style.display = 'none';
           }
       }
   }
   
   function closeDropdowns() {
       var dropdowns = document.querySelectorAll('.dropdown-content');
       for (var i = 0; i < dropdowns.length; i++) {
           dropdowns[i].style.display = 'none';
       }
   }
   
   function removeSelection() {
       var selectedValue = document.getElementById('selectedValue');
       selectedValue.innerHTML = '';
       var dropbtn = document.querySelector('.dropbtn');
       dropbtn.innerHTML = '<iconify-icon icon="ic:round-plus"></iconify-icon> Add Filter';
       hideSelectedValue();
   }
   
   function showSelectedValue() {
       var selectedValue = document.getElementById('selectedValue');
       var removeSelection = document.querySelector('.remove-selection');
       selectedValue.style.display = 'inline-block';
       removeSelection.style.display = 'inline-block';
   }
   
   function hideSelectedValue() {
       var selectedValue = document.getElementById('selectedValue');
       var removeSelection = document.querySelector('.remove-selection');
       selectedValue.style.display = 'none';
       removeSelection.style.display = 'none';
   }
   
   function handleSearchBarClick(event, dropdownId) {
       event.stopPropagation(); // Prevents the event from reaching the document click listener
       var dropdown = document.getElementById(dropdownId);
       dropdown.style.display = 'block'; // Show the dropdown on search bar click
   }
   document.addEventListener('click', function(event) {
       var mainDropdown = document.getElementById('mainDropdown');
       if (!mainDropdown.contains(event.target)) {
           closeNestedDropdowns();
           closeDropdowns();
       }
   });
</script>
<!-- custom multi lavel dropdown js end -->
@endsection