@extends('layouts.app')

@section('content')


    <joincourse :coursesa="{{ $courses }}" :inst="{{ $institution }}" :usera="{{ $user }}" joinrequests="{{ $joinrequests }}"></joincourse>
@endsection