@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($institutions) }}--}}
        <institution :editmode="false" buttxt="Create Institution" :viewer="false" operation="insert" actions="/institution/insert" :toedit="true" :creator="true"></institution>
    </div>
@endsection