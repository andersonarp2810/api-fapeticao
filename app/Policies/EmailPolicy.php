<?php

namespace App\Policies;

use App\User;
use App\Email;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability) {
        if($user->pessoa_type == 'administrador') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the email.
     *
     * @param  \App\User  $user
     * @param  \App\Email  $email
     * @return mixed
     */
    public function view(User $user, Email $email)
    {
        //
        if($email->dono_type == 'parte') {
            return true;
        } 
        return $user->id == $email->dono_id;
    }

    /**
     * Determine whether the user can create emails.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->id == $email->dono_id;
    }

    /**
     * Determine whether the user can update the email.
     *
     * @param  \App\User  $user
     * @param  \App\Email  $email
     * @return mixed
     */
    public function update(User $user, Email $email)
    {
        //
        if($email->dono_type == 'parte') {
            return true;
        } 
        return $user->id == $email->dono_id;
    }

    /**
     * Determine whether the user can delete the email.
     *
     * @param  \App\User  $user
     * @param  \App\Email  $email
     * @return mixed
     */
    public function delete(User $user, Email $email)
    {
        //
        return $user->id == $email->dono_id;
    }
}
