<?php

namespace App\Http\Controllers;

use App\Bitacora;
use App\BitacoraUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function Sodium\compare;
use Illuminate\Database\Seeder;
use App\Http\Controllers\DB;
use App\Http\Requests\BitacoraStoreRequest;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bitacorasOperations.index', [
            'bitacora' => Bitacora::paginate(),
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
        $estudiantes = User::where([['rol', '=', 'Estudiante'],['Disponibilidad', '=', 'Sí']])->get();
        $profesores = User::where([['rol', '=', 'Profesor']])->get();
        return view('bitacorasOperations.create')
        ->with('usuarios',$estudiantes)
        ->with('profesores',$profesores); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BitacoraStoreRequest $request)
    {   

        // creacion de la bitacora como tal.
        $bita = Bitacora::create([
            'titulo' => request('titulo'),
            //'estado' => request('estado'),
            'profesor_id' => $request->input('id_profesor1'),
            'causa_renuncia' => "f"
        ]);

        $bita->save();

        $estudiante1 = $request->input('est1');
        $estudiante2 = $request->input('est2');
        $estudiante3 = $request->input('est3');
        $estudiante4 = $request->input('est4');


        

        $primerEstudiante = User::find($estudiante1);
        $primerEstudiante->Disponibilidad = 'No';
        $primerEstudiante->save();
        $bitacora_user = BitacoraUser::create([
            'user_id' => $estudiante1,
            'bitacora_id' => $bita->id
        ]);

        if($estudiante2 != 0){
            $segundoEstudiante = User::find($estudiante2);
            $segundoEstudiante->Disponibilidad = 'No';
            $segundoEstudiante->save();
            $bitacora_user2 = BitacoraUser::create([
                'user_id' => $estudiante2,
                'bitacora_id' => $bita->id
            ]);
        }

        if($estudiante3 != 0){
            $tercerEstudiante = User::find($estudiante3);
            $tercerEstudiante->Disponibilidad = 'No';
            $tercerEstudiante->save();
            $bitacora_user3 = BitacoraUser::create([
                'user_id' => $estudiante3,
                'bitacora_id' => $bita->id
            ]);
        }

        if($estudiante4 != 0){
            $cuartoEstudiante = User::find($estudiante4);
            $cuartoEstudiante->Disponibilidad = 'No';
            $cuartoEstudiante->save();
            $bitacora_user4 = BitacoraUser::create([
                'user_id' => $estudiante4,
                'bitacora_id' => $bita->id
            ]);
        }
        
        return redirect()->route('bitacora.index');

        /*
        // llamado a la asignacion de las relaciones, no se cae aunque solo pongas un estudiante y un profesor.
        $this->asignUsers(request('id_estudiante1'), $bita);
        $this->asignUsers(request('id_estudiante2'), $bita);
        $this->asignUsers(request('id_estudiante3'), $bita);
        $this->asignUsers(request('id_estudiante4'), $bita);
        $this->asignUsers(request('id_profesor1'), $bita);
        $this->asignUsers(request('id_profesor2'), $bita);

        return redirect()->route('home');
        */
    }

    // asignacion de relacio entre los usuarios y la bitacora, de 1 a 1
    public function asignUsers($id, Bitacora $bitacora)
    {
        if ($id == null) {
            return;
        }
        $user = User::findOrFail($id);
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
    public function update(Bitacora $bitacora)
    {

        $bitacora->update([
            'titulo' => request('titulo')

        ]);

        return redirect()->route('bitacora-show', $bitacora);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function remover(Bitacora $bitacora)
    {
        $bitacora->update([
            'estado' => request('estado')
        ]);
        return redirect()->route('bitacoras-index', $bitacora);
    }

}
