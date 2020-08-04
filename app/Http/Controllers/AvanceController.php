<?php

namespace App\Http\Controllers;

use App\Avance;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // ARREGLAR ESTO DESPUÉS
       if (request('archivo')!=null) {
        $avance = Avance::create([
            'user_id' => request('user_id'),
            'nombre' => request('name'),
            'descripcion' => request('descripcion'),
            'bitacora_id' =>request('bita_id'),
            'ubi_archivo'=>request('archivo')->store('public'),
        ]);
       }else {
        $avance = Avance::create([
            'user_id' => request('user_id'),
            'nombre' => request('name'),
            'descripcion' => request('descripcion'),
            'bitacora_id' =>request('bita_id'),
            'ubi_archivo'=>request('archivo'),
        ]);
           
       }
        
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
