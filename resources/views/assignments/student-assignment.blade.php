@extends('layouts.app')

@section('content')

    <div class="container">
        <studassignment :thecourse="{{ $thecourse }}" :theuser="{{ $theuser }}" :assign="{{ $assign }}"></studassignment>
    </div>
@endsection