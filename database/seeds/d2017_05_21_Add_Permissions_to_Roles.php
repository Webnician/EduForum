<?php

use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;
use Illuminate\Database\Seeder;

class d2017_05_21_Add_Permissions_to_Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $theroles = roles();
//
        $roleAdmin = Role::find(1);
        $roleAdmin->assignPermission(Permission::all());

        $roleAdmin = Role::find(2);
        $roleAdmin->assignPermission('instadmin, instructors, institution, scores');

        $roleAdmin = Role::find(3);
        $roleAdmin->assignPermission('instsubadmins, owninstructors, students, owninstitution, assignments, instcourses, instschedule, ownschedule, instscores');

        $roleAdmin = Role::find(4);
        $roleAdmin->assignPermission('instassignments, instcourses, instschedule, instscores');

        $roleAdmin = Role::find(5);
        $roleAdmin->assignPermission('ownstudents, owninstructors, graders, observers, guests');

        $roleAdmin = Role::find(6);
        $roleAdmin->assignPermission('ownassignments, owncourses, ownschedule, ownscores, graders');

        $roleAdmin = Role::find(7);
        $roleAdmin->assignPermission('ownassignments, owncourses, ownschedule, ownscores');

        $roleAdmin = Role::find(8);
        $roleAdmin->assignPermission('ownassignments, owncourses, ownschedule');

        $roleAdmin = Role::find(9);
        $roleAdmin->assignPermission('ownschedule');

        $roleAdmin = Role::find(10);
        $roleAdmin->assignPermission('ownschedule');
        //
    }
}
