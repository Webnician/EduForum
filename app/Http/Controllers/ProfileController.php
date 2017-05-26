<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;
//use Kodeine\Acl\Traits\HasPermission;



class ProfileController extends Controller
{
    use HasRole;
//    , HasPermission;



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()) {
            $user = Auth::user();
            return redirect()->route('userprofile', $user['id']);
        }
        if(!Auth::check())
        {
            return redirect()->route('login');
        }

    }
    public function roles()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin'))
            {
                return view('/profile-user/role');
            }
            else
            {
                return view('home');
            }
        }
        else
        {
            return view('home');
        }
    }

    public function users()
    {
        if(Auth::check()) {
            $user = Auth::user();
            if($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin') || $user->hasRole('persadmin') || $user->hasRole('instructor'))
            {
                if ($user->hasRole('superadmin') || $user->hasRole('admin'))
                {
                  $users = User::all();
                }
                if ($user->hasRole('instadmin') || $user->hasRole('persadmin') || $user->hasRole('instructor'))
                {
                    $id = $user['institution'];
                    $users = User::where('institution', $id)->get();
                }
                $users = $users->toArray();
                return view('/profile-user/userlist')->with('users', $users);
            }
            else
            {
                return view('home');
            }
        }
        else
        {
            return redirect('/login');
        }

    }

    public function userUpdate()
    {

            $input = Input::get();
            if($input['actions'] == 'delete')
            {
                $user_id    = $input['id'];
                $user = User::find($user_id);
                $user->delete();
                return redirect()->route('users');
            }
            if($input['actions'] == 'update') {


//            $this->validate($input, [
//                  'actions' => 'required',
//                  'fname'   => 'required',
//                  'lname'   => 'required',
//            ]);
                $user_id    = $input['id'];
                $the_action = $input['actions'];
                $first_name = $input['fname'];
                $last_name = $input['lname'];
                $email_address = $input['email'];
                $title = $input['title'];
                $institution = $input['institution'];
                $avatar_source = $input['avatar'];
                $biography = $input['biography'];

                $the_user                = User::find($user_id);
                $the_user->fname         = $first_name;
                $the_user->lname         = $last_name;
                $the_user->email         = $email_address;
                $the_user->title         = $title;
                $the_user->institution   = $institution;
                $the_user->avatar        = $avatar_source;
                $the_user->biography     = $biography;
                $the_user->save();
                return redirect()->route('userprofile', $user_id);
        }

        else
        {
            return view('home');
        }
    }

    public function userCreateCont()
    {
        if(Auth::check()) {
            $user = Auth::user();
            if($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin') || $user->hasRole('persadmin') || $user->hasRole('instructor'))
            {
                if ($user->hasRole('superadmin') || $user->hasRole('admin'))
                {
                    return view('profile-user.user-creator')->with('institution', $user['institution']);;
                }
                if ($user->hasRole('instadmin') || $user->hasRole('persadmin') || $user->hasRole('instructor'))
                {
//                    dd($user);
                    return view('profile-user.user-creator')->with('institution', $user['institution']);
                }
            }
            else
            {
                return view('home');
            }
        }
        else
        {
            return redirect('/login');
        }

    }

    public function userCreate()
    {
        $input = Input::get();
        if($input['actions'] == 'update')
        {
            $user_id    = $input['id'];
            $the_action = $input['actions'];
            $first_name = $input['fname'];
            $last_name = $input['lname'];
            $email_address = $input['email'];
            $title = $input['title'];
            $institution = $input['institution'];
            $avatar_source = $input['avatar'];
            $biography = $input['biography'];

            $the_user                = new User();
            $the_user->password      = Hash::make('secret');
            $the_user->fname         = $first_name;
            $the_user->lname         = $last_name;
            $the_user->email         = $email_address;
            $the_user->title         = $title;
            $the_user->institution   = $institution;
            $the_user->avatar        = $avatar_source;
            $the_user->biography     = $biography;
            $the_user->save();
            return redirect()->route('users');
        }
        else
        {
            return view('home');
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
