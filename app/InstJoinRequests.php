<?php

namespace App;

use App\models\User;
use Illuminate\Database\Eloquent\Model;
use App\UserInst;


class InstJoinRequests extends Model
{
    public static function get_join_requests_by_user_id($id)
    {
        $requests = InstJoinRequests::where('user_id', $id)->get();
        return $requests;
    }



    public static function get_join_requests_by_inst_id($id)
    {
        $joinrequests = InstJoinRequests::where('institution_id', $id)->get();

        $iterator = 0;
        foreach($joinrequests as $request)
        {
            $joinrequests[$iterator]['theuser'] = User::get_user_by_id($request['user_id']);
            $iterator++;
        }
        return $joinrequests;

    }

    public static function add_new_join_request($data)
    {
        $theRequest = new InstJoinRequests();
        $theRequest->user_id        = $data['user'];
        $theRequest->institution_id = $data['institution'];
        $theRequest->request_status = 'pending';
        $theRequest->save();
    }


    public static function update_join_request($new_status, $request)
    {

        $the_request = InstJoinRequests::find($request);
        $the_request->request_status = $new_status;
        $the_request->save();
        if ($new_status == 'accepted')
        {
            $the_requests = self::get_join_requests_by_user_id($the_request['user_id']);
//            dd($the_request);
            foreach ($the_requests as $req)
            {
                if($req['id'] != $the_request['id'])
                {
                    $req->delete();
                }
            }
            $user_inst = new UserInst();
            $user_inst->institution_id  = $the_request['institution_id'];
            $user_inst->user_id         = $the_request['user_id'];
            $user_inst->save();

        }
        if ($new_status == 'denied')
        {
            $user_inst = UserInst::where('user_id', $the_request['user_id']);
            $user_inst->delete();
        }
    }
}
