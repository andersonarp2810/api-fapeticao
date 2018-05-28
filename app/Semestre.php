<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'semestre',
        'area_de_atuacao'
    ];

    public function equipes(){
        return $this->hasMany(Equipe::class, 'id_semestre');
    }
}
