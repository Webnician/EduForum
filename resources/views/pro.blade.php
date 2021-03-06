@extends('layouts.app')

@section('content')

    <div class="container">
        <input hidden id="been" value="false"/>
        <input hidden id="showadd" value="true"/>

        <user :ids="{{ $id }}" btntext="Update User" :allowinst="false"  actions="/user/update" emails="{{ $email }}" fnames="{{ $fname }}" lnames="{{ $lname }}" avatars="{{ $avatar }}" titles="{{ $title }}" institutions="{{ $institution }}" biographys="{{ $biography }}"></user>
        <a class="btn-info" style="max-width:20%;display: block;margin-left: auto;margin-right: auto; text-align: center" href="{{ route('userprofileeditor', $id) }}">Edit User</a>

    </div>
@endsection