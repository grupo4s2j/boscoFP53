<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Recurso;

use Carbon\Carbon;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class MainPageController extends Controller
{
    public function indexFront(Request $request)
    {
        //return \View::make('fo.home', compact('categorias', 'tags'));
        $recursos = Recurso::where('activo', 1)->get();

        return view('fo.home', compact('recursos'));
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
}
