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
        <meta name="theme-color" content="#ffffff">

        <title>EduForum</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Droid+Sans|Khula|Slabo+27px|Source+Sans+Pro" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-51786531-6', 'auto');
            ga('send', 'pageview');

        </script>

        <!-- Styles -->
        <style>
            html, body {

                color: #636b6f;
                font-family: 'Droid Sans', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 4em;
                font-weight: 400;
                /*color: #98cbe8;*/
                text-shadow: 2px 2px 2px 2px #fff;
            }

            .links > a {
                color: #f7f7f7;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .the-head img{
                opacity: .5;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height the-head" style=" background-repeat: no-repeat; background-size: 100% 200px; ">

            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/profile') }}">Profile</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        {{--<a href="{{ url('/users') }}">User List</a>--}}
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                {{--<div class="title m-b-md col-lg-12 col-md-12 col-sm-12">--}}
                <div class="title col-lg-12 col-md-12 col-sm-12" style="color: linen">
                    Welcome to EduForum
                </div>


            </div>
        </div>
        <div class="panel  col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12  "  >
            <div>
                <iframe width="100%" height="480" src="https://www.youtube.com/embed/FAsdtwj00Uo" frameborder="0" allowfullscreen></iframe>
            </div>
            <p class="" style="padding: 3%; font-size: 1.5em; font-weight: 300">
                EduForum is a next-generation open source Learning Management System, designed to bring the power of a
                flexible learning management platform to the masses.  The cloud based version will allow for easy set-up
                and registration.  The open-source code base will allow for you to download and run your own version of EduForum,
                allowing you to tailor EduForum to suit your own specific needs.
            </p>
        </div>

    </body>
</html>
