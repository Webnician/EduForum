<?php

use Illuminate\Database\Seeder;

class User_Contact_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'eduforum admin',
            'user_id' => 1,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'institution admin',
            'user_id' => 2,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'instructor',
            'user_id' => 3,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'instructor',
            'user_id' => 4,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'student',
            'user_id' => 5,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'student',
            'user_id' => 6,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'student',
            'user_id' => 7,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'student',
            'user_id' => 8,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'student',
            'user_id' => 9,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'student',
            'user_id' => 10,
        ]);
        DB::table('user_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'student',
            'user_id' => 11,
        ]);

    }
}
