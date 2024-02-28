<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Arrive;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArrivePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the arrive can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list arrives');
    }

    /**
     * Determine whether the arrive can view the model.
     */
    public function view(User $user, Arrive $model): bool
    {
        return $user->hasPermissionTo('view arrives');
    }

    /**
     * Determine whether the arrive can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create arrives');
    }

    /**
     * Determine whether the arrive can update the model.
     */
    public function update(User $user, Arrive $model): bool
    {
        return $user->hasPermissionTo('update arrives');
    }

    /**
     * Determine whether the arrive can delete the model.
     */
    public function delete(User $user, Arrive $model): bool
    {
        return $user->hasPermissionTo('delete arrives');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete arrives');
    }

    /**
     * Determine whether the arrive can restore the model.
     */
    public function restore(User $user, Arrive $model): bool
    {
        return false;
    }

    /**
     * Determine whether the arrive can permanently delete the model.
     */
    public function forceDelete(User $user, Arrive $model): bool
    {
        return false;
    }
}
