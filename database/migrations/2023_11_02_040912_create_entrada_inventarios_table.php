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
        Schema::create('entradas_inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_entrada');
            $table->foreign('id_entrada')->references('id')->on('entradas');
            $table->unsignedBigInteger('id_inventario');
            $table->foreign('id_inventario')->references('id')->on('inventarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas_inventarios');
    }
};
