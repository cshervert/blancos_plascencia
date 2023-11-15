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
            $table->char('razon_social', 255)->nullable();
            $table->char('rfc', 13)->nullable();
            $table->char('curp', 18)->nullable();
            $table->char('domicilio', 200)->nullable();
            $table->char('numero_exterior', 10)->nullable();
            $table->char('numero_interior', 10)->nullable();
            $table->char('colonia', 200)->nullable();
            $table->char('cp', 20)->nullable();
            $table->char('ciudad', 100)->nullable();
            $table->char('localidad', 100)->nullable();
            $table->char('estado', 100)->nullable();
            $table->char('pais', 100)->nullable();
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
