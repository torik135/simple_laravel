<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Post $p)
    {
        # code...
        return $user->id === $p->user_id;
    }
}
