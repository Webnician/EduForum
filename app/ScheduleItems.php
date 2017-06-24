<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleItems extends Model
{
    //
    public static function get_schedule_items_for_user($user)
    {
        $schedule_items = ScheduleItems::where('user_id', $user['id'])->orWhere('institution_id', $user['institution'])->get();
        return $schedule_items;
    }

    public static function get_schedule_items_for_course($course_id)
    {
//        $schedule_items = ScheduleItems::where('user_id', $user_id)->orWhere('course_id', $course_id);
                $schedule_items = ScheduleItems::where('course_id', $course_id)->get();

        return $schedule_items;
    }

    public static function get_schedule_items_for_institution($user_id, $inst_id)
    {

    }


}
