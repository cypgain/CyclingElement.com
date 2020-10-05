<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cycling Element - @yield('title')</title>

        <!-- Meta's -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/x-icon" />
        <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/x-icon" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" />

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/feather-icon.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}" />
    </head>

    <body class="dark-only dark-sidebar">
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>

        <div class="page-wrapper compact-wrapper" id="pageWrapper">

            @include('layouts.components.menu')

            <div class="page-body-wrapper sidebar-icon">
                @include('layouts.components.sidebar')

                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-6">
                                    <h1>@yield('title')</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        @yield('content')
                    </div>

                </div>

                @include('layouts.components.footer')
            </div>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
        <script src="{{ asset('assets/js/config.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>

        @yield('script')

    </body>
</html>
