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
            'title' => 'Sir',
            'institution' => 1,
            'avatar' => 'https://onlinelearningconsortium.org/wp-content/uploads/2015/10/2015-05-06_20.53.46-150x150.jpg',
            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 20,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 20,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 20,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 20,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 10,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 10,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 10,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 10,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 10,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        DB::table('users')->insert([
            'fname' => str_random(10),
            'lname' => str_random(10),
            'title' => str_random(10),
            'institution' => 10,
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
