<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Usuario;

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



}
