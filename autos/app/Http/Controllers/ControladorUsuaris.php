<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ususaris;

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

        $usuaris = Ususaris::all();
        return view('usuaris.index', compact('usuaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('usuaris');
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
            'DNI_client' => 'required|unique:usuaris|max:9',
            'Nom i cognoms' => 'required|max:50',
            'Email' => 'required|max:50',
            'Contrasenya' => 'required|max:50',
            'Tipus d\'usuari' => 'required|max:50',
            'Darrera hora d\'entrada' => 'required|max:50',
            'Darrera hora de sortida' => 'required|max:50',
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

        $usuari = Ususaris::findOrFail($id);
        return view('ActualitzaUsuaris', compact('usuari'));

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
            'Nom i cognoms' => 'required|max:50',
            'Email' => 'required|max:50|unique:usuaris',
            'Contrasenya' => 'required|max:50',
            'Tipus d\'usuari' => 'required|max:50',
            'Darrera hora d\'entrada' => 'required|max:50',
            'Darrera hora de sortida' => 'required|max:50',
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

        $usuari = Ususaris::findOrFail($id);
        $usuari->delete();
        return redirect('/usuaris')->with('completed', 'Usuari eliminat correctament');
    }
}
