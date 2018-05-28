<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessorEquipe extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    // classe de normalização n pra n

    protected $fillable = [
        'id_professor',
        'id_equipe'
    ];
}
