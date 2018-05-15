<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoEquipe extends Model
{
    // classe de normalização n pra n

    protected $fillable = [
        'id_aluno',
        'id_equipe'
    ];


}
