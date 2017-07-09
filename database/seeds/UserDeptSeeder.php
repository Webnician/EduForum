<?php

use Illuminate\Database\Seeder;

class UserDeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_depts')->insert([
            'department_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('user_depts')->insert([
            'department_id' => 1,
            'user_id' => 6,
        ]);

    }
}
