<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

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
        return view('lloguers.index', compact('lloguers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('lloguers');
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
            'Data_prestec' => 'required|max:10',
            'Data_devolucio' => 'required|max:10',
            'Lloc de devolucio' => 'required|max:255',
            'Preu per dia' => 'required|max:255',
            'Deposit ple' => 'required|max:255',
            'Tipus de assegurança' => 'required|max:255',

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

        $lloguer = Lloguers::findOrFail($id);
        return view('ActualitzaLloguers', compact('lloguer'));
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
            'Lloc de devolucio' => 'required|max:255',
            'Preu per dia' => 'required|max:255',
            'Deposit ple' => 'required|max:255',
            'Tipus de assegurança' => 'required|max:255',

        ]);

        Lloguers::where('id', $id)->update($dades);
        return redirect('lloguers')->with('completed', 'Lloguer actualitzat correctament');
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

        $lloguers = Lloguers::findOrFail($id);
        $lloguers->delete();
        return redirect('lloguers')->with('completed', 'Lloguer eliminat correctament');
    }
}
