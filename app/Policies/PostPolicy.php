<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post; 
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    //I actually love this Policy construct
    
    public function delete(User $user, Post $post){
        return $user->id === $post->user_id;
    }

    public function edit(User $user, Post $post){
        return $user->id === $post->user_id;
    }
}
