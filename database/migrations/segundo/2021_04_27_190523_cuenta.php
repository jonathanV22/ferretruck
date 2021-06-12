<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cuenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->id();
            $table->integer('numeroCuenta');
            $table->unsignedBigInteger('idU');
            $table->unsignedBigInteger('idtipoC');
            $table->foreign('idU')->references('id')->on('users');
            $table->foreign('idtipoC')->references('id')->on('tipoCuenta');
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
        Schema::dropIfExists('cuenta');
    }
}
