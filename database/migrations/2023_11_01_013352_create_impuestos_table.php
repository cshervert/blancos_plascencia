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
        Schema::create('impuestos', function (Blueprint $table) {
            $table->id();
            $table->char('nombre', 100);
            $table->double('impuesto', 8, 2);
            $table->boolean('activo');
            $table->boolean('impreso');
            $table->boolean('impuesto_local');
            $table->unsignedBigInteger('id_desglose_impuesto');
            $table->foreign('id_desglose_impuesto')->references('id')
                ->on('desgloses_impuestos');
            $table->unsignedBigInteger('id_tipo_impuesto');
            $table->foreign('id_tipo_impuesto')->references('id')
                ->on('tipos_impuestos');
            $table->integer('orden');
            $table->boolean('aplicar_iva');
            $table->string('cuenta_clave');
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
        Schema::dropIfExists('impuestos');
    }
};
