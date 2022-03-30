<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('loginWelcome');
});

Route::get('/loginAdmin', function () {
    return view('loginAdmin');
})->name('loginAdmin');
Route::post('/loginAdmin', function (Request $request) {
    
    $credentials = $request->validate([
        'Email' => 'required|email',
        'password' => 'required'
    ]);
    
    if (Auth::attempt($credentials)) {
    
        if (Auth::user()->Tipus_de_usuari == 'Cap de departament') {
        
           // Iniciar una session con el usuario

           session_start();
           session_regenerate_id();
              $_SESSION['user'] = Auth::user()->Nom_i_cognoms;
            
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
    
});

Route::get('/admin', function () {
    return view('indexAdmin');
})->name('admin');

Route::get('/treballador', function () {
    return view('indexTreballador');
})->name('treballador');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/autos/{id}/pdf', 'ControladorAutos@pdf')->name('autos.pdf');
Route::get('/clients/{id}/pdf', 'ControladorClients@pdf')->name('clients.pdf');
Route::get('/usuaris/{id}/pdf', 'ControladorUsuaris@pdf')->name('usuaris.pdf');
Route::get('/lloguers/{id}/pdf', 'ControladorLloguers@pdf')->name('lloguers.pdf');

Route::resource('lloguers', ControladorLloguers::class);
Route::resource('autos', ControladorAutos::class);
Route::resource('clients', ControladorClients::class);
Route::resource('usuaris', ControladorUsuaris::class);

