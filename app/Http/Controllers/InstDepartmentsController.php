<?php

namespace App\Http\Controllers;

use App\InstDepartment;
use App\Institution;
use App\UserInst;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class InstDepartmentsController extends Controller
{

    public function allDepartments()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin')) {
                if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
                    $departments = InstDepartment::get_all_departments_with_faculty();
                    return view('institution.inst-departments')
                        ->with('user', $user)
                        ->with('departments', $departments);
                }
                if ($user->hasRole('instadmin')) {
                    $institution = UserInst::getUserInstitutionByUserId($user['id']);
                    $departments = InstDepartment::get_departments_by_inst_id_with_faculty($institution['id']);
                    return view('institution.inst-departments')
                        ->with('user', $user)
                        ->with('institution', $institution)
                        ->with('departments', $departments);
                }



            }
            else{
                return redirect()->route('home');
            }




        }


    }

    public function departmentsUpdate()
    {
        $user = Auth::user();

        if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
        {
            $input = Input::get();

            if($input['action'] == 'insert')
            {
                InstDepartment::add_department($input);
                return redirect()->back();

            }
            if($input['action'] == 'delete')
            {
                InstDepartment::remove_department($input);
                return redirect()->back();
            }
            if($input['action'] == 'update')
            {

                InstDepartment::update_department($input);
                return redirect()->back();
            }

        }
    }

}
