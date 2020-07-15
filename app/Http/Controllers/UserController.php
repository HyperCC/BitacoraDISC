<?php

namespace App\Http\Controllers;

use App\SaveUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Sodium\compare;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usersOperations.index', [
            'user' => User::paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usersOperations.create', [
            'user' => new User,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        //TODO: en caso de tener doble rol.
        User::create([
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'rol' => request('rol'),
            //'rol_secundario' => request('rol_secundario')
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('usersOperations.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('usersOperations.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $scndRol = 'ninguno';

        if (!strcmp('Encargado Titulación', request('rol'))) {
            $scndRol = 'Profesor';
        }

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'rut' => request('rut'),
            'carrera' => request('carrera'),
            'rol' => request('rol'),
            'rol_secundario' => $scndRol,
            'password' => bcrypt(request('password'))
        ]);

        return redirect()->route('users-show', $user);
    }

    public function remover(User $user)
    {
        $user->update([
            'estado' => request('estado')
        ]);
        return redirect()->route('users-index', $user);
    }
}
