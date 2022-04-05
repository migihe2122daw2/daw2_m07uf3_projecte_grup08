<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lloguers;
use PDF;

class ControladorLloguers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $lloguers = Lloguers::all();
        return view('indexLloguers', compact('lloguers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('creaLloguers');
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
        $nouLloguer = $request->validate([
            'DNI_client' => 'required|unique:lloguers|max:9',
            'Matricula_auto' => 'required|max:10',
            'Data_prestec' => 'required|date|max:10',
            'Data_devolucio' => 'required|date|max:10',
            'Lloc_de_devolucio' => 'required|max:255',
            'Preu_per_dia' => 'required|max:255',
            'Deposit_ple' => 'required|max:255',
            'Tipus_de_asseguranca' => 'required|max:255',
        ]);
        $lloguers = Lloguers::create($nouLloguer);
        return redirect('/lloguers')->with('Mensaje', 'Lloguer creat correctament');
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

        $lloguer = Lloguers::findOrFail($id);
        return view('modificaLloguers', compact('lloguer'));
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
            'DNI_client' => 'required|unique:lloguers|max:9',
            'Matricula_auto' => 'required|max:10',
            'Data_prestec' => 'required|max:10',
            'Data_devolucio' => 'required|max:10',
            'Lloc_de_devolucio' => 'required|max:255',
            'Preu_per_dia' => 'required|max:255',
            'Deposit_ple' => 'required|max:255',
            'Tipus_de_asseguranca' => 'required|max:255',

        ]);

        Lloguers::where('DNI_client', $id)->update($dades);
        return redirect('lloguers')->with('completed', 'Lloguer actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($DNI_client)
    {
        //
        $lloguer = Lloguers::findOrFail($DNI_client);
        $lloguer->delete();
        return redirect('lloguers')->with('completed', 'Lloguer eliminat correctament');
    }

    public function pdf($id){
        $lloguer = Lloguers::findOrFail($id);
        if ($lloguer) {
            $DNI_client = $lloguer->DNI_client;
            $pdf = PDF::loadView('pdfLloguers', compact('DNI_client'));
            $pdf ->setPaper('A3', 'landscape');
            return $pdf->download('lloguers.pdf');
        }
        
        return view('pdf', compact('lloguers'));
    }
}
