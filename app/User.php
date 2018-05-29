<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'pessoa_id',
        'pessoa_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pessoa_id',
        'pessoa_type'
    ];
    
    /**
    * Get the identifier that will be stored in the subject claim of the JWT.
    *
    * @return mixed
    */
   public function getJWTIdentifier()
   {
       return $this->id;
   }

   /**
    * Return a key value array, containing any custom claims to be added to the JWT.
    *
    * @return array
    */
   public function getJWTCustomClaims()
   {
       return [];
   }

   public function pessoa(){
       return $this->morphTo('pessoa', 'type', 'id', 'pessoa_id');
   }

   public function emails(){
       return $this->morphMany('email', 'dono');
   }

   public function enderecos(){
       return $this->morphMany('endereco', 'dono');
   }

   public function telefones(){
       return $this->morphMany('telefone', 'dono');
   }
}
