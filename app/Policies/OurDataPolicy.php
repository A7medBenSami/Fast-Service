<?php

namespace App\Policies;

use App\Models\User;
use App\Models\OurData;
use Illuminate\Auth\Access\HandlesAuthorization;

class OurDataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the ourData can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allourdata');
    }

    /**
     * Determine whether the ourData can view the model.
     */
    public function view(User $user, OurData $model): bool
    {
        return $user->hasPermissionTo('view allourdata');
    }

    /**
     * Determine whether the ourData can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allourdata');
    }

    /**
     * Determine whether the ourData can update the model.
     */
    public function update(User $user, OurData $model): bool
    {
        return $user->hasPermissionTo('update allourdata');
    }

    /**
     * Determine whether the ourData can delete the model.
     */
    public function delete(User $user, OurData $model): bool
    {
        return $user->hasPermissionTo('delete allourdata');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allourdata');
    }

    /**
     * Determine whether the ourData can restore the model.
     */
    public function restore(User $user, OurData $model): bool
    {
        return false;
    }

    /**
     * Determine whether the ourData can permanently delete the model.
     */
    public function forceDelete(User $user, OurData $model): bool
    {
        return false;
    }
}
