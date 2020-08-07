<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
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
            'user' => User::all()
        ]);
    }

    public function deleteds()
    {
        return view('usersOperations.deleteds', [
            'user' => User::all()
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
    public function store(SaveUserRequest $request)
    {
        $consulta = DB::select('select name from users where rol=:rol', ['rol' => 'Encargado Titulación']);
        if ($consulta and \request('rol')=='Encargado Titulación') {
            throw ValidationException::withMessages([
                'Ya existe un Encargado de Titulación, debe ingresar otro tipo de Usuarios',
            ]);
        }

        //TODO: en caso de tener doble rol.
        $us = User::create([
            'name' => (\request('name') == null) ? 'usuario' : request('name'),
            'rut' => (\request('rut') == null) ? 'no aplica' : request('rut'),
            'carrera' => \request('carrera'),
            'email' => request('email'),
            'password' => \request('password'),
            'rol' => \request('rol'),
        ], $request->validated());

        $us->fill([
            'password' => Hash::make($us->password)
        ])->save();

        //en caso de que el rol sea encargado de titulacion, el rol secundario sera Profesor.
        if (!strcmp('Encargado Titulación', request('rol'))) {
            $us->fill(['rol_secundario' => 'Profesor']);
            $us->save();
        }

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
        //$user->update($request->validated());

        $theData = \request()->validate([
            'name' => '',
            'email' => 'required|unique:users,email,' . $user->id,
            'rut' => '',
            'carrera' => '',
            'password' => '',
            'rol' => 'required',
        ]);

        if ($theData['password']) {
            $theData['password'] = Hash::make($theData['password']);
        } else {
            unset($theData['password']);
        }

        $user->update($theData);

        if (!strcmp('Encargado Titulación', request('rol'))) {
            $user->update([
                'rol_secundario' => 'Profesor'
            ]);
        } else {
            $user->update([
                'rol_secundario' => 'ninguno'
            ]);
        }

        return redirect()->route('users-show', $user);
    }

    public function remover(User $user)
    {
        $user->update([
            'estado' => request('estado'),
            'disponibilidad' => \request('disponibilidad')
        ]);
        return redirect()->route('users-index', $user);
    }
}
