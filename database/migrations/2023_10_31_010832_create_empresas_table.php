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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->char('nombre', 200);
            $table->char('rfc', 13);
            $table->char('curp', 13);
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
        Schema::dropIfExists('empresas');
    }
};
