<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOperacao extends Model
{
    //
    protected $fillable = [
        'nome',
        'descricao'
    ];


    public function operacoes(){
        return $this->hasMany(Operacao::class, 'id_tipo_operacao');
    }
}
