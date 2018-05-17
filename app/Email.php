<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    protected $fillable = [
        'id_dono',
        'tipo_dono',
        'email'
    ];
    
}
