<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCLIENTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CLIENTS', function (Blueprint $table) {
            $table->id();
            $table->string('DNI_client')->primary('id');
            $table->string('Nom i cognoms');
            $table->string('Edat');
            $table->string('Telefon');
            $table->string('Adreça');
            $table->string('Ciutat');
            $table->string('Pais');
            $table->string('Email');
            $table->enum('Tipus de tajeta', ['Debit', 'Credit']);
            $table->integer('Numero de tajeta');
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
        Schema::dropIfExists('CLIENTS');
    }
}
