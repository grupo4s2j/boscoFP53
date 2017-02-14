<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Http\Controllers\Controller;

/**
 * Class AppController.
 *
 * @author Amrani Houssain <amranidev@gmail.com>
 */
class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $users = \App\User::all()->count();
        $roles = \Spatie\Permission\Models\Role::all()->count();
        $permissions = \Spatie\Permission\Models\Permission::all()->count();
        $banner = \App\Banner::all();
        $categoria = \App\Categoria::all();
        $entidadOrganizativa = \App\Entidadorganizativa::all();
        $evento = \App\Evento::all();
        $fichero = \App\Fichero::all();
        $recurso = \App\Recurso::all();
        $redsocial = \App\Redsocial::all();
        $subcategoria = \App\Subcategoria::all();
        $tag = \App\Tag::all();

        $entities = \Amranidev\ScaffoldInterface\Models\Scaffoldinterface::all();

        return view('scaffold-interface.dashboard.dashboard',
            compact('users', 'roles', 'permissions', 'entities',
                'banner', 'categoria', 'entidadOrganizativa',
                'evento', 'fichero', 'recurso', 'redsocial', 'subcategoria', 'tag')
        );
    }
}
