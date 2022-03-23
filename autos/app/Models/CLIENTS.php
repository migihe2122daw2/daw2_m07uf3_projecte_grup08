<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    use Enums;
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
        'Numero_de_tajeta',
    ];
    
    protected $enumStatuses = [
        'Tipus de tajeta' => ['Debit', 'Credit'],
    ];
}
