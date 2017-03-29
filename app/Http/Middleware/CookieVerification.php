<?php

namespace App\Http\Middleware;

use Closure;

class CookieVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*if (\Cookie::get('tsfi_role') !== null){
            //$tsfi_role = \Crypt::decrypt(\Cookie::get('tsfi_role'));
            $tsfi_role = \Cookie::get('tsfi_role');
            if ($tsfi_role == 'alumno' || $tsfi_role == 'profesor'){
                return $next($request);
            }
            else
            {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }*/
        //if($request->hasCookie('tsfi_role')) {
        /*          ROLES
        /*          0 -> Todo
        /*          1 -> Alumno
        /************************************/
        if (\Cookie::get('tsfi_role') !== null){
            $tsfi_role = \Cookie::get('tsfi_role');
            if ($tsfi_role == 'alumno' || $tsfi_role == 'profesor'){
                return $next($request);
            }
            else
            {
                return redirect('/');
            }    
        }
        else{
            return redirect('/');
        }

    }
}
