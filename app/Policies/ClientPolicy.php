<?php

namespace App\Policies;

use App\Models\User;

class ClientPolicy
{
    /**
     * Create a new policy instance.
     */

    public function manage(User $admin, User $client)
    {
        return $admin->clients->contains($client);
    }
}
