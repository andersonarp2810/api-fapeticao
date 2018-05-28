<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'id_equipe',
        'id_estado',
    ];

    public function documentos(){
        return $this->hasMany(Documento::class, 'id_pasta');
    }
    
    public function equipe(){
        return $this->belongsTo(Equipe::class, 'id_equipe');
    }

    public function estado(){
        return $this->belongsTo(Estado::class, 'id_estado');
    }

}
