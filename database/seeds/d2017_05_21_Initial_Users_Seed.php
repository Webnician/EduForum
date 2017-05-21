<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class d2017_05_21_Initial_Users_Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => 'Admin',
            'lname' => 'User',
            'email' => 'olaf@webnician.net',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
