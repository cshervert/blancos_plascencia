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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tipo_movimiento');
            $table->foreign('id_tipo_movimiento')->references('id')
            ->on('tipos_movimientos');
            $table->unsignedBigInteger('id_sucursal_origen')->nullable();;
            $table->foreign('id_sucursal_origen')->references('id')
            ->on('sucursales');
            $table->unsignedBigInteger('id_sucursal_destino')->nullable();;
            $table->foreign('id_sucursal_destino')->references('id')
            ->on('sucursales');
            $table->integer('cantidad');
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
        Schema::dropIfExists('movimientos');
    }
};
