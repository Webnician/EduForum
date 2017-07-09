<?php

namespace App;

use App\models\User;
use Illuminate\Database\Eloquent\Model;

class CourseJoinRequests extends Model
{
    public static function get_course_join_requests_by_user_id($id)
    {
        $requests = CourseJoinRequests::where('user_id', $id)->get();
        return $requests;
    }



    public static function get_course_join_requests_by_course_id($id)
    {
        $joinrequests = CourseJoinRequests::where('course_id', $id)->get();

        $iterator = 0;
        foreach($joinrequests as $request)
        {
            $joinrequests[$iterator]['theuser'] = User::get_user_by_id($request['user_id']);
            $iterator++;
        }
        return $joinrequests;

    }

    public static function get_course_join_request_by_id($id)
    {
        $course_request = CourseJoinRequests::find($id);
        return $course_request;
    }

    public static function add_new_course_join_request($data)
    {
        $theRequest = new CourseJoinRequests();
        $theRequest->user_id        = $data['user'];
        $theRequest->course_id = $data['course'];
        $theRequest->request_status = 'pending';
        $theRequest->save();
    }

    public static function update_course_join_request_status($id, $new_status)
    {
        $the_request = CourseJoinRequests::find($id);
        $the_request->request_status = $new_status;
        $the_request->save();
    }
}
