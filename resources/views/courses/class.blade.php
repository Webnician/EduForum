@extends('layouts.app')

@section('content')

    <div class="container">

        <class :students = "{{ $students }}" :teacher = "{{ $teacher }}" :course = "{{ $course }}" :blocks = "{{ $blocks }}"
               :user=" {{ $user }}" :adminuser="{{ $course['admin'] }}" :schedule ="{{ $schedule }}" :files="{{ $files }}"
                :assign="{{ $assignments }}" :a_student="{{ $course['is_student'] }}"
        ></class>

    </div>

@endsection