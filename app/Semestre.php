<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    //
    protected $fillable = [
        'semestre',
        'area_de_atuacao'
    ];

    public function equipes(){
        return $this->hasMany(Equipe::class, 'id_semestre');
    }
}
