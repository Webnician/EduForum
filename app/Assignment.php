<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    public static function get_assignments_by_class($id)
    {
        $assignements = Assignment::with('course_id'. $id);
        return $assignements;
    }

    public static function add_assignment_to_class()
    {

    }
}
