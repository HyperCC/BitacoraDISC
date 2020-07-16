<?php

namespace App\Http\Controllers;
use App\Bitacora;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        return view('bitacorass.index', [
        'bitacora' => Bitacora::paginate()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bitacorass.create', [
            'bitacora' => new Bitacora,
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
        Bitacora::create([
            'titulo' => request('titulo'),
            'id_estudiante' => request('id_estudiante'),
            'id_profesor' => request('id_profesor'),
            
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bitacora $bitacora)
    {
        return view('bitacorass.show', [
            'bitacora' => $bitacora
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bitacora $bitacora)
    {
        return view('bitacorass.edit', [
            'bitacora' => $bitacora
        ]);
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
       
       $bitacora->update([
            'titulo' => request('titulo')
          
        ]);

        return redirect()->route('bitacora-show', $bitacora);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remover(Bitacora $bitacora)
    {
        $bitacora->update([
            'estado' => request('estado')
        ]);
        return redirect()->route('bitacoras-index', $bitacora);
    }
    // public function destroy($id)
    // {
    //     //
    // }
}
