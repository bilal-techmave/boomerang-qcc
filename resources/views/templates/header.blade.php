<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>QCC | Quality Commercial Cleaning</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- App favicon -->
        <link rel="shortcut icon" href="../assets-tmp/images/new-images/">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- plugins -->
        <link href="../assets-tmp/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet">
         <!-- third party css -->
         <link href="../assets-tmp/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
         <!-- wizard start-->
        <link rel="stylesheet" href="../assets-tmp/libs/smartwizard/css/smart_wizard.min.css" type="text/css" />
        <link rel="stylesheet" href="../assets-tmp/libs/smartwizard/css/smart_wizard_theme_arrows.min.css" type="text/css" />
        <link rel="stylesheet" href="../assets-tmp/libs/smartwizard/css/smart_wizard_theme_circles.min.css" type="text/css" />
        <link rel="stylesheet" href="../assets-tmp/libs/smartwizard/css/smart_wizard_theme_dots.min.css" type="text/css" />
		  <!-- wizard end-->
        <!-- App css -->
		<link href="../assets-tmp/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="../assets-tmp/css/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
         <!-- fancybox gallery -->
         <link href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
		<link href="../assets-tmp/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
		<link href="../assets-tmp/css/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />
         <!-- Plugins css -->
         <link href="../assets-tmp/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
        <link href="../assets-tmp/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
        <!-- dropify css -->
        <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
		<!-- icons -->
		<link href="../assets-tmp/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../assets-tmp/css/custom.css">
        <link rel="stylesheet" href="../assets-tmp/css/templates.css">
    </head>

    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        
                        
                      
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none"  href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Access the F.A.Q">
                                <i data-feather="help-circle"></i>
                            </a>
                        </li>
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none"  href="incident-reports.php" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Incident Report that need action">
                                <i data-feather="clipboard"></i>
                            </a>
                        </li>
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none"  href="work-order.php" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Work Order ready to be invoiced">
                                <i data-feather="dollar-sign"></i>
                            </a>
                        </li>
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none"  href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Cleaners waiting to be approved">
                                <i data-feather="check-circle"></i>
                            </a>
                        </li>
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link ticket_link dropdown-toggle arrow-none"  href="tickets.php" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="My Tickets">
                                <i class="uil uil-ticket"></i>
                            </a>
                        </li>
                      
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="fullscreen" href="#">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>
    
                        <!-- <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle position-relative" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i data-feather="bell"></i>
                                <span class="badge bg-danger rounded-circle noti-icon-badge">6</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-lg">
    
                              
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-end">
                                            <a href="#" class="text-dark"><small>Clear All</small></a>
                                        </span>Notification
                                    </h5>
                                </div>
    
                                <div class="noti-scroll" data-simplebar>
    
                                 
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                        <div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                  
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                        <div class="notify-icon">
                                            <img src="../assets-tmp/images/users/avatar-1.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                        <div class="notify-icon">
                                            <img src="../assets-tmp/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>

                             
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom active">
                                        <div class="notify-icon bg-success"><i class="uil uil-comment-message"></i> </div>
                                        <p class="notify-details">
                                            Jaclyn Brunswick commented on Dashboard<small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>

                                  
                                    <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                                        <div class="notify-icon bg-danger"><i class="uil uil-comment-message"></i></div>
                                        <p class="notify-details">
                                            Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>

                                    
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="uil uil-heart"></i>
                                        </div>
                                        <p class="notify-details">
                                            Carlos Crouch liked <b>Admin</b> <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>
    
                            
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all <i class="fe-arrow-right"></i>
                                </a>
    
                            </div>
                        </li> -->
                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                                <i data-feather="settings"></i>
                            </a>
                        </li>
                        <li class="dropdown notification-list topbar-dropdown border-left">
                            <a class="user_profile nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="../assets-tmp/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    Nik Patel <i class="uil uil-angle-down"></i> 
                                 
                                </span>
                      
                            </a>
                            <!-- <p class="user_mail_id">avi@techmavesoftware.com</p> -->
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                    <p class="user_mail_id">nikpatel@techmavesoftware.com</p>
                                </div>
    
                                <a href="profile.php" class="dropdown-item notify-item">
                                    <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                                </a>

                                <a href="profile.php" class="dropdown-item notify-item">
                                    <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Change Password</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a href="login.php" class="dropdown-item notify-item">
                                    <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                                </a>
    
                            </div>
                        </li>
    
                      
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="#" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="../assets-tmp/images/new-images/sm-logo.png" alt="" height="24">
                                <!-- <span class="logo-lg-text-light">Shreyu</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="../assets-tmp/images/new-images/boomerang-logo.png" alt="" height="24">
                                <!-- <span class="logo-lg-text-light">S</span> -->
                            </span>
                        </a>
    
                        <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="../assets-tmp/images/new-images/sm-logo.png" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="../assets-tmp/images/new-images/boomerang-logo.png" alt="" height="24">
                            </span>
                        </a>
                    </div>
    
                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile">
                                <i data-feather="menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>   
            
                       

                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <!-- <div class="user-box text-center">
                        <img src="../assets-tmp/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-bs-toggle="dropdown">Nik Patel</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <a href="pages-profile.html" class="dropdown-item notify-item">
                                    <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="settings" class="icon-dual icon-xs me-1"></i><span>Settings</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="help-circle" class="icon-dual icon-xs me-1"></i><span>Support</span>
                                </a>
                                <a href="pages-lock-screen.html" class="dropdown-item notify-item">
                                    <i data-feather="lock" class="icon-dual icon-xs me-1"></i><span>Lock Screen</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div> -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Main</li>

                            <li>
                                <a href="index.php">
                                    <i data-feather="home"></i>
                                    <span> Dashboards </span>
                                   
                                </a>
                           
                            </li>

                           
                            <!-- <li>
                                <a href="apps-calendar.html">
                                    <i data-feather="calendar"></i>
                                    <span> Calendar </span>
                                </a>
                            </li>

                            -->

                            <li>
                                <a href="#sidebarEmail" data-bs-toggle="collapse">
                                    <i data-feather="pie-chart"></i>
                                    <span>Operational Dashboard</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarEmail">
                                    <ul class="nav-second-level">
                                        <li><a href="work-order-dashboard.php">Work Order Dashboard</a></li>
                                        <!-- <li><a href="site-dashboard.php">Site Dashboard</a></li> -->
                                        <li><a href="portfolio-structure.php">Portfolio Structure</a></li>
                                        <li><a href="missed-clean.php">Missed Clean</a></li>
                                        <li><a href="approval-board.php">Approval Board</a></li>

                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarCleaning" data-bs-toggle="collapse">
                                    <i data-feather="pie-chart"></i>
                                    <span>Cleaning</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCleaning">
                                    <ul class="nav-second-level">
                                        <li><a href="myregularcleaning.php">Dashboard</a></li>
                                        <li><a href="myjobs.php">My Jobs</a></li>
                                        <li><a href="storageclock.php">Storage Movement</a></li>

                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarProjects" data-bs-toggle="collapse">
                                    <i data-feather="trending-up"></i>
                                    <span>Financial Dashboard</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarProjects">
                                    <ul class="nav-second-level">
                                        <li><a href="work-order-dashboard-finance.php">Work Order Dashboard</a></li>
                                        <li><a href="manager-financial-dashboard.php">Manager Dashboard</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="it-dashboard.php">
                                    <i data-feather="monitor"></i>
                                    <span> IT Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="templates.php">
                                    <i data-feather="sidebar"></i>
                                    <span> Templates </span>
                                </a>
                            </li>
                            <li>
                                <a href="inspections.php">
                                    <i data-feather="sidebar"></i>
                                    <span> Inspection </span>
                                </a>
                            </li>
                            <li>
                                <a href="action.php">
                                <iconify-icon icon="ri:checkbox-multiple-line"></iconify-icon>
                                    <span> Action </span>
                                </a>
                            </li>
                            <li>
                                <a href="#userpermission" data-bs-toggle="collapse">
                                    <i class="uil-lock-access"></i>
                                    <span>User Permission</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="userpermission">
                                    <ul class="nav-second-level">
                                       <li><a href="role.php">Manage Role</a></li>
                                       <li><a href="user-access.php">User Access Role</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sidebarTasks" data-bs-toggle="collapse">
                                    <i data-feather="settings"></i>
                                    <span> Administration </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTasks">
                                    <ul class="nav-second-level">
                                        <!-- <li><a href="profile.php">Profile</a></li> -->
                                        <li><a href="company.php">Company</a></li>
                                        <!-- <li><a href="#">Users</a></li> -->
                                        <li><a href="departments.php">Departments</a></li>
                                        <li><a href="system-configuration.php">System Configuration</a></li>
                                    </ul>
                                </div>
                            </li>
                           

                            <li>
                                <a href="#sidebarExpages" data-bs-toggle="collapse">
                                    <i data-feather="users"></i>
                                    <span>Human Resources</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarExpages">
                                    <ul class="nav-second-level">
                                        <li><a href="teamplayer.php">Team Player</a></li>
                                        <!-- <li><a href="#">Person</a></li>
                                        <li><a href="#">Cleaners</a></li> -->
                                        <li><a href="waiting-approval.php">Waiting Approval</a></li>
                                        <li><a href="contractor.php">Contractors</a></li>
                                      </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sidebarhr" data-bs-toggle="collapse">
                                    <i class="bi bi-cash"></i>
                                    <span>Financial Settings</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarhr">
                                    <ul class="nav-second-level">
                                        <li><a href="financial-account.php">Financial Account</a></li>
                                        <li><a href="expense-type.php">Expense Type</a></li>
                                        <li><a href="expense.php">Expenses</a></li>
                                      </ul>
                                </div>
                            </li>
                            <li>
                                <a href="tickets.php" >
                                    <i class="uil uil-ticket"></i>
                                    <span> Tickets </span>
                                   
                                </a>
                             
                            </li>

                           
                            <li>
                                <a href="#sidebarIcons" data-bs-toggle="collapse">
                                    <i class="uil uil-building"></i>
                                    <span>Clients</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarIcons">
                                    <ul class="nav-second-level">
                                        <li>
                                                    <a href="#sidebarclient" data-bs-toggle="collapse">
                                            
                                                <span>Manage Clients</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarclient">
                                                <ul class="nav-second-level">
                                                <li><a href="client.php">Clients</a></li>

                                                    <li><a href="client-prospect.php">Prospect Clients</a></li>
                                                    <!-- <li><a href="expense.php">Expenses</a></li> -->
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- <li><a href="client-prospect.php">Prospect Clients</a></li> -->
                                        <!-- <li><a href="new-prospect-client.php">New Prospect Client</a></li> -->
                                        <li><a href="portfolios-client.php">Portfolios</a></li>
                                        <li>
                                           
                                           <a href="#sidebarsite" data-bs-toggle="collapse">
                                            
                                                <span>Manage Sites</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarsite">
                                                <ul class="nav-second-level">
                                                <li><a href="site.php">Sites</a></li>

                                                    <li><a href="site-add.php" class="monetization_">Monetization</a></li>
                                                    <!-- <li><a href="expense.php">Expenses</a></li> -->
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="suppliers.php">
                                    <i data-feather="box"></i>
                                    <span>Suppliers</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i data-feather="briefcase"></i>
                                    <span>My Jobs</span>
                                </a>
                            </li>
                            <li>
                                <a href="#sidebarForms" data-bs-toggle="collapse">
                                    <i data-feather="bookmark"></i>
                                    <span> Work Order </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarForms">
                                    <ul class="nav-second-level">
                                        <li><a href="job-type.php">Job Type</a></li>
                                        <!-- <li><a href="#">Job Sub Type</a></li> -->
                                        <!-- <li><a href="#">Search Work Order</a></li> -->
                                        <li><a href="work-order.php">New Work Order</a></li>
                                 
                                    </ul>
                                </div>
                            </li>

                         

                            <li>
                                <a href="#sidebarTables" data-bs-toggle="collapse">
                                    <i data-feather="grid"></i>
                                    <span> Reports </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTables">
                                    <ul class="nav-second-level">
                                        <li><a href="time-attandance.php">Time Attendance</a></li>
                                        <li><a href="invoice-runner.php">Invoice Runner</a></li>
                                        <li><a href="contractor-report.php">Contractor Report</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarMaps" data-bs-toggle="collapse">
                                    <i data-feather="database"></i>
                                    <span>Storage Management</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMaps">
                                    <ul class="nav-second-level">
                                        <li><a href="item.php">Item</a></li>
                                        <li><a href="storage.php">Storage</a></li>
                                        <li><a href="storage-movement.php">Storage Movement</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#sidebarmangement" data-bs-toggle="collapse">
                                    <i data-feather="list"></i>
                                    <span>Compliance</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarmangement">
                                    <ul class="nav-second-level">
                                        <!-- <li><a href="#">New Incident Report</a></li> -->
                                        <li><a href="incident-reports.php">Incident Reports</a></li>
                                        <li><a href="ncr-reports.php">NCR Reports</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#induction" data-bs-toggle="collapse">
                                    <i class="uil-file-edit-alt "></i>
                                    <span>Induction</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="induction">
                                    <ul class="nav-second-level">
                                        <!-- <li><a href="#">New Incident Report</a></li> -->
                                        <li><a href="induction.php">Induction</a></li>
                                        <li><a href="induction-driver.php">Drivers</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="uil uil-constructor"></i>
                                    <span>Cleaners</span>
                                </a>
                            </li>
                            <li>
                                <a href="time-attendance-dashboard.php">
                                    <i data-feather="check-square"></i>
                                    <span>Time Attendance</span>
                                </a>
                            </li>
                            <li>
                                <a href="work-order.php">
                                    <i data-feather="file-text"></i>
                                    <span>Work Order</span>
                                </a>
                            </li>
                            <li>
                                <a href="#sidebarlinks" data-bs-toggle="collapse">
                                    <i data-feather="link"></i>
                                    <span>External Links</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarlinks">
                                    <ul class="nav-second-level">
                                        <li><a href="https://qccleaning.sharepoint.com/admin-finance/_layouts/15/Doc.aspx?sourcedoc=%7BB26043CE-C151-4724-846D-9F924C8A56A7%7D&file=Missed%20clean.xlsx&action=default&mobileredirect=true&CT=1588287262167&OR=ItemsView">Missed Cleans</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/1SIVDZfScVbBZMKo9lm0s8ETKvi7UbjOUDw3BJrX70dg/edit?ts=5ca6c3af#gid=1325874770">Inspections</a></li>
                                        <li><a href="https://qccleaning.sharepoint.com/:x:/r/admin-finance/Shared%20Documents/Procedures/QCC_QH%20CONSOLIDATED%20BUDGET09052020.xlsx?d=w2193a7e1da944f2bb46c2a8f9827d35e&csf=1&web=1&e=jQgW6V">Budget</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/1E4VIm57eta6tdo9YqMVGMeMrJjDJvoMLTkPHnZXkLQA/edit?ts=5cc650e8#gid=2034046323">Atira Melbourne - Peel Street</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/1V7Vqg8KMC1fmcdjJSdZ1xiA1rpjCMDXzghdeKoaClAc/edit?ts=5ca6a1d5#gid=2034046323">Atira Melbourne – La Trobe</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/1QlPkqfcHtTfjOdutGTDS0KQjdlhIB7YSVPzmZigIRp4/edit#gid=0">Atira QLD – Merivale</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/1PQGhzTngqdRHuRV0PYTvoQRTQhlrSCPtWww_l8I4D3o/edit#gid=0">Atira QLD – Regent</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/1Wl_JVww54nweK7PpIDxoMI76kLAm2c2XNjmEP4NRDm8/edit?ts=5caaa07b#gid=793999465">Atira SA</a></li>
                                        <li><a href="https://qccleaning.sharepoint.com/:x:/r/sites/247Rapidresponse/_layouts/15/Doc.aspx?sourcedoc=%7BEE1ECAA1-624C-4E60-9816-C246D27D8988%7D&file=Machinery%20List.xlsx&wdLOR=c8BD58AC4-18DE-40F8-AAD4-344A972909FF&action=default&mobileredirect=true">Machinery List</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/1AHAem-62Pktu4rYXTjgKvMOKpelb1gj2Ywx4v32pUX8/edit#gid=2019612619">33 Glen Rd - Toowong : Regular room cleaning report</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/11rEgC2Z-WPG9CHQNCWUQZQT_Xg_O68QFXbd9l4fzSVE/edit#gid=0">33 Glen Rd - Toowong : Bond clean Sheet</a></li>
                                        <li><a href="https://docs.google.com/spreadsheets/d/1M_V9uudJFRaSmVbC3JRIUKvExjUB_R7dceUX9q71WFE/edit#gid=0">Bond clean sheet - URBANEST</a></li>

                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="faq.php">
                                    <i data-feather="message-square"></i>
                                    <span>F.A.Q</span>
                                </a>
                            </li>
                            <li>
                                <a href="login.php">
                                    <i data-feather="log-out"></i>
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

   <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">