<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParteAtendida extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
    //
    protected $fillable = [
        'name',
        'cpf',
        'rg'
    ];

    public function peticao() {
        return $this->hasMany(Peticao::class, 'id_parte_atendida');
    }
    
   public function email(){
        return $this->morphMany('email', 'dono');
    }

    public function enderecos(){
        return $this->morphMany('endereco', 'dono');
    }

    public function telefones(){
        return $this->morphMany('telefone', 'dono');
    }

}
