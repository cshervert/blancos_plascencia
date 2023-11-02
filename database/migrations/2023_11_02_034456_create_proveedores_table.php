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
            $table->integer('numero_proveedor');
            $table->char('representante', 200);
            $table->char('nombre', 200);
            $table->char('alias', 200);
            $table->char('rfc', 13);
            $table->char('curp', 18);
            $table->char('telefono', 20);
            $table->char('celular', 20);
            $table->char('email', 200);
            $table->char('comentario', 255);
            $table->double('limite_credito', 8, 2);
            $table->integer('dias_credito');
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
