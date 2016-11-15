<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;

class additemController extends Controller{
	public function mBuscarArticulo(Request $request) {
		$input = $request->all();
		foreach ($input as & $input_s) {		
			$subcat=explode( ':', $input_s);
		}

		$item_elim = \App\Articulo::where('id',$subcat[0])->get() ->first();
		$articulos = \App\Articulo::all();

		return view('additemView', compact('item_elim','articulos') );
  	
	}
	public function mElimiarSubCat_Item($ida,$idi) {
		\App\SubCategoria_Articulo::where([
			    ['articulo_id', '=', '45'],
			    ['sub_categoria_id', '=', '1'],
			])->delete();
		
	$articulos = \App\Articulo::all();
	return view('additemView', compact('articulos'));
  	
	}
  	public function mVista() {
  		$articulos = \App\Articulo::all();
	    
	    return view('additemView', compact('articulos'));
	}
  	public function mAdd() {
  		 /*request()->file('avatar')->store('avatars');*/
  		 $file=request()->file('avatar');	 
  		 $file2 = request()->avatar->path();
  		 $file->storeAs('avatars/','avatar.csv');
			$row = 1;
			if (($handle = fopen($file2 , "r")) !== FALSE) {
			    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			        $num = count($data);
			        echo "<br/>\n";
			        $row++;
			        for ($c=0; $c < $num; $c+=5) {
			        	$idarticulo = DB::table('articulos')->insertGetId(
						    [
						    'nombre' => $data[$c], 
						    'cantidad' => $data[$c+1],
						    'precio' => $data[$c+2],
						    'descripcion' => $data[$c+3],
						    ]
						);


						$subcat=explode( ',', $data[$c+4] );
						foreach ($subcat as & $subc) {

							$idcategoria = 
								DB::table('sub_categorias')->
								select('id')->where('nombre', '=', $subc)->get();
							echo $idarticulo;
							echo $idcategoria[0]->id;
							DB::table('subcategoria_articulo')->insert(
							    ['sub_categoria_id' => $idcategoria[0]->id, 'articulo_id' => $idarticulo]
							);

						}


			        }
			    }
			    fclose($handle);
			}
	

	  
	}
}
