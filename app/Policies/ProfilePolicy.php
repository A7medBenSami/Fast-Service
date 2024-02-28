<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the profile can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list profiles');
    }

    /**
     * Determine whether the profile can view the model.
     */
    public function view(User $user, Profile $model): bool
    {
        return $user->hasPermissionTo('view profiles');
    }

    /**
     * Determine whether the profile can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create profiles');
    }

    /**
     * Determine whether the profile can update the model.
     */
    public function update(User $user, Profile $model): bool
    {
        return $user->hasPermissionTo('update profiles');
    }

    /**
     * Determine whether the profile can delete the model.
     */
    public function delete(User $user, Profile $model): bool
    {
        return $user->hasPermissionTo('delete profiles');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete profiles');
    }

    /**
     * Determine whether the profile can restore the model.
     */
    public function restore(User $user, Profile $model): bool
    {
        return false;
    }

    /**
     * Determine whether the profile can permanently delete the model.
     */
    public function forceDelete(User $user, Profile $model): bool
    {
        return false;
    }
}
