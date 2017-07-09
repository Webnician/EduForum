@extends('layouts.app')

@section('content')

    @if( !empty($institution))
        <instdepts :user="{{$user}}" :depts="{{ $departments }}" :inst="{{ $institution }}"></instdepts>
    @else
        <instdepts :user="{{$user}}" :depts="{{ $departments }}"></instdepts>
    @endif
@endsection