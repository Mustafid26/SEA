<?php

namespace App\Policies;

use App\Models\Pelatihan;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class PelatihanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, Pelatihan $pelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, Pelatihan $pelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, Pelatihan $pelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, Pelatihan $pelatihan)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Pelatihan  $pelatihan
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, Pelatihan $pelatihan)
    {
        return true;
    }
}