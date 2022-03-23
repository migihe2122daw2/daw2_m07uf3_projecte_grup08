<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\USUARIS;

class ControladorUsuaris extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuaris = Usuaris::all();
        return view('indexUsuaris', compact('usuaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('creaUsuaris');
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

        $nouUsuari = $request->validate([
            'Nom_i_cognoms' => 'required|max:50',
            'Email' => 'required|max:50',
            'Contrasenya' => 'required|max:50',
            'Tipus_de_usuari' => 'required|max:50',
            'Darrera_hora_de_entrada' => 'required|date_format:H:i',
            'Darrera_hora_de_sortida' => 'required|date_format:H:i',
        ]);

        Usuaris::create($nouUsuari);
        return redirect('/usuaris')->with('Mensaje', 'Usuari creat correctament');
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

        $usuaris = Usuaris::findOrFail($id);
        return view('ActualitzaUsuaris', compact('usuaris'));
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
            'DNI_client' => 'required|unique:usuaris|max:9',
            'Nom_i_cognoms' => 'required|max:50',
            'Email' => 'required|max:50',
            'Contrasenya' => 'required|max:50',
            'Tipus_d\'usuari' => 'required|max:50',
            'Darrera_hora_d\'entrada' => 'required|date_format:H:i',
            'Darrera_hora_de_sortida' => 'required|date_format:H:i',
        ]);

        Usuaris::where('id', $id)->update($dades);
        return redirect('/usuaris')->with('completed', 'Usuari actualitzat correctament');
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

        $usuaris = Usuaris::findOrFail($id);
        $usuaris->delete();
        return redirect('/usuaris')->with('completed', 'Usuari eliminat correctament');
    }
}