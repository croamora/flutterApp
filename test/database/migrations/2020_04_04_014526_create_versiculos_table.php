<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('versiculos', function (Blueprint $table) {
            $table->increments('id_versiculo');
            $table->integer('id_capitulo');
            //$table->foreign('id_capitulo')->references('id_capitulo')->on('capitulos');
            $table->integer('numero');
            $table->string('versiculo',2048);
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
        Schema::dropIfExists('versiculos');
    }
}
