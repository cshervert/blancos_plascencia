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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('alias');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('nss');
            $table->string('curp');
            $table->string('ciudad');
            $table->string('telefono');
            $table->string('celular');
            $table->string('email');
            $table->float('comision');
            $table->date('fecha_nac');
            $table->unsignedBigInteger('id_puesto');
            $table->foreign('id_puesto')->references('id')->on('puestos_trabajo');
            $table->boolean('activo');
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
        Schema::dropIfExists('empleados');
    }
};
