<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainPageController extends Controller
{
    public function index()
    {
        $categorias = \App\Categoria::all();
        $tags = \App\Tag::topRatedTags();
        //$sumtags = \App\Tag::sumTopRatedTags();
        foreach ($categorias as $categoria){
            $categoria->colorCSS();
        }

        return \View::make('fo.home', compact('categorias', 'tags'));
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
}
