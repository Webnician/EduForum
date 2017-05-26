@extends('layouts.app')

@section('content')

    <div class="container">
        <input hidden id="been" value="true"/>
        <input hidden id="showadd" value="false"/>
        {{--<input hidden id="userupdate" value="false"/>--}}

        {{--@role('admin|moderator')--}}
        {{--// content allowed for admin's only--}}
        {{--@endrole--}}

         {{--@if(Auth::check() && Auth::user()->hasPermission('create.user|edit.user''))--}}


        {{--@else--}}

        {{--@endif--}}

            {{--<user :ids="{{ $id }}" emails="{{ $email }}" fnames="{{ $fname }}" lnames="{{ $lname }}" avatars="{{ $avatar }}" titles="{{ $title }}" institutions="{{ $institution }}" biographys="{{ $biography }}"></user>--}}
        <user actions="/user/create" btntext="Create User" :allowinst="{{ $args['allowinst'] }}" institutions="{{ $args['institution'] }}" ></user>

    </div>
@endsection