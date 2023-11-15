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
        Schema::create('cuentas_bancarias', function (Blueprint $table) {
            $table->id();
            $table->char('cuenta', 50)->nullable();
            $table->char('sucursal', 100)->nullable();
            $table->char('clave', 50)->nullable();
            $table->char('banco', 100)->nullable();
            $table->char('cuenta_contable', 10)->nullable();
            $table->boolean('mostrar');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')
                ->on('empresas');
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
        Schema::dropIfExists('cuentas_bancarias');
    }
};
