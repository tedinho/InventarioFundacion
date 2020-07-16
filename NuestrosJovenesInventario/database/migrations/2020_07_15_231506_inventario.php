<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inventario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('inventario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('cantidad_bodega')->unique();
            $table->date('fecha');

            $table->bigInteger('id_prenda')->unsigned();
            $table->foreign('id_prenda')->references('id')->on('prenda')
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
        Schema::dropIfExists('inventario');
    }
}
