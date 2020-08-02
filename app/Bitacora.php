<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{

    protected $guarded = [];

    protected $primaryKey = "id";

    // una bitacora pertenece a muchos usuarios
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    // una bitacora tiene muchos avances
    public function avances()
    {
        return $this->hasMany(Avance::class)->withTimestamps();
    }

}
