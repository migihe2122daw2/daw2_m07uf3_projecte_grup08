<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('lloguers', ControladorLloguers::class);
Route::resource('autos', ControladorAutos::class);
Route::resource('clients', ControladorClients::class);
<<<<<<< HEAD
Route::resource('usuaris', ControladorUsuaris::class);
=======
Route::resource('usuaris', ControladorUsuaris::class);

Route::post('createClient', 'ControladorClients@store');
>>>>>>> 35b6c64827c5ce04be1fdd49411fffda514748c6
