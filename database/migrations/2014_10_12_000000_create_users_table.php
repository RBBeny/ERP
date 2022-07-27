<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tusuario', function (Blueprint $table) {
            $table->id('id');
            $table->string('nombreUsuario');
            $table->string('apellidoPaternoUsuario');
            $table->string('apellidoMaternoUsuario');
            $table->string('nomUsuario');
            $table->string('password');
            $table->integer('cveTipoUsuario');
            $table->integer('cveEstatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tusuario');
    }
}
