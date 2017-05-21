<?php

use Illuminate\Database\Seeder;

class d2017_05_21_Make_Super_Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1'
        ]);
    }
}
