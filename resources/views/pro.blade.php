@extends('layouts.app')

@section('content')

    <div class="container">
        <input hidden id="been" value="false"/>
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">User Profile test</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--You are logged in!--}}
                        {{--{{ $id }}--}}
                        {{--{{ $email }}--}}
                        {{--<a class="btn-primary" href="{{ route('userprofileeditor', $id) }}">Edit User</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<example></example>--}}
        <user :id="{{ $id }}" email="{{ $email }}" fname="{{ $fname }}" lname="{{ $lname }}" avatar="{{ $avatar }}" title="{{ $title }}" institution="{{ $institution }}" biography="{{ $biography }}"></user>
        <a class="btn-info" style="max-width:10%;display: block;margin-left: auto;margin-right: auto; text-align: center" href="{{ route('userprofileeditor', $id) }}">Edit User</a>

    </div>
@endsection