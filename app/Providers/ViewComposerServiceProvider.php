<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categoria;
use Illuminate\Http\Request;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $this->composeMasterFront($request);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeMasterFront(Request $request)
    {
        //$rol = $this->app->request->cookie('laravel_session');
        //$rol = app('request')->cookie('laravel_session');
        //$rol = \Crypt::decrypt(app('request')->cookie('laravel_session'));
        //$rol = \Crypt::decrypt(app('request')->cookie('tsfi_role'));
        if (\Cookie::get('tsfi_role') !== null) {
            $rol = \Crypt::decrypt(\Cookie::get('tsfi_role'));
        } else {
            $rol = 'peme';
        }
        //$rol = $request->tsfi_role;

        //view()->composer('fo.octagon_layout.octagon_master', 'App\Http\Controllers\MainPageController@index');

        view()->composer('fo.octagon_layout.octagon_master', function ($view) use ($rol) {
            $categorias = \App\Categoria::where('activo', 1)->get();

            foreach ($categorias as $categoria) {
                $categoria->colorCSS();
                $id = $categoria->id;
                
                //NUEVO
                $categoria->recursosCategoria = \App\Recurso::join('recursossubcategorias', 'recursos.id', '=', 'recursossubcategorias.idRecursos')
                    ->join('subcategorias', 'recursossubcategorias.idSubcategorias', '=', 'subcategorias.id')
                    ->join('categorias', function ($join) use ($id) {
                        $join->on('subcategorias.idCategoria', '=', 'categorias.id')
                            ->where('categorias.id', $id);
                    })
                    ->where('recursos.activo', 1)
                    ->where('recursos.show', 1)
                    ->where('recursos.fechaPost', '<=', \Carbon\Carbon::now('Europe/London')->format('Y-m-d H:i:s'))
                    ->where(function ($query) use ($rol) {
                        $query->where('rol', '=', 0)
                            ->orWhere('rol', '=', $rol);
                    })
                    ->orderBy('recursos.fechaPost', 'desc')
                    ->take(3)
                    ->distinct()
                    ->select('recursos.*')
                    ->get();
            }

            $tags = \App\Tag::topRatedTags();
            if ($rol == 'alumno') {
                $recursos = \App\Recurso::where('activo', 1)
                    ->where('fechaPost', '<=', \Carbon\Carbon::now('Europe/London')->format('Y-m-d H:i:s'))
                    ->orderBy('fechaPost', 'desc')
                    ->get();
            } elseif ($rol == 'professor') {
                $recursos = \App\Recurso::where('activo', 1)
                    ->where('fechaPost', '<=', \Carbon\Carbon::now('Europe/London')->format('Y-m-d H:i:s'))
                    ->orderBy('fechaPost', 'desc')
                    ->get();
            } else
                $recursos = \App\Recurso::where('activo', 1)
                    ->where('show', 1)
                    ->where('fechaPost', '<=', \Carbon\Carbon::now('Europe/London')->format('Y-m-d H:i:s'))
                    ->orderBy('fechaPost', 'desc')
                    ->get();

            $view->with(compact('categorias', 'tags', 'recursos', 'rol'));
        });
    }
}
