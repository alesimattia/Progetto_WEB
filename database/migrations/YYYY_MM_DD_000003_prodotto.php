<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prodotto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodotto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subcat')->unsigned()->index();
            $table->foreign('subcat')->references('id')->on('sottocategoria');    //se commentata funziona il collegamento tra sottocategoria e categoria
            $table->string('nome', 20);
            $table->string('desc_breve', 100);
            $table->string('desc_estesa', 200);
            $table->float('prezzo');
            $table->text('foto')->nullable(false)->change();
            $table->integer('percSconto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodotto');
    }
}
