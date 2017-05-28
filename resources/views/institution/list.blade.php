@extends('layouts.app')

@section('content')

    <div class="container">
        {{--{{ dd($institutions) }}--}}
<institutions :institutionlist="{{ $institutions }}"></institutions>


    </div>
@endsection