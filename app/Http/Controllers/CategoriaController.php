<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('product',compact('productos','categorias','sub_categorias', 'cat_id'));
    }

    public function productos_categoria_filtro(Request $request, $cat_id)
    {
        $precio_menor = $request->input('precio_min');
        $precio_mayor = $request->input('precio_max');
        $order = $request->input('order');
        $by = $request->input('by');      

        $productos=DB::table('subcategoria_articulo')
            ->join('articulos','subcategoria_articulo.articulo_id','=','articulos.id')
            ->join('sub_categorias','subcategoria_articulo.sub_categoria_id','=','sub_categorias.id')
            ->where('sub_categorias.id', '=', $cat_id)
            ->where('articulos.precio', '>=', $precio_menor)
            ->where('articulos.precio', '<=', $precio_mayor)
            ->select('articulos.id','articulos.nombre','articulos.cantidad','articulos.precio','articulos.descripcion')
            ->orderBy($by, $order)
            ->get();

        $categorias = Categoria::all();
        $sub_categorias = SubCategoria::all();

        return view('product', compact('productos', 'categorias', 'sub_categorias', 'cat_id'));
    }

    public function producto($art_id){
        $rates=DB::table('valoraciones')->where('valoraciones.articulo_id', '=', $art_id)->get();
        $maxrate = 0;
        $counter =0;
        foreach ($rates as $rat) {
        $maxrate = $maxrate +$rat->rating;
        $counter = $counter + 1;
        }
        $promedio = $maxrate / $counter;
    	$producto = Articulo::find($art_id);
        $promedio = number_format($promedio, 1, '.', '');
        return view('single',compact('producto', 'maxrate', 'promedio'));
    }


    public function inventario(){
        
        if(Auth::guest() or Auth::user()->rol->nombre == 'Cliente') 
        {
            return redirect()->back();
        }

        $productos=DB::table('articulos')->paginate(10);
        return view('inventario',compact('productos'));
    }


    public function comentariosuccess(Request $datos){


        $comentario= new Valoracion;
        $comentario->comentario=$datos->input('comment');
        $comentario->rating=$datos->input('bananas');
        $comentario->usuario_id=Auth::user()->id;
        $comentario->articulo_id=$datos->input('ArtID');
        $yes=$datos->input('ArtID');
        $comentario->save();

        return Redirect('/single/1');

    }
}
