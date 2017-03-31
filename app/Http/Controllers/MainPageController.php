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
    use \Traits\FuncionesExtra; //Trait

    public function indexFront(Request $request)
    {
        $rol = $this->getAndSetCookieValue();

        $recursos = Recurso::where('activo', 1)->where('show', 1)->get();

        $recursos = $this->recursosFechaHora($recursos);

        //To get recursostop
        //$recursosTOP = \App\Recurso::getTopPosts($rol);

        return view('fo.home', compact('recursos', 'recursosTOP'));
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
}
