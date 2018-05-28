<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoEquipe extends Model
{
    // classe de normalização n pra n
    protected $dateFormat = 'Y-m-d H:i:sO';

    protected $fillable = [
        'id_aluno',
        'id_equipe'
    ];


}
