<?php

namespace App\Http\Controllers;

use App\models\UserContact;
use App\ScheduleItems;
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
        $registeredcourses  = UserCourse::get_courses_by_user($user['id']);
        $taughtcourses      = Course::get_courses_by_teacher($user['id']);
        $schedule_items     = ScheduleItems::get_schedule_items_for_user($user);
        $iterator = 0;
        foreach ($registeredcourses as $course)
        {
            $course = Course::get_course($course['course_id']);
            $registeredcourses[$iterator]['title'] = $course['course_name'];
            $iterator++;
        }
        return view('home')->with('user', $user)->with('regcourses', $registeredcourses)->with('taughtcourses', $taughtcourses)->with('schedule_items', $schedule_items);
    }
}
