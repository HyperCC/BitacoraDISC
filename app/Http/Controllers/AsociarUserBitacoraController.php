<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\User;
use Illuminate\Http\Request;

class AsociarUserBitacoraController extends Controller
{

    public function asociarRoles(Request $request)
    {
        $user = new User;

        $bitacora->users()->attach($user->id);

    }

}
