<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    //
    protected $fillable = [
        'id_pasta',
        'id_tipo_documento',
        'nome',
        'caminho',
    ];

    public function pasta() {
        return $this->belongsTo(Pasta::class);
    }

    public function tipo() {
        return $this->hasOne(TipoDocumento::class);
    }

    public function comentario() {
        return $this->hasMany(Comentario::class);
    }
}
