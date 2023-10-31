<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_permiso');
            $table->foreign('id_permiso')->references('id')->on('permisos');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->boolean('crear');
            $table->boolean('leer');
            $table->boolean('editar');
            $table->boolean('eliminar');
            $table->boolean('activo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_usuarios');
    }
};
