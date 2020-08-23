<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $guarded = [];
    protected $primaryKey = "id";

    public function avance()
    {
        return $this->belongsTo(Avance::class);
    }

}
