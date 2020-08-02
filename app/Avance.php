<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    //

    // una evidencia pertenece a una bitacora.
    public function bitacora()
    {
        return $this->belongsTo(Bitacora::class)->withTimestamps();
    }

}
