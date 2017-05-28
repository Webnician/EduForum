<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EduForum</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {

                color: #636b6f;
                font-family: 'Raleway', sans-serif;
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
        <div class="flex-center position-ref full-height the-head" style="background-image: url('/images/eduforumiconnotext.png'); background-repeat: no-repeat; background-size: 100% 200px; ">

            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ url('/profile') }}">Profile</a>
                        <a href="{{ url('/users') }}">User List</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                {{--<div class="title m-b-md col-lg-12 col-md-12 col-sm-12">--}}
                <div class="title col-lg-12 col-md-12 col-sm-12">
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
