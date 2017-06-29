<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public static function get_profile_by_id($id)
    {
        $contact = Contact::find($id);
        return $contact;
    }


}
