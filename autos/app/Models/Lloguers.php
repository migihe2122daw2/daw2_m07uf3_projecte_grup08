<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lloguers extends Model
{
    use HasFactory;
    use Enums;
    protected $fillable = [
        'DNI_client',
        'Matricula_auto',
        'Data_prestec',
        'Data_devolucio',
        'Lloc de devolucio',
        'Preu per dia',
        'Deposit ple',
        'Tipus de assegurança',
    ];

    protected $enumStatuses = [
        'Tipus de assegurança' => ['Franquícia fins a 1000 Euros', 'Franquícia fins 500 Euros', 'Sense franquícia'],
    ];
}
