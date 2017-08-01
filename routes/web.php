<?php

use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

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

Route::post('user/update', 'ProfileController@updateUser')->name('updateuser');

Route::post('user/create', 'ProfileController@userCreate')->name('createuser');


Route::get('/roles', 'ProfileController@roles')->name('roles');

Route::get('/users', 'ProfileController@users')->name('users');

Route::get('/institutions', 'InstitutionController@allInstitutions')->name('institution-list');

Route::get('/institution', 'InstitutionController@createInstitution')->name('create-institution');

Route::get('/institution/{id}', 'InstitutionController@singleInstitution')->name('single-institution');

Route::get('/institution/{id}/edit', 'InstitutionController@editInstitution')->name('edit-institution');

Route::post('/institution/insert', 'InstitutionController@instInsert')->name('insert-institution');

Route::post('institution/update', 'InstitutionController@instUpdate')->name('update-institution');

Route::get('/departments/institution', 'InstDepartmentsController@allDepartments')->name('departments-list');

Route::post('/departments/update', 'InstDepartmentsController@departmentsUpdate')->name('update-departments');

Route::post('/departments/faculty/update', 'InstDepartmentsController@departmentFacultyUpdate')->name('update-departments-faculty');

Route::get('/join/institution', 'InstitutionController@joinInstitution')->name('join-institution');

Route::get('/join/institution/{id}', 'InstitutionController@viewInstitutionRequests')->name('view-inst-requests');

Route::post('/join/request', 'JoinRequestController@submitNewRequest')->name('submit-join-request');

Route::post('/join/request/update', 'JoinRequestController@updateRequest')->name('update-join-request');

Route::get('/courses', 'CourseController@viewCourses')->name('course-list');

Route::get('/course', 'CourseController@createCourse')->name('create-course');

Route::get('/course/{id}', 'CourseController@viewSingleCourse')->name('single-course');

Route::get('/class/{id}', 'CourseController@viewSingleClass')->name('single-class');

Route::get('/course/{id}/edit', 'CourseController@editCourse')->name('edit-course');

Route::post('/course/update', 'CourseController@updateCourse')->name('update-course');

Route::post('/course/insert', 'CourseController@insertCourse')->name('insert-course');

Route::get('/join/course', 'CourseController@joinCourse')->name('join-course');

Route::post('/join/request/course', 'CourseRequestController@submitNewRequest')->name('submit-course-join-request');

Route::post('/join/request/course/update', 'CourseRequestController@updateRequest')->name('update-course-join-request');


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

Route::post('/classpreferences/update', 'CourseController@UserPreferencesUpdate')->name('update-user-class-preferences');

Route::get('files',  'UploadController@getFileUploader')->name('file-uploader');

Route::post('/files/upload', 'UploadController@uploadFile')->name('upload-files');

Route::post('/schedule/add', 'ScheduleItemController@addScheduleItem')->name('add-schedule-item');

Route::post('/schedule/update', 'ScheduleItemController@ScheduleItemOperations')->name('update-schedule-item');

Route::get('/files/coursedocuments/{course_id}/{user_id}/{name}', 'UploadController@getFileName')->name('fetch-file');

Route::get('/assignment/add/{id}', 'AssignmentController@assignmentInput')->name('add-assignmnet');

Route::post('/assignment/insert', 'AssignmentController@insertAssignment')->name('insert-assignment');

Route::get('/assignment/student-input', 'AssignmentController@StudentAssignment')->name('student-assignment-input');

Route::post('/assignment/student-insert', 'AssignmentController@StudentAssignmentInsert')->name('student-assignment-insert');

Route::get('/assignment/student-submissions', 'AssignmentController@StudentSubmissions')->name('student-assignments');

//Route::get('registration', )
//Route::post('institution/create', 'InstitutionController@instCreate')->name('create-institution');