<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

use Carbon\Carbon;
use App\Recurso;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class MainPageController extends Controller
{
    public function index($view)
    {
        $categorias = \App\Categoria::where('activo', 1)->get();
        $tags = \App\Tag::topRatedTags();
        $recursos = Recurso::where('activo', 1)
                    ->where('fechaPost', '<=', Carbon::now()->format('Y-m-d'))
                    ->orderBy('fechaPost', 'desc')
                    ->get();
        
        /*foreach($recursos as $recurso)
        {
            $recurso->imgresize = Image::make('./img/recursos/'. $recurso->img)->fit(600, 360);
        }*/

        foreach ($categorias as $categoria){
            $categoria->colorCSS();
        }

        //return \View::make('fo.home', compact('categorias', 'tags'));
        //$view->with(['categorias', 'tags']);
        $view->with(compact('categorias', 'tags', 'recursos'));
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
    
    public function indexFront()
    {
        //return \View::make('fo.home', compact('categorias', 'tags'));
        return view('fo.home');
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
}
