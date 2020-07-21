<?php

namespace Laragle\Authorization\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Laragle\Authentication\Models\User;
use Laragle\Authorization\Models\Ability;

class AbilityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \Laragle\Authentication\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('manage-abilities');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \Laragle\Authentication\Models\User  $user
     * @param  \Laragle\Authorization\Models\Ability  $ability
     * @return mixed
     */
    public function view(User $user, Ability $ability)
    {
        return $user->can('manage-abilities');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \Laragle\Authentication\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('manage-abilities');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \Laragle\Authentication\Models\User  $user
     * @param  \Laragle\Authorization\Models\Ability  $ability
     * @return mixed
     */
    public function update(User $user, Ability $ability)
    {
        return $user->can('manage-abilities');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \Laragle\Authentication\Models\User  $user
     * @param  \Laragle\Authorization\Models\Ability  $ability
     * @return mixed
     */
    public function delete(User $user, Ability $ability)
    {
        return $user->can('manage-abilities');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \Laragle\Authentication\Models\User  $user
     * @param  \Laragle\Authorization\Models\Ability  $ability
     * @return mixed
     */
    public function restore(User $user, Ability $ability)
    {
        return $user->can('manage-abilities');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \Laragle\Authentication\Models\User  $user
     * @param  \Laragle\Authorization\Models\Ability  $ability
     * @return mixed
     */
    public function forceDelete(User $user, Ability $ability)
    {
        return $user->can('manage-abilities');
    }
}
