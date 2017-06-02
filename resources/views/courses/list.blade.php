@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($courses) }}--}}
        <courses :courselist="{{ $courses}}"></courses>


    </div>
@endsection