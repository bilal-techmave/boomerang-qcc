
    <body class="loading" data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        @if(auth()->user()->role == 'admin')
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none"  href="{{route('faqs.index')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Access the F.A.Q">
                                <i data-feather="help-circle"></i>
                            </a>
                        </li>
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none"  href="{{route('incident.index')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Incident Report that need action">
                                <i data-feather="clipboard"></i>
                            </a>
                        </li>
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none"  href="{{route('work-order.work-order.index')}}?status[]=To Invoice" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Work Order ready to be invoiced">
                                <i data-feather="dollar-sign"></i>
                            </a>
                        </li>
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none"  href="{{route('hr.waiting_approval')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Cleaners waiting to be approved">
                                <i data-feather="check-circle"></i>
                            </a>
                        </li>
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link ticket_link dropdown-toggle arrow-none"  href="{{route('ticket.ticket.index')}}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="My Tickets">
                                <i class="uil uil-ticket"></i>
                            </a>
                        </li>
                        @endif
                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="fullscreen" href="javascript:void(0)">
                                <i data-feather="maximize"></i>
                            </a>
                        </li>
                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle">
                                <i data-feather="settings"></i>
                            </a>
                        </li>
                        <li class="dropdown notification-list topbar-dropdown border-left">
                            <a class="user_profile nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{asset('images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ms-1">
                                    {{ Auth::guard('web')->user()->name }}<i class="uil uil-angle-down"></i>
                                </span>
                            </a>
                            <!-- <p class="user_mail_id">avi@techmavesoftware.com</p> -->
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                    <p class="user_mail_id">{{ Auth::guard('web')->user()->email }}</p>
                                </div>
                                <a href="{{route('user.profile')}}" class="dropdown-item notify-item">
                                    <i data-feather="user" class="icon-dual icon-xs me-1"></i><span>My Account</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{route('logout')}}" class="dropdown-item notify-item">
                                    <i data-feather="log-out" class="icon-dual icon-xs me-1"></i><span>Logout</span>
                                </a>
                            </div>
                        </li>

                    </ul>
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="{{route('dashboard')}}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{asset('images/new-images/favicon.png')}}" alt="" height="24">
                                <!-- <span class="logo-lg-text-light">Shreyu</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('images/new-logo.png')}}" alt="" height="">
                                <!-- <span class="logo-lg-text-light">S</span> -->
                            </span>
                        </a>
                        <a href="{{route('dashboard')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{asset('images/new-images/favicon.png')}}" alt="" height="24">
                            </span>
                            <span class="logo-lg">
                                <img src="{{asset('images/new-logo.png')}}" alt="" height="">
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
            @include('layouts.includes.sidebar')
   <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">
