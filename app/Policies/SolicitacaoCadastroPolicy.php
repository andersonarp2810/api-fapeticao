<?php

namespace App\Policies;

use App\User;
use App\SolicitacaoCadastro;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolicitacaoCadastroPolicy
{
    use HandlesAuthorization;

    public function isAdmin(User $user) // qualquer um pode criar uma solicitação mas só o admin faz o resto
    {
        return $user->pessoa_type == 'administrador';
    }

}
