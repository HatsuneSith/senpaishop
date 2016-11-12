<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CrearTablaSubCategoriaArticulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategoria_articulo', function(Blueprint $table) {
            $table->integer('sub_categoria_id')->unsigned();
            $table->integer('articulo_id')->unsigned();            
            $table->timestamps();
            
            $table->foreign('sub_categoria_id')->references('id')->on('sub_categorias');
            $table->foreign('articulo_id')->references('id')->on('articulos');
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
