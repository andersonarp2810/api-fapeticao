<?php

namespace App\Policies;

use App\User;
use App\TipoDocumento;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoDocumentoPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    public function isProfessor(User $user){
        return $user->pessoa_type == 'professor';
    }
}
