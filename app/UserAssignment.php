<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAssignment extends Model
{
    public static function insert_user_assignment($input)
    {
        $user_assignment = new UserAssignment();
        $user_assignment->user_id       = $input['user_id'];
        $user_assignment->assignment_id = $input['assignment_id'];
        $input['assigncont'] = \GuzzleHttp\json_encode($input['assigncont']);
        $user_assignment->submission    = $input['assigncont'];

        $user_assignment->save();
    }

    public static function get_user_assignments_by_assignment_id($id)
    {

        $assignments = self::where('assignment_id' , $id)->get();
        return $assignments;
    }
}
