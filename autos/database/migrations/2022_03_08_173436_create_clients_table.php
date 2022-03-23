<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string('DNI_client', 9)->primary();
            $table->string('Nom_i_cognoms');
            $table->string('Edat');
            $table->string('Telefon');
            $table->string('Adreça');
            $table->string('Ciutat');
            $table->string('Pais');
            $table->string('Email');
            $table->string('Número_del_permís_de_conducció');
            $table->integer('Punts_del_permís_de_conducció');
            $table->enum('Tipus_de_tajeta', ['Debit', 'Credit']);
            $table->integer('Numero_de_tajeta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
