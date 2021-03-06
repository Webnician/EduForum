<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Institution extends Model
{

    public static function get_all_institutions()
    {
        $institutions = Institution::all();
        return $institutions;
    }

    public static function get_paginated_institution_list()
    {
        $institutions = DB::table('institutions')->paginate(2);
        return $institutions;
    }

    public static function get_institution($id)
    {
        $institution = Institution::find($id);
        return $institution;
    }
    public function get_institution_name($id)
    {
        $user = Institution::find($id);
    }


    public function get_institution_id($name)
    {

    }

    public function get_institution_system($id)
    {

    }

    protected $fillable = [
        'institution_name', 'system_id', 'admin_id',
    ];
}
