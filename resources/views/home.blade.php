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

                            <div style="font-size: 140%" class="col-md-6 col-lg-6 col-sm-12">
                                Welcome to your EduForum, {{ Auth::user()->fname }} !!
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                @if(empty($user_institution))
                                    <a style="color: #E07A5F" class="empty-notif-link" href="{{ route('join-institution') }}">Join School to Begin!</a>
                                @else
                                    <a style="font-size: 120%" href=" {{$user_institution['website'] }}">{{ $user_institution['institution_name'] }}</a>  <img style="float: right" src="{{ $user_institution['logo'] }}" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row homeDivRoot">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="row">
                        {{--{{ dd($regcourses) }}--}}
                        @if(!empty($regcourses) || !empty($taughtcourses))
                        <vmenu :courses = "{{ $regcourses }}" :taughtcourses="{{$taughtcourses}}"></vmenu>
                        @else
                            <vmenu></vmenu>
                        @endif
                    </div>
                    <div class="row">
                        @if(!empty($user_contacts))
                        <contact :user_contacts="{{ $user_contacts }}" :theuser = "{{ $user }}"></contact>
                        @else
                        <contact></contact>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="row">
                        @if(!empty($schedule_items))
                        <schedule :schedule = "{{ $schedule_items }}" :theuser = "{{ $user }}"></schedule>
                        @else
                        <schedule></schedule>
                        @endif
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


