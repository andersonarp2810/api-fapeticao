<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'id_pasta',
        'id_tipo_documento',
        'nome',
        'caminho',
    ];

    public function comentario() {
        return $this->hasMany(Comentario::class, 'id_documento');
    }
    
    public function pasta() {
        return $this->belongsTo(Pasta::class, 'id_pasta');
    }

    public function tipo() {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento');
    }

}
