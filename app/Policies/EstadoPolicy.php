<?php

namespace App\Policies;

use App\User;
use App\Estado;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstadoPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the estado.
     *
     * @param  \App\User  $user
     * @param  \App\Estado  $estado
     * @return mixed
     */
    public function view(User $user, Estado $estado)
    {
        //
        return $user->pessoa_type == 'professor';
    }

    /**
     * Determine whether the user can create estados.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->pessoa_type == 'administrador';
    }

    /**
     * Determine whether the user can update the estado.
     *
     * @param  \App\User  $user
     * @param  \App\Estado  $estado
     * @return mixed
     */
    public function update(User $user, Estado $estado)
    {
        //
        return $user->pessoa_type == 'administrador';
    }

    /**
     * Determine whether the user can delete the estado.
     *
     * @param  \App\User  $user
     * @param  \App\Estado  $estado
     * @return mixed
     */
    public function delete(User $user, Estado $estado)
    {
        //
        return $user->pessoa_type == 'administrador';
    }
}
