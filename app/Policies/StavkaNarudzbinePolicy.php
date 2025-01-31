<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StavkaNarudzbine;
use Illuminate\Auth\Access\HandlesAuthorization;

class StavkaNarudzbinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the stavkaNarudzbine can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the stavkaNarudzbine can view the model.
     */
    public function view(User $user, StavkaNarudzbine $model): bool
    {
        return true;
    }

    /**
     * Determine whether the stavkaNarudzbine can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the stavkaNarudzbine can update the model.
     */
    public function update(User $user, StavkaNarudzbine $model): bool
    {
        return true;
    }

    /**
     * Determine whether the stavkaNarudzbine can delete the model.
     */
    public function delete(User $user, StavkaNarudzbine $model): bool
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
     * Determine whether the stavkaNarudzbine can restore the model.
     */
    public function restore(User $user, StavkaNarudzbine $model): bool
    {
        return false;
    }

    /**
     * Determine whether the stavkaNarudzbine can permanently delete the model.
     */
    public function forceDelete(User $user, StavkaNarudzbine $model): bool
    {
        return false;
    }
}
