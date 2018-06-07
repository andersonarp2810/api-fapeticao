<?php

namespace App\Policies;

use App\User;
use App\TipoOperacao;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoOperacaoPolicy
{
    use HandlesAuthorization;

    public function isAdmin(User $user){
        return $user->type == 'administrador';
    }
    
}
