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

Route::get('/user/{id}', function (App\models\User $id)
        {
            $current_user_id = Auth::user()->id;
            if( Auth::user()->hasRole('superadmin') || $current_user_id == $id['id'])
            {
                return view('pro', $id);
            }
            else
            {
                return view('pro', Auth::user() );
            }
         })->name('userprofile');

Route::get('/user/{id}/edit', function (App\models\User $id)
{
    $current_user_id = Auth::user()->id;
    if( Auth::user()->hasRole('superadmin') || $current_user_id == $id['id'])
    {
        return view('profile-user.usereditor', $id);
//        return view('profile-user.useredit2', $id);
    }
    else
    {
        return view('profile-user.usereditor', Auth::user() );
    }
})->name('userprofileeditor');


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

//Route::post('institution/create', 'InstitutionController@instCreate')->name('create-institution');