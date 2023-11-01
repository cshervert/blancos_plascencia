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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->char('clave', 100);
            $table->char('clave_alterna', 100);
            $table->boolean('es_servicio');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->unsignedBigInteger('id_unidad_compra');
            $table->foreign('id_unidad_compra')->references('id')->on('unidades');
            $table->unsignedBigInteger('id_unidad_venta');
            $table->foreign('id_unidad_venta')->references('id')->on('unidades');
            $table->integer('factor');
            $table->unsignedBigInteger('id_impuesto')->nullable();
            $table->foreign('id_impuesto')->references('id')->on('impuestos');
            $table->double('precio_compra', 8, 4);
            $table->boolean('es_precio_neto');
            $table->unsignedBigInteger('id_precio');
            $table->foreign('id_precio')->references('id')->on('precios');
            $table->unsignedBigInteger('id_moneda');
            $table->foreign('id_moneda')->references('id')->on('monedas');
            $table->double('tasa_cambio', 8, 2);
            $table->char('clave_sat', 100);
            $table->integer('inventario_min');
            $table->integer('inventario_max');
            $table->string('localizacion');
            $table->json('imagenes');
            $table->text('caracteristicas');
            $table->json('etiquetas');
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
        Schema::dropIfExists('articulos');
    }
};
