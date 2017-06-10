@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($courses) }}--}}
        @if( !empty($course))
            {{--{{ dd($course) }}--}}
            <register :coursea = "{{ $course }}" :studentlista="{{ $studentlist }}" :addusertocoursea="true"></register>
        @endif
        @if( !empty($student))
            {{--{{ dd($student) }}--}}
            <register :studenta="{{ $student }}" :courselista="{{ $courselist }}" :addcoursetousera="true"></register>
        @endif
    </div>
@endsection