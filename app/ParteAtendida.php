<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParteAtendida extends Model
{
    //
    protected $fillable = [
        'name',
        'cpf',
        'rg'
    ];

    public function peticao() {
        return $this->hasMany(Peticao::class);
    }
}
