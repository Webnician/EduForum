<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Kodeine\Acl\Traits\HasRole;
use App\Institution;
use App\InstContacts;
use App\InstJoinRequests;
use Illuminate\Support\Facades\DB;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function allInstitutions()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin'))
            {
                $institutions = Institution::get_all_institutions();
                $institutions = $institutions->toJson();
//                dd($institutions);
                return view('/institution/list')->with('institutions', $institutions);
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

    public function singleInstitution($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
            {
                $institution = Institution::get_institution($id);
                $admin = User::get_user_by_id($institution['admin_id']);
                $institution['adminfname'] = $admin['fname'];
                $institution['adminlname'] = $admin['lname'];
                $institution['adminid'] = $admin['id'];
//                dd($institution);
                return view('/institution/institution')->with('institutions', $institution);
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

    public function editInstitution($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
            {
                $institution = Institution::get_institution($id);
                $admin = User::get_user_by_id($institution['admin_id']);
                $institution['adminfname'] = $admin['fname'];
                $institution['adminlname'] = $admin['lname'];
                $institution['adminid'] = $admin['id'];
//                dd($institution);
                return view('/institution/instedit')->with('institutions', $institution);
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

    public function createInstitution()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
            {
//                $institution = Institution::get_institution($id);
//                $admin = User::get_user_by_id($institution['admin_id']);
//                $institution['adminfname'] = $admin['fname'];
//                $institution['adminlname'] = $admin['lname'];
//                $institution['adminid'] = $admin['id'];
//                dd($institution);
                return view('/institution/instcreate');
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

    public function instUpdate()
    {
//        $input = Input::get();
//        dd($input);
        $input = Input::get();
//        dd($input);
        if($input['actions'] == 'delete')
        {
            $inst_id    = $input['id'];
            $inst       = Institution::find($inst_id);
            $inst->delete();
            return redirect()->route('institution-list');
        }
        if($input['actions'] == 'update')
        {
            $id          = $input['id'];
            $name        = $input['name'];
            $admin_id    = $input['adminid'];
            $logo        = $input['logo'];
            $website     = $input['website'];
            $system      = $input['system'];
            $ipeds       = $input['ipeds'];
            $description = $input['description'];

            $the_institution                          = Institution::find($id);
            $the_institution->institution_name        = $name;
            $the_institution->admin_id         = $admin_id;
            $the_institution->logo = $logo;
            $the_institution->website = $website;
            $the_institution->system_id = $system;
            $the_institution->ipeds_id = $ipeds;
            $the_institution->description     = $description;
            $the_institution->save();
            return redirect()->route('institution-list');
        }
        else
        {
            return view('home');
        }
    }

    public function instInsert()
    {
        $input = Input::get();
        if($input['actions'] == 'insert')
        {
//            $id          = $input['id'];
            $name        = $input['name'];
            $admin_id    = $input['adminid'];
            $logo        = $input['logo'];
            $website     = $input['website'];
            $system      = $input['system'];
            $ipeds       = $input['ipeds'];
            $description = $input['description'];

            $the_institution                          = new Institution();
            $the_institution->institution_name        = $name;
            $the_institution->admin_id                = $admin_id;
            $the_institution->logo                    = $logo;
            $the_institution->website                 = $website;
            $the_institution->system_id               = $system;
            $the_institution->ipeds_id                = $ipeds;
            $the_institution->description             = $description;
            $the_institution->save();
            return redirect()->route('institution-list');

        }
        else
        {
            return view('home');
        }
    }

    public function joinInstitution()
    {
        $user               = Auth::user();
        $institutions       = Institution::get_all_institutions();

        $join_requests      = InstJoinRequests::get_join_requests_by_user_id($user['id']);
        $iterator           = 0;

//        dd($join_requests);
        foreach ($institutions as $institution)
        {

            $contact            = InstContacts::getInstitutionContactByInstId($institution['id']);
            $institutions[$iterator]['contact_info'] = $contact;
            foreach ($join_requests as $request)
            {
                if($request['institution_id'] == $institution['id'])
                {
                    $institutions[$iterator]['request'] = $request;
                }
            }
            $iterator++;
        }

        return view('/institution/join-institution-list')->with('institutions', $institutions)->with('user', $user)
            ->with('join_requests', $join_requests);
    }

    public function viewInstitutionRequests($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();

            if ($user->hasRole('superadmin') || $user->hasRole('admin')) {
            $requests       = InstJoinRequests::get_join_requests_by_inst_id($id);
            $institution    = User::get_user_institution($user['id']);
            $institution    = collect($institution);
            return view('/institution/join-requests')->with('requests', $requests)->with('user', $user)->with('institution', $institution);
            }

            if ($user->hasRole('persadmin') || $user->hasRole('instadmin'))
            {
                $requests       = InstJoinRequests::get_join_requests_by_inst_id($id);
                $institution    = User::get_user_institution($user['id']);
                $institution    = collect($institution);
                return view('/institution/join-requests')->with('requests', $requests)->with('user', $user)->with('institution', $institution);
            }
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
