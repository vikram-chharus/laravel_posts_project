<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Post;

class PostPolicy
{
    use HandlesAuthorization;

   public function delete(User $user, Post $post)
   {
       return $user->id === $post->user_id;
   }
}
