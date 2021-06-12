<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetalleVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleVenta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('noFolio');
            $table->unsignedBigInteger('idP');
            $table->integer('cantidadTotal');
            $table->integer('precioTotal');
            $table->integer('estadoVenta');
            $table->integer('desc');
            $table->foreign('noFolio')->references('id')->on('venta');
            $table->foreign('idP')->references('id')->on('producto');
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
        Schema::dropIfExists('detalleVenta');
    }
}
