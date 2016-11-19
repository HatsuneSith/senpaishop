<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Usuario;
use DB;

class GeneralController extends Controller
{
    public function confirmar_cuenta(Request $request, $email, $codigo)
    {    	    	    
    	$usuario = Usuario::where('email', $email)->first();    	

    	if ($codigo == hash('md5',$email)) {
    		$usuario->verificado = 1;
    		$usuario->save();

            $verificado = true;
    		return view('home', compact('verificado', 'usuario'));
    	}
    	else {
    		return "fail";
    	}    	
    }

    public function mIndex(){      
              
        return view('Index');
    }


    public function index()
    {
        $articulos = DB::table('articulos')
            ->join('valoraciones','valoraciones.articulo_id', 'articulos.id')
            ->leftjoin('imagenes', 'imagenes.articulo_id', 'articulos.id')
            ->select('imagenes.id as imagenes', 'articulos.nombre', 'articulos.id', 'articulos.precio', DB::raw('COUNT(valoraciones.rating) as rating'))
            ->groupBy('articulos.nombre')
            ->groupBy('articulos.id')
            ->groupBy('articulos.precio')
            ->groupBy('imagenes.id')
            ->take(9)
            ->get();

        return view('index', compact('articulos'));
    }

}
