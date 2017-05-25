@extends('layouts.app')

@section('content')

    <div class="container">
        <input hidden id="been" value="true"/>

        {{--<div class="row">--}}
            {{--<div class="col-md-12 ">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">User Profile Editor</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--You are logged in!--}}
                        {{--{{ $id }}--}}
                        {{--{{ $email }}--}}
                        {{--{{ $avatar }}--}}
                        {{--{{ $title }}--}}
                        {{--{{ $institution }}--}}
                        {{--{{ $biography }}--}}
                        {{--<span id="thefname" >{{ $fname }}</span>--}}
                        {{--<span id="thelname" >{{ $lname }}</span>--}}

                        {{--<a class="btn-primary" href="{{ route('userprofileeditor', $id) }}">Edit User</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


       <user :id="{{ $id }}" email="{{ $email }}" fname="{{ $fname }}" lname="{{ $lname }}" avatar="{{ $avatar }}" title="{{ $title }}" institution="{{ $institution }}" biography="{{ $biography }}"></user>


    </div>
@endsection