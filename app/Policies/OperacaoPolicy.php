<?php

namespace App\Policies;

use App\User;
use App\Operacao;
use Illuminate\Auth\Access\HandlesAuthorization;

class OperacaoPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    public function isAdmin(User $user) {
        return $user->pessoa_type == 'administrador';
    }
}
