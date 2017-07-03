@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($blocks) }}--}}
        <class :students = "{{ $students }}" :teacher = "{{ $teacher }}" :course = "{{ $course }}" :blocks = "{{ $blocks }}"
               :user=" {{ $user }}" :adminuser="{{ $course['admin'] }}" :schedule ="{{ $schedule }}" :files="{{ $files }}"></class>

    </div>

@endsection