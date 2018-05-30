<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Defensor extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO'; #pra pegar no postgre
    //
    protected $fillable = [ # devem ser os mesmos atributos da tabela definidos no arquivo de migração 
        'nome', # para que o framework automatize as atribuições
        'cadastro_profissional'
    ];

    public function usuario(){
        return $this->MorphOne(User::class, 'pessoa');
    }
    
}
