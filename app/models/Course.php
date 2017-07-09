<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserCourse;
use App\models\User;

class Course extends Model
{
    public static function get_all_courses()
    {
        $courses = Course::all();
        return $courses;
    }

    public static function get_courses_by_institution($id)
    {
        $courses = Course::where('institution_id', $id)->get();
        return $courses;
    }

    public static function get_course($id)
    {
        $course = Course::find($id);
        return $course;
    }

    public static function get_courses_by_teacher($id)
    {
        $courses = Course::where('teacher_id', $id)->get();
        return $courses;
    }

    public static function get_teacher_by_course($id)
    {
        $course = Course::where('id', $id)->get();
//        dd($course);
        $teacher_id = $course[0]->teacher_id;
        $teacher = User::get_user_by_id($teacher_id);
        return $teacher;
    }





    protected $fillable = [
        'course_name', 'teacher_id', 'department_id', 'description', 'course_start_date', 'course_end_date'
    ];
}
