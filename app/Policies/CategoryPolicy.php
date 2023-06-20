<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        if ($user->can('create categories'))
            return Response::allow();

        return Response::deny();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $category): Response
    {
        if ($user->can('update categories'))
            return Response::allow();

        return Response::deny();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Category $category): Response
    {
        if ($user->can('delete categories'))
            return Response::allow();

        return Response::deny();
    }
}
