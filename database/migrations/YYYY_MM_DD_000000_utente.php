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
            $table->string('username', 25)->primary();
            $table->string("password");
            $table->string("nome", 20);
            $table->string("cognome", 20);
            $table->string("residenza", 30);
            $table->date("dataNascita");
            $table->string("occupazione", 30);
            $table->string("ruolo", 15)->default('user');
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
