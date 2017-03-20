<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Cookie;

use Carbon\Carbon;
use App\Recurso;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class IndexController extends Controller
{
    public function index()
    {
        if (Cookie::get('tsfi_role') !== null){
            return redirect('/home');
        }
        else{
            return view('fo.index');
        }
    }
    
    public function setCookie(Request $request)
    {
        if (Cookie::get('tsfi_role') !== null){
            Cookie::forget('tsfi_role');
        }
        if($request->input('rol') == 'alumno')
        {
            //Cookie::make('rol', 'alumno', 60);
            //setcookie('rol', 'alumno', 120);
            Cookie::queue(Cookie::make('tsfi_role', 'alumno', 45000));
            return redirect('/home');
        }
        elseif($request->input('rol') == 'profesor')
        {
            //Cookie::make('rol', 'professor', 60);
            //setcookie('rol', 'professor', 120);
            Cookie::queue(Cookie::make('tsfi_role', 'profesor', 45000));
            return redirect('/home');
        }
        else{
            return redirect('/');
        }
        //Podemos hacer referencia a la clase View con un \ o añadiendo use View al principio
    }
}
