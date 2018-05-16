<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasta extends Model
{
    //
    protected $fillable = [
        'id_equipe',
        'id_estado',
    ];

    public function equipe(){
        return $this->hasOne(Equipe::class, 'id_equipe');
    }

    public function estado(){
        return $this->hasOne(Estado::class, 'id_estado');
    }

    public function documentos(){
        return $this->hasMany(Documento::class, 'id_pasta');
    }
}
