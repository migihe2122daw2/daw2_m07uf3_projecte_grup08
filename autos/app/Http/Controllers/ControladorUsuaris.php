<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuaris;
use Illuminate\Support\Facades\Hash;
use PDF;

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
            'Nom_i_cognoms' => 'required|string|max:50',
            'Email' => 'required|max:50',
            'password' => 'required|max:50',
            'Tipus_de_usuari' => 'required|max:50',
            'Darrera_hora_de_entrada' => 'required|date_format:H:i',
            'Darrera_hora_de_sortida' => 'required|date_format:H:i',
        ]);

        // Guardem el nou usuari a la base de dades utilitzant seeders
        Usuaris::create([
            'Nom_i_cognoms' => $nouUsuari['Nom_i_cognoms'],
            'Email' => $nouUsuari['Email'],
            'password' => Hash::make($nouUsuari['password']),
            'Tipus_de_usuari' => $nouUsuari['Tipus_de_usuari'],
            'Darrera_hora_de_entrada' => $nouUsuari['Darrera_hora_de_entrada'],
            'Darrera_hora_de_sortida' => $nouUsuari['Darrera_hora_de_sortida'],
        ]);
        
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
        return view('modificaUsuaris', compact('usuaris'));

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

        $usuaris = Usuaris::findOrFail($id);
        // Lee los datos del formulario
        $datos = $request->validate([
            'Nom_i_cognoms' => 'required|string|max:50',
            'Email' => 'required|max:50',
            'password' => 'required|max:50',
            'Tipus_de_usuari' => 'required|max:50',
            'Darrera_hora_de_entrada' => 'required|date_format:H:i:s',
            'Darrera_hora_de_sortida' => 'required|date_format:H:i:s',
        ]);

        $usuaris->update($datos);
        return redirect('/usuaris')->with('Mensaje', 'Usuari modificat correctament');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Email)
    {
        //

        $usuaris = Usuaris::findOrFail($Email);
        $usuaris->delete();
        return redirect('/usuaris')->with('completed', 'Usuari eliminat correctament');
    }

    public function pdf($id){
        $usuaris = Usuaris::findOrFail($id);
        if ($usuaris) {
        $Email = $usuaris->Email;
            $pdf = PDF::loadView('pdfUsuaris', compact('Email'));
            $pdf ->setPaper('A3', 'landscape');
            return $pdf->download('clients.pdf');
        }
        
        return view('pdf', compact('clients'));
    }
}
