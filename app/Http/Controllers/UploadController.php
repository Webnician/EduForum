<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\UserCourse;
use App\Files;




class UploadController extends Controller
{

    public function getFileUploader()
    {
        if(Auth::check())
        {
            $user = Auth::user();

            return view('FileUpload')->with('user', $user);
        }
    }


    public function uploadFile(Request $request)
{
    $input = $request->all();
        Files::uploadFileToDisk($input);

        return redirect()->back();
}

    public function getFilesByClassId($id)
    {
        $documents = Files::getFilesByCourseId($id);
        dd($documents);
    }

    public function getFileName($course_id, $user_id, $name)
    {
//        dd($name);
        Files::getFileByName($course_id, $user_id, $name);
    }

}
