<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\InstJoinRequests;

class JoinRequestController extends Controller
{
  public function submitNewRequest()
  {
      if(Auth::check()) {

          $user = Auth::user();

          $input = Input::get();
          InstJoinRequests::add_new_join_request($input);
          return redirect()->back();
      }
  }

  public function updateRequest()
  {
      if(Auth::check())
      {
          $user = Auth::user();
          $input = Input::get();

          if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('persadmin') || $user->hasRole('instadmin'))
          {
              InstJoinRequests::update_join_request($input['newstatus'], $input['request_id']);
              return redirect()->back();
          }
      }
  }
}
