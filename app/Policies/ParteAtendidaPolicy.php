<?php

namespace App\Policies;

use App\User;
use App\ParteAtendida;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParteAtendidaPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the parte atendida.
     *
     * @param  \App\User  $user
     * @param  \App\ParteAtendida  $parteAtendida
     * @return mixed
     */
    public function view(User $user, ParteAtendida $parteAtendida)
    {
        //
        return $user->pessoa_type == 'aluno' || $user->pessoa_type == 'professor';
    }

    /**
     * Determine whether the user can create parte atendidas.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->pessoa_type == 'aluno' || $user->pessoa_type == 'professor';

    }

    /**
     * Determine whether the user can update the parte atendida.
     *
     * @param  \App\User  $user
     * @param  \App\ParteAtendida  $parteAtendida
     * @return mixed
     */
    public function update(User $user, ParteAtendida $parteAtendida)
    {
        //
        return $user->pessoa_type == 'aluno' || $user->pessoa_type == 'professor';
    }

    /**
     * Determine whether the user can delete the parte atendida.
     *
     * @param  \App\User  $user
     * @param  \App\ParteAtendida  $parteAtendida
     * @return mixed
     */
    public function delete(User $user, ParteAtendida $parteAtendida)
    {
        //
        return $user->pessoa_type == 'administrador';
    }
}
