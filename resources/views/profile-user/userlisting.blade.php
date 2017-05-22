@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User List View</div>

                    <div class="panel-body">
                        this will be the list of users based off of institution
                        @permission('create.admin|create.instadmin')
                        <div>Eduforum Admins</div>
                        @endpermission
                        <div>Inst Admins</div>
                        <div>Instructors</div>
                        <div>Students</div>
{{ $inst }}

                    </div>
                </div>
            </div>
        </div>

        <example></example>


    </div>
@endsection