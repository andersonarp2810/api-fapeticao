<?php

namespace App\Policies;

use App\User;
use App\Telefone;
use Illuminate\Auth\Access\HandlesAuthorization;

class TelefonePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->pessoa_type == 'administrador'){
            return true;
        }
    }

    /**
     * Determine whether the user can view the telefone.
     *
     * @param  \App\User  $user
     * @param  \App\Telefone  $telefone
     * @return mixed
     */
    public function view(User $user, Telefone $telefone)
    {
        //
        return $telefone->dono_type == 'usuario' && $telefone->dono_id == $user->id;
    }

    /**
     * Determine whether the user can create telefones.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the telefone.
     *
     * @param  \App\User  $user
     * @param  \App\Telefone  $telefone
     * @return mixed
     */
    public function update(User $user, Telefone $telefone)
    {
        //
        return $telefone->dono_type == 'usuario' && $telefone->dono_id == $user->id;
    }

    /**
     * Determine whether the user can delete the telefone.
     *
     * @param  \App\User  $user
     * @param  \App\Telefone  $telefone
     * @return mixed
     */
    public function delete(User $user, Telefone $telefone)
    {
        //
        return $telefone->dono_type == 'usuario' && $telefone->dono_id == $user->id;
    }
}
