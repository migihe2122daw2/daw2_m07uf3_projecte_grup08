<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autos;

class ControladorAutos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $autos = Autos::all();
        return view('indexAutos', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('creaAutos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $nouAuto = $request->validate([
            'Matricula_auto' => 'required|unique:autos',
            'Numero_de_bastidor' => 'required|max:10',
            'Marca' => 'required|max:255',
            'Model' => 'required|max:255',
            'Color' => 'required|max:255',
            'Numero_de_places' => 'required|max:255',
            'Numero_de_portes' => 'required|max:255',
            'Grandaria_del_maleter' => 'required|max:255',
            'Tipo_de_combustible' => 'required',  
        ]);
        $autos = Autos::create($nouAuto);
        return redirect('/autos')->with('Mensaje', 'Auto creat correctament');
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

        $auto = Autos::findOrFail($id);
        return view('ActualitzaAutos', compact('auto'));
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

        $dades = $request->validate([
            'Matricula_auto' => 'required|unique:autos',
            'Numero_de_bastidor' => 'required|max:10',
            'Marca' => 'required|max:255',
            'Model' => 'required|max:255',
            'Color' => 'required|max:255',
            'Numero_de_places' => 'required|max:255',
            'Numero_de_portes' => 'required|max:255',
<<<<<<< HEAD
            'Grandaria_del_maleter' => 'required|max:255',
=======
            'Grandari_del_maleter' => 'required|max:255',
>>>>>>> 35b6c64827c5ce04be1fdd49411fffda514748c6
            'Tipo_de_combustible' => 'required',
            
        ]);

        Autos::where('id', $id)->update($dades);
        return redirect('/autos')->with('completed', 'Auto actualitzat correctament');
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
        $autos = Autos::findOrFail($id);
        $autos->delete();
        return redirect('/autos')->with('completed', 'Auto eliminat correctament');
    }
}
