@extends('layouts.main')
@section('main-content')
<link rel="stylesheet" href="../assets-tmp/css/templates.css">
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Inspections</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Inspections</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <!-- <div class="card-header">
    <div class="top_section_title">
        <h5>All Templates</h5>

        <a href="tickets-add.php" class="btn btn-primary customr_btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><i class="fa-solid fa-plus"></i> Create New Template</a>
    </div>
</div> -->
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-5">
                            <div class="dropdown muliDropdown" id="mainDropdown">
                                <div class="selectionValue_container">
                                    <div id="selectedValue" class="selected-value"></div>
                                    <span class="remove-selection" onclick="removeSelection()">✖</span>
                                </div>

                                <button class="dropbtn mainbuttondropdown" onclick="toggleDropdown('myDropdown')">
                                    <iconify-icon icon="ic:round-plus"></iconify-icon> Apply Filter
                                </button>
                                <div id="myDropdown" class="dropdown-content">

                                    <div class="nested-dropdown" id="accessNestedDropdown">
                                        <button class="dropbtn" onclick="toggleNestedDropdown('accessDropdown')">Access</button>
                                    </div>
                                    <div class="nested-dropdown" id="templateNestedDropdown">
                                        <button class="dropbtn" onclick="toggleNestedDropdown('templateDropdown')">Template</button>
                                    </div>
                                    <div class="nested-dropdown" id="groupNestedDropdown">
                                        <button class="dropbtn" onclick="toggleNestedDropdown('groupDropdown')">Group</button>
                                    </div>
                                    <div class="nested-dropdown" id="siteNestedDropdown">
                                        <button class="dropbtn" onclick="toggleNestedDropdown('siteDropdown')">Site</button>
                                    </div>

                                    <div class="nested-dropdown" id="conductedNestedDropdown">
                                        <button class="dropbtn" onclick="toggleNestedDropdown('conductedDropdown')">Conducted Date</button>
                                    </div>

                                    <div class="nested-dropdown" id="completeNestedDropdown">
                                        <button class="dropbtn" onclick="toggleNestedDropdown('completedDropdown')">Completed Date</button>
                                    </div>

                                    <!-- <div class="nested-dropdown" id="assetNestedDropdown">
                                        <button class="dropbtn"
                                            onclick="toggleNestedDropdown('assetDropdown')">Asset</button>
                                    </div> -->
                                    <!-- Add more nested dropdown buttons as needed -->
                                </div>
                            </div>

                            <div id="accessDropdown" class="dropdown-content innerdropdown_container">

                                <input type="text" class="search-bar" oninput="filterDropdown('accessDropdown')" placeholder="Search..." onclick="handleSearchBarClick(event, 'accessDropdown')">
                                <div class="dropmenu_listC_Container">
                                    <h2>All filters</h2>
                                    <a href="#" onclick="selectOption('Access: Sub-option 1')">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Owned by me
                                            </label>
                                        </div>
                                    </a>
                                    <a href="#" onclick="selectOption('Access: Sub-option 2')">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Shared with me
                                            </label>
                                        </div>
                                    </a>

                                </div>
                            </div>

                            <div id="templateDropdown" class="dropdown-content innerdropdown_container">
                                <input type="text" class="search-bar" oninput="filterDropdown('templateDropdown')" placeholder="Search..." onclick="handleSearchBarClick(event, 'templateDropdown')">
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
                                <input type="text" class="search-bar" oninput="filterDropdown('groupDropdown')" placeholder="Search..." onclick="handleSearchBarClick(event, 'groupDropdown')">
                                <div class="dropmenu_listC_Container">
                                    <a href="#" onclick="selectOption('Groups: All Audits')">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="gropinp1">
                                            <label class="form-check-label" for="gropinp1">
                                                All Audits
                                            </label>
                                        </div>
                                    </a>
                                    <a href="#" onclick="selectOption('Groups: All users (Quality Commercial Cleaning Pty Ltd)')">
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
                                <input type="text" class="search-bar" oninput="filterDropdown('siteDropdown')" placeholder="Search..." onclick="handleSearchBarClick(event, 'siteDropdown')">
                                <div class="dropmenu_listC_Container">
                                    <div class="site_multilevel_menu">
                                        <ul>
                                            <li>
                                                <div href="#" class="l1 multilavelselect_drop" value="2">
                                                    Queensland<span>
                                                        <iconify-icon icon="iconamoon:arrow-right-2-duotone">
                                                        </iconify-icon>
                                                    </span>
                                                </div>
                                                <div class="layer1 side-menu" id="layer2" style="height: 100%;">
                                                    <ul data-value="2">
                                                        <li><a href="#" onclick="selectOption('Site: ARIA')" class="l1" value="3">ARIA</a></li>
                                                        <li><a href="#" onclick="selectOption('Site: Digital Sponsor Link')" class="l1" value="3">Digital Sponsor
                                                                Link</a></li>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li>
                                                <div href="#" class="l1 multilavelselect_drop" value="2">Kilcoy<span>
                                                        <iconify-icon icon="iconamoon:arrow-right-2-duotone">
                                                        </iconify-icon>
                                                    </span>
                                                </div>
                                                <div class="layer1 side-menu" id="layer2" style="height: 100%;">
                                                    <ul data-value="2">
                                                        <li><a href="#" onclick="selectOption('Site: Somerset Regional Council')" class="l1" value="3">Somerset Regional Council</a></li>
                                                        <li><a href="#" onclick="selectOption('Site: Toowoomba Police Station')" class="l1" value="3">Toowoomba Police Station
                                                                Link</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>

                                </div>
                            </div>

                            <div id="conductedDropdown" class="dropdown-content innerdropdown_container">
                                <input type="text" class="search-bar" oninput="filterDropdown('conductedDropdown')" placeholder="Search..." onclick="handleSearchBarClick(event, 'conductedDropdown')">
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
                                <input type="text" class="search-bar" oninput="filterDropdown('completedDropdown')" placeholder="Search..." onclick="handleSearchBarClick(event, 'completedDropdown')">
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
                                            <!-- <th>S.No.</th> -->
                                            <th>Inspection</th>
                                            <th>Actions</th>
                                            <!-- <th>Doc number</th> -->
                                            <th>Score</th>
                                            <th>Conducted</th>
                                            <th>Completed</th>
                                            <th></th>
                                            <th>
                                                <i class="fa-solid fa-gear"></i>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inspection_template as $data)
                                        <tr class="status-ticket-high odd" role="row">
                                            <!-- <td class="sorting_1"><input type="checkbox"></td> -->
                                            <td>
                                                <div class="flex_titlew_avtar inspectionTitle_conter_table">
                                                    <div class="inspectTit_innerbox">
                                                        <div class="avtarprofile_custom">
                                                            @if($data['templateInspection']->t_picture && Storage::exists($data['templateInspection']->t_picture))
                                                            <img src="{{asset(Storage::url($data['templateInspection']->t_picture))}}" alt="">
                                                            @else
                                                            <img src="../assets-tmp/images/new-images/boomrang-icon.png" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="INSP_title_right">
                                                            <div class="inspectinTable_listtitle">
                                                                <span>{{$data['templateInspection']->created_at->format('d M, Y')}}</span>
                                                            </div>
                                                            <div class="INSpTAb_descript">
                                                                <p>{{$data['templateInspection']->t_name}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                            <!-- <td></td> -->
                                            <td>{{$data->score != null ? $data->score : '0'}}%</td>
                                            <td>{{$data->created_at->format('d M, Y')}}</td>
                                            <td>{{$data->completed != null ? $data->completed->format('d M, Y') : ''}}</td>
                                            <td>
                                                <a href="{{route('inspections.viewReport')}}">
                                                    <div class="status_completeView">View Report</div>
                                                </a>
                                            </td>
                                            <td>
                                                <div class="dropdown notification-list topbar-dropdown" id="table_dropdownm">
                                                    <a class="user_profile nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                                    </a>
                                                    <!-- <p class="user_mail_id">avi@techmavesoftware.com</p> -->
                                                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                                        <a href="{{ route('inspections.edit', encrypt($data->template_id)) }}" class="dropdown-item notify-item">
                                                            <i class="fa-solid fa-pencil"></i><span>Edit Inspection</span>
                                                        </a>

                                                        <a href="profile.php" class="dropdown-item notify-item">
                                                            <iconify-icon icon="heroicons-solid:duplicate">
                                                            </iconify-icon><span>Duplicate Inspection</span>
                                                        </a>

                                                        <a href="{{route('inspections.viewReport')}}" class="dropdown-item notify-item">
                                                            <i class="fa-regular fa-eye"></i><span>View Report</span>
                                                        </a>

                                                        <a href="{{route('inspections.viewHistory')}}" class="dropdown-item notify-item">
                                                            <i class="fa-regular fa-clipboard"></i><span>View History</span>
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
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
                                    </div>
                                </div>

                                <div class="searresult_item">
                                    <div class="search_title_tem">
                                        <h1>Office of Industrial Relations</h1>
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
                                    </div>
                                </div>

                                <div class="searresult_item">
                                    <div class="search_title_tem">
                                        <h1>Office of Industrial Relations</h1>
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
                                    </div>
                                </div>

                                <div class="searresult_item">
                                    <div class="search_title_tem">
                                        <h1>Office of Industrial Relations</h1>
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
                                    </div>
                                </div>

                                <div class="searresult_item">
                                    <div class="search_title_tem">
                                        <h1>Office of Industrial Relations</h1>
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
                                    </div>
                                </div>

                                <div class="searresult_item">
                                    <div class="search_title_tem">
                                        <h1>Office of Industrial Relations</h1>
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
                                    </div>
                                </div>

                                <div class="searresult_item">
                                    <div class="search_title_tem">
                                        <h1>Office of Industrial Relations</h1>
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
                                    </div>
                                </div>

                                <div class="searresult_item">
                                    <div class="search_title_tem">
                                        <h1>Office of Industrial Relations</h1>
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
                                    </div>
                                </div>

                                <div class="searresult_item">
                                    <div class="search_title_tem">
                                        <h1>Office of Industrial Relations</h1>
                                        <div class="created_by"><span><i class="fa-regular fa-user"></i> Created By :
                                                Boomerang</span></div>
                                    </div>
                                    <div class="byanddate">
                                        <div class="total__downloads"><span><i class="fa-solid fa-download"></i> 300
                                                Downloads</span></div>
                                        <div class="date_created"><span><i class="fa-regular fa-calendar-days"></i> 7
                                                Nov , 2023</span></div>
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