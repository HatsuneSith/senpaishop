<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class valoraciones extends Model
{
	protected $table = "valoraciones";

    public function usuarios()
    {
        return $this->hasMany('App\usuarios');
    }

    public function articulos()
    {
        return $this->hasMany('App\articulos');
    }
}
