@extends('layouts.app')

@section('content')

    <div class="container">
        <studassignmentlist :assignm="{{ $the_assign }}" :thecourse="{{ $thecourse }}" :theuser="{{ $theuser }}" :assign="{{ $assign }}"></studassignmentlist>
    </div>
@endsection