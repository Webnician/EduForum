<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    public static function get_courses_by_user($id)
    {
        $courses = UserCourse::where('user_id', $id)->get();
        return $courses;
    }

    public static function get_users_by_course($id)
    {
        $users = UserCourse::where('course_id', $id)->get();
        return $users;
    }
}
