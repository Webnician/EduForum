<?php

namespace App\Http\Controllers;

use App\CourseJoinRequests;
use App\UserCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CourseRequestController extends Controller
{
    public function submitNewRequest()
    {
        if(Auth::check()) {

            $user = Auth::user();

            $input = Input::get();
//            dd($input);
            CourseJoinRequests::add_new_course_join_request($input);
            return redirect()->back();
        }
    }

    public function updateRequest()
    {
        if(Auth::check())
        {
            $user = Auth::user();

            $input = Input::get();

            if($input['newstatus'] == 'accepted') {
                CourseJoinRequests::update_course_join_request_status($input['request_id'],'accepted');
                UserCourse::add_user_to_course($input['user'], $input['course_id']);
                return redirect()->back();
            }
            if($input['newstatus'] == 'denied')
            {
                CourseJoinRequests::update_course_join_request_status($input['request_id'],'denied');
                return redirect()->back();
            }
            else {
                return redirect()->back();
            }
        }
    }

}
