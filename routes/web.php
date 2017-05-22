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

//Route::get('user/{id}', function (App\models\User $id) {
//    return view('profile');
////    $id->email;
////    return view('', ['name' => 'James']);
//})->name('profiles');
Route::get('test', function()
{
    return 'welcome to eduforum';
});

Route::get('/testhome', 'HomeScreenController@index')->name('testhome');

Route::get('/profile', 'ProfileController@index')->name('prof');

//Route::get('/user/{id}',  'ProfileController@user')->name('userroute');

Route::get('/user/{id}', function (App\models\User $id) {
    $current_user_id = Auth::user()->id;
     if( Auth::user()->hasRole('superadmin') || $current_user_id == $id['id']) {
         return view('pro', $id);
         }
         else{
             return view('pro', Auth::user() );
         }

})->name('userprofile');

//Route::get('/profile-user/userlisting', function(){
//    $institution = Auth::user()->institution;
//        return view('/profile-user/userlisting', $institution);
////return view('pro', Auth::user() );
//})->name('instusers');

Route::get('/roles', 'ProfileController@roles')->name('roles');

Route::get('/users', 'ProfileController@users')->name('users');