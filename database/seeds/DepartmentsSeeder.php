<?php

use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inst_departments')->insert([
            'department_name' => 'Computer Science',
            'institution_id' => 1,
            'dept_head_id' => 2,

        ]);
        DB::table('inst_departments')->insert([
            'department_name' => 'Earth Sciences',
            'institution_id' => 1,
            'dept_head_id' => 5,

        ]);
        DB::table('inst_departments')->insert([
            'department_name' => 'Physics and Mathematics',
            'institution_id' => 1,
            'dept_head_id' => 3,

        ]);
        DB::table('inst_departments')->insert([
            'department_name' => 'Liberal Arts',
            'institution_id' => 1,
            'dept_head_id' => 4,

        ]);
    }
}
