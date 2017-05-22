<?php

namespace App\Policies;

use App\models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Kodeine\Acl\Traits\HasRole;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;

class CanUpdateRoles
{
    use HandlesAuthorization;
    use hasRole;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function updateRoles(User $user)
    {
        $seethem = false;
        if( $user->hasRole('superadmin') ||  $user->hasRole('admin'))
        {
            $seethem = true;
        }
        return $seethem;
    }
}
