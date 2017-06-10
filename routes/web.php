<?php

use App\models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function()
{
    return 'welcome to eduforum';
});

Route::get('/testhome', 'HomeScreenController@index')->name('testhome');

Route::get('/profile', 'ProfileController@index')->name('prof');

//Route::get('/user/{id}',  'ProfileController@user')->name('userroute');

//Route::get('/user/{id}', function (App\models\User $id)
//        {
//            $current_user_id = Auth::user()->id;
//            if( Auth::user()->hasRole('superadmin') || $current_user_id == $id['id'])
//            {
//                return view('pro', $id);
//            }
//            else
//            {
//                return view('pro', Auth::user() );
//            }
//         })->name('userprofile');
//
//Route::get('/user/{id}/edit', function (App\models\User $id)
//{
//    $current_user_id = Auth::user()->id;
//    if( Auth::user()->hasRole('superadmin') || $current_user_id == $id['id'])
//    {
//        return view('profile-user.usereditor', $id);
////        return view('profile-user.useredit2', $id);
//    }
//    else
//    {
//        return view('profile-user.usereditor', Auth::user() );
//    }
//})->name('userprofileeditor');


Route::get('/creator', 'ProfileController@userCreateCont')->name('usercreator');

Route::post('user/update', 'ProfileController@userUpdate')->name('updateuser');

Route::post('user/create', 'ProfileController@userCreate')->name('createuser');


Route::get('/roles', 'ProfileController@roles')->name('roles');

Route::get('/users', 'ProfileController@users')->name('users');

Route::get('/institutions', 'InstitutionController@allInstitutions')->name('institution-list');

Route::get('/institution', 'InstitutionController@createInstitution')->name('create-institution');

Route::get('/institution/{id}', 'InstitutionController@singleInstitution')->name('single-institution');

Route::get('/institution/{id}/edit', 'InstitutionController@editInstitution')->name('edit-institution');

Route::post('/institution/insert', 'InstitutionController@instInsert')->name('insert-institution');

Route::post('institution/update', 'InstitutionController@instUpdate')->name('update-institution');

Route::get('/courses', 'CourseController@viewCourses')->name('course-list');

Route::get('/course', 'CourseController@createCourse')->name('create-course');

Route::get('/course/{id}', 'CourseController@viewSingleCourse')->name('single-course');

Route::get('/course/{id}/edit', 'CourseController@editCourse')->name('edit-course');

Route::post('/course/update', 'CourseController@updateCourse')->name('update-course');

Route::post('/course/insert', 'CourseController@insertCourse')->name('insert-course');

Route::get('/users', 'ProfileController@viewUsers')->name('user-list');

Route::get('/user', 'ProfileController@createUser')->name('create-user');

Route::get('/user/{id}', 'ProfileController@viewSingleUser')->name('single-user');

Route::get('/user/{id}/edit', 'ProfileController@editUser')->name('edit-user');

Route::post('/user/update', 'ProfileController@updateUser')->name('update-user');

Route::post('/user/insert', 'ProfileController@insertUser')->name('insert-course');

Route::post('/registration/delete', 'CourseController@registrationDelete')->name('remove-registration');

Route::get('/registration/user/{id}/create', 'CourseController@registrationUserCreate')->name('create-registration');

Route::get('/registration/course/{id}/create', 'CourseController@registrationCourseCreate')->name('create-registration');

Route::post('/registration/insert', 'CourseController@registrationInsert')->name('insert-registration');

//Route::get('registration', )
//Route::post('institution/create', 'InstitutionController@instCreate')->name('create-institution');