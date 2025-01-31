<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Kategorija;
use Illuminate\Auth\Access\HandlesAuthorization;

class KategorijaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the kategorija can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the kategorija can view the model.
     */
    public function view(User $user, Kategorija $model): bool
    {
        return true;
    }

    /**
     * Determine whether the kategorija can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the kategorija can update the model.
     */
    public function update(User $user, Kategorija $model): bool
    {
        return true;
    }

    /**
     * Determine whether the kategorija can delete the model.
     */
    public function delete(User $user, Kategorija $model): bool
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
     * Determine whether the kategorija can restore the model.
     */
    public function restore(User $user, Kategorija $model): bool
    {
        return false;
    }

    /**
     * Determine whether the kategorija can permanently delete the model.
     */
    public function forceDelete(User $user, Kategorija $model): bool
    {
        return false;
    }
}
