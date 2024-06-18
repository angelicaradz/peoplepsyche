<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Superadmin;

class SuperadminPolicy
{
    /**
     * Create a new policy instance.
     */

    public function manage(Superadmin $superadmin, User $client)
    {
        return $superadmin->isSuperAdmin();
    }
}
