<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuaris extends Model
{
    use HasFactory;
    use Enums;
    protected $fillable = [
        'DNI_client',
        'Nom i cognoms',
        'Email',
        'Contrasenya',
    ];

    protected $enumStatuses = [
        'Tipus d\'usuari' => ['Treballador', 'Cap de departament'],
    ];

    protected $dates = [
        'Darrera hora d\'entrada',
        'Darrera hora de sortida',
    ];
}
