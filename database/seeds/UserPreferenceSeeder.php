<?php

use Illuminate\Database\Seeder;

class UserPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_preferences')->insert([
            'user_id' => 1,
        ]);
        DB::table('user_preferences')->insert([
            'user_id' => 2,
        ]);
        DB::table('user_preferences')->insert([
            'user_id' => 3,
        ]);
    }
}
