<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	protected $table = "ventas";

    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function articulo()
    {
        return $this->belongsTo('App\Articulo');
    }
}
