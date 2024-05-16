<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="">
                    <span class="brand-logo">
                        {{-- <img src="{{ asset('images/logo/hd logo -06-06.jpg') }}"
                        alt="" class="img-fluid"> --}}
                    </span>
                    <h3 class="brand-text" style="color: var(--primary-color)">
                        <img src="{{ asset('images/logo/radio_rajkot.png') }}" alt="radio-rajkot"
                            class="text-center" style="margin: auto;position: relative;left: 21%;width: 130px;">
                    </h3>

                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i>
                </a>
            </li>

        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="@if (Request::segment(2) == 'dashboard') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}">
                    <i data-feather='airplay'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'blogs') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin-blogs') }}">
                    <i data-feather='clipboard'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Blogs</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'comments') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('comments.index') }}">
                    <i data-feather='message-circle'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Comments</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'rj-info') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('rj-info.index') }}">
                    <i data-feather='server'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Rj Info</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'show') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('show.index') }}">
                    <i data-feather='speaker'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Show Setting</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'podcasts') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('podcasts.index') }}">
                    <i data-feather='mic'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Podcasts</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'interviews') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('interviews.index') }}">
                    <i data-feather='video'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Videoes</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'ad-manage') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('ad-manage.index') }}">
                    <i data-feather='dollar-sign'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Manage Ads</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'static-pages') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('static-pages.index') }}">
                    <i data-feather='file'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Static Pages</span>
                </a>
            </li>
            <li class="@if (Request::segment(2) == 'settings') active @endif nav-item">
                <a class="d-flex align-items-center" href="{{ route('settings.index') }}">
                    <i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">General Settings</span>
                </a>
            </li>

        </ul>
    </div>

</div>

<!-- END: Main Menu-->
