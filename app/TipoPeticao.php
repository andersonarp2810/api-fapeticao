<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPeticao extends Model
{
    //

    protected $fillable = [
        'nome',
        'descricao',
        'modelo' # caminho de um arquivo ?
    ];

    public function peticoes(){
        return $this->belongsToMany(Peticao::class, 'id_tipo_peticao');
    }
}
