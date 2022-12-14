<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class ModelPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param  Model $model
     * @return Response|bool
     */
    public function view(User $user, Model $model): Response|bool
    {
        return $user['id'] === $model['user_id']
            ? Response::allow()
            : Response::deny('You don\'t own this resource!', 403);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param  Model $model
     * @return Response|bool
     */
    public function update(User $user, Model $model): Response|bool
    {
        return $user['id'] === $model['user_id']
            ? Response::allow()
            : Response::deny('You don\'t own this resource!', 403);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param  Model $model
     * @return Response|bool
     */
    public function delete(User $user, Model $model): Response|bool
    {
        return $user['id'] === $model['user_id']
            ? Response::allow()
            : Response::deny('You don\'t own this resource!', 403);
    }
}
