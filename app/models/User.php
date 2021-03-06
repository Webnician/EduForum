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
use App\UserInst;
use App\Institution;



class User extends  Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Notifiable, Authenticatable, CanResetPassword, HasRole;


    public function getCurrentUserId()
    {
        return get_current_user()->id;
    }
    public static function get_user_by_id($id)
    {
        $user = User::find($id);
        return $user;
    }

    public static function get_all_users()
    {
        $users = User::all();
        return $users;
    }

    public static function get_user_institution($id)
    {
        $user_institution   = UserInst::find($id);
        $institution        = Institution::get_institution($user_institution['institution_id']);
        return $institution;
    }

    public static function get_users_by_user_inst($user_id)
    {
        $user               = Auth::user();
        $user_institution   = UserInst::find($user_id);

        $userslist          = UserInst::where('institution_id', $user_institution['institution_id'])->get();

        $userarray = [];
        $iterator = 0;
        foreach ($userslist as $userobj)
        {
            $userarray[$iterator] = self::get_user_by_id($userobj['user_id']);
            $iterator++;
        }
        $theusers = collect($userarray);

        return $theusers;
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
        'fname', 'lname', 'email', 'password', 'title', 'institution', 'biography', 'avatar',
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
