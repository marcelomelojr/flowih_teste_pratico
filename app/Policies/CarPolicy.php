<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class CarPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Car $car): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return auth()->check();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Car $car): Response
    {
        return ($user->id === $car->user_id || $user->hasRole('Admin'))
            ? Response::allow()
            : Response::deny('Você não tem permissão para editar este carro.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Car $car): Response
    {
        return ($user->id === $car->user_id || $user->hasRole('Admin'))
            ? Response::allow()
            : Response::deny('Você não tem permissão para deletar este carro.');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Car $car): Response
    {
        return ($user->id === $car->user_id || $user->hasRole('Admin'))
            ? Response::allow()
            : Response::deny('Você não tem permissão para editar este carro.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Car $car): bool
    {
        return true;
    }
}
