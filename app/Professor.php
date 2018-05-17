<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    //
    protected $fillable = [ # devem ser os mesmos atributos da tabela definidos no arquivo de migração 
        'nome', # para que o framework automatize as atribuições
        'matricula'
    ];
    
    public function equipes(){
        return $this->belongsToMany(Equipe::class, 'professor_equipes', 'id_professor', 'id_equipe');
    }

    public function roteiros(){
        return $this->hasMany(Roteiro::class, 'id_professor');
    }
    
    public function usuario(){
        return $this->MorphOne('usuario', 'pessoa');
    }

}
