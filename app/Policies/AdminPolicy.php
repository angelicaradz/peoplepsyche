<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admin;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */

    public function manage(Admin $admin, User $client)
    {
        return $admin->isAdmin() && $admin->clients->contains($client);
    }
}
