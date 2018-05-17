<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
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
        'dono_id',
        'dono_type',
    ];

    public function dono(){
        return $this->morphTo();
    }
}
