<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $fillable = [
        'titulo','id_estudiante1','id_estudiante2','id_estudiante3','id_estudiante4','id_profesor1','id_profesor2','id_registro','estado'
    ];
     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    // protected $primaryKey = "id";

    
}
