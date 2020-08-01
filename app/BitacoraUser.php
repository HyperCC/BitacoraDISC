<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraUser extends Model
{   
    protected $table = 'bitacora_users';

    protected $fillable = [
        'bitacora_id', 'user_id',
    ];
}
