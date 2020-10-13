<header class="main-nav">

    <div class="logo-wrapper"><a href="{{ route('home') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <!-- <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div> -->
    </div>

    <div class="logo-icon-wrapper"><a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="Logo"></a></div>

    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn"><a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                    </li>

                    <li class="sidebar-title">
                        <div>
                            <h6>General</h6>
                            <p>Track your performances.</p>
                        </div>
                    </li>

                    <li class="dropdown"><a class="nav-link" href="{{ route('activities') }}"><i data-feather="activity"></i><span>Activities</span></a></li>
                    <li class="dropdown"><a class="nav-link" href="{{ route('trainings') }}"><i data-feather="home"></i><span>Trainings</span></a></li>

                    <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="bar-chart"></i><span>Datas</span></a>
                        <ul class="nav-submenu menu-content">
                            <li><a href="{{ route('weight') }}">Weight</a></li>
                            <li><a href="{{ route('heartrate') }}">Heart Rate</a></li>
                            <li><a href="{{ route('ftp') }}">FTP</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>
