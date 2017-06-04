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
            'description' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra congue suscipit. Pellentesque augue sem, venenatis bibendum ullamcorper vitae, fermentum eu urna. Nunc sit amet justo quis lorem pretium fermentum. Curabitur vel interdum purus. Ut nec nulla enim. Nulla vestibulum mattis consectetur. Donec ac pellentesque nunc. Ut commodo porttitor ante, ut mollis libero congue id. Sed suscipit hendrerit facilisis. Aliquam erat volutpat. Aliquam efficitur tincidunt blandit. Praesent consectetur at tellus sit amet scelerisque.'
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Data Modeling for Novices',
            'description' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra congue suscipit. Pellentesque augue sem, venenatis bibendum ullamcorper vitae, fermentum eu urna. Nunc sit amet justo quis lorem pretium fermentum. Curabitur vel interdum purus. Ut nec nulla enim. Nulla vestibulum mattis consectetur. Donec ac pellentesque nunc. Ut commodo porttitor ante, ut mollis libero congue id. Sed suscipit hendrerit facilisis. Aliquam erat volutpat. Aliquam efficitur tincidunt blandit. Praesent consectetur at tellus sit amet scelerisque.',
            'teacher_id' => 1,
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Database Concepts and Design',
            'description' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra congue suscipit. Pellentesque augue sem, venenatis bibendum ullamcorper vitae, fermentum eu urna. Nunc sit amet justo quis lorem pretium fermentum. Curabitur vel interdum purus. Ut nec nulla enim. Nulla vestibulum mattis consectetur. Donec ac pellentesque nunc. Ut commodo porttitor ante, ut mollis libero congue id. Sed suscipit hendrerit facilisis. Aliquam erat volutpat. Aliquam efficitur tincidunt blandit. Praesent consectetur at tellus sit amet scelerisque.',
            'teacher_id' => 1,
        ]);
        DB::table('courses')->insert([
            'course_name' => 'Logical Relationships in Modern Web Applications',
            'description' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra congue suscipit. Pellentesque augue sem, venenatis bibendum ullamcorper vitae, fermentum eu urna. Nunc sit amet justo quis lorem pretium fermentum. Curabitur vel interdum purus. Ut nec nulla enim. Nulla vestibulum mattis consectetur. Donec ac pellentesque nunc. Ut commodo porttitor ante, ut mollis libero congue id. Sed suscipit hendrerit facilisis. Aliquam erat volutpat. Aliquam efficitur tincidunt blandit. Praesent consectetur at tellus sit amet scelerisque.',
            'teacher_id' => 2,
        ]);
    }
}
