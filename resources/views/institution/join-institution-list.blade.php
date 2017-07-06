@extends('layouts.app')

@section('content')

    {{--{{ dd($join_requests) }}--}}
    <joininstitution :user="{{ $user }}" :institutionlist="{{ $institutions }}" :joinrequests="{{ $join_requests }}"></joininstitution>
@endsection