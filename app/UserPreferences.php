<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPreferences extends Model
{
    public static function getClassPrefsByUser($id)
    {
        $prefs = UserPreferences::where('user_id', $id)->get();
        return $prefs;
    }
}
