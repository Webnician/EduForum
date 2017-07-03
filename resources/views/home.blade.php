@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>
                        <div class="panel-body">
                            <h3>Welcome to your EduForum, {{ Auth::user()->fname }} !!</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row homeDivRoot">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="row">
                        {{--{{ dd($regcourses) }}--}}

                        <vmenu :courses = "{{ $regcourses }}" :taughtcourses="{{$taughtcourses}}"></vmenu>
                    </div>
                    <div class="row">
                        <contact :user_contacts="{{ $user_contacts }}" :theuser = "{{ $user }}"></contact>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="row">
                        <schedule :schedule = "{{ $schedule_items }}" :theuser = "{{ $user }}"></schedule>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="row">
                        <calendar></calendar>
                    </div>
                </div>
            </div>

        </div>
    </div>




</div>
@endsection


