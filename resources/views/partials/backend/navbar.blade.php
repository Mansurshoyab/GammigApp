@props(['mode'])

<style>
    .icon-container {
        display: inline-block;
        width: 30px;
        height: 30px;
        border: 1px solid #030303;
        border-radius: 5px;
        text-align: center;
        line-height: 30px;
        margin-left: 10px;
    }
</style>

@php
$company = App\Models\Company::first();
@endphp

<nav class="navbar navbar-expand navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
    <a href="{{ '/roxypaint/public/' }}" style="font-size: 25px" target="_blank"><i class="fa-solid fa-globe"></i></a>


    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
            </li>
            <li class="nav-item">
                <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="maximize"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('all/'. $company->logo) }}" class="avatar img-fluid rounded" alt="Roxy Paint" style="width: 150px !important; " />
                    <div class="icon-container">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
