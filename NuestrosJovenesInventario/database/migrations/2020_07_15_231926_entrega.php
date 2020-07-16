<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Entrega extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('entrega', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->int('cantidad')->unique();
            //$table->date('fecha');
        
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
        Schema::dropIfExists('entrega');
    }
}
