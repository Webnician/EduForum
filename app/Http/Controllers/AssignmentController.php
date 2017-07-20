<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mews\Purifier\Purifier;

class AssignmentController extends Controller
{

    public function assignmentInput($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            $teacher = Course::get_teacher_by_course($id);
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin') || $user->hasRole('contadmin') || $teacher['id'] == $user['id'])
            {

                $course = Course::get_course($id);
                return view('/assignments.assignment')
                    ->with('thecourse', $course)
                    ->with('theuser', $user);
            }
        }
    }

    public function insertAssignment()
    {

        if(Auth::check()) {
            $user = Auth::user();
            $input = Input::get();
            $content = $input['assigncont'];
            $teacher = Course::get_teacher_by_course($input['course_id']);

            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin') || $user->hasRole('contadmin') || $teacher['id'] == $user['id'])
            {
                Assignment::add_assignment_to_class($input, $content);
                return redirect()->back();
            }
            else{
                return redirect('home');
            }
        }
        else{
            return redirect('home');
        }
    }
}
