<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuaris', function (Blueprint $table) {
            $table->string('Nom_i_cognoms');
            $table->string('Email')->primary();
            $table->string('password');
            $table->enum('Tipus_de_usuari', ['Treballador', 'Cap de departament']);
            $table->time('Darrera_hora_de_entrada');
            $table->time('Darrera_hora_de_sortida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuaris');
    }
}
