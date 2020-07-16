<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Donacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('donacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('observacion')->unique();
            $table->string('estado');
        
            $table->bigInteger('id_persona')->unsigned();
            $table->foreign('id_persona')->references('id')->on('personas')
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
        Schema::dropIfExists('donacion');
    }
}
