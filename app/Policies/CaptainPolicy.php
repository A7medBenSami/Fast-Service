<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Captain;
use Illuminate\Auth\Access\HandlesAuthorization;

class CaptainPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the captain can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list captains');
    }

    /**
     * Determine whether the captain can view the model.
     */
    public function view(User $user, Captain $model): bool
    {
        return $user->hasPermissionTo('view captains');
    }

    /**
     * Determine whether the captain can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create captains');
    }

    /**
     * Determine whether the captain can update the model.
     */
    public function update(User $user, Captain $model): bool
    {
        return $user->hasPermissionTo('update captains');
    }

    /**
     * Determine whether the captain can delete the model.
     */
    public function delete(User $user, Captain $model): bool
    {
        return $user->hasPermissionTo('delete captains');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete captains');
    }

    /**
     * Determine whether the captain can restore the model.
     */
    public function restore(User $user, Captain $model): bool
    {
        return false;
    }

    /**
     * Determine whether the captain can permanently delete the model.
     */
    public function forceDelete(User $user, Captain $model): bool
    {
        return false;
    }
}
