<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            
            $table->string('Matricula_auto')->primary();
            $table->integer('Numero_de_bastidor');
            $table->string('Marca');
            $table->string('Model');
            $table->string('Color');
            $table->integer('Numero_de_places');
            $table->integer('Numero_de_portes');
            $table->float('Grandaria_del_maleter');
            $table->enum('Tipo_de_combustible', ['Gasolina', 'Diesel', 'Electric']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('autos');
    }
}
