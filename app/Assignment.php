<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Purifier;

class Assignment extends Model
{
    public static function get_assignments_by_class($id)
    {
        $assignments = Assignment::where('course_id', $id)->get();
        return $assignments;
    }

    public static function get_assignment_by_id($id)
    {
        $assignment  = Assignment::find($id);
        return $assignment;
    }

    public static function add_assignment_to_class($input, $content)
    {
//        dd($input);
        $assignment                         = new Assignment();
        $assignment->assigner_user_id       = $input['user_id'];
        $assignment->course_id              = $input['course_id'];
        $assignment->assignment_name        = $input['assignname'];
        $assignment->assignment_type        = $input['assigntype'];
        $assignment->assignment_description = $input['assigndesc'];
        $assignment->assignment_open_date   = $input['open_date'];
        $assignment->assignment_due_date    = $input['end_date'];
        $assignment->assignment_content     = $content;
        $assignment->save();
    }

    public static function update_assignment($input, $content)
    {
        $assignment                         = self::get_assignment_by_id($input['assignment_id']);
        $assignment->course_id              = $input['course_id'];
        $assignment->assignment_name        = $input['assignname'];
        $assignment->assignment_description = $input['assigndesc'];
        $assignment->assignment_open_date   = $input['open_date'];
        $assignment->assignment_due_date    = $input['end_date'];
        $assignment->assignment_content     = $content;
        $assignment->save();
    }

    public static function delete_assignment($input)
    {
        $assignemnt = self::get_assignment_by_id($input['assignment_id']);
        $assignemnt->delete();
    }
}
