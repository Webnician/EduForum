@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">User Listing<span style="float: right"> <a class="btn-info" style="display: block;margin-left: auto;margin-right: auto; text-align: center" href="{{ route('usercreator') }}">Create New User</a></span> </div>

                    <div class="panel-body">

                        @permission('create.admin|create.instadmin')


                        {{--<div>Eduforum Admins</div>--}}
                        @endpermission
                        <div style="text-align: center; border-bottom: 2px ridge grey" class="row">
                            <div class="col-lg-1">ID</div>
                            <div class="col-lg-3">First Name</div>
                            <div class="col-lg-3">Last Name</div>
                            <div class="col-lg-3">Email</div>
                            <div class="col-lg-2"></div>
                        </div>
                        @foreach($users as $user)

                            <div style="text-align: center" class="row">
                                <div class="col-lg-1">{{ $user['id'] }}</div>
                                <div class="col-lg-3">{{ $user['fname'] }} </div>
                                <div class="col-lg-3">{{ $user['lname'] }}</div>
                                <div class="col-lg-3">{{ $user['email'] }}</div>
                                <div class="col-lg-2"><a class="btn-primary" href="{{ route('userprofileeditor', $user['id']) }}">Edit User</a></div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>

        {{--<example></example>--}}


    </div>
@endsection