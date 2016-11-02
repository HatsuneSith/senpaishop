<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ventas extends Model
{
	protected $table = "ventas";

    public function usuarios()
    {
        return $this->belongsTo('App\usuarios');
    }

    public function articulos()
    {
        return $this->belongsTo('App\articulos');
    }
}
