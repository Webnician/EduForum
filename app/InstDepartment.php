<?php

namespace App;

use App\models\User;
use Illuminate\Database\Eloquent\Model;

class InstDepartment extends Model
{

    public static function get_departments_by_inst_id($id)
    {
        $departments = InstDepartment::where('institution_id', $id)->get();
        return $departments;

    }

    public static function get_departments_by_inst_id_with_faculty($id)
    {
        $departments = InstDepartment::where('institution_id', $id)->get();
        $iterator = 0;
        foreach ($departments as $department)
        {
            $users                              = UserDept::get_user_objects_by_dept_id($department['id']);
            $departments[$iterator]['users']    = $users;
            $dept_head                          = User::get_user_by_id($department['dept_head_id']);
            $departments[$iterator]['head']     = $dept_head;
            $iterator++;
        }
        return $departments;
    }

    public static function get_all_departments()
    {
        $departments = InstDepartment::all();
        return $departments;
    }

    public static function get_all_departments_with_faculty()
    {
        $departments = InstDepartment::all();
        $iterator = 0;
        foreach ($departments as $department)
        {
            $users = UserDept::get_users_by_dept_id($department['id']);
            $departments[$iterator]['users'] = $users;
            $iterator++;
        }
        return $departments;
    }

    public static function add_department($input)
    {
//        dd($input);
        $department                     = new InstDepartment;
        $department->institution_id     = $input['institution_id'];
        $department->department_name    = $input['dept_name'];
        $department->dept_head_id       = $input['dept_head_id'];
        $department->save();
    }

    public static function remove_department($input)
    {
        $department = InstDepartment::find($input['department_id']);
        $department->delete();
    }

    public static function update_department($input)
    {
        $department                     = InstDepartment::find($input['department_id']);
        $department->institution_id     = $input['institution_id'];
        $department->department_name    = $input['dept_name'];
        $department->dept_head_id       = $input['dept_head_id'];
        $department->save();
    }

    public static function update_department_faculty($input)
    {
        if($input['action'] == 'delete')
        {
            $user_dept = UserDept::find('id', $input['user_dept_id']);
            $user_dept->delete();
        }
        if($input['action'] == 'insert')
        {
            $user_dept = new UserDept();
            $user_dept->user_id = $input['user_id'];
            $user_dept->department_id = $input['dept_id'];
            $user_dept->save();

        }
    }

}
