<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    //
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function documentos(){
        return $this->hasMany(Documento::class, 'id_tipo_documento');
    }
}
