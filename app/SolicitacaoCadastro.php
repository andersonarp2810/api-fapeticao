<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolicitacaoCadastro extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'login',
        'senha',
        'nome',
        'pessoa_tipo',
        'cadastro'
    ];

    protected $hidden = [
        'senha'
    ];
}
