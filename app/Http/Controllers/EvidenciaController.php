<?php

namespace App\Http\Controllers;

use App\Avance;
use App\Bitacora;
use App\Evidencia;
use App\Http\Requests\SaveEvidenciaRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Avance $avance
     * @return \Illuminate\Http\Response
     */
    public function index(Avance $avance)
    {
        return view('evidenciaOperations.index', [
            'total_evid' => Evidencia::all(),
            'avance' => $avance
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param SaveEvidenciaRequest $request
     * @return \Illuminate\Http\Response
     */
    // SUBIR UNA EVIDENCIA PARA ALGUN AVANCE
    public function create( )
    {
        return view('evidenciaOperations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveEvidenciaRequest $request)
    {
        Evidencia::create([
            'ubi_archivo' => request('archivo')->store('public'),
            'name_alumno' => request('name_user'),
            'name_evid' => \request('name_evid'),
            'avance_id' => \request('avance_id')
        ], $request->validated());

        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
