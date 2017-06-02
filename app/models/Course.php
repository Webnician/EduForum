<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    protected $fillable = [
        'course_name', 'teacher_id', 'department_id',
    ];
}
