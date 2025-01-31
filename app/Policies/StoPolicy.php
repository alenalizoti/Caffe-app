<?php

namespace App\Policies;

use App\Models\Sto;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the sto can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the sto can view the model.
     */
    public function view(User $user, Sto $model): bool
    {
        return true;
    }

    /**
     * Determine whether the sto can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the sto can update the model.
     */
    public function update(User $user, Sto $model): bool
    {
        return true;
    }

    /**
     * Determine whether the sto can delete the model.
     */
    public function delete(User $user, Sto $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the sto can restore the model.
     */
    public function restore(User $user, Sto $model): bool
    {
        return false;
    }

    /**
     * Determine whether the sto can permanently delete the model.
     */
    public function forceDelete(User $user, Sto $model): bool
    {
        return false;
    }
}
