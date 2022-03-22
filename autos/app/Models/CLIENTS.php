<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'DNI_client',
        'Nom_i_cognoms',
        'Edat',
        'Telefon',
        'Adreça',
        'Ciutat',
        'Pais',
        'Email',
        'Número_del_permís_de_conducció',
        'Punts_del_permís_de_conducció',
        'Tipus_de_tajeta',
        'Numero_de_tajeta',
    ];
}
