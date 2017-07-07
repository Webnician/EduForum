@extends('layouts.app')

@section('content')

    {{--{{ dd($join_requests) }}--}}

    <joinrequests :user = "{{ $user }}" :joinrequests="{{ $requests }}" :inst="{{ $institution }}"></joinrequests>
@endsection