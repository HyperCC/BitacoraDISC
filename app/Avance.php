<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    protected $guarded = [];
    protected $primaryKey = "id";

    //un avance pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // una evidencia pertenece a una bitacora.
    public function bitacora()
    {
        return $this->belongsTo(Bitacora::class);
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

}
