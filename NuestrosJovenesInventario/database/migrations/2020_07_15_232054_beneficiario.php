<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Beneficiario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('beneficiario', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->date('fecha');
        
            $table->bigInteger('id_entrega')->unsigned();
            $table->foreign('id_entrega')->references('id')->on('entrega')
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
        Schema::dropIfExists('beneficiario');
    }
}
