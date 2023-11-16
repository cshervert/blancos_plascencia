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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->char('representante', 200)->nullable();
            $table->char('nombre', 200)->nullable();
            $table->char('alias', 200)->nullable();
            $table->char('rfc', 13)->nullable();
            $table->char('curp', 18)->nullable();
            $table->char('telefono', 20)->nullable();
            $table->char('celular', 20)->nullable();
            $table->char('email', 200)->nullable();
            $table->char('comentario', 255)->nullable();
            $table->double('limite_credito', 8, 2)->nullable();
            $table->integer('dias_credito')->nullable();
            $table->unsignedBigInteger('id_facturacion');
            $table->foreign('id_facturacion')->references('id')
                ->on('datos_facturacion');
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
        Schema::dropIfExists('proveedores');
    }
};
