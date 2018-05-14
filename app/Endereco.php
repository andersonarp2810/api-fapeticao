<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    //
    protected $fillable = [
        'id_dono', 'tipo_dono', 'uf', 'cidade', 'bairro','logradouro', 'numero', 'complemento'
    ];
}
