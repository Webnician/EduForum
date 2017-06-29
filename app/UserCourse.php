<?php

namespace App;

use App\models\User;
use Illuminate\Database\Eloquent\Model;
use App\Course;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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

    public static function get_user_objects_by_course($id)
    {
        $user_collect = [];
        $usercourses = UserCourse::where('course_id', $id)->get();
        $iterator = 0;
        foreach ($usercourses as $courses)
        {
            $user_collect[$iterator] = User::get_user_by_id($courses['user_id']);
        }
        return $user_collect;
    }

    public static function get_associated_contacts_by_id($id)
    {
        $courses = self::get_courses_by_user($id);
        $courses2 = Course::get_courses_by_teacher($id);

        $userarray = [];
        $iterator = 0;
        $user = Auth::user();

        foreach ($courses as $course)
        {
            $users = self::get_user_objects_by_course($course['course_id']);

            $teacher = Course::get_teacher_by_course($course['course_id']);

            $userarray[$course['course_name']] = $users;
            $userarray[$course['course_name']]['instructor'] = $teacher;
        }
        foreach ($courses2 as $course)
        {
            $users = self::get_users_by_course($course['id']);
            $userarray[$course['course_name']] = $users;
        }
        return $userarray;
    }
}
