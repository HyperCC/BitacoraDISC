<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BitacoraUser extends Model
{
    protected $table = 'bitacora_user';
    protected $primaryKey = 'id';
    protected $guarded = [];

}
