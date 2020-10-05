<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cycling Element - @yield('title')</title>

        <!-- Meta's -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/auth.css') }}" />
    </head>

    <body>
        <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="container">
                <div class="card login-card">
                    <div class="row no-gutters">
                        <div class="col-md-5">
                            <img src="{{ asset('assets/images/auth.jpg') }}" alt="login" class="login-card-img">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <div class="brand-wrapper">
                                    <img src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="logo" class="logo">
                                </div>

                                <p class="login-card-description">@yield('title')</p>

                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Scripts -->
        <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.js') }}"></script>
    </body>
</html>
