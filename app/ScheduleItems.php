<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleItems extends Model
{
    public static function get_item_by_id($id)
    {
        $item = ScheduleItems::find($id);
        return $item;
    }

    public static function delete_item_with_id($id)
    {
        $item = ScheduleItems::find($id);
        $item->delete();
    }

    public static function create_new_schedule_item($input)
    {
        $item = new ScheduleItems();

        $item->user_id          = $input['userid'];
        $item->course_id        = $input['courseid'];
        $item->type             = $input['type'];
        $item->location         = $input['location'];
        $item->description      = $input['description'];
        $item->event_date_time  = $input['starttime'];
        $item->event_end_time   = $input['endtime'];
        $item->save();
    }

    public static function update_schedule_item($id, $input)
    {
        $item                   = ScheduleItems::find($id);
        $item->user_id          = $input['userid'];
        $item->course_id        = $input['courseid'];
        $item->type             = $input['type'];
        $item->location         = $input['location'];
        $item->description      = $input['description'];
        $item->event_date_time  = $input['starttime'];
        $item->event_end_time   = $input['endtime'];
        $item->save();
    }

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
