@extends('layouts.app')

@section('content')

    <div class="container">
<assignment :thecourse="{{ $thecourse }}" :theuser="{{ $theuser }}"></assignment>
    </div>
@endsection