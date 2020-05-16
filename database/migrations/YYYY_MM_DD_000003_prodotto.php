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
            $table->string('nome', 20);
            $table->bigInteger('subCat')->unsigned()->index();
            $table->foreign('subCat')->references('id')->on('sottocategoria');
            $table->float('prezzo');
            $table->integer('percSconto');
            $table->text('foto')->nullable(false);
            $table->string('desc_breve', 100);
            $table->string('desc_estesa', 200);
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
