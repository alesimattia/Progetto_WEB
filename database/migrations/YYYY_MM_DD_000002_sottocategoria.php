<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sottocategoria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sottocategoria', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('nomeSubCat', 20);

            $table->bigInteger('mainCat')->unsigned()->index();
            $table->foreign('mainCat')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sottocategoria');
    }
}
