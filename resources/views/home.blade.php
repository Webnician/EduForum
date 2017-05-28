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
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="row">
                        <vmenu></vmenu>
                    </div>
                    <div class="row">
                        <contact></contact>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="row">
                        <schedule></schedule>
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


