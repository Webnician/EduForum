@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($institution) }}--}}

        @if( empty($user_admin))
            <userlist :userlist="{{ $users}}" :inst="{{ $institution }}"></userlist>
        @else
            <userlist :userlist="{{ $users}}" :persadmins="{{ $user_admin }}" :inst="{{ $institution }}"></userlist>
        @endif
    </div>
@endsection