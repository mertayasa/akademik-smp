<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #0f4c81;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" style="color: #fff;" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="btn btn-sm-group" role="group">
                <a id="btnGroupDrop1" style="color: #fff; margin-right: 80px;" type="button"
                    class="dropdown-toggle text-capitalize" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="nav-icon fas fa-user-circle"></i> &nbsp; {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="{{ url('profile') }}"><i class="nav-icon fas fa-user"></i> &nbsp;
                        My Profile</a>
                    <a class="dropdown-item" href="{{ url('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="nav-icon fas fa-sign-out-alt"></i> &nbsp; Log Out</a>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    {{-- <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->nama }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul> --}}
</nav>
<!-- /.navbar -->
