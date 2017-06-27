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
                dd($input);
            }
            if($input['actions'] == 'delete')
            {

                dd($input);
            }
            if($input['actions'] == 'insert')
            {

                dd($input);
            }




        }
    }
}
