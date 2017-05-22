<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(d2017_05_21_Make_Permissions::class);
        $this->call (Role_table_seeder::class);
        $this->call (d2017_05_21_Add_Permissions_to_Roles::class);
        $this->call(d2017_05_21_Initial_Users_Seed::class);
        $this->call(d2017_05_21_Make_Super_Admin::class);
    }
}
