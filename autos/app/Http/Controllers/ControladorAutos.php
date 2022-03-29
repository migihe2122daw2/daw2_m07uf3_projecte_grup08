<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autos;
use PDF;

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
        return view('modificaAutos', compact('auto'));
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

        $dadesAuto = $request->validate([
            'Matricula_auto' => 'required|max:10',
            'Numero_de_bastidor' => 'required|max:10',
            'Marca' => 'required|max:255',
            'Model' => 'required|max:255',
            'Color' => 'required|max:255',
            'Numero_de_places' => 'required|max:255',
            'Numero_de_portes' => 'required|max:255',
            'Grandaria_del_maleter' => 'required|max:255',
            'Tipo_de_combustible' => 'required',  
        ]);

        Autos::where('Matricula_auto', $id)->update($dadesAuto);

        // Si existeix un lloguer amb aquest auto, actualitzar les dades del auto a la taula lloguers
        $lloguer = \App\Models\Lloguers::where('Matricula_auto', $id)->first();
        if ($lloguer) {
            $lloguer->Matricula_auto = $dades['Matricula_auto'];
            $lloguer->Numero_de_bastidor = $dades['Numero_de_bastidor'];
            $lloguer->Marca = $dades['Marca'];
            $lloguer->Model = $dades['Model'];
            $lloguer->Color = $dades['Color'];
            $lloguer->Numero_de_places = $dades['Numero_de_places'];
            $lloguer->Numero_de_portes = $dades['Numero_de_portes'];
            $lloguer->Grandaria_del_maleter = $dades['Grandaria_del_maleter'];
            $lloguer->Tipo_de_combustible = $dades['Tipo_de_combustible'];
            $lloguer->save();

        }
    
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
        $lloguers = Lloguers::where('id_auto', $id)->get();
        foreach ($lloguers as $lloguer) {
            $lloguer->delete();
        }
        return redirect('/autos')->with('completed', 'Auto eliminat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf(){
        // Recuperar todos los autos de la base de datos
        $autos = Autos::all();
        view()->share('autos', $autos);
        $pdf = \PDF::loadView('indexAutos');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('autos.pdf');
    }
}
