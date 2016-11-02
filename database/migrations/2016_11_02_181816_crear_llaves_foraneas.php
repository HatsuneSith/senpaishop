<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearLlavesForaneas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function($table) {
            $table->integer('rol_id')->unsigned();
            $table->integer('valoracion_id')->unsigned();

            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('valoracion_id')->references('id')->on('valoraciones');
        });

        Schema::table('articulos', function($table) {
            $table->integer('valoracion_id')->unsigned();

            $table->foreign('valoracion_id')->references('id')->on('valoraciones');
        });

        Schema::table('ventas', function($table) {
            $table->integer('articulo_id')->unsigned();
            $table->integer('usuario_id')->unsigned();

            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });

        Schema::table('imagenes', function($table) {
            $table->integer('articulo_id')->unsigned();
            $table->integer('categoria_id')->unsigned();

            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
