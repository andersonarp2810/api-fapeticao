<?php

namespace App\Policies;

use App\User;
use App\Roteiro;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoteiroPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->pessoa_type == 'administrador'){
            return true;
        }
    }

    /**
     * Determine whether the user can view the roteiro.
     *
     * @param  \App\User  $user
     * @param  \App\Roteiro  $roteiro
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return true;
    }

    /**
     * Determine whether the user can create roteiros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->pessoa_type == 'professor';
    }

    /**
     * Determine whether the user can update the roteiro.
     *
     * @param  \App\User  $user
     * @param  \App\Roteiro  $roteiro
     * @return mixed
     */
    public function update(User $user, Roteiro $roteiro)
    {
        //
        return $user->pessoa_type == 'professor';
    }

    /**
     * Determine whether the user can delete the roteiro.
     *
     * @param  \App\User  $user
     * @param  \App\Roteiro  $roteiro
     * @return mixed
     */
    public function delete(User $user, Roteiro $roteiro)
    {
        //
        return $user->pessoa_type == 'professor';
    }
}
