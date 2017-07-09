@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($course) }}--}}
        <course buttxt = "{{ $course['buttxt'] }}" operation = "{{ $course['operation'] }}" actions = "{{ $course['actions'] }}"
        :editmode = "{{ $course['editmode'] }}" :viewer = "{{ $course['viewer'] }}" :toedit = "{{ $course['toedit'] }}" :creator = "{{ $course['creator'] }}"
        ids = "{{ $course['id'] }}" course_name = "{{ $course['course_name'] }}" start_date="{{ $course['course_start_date'] }}" end_date="{{ $course['course_end_date'] }}" teacher_id="{{ $course['teacher_id'] }}" teacherfname = "{{ $course['teacherfname'] }}"
        teacherlname = "{{ $course['teacherlname'] }}" score = " {{ $course['score'] }}" department_id = " {{ $course['department_id'] }}" desc=" {{ $course['description'] }}"
        :inst = "{{ $course['institution_id'] }}" :editinst = "{{ $course['editinst'] }}"
        ></course>

        @if( $course['allowuser'] == "true")
        <courseuser :studentlist = "{{ $students }}" :course= " {{ $course['id'] }}" :join_requests="{{ $join_requests }}"></courseuser>
        @endif
        {{--<institution buttxt="Edit Institution" operation="" actions="" :toedit="false" :creator="false" :viewer="true" institutionid="{{ $institutions['id'] }}" institutiondescription="{{ $institutions['description'] }}" institutionlogo="{{ $institutions['logo'] }}" institutionname="{{ $institutions['institution_name'] }}" institutionwebsite="{{ $institutions['website'] }}" institutionipedsid="{{ $institutions['ipeds_id'] }}" institutionsystem="{{ $institutions['system_id'] }}" adminfname="{{ $institutions['adminfname'] }}" adminlname="{{ $institutions['adminlname'] }}" adminid="{{ $institutions['adminid'] }}"></institution>--}}
    </div>
@endsection