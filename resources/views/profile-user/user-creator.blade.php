@extends('layouts.app')

@section('content')

    <div class="container">
        <input hidden id="been" value="true"/>
        <input hidden id="showadd" value="false"/>
        {{--<input hidden id="userupdate" value="false"/>--}}


        {{--<user :ids="{{ $id }}" emails="{{ $email }}" fnames="{{ $fname }}" lnames="{{ $lname }}" avatars="{{ $avatar }}" titles="{{ $title }}" institutions="{{ $institution }}" biographys="{{ $biography }}"></user>--}}
        <user actions="/user/create" btntext="Create User" :allowinst="false" institutions="{{ $institution }}" ></user>

    </div>
@endsection