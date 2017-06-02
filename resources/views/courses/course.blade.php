@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($course) }}--}}
        <course buttxt = "{{ $course['buttxt'] }}" operation = "{{ $course['operation'] }}" actions = "{{ $course['actions'] }}"
        :editmode = "{{ $course['editmode'] }}" :viewer = "{{ $course['viewer'] }}" :toedit = "{{ $course['toedit'] }}" :creator = "{{ $course['creator'] }}"
        id = "{{ $course['id'] }}" course_name = "{{ $course['course_name'] }}" teacher_id="{{ $course['teacher_id'] }}" teacherfname = "{{ $course['teacherfname'] }}"
        teacherlname = "{{ $course['teacherlname'] }}" score = " {{ $course['score'] }}" department_id = " {{ $course['department_id'] }}"
        ></course>
        {{--<institution buttxt="Edit Institution" operation="" actions="" :toedit="false" :creator="false" :viewer="true" institutionid="{{ $institutions['id'] }}" institutiondescription="{{ $institutions['description'] }}" institutionlogo="{{ $institutions['logo'] }}" institutionname="{{ $institutions['institution_name'] }}" institutionwebsite="{{ $institutions['website'] }}" institutionipedsid="{{ $institutions['ipeds_id'] }}" institutionsystem="{{ $institutions['system_id'] }}" adminfname="{{ $institutions['adminfname'] }}" adminlname="{{ $institutions['adminlname'] }}" adminid="{{ $institutions['adminid'] }}"></institution>--}}
    </div>
@endsection