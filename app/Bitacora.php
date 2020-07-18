<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    protected $fillable = [
        'titulo', 'id_estudiante', 'id_profesor', 'id_registro', 'estado'
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
