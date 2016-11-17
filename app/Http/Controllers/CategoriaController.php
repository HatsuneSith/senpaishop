<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria;
use App\SubCategoria;
use App\Imagen;
use App\Valoracion;
use App\subcategoria_articulo;
use DB;

class CategoriaController extends Controller
{
    //



    public function productos_Categoria($cat_id){



    	$productos=DB::table('subcategoria_articulo')
            ->join('articulos','subcategoria_articulo.articulo_id','=','articulos.id')
            ->join('sub_categorias','subcategoria_articulo.sub_categoria_id','=','sub_categorias.id')
        	->where('sub_categorias.id', '=', $cat_id)
            ->select('articulos.id','articulos.nombre','articulos.cantidad','articulos.precio','articulos.descripcion')
        	->get();


        $categorias=Categoria::all();  
        $sub_categorias=SubCategoria::all(); 

        return view('product',compact('productos','categorias','sub_categorias'));
    }



    public function producto($art_id){


    	$producto=Articulo::find($art_id);
        return view('single',compact('producto'));
    }


    public function inventario(){


        $productos=DB::table('articulos')->paginate(10);
        return view('inventario',compact('productos'));
    }


    public function comentariosuccess(Request $datos){

        $comentario= new Valoracion;
        $comentario->comentario=$datos->input('comment');
        $comentario->rating=$datos->input('bananas');
        $comentario->usuario_id=$datos->input('UseID');
        $comentario->articulo_id=$datos->input('ArtID');
        $yes=$datos->input('ArtID');
        $comentario->save();

        return Redirect('/');

    }
}
