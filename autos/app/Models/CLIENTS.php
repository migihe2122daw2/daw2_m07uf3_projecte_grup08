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
        'Nom i cognoms',
        'Edat',
        'Telefon',
        'Adreça',
        'Ciutat',
        'Pais',
        'Email',
        'Número del permís de conducció',
        'Punts del permís de conducció',
        'Numero de tajeta',
    ];
    
    protected $enumStatuses = [
        'Tipus de tajeta' => ['Debit', 'Credit'],
    ];
}
