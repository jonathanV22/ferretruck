<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id('idP');
            $table->string('nombre');
            $table->string('imagen')->nullable();
            $table->string('marca');
            $table->string('descripcion');
            $table->integer('precio');
            $table->integer('stock');
            $table->boolean('estado');
            $table->boolean('oferta');
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
        Schema::dropIfExists('producto');
    }
}
