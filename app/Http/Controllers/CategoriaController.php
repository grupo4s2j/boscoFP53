<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class CategoriaController.
 */
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
//        $search = \Request::get('search');
//
//        $paginate = \Request::get('rows');
//        if ($paginate=="") {
//            $paginate = 6;
//        }
//        if ($search=="") {
//
//            $categorias = Categoria::where('activo', '=', '1')->paginate($paginate);
//        }else {
//            $categorias = Categoria::where('nombre', 'like', '%' . $search . '%')->where('activo', '=', '1')
//                ->paginate(1000);
//        }
        $categorias = Categoria::where('activo', '=', '1')
            ->orderBy('orden','asc')
            ->orderBy('nombre','asc')
            ->get();
        $title = 'Index - categoria';

        return view('categoria.index', compact('categorias', 'title'));
    }

    public function indexFront()
    {
        //$categorias = Categoria::all();
        $categorias = Categoria::where('activo', 1)->get();

        return view('fo.categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - categoria';

        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria();

        $categoria->nombre = $request->nombre;

        if ($request->hasFile('img')) {
           
            $file = $request->file('img');

            $directorio=  '/img/categorias/';
            if( !file_exists($directorio) ){
                mkdir($directorio, 077, true);
            }
            $nombreimagen =  $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));

           
            

        $categoria->img = $file->getClientOriginalName();
        }

        $categoria->color = $request->color;
        

        $categoria->logo = $request->logo;

        $categoria->save();

//        $pusher = App::make('pusher');
//
//        //default pusher notification.
//        //by default channel=test-channel,event=test-event
//        //Here is a pusher notification example when you create a new resource in storage.
//        //you can modify anything you want or use it wherever.
//        $pusher->trigger('test-channel',
//            'test-event',
//            ['message' => 'A new categoria has been created !!']);

        return redirect('categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request $request
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $title = 'Show - categoria';

        if ($request->ajax()) {
            return URL::to('categoria/' . $id);
        }

        $categoria = Categoria::findOrfail($id);
        return view('categoria.show', compact('title', 'categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request $request
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $title = 'Edit - categoria';
        if ($request->ajax()) {
            return URL::to('categoria/' . $id . '/edit');
        }


        $categoria = Categoria::findOrfail($id);
        return view('categoria.edit', compact('title', 'categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request $request
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $categoria = Categoria::findOrfail($id);

        $categoria->nombre = $request->nombre;
        
        if ($request->hasFile('img')) {
            
            $directorio=  '/img/categorias/';
            if( !file_exists($directorio) ){
                mkdir($directorio, 077, true);
            }
            $file = $request->file('img');
            $nombreimagen = $directorio . $file->getClientOriginalName();
            \Storage::disk('local')->put($nombreimagen, \File::get($file));
            

        $categoria->img = $file->getClientOriginalName();
        }

        $categoria->color = $request->color;

        $categoria->orden = $request->orden;

        $categoria->logo = $request->logo;

        $categoria->save();

        return redirect('categoria');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     *
     * @param    \Illuminate\Http\Request $request
     * @return  String
     */
    public function DeleteMsg($id, Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!', 'Would you like to remove This?', '/categoria/' . $id . '/delete');

        if ($request->ajax()) {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrfail($id);
        $categoria->activo = 0;
        $subcategorias = $categoria->subcategorias; 
 
        foreach ($subcategorias as $subcategoria) { 
            $subcategoria->activo = 0;
            $recursossubcategorias = $subcategoria->recursosubcategorias;
      
            foreach ($recursossubcategorias as $rec){
                $rec->delete();
            }

            $subcategoria->save(); 
        } 
        $categoria->save();
        return URL::to('categoria');
    }
}
