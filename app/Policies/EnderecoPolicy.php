<?php

namespace App\Policies;

use App\User;
use App\Endereco;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnderecoPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the endereco.
     *
     * @param  \App\User  $user
     * @param  \App\Endereco  $endereco
     * @return mixed
     */
    public function view(User $user, Endereco $endereco)
    {
        //
        if($endereco->dono_type == 'parte') {
            return true;
        } 
        return $user->id == $endereco->dono_id;
    }

    /**
     * Determine whether the user can create enderecos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user, Endereco $endereco)
    {
        //
        return $user->id == $endereco->dono_id;
    }

    /**
     * Determine whether the user can update the endereco.
     *
     * @param  \App\User  $user
     * @param  \App\Endereco  $endereco
     * @return mixed
     */
    public function update(User $user, Endereco $endereco)
    {
        //
        if($endereco->dono_type == 'parte') {
            return true;
        } 
        return $user->id == $endereco->dono_id;

    }

    /**
     * Determine whether the user can delete the endereco.
     *
     * @param  \App\User  $user
     * @param  \App\Endereco  $endereco
     * @return mixed
     */
    public function delete(User $user, Endereco $endereco)
    {
        //
        return $user->id == $endereco->dono_id;
    }
}
