<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ReceiverData;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReceiverDataPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the receiverData can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list allreceiverdata');
    }

    /**
     * Determine whether the receiverData can view the model.
     */
    public function view(User $user, ReceiverData $model): bool
    {
        return $user->hasPermissionTo('view allreceiverdata');
    }

    /**
     * Determine whether the receiverData can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create allreceiverdata');
    }

    /**
     * Determine whether the receiverData can update the model.
     */
    public function update(User $user, ReceiverData $model): bool
    {
        return $user->hasPermissionTo('update allreceiverdata');
    }

    /**
     * Determine whether the receiverData can delete the model.
     */
    public function delete(User $user, ReceiverData $model): bool
    {
        return $user->hasPermissionTo('delete allreceiverdata');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete allreceiverdata');
    }

    /**
     * Determine whether the receiverData can restore the model.
     */
    public function restore(User $user, ReceiverData $model): bool
    {
        return false;
    }

    /**
     * Determine whether the receiverData can permanently delete the model.
     */
    public function forceDelete(User $user, ReceiverData $model): bool
    {
        return false;
    }
}
