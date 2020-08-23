<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;
use App\Avance;
use App\Bitacora;
use App\Evidencia;
use App\Http\Requests\SaveEvidenciaRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Avance $avance
     * @return \Illuminate\Http\Response
     */
    public function index( Avance $avance)
    {
        
        return view('comentarioOperations.index', [
            'total_evid' => Avance::all(),
            'avance' => $avance
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param SaveEvidenciaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(Avance $avance)
    {
        
        return view('comentarioOperations.create',[
            'avance' => $avance
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comentario::create([
            'nombre' => request('nombre'),
            'nombre_pofesor' => request('nombre_pofesor'),
            'comentario' => request('comentario'),
            'avance_id' => \request('avance_id')

        ]);

        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
