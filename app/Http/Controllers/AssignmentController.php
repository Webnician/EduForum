<?php

namespace App\Http\Controllers;

use App\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AssignmentController extends Controller
{
    public function assignmentInput()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin') || $user->hasRole('contadmin'))
            {
                return view('/assignments.assignment');
            }

            $input = Input::get();
            dd($input);
        }
    }
}
