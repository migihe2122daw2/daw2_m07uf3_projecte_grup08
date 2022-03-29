<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsuarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Usuaris::create([
            'Nom_i_cognoms' => '',
            'Email' => '',
            'password' => '',
            'Tipus_de_usuari' => '',
            'Darrera_hora_de_entrada' => '',
            'Darrera_hora_de_sortida' => '',
        ]);

    }
}
