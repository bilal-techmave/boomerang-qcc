<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            @if (auth()->user()->role == 'cleaner')
            <ul id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{route('cleaner.dashboard')}}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('cleaner.myjob')}}">
                        <i data-feather="list"></i>
                        <span> My Jobs </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('storage.movement')}}">
                        <i data-feather="repeat"></i>
                        <span> Storage Movement </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}">
                        <i data-feather="log-out"></i>
                        <span> Logout </span>
                    </a>
                </li>
            </ul>
            @else
            <ul id="side-menu">
                <li class="menu-title">Main</li>
                <li>
                    <a href="{{route('dashboard')}}">
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
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['operational-dashboard-view']))
                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i data-feather="pie-chart"></i>
                        <span>Operational Dashboard</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li><a href="{{route('operational.work.order.dashboard')}}">Work Order Dashboard</a></li>
                            <!-- <li><a href="site-dashboard#">Site Dashboard</a></li> -->
                            <li><a href="{{route('operational.portfolio.stracture')}}">Portfolio Structure</a></li>
                            <li><a href="{{route('operational.missed.clean')}}">Missed Clean</a></li>
                            <li><a href="{{route('operational.approval.board')}}">Approval Board</a></li>
                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['financial-dashboard-view']))
                <li>
                    <a href="#sidebarProjects" data-bs-toggle="collapse">
                        <i data-feather="trending-up"></i>
                        <span>Financial Dashboard</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="nav-second-level">
                            <li><a href="{{route('financial.work.order.dashboard')}}">Work Order Dashboard</a></li>
                            <li><a href="{{route('financial.manager.dashboard')}}">Manager Dashboard</a></li>
                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['it-dashboard-view']))
                <li>
                    <a href="{{route('dashboard.itDashboard')}}">
                        <i data-feather="monitor"></i> <span> IT Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('template.index')}}">
                        <i data-feather="sidebar"></i>
                        <span> Templates </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('inspections.index')}}">
                        <i data-feather="sidebar"></i>
                        <span> Inspection </span>
                    </a>
                </li>
                <li>
                    <a href="{{route('schedule.index')}}">
                        <i data-feather="sidebar"></i>
                        <span> Schedule </span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['role-list', 'role-add','role-edit','role-delete']))
                <li>
                    <a href="#userpermission" data-bs-toggle="collapse">
                        <i class="uil-lock-access"></i>
                        <span>User Permission</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="userpermission">
                        <ul class="nav-second-level">
                           <li><a href="{{route('user.roles.index')}}">Manage Role</a></li>
                           {{-- <li><a href="user-access#">User Access Role</a></li> --}}
                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['company-view', 'department-view','system-configuration-edit']))
                <li>
                    <a href="#sidebarTasks" data-bs-toggle="collapse">
                        <i data-feather="settings"></i>
                        <span> Administration </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="nav-second-level">
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['company-view','company-add','company-edit','company-activate','company-deactivate']))
                                <li><a href="{{route('administration.company.index')}}">Company</a></li>
                            @endcan

                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['department-view','department-add','department-edit','department-activate','department-deactivate']))
                                <li><a href="{{route('administration.department.index')}}">Departments</a></li>
                            @endcan

                            @if (Auth::user()->role == 'admin' || auth()->user()->canAny(['system-configuration-edit']))
                                <li><a href="{{route('administration.site-settings')}}">System Configuration</a></li>
                            @endif

                            @if (Auth::user()->role == 'admin')
                            <li><a href="{{route('administration.cities')}}">Cities</a></li>
                            @endif

                            @if (Auth::user()->role == 'admin')
                            <li><a href="{{route('administration.states')}}">States</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endcanany
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['team-player-view', 'contractor-view','cleaner-approve']))
                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span>Human Resources</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['team-player-view','team-player-create','team-player-edit','team-player-activate','team-player-deactivate']))
                            <li><a href="{{route('hr.team-player.index')}}">Team Player</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['cleaner-approve']))
                            <li><a href="{{route('hr.waiting_approval')}}">Waiting Approval</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['contractor-view','contractors-create','contractors-edit','contractors-activate','contractors-deactivate']))
                            <li><a href="{{route('hr.contractor.index')}}">Contractors</a></li>
                            @endif
                          </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['financial-account-view', 'expense-type-view','expenses-view']))
                <li>
                    <a href="#sidebarhr" data-bs-toggle="collapse">
                        <i class="bi bi-cash"></i>
                        <span>Financial Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarhr">
                        <ul class="nav-second-level">
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['financial-account-view','financial-account-create','financial-account-edit','financial-account-activate','financial-account-deactivate']))
                            <li><a href="{{route('financial.accounts.index')}}">Financial Account</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['expense-type-view','expense-type-create','expense-type-edit','expense-type-activate','expense-type-deactivate']))
                            <li><a href="{{route('financial.expensetype.index')}}">Expense Type</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['expenses-view','expenses-create','expenses-edit','expenses-activate','expenses-deactivate']))
                            <li><a href="{{route('financial.expense.index')}}">Expenses</a></li>
                            @endif
                          </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['ticket-view','ticket-create','ticket-assign','ticket-slove','ticket-close','ticket-reopen','ticket-attachment','ticket-reply']))
                <li>
                    <a href="{{ route('admin.ticket.index') }}" >
                        <i class="uil uil-ticket"></i>
                        <span> Tickets </span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['client-view','portfolio-view','site-view','cleaner-create-prospect','budget-view']))
                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i class="uil uil-building"></i>
                        <span>Clients</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['client-view','client-edit','client-comment-add','cleaner-create-prospect','client-comment-view']))
                            <li>
                                <a href="#sidebarclient" data-bs-toggle="collapse">
                                    <span>Manage Clients</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarclient">
                                    <ul class="nav-second-level">
                                        @if (auth()->user()->role == 'admin' || auth()->user()->canAny(['client-view','client-edit','client-comment-add','client-comment-view']))
                                        <li><a href="{{route('client.client.index')}}">Clients</a></li>
                                        @endif
                                        @if (auth()->user()->role == 'admin' || auth()->user()->canAny(['cleaner-create-prospect']))
                                        <li><a href="{{route('client.prospect.index')}}">Prospect Clients</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['portfolio-activate','portfolio-add-comments','portfolio-create','portfolio-deactivate','portfolio-edit','portfolio-view','portfolio-view-comments']))
                            <li><a href="{{route('client.portfolio.index')}}">Portfolios</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['site-view','budget-view']))
                            <li>
                                <a href="#sidebarsite" data-bs-toggle="collapse">
                                    <span>Manage Sites</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarsite">
                                    <ul class="nav-second-level">
                                        @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['site-view','site-activate','site-add-comments','site-create','site-deactivate','site-edit','site-view-comments']))
                                        <li><a href="{{route('client.site.index')}}">Sites</a></li>
                                        @endif
                                        {{-- @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['site-view','site-activate','site-add-comments','site-create','site-deactivate','site-edit','site-view-comments','budget-view']))
                                        <li><a href="{{route('client.site.create')}}" class="monetization_">Monetization</a></li>
                                        @endif --}}
                                    </ul>
                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['supplier-view','supplier-activate','supplier-create','supplier-deactivate','supplier-edit']))
                <li>
                    <a href="{{route('supplier.suppliers.index')}}">
                        <i data-feather="box"></i>
                        <span>Suppliers</span>
                    </a>
                </li>
                @endif
                {{-- <li>
                    <a href="#">
                        <i data-feather="briefcase"></i>
                        <span>My Jobs</span>
                    </a>
                </li> --}}
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['work-order-create','job-type-view','job-type-create','job-type-edit','job-type-activate','job-type-deactivate','job-sub-type-view','job-sub-type-create','job-sub-type-edit','job-sub-type-activate','job-sub-type-deactivate']))
                <li>
                    <a href="#sidebarForms" data-bs-toggle="collapse">
                        <i data-feather="bookmark"></i>
                        <span> Work Order </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['job-type-view','job-type-create','job-type-edit','job-type-activate','job-type-deactivate','job-sub-type-view','job-sub-type-create','job-sub-type-edit','job-sub-type-activate','job-sub-type-deactivate']))
                            <li><a href="{{route('job-type.index')}}">Job Type</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['work-order-create']))
                            <li><a href="{{route('work-order.work-order.create')}}">New Work Order</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                {{-- time-attendance-view --}}
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['time-attendance-view','invoice-view']))

                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse">
                        <i data-feather="grid"></i>
                        <span> Reports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['time-attendance-view']))
                            <li><a href="{{route('report.time.attendance')}}">Time Attendance</a></li>
                            @endauth
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['invoice-view']))
                            <li><a href="{{route('report.invoice.runner')}}">Invoice Runner</a></li>
                            @endauth
                            {{-- @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['invoice-view']))
                            <li><a href="{{route('report.kpi.qcc.qh')}}">Kpi QCC </a></li>
                            @endauth
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['invoice-view']))
                            <li><a href="{{route('report.client.cleaners.summary')}}">Client Cleaner Summary</a></li>
                            @endauth
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['invoice-view']))
                            <li><a href="{{route('report.portfolio.site.summary')}}">Portfolio Site Summary</a></li>
                            @endauth
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['time-attendance-view']))
                            <li><a href="contractor-report#">Contractor Report</a></li>
                            @endauth  --}}
                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['storage-item-view','storage-item-create','storage-item-edit','storage-item-activate','storage-item-deactivate','storage-view','storage-create','storage-edit','storage-activate','storage-deactivate','storage-movement']))

                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i data-feather="database"></i>
                        <span>Storage Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['storage-item-view','storage-item-create','storage-item-edit','storage-item-activate','storage-item-deactivate']))
                            <li><a href="{{route('storage.items.index')}}">Item</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['storage-view','storage-create','storage-edit','storage-activate','storage-deactivate']))
                            <li><a href="{{route('storage.storage.index')}}">Storage</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['storage-movement']))
                            <li><a href="{{route('storage.movement')}}">Storage Movement</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
                {{-- incident-report-view --}}
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['incident-report-view','incident-report-create','incident-report-solve','incident-report-close','incident-report-reopen','ncr-report-view','ncr-report-create','ncr-report-solve','ncr-report-close','ncr-report-reopen']))

                <li>
                    <a href="#sidebarmangement" data-bs-toggle="collapse">
                        <i data-feather="list"></i>
                        <span>Compliance</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarmangement">
                        <ul class="nav-second-level">
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['incident-report-view','incident-report-create','incident-report-solve','incident-report-close','incident-report-reopen']))
                            <li><a href="{{route('incident.index')}}">Incident Reports</a></li>
                            @endif
                            @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['ncr-report-view','ncr-report-create','ncr-report-solve','ncr-report-close','ncr-report-reopen']))
                            {{-- <li><a href="ncr-reports#">NCR Reports</a></li> --}}
                            @endif
                            <li><a href="{{route('ncr.index')}}">NCR Reports</a></li>
                        </ul>
                    </div>
                </li>
                @endif

                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['induction-add','induction-edit','induction-view','induction-status']))
                <li>
                    <a href="{{route('induction.induction.index')}}">
                        <i class="uil uil-constructor"></i>
                        <span>Induction</span>
                    </a>
                </li>
                @endif
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['cleaner-view']))
                <li>
                    <a href="{{ route('cleaner.index') }}">
                        <i class="uil uil-constructor"></i>
                        <span>Cleaners</span>
                    </a>
                </li>
                @endif
                {{-- <li>
                    <a href="{{route('time.attendance.dashboard')}}">
                        <i data-feather="check-square"></i>
                        <span>Time Attendance</span>
                    </a>
                </li> --}}
                {{-- 'work-order-view','work-order-edit','work-order-edit-invoice-number' --}}
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['work-order-create','work-order-view','work-order-edit','work-order-edit-invoice-number']))

                <li>
                    <a href="{{route('work-order.work-order.index')}}">
                        <i data-feather="file-text"></i>
                        <span>Work Order</span>
                    </a>
                </li>
                @endif
                {{-- <li  >
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
                </li> --}}
                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['shift-question-add','shift-question-edit','shift-question-manage-site']))
                <li>
                    <a href="{{route('question.question.index')}}">
                        <i data-feather="message-square"></i>
                        <span>Shift Questions</span>
                    </a>
                </li>
                @endif

                @if(auth()->user()->role == 'admin' || auth()->user()->canAny(['faq-add','faq-edit']))
                <li>
                    <a href="{{route('faqs.index')}}">
                        <i data-feather="message-square"></i>
                        <span>F.A.Q</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{route('logout')}}">
                        <i data-feather="log-out"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
            @endif
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->