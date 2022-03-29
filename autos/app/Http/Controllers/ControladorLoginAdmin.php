<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControladorLoginAdmin extends Controller
{
    /**
     * Handle an authentication attempt.
     * 
     * @param  \Illuminate\Https\Request  $request
     * @return \Illuminate\Https\RedirectResponse
     */

    public function authenticateA(Request $request)
    {
        $credentials = $request->validate([
            'Email' => 'required|email',
            'Contrasenya' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            // Authentication passed, regenerate session
            // Si es el cap de departament, redirigim a la vista de cap de departament
            if (Auth::user()->Tipus_de_usuari == 'Cap de departament') {
                return redirect()->intended('/admin');
            }
            // Si no, redirigim a la vista de usuari
            else {
                return redirect()->intended('/treballador');
            }
        }

        return back()->withErrors([
            'Email' => 'Email o contrasenya incorrectes.',
        ]);

        
    }

    public function username()
    {
        return 'username';
    }


}
