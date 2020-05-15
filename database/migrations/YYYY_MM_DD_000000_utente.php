<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Utente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utente', function (Blueprint $table) {
            $table->bigIncrements('username');
            $table->string("password", 25);
            $table->string("nome", 20);
            $table->string("cognome", 20);
            $table->string("residenza");
            $table->string("nascita", 20);
            $table->string("occupazione", 30);
            $table->string("ruolo", 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utente');
    }
}
