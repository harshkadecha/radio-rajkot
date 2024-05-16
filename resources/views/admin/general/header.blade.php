<!-- BEGIN: Header-->
<nav
    class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i
                            class="ficon"data-feather="menu"></i></a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                        data-feather="moon"></i></a></li>

            <ul class="nav navbar-nav">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">

                        <div class="user-nav d-sm-flex d-none" style="padding-right: 30px;">
                            <span class="user-name fw-bolder">{{ Str::ucfirst(Auth::user()->name) }}</span>
                            <span class="user-status">Admin</span>
                        </div>
                        <span class="">
                            <div class="avatar me-50" style="color:var(--primary_color);" height="40" width="40">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        {{-- <a class="dropdown-item" href=""> Profile</a> --}}

                        <a class="dropdown-item" href="{{ route('admin-edit') }}">
                            <i data-feather='user' class="me-50"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('admin-login') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="me-50" data-feather="power"></i> Logout</a>
                        <div class="dropdown-menu dropdown-menu-end" style="display:none"
                            aria-labelledby="navbarDropdown">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <p class="alert alert-danger"> asd asd </p>
                        </div>
                    </div>
                </li>
            </ul>

        </ul>
    </div>
</nav>

<!-- END: Header-->
