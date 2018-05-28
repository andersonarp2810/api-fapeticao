<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    protected $dateFormat = 'Y-m-d H:i:sO';
    
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
