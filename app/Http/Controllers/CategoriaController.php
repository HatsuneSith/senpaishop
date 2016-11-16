<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Articulo;
use App\Categoria;
use App\SubCategoria;
use App\Imagen;
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
        
        if(Auth::guest() or Auth::user()->rol->nombre == 'Cliente') 
        {
            return redirect()->back();
        }

        $productos=DB::table('articulos')->paginate(10);
        return view('inventario',compact('productos'));
    }
}
