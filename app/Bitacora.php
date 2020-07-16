<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $fillable = [
        'titulo','id_estudiante','id_profesor','id_registro','estado'
    ];

    protected $primaryKey = "id";

    
}
