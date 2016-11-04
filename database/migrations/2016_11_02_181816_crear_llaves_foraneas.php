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

            $table->foreign('rol_id')->references('id')->on('roles');
        });

        Schema::table('articulos', function($table) {
            $table->integer('sub_categoria_id')->unsigned();

            $table->foreign('sub_categoria_id')->references('id')->on('sub_categorias');
        });

        Schema::table('ventas', function($table) {
            $table->integer('articulo_id')->unsigned();
            $table->integer('usuario_id')->unsigned();

            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });

        Schema::table('imagenes', function($table) {
            $table->integer('articulo_id')->nullable()->unsigned();
            $table->integer('categoria_id')->nullable()->unsigned();

            $table->foreign('articulo_id')->references('id')->on('articulos');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });

        Schema::table('valoraciones', function($table) {
            $table->integer('usuario_id')->unsigned();
            $table->integer('articulo_id')->unsigned();

            $table->foreign('usuario_id')->references('id')->on('usuarios');            
            $table->foreign('articulo_id')->references('id')->on('articulos');            
        });

        Schema::table('sub_categorias', function($table) {
            $table->integer('categoria_id')->unsigned();

            $table->foreign('categoria_id')->references('id')->on('categorias');
        });       

        Schema::table('carritos', function($table) {
            $table->integer('usuario_id')->unsigned();

            $table->foreign('usuario_id')->references('id')->on('usuarios');
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
