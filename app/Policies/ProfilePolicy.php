<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Profile;
use App\Models\User;

class ProfilePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Profile $profile) {
        return $user->id == $profile->user_id;
    }
}
