<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\BitacoraUser;
use App\Http\Requests\SaveBitacoraRequest;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use function Sodium\compare;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (Auth::user()->rol == 'Admin' or Auth::user()->rol == 'Encargado Titulación' or Auth::user()->rol == 'Secretaria') ? view('bitacorasOperations.index', ['bitacoras' => Bitacora::all()]) : view('bitacorasOperations.index', ['bitacoras' => Auth::user()->bitacoras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = User::where([['rol', '=', 'Estudiante'], ['Disponibilidad', '=', 'Si']])->get();
        $profesores = User::where([['rol', '=', 'Encargado Titulación']])->orWhere([['rol', '=', 'Profesor']])->get();

        return view('bitacorasOperations.create')->with('estudiantes', $estudiantes)->with('profesores', $profesores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveBitacoraRequest $request)
    {
        //validar ue se ha ingresado al menos a el estudiante 1 y el profesor 1
        if (request('id_estudiante1') == 'Seleccione' or request('id_profesor1') == 'Seleccione') {
            throw ValidationException::withMessages([
                'Debe ingresar al menos al Estudiante 1 y el Profesor 1',
            ]);
        }

        // creacion de la bitacora como tal.
        $bita = Bitacora::create([
            'titulo' => request('titulo'),
            'estado' => 'Activa',
            'causa_renuncia' => 'ninguna'
        ], $request->validated());

        $bita->Save();

        // llamado a la asignacion de las relaciones, no se cae aunque solo pongas un estudiante y un profesor.
        $this->asignUsers(request('id_estudiante1'), $bita);
        $this->asignUsers(request('id_estudiante2'), $bita);
        $this->asignUsers(request('id_estudiante3'), $bita);
        $this->asignUsers(request('id_estudiante4'), $bita);
        $this->asignUsers(request('id_profesor1'), $bita);
        $this->asignUsers(request('id_profesor2'), $bita);

        return redirect()->route('home');
    }

    // asignacion de relacio entre los usuarios y la bitacora, de 1 a 1
    public function asignUsers($id, Bitacora $bitacora)
    {
        // de no tener valor id recibido.
        if ($id == null) {
            return;
        }

        // id de usuario validado por la seleccion en vista.
        $user = User::find($id);
        if ($user == null) {
            return;
        }

        // actualizacion para estudiantes
        if ($user->rol == 'Estudiante') {
            $user->disponibilidad = 'No';
        }

        $user->save();

        $bitacora->users()->attach($user);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bitacora $bitacora)
    {
        return view('bitacorasOperations.show', [
            'bitacora' => $bitacora
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bitacora $bitacora)
    {
        return view('bitacorasOperations.edit', [
            'bitacora' => $bitacora
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveBitacoraRequest $request, Bitacora $bitacora)
    {
       
        $bitacora->update([
            'titulo' => request('titulo'),
            'estado' => \request('estado'),
            'causa_renuncia' => 'ninguna'
        ], $request->validated());

        return redirect()->route('bitacoras-show', $bitacora);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function remover(Bitacora $bitacora)
    {
        //Todo
        $nuevoEstado = "Activa";
        $nuevaRazon = "ninguna";
        if (\request('estado') == 'Finalizada') {
            $nuevoEstado = \request('estado');
            $nuevaRazon = \request('causaRenuncia');
        }

        $bitacora->update([
            'estado' => $nuevoEstado,
            'causa_renuncia' => $nuevaRazon
        ]);

        return redirect()->route('bitacoras-index', $bitacora);
    }

}
