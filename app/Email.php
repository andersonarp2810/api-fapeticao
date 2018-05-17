<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    protected $fillable = [
        'dono_id',
        'dono_type',
        'email'
    ];

    protected $hidden = [
        'dono_id',
        'dono_type',
    ];

    public function dono(){
        return $this->morphTo();
    }
}
