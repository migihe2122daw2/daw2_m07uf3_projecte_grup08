<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

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
    if (Auth::check()) {
        if (Auth::user()->Tipus_de_usuari == 'Cap de departament') {
            return view('indexAdmin');
        } else {
            return view('indexTreballador');
        }
        
    }else{
        return view('loginWelcome');
    }
    
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
            

            // Enviar correu amb la hora de entrada
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = '15586419.clot@fje.edu';                     // SMTP username
                $mail->Password   = 'cce07h5f';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('15586419.clot@fje.edu', 'Clot');
                $mail->addAddress('15586419.clot@fje.edu', 'Clot');     // Add a recipient
            
                // Hora española
                date_default_timezone_set('Europe/Madrid');
               
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Entrada';
                $mail->Body    = '<h1>Hola, ' . Auth::user()->Nom_i_cognoms . '</h1>
                                  <p>Has entrat a la plataforma</p>
                                  <p>Hora: ' . date('H:i:s') . '</p>';
                $mail->AltBody = 'Hola, ' . Auth::user()->Nom_i_cognoms . 'Has entrat a la plataforma, hora: ' . date('H:i:s');
                
                $mail->send();
                echo 'Message has been sent';

                // Guardar hora de entrada en la base de dades
                $user = Auth::user();
                $user-> Darrera_hora_de_entrada = date('H:i:s');
                $user->save();
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
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
    // Enviar correu amb la hora de sortida
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '15586419.clot@fje.edu';                     // SMTP username
        $mail->Password   = 'cce07h5f';                               // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('15586419.clot@fje.edu', 'Clot');
        $mail->addAddress('15586419.clot@fje.edu', 'Clot');     // Add a recipient
    
        // Hora española
        date_default_timezone_set('Europe/Madrid');

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Sortida';
        $mail->Body    = '<h1>Hola, ' . Auth::user()->Nom_i_cognoms . '</h1>
                          <p>Has sortit de la plataforma</p>
                          <p>Hora: ' . date('H:i:s') . '</p>';
        $mail->AltBody = 'Hola, ' . Auth::user()->Nom_i_cognoms . 'Has sortit de la plataforma, hora: ' . date('H:i:s');

        $mail->send();
        echo 'Message has been sent';

        // Guardar hora de sortida en la base de dades
        $user = Auth::user();
        $user->Darrera_hora_de_sortida = date('H:i:s');
        $user->save();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    Auth::logout();
    return redirect('/');
});

Route::get('/eliminar', function () {
    // Comprovar que estem loguejats com a cap de departament
    if (Auth::user()->Tipus_de_usuari == 'Cap de departament') {
        // Eliminar totes les dades de les taules
        DB::table('lloguers')->delete();
        DB::table('autos')->delete();
        DB::table('clients')->delete();
        return redirect('/');
    }else
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

