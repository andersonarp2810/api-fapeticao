<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defensor extends Model
{
    //
    protected $fillable = [ # devem ser os mesmos atributos da tabela definidos no arquivo de migração 
        'nome', # para que o framework automatize as atribuições
        'cadastro_profissional'
    ];

    public function usuario(){
        return $this->MorphOne('usuario', 'pessoa');
    }
    
}
