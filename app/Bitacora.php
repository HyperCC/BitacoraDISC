<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $fillable = [
<<<<<<< HEAD
        'titulo', 'id_estudiante', 'id_profesor', 'id_registro', 'estado'
=======
        'titulo','id_estudiante1','id_estudiante2','id_estudiante3','id_estudiante4','id_profesor1','id_profesor2','id_registro','estado'
>>>>>>> 06bf21697b33e27942e3bb4a2ecb3c163bf68254
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

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // protected $primaryKey = "id";


}
