<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionesRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opciones_roles', function (Blueprint $table) {
            $table->id();
            $table->string('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id')->on('roles')
                ->onDelete('cascade');
            $table->bigInteger('id_opcion')->unsigned();
            $table->foreign('id_opcion')->references('id')->on('opciones')
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
        Schema::dropIfExists('opciones_roles');
    }
}
