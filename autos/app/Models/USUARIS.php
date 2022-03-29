<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuaris extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $primaryKey = 'Email';
    public $incrementing = false;

    use HasFactory;
    protected $fillable = [
        'Nom_i_cognoms',
        'Email',
        'password',
        'Tipus_de_usuari',
        'Darrera_hora_de_entrada',
        'Darrera_hora_de_sortida',
    ];

    protected $hidden = [
        'Contrasenya',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  

    

}
