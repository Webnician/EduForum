<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserCourse;

class Course extends Model
{
    public static function get_all_courses()
    {
        $courses = Course::all();
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



    protected $fillable = [
        'course_name', 'teacher_id', 'department_id', 'description', 'course_start_date', 'course_end_date'
    ];
}
