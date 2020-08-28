<?php

namespace App\Http\Controllers;

use App\Avance;
use App\Bitacora;
use App\BitacoraUser;
use App\Http\Requests\SaveBitacoraRequest;
use App\Mail\NotificationToMail;
use App\Notifications\NotificateComentario;
use App\Notifications\NotificateFinalizacion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use function Sodium\add;
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
        return (Auth::user()->rol == 'Admin' or Auth::user()->rol == 'Encargado Titulación'
            or Auth::user()->rol == 'Secretaria') ?
            view('bitacorasOperations.index', ['bitacoras' => Bitacora::all()])
            : view('bitacorasOperations.index', ['bitacoras' => Auth::user()->bitacoras]);
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

        return redirect()->route('home')->with('flash', 'Bitacora ' . $bita->titulo . ' agregada correctamente!');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Bitacora $bitacora)
    {
        $estudiantes = DB::select('select * from users where rol=:rol and disponibilidad=:disp', ['rol' => 'Estudiante', 'disp' => 'Si']);
        $profesores = User::all();

        $profeDisponibles = $profesores->diff($bitacora->users);

        $bitaProfes = 0;
        foreach ($bitacora->users as $user) {
            if ($user->rol == 'Profesor' || $user->rol == 'Encargado Titulación') {
                $bitaProfes++;
            }
        }

        return view('bitacorasOperations.edit', [
            'bitacora' => $bitacora,
            'estudiantes' => $estudiantes,
            'profesores' => $profeDisponibles,
            'bitaProfes' => $bitaProfes
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

        return redirect()->route('bitacoras-show', $bitacora)->with('flash', 'Bitacora ' . $bitacora->titulo . ' actualizado correctamente!');
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

        // usuarios para recibir notificaciones sobre la bitacora
        $users = $bitacora->users;

        // enviar notificacion
        foreach ($users as $us)
            if (\auth()->user()->id !== $us->id) {
                $us->notify(new NotificateFinalizacion($bitacora->titulo));
                //Mail::to($us->email)->queue(new NotificationToMail);
            }

        return redirect()->route('bitacoras-index', $bitacora)->with('flash', 'Bitacora ' . $bitacora->titulo . ' finalizada correctamente!');
    }

    public function borrarRelacionProfesor(Bitacora $bitacora)
    {
        $cantProfes = 0;

        // contar el total de personas dentro de la bitacora para validar su cantidad
        foreach ($bitacora->users as $user) {
            if ($user->rol == ('Profesor' || 'Encargado Titulación'))
                $cantProfes++;
        }
    }


    /**
     * @param Bitacora $bitacora
     * @return \Illuminate\Http\RedirectResponse
     */
    public function borrarRelacion(Bitacora $bitacora)
    {

        $cantProfes = 0;
        $cantAlumnos = 0;

        // contar el total de personas dentro de la bitacora para validar su cantidad
        foreach ($bitacora->users as $user) {
            if ($user->rol == 'Profesor' || $user->rol == 'Encargado Titulación')
                $cantProfes++;

            if ($user->rol == 'Estudiante')
                $cantAlumnos++;
        }

        // el usuario a eliminar
        $estudiante = User::find(\request('user_id'));

        // validar la cantidad de integrantes en bitacora
        if ($estudiante->rol == 'Estudiante') {
            if ($cantAlumnos <= 1) {
                throw ValidationException::withMessages([
                    'No se puede eliminar el Estudiante, ya que al menos debe haber 1',
                ]);
            }
        }

        if ($estudiante->rol == 'Profesor' || $estudiante->rol == 'Encargado Titulación') {
            if ($cantProfes <= 1) {
                throw ValidationException::withMessages([
                    'No se puede eliminar el Profesor, ya que al menos debe haber 1',
                ]);
            }
        }

        // borrar la relacion entre usaurio y bitacora
        $relacion = BitacoraUser::where([['bitacora_id', '=', $bitacora->id]])->where([['user_id', '=', \request('user_id')]])->get()->each->delete();

        $estudiante->update([
            'disponibilidad' => 'Si'
        ]);
        //$estudiante->save();

        return redirect()->route('bitacoras-edit', $bitacora->id)->with('flash', 'Usuario ' . $estudiante->name . ' borrado de la Bitacora ' . $bitacora->titulo . ' correctamente!');
    }

    /**
     * @param Bitacora $bitacora
     * @return \Illuminate\Http\RedirectResponse
     */
    public function relacionarProfesor(Bitacora $bitacora)
    {
        $bitacora = Bitacora::find(\request('bitacora_id'));
        $profesor = User::find(request('id_profe'));

        // agregar la nueva relacion
        $relacion = BitacoraUser::create([
            'bitacora_id' => \request('bitacora_id'),
            'user_id' => \request('id_profe')
        ]);

        return redirect()->route('bitacoras-edit', $bitacora->id)->with('flash', 'Nuevo Profesor ' . $profesor->name . ' agregado a la Bitacora ' . $bitacora->titulo . ' correctamente!');
    }
}
