<?php 

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Categoria;

class LayoutComposer 
{
	protected $categorias;

	public function __construct(Categoria $categorias)
	{
		$categorias = Categoria::all();
		$this->categorias = $categorias;
	}

	public function compose(View $view)
	{
		$view->with('categorias', $this->categorias);
	}
}