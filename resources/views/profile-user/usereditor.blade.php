@extends('layouts.app')

@section('content')

    <div class="container">
        <input hidden id="been" value="true"/>
        <input hidden id="showadd" value="true"/>

       <user :ids="{{ $id }}" btntext="Update User" :allowinst="true" actions="/user/update" emails="{{ $email }}" fnames="{{ $fname }}" lnames="{{ $lname }}" avatars="{{ $avatar }}" titles="{{ $title }}" institutions="{{ $institution }}" biographys="{{ $biography }}"></user>


    </div>
@endsection