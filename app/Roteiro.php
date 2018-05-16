<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roteiro extends Model
{
    //
    protected $fillable = [
        'id_professor',
        'texto'
    ];

    public function professor(){
        return $this->belongsTo(Professor::class, 'id_professor');
    }

}
