<?php

use Illuminate\Database\Seeder;

class Institution_Contact_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('inst_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'public university',
            'institution_id' => 1,
        ]);
        DB::table('inst_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'public university',
            'institution_id' => 2,
        ]);
        DB::table('inst_contacts')->insert([
            'contact_address' => '123 Circle Ave',
            'contact_city' => 'Burnsville',
            'contact_state' => 'MN',
            'contact_zip' => 55337,
            'contact_phone' => '952-890-3241',
            'contact_type' => 'coroporate',
            'institution_id' => 3,
        ]);
    }
}
