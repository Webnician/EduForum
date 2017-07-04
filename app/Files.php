<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Course;

class Files extends Model
{
    public static function uploadFileToDisk($input)
    {
//        dd($input);
        $thefiles = $input['file'];
        Storage::putFileAs('coursedocuments/'.$input['course'].'/'.$input['user'], new File($thefiles), $input['filename']);
    }

    public static function getFilesByCourseId($id)
    {
        $teacher = Course::get_teacher_by_course($id);
        $directory = $teacher['id'];
        $filear = [];
        $iterator = 0;
//        $files = Storage::disk('local')->files('coursedocuments/'.$id.'/'.$directory);
                $files = Storage::files('coursedocuments/'.$id.'/'.$directory);

        return $files;
    }

    public static function getFileByName($course_id, $user_id, $name)
    {
        $thefile = Storage::get('coursedocuments/'.$course_id.'/'.$user_id.'/'.$name);
        $thepath = 'coursedocuments/'.$course_id.'/'.$user_id.'/'.$name;

//        $response = response()->download('/app/coursedocuments/'.$course_id.'/'.$user_id.'/'.$name , 'this.pdf');
//        return response()->file($thefile);
//        $headers = array('Content-Type' => $thefile->mimetype);
        return response()->download(storage_path('app/coursedocuments/1/1/2hJKPYcHq8jzjPpzGRDXcKkOduAB1TtI1YWPfFFl.png'));
//        dd($response);
    }
}
