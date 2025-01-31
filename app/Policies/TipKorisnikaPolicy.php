<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TipKorisnika;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipKorisnikaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tipKorisnika can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the tipKorisnika can view the model.
     */
    public function view(User $user, TipKorisnika $model): bool
    {
        return true;
    }

    /**
     * Determine whether the tipKorisnika can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the tipKorisnika can update the model.
     */
    public function update(User $user, TipKorisnika $model): bool
    {
        return true;
    }

    /**
     * Determine whether the tipKorisnika can delete the model.
     */
    public function delete(User $user, TipKorisnika $model): bool
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
     * Determine whether the tipKorisnika can restore the model.
     */
    public function restore(User $user, TipKorisnika $model): bool
    {
        return false;
    }

    /**
     * Determine whether the tipKorisnika can permanently delete the model.
     */
    public function forceDelete(User $user, TipKorisnika $model): bool
    {
        return false;
    }
}
