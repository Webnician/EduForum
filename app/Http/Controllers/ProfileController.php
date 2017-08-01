<?php

namespace App\Http\Controllers;

//use App\Contact;
use App\Institution;
use App\models\UserContact;
//use App\models\Contact;
use App\models\User;
use App\UserCourse;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;
use function MongoDB\BSON\toJSON;

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
            return redirect()->route('single-user', $user['id']);
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


    public function viewUsers()
    {
        if(Auth::check())
        {

            $user = Auth::user();

            if ($user->hasRole('superadmin') || $user->hasRole('admin'))
            {
                $users          = User::get_all_users();
                $users          = $users->toJson();
                $institution    = User::get_user_institution($user['id']);
                $institution    = collect($institution);
                return view('/profile-user/user-list')
                    ->with('users', $users)
                      ->with('institution', $institution);
            }
            elseif ($user->hasRole('instadmin') || $user->hasRole('persadmin'))
            {
                $users          = User::get_users_by_user_inst($user['id']);
                $users          = $users->toJson();
                $persadmins     = true;
                $institution    = User::get_user_institution($user['id']);
                $institution    = collect($institution);
//                dd($institution);
                return view('/profile-user/user-list')->with('users', $users)->with('user_admin', $persadmins)->with('institution', $institution);
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

    public function viewSingleUser($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin') || $user['id'] == $id)
            {
                $user                   = User::get_user_by_id($id);
                $contact                = UserContact::get_contact_by_user_id($id);
                $courses                = UserCourse::get_courses_by_user($id);

                $course2 = [];
                $counter = 0;
                foreach ($courses as $course)
                {
                    $course2[$counter]['course']                    = Course::get_course($course['course_id']);
                    $course2[$counter]['course']['user_course_id']  = $course['id'];
                    $course2[$counter]['course']['user_id']         = $course['user_id'];
                    $course2[$counter]['course']['course_id']       = $course['course_id'];
                    $counter++;
                }

                $course2 = \GuzzleHttp\json_encode($course2);

//                dd($course2);
                $user['address']        = $contact['contact_address'];
                $user['city']           = $contact['contact_city'];
                $user['state']          = $contact['contact_state'];
                $user['zip']            = $contact['contact_zip'];
                $user['country']        = $contact['contact_country'];
                $user['phone']          = $contact['contact_phone'];
                $user['type']           = $contact['contact_type'];

                $user['editmode']       = "false";
                $user['buttxt']         = "Edit User";
                $user['viewer']         = "true";
                $user['operation']      = "";
                $user['actions']        = "";
                $user['toedit']         = "false";
                $user['creator']        = "false";
//                dd($contact);
                return view('/profile-user/user')->with('user', $user)->with('courses', $course2);
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

    public function editUser($id)
    {
        if(Auth::check())
        {
            $user = Auth::user();
            if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin') || $user-id == $id)
            {
                $user                   = User::get_user_by_id($id);
                $contact                = UserContact::get_contact_by_user_id($id);
                $user['address']        = $contact['contact_address'];
                $user['city']           = $contact['contact_city'];
                $user['state']          = $contact['contact_state'];
                $user['zip']            = $contact['contact_zip'];
                $user['country']        = $contact['contact_country'];
                $user['phone']          = $contact['contact_phone'];
                $user['type']           = $contact['contact_type'];

                $user['editmode']       = "true";
                $user['buttxt']         = "Update User";
                $user['viewer']         = "false";
                $user['operation']      = "/user/update";
                $user['actions']        = "update";
                $user['toedit']         = "true";
                $user['creator']        = "false";
//                dd($contact);
                return view('/profile-user/user')->with('user', $user);
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

    public function createUser()
    {
        $user = Auth::user();
        if ($user->hasRole('superadmin') || $user->hasRole('admin') || $user->hasRole('instadmin'))
        {
            $user                   = [];
            $user['id']             = NULL;
            $user['fname']          = NULL;
            $user['lname']          = NULL;
            $user['email']          = NULL;
            $user['title']          = NULL;
            $user['score']          = NULL;
            $user['institution']    = NULL;
            $user['biography']      = NULL;
            $user['avatar']         = NULL;
            $user['address']        = NULL;
            $user['city']           = NULL;
            $user['state']          = NULL;
            $user['zip']            = NULL;
            $user['country']        = NULL;
            $user['phone']          = NULL;
            $user['type']           = NULL;

            $user['editmode'] = "true";
            $user['buttxt'] = "Create User";
            $user['viewer'] = "false";
            $user['operation'] = "insert";
            $user['actions'] = "/user/insert";
            $user['toedit'] = "false";
            $user['creator'] = "true";

            return view('/profile-user/user')->with('user', $user);
        }
        else
        {
            return view('home');
        }
    }

    public function updateUser()
    {
        $input = Input::get();


        if($input['actions'] == 'delete')
        {
            $user_id    = $input['id'];
            $user = User::find($user_id);
            $user->delete();
            $contact  = UserContact::get_contact_by_user_id($user_id);
            $contact->delete();
            return redirect()->route('home'); //refactor this
        }
        if($input['actions'] == 'update')
        {
            $user_id                    = $input['id'];
            $the_action                 = $input['actions'];
            $first_name                 = $input['fname'];
            $last_name                  = $input['lname'];
            $email_address              = $input['email'];
            $title                      = $input['title'];
            $institution                = $input['institution'];
            $avatar_source              = $input['avatar'];
            $biography                  = $input['biography'];
            $address                    = $input['address'];
            $city                       = $input['city'];
            $state                      = $input['state'];
            $zip                        = $input['zip'];
            $country                    = $input['country'];
            $phone                      = $input['phone'];
            $type                       = $input['type'];

            $the_user                   = User::find($user_id);
            if(UserContact::get_contact_by_user_id($user_id)) {
                $the_contact = UserContact::get_contact_by_user_id($user_id);
            }
            else{
                $the_contact                = new UserContact();
            }
            $the_user->fname            = $first_name;
            $the_user->lname            = $last_name;
            $the_user->email            = $email_address;
            $the_user->title            = $title;
            $the_user->institution      = $institution;
            $the_user->avatar           = $avatar_source;
            $the_user->biography        = $biography;
            $the_contact->user_id       = $user_id;
            $the_contact->contact_address = $address;
            $the_contact->contact_city  = $city;
            $the_contact->contact_state = $state;
            $the_contact->contact_zip   = $zip;
            $the_contact->contact_country = $country;
            $the_contact->contact_phone = $phone;
            $the_contact->contact_type  = $type;
            $the_user->save();
            $the_contact->save();
            return redirect()->route('single-user', $user_id);
        }
        else
        {
            return view('home');
        }
    }

    public function insertUser()
    {
        $input = Input::get();
        if($input['actions'] == 'insert')
        {

//            $user_id                    = $input['id'];
//            $the_action                 = $input['actions'];
            $first_name                 = $input['fname'];
            $last_name                  = $input['lname'];
            $email_address              = $input['email'];
            $title                      = $input['title'];
            $institution                = $input['institution'];
            $avatar_source              = $input['avatar'];
            $biography                  = $input['biography'];
            $address                    = $input['address'];
            $city                       = $input['city'];
            $state                      = $input['state'];
            $zip                        = $input['zip'];
            $country                    = $input['country'];
            $phone                      = $input['phone'];
            $type                       = $input['type'];
            $the_user                   = new User();

            $the_contact                = new UserContact();

            $the_user->password         = Hash::make('secret');
            $the_user->fname            = $first_name;
            $the_user->lname            = $last_name;
            $the_user->email            = $email_address;
            $the_user->title            = $title;
            $the_user->institution      = $institution;
            $the_user->avatar           = $avatar_source;
            $the_user->biography        = $biography;
            $the_user->save();


            $the_contact->user_id           = $the_user->id;
            $the_contact->contact_address   = $address;
            $the_contact->contact_city      = $city;
            $the_contact->contact_state     = $state;
            $the_contact->contact_zip       = $zip;
            $the_contact->contact_country   = $country;
            $the_contact->contact_phone     = $phone;
            $the_contact->contact_type      = $type;


            $the_contact->save();
            return redirect()->route('single-user', $the_user->id);
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
