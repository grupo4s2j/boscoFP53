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
    public function indexFront(Request $request)
    {
        //return \View::make('fo.home', compact('categorias', 'tags'));
        return view('fo.home');
        //return $request->cookie('rol');
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
}
