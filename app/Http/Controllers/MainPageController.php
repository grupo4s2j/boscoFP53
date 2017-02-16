<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class MainPageController extends Controller
{
    public function index($view)
    {
        $categorias = \App\Categoria::all();
        $tags = \App\Tag::topRatedTags();

        foreach ($categorias as $categoria){
            $categoria->colorCSS();
        }

        //return \View::make('fo.home', compact('categorias', 'tags'));
        //$view->with(['categorias', 'tags']);
        $view->with(compact('categorias', 'tags'));
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
    
    public function indexFront()
    {
        //return \View::make('fo.home', compact('categorias', 'tags'));
        return view('fo.home');
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
}
