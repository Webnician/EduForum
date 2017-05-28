<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class d2017_05_27_User_Inst_Seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user_insts')->insert([
            'institution_id' => 1,
            'user_id' => 2,
        ]);
        DB::table('user_insts')->insert([
            'institution_id' => 1,
            'user_id' => 1,
        ]);
        DB::table('user_insts')->insert([
            'institution_id' => 2,
            'user_id' => 3,
        ]);
    }
}
