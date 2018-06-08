<?php

namespace App\Policies;

use App\User;
use App\Aluno;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlunoPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the aluno.
     *
     * @param  \App\User  $user
     * @param  \App\Aluno  $aluno
     * @return mixed
     */
    public function view(User $user, Aluno $aluno)
    {
        //
        return $user->pessoa_type == 'aluno';
    }

    /**
     * Determine whether the user can create alunos.
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
     * Determine whether the user can update the aluno.
     *
     * @param  \App\User  $user
     * @param  \App\Aluno  $aluno
     * @return mixed
     */
    public function update(User $user, Aluno $aluno, Request $request)
    {
        //
        if($request['matricula']) {
            return $user->pessoa_type == 'administrador';
        }
        return $user->pessoa_type == 'aluno';
    }

    /**
     * Determine whether the user can delete the aluno.
     *
     * @param  \App\User  $user
     * @param  \App\Aluno  $aluno
     * @return mixed
     */
    public function delete(User $user, Aluno $aluno)
    {
        //
        return $user->pessoa_type == 'administrador';
    }
}
