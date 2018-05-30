<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function pastas(){
        return $this->hasMany(Pasta::class, 'id_estado');
    }
}
