<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    //
    protected $fillable = [
        'id_usuario', 
        'id_tipo_operacao'];
}
