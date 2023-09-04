<?php

namespace App\Policies;

use App\Models\JobOpening;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobOpeningPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->rol === 2;
        //return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobOpening $jobOpening): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->rol === 2;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobOpening $jobOpening): bool
    {
        return $user->id == $jobOpening->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobOpening $jobOpening): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobOpening $jobOpening): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobOpening $jobOpening): bool
    {
        //
    }
}
