<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $dateFormat = 'Y-m-d H:i:sO';
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
