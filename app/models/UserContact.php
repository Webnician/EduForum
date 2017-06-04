<?php

namespace App\models;

use App\Contact;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class UserContact extends Model
{

    public static function get_contact_by_user_id($id)
    {
//        $contact = UserContact::find($id);
        $contact = UserContact::where('user_id', $id)->first();
        return $contact;
    }
}
