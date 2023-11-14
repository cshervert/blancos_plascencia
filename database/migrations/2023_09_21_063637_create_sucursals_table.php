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
        Schema::create('sucursales', function (Blueprint $table) {
            $table->id();
            $table->char('nombre', 200);
            $table->char('domicilio', 200);
            $table->char('numero_interior', 10);
            $table->char('numero_exterior', 10);
            $table->char('colonia', 200);
            $table->char('cp', 20);
            $table->char('ciudad', 100);
            $table->char('estado', 100);
            $table->string('email')->unique();
            $table->char('telefono', 20);
            $table->char('celular', 20);
            $table->boolean('activo');
            $table->boolean('eliminado');
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
        Schema::dropIfExists('sucursales');
    }
};
