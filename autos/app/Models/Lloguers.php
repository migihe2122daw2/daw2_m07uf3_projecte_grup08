<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lloguers extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'ID_lloguer';
    public $incrementing = false;
    use HasFactory;

    protected $fillable = [
        'DNI_client',
        'Matricula_auto',
        'Data_prestec',
        'Data_devolucio',
        'Lloc_de_devolucio',
        'Preu_per_dia',
        'Deposit_ple',
        'Tipus_de_asseguranca',
    ];

}
