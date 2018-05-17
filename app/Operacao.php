<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    //
    protected $fillable = [
        'id_usuario',
        'id_tipo_operacao'
    ];

    public function tipo(){
        return $this->belongsTo(TipoOperacao::class, 'id_tipo_operacao');
    }
    
    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario');
    }

}
