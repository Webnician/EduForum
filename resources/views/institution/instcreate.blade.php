@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($institutions) }}--}}
        <institution buttxt="Create Institution" :viewer="false" operation="insert" actions="/institution/insert" :toedit="false" :creator="true" institutionid="{{ $institutions['id'] }}" institutiondescription="{{ $institutions['description'] }}" institutionlogo="{{ $institutions['logo'] }}" institutionname="{{ $institutions['institution_name'] }}" institutionwebsite="{{ $institutions['website'] }}" institutionipedsid="{{ $institutions['ipeds_id'] }}" institutionsystem="{{ $institutions['system_id'] }}" adminfname="{{ $institutions['adminfname'] }}" adminlname="{{ $institutions['adminlname'] }}" adminid="{{ $institutions['adminid'] }}"></institution>
    </div>
@endsection