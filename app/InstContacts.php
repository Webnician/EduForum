<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InstContacts extends Model
{
    public static function getInstitutionContactByInstId($id)
    {

        $contact = InstContacts::where('institution_id', $id)->get();
//        dd($contact);
        return $contact;
    }
}
