<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Kodeine\Acl\Traits\HasRole;
use App\Institution;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function viewCourses()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin'))
            {
                $courses = Course::get_all_courses();
                $courses = $courses->toJson();
//                dd($institutions);
                return view('/courses/list')->with('courses', $courses);
            }
            else
            {
                return view('home');
            }
        }
        else
        {
            return view('home');
        }
    }

    public function viewSingleCourse($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
            {
                $course                  = Course::get_course($id);
                $teacher                 = User::get_user_by_id($course['teacher_id']);
                $course['teacherfname']  = $teacher['fname'];
                $course['teacherlname']  = $teacher['lname'];
                $course['teacherid']     = $teacher['id'];
                $course['editmode']      = "false";
                $course['buttxt']        = "Edit Course";
                $course['viewer']        = "true";
                $course['operation']     = "";
                $course['actions']       = "";
                $course['toedit']        = "false";
                $course['creator']       = "false";
//                dd($institution);
                return view('/courses/course')->with('course', $course);
            }
            else
            {
                return view('home');
            }
        }
        else
        {
            return view('home');
        }
    }

    public function createCourse()
    {

    }

    public function editCourse($id)
    {

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
