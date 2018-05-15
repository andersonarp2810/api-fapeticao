<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    protected $fillable = [ # devem ser os mesmos atributos da tabela definidos no arquivo de migração 
        'id_usuario',   # para que o framework automatize as atribuições
        'nome',
        'matricula'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id_usuario', 'id');
    }

    public function equipes(){
        return $this->belongsToMany(Equipe::class, 'professor_equipes', 'id_professor', 'id_equipe');
    }
}
