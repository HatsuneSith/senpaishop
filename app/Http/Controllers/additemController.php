<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class additemController extends Controller{



	public function mAgregar_Item(Request $request) {

		$item = new \App\Articulo;
		
		$item ->nombre =$request->input('nombre');
		$item ->cantidad =$request->input('cantidad');
		$item ->precio =$request->input('precio');
		$item ->descripcion =$request->input('descripcion');
		$item ->save();
		$subcategorias=$request->input('subc');
		$subcat=explode( ',', $subcategorias);

		foreach ($subcat as & $var) {
			
			$SubCre = new \App\SubCategoria_Articulo;
			$SubCre->sub_categoria_id = $var;
			$SubCre->articulo_id = $item->id;
			$SubCre->save();
		}

		$input =$request->file('avatar');
		$imgname =$request->input('imgn');
  		$input->storeAs('articulos/'. $item->id, $imgname.'.png');

  		$imagen=new \App\Imagen;
  		$imagen->nombre = $imgname;
  		$imagen->articulo_id = $item->id;
  		$imagen->save();
	}
	public function mBuscarArticulo(Request $request) {
		$input = $request->all();
		foreach ($input as & $input_s) {		
			$subcat=explode( ':', $input_s);
		}

		$item_elim = \App\Articulo::where('id',$subcat[0])->get() ->first();
		$articulos = \App\Articulo::all();

		return view('additemView', compact('item_elim','articulos') );
  	
	}

	public function mBuscarArticulo2(Request $request) {
		$input = $request->all();
		foreach ($input as & $input_s) {		
			$subcat=explode( ':', $input_s);
		}

		$item_agre = \App\Articulo::where('id',$subcat[0])->get() ->first();
		$articulos = \App\Articulo::all();

		return view('additemView', compact('item_agre','articulos') );
  	
	}
	public function mAgregarSubCat_Item(Request $request) {

		$subcate=$request->input('subc');
		$subcat=explode( ',', $subcate);
		foreach ($subcat as & $var) {
			
			$SubCre = new \App\SubCategoria_Articulo;
			$SubCre->sub_categoria_id =  $var;
			$SubCre->articulo_id = $request->input('artid');
			$SubCre->save();
		}

	}

	public function mElimiarSubCat_Item(Request $request) {
		$input = $request->all();
		foreach ($input as & $input_s) {		
			$subcat=explode( ':', $input_s);
		}
		\App\SubCategoria_Articulo::where([
			    ['articulo_id', '=', $subcat[0]],
			    ['sub_categoria_id', '=', $subcat[1]],
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
			        $row++;
			        for ($c=0; $c < $num; $c+=5) {
			        	$idarticulo = DB::table('articulos')->insertGetId(
						    [
						    'nombre' => $data[$c], 
						    'cantidad' => $data[$c+1],
						    'precio' => $data[$c+2],
						    'descripcion' => $data[$c+3],
						    'created_at' =>  \Carbon\Carbon::now(),
           					'updated_at' => \Carbon\Carbon::now(),
						    ]
						);


						$subcat=explode( ',', $data[$c+4] );

						foreach ($subcat as & $subc) {
							$idcategoria = 
								DB::table('sub_categorias')->
								select('id')->where('nombre', '=', $subc)->get();
							echo $idcategoria."  ";

							$SubCre = new \App\SubCategoria_Articulo;
							$SubCre->sub_categoria_id = $idcategoria[0]->id;
							$SubCre->articulo_id = $idarticulo;
							$SubCre->save();
						

						}

			        }
			    }
			    fclose($handle);
			}
	

	  	$articulos = \App\Articulo::all();
	    
	    return view('additemView', compact('articulos'));
	}
}
