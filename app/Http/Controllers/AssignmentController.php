<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Course;
use App\models\User;
use App\UserAssignment;
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

            $teacher = Course::get_teacher_by_course($input['course_id']);

            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin') || $user->hasRole('contadmin') || $teacher['id'] == $user['id'])
            {
                if($input['actions'] == 'insert')
                {
                    $content = $input['assigncont'];
                    Assignment::add_assignment_to_class($input, $content);
                    return redirect()->back();
                }
                if($input['actions'] == 'update')
                {
                    $content = $input['assigncont'];
                    Assignment::update_assignment($input, $content);
                    return redirect()->back();
                }
                if($input['actions'] == 'delete')
                {
                    Assignment::delete_assignment($input);
                    return redirect()->back();
                }
            }
            else
            {
                return redirect('home');
            }
        }
        else{
            return redirect('home');
        }
    }

    public function get_assignment($id)
    {
        $assignment = Assignment::get_assignment_by_id($id);
        return $assignment;
    }

    public function StudentAssignment()
    {
        if(Auth::check()) {
            $user = Auth::user();
            $input = Input::get();

            $assignment = self::get_assignment($input['assignment_id']);
            $course     = Course::get_course($input['course_id']);

            return view('/assignments.student-assignment')
                ->with('thecourse', $course)
                ->with('theuser', $user)
                ->with('assign', $assignment);

        }
        else{
            return redirect('home');
        }
    }

    public function StudentAssignmentInsert()
    {
        if(Auth::check()) {
            $user = Auth::user();
            $input = Input::get();

            UserAssignment::insert_user_assignment($input);

            return redirect('/class/'. $input['course_id']);
        }
        else{
            return redirect('home');
        }
    }

    public function StudentSubmissions()
    {
        if(Auth::check()) {
            $user = Auth::user();
            $input = Input::get();

//            dd($input);

            $course     = Course::get_course($input['course_id']);
            $course     = \GuzzleHttp\json_encode($course);

            $the_assign = $this->get_assignment($input['assignment_id']);

            $assignments = UserAssignment::get_user_assignments_by_assignment_id($input['assignment_id']);
            $iterator = 0;
            foreach ($assignments as $assignment)
            {
                $user = User::get_user_by_id($assignment['user_id']);
                $assignments[$iterator]['user'] = $user;
                $iterator ++;
            }
            $assignments = \GuzzleHttp\json_encode($assignments);

            return view('/assignments.student-assignment-list')
                ->with('thecourse', $course)
                ->with('theuser', $user)
                ->with('assign', $assignments)
                ->with('the_assign', $the_assign)
                ;
        }
        else{
            return redirect('home');
        }
    }
}
