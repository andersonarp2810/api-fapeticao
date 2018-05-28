<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    //
    protected $dateFormat = 'Y-m-d H:i:sO';

    protected $fillable = [ # devem ser os mesmos atributos da tabela definidos no arquivo de migração 
        'nome', # para que o framework automatize as atribuições
        'matricula'
    ];
    
    public function equipes(){
        return $this->belongsToMany(Equipe::class, 'aluno_equipes');
    }
    
    public function usuario(){
        return $this->MorphOne('usuario', 'pessoa');
    }

}
