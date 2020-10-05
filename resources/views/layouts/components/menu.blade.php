<div class="page-main-header">
    <div class="main-header-right row m-0">

        <div class="left-menu-header col horizontal-wrapper pl-0">
            <ul class="horizontal-menu">
            </ul>
        </div>

        <div class="nav-right col-8 pull-right right-menu">
            <ul class="nav-menus">
                <li><div class="mode"><i class="fa fa-moon-o"></i></div></li>

                <li class="profile-nav onhover-dropdown p-0">
                    <div class="media profile-media"><img class="b-r-10" src="{{ asset('assets/images/avatar/profile.jpg') }}" alt="">
                        <div class="media-body"><span>{{ Auth::user()->name }}</span>
                            <p class="mb-0 font-roboto text-capitalize">{{ Auth::user()->roles()->first()->name }} <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li onclick="window.location.href = '{{ route('home') }}'"><i data-feather="user"></i><span>Account</span></li>
                        <li onclick="document.getElementById('logout-form').submit();"><i data-feather="log-in"> </i><span>Log out</span></li>
                    </ul>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>
            </ul>
        </div>
    </div>
</div>
