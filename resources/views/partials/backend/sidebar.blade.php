<aside id="sidebar" class="sidebar js-sidebar">
    {{-- one --}}
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24"
                fill="none" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter"
                color="#FFFFFF" style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>
        {{-- @php
        $company = App\Models\Company::first();
        @endphp --}}

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0"><a href="{{ route('admin.dashboard') }}">
                    <img src="{{ asset('all/'. $company->logo) }}" class="avatar img-fluid rounded me-1"
                        alt="Charles Hall" style="width: 220px !important; height: 60px" /></a>
                </div>
                <div class="flex-grow-1 ps-2">
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="align-middle me-1"
                                data-feather="pie-chart"></i> Analytics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1"
                                data-feather="settings"></i> Settings &
                            Privacy</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="align-middle me-1"
                                data-feather="help-circle"></i> Help Center</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0);">Log out</a>
                    </div>

                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item active">
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboards</span>
                </a>
            </li>
            <li class="sidebar-header">
                Admin Management
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#adminStuff" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Admin & Stuff</span>
                </a>
                <ul id="adminStuff" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="javascript:void(0);">Manage Admin</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="javascript:void(0);">Add Admin</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#userMember" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">User & Member</span>
                </a>
                <ul id="userMember" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="javascript:void(0);">Manage Member</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="javascript:void(0);">Add Member</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#rolePermission" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Role & Permission</span>
                </a>
                <ul id="rolePermission" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="javascript:void(0);">Admin Role</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="javascript:void(0);">Admin Permission</a></li>
                </ul>
            </li>

            <li class="sidebar-header">
                Game Management
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#game" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Game</span>
                </a>
                <ul id="game" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="javascript:void(0);">Genre</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="javascript:void(0);">Game</a></li>
                </ul>
            </li>

            <li class="sidebar-header">
                Report & Analytics
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0);">
                    <i class="fa-regular fa-building"></i> <span class="align-middle">Transaction History</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0);">
                    <i class="fa-regular fa-building"></i> <span class="align-middle">Profite Loss</span>
                </a>
            </li>

            <li class="sidebar-header">
                System & Configuration
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0);">
                    <i class="fa-regular fa-building"></i> <span class="align-middle">Miscellaneous</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0);">
                    <i class="fa-regular fa-building"></i> <span class="align-middle">Notification</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0);">
                    <i class="fa-regular fa-building"></i> <span class="align-middle">Massage</span>
                </a>
            </li>

            <li class="sidebar-header">
                Company Setup
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="javascript:void(0);" >
                    <i class="fa-regular fa-building"></i> <span class="align-middle">Company</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

