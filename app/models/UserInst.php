<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Institution;

class UserInst extends Model
{
    public static function getUserInstitutionByUserId($user_id)
    {
        $userinst = UserInst::where('user_id', $user_id)->first();
        $institution = Institution::get_institution($userinst['institution_id']);
        return $institution;
    }
}
