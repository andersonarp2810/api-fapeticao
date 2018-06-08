<?php

namespace App\Policies;

use App\User;
use App\Comentario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComentarioPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the comentario.
     *
     * @param  \App\User  $user
     * @param  \App\Comentario  $comentario
     * @return mixed
     */
    public function view(User $user, Comentario $comentario)
    {
        //
        return $user->pessoa_type == 'professor' ||
               $user->pessoa_type == 'defensor'  ||
               $user->pessoa_type == 'aluno';
    }

    /**
     * Determine whether the user can create comentarios.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->pessoa_type == 'professor' || $user->pessoa_type == 'defensor';
    }

    /**
     * Determine whether the user can update the comentario.
     *
     * @param  \App\User  $user
     * @param  \App\Comentario  $comentario
     * @return mixed
     */
    public function update(User $user, Comentario $comentario)
    {
        //
        return $user->pessoa_type == 'professor' || $user->pessoa_type == 'defensor';
    }

    /**
     * Determine whether the user can delete the comentario.
     *
     * @param  \App\User  $user
     * @param  \App\Comentario  $comentario
     * @return mixed
     */
    public function delete(User $user, Comentario $comentario)
    {
        //
        return $user->pessoa_type == 'professor' || $user->pessoa_type == 'defensor';
    }
}
