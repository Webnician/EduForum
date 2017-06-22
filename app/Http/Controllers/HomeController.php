<?php

namespace App\Http\Controllers;

use App\models\UserContact;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use App\UserCourse;
use App\Course;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $courses = UserCourse::get_courses_by_user($user['id']);
        $iterator = 0;
        foreach ($courses as $course)
        {
            $course = Course::get_course($course['course_id']);
            $courses[$iterator]['title'] = $course['course_name'];
            $iterator++;
        }
        return view('home')->with('user', $user)->with('courses', $courses);
    }
}
