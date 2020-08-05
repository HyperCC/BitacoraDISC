<?php

namespace App\Http\Controllers;

use App\Avance;
use App\Evidencia;
use Illuminate\Support\Facades\Auth;
use Response;
use Illuminate\Http\Request;

class AvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avanceOperations.create', [
            'avance' => new Avance,
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
        $avance = null;

        $avance = Avance::create([
            'user_id' => request('user_id'),
            'nombre' => request('name'),
            'descripcion' => request('descripcion'),
            'bitacora_id' => request('bita_id')
        ]);

        if (request('archivo') !== null) {
            Evidencia::create([
                'name_evid' => 'indefinido',
                'ubi_archivo' => request('archivo')->store('public'),
                'name_alumno' => request('name'),
                'avance_id' => $avance->id
            ]);
        }


        return view('home');
    }

    public function getDownload(Evidencia $evidencia)
    {
        //PDF file is stored under project/public/download/info.pdf
        $file = $evidencia->ubi_archivo;

        $headers = array(
            'Content-Type: .*',
        );

        return Response::download($file, 'evidencia', $headers);
    }

    public function createUp()
    {
        return view('avanceOperations.up');
    }

    public function up()
    {
        Evidencia::create([
            'name_evid' => \request('name'),
            'ubi_archivo' => request('archivo')->store('public'),
            'name_alumno' => request('name'),
            'avance_id' => \request('avance')
        ]);
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
