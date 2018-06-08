<?php

namespace App\Policies;

use App\User;
use App\Defensor;
use Illuminate\Auth\Access\HandlesAuthorization;

class DefensorPolicy
{
    use HandlesAuthorization;
    
    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the defensor.
     *
     * @param  \App\User  $user
     * @param  \App\Defensor  $defensor
     * @return mixed
     */
    public function view(User $user, Defensor $defensor)
    {
        //
        return $user->pessoa_type == 'defensor';
    }

    /**
     * Determine whether the user can create defensors.
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
     * Determine whether the user can update the defensor.
     *
     * @param  \App\User  $user
     * @param  \App\Defensor  $defensor
     * @return mixed
     */
    public function update(User $user, Defensor $defensor, Request $request)
    {
        //
        if($request['cadastro_profissional']) {
            return $user->pessoa_type == 'administrador';
        }
        return $user->pessoa_type == 'defensor';
    }

    /**
     * Determine whether the user can delete the defensor.
     *
     * @param  \App\User  $user
     * @param  \App\Defensor  $defensor
     * @return mixed
     */
    public function delete(User $user, Defensor $defensor)
    {
        //
        return $user->pessoa_type == 'administrador';
    }
}
