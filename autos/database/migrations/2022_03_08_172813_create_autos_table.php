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
            $table->integer('Numero de bastidor');
            $table->string('Marca');
            $table->string('Model');
            $table->string('Color');
            $table->integer('Numero de places');
            $table->integer('Numero de portes');
            $table->float('Grandaria del maleter');
            $table->enum('Tipo de combustible', ['Gasolina', 'Diesel', 'Electric']);

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
