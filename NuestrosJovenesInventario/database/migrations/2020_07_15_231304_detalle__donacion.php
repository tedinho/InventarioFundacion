<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleDonacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_donacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('cantidad')->unique();
            $table->string('estado');
            $table->string('descripcion');
        
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
        Schema::dropIfExists('detalle_donacion');
    }
}
