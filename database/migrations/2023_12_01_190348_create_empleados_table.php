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
            $table->string('direccion')->nullable();
            $table->string('nss')->nullable();
            $table->string('curp')->nullable();
            $table->string('ciudad');
            $table->string('telefono')->nullable();
            $table->string('celular');
            $table->string('email');
            $table->float('comision');
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedBigInteger('id_puesto');
            $table->foreign('id_puesto')->references('id')->on('puestos_trabajo');
            $table->unsignedBigInteger('id_sucursal');
            $table->foreign('id_sucursal')->references('id')->on('sucursales');
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
        Schema::dropIfExists('empleados');
    }
};
