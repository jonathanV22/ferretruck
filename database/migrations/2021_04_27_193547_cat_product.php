<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CatProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catProduct', function (Blueprint $table) {
            $table->id('idCatP');
            $table->unsignedBigInteger('idP');
            $table->unsignedBigInteger('idcat');
            $table->foreign('idP')->references('idP')->on('producto');
            $table->foreign('idcat')->references('idcat')->on('categoria');
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
        Schema::dropIfExists('catProduct');
    }
}
