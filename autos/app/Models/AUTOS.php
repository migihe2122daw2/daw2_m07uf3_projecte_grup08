<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'Matricula_auto',
        'Numero_de_bastidor',
        'Marca',
        'Model',
        'Color',
        'Numero_de_places',
        'Numero_de_portes',
        'Grandaria_del_maleter',
        'Tipo_de_combustible',
    ];
}
