<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    //
    protected $fillable = [
        'id_dono',
        'id_tipo',
        'telefone'
    ];

}
