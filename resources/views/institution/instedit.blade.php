@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($institutions) }}--}}
        <institution buttxt="Update Institution" :viewer="false" operation="update" actions="/institution/update" :toedit="true" :creator="false" institutionid="{{ $institutions['id'] }}" institutiondescription="{{ $institutions['description'] }}" institutionlogo="{{ $institutions['logo'] }}" institutionname="{{ $institutions['institution_name'] }}" institutionwebsite="{{ $institutions['website'] }}" institutionipedsid="{{ $institutions['ipeds_id'] }}" institutionsystem="{{ $institutions['system_id'] }}" adminfname="{{ $institutions['adminfname'] }}" adminlname="{{ $institutions['adminlname'] }}" adminid="{{ $institutions['adminid'] }}"></institution>
    </div>
@endsection