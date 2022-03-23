<?php

namespace App\Models;
use App\Traits\Enums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuaris extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'Nom_i_cognoms',
        'Email',
        'Contrasenya',
        'Tipus_de_usuari',
        'Darrera_hora_de_entrada',
        'Darrera_hora_de_sortida',
    ];
}