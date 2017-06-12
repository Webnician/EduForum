<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserCourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_courses')->insert([
            'user_id' => 3,
            'course_id' => 1,
        ]);
        DB::table('user_courses')->insert([
            'user_id' => 5,
            'course_id' => 1,
        ]);
        DB::table('user_courses')->insert([
            'user_id' => 6,
            'course_id' => 1,
        ]);
        DB::table('user_courses')->insert([
            'user_id' => 4,
            'course_id' => 2,
        ]);
        DB::table('user_courses')->insert([
            'user_id' => 4,
            'course_id' => 3,
        ]);
        DB::table('user_courses')->insert([
            'user_id' => 3,
            'course_id' => 3,
        ]);
    }
}
