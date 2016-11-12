<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
	protected $table = "usuarios";

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password', 'genero', 'rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carrito()    
    {
        return $this->hasOne('App\Carrito');
    }
    
    public function ventas()
    {
        return $this->hasMany('App\Venta');
    }

    public function valoraciones()
    {
        return $this->hasMany('App\Valoracion');
    }

    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }
}
