<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" class="logo d-flex align-items-center">
            <img src="{{ url('public') }}/assets/img/pf.png" alt="">
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @if (auth()->user()->foto)
                        <div class="profile-picture" style="width: 35px; height: 35px; overflow: hidden; border-radius: 50%;">
                            <img src="{{url('public', Auth()->user()->foto)}}" style="width: 100%; height: 100%; object-fit: cover;" alt="Profile">
                        </div>
                    @else
                        <img src="{{url('public')}}/assets/img/download.jpg" alt="Profile" class="rounded-circle">                        
                    @endif
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->nama}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    @if (Auth::guard('pegawai')->check())
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{url('pegawai/profil')}}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>                        
                    @endif
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{url('logout')}}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header>