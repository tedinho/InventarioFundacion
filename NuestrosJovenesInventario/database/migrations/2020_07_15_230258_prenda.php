<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('prenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            
            $table->bigInteger('id_talla')->unsigned();
            $table->foreign('id_talla')->references('id')->on('talla');
            $table->bigInteger('id_genero')->unsigned();
            $table->foreign('id_genero')->references('id')->on('genero');
            $table->bigInteger('id_tipo_prenda')->unsigned();
            $table->foreign('id_tipo_prenda')->references('id')->on('tipo_prenda')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prenda');
    }
}
