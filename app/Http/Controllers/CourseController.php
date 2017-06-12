<?php

namespace App\Http\Controllers;

use App\Course;
use App\UserCourse;
use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Kodeine\Acl\Traits\HasRole;
use App\Institution;
use Carbon\Carbon;

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
                $students                = UserCourse::get_users_by_course($id);


                $student2 = [];
                $counter = 0;
                foreach ($students as $student)
                {
                    $student2[$counter]['student']                    = User::get_user_by_id($student['user_id']);
                    $student2[$counter]['student']['user_course_id']  = $student['id'];
                    $student2[$counter]['student']['user_id']         = $student['user_id'];
                    $student2[$counter]['student']['course_id']       = $student['course_id'];
                    $counter++;
                }

                $student2 = \GuzzleHttp\json_encode($student2);
//                dd($student2);

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
                $course['allowuser']     = "true";
//                dd($institution);
                return view('/courses/course')->with('course', $course)->with('students', $student2);
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


    public function editCourse($id)
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
                $course['editmode']      = "true";
                $course['buttxt']        = "Update Course";
                $course['viewer']        = "false";
                $course['operation']     = "update";
                $course['actions']       = "/course/update";
                $course['toedit']        = "true";
                $course['creator']       = "false";
                $course['allowuser']     = "true";
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
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
            {
                $course                  = [];
                $course['id']            = NULL;
                $course['course_name']   = NULL;
                $course['teacherfname']  = NULL;
                $course['teacherlname']  = NULL;
                $course['teacher_id']    = NULL;
                $course['score']         = NULL;
                $course['department_id'] = NULL;
                $course['description']   = NULL;
                $course['course_start_date']   = NULL;
                $course['course_end_date']   = NULL;
                $course['editmode']      = "false";
                $course['buttxt']        = "Create Course";
                $course['viewer']        = "false";
                $course['operation']     = "insert";
                $course['actions']       = "/course/insert";
                $course['toedit']        = "true";
                $course['creator']       = "true";
                $course['allowuser']     = "false";
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

    public function updateCourse()
    {
        $input = Input::get();
//        dd($input);
        if($input['actions'] == 'delete')
        {
            $course_id    = $input['id'];
            $course       = Course::find($course_id);
            $course->delete();
            return redirect()->route('course-list');
        }
        if($input['actions'] == 'update')
        {
            $id                          = $input['id'];
            $name                        = $input['name'];
            $department_id               = $input['department_id'];
            $teacher_id                  = $input['teacherid'];
            $description                 = $input['description'];
            $start                       = $input['course_start'];
            $end                         = $input['course_end'];
            $start                       = Carbon::parse($start)->format('Y-m-d H:i:s');
            $end                         = Carbon::parse($end)->format('Y-m-d H:i:s');



            $the_course                     = Course::find($id);
            $the_course->course_name        = $name;
            $the_course->teacher_id         = $teacher_id;
            $the_course->department_id      = $department_id;
            $the_course->description        = $description;
            $the_course->course_start_date  = $start;
            $the_course->course_end_date    = $end;

            $the_course->save();
            return redirect()->route('course-list');
        }
        else
        {
            return view('home');
        }
    }

    public function insertCourse()
    {

        $input = Input::get();
//        dd($input);

        if($input['actions'] == 'insert')
        {
            $name                           = $input['name'];
            $department_id                  = $input['department_id'];
            $teacher_id                     = $input['teacherid'];
            $description                    = $input['description'];
            $start                       = $input['course_start'];
            $end                         = $input['course_end'];
            $start                       = Carbon::parse($start)->format('Y-m-d H:i:s');
            $end                         = Carbon::parse($end)->format('Y-m-d H:i:s');


            $the_course                     = new Course();
            $the_course->course_name        = $name;
            $the_course->teacher_id         = $teacher_id;
            $the_course->department_id      = $department_id;
            $the_course->description        = $description;
            $the_course->course_start_date  = $start;
            $the_course->course_end_date    = $end;

            $the_course->save();
            return redirect()->route('course-list');
        }
        else
        {
            return view('home');
        }
    }

    public function registrationDelete()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
            {
                $input          = Input::get();
                $id             = $input['id'];
                $registration   = UserCourse::find($id);
                $registration->delete();
                return redirect()->back();
//                dd($registration);
            }
        }
    }

    public function registrationUserCreate($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
            {
                $student = User::get_user_by_id($id);
                $courselist = Course::get_all_courses();
//                dd($student);
                return view('/courses/registration')->with('student', $student)->with('courselist', $courselist);
            }
        }
    }

    public function registrationCourseCreate($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
            {
               $course  = Course::get_course($id);
               $studentlist   = User::get_all_users();
//                dd($registration);
                return view('/courses/registration')->with('course', $course)->with('studentlist', $studentlist);
            }
        }
    }

    public function registrationInsert()
    {
        $input = Input::get();
//        dd($input);
        if($input['actions'] == 'course-insert') {
            $registration = new UserCourse();
            $registration->user_id = $input['usertocourse'];
            $registration->course_id = $input['course'];
            $registration->save();
            return redirect('/course/'.$input['course']);
        }
        if($input['actions'] == 'user-insert') {
            $registration = new UserCourse();
            $registration->course_id = $input['coursetouser'];
            $registration->user_id = $input['student'];
            $registration->save();
            return redirect('/user/'.$input['student']);
        }
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
