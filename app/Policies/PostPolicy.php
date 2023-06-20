<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): Response
    {
        if (!$post->premium)
            return Response::allow();

        if ($user->can('view premium posts'))
            return Response::allow();

        return Response::deny('You do not have subscription.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        if ($user->can('create posts'))
            return Response::allow();

        return Response::deny();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        if ($user->can('update posts'))
            return Response::allow();

        return Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): Response
    {
        if ($user->can('delete posts'))
            return Response::allow();

        return Response::deny();
    }
}
