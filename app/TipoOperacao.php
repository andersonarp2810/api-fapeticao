<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOperacao extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'nome',
        'descricao'
    ];


    public function operacoes(){
        return $this->hasMany(Operacao::class, 'id_tipo_operacao');
    }
}
