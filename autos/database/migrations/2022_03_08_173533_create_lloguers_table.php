<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLloguersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lloguers', function (Blueprint $table) {
            $table->string('DNI_client');
            $table->foreign('DNI_client')->references('DNI_client')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Matricula_auto');
            $table->foreign('Matricula_auto')->references('Matricula_auto')->on('autos')->onDelete('cascade')->onUpdate('cascade');
            $table->date('Data_prestec');
            $table->date('Data_devolucio');
            $table->string('Lloc_de_devolucio');
            $table->float('Preu_per_dia');
            $table->boolean('Deposit_ple');
            $table->enum('Tipus_de_assegurança', ['Franquícia fins a 1000 Euros', 'Franquíca fins 500 Euros', 'Sense franquícia']);
            $table->primary(['DNI_client', 'Matricula_auto']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lloguers');
    }
}
