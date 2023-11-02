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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_compra');
            $table->foreign('id_compra')->references('id')->on('compras');
            $table->unsignedBigInteger('id_articulo');
            $table->foreign('id_articulo')->references('id')->on('articulos');
            $table->integer('cantidad');
            $table->double('precio_compra', 8, 4);
            $table->double('precio_descuento', 8, 4);
            $table->integer('factor');
            $table->boolean('es_precio_neto');
            $table->double('porcentaje_descuento', 8, 2);
            $table->unsignedBigInteger('id_impuesto')->nullable();
            $table->foreign('id_impuesto')->references('id')->on('impuestos');
            $table->unsignedBigInteger('id_proveedor')->nullable();
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
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
        Schema::dropIfExists('entradas');
    }
};
