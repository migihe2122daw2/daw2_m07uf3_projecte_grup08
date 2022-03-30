<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use PDF;

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
        return view('indexClients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('creaClients');
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
            'Nom_i_cognoms' => 'required|max:50',
            'Edat' => 'required|max:2',
            'Telefon' => 'required|max:9',
            'Adreça' => 'required|max:50',
            'Ciutat' => 'required|max:50',
            'Pais' => 'required|max:50',
            'Email' => 'required|max:50',
            'Número_del_permís_de_conducció' => 'required|max:9',
            'Punts_del_permís_de_conducció' => 'required|max:2',
            'Tipus_de_tajeta' => 'required|max:50',
            'Numero_de_tajeta' => 'required|max:16',
        ]);
        $Clients = Clients::create($nouClient);
        return redirect('/clients')->with('Mensaje', 'Client creat correctament');
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
        return view('modificaClients', compact('client'));
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

        // El dni no debe se unico
        $dadesClient = $request->validate([
            'DNI_client' => 'required|max:9',
            'Nom_i_cognoms' => 'required|max:50',
            'Edat' => 'required|max:2',
            'Telefon' => 'required|max:9',
            'Adreça' => 'required|max:50',
            'Ciutat' => 'required|max:50',
            'Pais' => 'required|max:50',
            'Email' => 'required|max:50',
            'Número_del_permís_de_conducció' => 'required|max:9',
            'Punts_del_permís_de_conducció' => 'required|max:2',
            'Tipus_de_tajeta' => 'required|max:50',
            'Numero_de_tajeta' => 'required|max:16',
        ]);

        Clients::where('DNI_client', $id)->update($dadesClient);

        // Si existeix un lloguer amb aquest client, actualitzar les dades del client a la taula lloguers
        $lloguer = \App\Models\Lloguers::where('DNI_client', $id)->first();
        if ($lloguer) {
            $lloguer->DNI_client = $dades['DNI_client'];
            $lloguer->Nom_i_cognoms = $dades['Nom_i_cognoms'];
            $lloguer->Edat = $dades['Edat'];
            $lloguer->Telefon = $dades['Telefon'];
            $lloguer->Adreça = $dades['Adreça'];
            $lloguer->Ciutat = $dades['Ciutat'];
            $lloguer->Pais = $dades['Pais'];
            $lloguer->Email = $dades['Email'];
            $lloguer->Número_del_permís_de_conducció = $dades['Número_del_permís_de_conducció'];
            $lloguer->Punts_del_permís_de_conducció = $dades['Punts_del_permís_de_conducció'];
            $lloguer->Tipus_de_tajeta = $dades['Tipus_de_tajeta'];
            $lloguer->Numero_de_tajeta = $dades['Numero_de_tajeta'];
            $lloguer->save();
        }

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
        $lloguers = Lloguers::where('id_client', $id)->get();
        foreach ($lloguers as $lloguer) {
            $lloguer->delete();
        }
        return redirect('/clients')->with('completed', 'Client eliminat correctament');
    }

    public function pdf($id){
        $client = Clients::findOrFail($id);
        if ($client) {
            $dni = $client->DNI_client;
            $pdf = PDF::loadView('pdfClients', compact('dni'));
            $pdf ->setPaper('A2', 'landscape');
            return $pdf->download('client.pdf');
        }
        return view('pdf', compact('autos'));
    }
 
}

