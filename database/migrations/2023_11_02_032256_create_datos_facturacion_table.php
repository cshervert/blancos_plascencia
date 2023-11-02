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
        Schema::create('datos_facturacion', function (Blueprint $table) {
            $table->id();
            $table->char('razon_social', 255);
            $table->char('rfc', 13);
            $table->char('curp', 18);
            $table->char('domicilio', 200);
            $table->char('numero_exterior', 10);
            $table->char('numero_interior', 10);
            $table->char('colonia', 200);
            $table->char('cp', 20);
            $table->char('ciudad', 100);
            $table->char('localidad', 100);
            $table->char('estado', 100);
            $table->char('pais', 100);
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
        Schema::dropIfExists('datos_facturacion');
    }
};
