<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    use HasFactory;
    protected $fillable = [
        'Matricula_auto',
        'Numero de bastidor',
        'Marca',
        'Model',
        'Color',
        'Numero de places',
        'Numero de portes',
        'Grandaria del maleter',
        'Tipo de combustible',
    ];
}
