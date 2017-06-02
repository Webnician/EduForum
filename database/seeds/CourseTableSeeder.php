<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert([
            'course_name' => 'Introduction to Programming',
            'teacher_id' => 1,
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Data Modeling for Novices',
            'teacher_id' => 1,
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Database Concepts and Design',
            'teacher_id' => 1,
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Logical Relationships in Modern Web Applications',
            'teacher_id' => 2,
        ]);
    }
}
