<?php

namespace App\Models;
use App\Traits\Enums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuaris extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'Email';
    public $incrementing = false;

    use HasFactory;
<<<<<<< HEAD
    public $timestamps = false;
=======
>>>>>>> 35b6c64827c5ce04be1fdd49411fffda514748c6
    protected $fillable = [
        'Nom_i_cognoms',
        'Email',
        'Contrasenya',
        'Tipus_de_usuari',
        'Darrera_hora_de_entrada',
        'Darrera_hora_de_sortida',
    ];
<<<<<<< HEAD
}
=======

}
>>>>>>> 35b6c64827c5ce04be1fdd49411fffda514748c6
