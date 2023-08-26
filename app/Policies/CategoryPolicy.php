<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{
    public function create(User $user)
    {
        return boolval($user->is_admin);
    }

    public function update(User $user)
    {
        return boolval($user->is_admin);
    }

    public function delete(User $user)
    {
        return boolval($user->is_admin);
    }
}
