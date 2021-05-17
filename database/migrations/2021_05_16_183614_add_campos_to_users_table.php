<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table -> string('apellido');
            $table -> string('rut');
            $table-> string('direccion');
            $table -> integer('telefono');
            $table -> unsignedBigInteger('idTipoU');
            $table -> foreign('idTipoU') -> references('idTipoU')->on('tipoUsuario') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
