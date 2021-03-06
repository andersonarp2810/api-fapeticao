<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'dono_id',
        'dono_type',
        'uf', 
        'cidade',
        'bairro',
        'logradouro',
        'numero',
        'complemento'
    ];

    protected $hidden = [
    ];

    public function dono(){
        return $this->morphTo();
    }
}
