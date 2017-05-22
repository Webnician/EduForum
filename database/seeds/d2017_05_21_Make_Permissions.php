<?php

use Illuminate\Database\Seeder;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;

class d2017_05_21_Make_Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permAdmin = $permission->create([
            'name'        => 'admin',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage administrators'
        ]);
        $permission = new Permission();
        $permInstAdmin = $permission->create([
            'name'        => 'instadmin',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage institution administrators'
        ]);
        $permission = new Permission();
        $permInstSubAdmins = $permission->create([
            'name'        => 'instsubadmins',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage institution sub-administrators'
        ]);
        $permission = new Permission();
        $permInstructors = $permission->create([
            'name'        => 'instructors',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage instructors'
        ]);
        $permission = new Permission();
        $permOwnInstructors = $permission->create([
            'name'        => 'owninstructors',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage own instructors'
        ]);
        $permission = new Permission();
        $permStudents = $permission->create([
            'name'        => 'students',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage students'
        ]);
        $permission = new Permission();
        $permOwnStudents = $permission->create([
            'name'        => 'ownstudents',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage own students'
        ]);
        $permission = new Permission();
        $permInstitution = $permission->create([
            'name'        => 'institution',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage institutions'
        ]);
        $permission = new Permission();
        $permOwnInstitution = $permission->create([
            'name'        => 'owninstitution',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage own institution'
        ]);
        $permission = new Permission();
        $permAssignments = $permission->create([
            'name'        => 'assignments',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage assignments'
        ]);
        $permission = new Permission();
        $permInstAssignments = $permission->create([
            'name'        => 'instassignments',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage inst assignments'
        ]);
        $permission = new Permission();
        $permOwnAssignments = $permission->create([
            'name'        => 'ownassignments',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage own assignments'
        ]);
        $permission = new Permission();
        $permCourses = $permission->create([
            'name'        => 'courses',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage course'
        ]);
        $permission = new Permission();
        $permInstCourses = $permission->create([
            'name'        => 'instcourses',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage inst course'
        ]);
        $permission = new Permission();
        $permOwnCourses = $permission->create([
            'name'        => 'owncourses',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage own courses'
        ]);
        $permission = new Permission();
        $permSchedule = $permission->create([
            'name'        => 'schedule',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage schedule'
        ]);
        $permission = new Permission();
        $permInstSchedule = $permission->create([
            'name'        => 'instschedule',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage inst schedule'
        ]);
        $permission = new Permission();
        $permOwnSchedule = $permission->create([
            'name'        => 'ownschedule',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage own schedule'
        ]);
        $permission = new Permission();
        $permScores = $permission->create([
            'name'        => 'scores',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage scores'
        ]);
        $permission = new Permission();
        $permInstScores = $permission->create([
            'name'        => 'instscores',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage inst scores'
        ]);
        $permission = new Permission();
        $permOwnScores = $permission->create([
            'name'        => 'ownscores',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage own scores'
        ]);
        $permission = new Permission();
        $permGraders = $permission->create([
            'name'        => 'graders',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage graders'
        ]);
        $permission = new Permission();
        $permObserservers = $permission->create([
            'name'        => 'observers',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage observers'
        ]);
        $permission = new Permission();
        $permGuests = $permission->create([
            'name'        => 'guests',
            'slug'        => [          // pass an array of permissions.
                'create'     => true,
                'view'       => true,
                'update'     => true,
                'delete'     => true,
                'view.phone' => true
            ],
            'description' => 'manage guests'
        ]);

    }
}
