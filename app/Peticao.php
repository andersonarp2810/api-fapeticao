<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peticao extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'id_tipo_peticao',
        'id_parte_atendida',
        'id_documento',
        'titulo',
        'texto'
    ];

    public function documento(){
        return $this->hasOne(Documento::class, 'id_documento');
    }

    public function parteAtendida(){
        return $this->belongsTo(ParteAtendida::class, 'id_parte_atendida');
    }


    public function tipo(){
        return $this->belongsTo(TipoPeticao::class, 'id_tipo_peticao');
    }

}
