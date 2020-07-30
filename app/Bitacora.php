<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{

    protected $guarded = [];

    protected $primaryKey = "id";

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}
