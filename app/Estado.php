<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $fillable = [
        'nome',
        'descricao'
    ];

    public function pastas(){
        return $this->hasMany(Pasta::class, 'id_pasta');
    }
}
