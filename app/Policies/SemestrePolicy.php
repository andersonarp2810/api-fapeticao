<?php

namespace App\Policies;

use App\User;
use App\Semestre;
use Illuminate\Auth\Access\HandlesAuthorization;

class SemestrePolicy
{
    use HandlesAuthorization;

    public function before($user, $ability){
        if($user->pessoa_type == 'administrador'){
            return true;
        }
    }
    
    /**
     * Determine whether the user can view the semestre.
     *
     * @param  \App\User  $user
     * @param  \App\Semestre  $semestre
     * @return mixed
     */
    public function view(User $user)
    {
        //
        return $user->pessoa_type == 'professor';
    }

    /**
     * Determine whether the user can create semestres.
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
     * Determine whether the user can update the semestre.
     *
     * @param  \App\User  $user
     * @param  \App\Semestre  $semestre
     * @return mixed
     */
    public function update(User $user, Semestre $semestre)
    {
        //
        return $user->pessoa_type == 'administrador';
    }

    /**
     * Determine whether the user can delete the semestre.
     *
     * @param  \App\User  $user
     * @param  \App\Semestre  $semestre
     * @return mixed
     */
    public function delete(User $user, Semestre $semestre)
    {
        //
        return $user->pessoa_type == 'administrador';
    }
}
