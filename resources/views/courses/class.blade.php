@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($blocks) }}--}}
        <class :students = "{{ $students }}" :teacher = "{{ $teacher }}" :course = "{{ $course }}" :blocks = "{{ $blocks }}"></class>

    </div>

@endsection