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
            $table->string('Nom i cognoms');
            $table->string('Email')->primary();
            $table->string('Contrasenya');
            $table->enum('Tipus de usuari', ['Treballador', 'Cap de departament']);
            $table->date('Darrera hora d\'entrada');
            $table->date('Darrera hora de sortida');
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
