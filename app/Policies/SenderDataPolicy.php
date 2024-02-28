<?php

namespace App\Policies;

use App\Models\User;
use App\Models\SenderData;
use Illuminate\Auth\Access\HandlesAuthorization;

class SenderDataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the senderData can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allsenderdata');
    }

    /**
     * Determine whether the senderData can view the model.
     */
    public function view(User $user, SenderData $model): bool
    {
        return $user->hasPermissionTo('view allsenderdata');
    }

    /**
     * Determine whether the senderData can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allsenderdata');
    }

    /**
     * Determine whether the senderData can update the model.
     */
    public function update(User $user, SenderData $model): bool
    {
        return $user->hasPermissionTo('update allsenderdata');
    }

    /**
     * Determine whether the senderData can delete the model.
     */
    public function delete(User $user, SenderData $model): bool
    {
        return $user->hasPermissionTo('delete allsenderdata');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allsenderdata');
    }

    /**
     * Determine whether the senderData can restore the model.
     */
    public function restore(User $user, SenderData $model): bool
    {
        return false;
    }

    /**
     * Determine whether the senderData can permanently delete the model.
     */
    public function forceDelete(User $user, SenderData $model): bool
    {
        return false;
    }
}
