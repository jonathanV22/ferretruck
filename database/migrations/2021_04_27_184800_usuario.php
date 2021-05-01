<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('usuario',function(Blueprint $table){
            $table -> id('idU');
            $table -> string('nombre',20);
            $table -> string('apellido',20);
            $table -> string('rut',12)->unique();
            $table -> string('correo');
            $table -> string('direccion')->unique();
            $table -> string('imagen');
            $table -> integer('telefono');
            $table -> unsignedBigInteger('idTipoU');
            $table -> foreign('idTipoU') -> references('idTipoU')->on('tipoUsuario') ;
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
