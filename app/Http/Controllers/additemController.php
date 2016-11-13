<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;

class additemController extends Controller{
  	public function mVista() {
	    return view('additemView');
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
			        for ($c=0; $c < $num; $c+=7) {

						DB::table('articulos')->insert(
						    [
						    'nombre' => $data[$c], 
						    'cantidad' => $data[$c+1],
						    'precio' => $data[$c+2],
						    'descripcion' => $data[$c+3],
						    ]
						);

			        }
			    }
			    fclose($handle);
			}
	

	  
	}
}
