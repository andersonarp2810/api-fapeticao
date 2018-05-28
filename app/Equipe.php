<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'id_semestre'
    ];

    public function alunos(){
        return $this->belongsToMany(Aluno::class, 'aluno_equipes', 'id_equipe', 'id_aluno');
    }

    public function pastas() {
        return $this->hasMany(Pasta::class, 'id_pasta');
    }
    
    public function professores(){
        return $this->belongsToMany(Professor::class, 'professor_equipes', 'id_equipe', 'id_professor');
    }

    public function semestre(){
        return $this->belongsTo(Semestre::class, 'id_semestre');
    }

}
