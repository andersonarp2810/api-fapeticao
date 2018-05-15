<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    //

    protected $fillable = [ # devem ser os mesmos atributos da tabela definidos no arquivo de migração 
        'id_usuario',   # para que o framework automatize as atribuições
        'nome',
        'cadastro_profissional'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id_usuario', 'id'); # um admin tem um usuário
    }
    
}
