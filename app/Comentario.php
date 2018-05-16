<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $fillable = [
        'id_documento',
        'id_professor',
        'texto',
        'linha'
    ];

    public function documento() {
        return $this->belongsTo(Documento::class, 'id_documento');
    }
    
}
