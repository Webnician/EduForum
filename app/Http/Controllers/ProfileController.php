<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kodeine\Acl\Traits\HasRole;
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

        $user = Auth::user();
        if( $user->hasRole('superadmin') ||  $user->hasRole('admin')) {
            return view('/profile-user/role');
        }
        else{
            return view('home' );
        }
    }

    public function users()
    {
        if(Auth::check()) {
            $user = Auth::user();
            if ($user->can('create.admin', 'create.instadmin', 'create.instsubadmins', 'create.instructors', 'create.students', 'create.graders', 'create.observers', 'create.guests')) {
            return view('/profile-user/userlist');
            }
            if ($user->can('create.instsubadmins', 'create.instructors', 'create.students', 'create.graders', 'create.observers', 'create.guests')) {
               $id['inst'] = $user['institution'];

                $id = array_merge($id, (array)$user['institution']);
                                return view('/profile-user/userlisting', $id);
//                return redirect()->route('instusers');
            }
            else {
                return view('home');
            }
        }
        else
        {
            return redirect('/login');
        }

//        if( $user->hasRole('superadmin') ||  $user->hasRole('admin')) {
//            return view('/profile-user/users');
//        }
//        else{
//            return view('home' );
//        }
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
