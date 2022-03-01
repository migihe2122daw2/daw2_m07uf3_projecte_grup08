<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLLOGUERSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('LLOGUER', function (Blueprint $table) {
            $table->id();
            $table->string('DNI_client');
            $table->string('Matricula_auto');
            $table->date('Data_prestec');
            $table->date('Data_devolucio');
            $table->string('Lloc de devolucio');
            $table->float('Preu per dia');
            $table->boolean('Deposit ple');
            $table->enum('Tipus de assegurança', ['Franquícia fins a 1000 Euros', 'Franquíca fins 500 Euros', 'Sense franquícia']);
            // DNI_client i Matricula_auto son claus primàries
            $table->primary(['DNI_client', 'Matricula_auto']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('LLOGUER');
    }
}
