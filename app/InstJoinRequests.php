<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstJoinRequests extends Model
{
    public static function get_join_requests_by_user_id($id)
    {
        $requests = InstJoinRequests::where('user_id', $id)->get();
        return $requests;
    }



    public static function get_join_requests_by_inst_id($id)
    {

    }

    public static function add_new_join_request($data)
    {
        $theRequest = new InstJoinRequests();
        $theRequest->user_id        = $data['user'];
        $theRequest->institution_id = $data['institution'];
        $theRequest->request_status = 'pending';
        $theRequest->save();
    }
}
