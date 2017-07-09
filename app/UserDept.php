<?php

namespace App;

use App\models\User;
use Illuminate\Database\Eloquent\Model;

class UserDept extends Model
{
    public static function get_users_by_dept_id($id)
    {
        $users = UserDept::where('department_id', $id)->get();
        return $users;
    }

    public static function get_user_objects_by_dept_id($id)
    {
        $user_ids = UserDept::where('department_id', $id)->get();
        $users = [];
        $iterator = 0;

        foreach ( $user_ids as $ids)
        {
            $users[$iterator] = User::get_user_by_id($ids['user_id']);
            $users[$iterator]['dept_record'] = $user_ids[$iterator];
            $iterator++;
        }
        $users = collect($users);
        return $users;
    }
}
