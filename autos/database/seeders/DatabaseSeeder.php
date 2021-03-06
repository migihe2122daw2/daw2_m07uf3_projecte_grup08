<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('usuaris')->insert([
            'Nom_i_cognoms' => '',
            'Email' => '',
            'password' => Hash::make(''),
            'Tipus_de_usuari' => '',
            'Darrera_hora_de_entrada' => '',
            'Darrera_hora_de_sortida' => '',
        ]);
    }



}
