<?php

namespace App;

use App\models\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class UserPreferences extends Model
{
    public static function getClassPrefsByUser($id)
    {
        $prefs = UserPreferences::where('user_id', $id)->get();
        if ($prefs->isEmpty())
        {
            $now                     = Carbon::now()->format('Y-m-d H:i:s');
            $preferences             = new UserPreferences();
            $preferences->user_id    = $id;
            $preferences->created_at = $now;
            $preferences->save();
            $prefs = UserPreferences::where('user_id', $id)->get();
        }
        return $prefs;
    }
}
