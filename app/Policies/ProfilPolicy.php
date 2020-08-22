<?php

namespace App\Policies;

use App\User;
use App\Profil;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any profils.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the profil.
     *
     * @param  \App\User  $user
     * @param  \App\Profil  $profil
     * @return mixed
     */
    public function view(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can create profils.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the profil.
     *
     * @param  \App\User  $user
     * @param  \App\Profil  $profil
     * @return mixed
     */
    public function update(User $user, Profil $profil)
    {
        return $user->id == $profil->user_id;
    }

    /**
     * Determine whether the user can delete the profil.
     *
     * @param  \App\User  $user
     * @param  \App\Profil  $profil
     * @return mixed
     */
    public function delete(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can restore the profil.
     *
     * @param  \App\User  $user
     * @param  \App\Profil  $profil
     * @return mixed
     */
    public function restore(User $user, Profil $profil)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the profil.
     *
     * @param  \App\User  $user
     * @param  \App\Profil  $profil
     * @return mixed
     */
    public function forceDelete(User $user, Profil $profil)
    {
        //
    }
}
