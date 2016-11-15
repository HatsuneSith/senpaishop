<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Categoria;
use App\SubCategoria;
use DB;

class CategoriaController extends Controller
{
    //



    public function productos_Categoria($cat_id){



    	$productos=DB::table('articulos')
        	->where('sub_categoria_id', '=', $cat_id)
        	->get();

        $categorias=Categoria::all();  
        $sub_categorias=SubCategoria::all();    

        return view('product',compact('productos','categorias','sub_categorias'));
    }



    public function producto($art_id){


    	$producto=Articulo::find($art_id);

        return view('single',compact('producto'));
    }
}
