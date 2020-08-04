<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    protected $guarded = [];
    protected $primaryKey = "id";
    //un avance pertenece a un usuarui

    public function user()
    {
        return $this->belongsTo(User::class)->withTimestamps();
    }

    // una avance pertenece a una bitacora.
    public function bitacora()
    {
        return $this->belongsTo(Bitacora::class)->withTimestamps();
    }

     // una evidencia pertenece a muchos avances
     public function avances()
     {
         return $this->belongsToMany(User::class)->withTimestamps();
     }

    


}
