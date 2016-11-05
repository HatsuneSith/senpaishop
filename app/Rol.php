<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	protected $table = "roles";

    public function usuarios()
    {
        return $this->hasMany('App\Usuario');
    }

    public function cliente()
    {
    	if( count($rol = Rol::where('nombre', 'Cliente')->get()) ) {
    		return $rol[0]->id;
    	}
    	else {
    		dd('No existe el rol Cliente');
    	}
    }
}
