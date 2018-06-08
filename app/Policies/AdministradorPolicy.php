<?php

namespace App\Policies;

use App\User;
use App\Administrador;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdministradorPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    public function idAdmin(User $user) {
        return $user->pessoa_type == 'administrador';
    }
}
