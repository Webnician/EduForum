@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($courses) }}--}}
        <userlist :userlist="{{ $users}}"></userlist>


    </div>
@endsection