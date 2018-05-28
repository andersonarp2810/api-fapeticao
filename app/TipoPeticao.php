<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPeticao extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //

    protected $fillable = [
        'nome',
        'descricao',
        'modelo' # caminho de um arquivo ?
    ];

    public function peticoes(){
        return $this->hasMany(Peticao::class, 'id_tipo_peticao');
    }
}
