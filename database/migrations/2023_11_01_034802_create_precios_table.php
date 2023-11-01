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
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->double('utilidad_1', 8, 4);
            $table->double('precio_venta_1', 8, 4);
            $table->double('precio_venta_neto_1', 8, 4);
            $table->double('unidad_mayoreo_1', 8, 2);
            $table->double('utilidad_2', 8, 4);
            $table->double('precio_venta_2', 8, 4);
            $table->double('precio_venta_neto_2', 8, 4);
            $table->double('unidad_mayoreo_2', 8, 2);
            $table->double('utilidad_3', 8, 4);
            $table->double('precio_venta_3', 8, 4);
            $table->double('precio_venta_neto_3', 8, 4);
            $table->double('unidad_mayoreo_3', 8, 2);
            $table->double('utilidad_4', 8, 4);
            $table->double('precio_venta_4', 8, 4);
            $table->double('precio_venta_neto_4', 8, 4);
            $table->double('unidad_mayoreo_4', 8, 2);
            $table->boolean('es_articulo');
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
        Schema::dropIfExists('precios');
    }
};
