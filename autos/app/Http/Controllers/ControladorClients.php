<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ControladorClients extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $clients = Clients::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('clients');
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

        $nouClient = $request->validate([
            'DNI_client' => 'required|unique:clients|max:9',
            'Nom i cognoms' => 'required|max:50',
            'Edat' => 'required|max:2',
            'Telefon' => 'required|max:9',
            'Adreça' => 'required|max:50',
            'Ciutat' => 'required|max:50',
            'Pais' => 'required|max:50',
            'Email' => 'required|max:50',
            'Número del permís de conducció' => 'required|max:9',
            'Punts del permís de conducció' => 'required|max:2',
            'Tipus de tajeta' => 'required|max:50',
            'Numero de tajeta' => 'required|max:16',
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

        $client = Clients::findOrFail($id);
        return view('ActualitzaClients', compact('client'));
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
            'DNI_client' => 'required|unique:clients|max:9',
            'Nom i cognoms' => 'required|max:50',
            'Edat' => 'required|max:2',
            'Telefon' => 'required|max:9',
            'Adreça' => 'required|max:50',
            'Ciutat' => 'required|max:50',
            'Pais' => 'required|max:50',
            'Email' => 'required|max:50',
            'Número del permís de conducció' => 'required|max:9',
            'Punts del permís de conducció' => 'required|max:2',
            'Tipus de tajeta' => 'required|max:50',
            'Numero de tajeta' => 'required|max:16',
        ]);

        Clients::where('id', $id)->update($dades);
        return redirect('/clients')->with('completed', 'Client actualitzat correctament');
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

        $clients = Clients::findOrFail($id);
        $clients->delete();
        return redirect('/clients')->with('completed', 'Client eliminat correctament');
    }
}
