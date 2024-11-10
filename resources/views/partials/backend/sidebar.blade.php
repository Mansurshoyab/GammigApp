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
        @php
        $company = App\Models\Company::first();
        @endphp
        
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
                        <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                data-feather="pie-chart"></i> Analytics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1"
                                data-feather="settings"></i> Settings &
                            Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                data-feather="help-circle"></i> Help Center</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>

                </div>
            </div>
        </div>

        {{-- one --}}



        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            <li class="sidebar-item active">
                {{-- one --}}
                <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i> 
                    <span class="align-middle">Dashboards</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#withdrow" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Withdrow</span>
                </a>
                <ul id="withdrow" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Sliders</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Depots</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Concern</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#user" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">User</span>
                </a>
                <ul id="user" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Sliders</a>
                    </li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Depots</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Concern</a></li>
                </ul>
            </li>

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('message') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Message</span>
                </a>
            </li> --}}


            <li class="sidebar-item">
                <a href="{{ route('about') }}" class="sidebar-link">
                    <i class="fa-solid fa-user-tie"></i> <span class="align-middle">About Us</span>
                </a>
            </li>

            <li class="sidebar-header">
                Company Setup
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.company') }}">
                    <i class="fa-regular fa-building"></i> <span class="align-middle">Company</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

