<?php

namespace App\Policies;

use App\User;
use App\Professor;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfessorPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador'){
            return true;
        }
    }

    /**
     * Determine whether the user can view the professor.
     *
     * @param  \App\User  $user
     * @param  \App\Professor  $professor
     * @return mixed
     */
    public function view(User $user, Professor $professor)
    {
        //
        return $this->pessoa_type == 'professor';
    }

    /**
     * Determine whether the user can create professors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $this->pessoa_type == 'administrador';
    }

    /**
     * Determine whether the user can update the professor.
     *
     * @param  \App\User  $user
     * @param  \App\Professor  $professor
     * @return mixed
     */
    public function update(User $user, Professor $professor, Request $request)
    {
        //
        if($request['matricula']) {
            return $user->pessoa_type == 'administrador';
        }
        return $this->pessoa_type == 'professor';
    }

    /**
     * Determine whether the user can delete the professor.
     *
     * @param  \App\User  $user
     * @param  \App\Professor  $professor
     * @return mixed
     */
    public function delete(User $user, Professor $professor)
    {
        //
        return $this->pessoa_type == 'administrador';
    }
}
