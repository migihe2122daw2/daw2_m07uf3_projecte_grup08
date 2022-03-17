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
        return view('autos.index', compact('autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('autos');
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
            'Numero de bastidor' => 'required|max:10',
            'Marca' => 'required|max:255',
            'Model' => 'required|max:255',
            'Color' => 'required|max:255',
            'Numero de places' => 'required|max:255',
            'Numero de portes' => 'required|max:255',
            'Grandaria del maleter' => 'required|max:255',
            'Tipo de combustible' => 'required',
            
        ]);
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
            'Numero de bastidor' => 'required|max:10',
            'Marca' => 'required|max:255',
            'Model' => 'required|max:255',
            'Color' => 'required|max:255',
            'Numero de places' => 'required|max:255',
            'Numero de portes' => 'required|max:255',
            'Grandaria del maleter' => 'required|max:255',
            'Tipo de combustible' => 'required',
            
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
