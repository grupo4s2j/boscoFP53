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
        if (\Cookie::get('tsfi_role') !== null){
            $tsfi_role = \Cookie::get('tsfi_role');
            if($tsfi_role == 'profesor'){
                $rol = 2;
            }
            elseif($tsfi_role == 'alumno'){
                $rol = 1;
            }
        }
        
        //return \View::make('fo.home', compact('categorias', 'tags'));
        $recursos = Recurso::where('activo', 1)->get();
        
        //To get recursostop
        $recursosTOP = \App\Recurso::getTopPosts($rol);

        return view('fo.home', compact('recursos', 'recursosTOP'));
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
}
