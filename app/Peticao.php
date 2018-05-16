<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticao extends Model
{
    //
    protected $fillable = [
        'id_tipo_peticao',
        'id_parte_atendida',
        'id_documento',
        'titulo',
        'texto'
    ];

    public function tipo(){
        return $this->hasOne(TipoPeticao::class, 'id_tipo_peticao');
    }

    public function parteAtendida(){
        return $this->hasOne(ParteAtendida::class, 'id_parte_atendida');
    }

    public function documento(){
        return $this->hasOne(Documento::class, 'id_documento');
    }
}
