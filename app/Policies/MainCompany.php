<?php

namespace App\Policies;

use App\Models\User;

class MainCompany
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('company-list');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, MainCompany $mainCompany): bool
    {
        return $user->hasPermission('company-list');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, MainCompany $mainCompany): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, MainCompany $mainCompany): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, MainCompany $mainCompany): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, MainCompany $mainCompany): bool
    {
        //
    }
}
