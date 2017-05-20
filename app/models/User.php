<?php

namespace App\models;

use Kodeine\Acl\Traits\HasRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends  Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Notifiable, Authenticatable, CanResetPassword, HasRole;


    public function getCurrentUserId()
    {
        return get_current_user()->id;
    }
    public function getCurrentUserRoles()
    {
        return Auth::user()->getRoles();
    }

    public function canViewProifle($role)
    {

//       $admin = $user->getCurrentUserRoles();
//        $admin = $user->hasRole('administrator');
//        return Auth::user()->is($role);
        return Auth::user()->isRole('superadmin');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}
