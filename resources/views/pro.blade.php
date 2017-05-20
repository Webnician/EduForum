@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User Profile test</div>

                    <div class="panel-body">
                        You are logged in!
                        {{ $id }}
                        {{ $email }}

                    </div>
                </div>
            </div>
        </div>

        <example></example>


    </div>
@endsection