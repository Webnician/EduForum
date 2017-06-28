<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use App\ScheduleItems;
use Illuminate\Support\Facades\Input;


class ScheduleItemController extends Controller
{
    public function addScheduleItem()
    {
        if(Auth::check()) {
            $user = Auth::user();
            $input = Input::get();




        }
    }

    public function ScheduleItemOperations()
    {

        if(Auth::check()) {
            $user = Auth::user();
            $input = Input::get();
            if($input['actions'] == 'update')
            {
//                dd($input);
                $id = $input['itemid'];
                ScheduleItems::update_schedule_item($id, $input);
                return redirect()->back();
            }
            if($input['actions'] == 'delete')
            {
                $item = ScheduleItems::get_item_by_id($input['itemid']);
                ScheduleItems::delete_item_with_id($item->id);
                return redirect()->back();

            }
            if($input['actions'] == 'insert')
            {

//                dd($input);
                ScheduleItems::create_new_schedule_item($input);
                return redirect()->back();
            }




        }
    }
}
