<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    //
    protected $fillable = [
        'id_semestre'
    ];

    public function semestre(){
        return $this->hasOne(Semestre::class);
    }

    public function alunos(){
        return $this->belongsToMany(Aluno::class, 'aluno_equipes', 'id_equipe', 'id_aluno');
    }

    public function professores(){
        return $this->belongsToMany(Professor::class, 'professor_equipes', 'id_equipe', 'id_professor');
    }
}
