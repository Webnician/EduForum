<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="sEH4hconFUHLP86Qw5gUV273YpouFMsjf6JoUl1gzdk" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}" sizes="16x16">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" >
    {{--<link rel="manifest" href="/manifest.json">--}}
    <link rel="mask-icon" href="{{ asset('images/favicon.png') }}" color="#5bbad5">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EduForum') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-51786531-6', 'auto');
        ga('send', 'pageview');

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>
        $('.datepicker').datepicker();
    </script>
    <script src="https://use.fontawesome.com/edd99ff75c.js"></script>

    {{--Tiny MCE--}}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ntf0ljpj93py7a2y5v3vl7ymnhqmjn2shgq962vne7b5yzka"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <meta id="token" name="token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand header-logo" href="{{ url('/') }}" >
                        {{ config('app.name', 'EduForum') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav header-nav">
                        <li><a href="{{ url('/home') }}"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                        <li><a href="{{ url('/profile') }}"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
                        {{--{{ dd($user) }}--}}

                        @role('superadmin|admin|instadmin|persadmin')
                            <li><a href="{{ url('/users') }}">User List</a></li>
                        @endrole
                        @role('superadmin|admin')
                        <li><a href="{{ url('/institutions') }}">Institution List</a></li>
                        @endrole
                        @role('instadmin')
                        <li><a href="{{ url('/departments/institution') }}">Institution and Departments</a></li>
                        @endrole
                        @role('superadmin|admin|instadmin|contadmin')
                        <li><a href="{{ url('/courses') }}">Course List</a></li>
                        @endrole



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right header-nav-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li> <a href="{{ url('/profile') }}">{{ Auth::user()->fname }}</a> </li>
                            <li> <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a></li>
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu" role="menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('logout') }}"--}}
                                            {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--Logout--}}
                                        {{--</a>--}}

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
