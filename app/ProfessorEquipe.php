<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorEquipe extends Model
{
    // classe de normalização n pra n

    protected $fillable = [
        'id_professor',
        'id_equipe'
    ];
}
