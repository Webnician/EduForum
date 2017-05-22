<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;

class Role_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = new Role();
        $roleAdmin->name = 'Super Admin';
        $roleAdmin->slug = 'superadmin';
        $roleAdmin->description = 'manage all';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Admin';
        $roleAdmin->slug = 'admin';
        $roleAdmin->description = 'manage some';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Inst Admin';
        $roleAdmin->slug = 'instadmin';
        $roleAdmin->description = 'manage institution';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Course Content Admin';
        $roleAdmin->slug = 'contadmin';
        $roleAdmin->description = 'manage courses and content';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Personnel Admin';
        $roleAdmin->slug = 'persadmin';
        $roleAdmin->description = 'manage students and instructors';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Instructor';
        $roleAdmin->slug = 'instructor';
        $roleAdmin->description = 'manage courses, assignments, and students';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Grader';
        $roleAdmin->slug = 'grader';
        $roleAdmin->description = 'manage course grades';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Student';
        $roleAdmin->slug = 'student';
        $roleAdmin->description = 'manage schedule and assignments';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Observer';
        $roleAdmin->slug = 'observer';
        $roleAdmin->description = 'observation only';
        $roleAdmin->save();

        $roleAdmin = new Role();
        $roleAdmin->name = 'Guest';
        $roleAdmin->slug = 'guest';
        $roleAdmin->description = 'user on account with no particular status';
        $roleAdmin->save();
    }
}
