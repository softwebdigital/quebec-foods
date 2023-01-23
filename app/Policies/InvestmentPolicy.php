<?php

namespace App\Policies;

use App\Models\Investment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class InvestmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Investment $investment
     * @return Response|bool
     */
    public function view(User $user, Investment $investment): Response|bool
    {
        return $user['id'] === $investment['user_id']
            ? Response::allow()
            : Response::deny('You don\'t own this investment!', 403);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Investment $investment
     * @return Response|bool
     */
    public function update(User $user, Investment $investment)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Investment $investment
     * @return Response|bool
     */
    public function delete(User $user, Investment $investment)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Investment $investment
     * @return Response|bool
     */
    public function restore(User $user, Investment $investment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Investment $investment
     * @return Response|bool
     */
    public function forceDelete(User $user, Investment $investment)
    {
        //
    }
}
